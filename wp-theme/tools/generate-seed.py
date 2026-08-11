#!/usr/bin/env python3
"""Convert the static DTH HTML pages into inc/seed-data.php for the theme importer.

Run from the repository root:  python3 wp-theme/tools/generate-seed.py
"""

import re
from pathlib import Path

from bs4 import BeautifulSoup

ROOT = Path(__file__).resolve().parents[2]
OUT = ROOT / "wp-theme/dth-theme/inc/seed-data.php"

# Images referenced as "Pic/..." are sideloaded from this base at import time.
ASSET_BASE = "https://itsupport-owatmaid.github.io/dth-redesign/"

# The old dth.or.th uploads now answer 404, but the same artwork lives in this
# repo. Rewrite those references to the copy we can actually fetch.
DEAD_UPLOADS = {
    "https://dth.or.th/wp-content/uploads/2022/04/logo-01.png": "Pic/file logo/logo-01.png",
    "https://dth.or.th/wp-content/uploads/2022/04/logo-04.png": "Pic/file logo/logo-04.png",
    "https://dth.or.th/wp-content/uploads/2022/04/logo-05.png": "Pic/file logo/logo-05.png",
    "https://dth.or.th/wp-content/uploads/2022/04/logo-06.png": "Pic/file logo/logo-06.png",
    "https://dth.or.th/wp-content/uploads/2022/04/logo-12.png": "Pic/file logo/logo-12.png",
    "https://dth.or.th/wp-content/uploads/2022/04/logo-13.png": "Pic/file logo/logo-13.png",
    "https://dth.or.th/wp-content/uploads/2022/07/CRPD.png": "Pic/file logo/crpd.png",
    "https://dth.or.th/wp-content/uploads/2022/07/IDA-Logo.png": "Pic/file logo/IDA-Logo.png",
}


def soup(name):
    return BeautifulSoup((ROOT / name).read_text(encoding="utf-8"), "lxml")


def text(node):
    return re.sub(r"\s+", " ", node.get_text(" ", strip=True)).strip() if node else ""


def asset(url):
    """Absolute URL for a local Pic/ or Doc/ reference."""
    if not url:
        return ""
    url = DEAD_UPLOADS.get(url, url)
    if url.startswith(("http://", "https://")):
        return url
    return ASSET_BASE + url.lstrip("./")


def php(value, indent=1):
    """Render a Python value as PHP array syntax."""
    pad = "\t" * indent
    if isinstance(value, dict):
        if not value:
            return "array()"
        lines = [
            f"{pad}\t{php(k, indent + 1)} => {php(v, indent + 1)},"
            for k, v in value.items()
        ]
        return "array(\n" + "\n".join(lines) + f"\n{pad})"
    if isinstance(value, (list, tuple)):
        if not value:
            return "array()"
        lines = [f"{pad}\t{php(v, indent + 1)}," for v in value]
        return "array(\n" + "\n".join(lines) + f"\n{pad})"
    if isinstance(value, bool):
        return "true" if value else "false"
    if isinstance(value, int):
        return str(value)
    escaped = str(value).replace("\\", "\\\\").replace("'", "\\'")
    return f"'{escaped}'"


# --------------------------------------------------------------------------
# Homepage: slides, rights, FAQ, partners
# --------------------------------------------------------------------------

def parse_home():
    doc = soup("dth-v2.html")

    slides = []
    for slide in doc.select(".hero .slide"):
        style = slide.get("style", "")
        bg = re.search(r"url\('([^']+)'\)", style)
        cap = slide.select_one(".cap")
        slides.append({
            "title": text(cap.select_one("h2")) if cap else "",
            "tag": text(cap.select_one(".tag")) if cap else "",
            "subtitle": text(cap.select_one("p")) if cap else "",
            "image": asset(bg.group(1)) if bg else "",
        })

    rights = []
    for order, panel in enumerate(doc.select(".rights-panel")):
        tab = doc.select(".rights-tab")[order] if order < len(doc.select(".rights-tab")) else None
        copy = panel.select_one(".rights-copy")
        card = panel.select_one(".rights-media-card")
        cta = copy.select_one(".rights-cta") if copy else None
        rights.append({
            "title": text(copy.select_one("h3")) if copy else "",
            "tab_label": text(tab),
            "kicker": text(copy.select_one(".right-kicker")) if copy else "",
            "content": text(copy.select_one("p")) if copy else "",
            "bullets": [text(li) for li in copy.select(".rights-list li")] if copy else [],
            "cta_label": text(cta),
            "cta_url": cta.get("href", "") if cta else "",
            "card_badge": text(card.select_one(".badge")) if card else "",
            "card_title": text(card.select_one("h4")) if card else "",
            "pairs": [
                f"{text(row.select_one('span'))} | {text(row.select_one('strong'))}"
                for row in card.select(".row")
            ] if card else [],
            "order": order,
        })

    faqs = [
        {"title": text(item.select_one("span")), "link": item.get("href", ""), "order": order}
        for order, item in enumerate(doc.select(".qa-list .qa-item"))
    ]

    partners = []
    for group, selector in (("members", "#network .partner"), ("government", ".gov-partners .gov-partner")):
        for order, node in enumerate(doc.select(selector)):
            img = node.select_one("img")
            partners.append({
                "title": text(node.select_one("span")),
                "link": node.get("href", ""),
                "image": asset(img.get("src")) if img else "",
                "group": group,
                "order": order,
            })

    return slides, rights, faqs, partners


