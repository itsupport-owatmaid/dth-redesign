#!/usr/bin/env bash
# สร้างไฟล์ dth-theme.zip (ธีม DTH + รูป Pic/ + เอกสาร Doc/) แบบ self-contained
# สำหรับอัปโหลดเข้า WordPress hosting จริง (Appearance > Themes > Add New > Upload)
set -e
cd "$(dirname "$0")"                 # โฟลเดอร์ wordpress/
REPO_ROOT="$(cd .. && pwd)"
OUT_ARG="${1:-dth-theme.zip}"
case "$OUT_ARG" in
  /*) OUT_ABS="$OUT_ARG" ;;       # absolute path
  *)  OUT_ABS="$(pwd)/$OUT_ARG" ;; # relative to wordpress/
esac
TMP="$(mktemp -d)"

mkdir -p "$TMP/dth-theme"
cp -r wp-content/themes/dth/. "$TMP/dth-theme/"
cp -r "$REPO_ROOT/Pic" "$TMP/dth-theme/Pic"
cp -r "$REPO_ROOT/Doc" "$TMP/dth-theme/Doc"

rm -f "$OUT_ABS"
if command -v zip >/dev/null 2>&1; then
  ( cd "$TMP" && zip -qr "$OUT_ABS" dth-theme )
else
  ( cd "$TMP" && python3 -c "import shutil,sys; shutil.make_archive(sys.argv[1].removesuffix('.zip'),'zip','.','dth-theme')" "$OUT_ABS" )
fi
rm -rf "$TMP"
echo "✅ สร้างไฟล์: $OUT_ABS  ($(du -h "$OUT_ABS" | cut -f1))"
echo "   อัปโหลดไฟล์นี้เข้า WordPress: Appearance > Themes > Add New > Upload Theme"
