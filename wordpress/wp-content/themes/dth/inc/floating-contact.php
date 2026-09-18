<?php
/**
 * ปุ่มลอยติดต่อ (Floating contact) — แสดงทุกหน้าอัตโนมัติผ่าน wp_footer
 * ใช้ id เฉพาะ (dth*) เพื่อไม่ชนกับปุ่มเดิมที่ฝังในบางหน้า + ซ่อนปุ่มเดิม (#fab) กันซ้ำ
 * ฟอร์ม "ส่งข้อความถึงทีมงาน" ส่งของจริง — ตัวรับข้อมูลอยู่ใน inc/contact-form.php
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_footer', function () {
	$uri = get_template_directory_uri();
	?>
<style>#fab{display:none!important}
#dthMsgErr{display:none;margin:0 0 12px;padding:10px 14px;border:2px solid var(--brand);border-radius:12px;color:var(--ink);background:var(--leaf);font-size:.94rem;line-height:1.6}
#dthMsgForm .hp{position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden}
#dthSendMsg[disabled]{opacity:.65;cursor:progress}</style>
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
    <form id="dthMsgForm" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
      <input type="hidden" name="action" value="dth_contact_submit">
      <input type="hidden" name="dth_source" id="dthMSource" value="">
      <?php wp_nonce_field( 'dth_contact_submit', 'dth_contact_nonce' ); ?>
      <p class="hp" aria-hidden="true"><label for="dthWebsite">เว้นว่างไว้</label><input id="dthWebsite" type="text" name="dth_website" tabindex="-1" autocomplete="off"></p>
      <p id="dthMsgErr" role="alert"></p>
      <div class="field"><label for="dthMName">ชื่อของคุณ</label><input id="dthMName" name="dth_name" type="text" placeholder="ชื่อ-นามสกุล" maxlength="120" required></div>
      <div class="field"><label for="dthMContact">ช่องทางติดต่อกลับ</label><input id="dthMContact" name="dth_reply" type="text" placeholder="เบอร์โทร / อีเมล / LINE ID" maxlength="160"></div>
      <div class="field"><label for="dthMMsg">ข้อความ</label><textarea id="dthMMsg" name="dth_body" rows="4" placeholder="พิมพ์ข้อความที่ต้องการสอบถาม…" maxlength="5000" required></textarea></div>
      <button class="pill-btn" id="dthSendMsg" type="submit" style="width:100%;justify-content:center">ส่งข้อความ →</button>
    </form>
    <div id="dthMsgDone" style="display:none;text-align:center;padding:14px 0">
      <div class="ok-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m8 12.5 2.8 2.8L16 9.5"/></svg></div><h3 style="color:var(--brand-dark);margin:8px 0">ส่งข้อความเรียบร้อย</h3><p style="color:var(--muted)">ทีมงานจะติดต่อกลับโดยเร็วที่สุด ขอบคุณครับ/ค่ะ</p>
    </div>
  </div>
</div>

<script>
(function(){
  var fab=document.getElementById('dthFab'), main=document.getElementById('dthFabMain');
  if(fab&&main){
    main.addEventListener('click',function(){var o=fab.classList.toggle('open');main.setAttribute('aria-expanded',o);});
    document.addEventListener('click',function(e){if(fab.classList.contains('open')&&!fab.contains(e.target)){fab.classList.remove('open');main.setAttribute('aria-expanded','false');}});
  }
  var back=document.getElementById('dthMsgBack'),form=document.getElementById('dthMsgForm'),done=document.getElementById('dthMsgDone'),err=document.getElementById('dthMsgErr');
  var openB=document.getElementById('dthOpenMsg'),closeB=document.getElementById('dthCloseMsg'),sendB=document.getElementById('dthSendMsg');
  var src=document.getElementById('dthMSource');
  if(src)src.value=location.href;

  function showErr(msg){if(!err)return;err.textContent=msg;err.style.display='block';err.focus&&err.setAttribute('tabindex','-1');err.focus&&err.focus();}
  function clearErr(){if(err){err.textContent='';err.style.display='none';}}
  function showForm(){if(form)form.style.display='';if(done)done.style.display='none';}
  function showDone(){if(form)form.style.display='none';if(done)done.style.display='block';}
  function openM(){if(!back)return;back.classList.add('show');showForm();clearErr();var n=document.getElementById('dthMName');if(n)setTimeout(function(){n.focus();},60);}
  function closeM(){if(back)back.classList.remove('show');}
  if(openB&&fab&&main)openB.addEventListener('click',function(){fab.classList.remove('open');main.setAttribute('aria-expanded','false');openM();});
  if(closeB)closeB.addEventListener('click',closeM);
  if(back)back.addEventListener('click',function(e){if(e.target===back)closeM();});
  document.addEventListener('keydown',function(e){if(e.key==='Escape')closeM();});

  // ส่งแบบไม่ต้องโหลดหน้าใหม่ (ถ้า fetch ใช้ไม่ได้ ฟอร์มจะ submit ปกติแล้วเด้งกลับด้วย ?dth_sent=)
  if(form&&window.fetch){
    form.addEventListener('submit',function(e){
      var n=document.getElementById('dthMName'),m=document.getElementById('dthMMsg');
      if(!n||!m||!n.value.trim()||!m.value.trim()){e.preventDefault();showErr('กรุณากรอกชื่อและข้อความให้ครบ');return;}
      e.preventDefault();clearErr();
      var fd=new FormData(form);fd.append('dth_ajax','1');
      // ใช้ getAttribute เพราะช่อง <input name="action"> ทับค่า form.action ตามสเปก DOM
      var url=form.getAttribute('action');
      if(sendB){sendB.disabled=true;sendB.textContent='กำลังส่ง…';}
      fetch(url,{method:'POST',body:fd,credentials:'same-origin'})
        .then(function(r){return r.json();})
        .then(function(j){
          if(j&&j.success){form.reset();if(src)src.value=location.href;showDone();}
          else{showErr((j&&j.data&&j.data.message)||'ส่งข้อความไม่สำเร็จ กรุณาลองใหม่');}
        })
        .catch(function(){showErr('เชื่อมต่อไม่สำเร็จ กรุณาตรวจอินเทอร์เน็ตแล้วลองใหม่ หรือติดต่อทางโทรศัพท์');})
        .finally(function(){if(sendB){sendB.disabled=false;sendB.textContent='ส่งข้อความ →';}});
    });
  }

  // กลับมาจากการส่งแบบไม่มี JavaScript — เปิด modal บอกผลให้เห็น
  var q=new RegExp('[?&]dth_sent=(ok|error)').exec(location.search);
  if(q&&back){
    back.classList.add('show');
    if('ok'===q[1]){showDone();}else{showForm();showErr('ส่งข้อความไม่สำเร็จ กรุณาตรวจข้อมูลแล้วลองใหม่');}
    if(history.replaceState)history.replaceState(null,'',location.pathname+location.search.replace(/[?&]dth_sent=(ok|error)/,'').replace(/^&/,'?')+location.hash);
  }
})();
</script>
	<?php
} );