# --------------------------------------------------------------------------
# People: executive board (photos), full board table, staff table
# --------------------------------------------------------------------------

def parse_people():
    about = soup("about.html")
    people = []

    for order, card in enumerate(about.select(".board-card")):
        img = card.select_one("img")
        people.append({
            "title": text(card.select_one("strong")),
            "position": text(card.select_one("figcaption span")),
            "image": asset(img.get("src")) if img else "",
            "group": "board-executive",
            "order": order,
        })

    named = {p["title"].replace(" ", "") for p in people}
    order = 0
    for row in about.select("table.board-table tbody tr"):
        cells = [text(td) for td in row.select("td")]
        if len(cells) < 3:
            continue
        name, position = cells[1], cells[2]
        if name.replace(" ", "") in named:
            continue
        people.append({
            "title": name,
            "position": position,
            "image": "",
            "group": "board",
            "order": order,
        })
        order += 1

    staff = soup("staff.html")
    for order, row in enumerate(staff.select("table.board-table tbody tr")):
        cells = [text(td) for td in row.select("td")]
        if len(cells) < 3:
            continue
        people.append({
            "title": cells[1],
            "position": cells[2],
            "image": "",
            "group": "staff",
            "order": order,
        })

    return people


# --------------------------------------------------------------------------
# Provinces, grouped by their region heading
# --------------------------------------------------------------------------

def parse_provinces():
    doc = soup("provinces.html")
    provinces = []

    for region in doc.select(".prov-region"):
        title = region.select_one(".region-title")
        name = text(title.contents[0]) if title and title.contents else text(title)
        for order, row in enumerate(region.select("table tbody tr")):
            cells = row.select("td")
            if len(cells) < 4:
                continue
            provinces.append({
                "title": text(cells[0]),
                "chair": text(cells[1]),
                "disability": text(cells[2]),
                "phone": text(cells[3]),
                "region": name,
                "order": order,
            })

    return provinces


# --------------------------------------------------------------------------
# News and media hub cards
# --------------------------------------------------------------------------

CAT_NAMES = {
    "pr": "ข่าวประชาสัมพันธ์",
    "activity": "กิจกรรม",
    "report": "รายงานประจำปี",
    "knowledge": "สาระน่ารู้",
    "health": "สุขภาพ",
    "general": "ทั่วไป",
    "blind": "สมาคมคนตาบอดแห่งประเทศไทย",
    "rights": "อินโฟกราฟิกสิทธิ",
    "law": "กฎหมาย",
    "magazine": "DTH-Magazine",
    "video": "วิดีโอ",
    "infographic": "อินโฟกราฟิก",
    "download": "เอกสารดาวน์โหลด",
}


def parse_cards(filename):
    doc = soup(filename)
    items = []

    for order, card in enumerate(doc.select(".hub-card")):
        img = card.select_one(".thumb img")
        body = card.select_one(".body")
        meta = text(body.select_one(".meta")) if body else ""
        date = ""
        views = ""

        date_match = re.search(r"\d{2}-\d{2}-\d{4}", meta)
        if date_match:
            date = date_match.group(0)
        views_match = re.findall(r"[\d,]{3,}", meta.replace(date, ""))
        if views_match:
            views = views_match[-1]
        if not date and meta and not views_match:
            date = meta

        items.append({
            "title": text(body.select_one("h3")) if body else "",
            "excerpt": text(body.select_one("p")) if body else "",
            "url": card.get("href", ""),
            "image": asset(img.get("src")) if img else "",
            "cats": [c for c in (card.get("data-cat") or "").split() if c],
            "date_label": date,
            "views": views,
            "order": order,
        })

    return items


# --------------------------------------------------------------------------
# Proposals
# --------------------------------------------------------------------------

def parse_proposals():
    doc = soup("proposals.html")
    proposals = []

    for order, card in enumerate(doc.select(".mag-card")):
        body = card.select_one(".body")
        proposals.append({
            "title": text(body.select_one("h3")) if body else "",
            "meta_label": text(body.select_one(".meta")) if body else "",
            "file": asset(card.get("href", "")),
            "gallery": [asset(img.get("src")) for img in doc.select(".prov-grid img")],
            "order": order,
        })

    return proposals


