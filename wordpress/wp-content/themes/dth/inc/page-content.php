<?php
/** เนื้อหาแต่ละหน้า (HTML block) แก้ได้ในหลังบ้าน */
if ( ! defined( 'ABSPATH' ) ) { exit; }
function dth_page_content_seed() {
	return array(
		'home' => '<!-- wp:html -->
<!-- ===== Hero slider (real DTH banners) ===== -->
[dth_hero]

<main id="main">

<!-- ===== Follow DTH (Facebook Page Plugin) ===== -->
<section class="block wash-mint" id="follow">
  <div class="wrap">
    <div class="kicker"><span class="ic" aria-hidden="true">📣</span><h2>ติดตาม DTH</h2><a href="https://www.facebook.com/disabilitiesth" target="_blank" rel="noopener" class="more see-all">ไปที่เพจ Facebook <span class="arr" aria-hidden="true">→</span></a></div>
    <div class="fb-embed">
      <iframe title="Facebook Page สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย"
        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdisabilitiesth&tabs=timeline&width=500&height=750&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true"
        width="500" height="750" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" loading="lazy"
        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
  </div>
</section>

<!-- ===== Rights tabs ===== -->
<section class="block" id="rights">
  <div class="wrap">
    <div class="rights-shell" data-rights-tabs>
      <div class="rights-head">
        <h2>สิทธิคนพิการที่ควรรู้</h2>
        <p>เลือกดูข้อมูลสำคัญตามหมวดที่ต้องการ เพื่อเข้าถึงสิทธิพื้นฐานและช่องทางช่วยเหลือได้รวดเร็วขึ้น</p>
      </div>
      <div class="rights-tabs" role="tablist" aria-label="หมวดสิทธิคนพิการ">
        <button class="rights-tab active" role="tab" aria-selected="true" data-target="r-id">บัตรคนพิการ</button>
        <button class="rights-tab" role="tab" aria-selected="false" data-target="r-allow">เบี้ยความพิการ</button>
        <button class="rights-tab" role="tab" aria-selected="false" data-target="r-edu">การศึกษาและการทำงาน</button>
        <button class="rights-tab" role="tab" aria-selected="false" data-target="r-help">ร้องเรียนและช่วยเหลือ</button>
      </div>
      <article class="rights-panel active" id="r-id" role="tabpanel">
        <div class="rights-copy">
          <span class="right-kicker">เอกสารสำคัญ</span>
          <h3>บัตรคนพิการ</h3>
          <p>จุดเริ่มต้นของการเข้าถึงสิทธิพื้นฐานหลายด้าน ทั้งสวัสดิการ การรักษาพยาบาล การศึกษา และสิ่งอำนวยความสะดวก</p>
          <ul class="rights-list"><li>เอกสารที่ต้องใช้ในการยื่นคำขอ</li><li>ขั้นตอนการออกบัตรและต่ออายุ</li><li>หน่วยงานและจุดบริการที่เกี่ยวข้อง</li></ul>
          <a href="https://dth.or.th/knowledge/45-%e0%b8%aa%e0%b8%96%e0%b8%b2%e0%b8%99%e0%b8%9e%e0%b8%a2%e0%b8%b2%e0%b8%9a%e0%b8%b2%e0%b8%a5%e0%b9%80%e0%b8%ad%e0%b8%81%e0%b8%8a%e0%b8%99/" target="_blank" rel="noopener" class="pill-btn rights-cta">ดูสถานพยาบาลที่ออกเอกสารรับรอง</a>
        </div>
        <div class="rights-media-card"><span class="badge">ข้อมูลอ้างอิง</span><h4>สรุปขั้นตอนทำบัตร</h4><div class="row"><span>ผู้มีสิทธิ</span><strong>คนพิการทุกประเภท</strong></div><div class="row"><span>สถานที่ยื่น</span><strong>พมจ. / รพ.รัฐ</strong></div><div class="row"><span>อายุบัตร</span><strong>8 ปี</strong></div></div>
      </article>
      <article class="rights-panel" id="r-allow" role="tabpanel">
        <div class="rights-copy">
          <span class="right-kicker">สวัสดิการ</span>
          <h3>เบี้ยความพิการ</h3>
          <p>สรุปข้อมูลที่ควรรู้ก่อนลงทะเบียนรับสิทธิ รวมถึงเงื่อนไข เอกสาร และการติดตามสถานะการรับเงิน</p>
          <ul class="rights-list"><li>คุณสมบัติและเงื่อนไขผู้มีสิทธิ</li><li>การยื่นคำขอและช่องทางติดตามผล</li><li>ข้อควรตรวจสอบเมื่อเงินยังไม่เข้า</li></ul>
          <a href="https://dth.or.th/infographic" target="_blank" rel="noopener" class="pill-btn rights-cta">ดูอินโฟกราฟิกสิทธิคนพิการ</a>
        </div>
        <div class="rights-media-card"><span class="badge">ข้อมูลอ้างอิง</span><h4>เบี้ยความพิการ</h4><div class="row"><span>ช่องทางยื่น</span><strong>อบต. / เทศบาล</strong></div><div class="row"><span>การจ่าย</span><strong>รายเดือน</strong></div><div class="row"><span>เอกสาร</span><strong>บัตรคนพิการ, ทะเบียนบ้าน</strong></div></div>
      </article>
      <article class="rights-panel" id="r-edu" role="tabpanel">
        <div class="rights-copy">
          <span class="right-kicker">โอกาสและอาชีพ</span>
          <h3>การศึกษาและการทำงาน</h3>
          <p>รวมสิทธิด้านทุนการศึกษา การฝึกอาชีพ และสิทธิในการจ้างงานที่ช่วยเพิ่มโอกาสและความมั่นคงในระยะยาว</p>
          <ul class="rights-list"><li>ทุนและสิทธิทางการศึกษาที่เกี่ยวข้อง</li><li>โครงการฝึกอาชีพและพัฒนาทักษะ</li><li>สิทธิการจ้างงานตามมาตรา 33/35</li></ul>
          <a href="https://www.jobfinfin.com/" target="_blank" rel="noopener" class="pill-btn rights-cta">ค้นหางานคนพิการ (Job Fin Fin)</a>
        </div>
        <div class="rights-media-card"><span class="badge">ข้อมูลอ้างอิง</span><h4>การจ้างงาน</h4><div class="row"><span>มาตรา 33</span><strong>จ้างงานโดยตรง</strong></div><div class="row"><span>มาตรา 35</span><strong>สัมปทาน/ฝึกงาน</strong></div><div class="row"><span>หน่วยงาน</span><strong>กรมการจัดหางาน</strong></div></div>
      </article>
      <article class="rights-panel" id="r-help" role="tabpanel">
        <div class="rights-copy">
          <span class="right-kicker">ขอความช่วยเหลือ</span>
          <h3>ร้องเรียนและประสานช่วยเหลือ</h3>
          <p>เมื่อเกิดปัญหาในการเข้าถึงสิทธิ การบริการ หรือสวัสดิการ ควรมีช่องทางที่ชัดเจนสำหรับแจ้งเรื่องและติดตามผล</p>
          <ul class="rights-list"><li>ช่องทางร้องเรียนเมื่อไม่ได้รับสิทธิ</li><li>การประสานหน่วยงานที่เกี่ยวข้อง</li><li>แนวทางเตรียมข้อมูลก่อนแจ้งเรื่อง</li></ul>
          <a href="#contact" class="pill-btn rights-cta">ดูช่องทางติดต่อ</a>
        </div>
        <div class="rights-media-card"><span class="badge">Quick Access</span><h4>ช่องทางติดต่อ</h4><div class="row"><span>สายด่วน</span><strong>1479</strong></div><div class="row"><span>โทรสมาคม</span><strong>02-354-4260</strong></div><div class="row"><span>อีเมล</span><strong>disabilitiesth@gmail.com</strong></div></div>
      </article>
    </div>
  </div>
</section>

<!-- ===== Q&A ===== -->
<section class="block wash-leaf" id="qa">
  <div class="wrap">
    <div class="qa-grid">
      <div class="qa-visual">
        <a class="qa-tile t1" href="{{HOME}}/about/">
          <span class="qa-logo"><img src="{{DTH}}/Pic/dth-logo.png" alt="" aria-hidden="true" onerror="this.style.display=\'none\'"></span>
          <h3>รู้จักการทำงาน<br>ของสมาคม</h3>
        </a>
        <a class="qa-tile t2" href="#network">
          <span class="qa-logos" aria-hidden="true">
            <img src="{{DTH}}/Pic/members/blind.png" alt="" onerror="this.style.display=\'none\'">
            <img src="{{DTH}}/Pic/members/deaf.png" alt="" onerror="this.style.display=\'none\'">
            <img src="{{DTH}}/Pic/members/physical.png" alt="" onerror="this.style.display=\'none\'">
            <img src="{{DTH}}/Pic/members/intellectual.jpg" alt="" onerror="this.style.display=\'none\'">
            <img src="{{DTH}}/Pic/members/autism.jpg" alt="" onerror="this.style.display=\'none\'">
            <img src="{{DTH}}/Pic/members/mental.jpg" alt="" onerror="this.style.display=\'none\'">
          </span>
          <h3>องค์การสมาชิก<br>และเครือข่าย</h3>
        </a>
      </div>
      <div>
        <div class="kicker"><span class="ic" aria-hidden="true">❓</span><h2>คำถามที่พบบ่อย</h2></div>
        <div class="qa-list">
          <a class="qa-item" href="https://dth.or.th/knowledge/45-%e0%b8%aa%e0%b8%96%e0%b8%b2%e0%b8%99%e0%b8%9e%e0%b8%a2%e0%b8%b2%e0%b8%9a%e0%b8%b2%e0%b8%a5%e0%b9%80%e0%b8%ad%e0%b8%81%e0%b8%8a%e0%b8%99/" target="_blank" rel="noopener"><span>ขอเอกสารรับรองความพิการได้ที่สถานพยาบาลใดบ้าง?</span><span class="arr" aria-hidden="true">→</span></a>
          <a class="qa-item" href="#rights"><span>ลงทะเบียนรับเบี้ยความพิการได้ที่ไหน?</span><span class="arr" aria-hidden="true">→</span></a>
          <a class="qa-item" href="#rights"><span>สิทธิการจ้างงานตามมาตรา 33 และ 35 ต่างกันอย่างไร?</span><span class="arr" aria-hidden="true">→</span></a>
          <a class="qa-item" href="#contact"><span>หากไม่ได้รับสิทธิที่ควรได้ จะร้องเรียนได้ทางใด?</span><span class="arr" aria-hidden="true">→</span></a>
        </div>
        <div style="margin-top:20px;display:flex;justify-content:flex-end"><a href="https://dth.or.th/knowledge" target="_blank" rel="noopener" class="see-all">ดูทั้งหมด <span class="arr" aria-hidden="true">→</span></a></div>
      </div>
    </div>
  </div>
</section>

<!-- ===== Network logos (real member organizations) ===== -->
<section class="block" id="network">
  <div class="wrap">
    <div class="kicker"><span class="ic" aria-hidden="true">🏛️</span><h2>องค์การสมาชิก 6 องค์การ</h2><a href="{{HOME}}/about/#members" class="more see-all">ข้อมูลติดต่อทุกสมาคม <span class="arr" aria-hidden="true">→</span></a></div>
    <div class="partners">
      <a class="partner" href="https://www.facebook.com/TabodThai?locale=th_TH" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/members/blind.png" alt="โลโก้สมาคมคนตาบอดแห่งประเทศไทย" loading="lazy" onerror="this.style.display=\'none\'"><span>สมาคมคนตาบอดแห่งประเทศไทย</span></a>
      <a class="partner" href="https://www.facebook.com/pikarnpanya.bangkok?locale=th_TH" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/members/intellectual.jpg" alt="โลโก้สมาคมผู้ปกครองคนพิการทางสติปัญญาแห่งประเทศไทย" loading="lazy" onerror="this.style.display=\'none\'"><span>สมาคมผู้ปกครองคนพิการทางสติปัญญาแห่งประเทศไทย</span></a>
      <a class="partner" href="https://www.facebook.com/APTAutismThailand?locale=th_TH" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/members/autism.jpg" alt="โลโก้สมาคมผู้ปกครองบุคคลออทิซึม (ไทย)" loading="lazy" onerror="this.style.display=\'none\'"><span>สมาคมผู้ปกครองบุคคลออทิซึม (ไทย)</span></a>
      <a class="partner" href="https://www.facebook.com/nadthailand?locale=th_TH" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/members/deaf.png" alt="โลโก้สมาคมคนหูหนวกแห่งประเทศไทย" loading="lazy" onerror="this.style.display=\'none\'"><span>สมาคมคนหูหนวกแห่งประเทศไทย</span></a>
      <a class="partner" href="https://www.facebook.com/disabledofthailand?locale=th_TH" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/members/physical.png" alt="โลโก้สมาคมคนพิการแห่งประเทศไทย" loading="lazy" onerror="this.style.display=\'none\'"><span>สมาคมคนพิการแห่งประเทศไทย</span></a>
      <a class="partner" href="https://www.facebook.com/amidmh.th?locale=th_TH" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/members/mental.jpg" alt="โลโก้สมาคมเพื่อผู้บกพร่องทางจิตแห่งประเทศไทย" loading="lazy" onerror="this.style.display=\'none\'"><span>สมาคมเพื่อผู้บกพร่องทางจิตแห่งประเทศไทย</span></a>
    </div>
  </div>
</section>

<!-- ===== Government / related orgs (real) ===== -->
<section class="block wash-mint">
  <div class="wrap">
    <div class="kicker"><span class="ic" aria-hidden="true">🏛️</span><h2>หน่วยงานที่เกี่ยวข้อง</h2></div>
    <div class="partners gov-partners">
      <a class="partner gov-partner" href="https://www.m-society.go.th/home.php" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/logos/logo-01.png" alt="กระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์" loading="lazy" onerror="this.style.display=\'none\'"><span>กระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์</span></a>
      <a class="partner gov-partner" href="https://dep.go.th/th/" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/logos/logo-04.png" alt="กรมส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ" loading="lazy" onerror="this.style.display=\'none\'"><span>กรมส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ</span></a>
      <a class="partner gov-partner" href="https://www.nhso.go.th" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/logos/logo-05.png" alt="สำนักงานหลักประกันสุขภาพแห่งชาติ" loading="lazy" onerror="this.style.display=\'none\'"><span>สำนักงานหลักประกันสุขภาพแห่งชาติ (สปสช.)</span></a>
      <a class="partner gov-partner" href="https://www.thaihealth.or.th" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/logos/logo-06.png" alt="สำนักงานกองทุนสนับสนุนการสร้างเสริมสุขภาพ" loading="lazy" onerror="this.style.display=\'none\'"><span>สำนักงานกองทุนสนับสนุนการสร้างเสริมสุขภาพ (สสส.)</span></a>
      <a class="partner gov-partner" href="https://www.doe.go.th/prd/main" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/logos/logo-12.png" alt="กรมการจัดหางาน" loading="lazy" onerror="this.style.display=\'none\'"><span>กรมการจัดหางาน</span></a>
      <a class="partner gov-partner" href="https://www.moe.go.th" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/logos/logo-13.png" alt="กระทรวงศึกษาธิการ" loading="lazy" onerror="this.style.display=\'none\'"><span>กระทรวงศึกษาธิการ</span></a>
      <a class="partner gov-partner" href="https://www.ohchr.org/en/treaty-bodies/crpd" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/logos/crpd.png" alt="คณะกรรมการว่าด้วยสิทธิคนพิการแห่งสหประชาชาติ" loading="lazy" onerror="this.style.display=\'none\'"><span>คณะกรรมการว่าด้วยสิทธิคนพิการแห่งสหประชาชาติ</span></a>
      <a class="partner gov-partner" href="https://www.internationaldisabilityalliance.org/" target="_blank" rel="noopener"><img src="{{DTH}}/Pic/logos/IDA-Logo.png" alt="International Disability Alliance" loading="lazy" onerror="this.style.display=\'none\'"><span>International Disability Alliance</span></a>
    </div>
  </div>
</section>

<!-- ===== Hotline ===== -->
<section class="block">
  <div class="wrap">
    <div class="hotline">
      <div class="l"><h3>สายด่วนคนพิการ</h3><p>กรมส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ</p></div>
      <a href="tel:1479" class="call" aria-label="โทรสายด่วนคนพิการ 1479"><svg class="im im-lg" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg> 1479</a>
    </div>
  </div>
</section>

<!-- ===== Contact ===== -->
<section class="block wash-leaf" id="contact">
  <div class="wrap">
    <div class="kicker"><span class="ic" aria-hidden="true">📍</span><h2>ติดต่อสมาคม</h2></div>
    <div class="cal-grid">
      <div class="card" style="padding:clamp(24px,3vw,34px)">
        <h3 style="color:var(--brand-dark);font-size:1.3rem;margin-bottom:14px">สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย</h3>
        <p style="color:var(--muted);margin-bottom:14px">255 ห้อง 6-8 ชั้น 3 อาคารศูนย์พัฒนาและฝึกอบรมคนพิการแห่งเอเชียและแปซิฟิก (APCD) ถนนราชวิถี แขวงทุ่งพญาไท เขตราชเทวี กรุงเทพมหานคร 10400</p>
        <p style="color:var(--muted);margin-bottom:8px"><svg class="im im-lg" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg> disabilitiesth@gmail.com</p>
        <a href="tel:023544260" class="pill-btn"><svg class="im im-lg" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg> 02-354-4260</a>
      </div>
      <div class="card" style="overflow:hidden;min-height:320px;padding:0"><iframe title="แผนที่ตั้งสมาคม" loading="lazy" style="width:100%;height:100%;min-height:320px;border:0;display:block" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.15139515162!2d100.52614701483063!3d13.769742190335837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29952a2cdf38b%3A0x184a992ec58439a3!2z4Liq4Lih4Liy4LiE4Lih4Liq4Lig4Liy4LiE4LiZ4Lie4Li04LiB4Liy4Lij4LiX4Li44LiB4Lib4Lij4Liw4LmA4Lig4LiX4LmB4Lir4LmI4LiH4Lib4Lij4Liw4LmA4LiX4Lio4LmE4LiX4Lii!5e0!3m2!1sen!2sth!4v1649090216442!5m2!1sen!2sth"></iframe></div>
    </div>
  </div>
</section>

</main>
<!-- /wp:html -->',
		'about' => '<!-- wp:html -->
<!-- ===== Breadcrumb ===== -->
<nav class="breadcrumb" aria-label="เส้นทางนำทาง">
  <div class="wrap"><a href="{{HOME}}/">หน้าแรก</a> <span aria-hidden="true">›</span> <span>เกี่ยวกับเรา</span> <span aria-hidden="true">›</span> <strong>ความเป็นมาของสมาคมฯ</strong></div>
</nav>

<!-- ===== Page hero ===== -->
<section class="page-hero">
  <div class="ic-row"><span class="ic" aria-hidden="true">🧩</span><h1>เกี่ยวกับสมาคม</h1></div>
  <div class="logo-badge"><img src="{{DTH}}/Pic/dth-logo.png" alt="โลโก้สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย" onerror="this.parentElement.textContent=\'DTH\'"></div>
  <p class="lead">
    <strong>สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย (Disabilities Thailand — DTH)</strong>
    เป็น<strong>องค์กรร่ม (Umbrella Organization)</strong> ของขบวนการคนพิการระดับชาติ
    ทำหน้าที่เป็นผู้แทนและปากเสียงของคนพิการทุกประเภท เพื่อขับเคลื่อนสิทธิ สวัสดิการ
    และโอกาสที่เท่าเทียม สู่การมีส่วนร่วมในสังคมอย่างเต็มที่และเสมอภาคของคนพิการทุกคน
  </p>
</section>

<main id="main">

<!-- ===== History (ข้อความทางการจาก dth.or.th/about — คงเนื้อหาครบถ้วน) ===== -->
<section class="block" id="history">
  <div class="wrap">
    <div class="kicker"><span class="ic" aria-hidden="true">📜</span><h2>ความเป็นมา</h2></div>
    <div class="prose">
      <p>สภาคนพิการทุกประเภทแห่งประเทศไทย กำเนิดขึ้นหลังปีคนพิการสากล เมื่อวันที่ 20 ตุลาคม 2526 โดยแกนนำคนพิการหลายท่านในขณะนั้น ซึ่งได้รับแรงบันดาลใจจากการเข้าร่วมประชุมสมัชชาคนพิการ</p>
      <p>“คนพิการสากล” (DISABLED PEOPLE’S INTERNATIONAL) ณ ประเทศสิงคโปร์ ในปี พ.ศ. 2524 ซึ่งมีวัตถุประสงค์ (ธีม) หลัก คือ “คนพิการควรจะมีสิทธิเข้ามีส่วนร่วมในสังคมอย่างเต็มที่และเสมอภาค (Full Participation and Equality) เช่นบุคคลทั่วไปในฐานะที่เป็นส่วนหนึ่งของสังคม”</p>
      <p>ด้วยเหตุที่ตระหนักดีในสภาพความเป็นจริงว่าคนพิการในประเทศไทยได้ถูกละเลยทอดทิ้งจากรัฐและสังคมมาเป็นเวลานาน คนพิการไม่เคยได้มีสิทธิ และโดยที่คนพิการแต่ละประเภทในประเทศไทยมิได้รวมตัวเป็นอันหนึ่งอันเดียวกันทำให้ขาดพลังในการขับเคลื่อนนโยบายและกฎหมายที่เกี่ยวข้องกับคนพิการ</p>
      <p>ดังนั้นผู้นำคนพิการประเภทต่างๆ เช่น ผู้นำสมาคมคนตาบอดแห่งประเทศไทย ผู้นำสมาคมคนหูหนวกแห่งประเทศไทย ผู้นำสมาคมคนพิการแห่งประเทศไทย และผู้นำสมาคมผู้ปกครองเพื่อคนพิการทางสติปัญญาแห่งประเทศไทย จึงได้ร่วมประชุมปรึกษาหารือกัน เพื่อจะรวมตัวกันเป็นองค์กรเดียวเพื่อทำหน้าที่เป็นผู้แทน เป็นปากเสียงให้กับคนพิการทั้งมวล โดยรณรงค์เรียกร้องให้มีกฎหมาย มีระเบียบข้อบังคับที่จะให้ประโยชน์ต่อคนพิการทุกประเภท ในที่สุดเมื่อวันที่ 20-22 ตุลาคม 2526 ที่จังหวัดเชียงใหม่ โดยมีคนพิการทุกประเภทและตัวแทนจากทั่วทุกภูมิภาคของประเทศไทยเข้าร่วมประชุมและมีมติให้จัดตั้ง “สภาคนพิการทุกประเภทแห่งประเทศไทย”</p>
      <p>ปัจจุบันสภาคนพิการทุกประเภทแห่งประเทศไทยเป็นองค์การขับเคลื่อนเชิงนโยบายด้านคนพิการระดับชาติ ซึ่งถูกรับรองฐานะไว้ในพระราชบัญญัติส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ พ.ศ. 2550 เป็นองค์กรร่ม (Umbrella Organization) มีสมาชิกสามัญถาวร คือ องค์การด้านคนพิการแต่ละประเภทระดับชาติ 6 องค์การ ได้แก่ สมาคมคนตาบอดแห่งประเทศไทย สมาคมคนหูหนวกแห่งประเทศไทย สมาคมคนพิการแห่งประเทศไทย สมาคมเพื่อคนพิการทางสติปัญญาแห่งประเทศไทย สมาคมเพื่อผู้บกพร่องทางจิตแห่งประเทศไทย และสมาคมผู้ปกครองบุคคลออทิซึม(ไทย) รวมทั้งมีสมาชิกสามัญทั่วไป ได้แก่ สภาคนพิการทุกประเภทประจำจังหวัดที่เป็นสาขาอยู่ใน 77 จังหวัด อีกทั้งยังมีสมาชิกวิสามัญซึ่งเป็นภาคีเครือข่ายองค์กรด้านคนพิการอื่น</p>
      <div class="about-stat">
        <div><div class="num">2526</div><div class="lab">ปีที่ก่อตั้ง (พ.ศ.)</div></div>
        <div><div class="num">6</div><div class="lab">องค์การสมาชิกระดับชาติ</div></div>
        <div><div class="num">77</div><div class="lab">สภาคนพิการประจำจังหวัด</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ===== Objectives (ข้อบังคับฯ ข้อ 4 — คงเนื้อหาครบถ้วน) ===== -->
<section class="block wash-leaf">
  <div class="wrap">
    <div class="kicker"><span class="ic" aria-hidden="true">🧭</span><h2>วัตถุประสงค์</h2></div>
    <ol class="obj-list">
      <li>เสนอแนะ แก้ไขเพิ่มเติม ขับเคลื่อน และติดตามการบังคับใช้ กฎหมาย นโยบาย ยุทธศาสตร์ แผนงาน ตลอดจนพันธกรณีระหว่างประเทศ เพื่อการส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ รวมทั้งผลักดันให้มีการผนวกรวมประเด็นคนพิการเข้าสู่การพัฒนากระแสหลัก</li>
      <li>เป็นสภาคนพิการทุกประเภทแห่งประเทศไทย เพื่อเสริมสร้างความเข้มแข็งและการมีธรรมาภิบาลขององค์การคนพิการแต่ละประเภทและองค์กรด้านคนพิการ</li>
      <li>ส่งเสริมและสนับสนุนการพัฒนาเครือข่ายองค์กรด้านคนพิการ เพื่อให้เกิดการทำงานร่วมกันอย่างเป็นปึกแผ่นและมีเอกภาพระหว่างคนพิการแต่ละประเภท โดยเฉพาะผ่านกลไกสภาคนพิการทุกประเภทประจำจังหวัด</li>
      <li>ส่งเสริมและสนับสนุนการมีส่วนร่วมขององค์การคนพิการแต่ละประเภทและองค์กรของคนพิการในฐานะเป็นหุ้นส่วนกับภาครัฐ ภาคธุรกิจเอกชน และภาคประชาสังคม ให้ได้รับการยอมรับอย่างมีศักดิ์ศรีและเท่าเทียมกัน เพื่อการพัฒนาที่ยั่งยืน</li>
      <li>เสริมสร้างความเข้าใจและเจตคติเชิงสร้างสรรค์ต่อคนพิการและความพิการ</li>
      <li>ทำหน้าที่พิทักษ์สิทธิคนพิการ และเป็นผู้ร้องขอหรือฟ้องคดีแทนองค์การคนพิการแต่ละประเภทหรือองค์กรด้านคนพิการเฉพาะในกรณีที่มีผลกระทบต่อคนพิการโดยรวม รวมทั้งส่งเสริมให้สมาชิกให้บริการและความช่วยเหลือต่างๆ แก่คนพิการ</li>
      <li>ทำหน้าที่เป็นองค์กรประสานงานร่วมขององค์การคนพิการแต่ละประเภท รวมถึงการเข้าร่วมเป็นผู้แทนในคณะกรรมการหรือคณะอนุกรรมการตามที่กฎหมายกำหนดให้ผู้แทนองค์กรคนพิการระดับชาติเป็นกรรมการหรืออนุกรรมการ</li>
      <li>ดำเนินกิจการกระจายเสียง กิจการโทรทัศน์ และกิจการสื่อสารอื่น ด้านการส่งเสริมและพัฒนาคุณภาพชีวิตของคนพิการเพื่อประโยชน์สาธารณะโดยไม่แสวงผลกำไร</li>
      <li>ส่งเสริมและสนับสนุนการศึกษาวิจัยและงานวิชาการ เพื่อนำไปใช้ในการขับเคลื่อนและติดตามการบังคับใช้กฎหมายและนโยบายด้านคนพิการ</li>
      <li>ไม่เกี่ยวข้องกับการเมืองและมีวัตถุประสงค์ไม่ค้ากำไร</li>
    </ol>
  </div>
</section>

<!-- ===== Vision (ข้อความทางการ — คงเนื้อหาครบถ้วน) ===== -->
<section class="block wash-mint">
  <div class="wrap">
    <div class="vm-head"><span class="ic" aria-hidden="true">🎯</span><h2>วิสัยทัศน์</h2></div>
    <blockquote class="vision-quote">
      <p>“สภาคนพิการทุกประเภทแห่งประเทศไทยเข้มแข็ง มีธรรมาภิบาล เป็นกลไกหลักร่วมกับองค์การคนพิการแต่ละประเภทในการขับเคลื่อนนโยบายด้านคนพิการ และเป็นหุ้นส่วนสำคัญในการพัฒนาที่ยั่งยืน”</p>
    </blockquote>
  </div>
</section>

<!-- ===== Mission (ข้อความทางการ — คงเนื้อหาครบถ้วน) ===== -->
<section class="block">
  <div class="wrap">
    <div class="vm-head"><span class="ic" aria-hidden="true">🚩</span><h2>พันธกิจ</h2></div>
    <ol class="obj-list mission-list">
      <li>เสริมสร้างความเข้มแข็ง ความเป็นปึกแผ่น และการมีธรรมาภิบาลของสภาคนพิการทุกประเภทแห่งประเทศไทยและสภาคนพิการทุกประเภทประจำจังหวัด</li>
      <li>ขับเคลื่อนและติดตามการบังคับใช้กฎหมาย นโยบาย ยุทธศาสตร์ แผนงาน ตลอดจนพันธกรณีระหว่างประเทศ เพื่อการส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ รวมทั้งผลักดันให้มีการผนวกรวมประเด็นคนพิการเข้าสู่การพัฒนากระแสหลัก</li>
      <li>ส่งเสริมและสนับสนุนการมีส่วนร่วมของสภาคนพิการทุกประเภทแห่งประเทศไทยและสภาคนพิการทุกประเภทประจำจังหวัด ในฐานะเป็นหุ้นส่วนกับภาครัฐ ภาคเอกชน และภาคส่วนอื่น เพื่อการพัฒนาที่ยั่งยืน</li>
    </ol>
  </div>
</section>

<!-- ===== Board (รายนามทางการ — คงเนื้อหาครบถ้วน) ===== -->
<section class="block" id="board">
  <div class="wrap">
    <div class="kicker"><span class="ic" aria-hidden="true">👥</span><h2>คณะกรรมการบริหารสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย ชุดปัจจุบัน</h2></div>

    <div class="board-grid">
      <figure class="board-card"><img src="{{DTH}}/Pic/รูปนายก/cut/board-witthayut.png" alt="นายวิทยุต บุนนาค" loading="lazy" onerror="this.style.display=\'none\'"><figcaption><strong>นายวิทยุต  บุนนาค</strong><span>นายกสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย/ประธานฝ่ายศิลปะ วัฒนธรรม และภาษา</span></figcaption></figure>
      <figure class="board-card"><img src="{{DTH}}/Pic/รูปนายก/cut/board-ekkamon.png" alt="นายเอกกมล แพทยานันท์" loading="lazy" onerror="this.style.display=\'none\'"><figcaption><strong>นายเอกกมล  แพทยานันท์</strong><span>อุปนายก คนที่ 1/เหรัญญิก/ประธานฝ่ายต่างประเทศและขับเคลื่อนนโยบายสาธารณะ</span></figcaption></figure>
      <figure class="board-card"><img src="{{DTH}}/Pic/รูปนายก/cut/board-suchart.png" alt="นายสุชาติ โอวาทวรรณสกุล" loading="lazy" onerror="this.style.display=\'none\'"><figcaption><strong>นายสุชาติ  โอวาทวรรณสกุล</strong><span>อุปนายก คนที่ 2</span></figcaption></figure>
      <figure class="board-card"><img src="{{DTH}}/Pic/รูปนายก/cut/board-choosak.png" alt="นายชูศักดิ์ จันทยานนท์" loading="lazy" onerror="this.style.display=\'none\'"><figcaption><strong>นายชูศักดิ์   จันทยานนท์</strong><span>อุปนายก คนที่ 3/เลขาธิการ/ประธานฝ่ายวิสาหกิจเพื่อสังคม</span></figcaption></figure>
      <figure class="board-card"><img src="{{DTH}}/Pic/รูปนายก/cut/board-nutcharee.png" alt="นางนุชจารี คล้ายสุวรรณ" loading="lazy" onerror="this.style.display=\'none\'"><figcaption><strong>นางนุชจารี  คล้ายสุวรรณ</strong><span>อุปนายก คนที่ 4/ปฏิคม</span></figcaption></figure>
      <figure class="board-card"><img src="{{DTH}}/Pic/รูปนายก/cut/board-suphachip.png" alt="นายศุภชีพ ดิษเทศ" loading="lazy" onerror="this.style.display=\'none\'"><figcaption><strong>นายศุภชีพ  ดิษเทศ</strong><span>อุปนายก คนที่ 5/นายทะเบียน</span></figcaption></figure>
    </div>

    <div class="board-layout">
    <div class="table-wrap">
      <table class="board-table">
        <thead>
          <tr><th scope="col">ที่</th><th scope="col">ชื่อ-นามสกุล</th><th scope="col">ตำแหน่ง</th></tr>
        </thead>
        <tbody>
          <tr><td>1</td><td>นายวิทยุต  บุนนาค</td><td>นายกสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย/ประธานฝ่ายศิลปะ วัฒนธรรม และภาษา</td></tr>
          <tr><td>2</td><td>นายเอกกมล  แพทยานันท์</td><td>อุปนายก คนที่ 1/เหรัญญิก/ประธานฝ่ายต่างประเทศและขับเคลื่อนนโยบายสาธารณะ</td></tr>
          <tr><td>3</td><td>นายสุชาติ  โอวาทวรรณสกุล</td><td>อุปนายก คนที่ 2</td></tr>
          <tr><td>4</td><td>นายชูศักดิ์   จันทยานนท์</td><td>อุปนายก คนที่ 3/เลขาธิการ/ประธานฝ่ายวิสาหกิจเพื่อสังคม</td></tr>
          <tr><td>5</td><td>นางนุชจารี  คล้ายสุวรรณ</td><td>อุปนายก คนที่ 4/ปฏิคม</td></tr>
          <tr><td>6</td><td>นายศุภชีพ  ดิษเทศ</td><td>อุปนายก คนที่ 5/นายทะเบียน</td></tr>
          <tr><td>7</td><td>นางกัณฐมณี พฤกษะวัน</td><td>กรรมการ/ประธานฝ่ายประชาสัมพันธ์และสื่อสารองค์กร</td></tr>
          <tr><td>8</td><td>นายกิตติพงษ์ หาดทวายกาญจน์</td><td>กรรมการ/ประธานฝ่ายการท่องเที่ยวและกีฬา</td></tr>
          <tr><td>9</td><td>นายชัชชัย วิจิตรจรรยา</td><td>กรรมการ/ประธานฝ่ายเทคโนโลยีสารสนเทศและการสื่อสาร</td></tr>
          <tr><td>10</td><td>นางสาวญาณี ชีวะเจริญ</td><td>กรรมการ/ประธานฝ่ายจิตอาสาและพัฒนาศักยภาพ</td></tr>
          <tr><td>11</td><td>นายเทวพงษ์ พวงเพชร</td><td>กรรมการ/ประธานฝ่ายส่งเสริมและพัฒนาผู้นำคนพิการ</td></tr>
          <tr><td>12</td><td>นายปราโมทย์ ธรรมสโรช</td><td>กรรมการ/ประธานฝ่ายการศึกษา</td></tr>
          <tr><td>13</td><td>นายพลทร ขุนสะอาด</td><td>กรรมการ/ประธานฝ่ายเด็กและเยาวชน</td></tr>
          <tr><td>14</td><td>นายภัทรพันธุ์ กฤษณา</td><td>กรรมการ/ประธานฝ่ายสิ่งอำนวยความสะดวกสำหรับคนพิการ</td></tr>
          <tr><td>15</td><td>นางวาสนา สำลีรัตน์</td><td>กรรมการ/ประธานฝ่ายสวัสดิการ</td></tr>
          <tr><td>16</td><td>นายสมชาย ปัญญ์เอกวงศ์</td><td>กรรมการ/ประธานฝ่ายกฎหมายและสิทธิมนุษยชน</td></tr>
          <tr><td>17</td><td>นายสุบิน แบขุนทด</td><td>กรรมการ/ประธานฝ่ายส่งเสริมอาชีพและการจ้างงาน</td></tr>
          <tr><td>18</td><td>นางสาวอรุณวดี ลิ้มอังกูร</td><td>กรรมการ/ประธานฝ่ายการแพทย์</td></tr>
          <tr><td>19</td><td>นางอรุณี ลิ้มมณี</td><td>กรรมการ/ประธานฝ่ายสตรีและกลุ่มเป้าหมายพิเศษ</td></tr>
          <tr><td>20</td><td>นางกัญญาวีร์ แขวงโสภา</td><td>กรรมการ</td></tr>
          <tr><td>21</td><td>นางสาวกิจจาพร ชื่นบุญ</td><td>กรรมการ</td></tr>
          <tr><td>22</td><td>นางสาวฐิติพร พริ้งเพลิด</td><td>กรรมการ</td></tr>
          <tr><td>23</td><td>นางฑิฆัมพร บุญศรี</td><td>กรรมการ</td></tr>
          <tr><td>24</td><td>นางณัชชา กู้สุจริต</td><td>กรรมการ</td></tr>
          <tr><td>25</td><td>นางสาวปรียาพรรณ มีษา</td><td>กรรมการ</td></tr>
          <tr><td>26</td><td>นางสาวพัตสุณี สุรินทร์</td><td>กรรมการ</td></tr>
          <tr><td>27</td><td>นายภักดี พิกุลหอม</td><td>กรรมการ</td></tr>
          <tr><td>28</td><td>นางวันเพ็ญ นิภานันท์</td><td>กรรมการ</td></tr>
          <tr><td>29</td><td>นายสามารถ ห้องกระจก</td><td>กรรมการ</td></tr>
          <tr><td>30</td><td>นายสุรเชษฐ์ คำนวล</td><td>กรรมการ</td></tr>
        </tbody>
      </table>
    </div>
    <figure class="board-poster">
      <a href="{{DTH}}/Pic/board-executives.png" target="_blank" rel="noopener" aria-label="ดูภาพคณะผู้บริหารขนาดเต็ม">
        <img src="{{DTH}}/Pic/board-executives.png" alt="ภาพคณะผู้บริหารสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย" loading="lazy" onerror="this.closest(\'figure\').style.display=\'none\'">
      </a>
      <figcaption>คณะผู้บริหารสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย — คลิกเพื่อดูภาพขนาดเต็ม</figcaption>
    </figure>
    </div>
  </div>
</section>

<!-- ===== Milestones (ข้อความทางการ — คงเนื้อหาครบถ้วน) ===== -->
<section class="block wash-mint" id="milestones">
  <div class="wrap">
    <div class="kicker"><span class="ic" aria-hidden="true">🏆</span><h2>ผลงานที่ภาคภูมิใจ</h2></div>
    <div class="ms">
      <h3 class="ms-cat">ด้านกฎหมาย</h3>
      <p><strong>ปี 2534</strong> สภาคนพิการฯ สามารถผลักดันพระราชบัญญัติการฟื้นฟูสมรรถภาพคนพิการ พ.ศ. 2534 ซึ่งเป็นกฎหมายฉบับแรกด้านคนพิการ ทำให้เกิดหน่วยงานและคณะกรรมการที่ทำงานเรื่องคนพิการเป็นรูปธรรม มีการจดทะเบียนและให้บริการแก่คนพิการในด้านต่างๆ เช่น การฟื้นฟูสมรรถภาพทางการแพทย์ การศึกษา การประกอบอาชีพ และการได้รับสิ่งอำนวยความสะดวก</p>
      <p><strong>ปี 2540</strong> สภาคนพิการฯ ผลักดันให้รัฐธรรมนูญปี 2540 บัญญัติเรื่องสิทธิของคนพิการไว้ได้สำเร็จ “มาตรา 55 บุคคลซึ่งพิการหรือทุพพลภาพ มีสิทธิได้รับสิ่งอำนวยความสะดวก อันเป็นสาธารณะและความช่วยเหลืออื่นจากรัฐ ทั้งนี้ ตามที่กฎหมายบัญญัติ”</p>
      <p><strong>ปี 2550</strong> สภาคนพิการฯ ผลักดันให้ รัฐธรรมนูญปี 2550 บัญญัติเรื่องการห้ามเลือกปฏิบัติโดยไม่เป็นธรรมต่อบุคคลเพราะเหตุแห่ง “ความพิการ” ไว้เป็นครั้งแรกในมาตรา 30 และปฏิรูปพระราชบัญญัติการฟื้นฟูสมรรถภาพคนพิการ พ.ศ. 2534 ให้เป็นพระราชบัญญัติส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ พ.ศ. 2550 ที่เปลี่ยนจาก “ฐานคิดแบบเวทนานิยม/สงเคราะห์/ช่วยเหลือ” เป็น “ฐานสิทธิ”</p>
      <p><strong>ปี 2551</strong> สภาคนพิการฯ ผลักดันให้มีการประกาศใช้ พระราชบัญญัติการจัดการศึกษาสำหรับคนพิการ พ.ศ. 2551</p>
      <p><strong>ปี 2560-2561</strong> สภาคนพิการฯ ผลักดันให้มีการแก้ไขพระราชบัญญัติลิขสิทธิ์ พ.ศ. 2537 เพื่อกำหนดให้คนพิการได้รับโอกาสอย่างเท่าเทียมกับบุคคลอื่นในการเข้าถึงงานอันมีลิขสิทธิ์ โดยให้สามารถทำซ้ำหรือดัดแปลงงานอันมีลิขสิทธิ์ เช่น วรรณกรรม ศิลปกรรม ให้อยู่ในรูปแบบที่คนพิการเข้าถึงได้ เช่น อักษรเบรลล์ ภาษามือ รวมทั้งเพื่อให้ประเทศไทยเข้าเป็นภาคีแห่งสนธิสัญญามาร์ราเคช (Marrakesh Treaty) ขององค์การทรัพย์สินทางปัญญาโลก</p>
      <p><strong>ปี 2561</strong> สภาคนพิการฯ ได้จัดทำข้อเสนอต่อร่างพระราชบัญญัติการศึกษาแห่งชาติ พ.ศ. …. ฉบับรับฟังความคิดเห็นวันที่ 15 มิถุนายน 2561 โดยคณะกรรมการอิสระเพื่อการปฏิรูปการศึกษา เพื่อขอให้ 1) ใส่คำว่า“คนพิการ” ไว้ทั้งในบทนิยามและในทุกมาตราที่เกี่ยวข้อง 2) เพิ่มศูนย์การเรียนเฉพาะความพิการ 3) กำหนดให้คนพิการสามารถเข้าถึงและใช้ประโยชน์ได้จากบริการสารสนเทศด้านการศึกษา 4) ขอให้มีการจัดชั้นเรียนในรูปแบบที่สอดคล้องกับความต้องการจำเป็นพิเศษทางการศึกษา และ 5) ขอให้บัญญัติคำว่า “ออทิสติก” ไว้ในกฎหมายอันจะช่วยให้บุคคลออทิสติกได้รับสิทธิทางการศึกษา</p>
      <h3 class="ms-cat">ด้านนโยบาย</h3>
      <p><strong>ปี 2559-2561</strong> ให้คนพิการที่เป็นผู้ประกันตนตามกฎหมายประกันสังคมที่ได้รับประโยชน์ทดแทนจากการเจ็บป่วย สามารถเลือกรับบริการสาธารณสุขจากกฎหมายว่าด้วยหลักประกันสุขภาพแห่งชาติ (บัตรทอง) อย่างใดอย่างหนึ่งแทนได้</p>
      <p><strong>ปี 2560-2561</strong> สภาคนพิการฯ ผลักดันให้คนพิการและผู้ดูแลคนพิการสามารถเข้าถึง “การกู้ยืมเงินทุนเพื่อใช้ในการประกอบอาชีพ” ได้ง่ายขึ้นเร็วขึ้นไม่ติดขัด โดยผู้ขอกู้ยืมเงินทุนประกอบอาชีพเป็นรายบุคคลซึ่งเป็นคนพิการหรือผู้ดูแลคนพิการ สามารถขอกู้ยืมเงินในท้องที่ใดที่ตนได้ประกอบอาชีพอยู่อย่างแท้จริงได้ โดยไม่จำเป็นจะต้องเป็นภูมิลำเนาตามทะเบียนบ้านอีกต่อไป และให้นิติบุคคล (องค์การคนพิการแต่ละประเภท/สมาคมต่าง ๆ) สามารถค้ำประกันผู้ขอกู้ทั้งที่เป็นรายบุคคลหรือรายกลุ่มก็ได้</p>
      <h3 class="ms-cat">ด้านการพัฒนาเครือข่าย</h3>
      <p><strong>ปี 2526-2560</strong> สภาคนพิการฯ ได้จัด “สมัชชาคนพิการแห่งชาติ” ต่อเนื่องมาเป็นระยะเวลาเกือบ 30 ปี โดยเป็นงานประจำปีที่ผู้นำคนพิการทั่วประเทศได้มีโอกาสมาพบปะพูดคุยแลกเปลี่ยน รวมทั้งกำหนดแนวนโยบายการทำงานของสภาคนพิการฯ ร่วมกัน เช่น ปีที่ผ่านมาเน้นเรื่องการสร้างความเข้มแข็งให้แก่สภาคนพิการจังหวัดทั้ง 77 จังหวัด</p>
      <h3 class="ms-cat">ด้านพิทักษ์คุ้มครองสิทธิของคนพิการ</h3>
      <p><strong>ปี 2560-2561</strong> สภาคนพิการฯ ฟ้องศาลปกครองกลางให้เพิกถอนคำสั่งของกระทรวงการคลังที่ขอให้กองทุนส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการนำเงินสภาพคล่องส่วนที่เกินความจำเป็นของทุนหมุนเวียนส่งคลังเป็นรายได้แผ่นดิน จำนวน 2,000 ล้านบาท</p>
      <h3 class="ms-cat">ด้านต่างประเทศ</h3>
      <p><strong>ปี 2559</strong> สภาคนพิการฯ ได้ร่วมมือกับมูลนิธิสถาบันวิจัยเพื่อการพัฒนาคนพิการ ประเทศไทย จัดทำ”รายงานคู่ขนานการปฏิบัติตามอนุสัญญาว่าด้วยสิทธิคนพิการของประเทศไทย” ซึ่งประเทศไทยเป็นประเทศแรกในอาเซียนที่จัดทำรายงานคู่ขนาน และได้ไปนำเสนอรายงานดังกล่าวต่อคณะกรรมการว่าด้วยสิทธิคนพิการแห่งสหประชาชาติ ที่นครเจนีวา สวิสเซอร์แลนด์ เมื่อวันที่ 30 มีนาคม 2559</p>
    </div>
  </div>
