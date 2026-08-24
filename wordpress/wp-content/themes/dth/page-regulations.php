<?php
/**
 * Template: regulations (จาก regulations.html) — คงหน้าตาและสคริปต์เดิม
 */
get_header();
?>
<a href="#main" class="skip">ข้ามไปยังเนื้อหาหลัก</a>

<!-- ===== Top utility bar ===== -->
<div class="topbar">
  <div class="wrap">
    <div class="left"><span>ปากเสียงเพื่อสิทธิและคุณภาพชีวิตที่เท่าเทียมของคนพิการทุกคน</span></div>
    <div class="right">
      <span class="lang"><b>TH</b><span>|</span><a href="#">EN</a></span>
      <span class="top-social" aria-label="โซเชียลมีเดีย">
        <a href="https://www.facebook.com/share/1Ez81X9Yjh/" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 21v-8h2.5l.4-3h-2.9V8.2c0-.9.3-1.5 1.5-1.5H16.5V4.1S15.4 4 14.3 4c-2.3 0-3.8 1.4-3.8 3.9V10H8v3h2.5v8h3Z"/></svg></a>
        <a href="https://x.com/disabilitiesth" target="_blank" rel="noopener" aria-label="X (Twitter)"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18.24 2.25h3.31l-7.23 8.26L23 21.75h-6.66l-5.22-6.82-5.97 6.82H1.84l7.73-8.84L1.25 2.25h6.83l4.71 6.23 5.45-6.23Zm-1.16 17.52h1.83L7.01 4.13H5.04l12.04 15.64Z"/></svg></a>
        <a href="https://youtube.com/@disabilitiesthailand945" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M23 7.5s-.22-1.55-.9-2.23c-.86-.9-1.82-.9-2.26-.96C16.7 4.05 12 4.05 12 4.05s-4.7 0-7.84.26c-.44.06-1.4.06-2.26.96C1.22 5.95 1 7.5 1 7.5S.77 9.31.77 11.13v1.7C.77 14.65 1 16.46 1 16.46s.22 1.55.9 2.23c.86.9 1.99.87 2.49.97 1.8.17 7.61.22 7.61.22s4.7-.01 7.84-.27c.44-.06 1.4-.06 2.26-.96.68-.68.9-2.23.9-2.23s.23-1.81.23-3.63v-1.7c0-1.82-.23-3.63-.23-3.63ZM9.75 14.6V8.74l6.02 2.94-6.02 2.92Z"/></svg></a>
        <a href="https://www.tiktok.com/@disabilitiesth" target="_blank" rel="noopener" aria-label="TikTok"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16.5 2h-3v13.5a2.5 2.5 0 1 1-2.5-2.5c.27 0 .53.04.78.12V9.9a5.6 5.6 0 0 0-.78-.06A5.55 5.55 0 1 0 16.5 15V8.4a6.86 6.86 0 0 0 4 1.28V6.6a3.86 3.86 0 0 1-4-3.83V2Z"/></svg></a>
      </span>
    </div>
  </div>
</div>

<!-- ===== Accessibility bar ===== -->
<div class="a11y-bar" role="region" aria-label="ปรับการแสดงผลเพื่อการเข้าถึง">
  <div class="wrap">
    <div class="a11y-group">
      <span>ขนาดตัวอักษร</span>
      <button class="a11y-btn" data-fs=".9" aria-label="อักษรขนาดเล็ก">ก</button>
      <button class="a11y-btn active" data-fs="1" aria-label="อักษรขนาดปกติ" style="font-size:1rem">ก</button>
      <button class="a11y-btn" data-fs="1.18" aria-label="อักษรขนาดใหญ่" style="font-size:1.2rem">ก</button>
    </div>
    <div class="a11y-group">
      <span>การแสดงผล</span>
      <button class="a11y-btn active" data-theme="" aria-label="แสดงผลปกติ">C</button>
      <button class="a11y-btn sw-white" data-theme="hc-white" aria-label="อักษรขาวพื้นดำ">C</button>
      <button class="a11y-btn sw-yellow" data-theme="hc-yellow" aria-label="อักษรเหลืองพื้นดำ">C</button>
    </div>
  </div>
</div>