# --------------------------------------------------------------------------
# Long-form page bodies, converted to block markup
# --------------------------------------------------------------------------

BLOCK_SKIP = {"script", "style", "nav", "header", "footer", "svg", "iframe", "button", "form"}


def to_blocks(container):
    """Convert a content container into Gutenberg block markup."""
    if not container:
        return ""

    parts = []
    for node in container.find_all(["h2", "h3", "h4", "p", "ul", "ol", "table"], recursive=True):
        if node.find_parent(list(BLOCK_SKIP)):
            continue
        if node.find_parent(["table"]) and node.name != "table":
            continue

        if node.name in ("h2", "h3", "h4"):
            content = text(node)
            if not content:
                continue
            level = node.name[1]
            parts.append(
                f'<!-- wp:heading {{"level":{level}}} -->\n'
                f"<h{level}>{content}</h{level}>\n<!-- /wp:heading -->"
            )
        elif node.name == "p":
            content = node.decode_contents().strip()
            content = re.sub(r"\s+", " ", content)
            if not text(node):
                continue
            parts.append(f"<!-- wp:paragraph -->\n<p>{content}</p>\n<!-- /wp:paragraph -->")
        elif node.name in ("ul", "ol"):
            items = "".join(
                f"<!-- wp:list-item -->\n<li>{text(li)}</li>\n<!-- /wp:list-item -->\n"
                for li in node.find_all("li", recursive=False)
                if text(li)
            )
            if not items:
                continue
            ordered = ' {"ordered":true}' if node.name == "ol" else ""
            tag = "ol" if node.name == "ol" else "ul"
            parts.append(
                f"<!-- wp:list{ordered} -->\n<{tag}>\n{items}</{tag}>\n<!-- /wp:list -->"
            )
        elif node.name == "table":
            rows = []
            for tr in node.find_all("tr"):
                cells = tr.find_all(["td", "th"])
                tag = "th" if tr.find("th") else "td"
                rows.append("<tr>" + "".join(f"<{tag}>{text(c)}</{tag}>" for c in cells) + "</tr>")
            if not rows:
                continue
            parts.append(
                "<!-- wp:table -->\n<figure class=\"wp-block-table\"><table>"
                + "".join(rows)
                + "</table></figure>\n<!-- /wp:table -->"
            )

    return "\n\n".join(parts)


def parse_pages():
    pages = {}

    about = soup("about.html")
    hero = about.select_one(".page-hero .lead")
    sections = []
    if hero:
        lead = re.sub(r"\s+", " ", hero.decode_contents().strip())
        sections.append("<!-- wp:paragraph -->\n<p>" + lead + "</p>\n<!-- /wp:paragraph -->")
    for section in about.select("main section.block"):
        if section.select_one(".board-card") or section.select_one("table.board-table"):
            continue
        blocks = to_blocks(section)
        if blocks:
            sections.append(blocks)
    pages["about"] = {
        "title": "เกี่ยวกับเรา",
        "content": "\n\n".join(sections),
    }

    regulations = soup("regulations.html")
    pages["regulations"] = {
        "title": "ข้อบังคับ ระเบียบ และเอกสารดาวน์โหลด",
        "content": to_blocks(regulations.select_one("main")),
    }

    return pages


# --------------------------------------------------------------------------

def main():
    slides, rights, faqs, partners = parse_home()

    data = {
        "asset_base": ASSET_BASE,
        "slides": slides,
        "rights": rights,
        "faqs": faqs,
        "partners": partners,
        "people": parse_people(),
        "provinces": parse_provinces(),
        "news": parse_cards("news.html"),
        "media": parse_cards("media.html"),
        "proposals": parse_proposals(),
        "pages": parse_pages(),
        "category_names": CAT_NAMES,
    }

    body = php(data, 1)
    OUT.write_text(
        "<?php\n"
        "/**\n"
        " * Content extracted from the original static DTH pages.\n"
        " *\n"
        " * Generated by wp-theme/tools/generate-seed.py — do not edit by hand.\n"
        " *\n"
        " * @package DTH\n"
        " */\n\n"
        "defined( 'ABSPATH' ) || exit;\n\n"
        "/**\n"
        " * Seed content for the one-click importer.\n"
        " *\n"
        " * @return array\n"
        " */\n"
        "function dth_seed_data() {\n"
        f"\treturn {body};\n"
        "}\n",
        encoding="utf-8",
    )

    print(f"wrote {OUT.relative_to(ROOT)}")
    for key in ("slides", "rights", "faqs", "partners", "people", "provinces", "news", "media", "proposals"):
        print(f"  {key}: {len(data[key])}")


if __name__ == "__main__":
    main()