</section>

<!-- ===== Member organizations ===== -->
<section class="block wash-leaf" id="members">
  <div class="wrap">
    <div class="kicker"><span class="ic" aria-hidden="true">🏛️</span><h2>องค์การสมาชิก 6 องค์การ</h2></div>
    <div class="members-grid">

      <div class="member-card">
        <div class="mc-head">
          <img src="{{DTH}}/Pic/members/blind.png" alt="โลโก้สมาคมคนตาบอดแห่งประเทศไทย" onerror="this.style.display=\'none\'">
          <h3>สมาคมคนตาบอดแห่งประเทศไทย</h3>
        </div>
        <div class="mc-info">
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg> 85/1-2 ซอยบุญอยู่ ถ.ดินแดง แขวงสามเสนใน เขตพญาไท กทม. 10400</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg> <a href="tel:022476031">02-247-6031</a> ต่อ 304</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg> โทรสาร 02-245-9846</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg> <a href="mailto:sarabun@tab.or.th">sarabun@tab.or.th</a></span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg> <a href="https://www.tab.or.th/" target="_blank" rel="noopener">www.tab.or.th</a></span>
        </div>
        <a class="pill-btn ghost mc-fb" href="https://www.facebook.com/TabodThai?locale=th_TH" target="_blank" rel="noopener">Facebook Page →</a>
      </div>

      <div class="member-card">
        <div class="mc-head">
          <img src="{{DTH}}/Pic/members/intellectual.jpg" alt="โลโก้สมาคมผู้ปกครองคนพิการทางสติปัญญาแห่งประเทศไทย" onerror="this.style.display=\'none\'">
          <h3>สมาคมผู้ปกครองคนพิการทางสติปัญญาแห่งประเทศไทย</h3>
        </div>
        <div class="mc-info">
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg> 49/6 ซ.รามอินทรา 8 (วัดไตรรัตนาราม) เขตบางเขน กทม. 10220</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg> <a href="tel:029719727">02-971-9727</a></span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg> โทรสาร 02-552-1606</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg> <a href="mailto:pikarnpanya@gmail.com">pikarnpanya@gmail.com</a></span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg> <a href="https://apidth.com/" target="_blank" rel="noopener">apidth.com</a></span>
        </div>
        <a class="pill-btn ghost mc-fb" href="https://www.facebook.com/pikarnpanya.bangkok?locale=th_TH" target="_blank" rel="noopener">Facebook Page →</a>
      </div>

      <div class="member-card">
        <div class="mc-head">
          <img src="{{DTH}}/Pic/members/autism.jpg" alt="โลโก้สมาคมผู้ปกครองบุคคลออทิซึม (ไทย)" onerror="this.style.display=\'none\'">
          <h3>สมาคมผู้ปกครองบุคคลออทิซึม (ไทย)</h3>
        </div>
        <div class="mc-info">
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg> 140/47 ถ.อิสรภาพ 39 แขวงบ้านช่างหล่อ เขตบางกอกน้อย กทม. 10700</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg> <a href="tel:024112899">02-411-2899</a></span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg> โทรสาร 02-866-7125</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg> <a href="mailto:autisticthai@gmail.com">autisticthai@gmail.com</a></span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg> <a href="https://autism.autisticthai.com/" target="_blank" rel="noopener">autism.autisticthai.com</a></span>
        </div>
        <a class="pill-btn ghost mc-fb" href="https://www.facebook.com/APTAutismThailand?locale=th_TH" target="_blank" rel="noopener">Facebook Page →</a>
      </div>

      <div class="member-card">
        <div class="mc-head">
          <img src="{{DTH}}/Pic/members/deaf.png" alt="โลโก้สมาคมคนหูหนวกแห่งประเทศไทย" onerror="this.style.display=\'none\'">
          <h3>สมาคมคนหูหนวกแห่งประเทศไทย</h3>
        </div>
        <div class="mc-info">
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg> 1/8 ซอยอ่อนนุช 64 แขวงอ่อนนุช เขตสวนหลวง กรุงเทพฯ 10250</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg> <a href="tel:020127459">02-012-7459-60</a></span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg> โทรสาร 02-012-7461</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg> <a href="mailto:nadt.info@gmail.com">nadt.info@gmail.com</a></span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg> <a href="https://www.nadt.or.th/" target="_blank" rel="noopener">www.nadt.or.th</a></span>
        </div>
        <a class="pill-btn ghost mc-fb" href="https://www.facebook.com/nadthailand?locale=th_TH" target="_blank" rel="noopener">Facebook Page →</a>
      </div>

      <div class="member-card">
        <div class="mc-head">
          <img src="{{DTH}}/Pic/members/physical.png" alt="โลโก้สมาคมคนพิการแห่งประเทศไทย" onerror="this.style.display=\'none\'">
          <h3>สมาคมคนพิการแห่งประเทศไทย</h3>
        </div>
        <div class="mc-info">
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg> 77/4-5 หมู่ 2 ถนนชัยพฤกษ์ ต.คลองพระอุดม อ.ปากเกร็ด จ.นนทบุรี 11120</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg> <a href="tel:021471820">02-147-1820</a>, <a href="tel:021471821">02-147-1821</a></span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg> โทรสาร 02-147-2507</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg> <a href="mailto:apht2005@hotmail.com">apht2005@hotmail.com</a></span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg> <a href="https://www.apht-th.org/" target="_blank" rel="noopener">www.apht-th.org</a></span>
        </div>
        <a class="pill-btn ghost mc-fb" href="https://www.facebook.com/disabledofthailand?locale=th_TH" target="_blank" rel="noopener">Facebook Page →</a>
      </div>

      <div class="member-card">
        <div class="mc-head">
          <img src="{{DTH}}/Pic/members/mental.jpg" alt="โลโก้สมาคมเพื่อผู้บกพร่องทางจิตแห่งประเทศไทย" onerror="this.style.display=\'none\'">
          <h3>สมาคมเพื่อผู้บกพร่องทางจิตแห่งประเทศไทย</h3>
        </div>
        <div class="mc-info">
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg> 47 ม.4 อาคารหญิง 10 โรงพยาบาลศรีธัญญา ถนนติวานนท์ ตำบลตลาดขวัญ อำเภอเมือง จังหวัดนนทบุรี</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg> <a href="tel:0992271233">099-227-1233</a>, <a href="tel:0831222354">083-122-2354</a>, <a href="tel:0627858738">062-785-8738</a></span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg> โทรสาร 02-968-9667</span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg> <a href="mailto:ami_dmh@hotmail.com">ami_dmh@hotmail.com</a></span>
          <span><svg class="mi" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg> <a href="https://www.amith.org/" target="_blank" rel="noopener">www.amith.org</a></span>
        </div>
        <a class="pill-btn ghost mc-fb" href="https://www.facebook.com/amidmh.th?locale=th_TH" target="_blank" rel="noopener">Facebook Page →</a>
      </div>

    </div>
  </div>
