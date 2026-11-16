<?php
/**
 * Template: development (จาก development.html) — คงหน้าตาและสคริปต์เดิม
 */
get_header();
?>
<div class="wrap">

  <div class="head">
    <img src="<?php echo DTH_URI; ?>/Pic/dth-logo.png" alt="โลโก้ DTH" onerror="this.style.display='none'">
    <div>
      <h1>ขั้นตอนการพัฒนาเว็บไซต์</h1>
      <p>สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย (Disabilities Thailand — DTH)</p>
    </div>
  </div>

  <div class="intro">
    <p>บันทึกขั้นตอนการพัฒนาและปรับปรุงเว็บไซต์ ฉบับ Redesign v2.1 <b>"Human &amp; Natural"</b> — เน้นการออกแบบที่อบอุ่น เป็นธรรมชาติ เข้าถึงง่ายสำหรับทุกคน โดยคงโครงสร้างเดิมและเพิ่มเนื้อหาข้อมูลทางการให้ครบถ้วน</p>
    <div class="meta">
      <span class="chip">มิถุนายน 2569 (2026)</span>
      <span class="chip">11 หน้าเว็บ</span>
      <span class="chip">Static Site · GitHub Pages</span>
      <span class="chip">รองรับ Accessibility</span>
    </div>
  </div>

  <div class="doc-nav">
    <a href="<?php echo esc_url( home_url('/') ); ?>">← กลับหน้าแรก</a>
    <a href="<?php echo esc_url( home_url('/sitemap/') ); ?>" class="ghost">ดู Site Map &amp; Flow</a>
  </div>

  <div class="timeline">

    <div class="phase">
      <div class="phase-card">
        <div class="phase-top"><span class="phase-num">1</span><h2>วางโครงสร้าง + ปรับธีม</h2><span class="phase-date">10–11 มิ.ย.</span></div>
        <ul>
          <li>ดึงไฟล์ต้นฉบับ <b>dth-v2.html / dth-v2.css</b> มาพัฒนาต่อในเครื่อง</li>
          <li>ปรับธีมเป็น <b>"Human &amp; Natural"</b> — พื้นกระดาษครีม เขียวธรรมชาติ เงานุ่ม มุมโค้งแบบ organic</li>
          <li>เปลี่ยนฟอนต์เป็น <b>Anuphan</b> (หัวข้อ) + <b>Sarabun</b> (เนื้อหา) — ฟอนต์ไทยมีหัว อ่านง่าย</li>
          <li>คงระบบ <b>Accessibility</b> เดิม: ปรับขนาดอักษร 3 ระดับ, โหมดตัดกันสูง (ขาว/เหลืองพื้นดำ), รองรับ reduced-motion</li>
        </ul>
      </div>
    </div>

    <div class="phase">
      <div class="phase-card">
        <div class="phase-top"><span class="phase-num">2</span><h2>ดึงข้อมูลจริง + หน้ารอง</h2><span class="phase-date">11 มิ.ย.</span></div>
        <ul>
          <li>เชื่อมหน้ารอง <b>เกี่ยวกับเรา / ข่าวสาร / ข้อบังคับ</b> ให้เมนูคลิกได้จริง</li>
          <li>นำไฟล์จริงจากโฟลเดอร์งานเข้าระบบ: <b>โลโก้ 6 สมาคม</b>, อินโฟกราฟิก, เอกสาร PDF</li>
          <li>จัดโครงสร้างไฟล์ <b>Pic/ · Doc/</b> ชื่อ ASCII ปลอดภัยตอน deploy</li>
        </ul>
      </div>
    </div>

    <div class="phase">
      <div class="phase-card">
        <div class="phase-top"><span class="phase-num">3</span><h2>ปรับดีไซน์ให้เรียบสะอาด</h2><span class="phase-date">15 มิ.ย.</span></div>
        <ul>
          <li>เปลี่ยน <b>emoji หลากสี → SVG icon เส้นโทนเขียว</b> ทั้งเว็บ (เปลี่ยนสีตามโหมด contrast อัตโนมัติ)</li>
          <li>เอา icon และภาษาอังกฤษหน้าหัวข้อออก ให้สไตล์เรียบ</li>
          <li>จัด <b>โลโก้หลัก</b> — แบบกลมสมมาตร (header) + แบบแนวนอน (footer)</li>
        </ul>
      </div>
    </div>

    <div class="phase">
      <div class="phase-card">
        <div class="phase-top"><span class="phase-num">4</span><h2>เนื้อหาทางการ — เกี่ยวกับเรา</h2><span class="phase-date">15 มิ.ย.</span></div>
        <ul>
          <li>เพิ่มเนื้อหาทางการครบถ้วน: <b>ความเป็นมา · วัตถุประสงค์ 10 ข้อ · วิสัยทัศน์ · พันธกิจ</b></li>
          <li><b>คณะกรรมการบริหาร 30 รายชื่อ</b> + รูปผู้บริหาร 6 ท่าน + ภาพคณะกรรมการเต็ม</li>
          <li><b>ผลงานที่ภาคภูมิใจ</b> 5 ด้าน (กฎหมาย/นโยบาย/เครือข่าย/พิทักษ์สิทธิ/ต่างประเทศ)</li>
          <li>แก้ข้อมูลติดต่อ <b>องค์การสมาชิก 6 สมาคม</b> — เพิ่มเว็บไซต์, แยกโทรสาร, แก้ที่อยู่</li>
        </ul>
      </div>
    </div>

    <div class="phase">
      <div class="phase-card">
        <div class="phase-top"><span class="phase-num">5</span><h2>สร้างหน้าใหม่ + ข้อมูลจริง</h2><span class="phase-date">15 มิ.ย.</span></div>
        <ul>
          <li><b>เจ้าหน้าที่สมาคม</b> — ผังโครงสร้าง + ตารางรายชื่อ 12 คน</li>
          <li><b>สภาฯ ประจำจังหวัด</b> — รูป + ตาราง 67 จังหวัด 4 ภาค (จากไฟล์ Excel · กดโทรได้)</li>
          <li><b>คลังสื่อ / อินโฟกราฟิก</b> — กรองหมวด + ค้นหา แบบหน้าข่าวสาร</li>
          <li><b>DTH Magazine</b> + <b>ข้อเสนอเชิงนโยบาย</b> — ดาวน์โหลด PDF</li>
          <li>จัดเมนูใหม่ <b>4 หมวด</b> — ทุกรายการลิงก์หน้าจริงในเว็บ ไม่มีค้าง</li>
        </ul>
      </div>
    </div>

    <div class="phase">
      <div class="phase-card">
        <div class="phase-top"><span class="phase-num">6</span><h2>Responsive + Animation</h2><span class="phase-date">15 มิ.ย.</span></div>
        <ul>
          <li>ปรับการแสดงผล <b>มือถือ</b> — การ์ด 2 คอลัมน์, โลโก้เครือข่าย 4 คอลัมน์, ตารางเลื่อนแนวนอน, ฟอนต์ไม่เบียดบรรทัด</li>
          <li>ใส่ <b>scroll-reveal animation</b> (เนื้อหาลอยขึ้นตอนเลื่อนถึง) + hero caption</li>
          <li><b>แถบกลับขึ้นด้านบน</b> เลื่อนขึ้นจากขอบล่าง + ปุ่มติดต่อลอย</li>
        </ul>
      </div>
    </div>

    <div class="phase">
      <div class="phase-card">
        <div class="phase-top"><span class="phase-num">7</span><h2>Backup + Deploy</h2><span class="phase-date">15 มิ.ย.</span></div>
        <ul>
          <li>สำรองไฟล์เฉพาะที่ใช้งานเป็น <b>.zip</b> + เก็บใน Git</li>
          <li>จัดทำเอกสาร <b>README · Site Map · Flow</b> การทำงาน</li>
          <li>Deploy ขึ้น <b>GitHub Pages</b> — เผยแพร่ออนไลน์</li>
        </ul>
      </div>
    </div>

  </div>

  <div class="tech">
    <h2>เทคโนโลยีที่ใช้</h2>
    <div class="tech-grid">
      <div class="tech-item"><strong>HTML5 + CSS3</strong><span>โครงสร้างและสไตล์ ไม่พึ่ง framework หนัก</span></div>
      <div class="tech-item"><strong>Vanilla JavaScript</strong><span>slider · แท็บกรอง · เมนู · animation</span></div>
      <div class="tech-item"><strong>Anuphan · Sarabun</strong><span>ฟอนต์ไทย Google Fonts</span></div>
      <div class="tech-item"><strong>GitHub Pages</strong><span>โฮสต์เว็บ static ฟรี</span></div>
      <div class="tech-item"><strong>Accessibility (a11y)</strong><span>ปรับอักษร · โหมดตัดกันสูง · skip link</span></div>
      <div class="tech-item"><strong>Responsive</strong><span>รองรับมือถือ–เดสก์ท็อป</span></div>
    </div>
  </div>

  <div class="doc-nav">
    <a href="<?php echo esc_url( home_url('/') ); ?>">← กลับหน้าแรก</a>
    <a href="<?php echo esc_url( home_url('/sitemap/') ); ?>" class="ghost">Site Map &amp; Flow</a>
    <a href="https://github.com/itsupport-owatmaid/dth-redesign" target="_blank" rel="noopener" class="ghost">ดูซอร์สโค้ดบน GitHub →</a>
  </div>

  <p class="foot">เว็บไซต์สภาคนพิการทุกประเภทแห่งประเทศไทย · Redesign v2.1 "Human &amp; Natural" · มิถุนายน 2569</p>
</div>
<?php
get_footer();