<!-- ===== Header ===== -->
<header class="site" id="top">
  <div class="nav">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="brand" aria-label="หน้าแรก สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย">
      <span class="logo"><img src="<?php echo DTH_URI; ?>/Pic/dth-logo.png" alt="โลโก้ Disabilities Thailand" onerror="this.style.display='none'"></span>
      <span class="name"><b>สภาคนพิการทุกประเภทแห่งประเทศไทย</b><span>Disabilities Thailand</span></span>
    </a>
    <nav class="nav-pill" id="menu" aria-label="เมนูหลัก">
      <a href="<?php echo esc_url( home_url('/') ); ?>">หน้าแรก</a>
      <div class="has-sub">
        <a href="<?php echo esc_url( home_url('/about/') ); ?>" aria-haspopup="true" aria-expanded="false">เกี่ยวกับเรา <span class="caret" aria-hidden="true">▾</span></a>
        <div class="sub">
          <a href="<?php echo esc_url( home_url('/about/') ); ?>#history">ความเป็นมา</a>
          <a href="<?php echo esc_url( home_url('/about/') ); ?>#board">คณะกรรมการ</a>
          <a href="<?php echo esc_url( home_url('/staff/') ); ?>">เจ้าหน้าที่สมาคม</a>
          <a href="<?php echo esc_url( home_url('/about/') ); ?>#milestones">ผลงานสภา</a>
          <a href="<?php echo esc_url( home_url('/regulations/') ); ?>">ข้อบังคับ/ระเบียบ</a>
          <a href="<?php echo esc_url( home_url('/') ); ?>#contact">ติดต่อเรา</a>
        </div>
      </div>
      <div class="has-sub">
        <a href="<?php echo esc_url( home_url('/') ); ?>#network" aria-haspopup="true" aria-expanded="false">เครือข่าย <span class="caret" aria-hidden="true">▾</span></a>
        <div class="sub">
          <a href="<?php echo esc_url( home_url('/about/') ); ?>#members">องค์การคนพิการ</a>
          <a href="<?php echo esc_url( home_url('/provinces/') ); ?>">สภาฯ ประจำจังหวัด</a>
          <a href="<?php echo esc_url( home_url('/') ); ?>#network">หน่วยงานที่เกี่ยวข้อง</a>
        </div>
      </div>
      <div class="has-sub">
        <a href="<?php echo esc_url( home_url('/news/') ); ?>" aria-haspopup="true" aria-expanded="false">ข่าวสารและกิจกรรม <span class="caret" aria-hidden="true">▾</span></a>
        <div class="sub">
          <a href="<?php echo esc_url( home_url('/news/') ); ?>?cat=pr">ข่าวประชาสัมพันธ์</a>
          <a href="<?php echo esc_url( home_url('/news/') ); ?>?cat=activity">กิจกรรม</a>
          <a href="<?php echo esc_url( home_url('/news/') ); ?>?cat=report">รายงานประจำปี</a>
        </div>
      </div>
      <div class="has-sub">
        <a href="<?php echo esc_url( home_url('/') ); ?>#rights" class="active" aria-haspopup="true" aria-expanded="false">ข้อมูลสำคัญ <span class="caret" aria-hidden="true">▾</span></a>
        <div class="sub">
          <a href="<?php echo esc_url( home_url('/proposals/') ); ?>">ข้อเสนอ</a>
          <a href="<?php echo esc_url( home_url('/media/') ); ?>?cat=law">กฎหมาย</a>
          <a href="<?php echo esc_url( home_url('/media/') ); ?>?cat=magazine">DTH-Magazine</a>
          <a href="<?php echo esc_url( home_url('/') ); ?>#rights">สิทธิคนพิการที่ควรรู้</a>
          <a href="<?php echo esc_url( home_url('/') ); ?>#qa">คำถามที่พบบ่อย</a>
          <a href="<?php echo esc_url( home_url('/media/') ); ?>">คลังสื่อ / อินโฟกราฟิก</a>
        </div>
      </div>
    </nav>
    <div class="nav-actions">
      <div class="search-mini" role="search">
        <input type="text" placeholder="ค้นหา…" aria-label="ค้นหา">
        <button aria-label="ค้นหา">⌕</button>
      </div>
    </div>
    <button class="burger" id="burger" aria-label="เปิดเมนู" aria-expanded="false"><span></span><span></span><span></span></button>
  </div>
</header>

<?php the_content(); ?>

<footer class="site">
  <div class="wrap">
    <div class="foot">
      <div class="flogo"><img src="<?php echo DTH_URI; ?>/Pic/dth-logo-wide.png" alt="โลโก้ DTH" onerror="this.style.display='none'"></div>
      <div>
        <h4>สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย</h4>
        <address>
          255 ห้อง 6-8 ชั้น 3 อาคาร APCD ถนนราชวิถี<br>
          แขวงทุ่งพญาไท เขตราชเทวี กรุงเทพมหานคร 10400<br>
          โทรศัพท์ <a href="tel:023544260">02-354-4260</a><br>
          อีเมล <a href="mailto:disabilitiesth@gmail.com">disabilitiesth@gmail.com</a>
        </address>
      </div>
    </div>
    <div class="foot-policy">
      <a href="<?php echo esc_url( home_url('/') ); ?>#top">หน้าแรก</a>
      <a href="<?php echo esc_url( home_url('/about/') ); ?>">เกี่ยวกับเรา</a>
      <a href="<?php echo esc_url( home_url('/about/') ); ?>#board">คณะกรรมการ</a>
      <a href="<?php echo esc_url( home_url('/about/') ); ?>#milestones">ผลงานสภา</a>
      <a href="<?php echo esc_url( home_url('/about/') ); ?>#members">องค์การคนพิการ</a>
      <a href="<?php echo esc_url( home_url('/') ); ?>#network">หน่วยงานที่เกี่ยวข้อง</a>
      <a href="<?php echo esc_url( home_url('/news/') ); ?>">ข่าวสารและกิจกรรม</a>
      <a href="<?php echo esc_url( home_url('/') ); ?>#rights">สิทธิคนพิการที่ควรรู้</a>
      <a href="<?php echo esc_url( home_url('/media/') ); ?>?cat=law">กฎหมาย</a>
          <a href="<?php echo esc_url( home_url('/media/') ); ?>?cat=magazine">DTH-Magazine</a>
      <a href="<?php echo esc_url( home_url('/regulations/') ); ?>">เอกสารดาวน์โหลด</a>
      <a href="<?php echo esc_url( home_url('/media/') ); ?>">คลังสื่อ / อินโฟกราฟิก</a>
      <a href="<?php echo esc_url( home_url('/') ); ?>#contact">ติดต่อเรา</a>
      <a href="<?php echo esc_url( home_url('/sitemap/') ); ?>">ผังเว็บไซต์</a>
      <a href="<?php echo esc_url( home_url('/development/') ); ?>">ขั้นตอนการพัฒนา</a>
      <a href="https://dth.or.th/" target="_blank" rel="noopener">เว็บไซต์ทางการ dth.or.th</a>
    </div>
    <div class="foot-copy">© 2569 สงวนลิขสิทธิ์โดยสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย (Disabilities Thailand)</div>
  </div>