</section>

<!-- ===== CTA ===== -->
<section class="block">
  <div class="wrap">
    <div class="hotline">
      <div class="l"><h3>อยากร่วมงานหรือสอบถามข้อมูลเพิ่มเติม?</h3><p>ติดต่อสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย</p></div>
      <a href="{{HOME}}/#contact" class="call" aria-label="ไปยังหน้าติดต่อ">ติดต่อเรา →</a>
    </div>
  </div>
</section>

</main>

<!-- ===== Footer ===== -->
<!-- /wp:html -->',
		'staff' => '<!-- wp:html -->
<!-- ===== Breadcrumb ===== -->
<nav class="breadcrumb" aria-label="เส้นทางนำทาง">
  <div class="wrap"><a href="{{HOME}}/">หน้าแรก</a> <span aria-hidden="true">›</span> <span>เกี่ยวกับเรา</span> <span aria-hidden="true">›</span> <strong>เจ้าหน้าที่สมาคม</strong></div>
</nav>

<!-- ===== Page hero ===== -->
<section class="page-hero">
  <h1>เจ้าหน้าที่สมาคม</h1>
  <p class="lead">โครงสร้างและรายชื่อเจ้าหน้าที่ประจำสำนักงาน สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย</p>
</section>

<main id="main">
<section class="block">
  <div class="wrap">
    <div class="kicker"><h2>โครงสร้างเจ้าหน้าที่สมาคม</h2></div>
    <figure class="board-poster staff-poster">
      <a href="{{DTH}}/Pic/staff-chart.png" target="_blank" rel="noopener" aria-label="ดูภาพขนาดเต็ม"><img src="{{DTH}}/Pic/staff-chart.png" alt="โครงสร้างเจ้าหน้าที่สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย" loading="lazy"></a>
      <figcaption>ผังโครงสร้างเจ้าหน้าที่ — คลิกเพื่อดูภาพขนาดเต็ม</figcaption>
    </figure>
    <div class="table-wrap" style="margin-top:clamp(28px,3.5vw,40px)">
      <table class="board-table">
        <thead><tr><th scope="col">ที่</th><th scope="col">ชื่อ-นามสกุล</th><th scope="col">ตำแหน่ง</th></tr></thead>
        <tbody>
            <tr><td>1</td><td>นางสาวจรรยา  บัวศร</td><td>ผู้อำนวยการสำนักงาน</td></tr>
            <tr><td>2</td><td>นายรัตน์  กิจธรรม</td><td>ผู้อำนวยการฝ่ายต่างประเทศและขับเคลื่อนนโยบายสาธารณะ</td></tr>
            <tr><td>3</td><td>นางสาวญาณิกา  อักษรนำ</td><td>ผู้อำนวยการฝ่ายกิจการภูมิภาคและองค์กรท้องถิ่น</td></tr>
            <tr><td>4</td><td>นางสาววาริสา  ทรัพย์ประดิษฐ</td><td>ผู้อำนวยการฝ่ายวิจัยและพัฒนา</td></tr>
            <tr><td>5</td><td>นางสาวศิริรัช  ไชยรัตน์</td><td>หัวหน้าฝ่ายประสานงานส่วนกลาง</td></tr>
            <tr><td>6</td><td>นางสาวรตินันท์  เมฆฉาย</td><td>ผู้ช่วยอำนวยการสำนักงานและกิจการภูมิภาค</td></tr>
            <tr><td>7</td><td>นางสาวสวรรยา  ปุนินานนท์</td><td>ผู้ช่วยฝ่ายประสานงานส่วนกลาง</td></tr>
            <tr><td>8</td><td>นายสุนทร  สุขชา</td><td>เจ้าหน้าที่ฝ่ายกฎหมาย</td></tr>
            <tr><td>9</td><td>Mr. Nathaniel Ross</td><td>Law & Policy Officer</td></tr>
            <tr><td>10</td><td>นางสาวปัณณรัตน์  อัคราสิริภัสร์</td><td>เจ้าหน้าที่ฝ่ายการเงิน</td></tr>
            <tr><td>11</td><td>นางสาวเจนจิรา  ไตรวรรณ์</td><td>เจ้าหน้าที่ฝ่ายสื่อสารสาธารณะ</td></tr>
            <tr><td>12</td><td>นายโมทน์  อุเทนสุต</td><td>เจ้าหน้าที่ฝ่ายบริหารงานทั่วไป</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
