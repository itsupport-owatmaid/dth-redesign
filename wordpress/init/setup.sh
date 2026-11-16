#!/usr/bin/env bash
# ติดตั้ง WordPress + สร้างหน้าทั้งหมด + เปิดใช้ธีม DTH โดยอัตโนมัติ (idempotent)
set -e
cd /var/www/html

echo "⏳ รอไฟล์ WordPress (wp-config.php)..."
until [ -f wp-config.php ]; do sleep 3; done

echo "⏳ รอฐานข้อมูล..."
until wp db check >/dev/null 2>&1; do sleep 3; done

if ! wp core is-installed >/dev/null 2>&1; then
  echo "🚀 ติดตั้ง WordPress..."
  wp core install \
    --url="http://localhost:8080" \
    --title="สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย (DTH)" \
    --admin_user="admin" \
    --admin_password="admin123" \
    --admin_email="admin@dth.local" \
    --skip-email
fi

# permalink สวย ๆ เพื่อให้ /about/ /news/ ฯลฯ ทำงาน
wp rewrite structure '/%postname%/' --hard >/dev/null

# ตั้งภาษาไทย (ถ้าดาวน์โหลดได้)
wp language core install th_TH >/dev/null 2>&1 && wp site switch-language th_TH >/dev/null 2>&1 || true

# สร้างหน้า: slug -> title  (echo ID ออก stdout, ข้อความ log ออก stderr)
create_page () {
  local slug="$1" title="$2" id
  id=$(wp post list --post_type=page --post_status=any --name="$slug" --field=ID 2>/dev/null | head -n1)
  if [ -z "$id" ]; then
    id=$(wp post create --post_type=page --post_status=publish --post_name="$slug" --post_title="$title" --porcelain)
    echo "  + สร้างหน้า /$slug/ (ID $id)" >&2
  fi
  echo "$id"
}

HOME_ID=$(create_page home        "หน้าแรก")
create_page about       "เกี่ยวกับสมาคม"             >/dev/null
create_page staff       "เจ้าหน้าที่สมาคม"           >/dev/null
create_page provinces   "สภาฯ ประจำจังหวัด"          >/dev/null
create_page news        "ข่าวสาร"                    >/dev/null
create_page media       "คลังสื่อ / อินโฟกราฟิก"     >/dev/null
create_page magazine    "DTH Magazine"               >/dev/null
create_page proposals   "ข้อเสนอเชิงนโยบาย"          >/dev/null
create_page regulations "ข้อบังคับ/ระเบียบ"          >/dev/null
create_page sitemap     "ผังเว็บไซต์"                >/dev/null
create_page development "ขั้นตอนการพัฒนา"            >/dev/null

# ตั้งหน้าแรกเป็นแบบ static (ใช้ front-page.php)
wp option update show_on_front page >/dev/null
wp option update page_on_front "$HOME_ID" >/dev/null

# เปิดใช้ธีม DTH
wp theme activate dth >/dev/null

echo ""
echo "✅ เสร็จเรียบร้อย!"
echo "   เว็บไซต์   : http://localhost:8080"
echo "   หน้าแอดมิน : http://localhost:8080/wp-admin   (admin / admin123)"