</footer>

<script>
  // a11y font size
  document.querySelectorAll('[data-fs]').forEach(b=>b.addEventListener('click',()=>{
    document.documentElement.style.setProperty('--fs',b.dataset.fs);
    document.querySelectorAll('[data-fs]').forEach(x=>x.classList.remove('active'));b.classList.add('active');
  }));
  // a11y contrast
  document.querySelectorAll('[data-theme]').forEach(b=>b.addEventListener('click',()=>{
    document.body.classList.remove('hc-white','hc-yellow');
    if(b.dataset.theme)document.body.classList.add(b.dataset.theme);
    document.querySelectorAll('[data-theme]').forEach(x=>x.classList.remove('active'));b.classList.add('active');
  }));
  // header shadow
  const hdr=document.querySelector('header.site');
  addEventListener('scroll',()=>hdr.classList.toggle('scrolled',scrollY>10));
  // mobile menu
  const burger=document.getElementById('burger'),menu=document.getElementById('menu');
  burger.addEventListener('click',()=>{const o=menu.classList.toggle('open');burger.setAttribute('aria-expanded',o);});
  document.querySelectorAll('.has-sub > a').forEach(a=>a.addEventListener('click',e=>{
    if(matchMedia('(max-width:760px)').matches){e.preventDefault();const li=a.parentElement,o=li.classList.toggle('open');a.setAttribute('aria-expanded',o);}
  }));
</script>
<!-- back to top -->
<button class="to-top" id="toTop" type="button">
  <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 19V5"/><path d="m5 12 7-7 7 7"/></svg>
  กลับไปด้านบนเว็บไซต์
</button>
<script>
(()=>{const b=document.getElementById('toTop');if(!b)return;
const onS=()=>{const on=scrollY+innerHeight>=document.documentElement.scrollHeight-320&&scrollY>200;b.classList.toggle('show',on);document.body.classList.toggle('totop-on',on);};
addEventListener('scroll',onS,{passive:true});onS();
b.addEventListener('click',()=>scrollTo({top:0,behavior:'smooth'}));})();
</script>
<!-- scroll reveal -->
<script>
(()=>{ // animate content into view; respects reduced-motion
if(matchMedia('(prefers-reduced-motion: reduce)').matches)return;
const sel='.kicker,.news-head,.card,.partner,.qa-item,.qa-tile,.member-card,.board-card,.obj-list li,.ms-cat,.ms p,.vision-quote,.about-stat,.hotline,.rights-shell,.prose p,.obj-intro,.tabbar,.fb-embed,.table-wrap,.board-poster,.hub-card,.hub-side-item,.timeline li,.page-hero .logo-badge,.page-hero .lead,.foot';
const els=[...document.querySelectorAll(sel)].filter(el=>!el.closest('.rv'));
const groups=new Map();
els.forEach(el=>{el.classList.add('rv');
  const p=el.parentElement,i=groups.get(p)||0;
  el.style.setProperty('--rvd',Math.min(i*70,420)+'ms');groups.set(p,i+1)});
let pending=els.slice(),throttled=false;
const reveal=el=>{el.classList.add('in');
  setTimeout(()=>{el.classList.remove('rv','in');el.style.removeProperty('--rvd')},950+parseInt(el.style.getPropertyValue('--rvd')||0))};
const check=()=>{const vh=innerHeight;
  pending=pending.filter(el=>{const r=el.getBoundingClientRect();
    if(r.top<vh*.94){reveal(el);return false}return true});
  if(!pending.length){removeEventListener('scroll',onScroll);removeEventListener('resize',onScroll)}};
const onScroll=()=>{if(throttled)return;throttled=true;setTimeout(()=>{throttled=false;check()},90)};
addEventListener('scroll',onScroll,{passive:true});
addEventListener('resize',onScroll,{passive:true});
check();
})();
</script>
<?php
get_footer();