</main>

<!-- ===== Footer ===== -->
<!-- /wp:html -->',
		'news' => '<!-- wp:html -->
<!-- ===== Breadcrumb ===== -->
<nav class="breadcrumb" aria-label="เส้นทางนำทาง">
  <div class="wrap"><a href="{{HOME}}/">หน้าหลัก</a> <span aria-hidden="true">›</span> <span>ข่าวสาร</span> <span aria-hidden="true">›</span> <strong id="crumbCat">ทั้งหมด</strong></div>
</nav>

<main id="main">
<section class="block" style="padding-top:clamp(20px,2.5vw,30px)">
  <div class="wrap">

    <div class="kicker"><span class="ic" aria-hidden="true">📰</span><h1 style="font-size:clamp(1.5rem,2.9vw,2.25rem);font-weight:700;letter-spacing:-.02em;line-height:1.15">ข่าวสาร</h1></div>

    <!-- Category chips (คลิกเพื่อแยกแสดงผลตามหมวด) -->
    <div class="tabbar" id="catBar" aria-label="หมวดหมู่ข่าวสาร" style="margin-bottom:clamp(18px,2.5vw,26px)">
      <button class="tab active" data-cat="all" type="button">ทั้งหมด</button>
      <button class="tab" data-cat="pr" type="button">ข่าวประชาสัมพันธ์</button>
      <button class="tab" data-cat="activity" type="button">กิจกรรม</button>
      <button class="tab" data-cat="report" type="button">รายงานประจำปี</button>
      <button class="tab" data-cat="knowledge" type="button">สาระน่ารู้</button>
    </div>

    <!-- Toolbar -->
    <div class="hub-toolbar">
      <div class="hub-search">
        <input type="text" id="hubSearch" placeholder="ใส่คำที่ต้องการค้นหา…" aria-label="ค้นหาข่าวสาร">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m21 21-4.34-4.34"></path><circle cx="11" cy="11" r="8"></circle></svg>
      </div>
      <select class="hub-select" id="hubSelect" aria-label="เลือกหมวดย่อยสาระน่ารู้">
        <option value="">หมวดย่อยสาระน่ารู้</option>
        <option value="health">สุขภาพ</option>
        <option value="general">ทั่วไป</option>
        <option value="blind">สมาคมคนตาบอดแห่งประเทศไทย</option>
      </select>
    </div>

    <!-- News grid -->
    <div class="hub-grid" id="hubGrid">

      <!-- ข่าวประชาสัมพันธ์ -->
      <a class="card hub-card" data-cat="pr" href="https://dth.or.th/wp-content/uploads/2024/09/ข้อบังคับสภาคนพิการพ.ศ.25602565.pdf" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">ข่าวประชาสัมพันธ์</span><div class="ph" style="display:grid;place-items:center;font-size:3rem;width:100%;height:100%"><svg class="ph-svg" viewBox="0 0 24 24" aria-hidden="true"><path d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7Z"/><path d="M14 2v5h5"/><path d="M9 13h6M9 17h6"/></svg></div></div>
        <div class="body"><div class="meta"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg> 16-09-2567</div><h3>เผยแพร่ข้อบังคับสมาคมสภาคนพิการทุกประเภทฯ พ.ศ. 2560 (แก้ไขเพิ่มเติม 2565)</h3><p>ดาวน์โหลดข้อบังคับสมาคมฉบับปรับปรุงล่าสุดได้แล้ว ทั้งรูปแบบ PDF และ Word</p></div>
      </a>

      <!-- กิจกรรม -->
      <a class="card hub-card" data-cat="activity" href="https://www.facebook.com/share/1Ez81X9Yjh/" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">กิจกรรม</span><img src="{{DTH}}/Pic/external/%E0%B8%AB%E0%B8%99%E0%B9%89%E0%B8%B2%E0%B8%9B%E0%B8%81%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A%E0%B9%84%E0%B8%8B%E0%B8%95%E0%B9%8C%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%8A%E0%B8%B8%E0%B8%A1%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%8A%E0%B8%8A%E0%B8%B2-%E0%B8%A2%E0%B8%B2%E0%B8%A7.png" alt="การประชุมสมัชชาคนพิการ" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'🤝\'"></div>
        <div class="body"><div class="meta"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg> ติดตามกำหนดการผ่านเพจ</div><h3>การประชุมสมัชชาคนพิการแห่งชาติ</h3><p>ร่วมขับเคลื่อนนโยบายและสิทธิคนพิการไปด้วยกัน ติดตามรายละเอียดกิจกรรมล่าสุดผ่าน Facebook ของสมาคม</p></div>
      </a>

      <!-- สาระน่ารู้ -->
      <a class="card hub-card" data-cat="knowledge health" href="https://dth.or.th/knowledge/%e0%b9%80%e0%b8%aa%e0%b9%89%e0%b8%99%e0%b9%80%e0%b8%a5%e0%b8%b7%e0%b8%ad%e0%b8%94%e0%b8%82%e0%b8%ad%e0%b8%94/" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">สุขภาพ</span><img src="{{DTH}}/Pic/external/279270879_1630628107293643_3234477952132787000_n-300x212.jpg" alt="เส้นเลือดขอด อีกหนึ่งโรคยอดฮิตของวัยทำงาน" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'🩺\'"></div>
        <div class="body"><div class="meta"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg> 25-07-2565 · <svg class="im" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> 2,877</div><h3>เส้นเลือดขอด อีกหนึ่งโรคยอดฮิตของวัยทำงาน</h3><p>เส้นเลือดขอด อีกหนึ่งโรคยอดฮิตของวัยทำงาน เมื่อเกิดขึ้นแล้วจะทำให้มีอาการปวด จา…</p></div>
      </a>
      <a class="card hub-card" data-cat="knowledge health" href="https://dth.or.th/knowledge/%e0%b8%a0%e0%b8%b2%e0%b8%a7%e0%b8%b0%e0%b8%82%e0%b9%89%e0%b8%ad%e0%b8%aa%e0%b8%b0%e0%b9%82%e0%b8%9e%e0%b8%81%e0%b9%80%e0%b8%aa%e0%b8%b7%e0%b9%88%e0%b8%ad%e0%b8%a1/" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">สุขภาพ</span><img src="{{DTH}}/Pic/external/%E0%B8%81%E0%B8%A5%E0%B8%B8%E0%B9%88%E0%B8%A1%E0%B9%84%E0%B8%AB%E0%B8%99%E0%B9%80%E0%B8%AA%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%87%E0%B8%A1%E0%B8%B5%E0%B8%A0%E0%B8%B2%E0%B8%A7%E0%B8%B0%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%AA%E0%B8%B0%E0%B9%82%E0%B8%9E%E0%B8%81%E0%B9%80%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%A1-300x212.jpg" alt="กลุ่มไหนเสี่ยงมีภาวะข้อสะโพกเสื่อม" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'🦴\'"></div>
        <div class="body"><div class="meta"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg> 25-07-2565 · <svg class="im" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> 2,821</div><h3>กลุ่มไหนเสี่ยงมีภาวะข้อสะโพกเสื่อม</h3><p>กลุ่มไหนเสี่ยงมีภาวะข้อสะโพกเสื่อม ข้อสะโพกเป็นอวัยวะที่ใช้ในการช่วยพยุงและรับน้…</p></div>
      </a>
      <a class="card hub-card" data-cat="knowledge general" href="https://dth.or.th/knowledge/%e0%b8%81%e0%b8%b2%e0%b8%a3%e0%b9%80%e0%b8%82%e0%b9%89%e0%b8%b2%e0%b8%aa%e0%b8%b1%e0%b8%87%e0%b8%84%e0%b8%a1%e0%b8%82%e0%b8%ad%e0%b8%87%e0%b8%9a%e0%b8%b8%e0%b8%84%e0%b8%84%e0%b8%a5%e0%b8%ad%e0%b8%ad/" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">ทั่วไป</span><img src="{{DTH}}/Pic/external/289098221_586550159662695_1032763863887327249_n-300x225.jpg" alt="การเข้าสังคมของบุคคลออทิสติก หลังสถานการณ์โควิด-19" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'🧩\'"></div>
        <div class="body"><div class="meta"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg> 05-07-2565 · <svg class="im" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> 2,893</div><h3>การเข้าสังคมของบุคคลออทิสติก หลังสถานการณ์โควิด-19</h3><p>การเข้าสังคมของบุคคลออทิสติก หลังสถานการณ์โควิด-19 อัษฎากรณ์ ขันตี …</p></div>
      </a>
      <a class="card hub-card" data-cat="knowledge blind" href="https://dth.or.th/knowledge/https-web-facebook-com-tabodthai-photos-a-434572563305797-5424047981024872/" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">สมาคมคนตาบอดฯ</span><img src="{{DTH}}/Pic/external/284793305_5424047971024873_3993741284349771105_n-1-300x200.jpg" alt="เคยไหม? เวลาพบคนตาบอดจะข้ามถนน อยากจะช่วยแต่ไม่รู้ว่าจะทำอย่างไร" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'🦯\'"></div>
        <div class="body"><div class="meta"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg> 05-07-2565 · <svg class="im" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> 5,518</div><h3>เคยไหม? เวลาพบคนตาบอดจะข้ามถนน … อยากจะช่วยแต่ไม่รู้ว่าจะทำอย่างไร??</h3><p>เคยไหม? เวลาพบคนตาบอดจะข้ามถนน … อยากจะช่วยแต่ไม่รู้ว่าจะทำอย่างไร?? การพ…</p></div>
      </a>
      <a class="card hub-card" data-cat="knowledge general" href="https://dth.or.th/knowledge/45-%e0%b8%aa%e0%b8%96%e0%b8%b2%e0%b8%99%e0%b8%9e%e0%b8%a2%e0%b8%b2%e0%b8%9a%e0%b8%b2%e0%b8%a5%e0%b9%80%e0%b8%ad%e0%b8%81%e0%b8%8a%e0%b8%99/" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">ทั่วไป</span><img src="{{DTH}}/Pic/external/1-300x300.jpg" alt="45 สถานพยาบาลเอกชนที่สามารถออกเอกสารรับรองความพิการ" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'🏥\'"></div>
        <div class="body"><div class="meta"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg> 05-07-2565 · <svg class="im" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> 19,906</div><h3>45 สถานพยาบาลเอกชนที่สามารถออกเอกสารรับรองความพิการ</h3><p>๔๕ สถานพยาบาลเอกชนที่สามารถออกเอกสารรับรองความพิการ (๑) โรงพยาบาลเพชรเวช เขตห้วย…</p></div>
      </a>
    </div>

    <!-- Empty state -->
    <div id="hubEmpty" class="card" style="display:none;padding:40px;text-align:center;color:var(--muted)">
      <div style="font-size:2.6rem" aria-hidden="true">🗂️</div>
      <p style="margin-top:10px">ยังไม่มีรายการในหมวดนี้</p>
      <p style="margin-top:6px;font-size:.9rem">ติดตามข้อมูลอัปเดตได้ที่ <a href="https://www.facebook.com/share/1Ez81X9Yjh/" target="_blank" rel="noopener" style="color:var(--brand-dark);font-weight:600">Facebook ของสมาคม</a> หรือ <a href="https://dth.or.th/download" target="_blank" rel="noopener" style="color:var(--brand-dark);font-weight:600">เอกสารดาวน์โหลด dth.or.th</a></p>
    </div>

    <div class="pager">
      <div class="total">จำนวนทั้งหมด <b id="hubCount">7</b> รายการ</div>
    </div>

  </div>
