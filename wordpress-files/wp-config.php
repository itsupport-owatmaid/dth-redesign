<?php
/**
 * ============================================================================
 *  ⚠️  ไฟล์นี้คือ "TEMPLATE" ของ wp-config.php — ไม่ใช่ไฟล์ใช้งานจริง
 * ============================================================================
 *
 *  หมายเหตุสำคัญสำหรับการส่งมอบ/ติดตั้งบน hosting:
 *  - wp-config.php ตัวจริง "ไม่ได้" รวมมากับธีม/แพ็กเกจนี้
 *    (เพราะมีรหัสผ่านฐานข้อมูลและคีย์ลับ ห้ามนำขึ้น Git หรือแจกจ่าย)
 *  - ต้อง "สร้างใหม่เอง" บน hosting โดยใช้ไฟล์นี้เป็นแบบ:
 *      1) คัดลอกไฟล์นี้ไปไว้ที่ root ของ WordPress แล้วเปลี่ยนชื่อเป็น  wp-config.php
 *      2) แก้ค่า DB_* ให้ตรงกับฐานข้อมูลของ hosting
 *      3) สร้างคีย์ลับ (SALT) ใหม่จาก  https://api.wordpress.org/secret-key/1.1/salt/
 *         แล้ววางทับบล็อก Authentication Unique Keys ด้านล่าง
 *  - หรือจะใช้ตัวติดตั้งของ WordPress (เปิดเว็บครั้งแรกแล้วกรอกค่า DB) ให้มัน
 *    สร้าง wp-config.php ให้อัตโนมัติก็ได้
 * ============================================================================
 */

// ** การตั้งค่าฐานข้อมูล — ขอค่าจากผู้ดูแล hosting ** //
define( 'DB_NAME',     'ชื่อฐานข้อมูล' );
define( 'DB_USER',     'ชื่อผู้ใช้ฐานข้อมูล' );
define( 'DB_PASSWORD', 'รหัสผ่านฐานข้อมูล' );
define( 'DB_HOST',     'localhost' );        // Synology/บาง host อาจเป็น 'localhost:/run/mysqld/mysqld10.sock'
define( 'DB_CHARSET',  'utf8mb4' );
define( 'DB_COLLATE',  '' );

/**#@+
 * Authentication Unique Keys and Salts.
 * ⚠️ สร้างใหม่จาก https://api.wordpress.org/secret-key/1.1/salt/ แล้ววางทับทั้งบล็อก
 */
define( 'AUTH_KEY',         'ใส่ค่าที่สร้างใหม่' );
define( 'SECURE_AUTH_KEY',  'ใส่ค่าที่สร้างใหม่' );
define( 'LOGGED_IN_KEY',    'ใส่ค่าที่สร้างใหม่' );
define( 'NONCE_KEY',        'ใส่ค่าที่สร้างใหม่' );
define( 'AUTH_SALT',        'ใส่ค่าที่สร้างใหม่' );
define( 'SECURE_AUTH_SALT', 'ใส่ค่าที่สร้างใหม่' );
define( 'LOGGED_IN_SALT',   'ใส่ค่าที่สร้างใหม่' );
define( 'NONCE_SALT',       'ใส่ค่าที่สร้างใหม่' );
/**#@-*/

// คำนำหน้าตาราง (เปลี่ยนได้เพื่อความปลอดภัย เช่น dth_)
$table_prefix = 'wp_';

/**
 * ที่อยู่เว็บไซต์ (สำคัญ! เคยทำให้รูปไม่ขึ้นมาแล้ว)
 * ต้องตรงกับ URL ที่ใช้เปิดเว็บจริง — ถ้าเปิดผ่าน IP ภายในให้ใช้ IP, ถ้าใช้โดเมนให้ใช้โดเมน
 * ตัวอย่างกรณีรันบน NAS ภายใน:
 */
// define( 'WP_HOME',    'http://10.10.110.10/wordpress' );
// define( 'WP_SITEURL', 'http://10.10.110.10/wordpress' );

// โหมดดีบัก (production ควรเป็น false)
define( 'WP_DEBUG', false );

/* หยุดแก้ตรงนี้ ส่วนล่างเป็นของ WordPress */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
