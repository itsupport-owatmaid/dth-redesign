<?php
/**
 * ส่วนหัวเอกสาร — เฉพาะ <head> และเปิด <body>
 * chrome (topbar / a11y bar / เมนู) อยู่ภายในแต่ละ template เพื่อคงหน้าตาเดิม 100%
 */
?><!doctype html>
<html lang="th">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="no-referrer">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