</section>
</main>

<!-- ===== Footer ===== -->
<!-- /wp:html -->',
		'media' => '<!-- wp:html -->
<!-- ===== Breadcrumb ===== -->
<nav class="breadcrumb" aria-label="เส้นทางนำทาง">
  <div class="wrap"><a href="{{HOME}}/">หน้าแรก</a> <span aria-hidden="true">›</span> <span>ข้อมูลสำคัญ</span> <span aria-hidden="true">›</span> <strong>คลังสื่อ / อินโฟกราฟิก</strong></div>
</nav>

<main id="main">
<section class="block" style="padding-top:clamp(20px,2.5vw,30px)">
  <div class="wrap">
    <div class="kicker"><h1 style="font-size:clamp(1.5rem,2.9vw,2.25rem);font-weight:600;line-height:1.2">คลังสื่อ / อินโฟกราฟิก</h1></div>
    <div class="tabbar" id="catBar" aria-label="หมวดหมู่คลังสื่อ" style="margin-bottom:clamp(18px,2.5vw,26px)">
      <button class="tab active" data-cat="all" type="button">ทั้งหมด</button>
      <button class="tab" data-cat="rights" type="button">สิทธิและสวัสดิการ</button>
      <button class="tab" data-cat="law" type="button">กฎหมาย</button>
      <button class="tab" data-cat="home" type="button">ที่อยู่อาศัย</button>
      <button class="tab" data-cat="magazine" type="button">วารสาร DTH</button>
    </div>
    <div class="hub-toolbar">
      <div class="hub-search">
        <input type="text" id="hubSearch" placeholder="ใส่คำที่ต้องการค้นหา…" aria-label="ค้นหาคลังสื่อ">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m21 21-4.34-4.34"></path><circle cx="11" cy="11" r="8"></circle></svg>
      </div>
      <a href="https://dth.or.th/infographic" target="_blank" rel="noopener" class="see-all" style="white-space:nowrap">ดูทั้งหมดที่ dth.or.th <span class="arr" aria-hidden="true">&rarr;</span></a>
    </div>
    <div class="hub-grid" id="hubGrid">
      <a class="card hub-card" data-cat="rights" href="https://dth.or.th/infographic/" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">อินโฟกราฟิก</span><img src="{{DTH}}/Pic/external/275229039_1594676890888765_1550337596592218467_n-300x212.jpg" alt="สิทธิของผู้ดูแลคนพิการ" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'&#127912;\'"></div>
        <div class="body"><div class="meta"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> 32,475</div><h3>สิทธิของผู้ดูแลคนพิการ</h3></div>
      </a>
      <a class="card hub-card" data-cat="rights" href="https://dth.or.th/infographic/" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">อินโฟกราฟิก</span><img src="{{DTH}}/Pic/external/273556717_1580157409007380_985939727756942970_n-300x212.jpg" alt="ที่จอดรถคนพิการ" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'&#127912;\'"></div>
        <div class="body"><div class="meta"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> 31,921</div><h3>ที่จอดรถคนพิการ</h3></div>
      </a>
      <a class="card hub-card" data-cat="rights" href="https://dth.or.th/infographic/" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">อินโฟกราฟิก</span><img src="{{DTH}}/Pic/external/275194508_1594645250891929_4929658142830719063_n-300x212.jpg" alt="สิทธิค่าโดยสารอัตราพิเศษในระบบขนส่งสาธารณะ" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'&#127912;\'"></div>
        <div class="body"><div class="meta"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> 28,924</div><h3>สิทธิค่าโดยสารอัตราพิเศษในระบบขนส่งสาธารณะ</h3></div>
      </a>
      <a class="card hub-card" data-cat="law" href="https://dth.or.th/infographic/" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">อินโฟกราฟิก</span><img src="{{DTH}}/Pic/external/275425030_1598676160488838_995252658959268142_n-300x212.jpg" alt="ช่วยเหลือทางกฎหมายแก่คนพิการ" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'&#127912;\'"></div>
        <div class="body"><div class="meta"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> 4,710</div><h3>ช่วยเหลือทางกฎหมายแก่คนพิการ</h3></div>
      </a>
      <a class="card hub-card" data-cat="home" href="{{DTH}}/Pic/infographic/home-mod-7steps.jpg" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">อินโฟกราฟิก</span><img src="{{DTH}}/Pic/infographic/home-mod-7steps.jpg" alt="การปรับสภาพบ้านสำหรับคนพิการ 7 ขั้นตอน" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'&#127912;\'"></div>
        <div class="body"><div class="meta">อินโฟกราฟิก</div><h3>การปรับสภาพบ้านสำหรับคนพิการ 7 ขั้นตอน</h3></div>
      </a>
      <a class="card hub-card" data-cat="home" href="{{DTH}}/Pic/infographic/home-environment-2567.jpg" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">อินโฟกราฟิก</span><img src="{{DTH}}/Pic/infographic/home-environment-2567.jpg" alt="การปรับสภาพแวดล้อมที่อยู่อาศัยสำหรับคนพิการ" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'&#127912;\'"></div>
        <div class="body"><div class="meta">อินโฟกราฟิก</div><h3>การปรับสภาพแวดล้อมที่อยู่อาศัยสำหรับคนพิการ</h3></div>
      </a>
      <a class="card hub-card" data-cat="magazine" href="{{DTH}}/Doc/magazine/dth-magazine-vol14.pdf" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">วารสาร DTH</span><div class="ph" style="display:grid;place-items:center;width:100%;height:100%"><svg class="ph-svg" viewBox="0 0 24 24" aria-hidden="true"><path d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7Z"/><path d="M14 2v5h5"/><path d="M9 13h6M9 17h6"/></svg></div></div>
        <div class="body"><div class="meta">PDF · 13 MB</div><h3>DTH Magazine ฉบับที่ 14 — Colleague</h3></div>
      </a>
      <a class="card hub-card" data-cat="magazine" href="{{DTH}}/Doc/magazine/dth-magazine-vol13.pdf" target="_blank" rel="noopener">
        <div class="thumb"><span class="mtype">วารสาร DTH</span><div class="ph" style="display:grid;place-items:center;width:100%;height:100%"><svg class="ph-svg" viewBox="0 0 24 24" aria-hidden="true"><path d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7Z"/><path d="M14 2v5h5"/><path d="M9 13h6M9 17h6"/></svg></div></div>
        <div class="body"><div class="meta">PDF · 4.2 MB</div><h3>DTH Magazine ฉบับที่ 13 — Work Together Issue</h3></div>
      </a>
    </div>
    <div id="hubEmpty" class="card" style="display:none;padding:40px;text-align:center;color:var(--muted)">
      <p style="margin-top:10px">ยังไม่มีรายการในหมวดนี้</p>
    </div>
    <div class="pager"><div class="total">จำนวนทั้งหมด <b id="hubCount">8</b> รายการ</div></div>
  </div>
