<?php
/**
 * ปุ่มลอยติดต่อ (Floating contact) — แสดงทุกหน้าอัตโนมัติผ่าน wp_footer
 * ใช้ id เฉพาะ (dth*) เพื่อไม่ชนกับปุ่มเดิมที่ฝังในบางหน้า + ซ่อนปุ่มเดิม (#fab) กันซ้ำ
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_footer', function () {
	$uri = get_template_directory_uri();
	?>
<style>#fab{display:none!important}</style>
<!-- ===== Floating contact (global) ===== -->
<div class="fab-wrap" id="dthFab">
  <div class="fab-panel" id="dthFabPanel" role="menu" aria-label="ช่องทางติดต่อ">
    <button class="fab-item" type="button" id="dthOpenMsg" role="menuitem"><span class="ico ico-msg" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 11 21 3l-8 18-2.5-7.5L3 11Z"/></svg></span> ส่งข้อความถึงทีมงาน</button>
    <a class="fab-item" href="https://www.facebook.com/share/1Ez81X9Yjh/" target="_blank" rel="noopener" role="menuitem"><span class="ico ico-fb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 21v-8h2.5l.4-3h-2.9V8.2c0-.9.3-1.5 1.5-1.5H16.5V4.1S15.4 4 14.3 4c-2.3 0-3.8 1.4-3.8 3.9V10H8v3h2.5v8h3Z"/></svg></span> Facebook</a>
    <a class="fab-item" href="tel:023544260" role="menuitem"><span class="ico ico-tel" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1A17 17 0 0 1 3 4c0-.6.4-1 1-1h3.6c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.6.1.4 0 .8-.3 1l-2.3 2.2Z"/></svg></span> โทร 02-354-4260</a>
    <a class="fab-item" href="mailto:disabilitiesth@gmail.com" role="menuitem"><span class="ico ico-mail" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="m4 7 8 6 8-6"/></svg></span> อีเมล</a>
  </div>
  <button class="fab-main" id="dthFabMain" aria-label="เปิดช่องทางติดต่อ" aria-expanded="false" aria-controls="dthFabPanel">
    <img class="ic-open" src="<?php echo esc_url( $uri . '/Pic/dth-logo.png' ); ?>" alt="" aria-hidden="true">
    <svg class="ic-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M6 6l12 12M18 6 6 18"/></svg>
  </button>
</div>

<!-- ===== Message modal (global) ===== -->
<div class="modal-back" id="dthMsgBack">
  <div class="modal" role="dialog" aria-modal="true" aria-labelledby="dthMsgTitle">
    <div class="modal-head"><h3 id="dthMsgTitle">ส่งข้อความถึงทีมงาน</h3><button class="modal-x" id="dthCloseMsg" aria-label="ปิด">✕</button></div>
    <div id="dthMsgForm">
      <div class="field"><label for="dthMName">ชื่อของคุณ</label><input id="dthMName" type="text" placeholder="ชื่อ-นามสกุล"></div>
      <div class="field"><label for="dthMContact">ช่องทางติดต่อกลับ</label><input id="dthMContact" type="text" placeholder="เบอร์โทร / อีเมล / LINE ID"></div>
      <div class="field"><label for="dthMMsg">ข้อความ</label><textarea id="dthMMsg" rows="4" placeholder="พิมพ์ข้อความที่ต้องการสอบถาม…"></textarea></div>
      <button class="pill-btn" id="dthSendMsg" type="button" style="width:100%;justify-content:center">ส่งข้อความ →</button>
    </div>
    <div id="dthMsgDone" style="display:none;text-align:center;padding:14px 0">
      <div class="ok-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m8 12.5 2.8 2.8L16 9.5"/></svg></div><h3 style="color:var(--brand-dark);margin:8px 0">ส่งข้อความเรียบร้อย</h3><p style="color:var(--muted)">ทีมงานจะติดต่อกลับโดยเร็วที่สุด ขอบคุณครับ/ค่ะ</p>
    </div>
  </div>
</div>

<script>
(function(){
  var fab=document.getElementById('dthFab'), main=document.getElementById('dthFabMain');
  if(!fab||!main) return;
  main.addEventListener('click',function(){var o=fab.classList.toggle('open');main.setAttribute('aria-expanded',o);});
  document.addEventListener('click',function(e){if(fab.classList.contains('open')&&!fab.contains(e.target)){fab.classList.remove('open');main.setAttribute('aria-expanded','false');}});
  var back=document.getElementById('dthMsgBack'),form=document.getElementById('dthMsgForm'),done=document.getElementById('dthMsgDone');
  var openB=document.getElementById('dthOpenMsg'),closeB=document.getElementById('dthCloseMsg'),sendB=document.getElementById('dthSendMsg');
  function openM(){if(!back)return;back.classList.add('show');if(form)form.style.display='';if(done)done.style.display='none';var n=document.getElementById('dthMName');if(n)setTimeout(function(){n.focus();},60);}
  function closeM(){if(back)back.classList.remove('show');}
  if(openB)openB.addEventListener('click',function(){fab.classList.remove('open');main.setAttribute('aria-expanded','false');openM();});
  if(closeB)closeB.addEventListener('click',closeM);
  if(back)back.addEventListener('click',function(e){if(e.target===back)closeM();});
  document.addEventListener('keydown',function(e){if(e.key==='Escape')closeM();});
  if(sendB)sendB.addEventListener('click',function(){var n=document.getElementById('dthMName'),m=document.getElementById('dthMMsg');if(!n||!m||!n.value.trim()||!m.value.trim()){alert('กรุณากรอกชื่อและข้อความ');return;}if(form)form.style.display='none';if(done)done.style.display='block';});
})();
</script>
	<?php
} );