</section>
</main>

<!-- ===== Footer ===== -->
<!-- /wp:html -->',
		'magazine' => '<!-- wp:html -->
<!-- ===== Breadcrumb ===== -->
<nav class="breadcrumb" aria-label="เส้นทางนำทาง">
  <div class="wrap"><a href="{{HOME}}/">หน้าแรก</a> <span aria-hidden="true">›</span> <span>ข้อมูลสำคัญ</span> <span aria-hidden="true">›</span> <strong>DTH Magazine</strong></div>
</nav>

<!-- ===== Page hero ===== -->
<section class="page-hero">
  <h1>DTH Magazine</h1>
  <p class="lead">วารสารของสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย — รวมฉบับย้อนหลังให้ดาวน์โหลด</p>
</section>

<main id="main">
<section class="block">
  <div class="wrap">
    <div class="kicker"><h2>DTH Magazine — วารสารสมาคม</h2></div>
    <p class="prov-note">วารสาร DTH Magazine ฉบับล่าสุด — คลิกเพื่อเปิด/ดาวน์โหลดไฟล์ PDF</p>
    <div class="mag-grid">
      <a class="card mag-card" href="{{DTH}}/Doc/magazine/dth-magazine-vol13.pdf" target="_blank" rel="noopener">
        <span class="mag-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7Z"/><path d="M14 2v5h5"/><path d="M9 13h6M9 17h6"/></svg></span>
        <div class="body"><h3>ฉบับที่ 13 — Work Together Issue</h3><div class="meta">PDF · 4.2 MB · ดาวน์โหลด</div></div>
      </a>
      <a class="card mag-card" href="{{DTH}}/Doc/magazine/dth-magazine-vol14.pdf" target="_blank" rel="noopener">
        <span class="mag-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7Z"/><path d="M14 2v5h5"/><path d="M9 13h6M9 17h6"/></svg></span>
        <div class="body"><h3>ฉบับที่ 14 — Colleague</h3><div class="meta">PDF · 13 MB · ดาวน์โหลด</div></div>
      </a>
    </div>
  </div>
</section>
</main>

<!-- ===== Footer ===== -->
<!-- /wp:html -->',
		'proposals' => '<!-- wp:html -->
<!-- ===== Breadcrumb ===== -->
<nav class="breadcrumb" aria-label="เส้นทางนำทาง">
  <div class="wrap"><a href="{{HOME}}/">หน้าแรก</a> <span aria-hidden="true">›</span> <span>ข้อมูลสำคัญ</span> <span aria-hidden="true">›</span> <strong>ข้อเสนอ</strong></div>
</nav>

<!-- ===== Page hero ===== -->
<section class="page-hero">
  <h1>ข้อเสนอเชิงนโยบาย</h1>
  <p class="lead">ข้อเสนอของสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทยต่อภาครัฐ เพื่อสิทธิและคุณภาพชีวิตที่เท่าเทียมของคนพิการ</p>
</section>

<main id="main">
<section class="block">
  <div class="wrap">
    <div class="kicker"><h2>ข้อเสนอเชิงนโยบายต่อภาครัฐ</h2></div>
    <p class="prov-note">ข้อเสนอของสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย เพื่อขับเคลื่อนสิทธิและคุณภาพชีวิตคนพิการ</p>
    <a class="card mag-card" href="{{DTH}}/Doc/proposals/proposal-gov-2568.pdf" target="_blank" rel="noopener" style="max-width:560px;margin-bottom:clamp(22px,3vw,32px)">
      <span class="mag-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7Z"/><path d="M14 2v5h5"/><path d="M9 13h6M9 17h6"/></svg></span>
      <div class="body">
        <h3>ข้อเสนอคนพิการต่อรัฐบาล</h3>
        <div class="meta">24 ธันวาคม 2568 · PDF · 426 KB · ดาวน์โหลด</div>
      </div>
    </a>
    <div class="prov-grid">
      <figure class="board-poster"><a href="{{DTH}}/Pic/proposals/proposal-1.jpg" target="_blank" rel="noopener" aria-label="ดูภาพขนาดเต็ม"><img src="{{DTH}}/Pic/proposals/proposal-1.jpg" alt="ข้อเสนอคนพิการต่อรัฐบาล หน้า 1" loading="lazy"></a></figure>
      <figure class="board-poster"><a href="{{DTH}}/Pic/proposals/proposal-2.jpg" target="_blank" rel="noopener" aria-label="ดูภาพขนาดเต็ม"><img src="{{DTH}}/Pic/proposals/proposal-2.jpg" alt="ข้อเสนอคนพิการต่อรัฐบาล หน้า 2" loading="lazy"></a></figure>
      <figure class="board-poster"><a href="{{DTH}}/Pic/proposals/proposal-3.jpg" target="_blank" rel="noopener" aria-label="ดูภาพขนาดเต็ม"><img src="{{DTH}}/Pic/proposals/proposal-3.jpg" alt="ข้อเสนอคนพิการต่อรัฐบาล หน้า 3" loading="lazy"></a></figure>
      <figure class="board-poster"><a href="{{DTH}}/Pic/proposals/proposal-4.jpg" target="_blank" rel="noopener" aria-label="ดูภาพขนาดเต็ม"><img src="{{DTH}}/Pic/proposals/proposal-4.jpg" alt="ข้อเสนอคนพิการต่อรัฐบาล หน้า 4" loading="lazy"></a></figure>
    </div>
  </div>
</section>
</main>

<!-- ===== Footer ===== -->
<!-- /wp:html -->',
		'regulations' => '<!-- wp:html -->
<!-- ===== Breadcrumb ===== -->
<nav class="breadcrumb" aria-label="เส้นทางนำทาง">
  <div class="wrap"><a href="{{HOME}}/">หน้าหลัก</a> <span aria-hidden="true">›</span> <span>เกี่ยวกับเรา</span> <span aria-hidden="true">›</span> <strong>ข้อบังคับ/ระเบียบ</strong></div>
</nav>

<!-- ===== Page hero ===== -->
<section class="page-hero">
  <div class="ic-row"><span class="ic" aria-hidden="true">📜</span><h1>ข้อบังคับ/ระเบียบ</h1></div>
  <p class="lead">
    รวมข้อบังคับ ระเบียบ และเอกสารสำคัญของ<strong>สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย</strong>
    สำหรับองค์การสมาชิก เครือข่าย และผู้สนใจ สามารถดาวน์โหลดได้ทั้งรูปแบบ PDF และ Word
  </p>
</section>

<main id="main">

<section class="block">
  <div class="wrap">
    <div class="kicker"><span class="ic" aria-hidden="true">📄</span><h2>เอกสารดาวน์โหลด</h2></div>

    <div style="display:flex;flex-direction:column;gap:14px;max-width:760px">
      <a class="card" href="https://dth.or.th/wp-content/uploads/2024/09/ข้อบังคับสภาคนพิการพ.ศ.25602565.pdf" target="_blank" rel="noopener" style="padding:18px;flex-direction:row;align-items:center;gap:14px">
        <span class="doc-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7Z"/><path d="M14 2v5h5"/><path d="M9 13h6M9 17h6"/></svg></span>
        <span><strong style="display:block;color:var(--ink);font-size:.98rem;line-height:1.4">ข้อบังคับสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย พ.ศ. 2560 (แก้ไขเพิ่มเติม 2565)</strong><span class="meta" style="margin-top:6px"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 11h18"/></svg> 16-09-2567 · PDF 187 KB</span></span>
      </a>
      <a class="card" href="https://dth.or.th/wp-content/uploads/2024/09/ข้อบังคับสภาคนพิการพ.ศ.25602565.docx" target="_blank" rel="noopener" style="padding:18px;flex-direction:row;align-items:center;gap:14px">
        <span class="doc-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7Z"/><path d="M14 2v5h5"/><path d="M9 13h6M9 17h6"/></svg></span>
        <span><strong style="display:block;color:var(--ink);font-size:.98rem;line-height:1.4">ข้อบังคับสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย พ.ศ. 2560 (แก้ไขเพิ่มเติม 2565) — ฉบับ Word</strong><span class="meta" style="margin-top:6px"><svg class="im" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 11h18"/></svg> 16-09-2567 · DOC 76 KB</span></span>
      </a>
    </div>

    <div style="margin-top:26px"><a href="https://dth.or.th/download" target="_blank" rel="noopener" class="pill-btn">ดูเอกสารทั้งหมดที่ dth.or.th</a></div>
  </div>
</section>

</main>

<!-- ===== Footer ===== -->
<!-- /wp:html -->',
	);
}

add_filter( 'the_content', function ( $html ) {
	if ( strpos( $html, '{{DTH}}' ) === false && strpos( $html, '{{HOME}}' ) === false ) { return $html; }
	$html = str_replace( '{{DTH}}', get_template_directory_uri(), $html );
	$html = str_replace( '{{HOME}}', untrailingslashit( home_url() ), $html );
	return $html;
}, 9 );
function dth_seed_page_contents() {
	$seed = dth_page_content_seed();
	foreach ( $seed as $slug => $content ) {
		$page = get_page_by_path( $slug );
		if ( ! $page ) { continue; }
		if ( trim( (string) $page->post_content ) !== '' ) { continue; }
		wp_update_post( array( 'ID' => $page->ID, 'post_content' => $content ) );
	}

	// ถ้า "ตั้งค่า > การอ่าน" ยังเป็น "เรื่องล่าสุด" ให้ชี้กลับมาที่หน้า home
	// ไม่งั้นผู้ดูแลจะแก้หน้าแรกในหลังบ้านแล้วไม่เห็นผล เพราะเว็บไม่ได้ใช้หน้านั้น
	if ( ! (int) get_option( 'page_on_front' ) ) {
		$home = get_page_by_path( 'home' );
		if ( $home ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $home->ID );
		}
	}

	// เผื่อหน้าแรกของเว็บไม่ใช่หน้า slug "home" (ตั้งไว้เป็นหน้าอื่นในตั้งค่า > การอ่าน)
	// ถ้าหน้านั้นยังว่าง ให้ใส่เนื้อหาหน้าแรกลงไปด้วย ไม่งั้นหน้าแรกจะโล่ง
	$front_id = (int) get_option( 'page_on_front' );
	if ( $front_id && ! empty( $seed['home'] ) ) {
		$front = get_post( $front_id );
		if ( $front && 'page' === $front->post_type && trim( (string) $front->post_content ) === '' ) {
			wp_update_post( array( 'ID' => $front_id, 'post_content' => $seed['home'] ) );
		}
	}
}
add_action( 'admin_init', 'dth_seed_page_contents' );
