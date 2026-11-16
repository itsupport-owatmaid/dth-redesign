<?php
/**
 * Template: sitemap (จาก sitemap.html) — คงหน้าตาและสคริปต์เดิม
 */
get_header();
?>
<div class="wrap">

  <div class="head">
    <img src="<?php echo DTH_URI; ?>/Pic/dth-logo.png" alt="โลโก้ DTH" onerror="this.style.display='none'">
    <div>
      <h1>Site Map &amp; Flow การทำงานของเว็บไซต์</h1>
      <p>สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย (Disabilities Thailand — DTH)</p>
    </div>
  </div>
  <div class="legend">
    <span><i class="dot page"></i> หน้าเว็บ (page)</span>
    <span><i class="dot section"></i> ส่วนในหน้า (section)</span>
    <span><i class="dot ext"></i> ลิงก์ภายนอก</span>
    <span><i class="dot act"></i> จุดที่ผู้ใช้กดทำงาน (interaction)</span>
  </div>

  <!-- ================= SITE MAP ================= -->
  <section>
    <h2><span class="ic">🗺️</span> 1. Site Map — โครงสร้างหน้าเว็บ</h2>
    <p class="note">หน้าหลักหน้าเดียวรวมทุก section, หน้ารองแยกตามเมนู — ลิงก์ข่าว/บทความเชื่อมไปเว็บทางการ dth.or.th</p>
    <div class="tree">
      <div class="node root">หน้าแรก — dth-v2.html<small>Topbar · แถบ Accessibility · เมนู 4 หมวด · Hero Slider (สไลด์เดียว) · สาระน่ารู้ (แท็บกรองในหน้า) · ติดตาม Facebook · สิทธิคนพิการ · Q&amp;A · เครือข่าย · สายด่วน 1479 · ติดต่อ+แผนที่ · Footer · ปุ่มติดต่อลอย (โลโก้ DTH) · แถบกลับขึ้นด้านบน</small></div>
      <div class="trunk"></div>
      <div class="branches">
        <div class="branch">
          <div class="node page">เกี่ยวกับเรา<small>about.html</small></div>
          <div class="kids">
            <div class="node section">ความเป็นมา (#history)</div>
            <div class="node section">วัตถุประสงค์ 10 ประการ</div>
            <div class="node section">วิสัยทัศน์ / พันธกิจ</div>
            <div class="node section">คณะกรรมการ 30 รายชื่อ (#board)</div>
            <div class="node page" style="font-size:.86rem;padding:7px 13px">เจ้าหน้าที่สมาคม<small>staff.html</small></div>
            <div class="node section">ผลงานสภา (#milestones)</div>
            <div class="node section">องค์การสมาชิก 6 องค์การ (#members)</div>
          </div>
        </div>
        <div class="branch">
          <div class="node page">เครือข่าย<small>#network ในหน้าแรก</small></div>
          <div class="kids">
            <div class="node section">องค์การคนพิการ → about.html#members</div>
            <div class="node page" style="font-size:.86rem;padding:7px 13px">สภาฯ ประจำจังหวัด<small>provinces.html</small></div>
            <div class="node section">หน่วยงานที่เกี่ยวข้อง 8 แห่ง</div>
            <div class="node ext">Facebook / X / YouTube / TikTok</div>
          </div>
        </div>
        <div class="branch">
          <div class="node page">ข่าวสารและกิจกรรม<small>news.html</small></div>
          <div class="kids">
            <div class="node section">ข่าวประชาสัมพันธ์ (?cat=pr)</div>
            <div class="node section">กิจกรรม (?cat=activity)</div>
            <div class="node section">รายงานประจำปี (?cat=report)</div>
            <div class="node ext">บทความเต็ม → dth.or.th</div>
          </div>
        </div>
        <div class="branch">
          <div class="node page">ข้อมูลสำคัญ<small>รวมจุดเข้าถึงข้อมูล</small></div>
          <div class="kids">
            <div class="node page" style="font-size:.86rem;padding:7px 13px">ข้อเสนอ<small>proposals.html</small></div>
            <div class="node page" style="font-size:.86rem;padding:7px 13px">กฎหมาย + เอกสารดาวน์โหลด<small>regulations.html (#laws)</small></div>
            <div class="node page" style="font-size:.86rem;padding:7px 13px">DTH-Magazine<small>magazine.html</small></div>
            <div class="node section">สิทธิคนพิการที่ควรรู้ (#rights — 4 แท็บ)</div>
            <div class="node section">คำถามที่พบบ่อย (#qa)</div>
            <div class="node page" style="font-size:.86rem;padding:7px 13px">คลังสื่อ / อินโฟกราฟิก<small>media.html</small></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= USER FLOWS ================= -->
  <section>
    <h2><span class="ic">🚶</span> 2. User Flow — เส้นทางการใช้งานหลัก</h2>
    <p class="note">4 เส้นทางที่ผู้ใช้เข้ามาทำบ่อยที่สุด ออกแบบให้จบงานได้ในไม่กี่คลิก</p>
    <div class="flows">

      <div class="flow">
        <h3><span class="n">A</span> ค้นหาสิทธิของตัวเอง</h3>
        <div class="steps">
          <div class="step">เข้าหน้าหลัก → เมนู <b>สิทธิและสวัสดิการ</b></div>
          <div class="arrow">↓</div>
          <div class="step act">เลือกแท็บหมวดที่ต้องการ <b>(บัตร / เบี้ย / เรียน-ทำงาน / ร้องเรียน)</b></div>
          <div class="arrow">↓</div>
          <div class="step">อ่านสรุปสั้น + การ์ดข้อมูลอ้างอิง (สถานที่ยื่น, เอกสาร, อายุบัตร)</div>
          <div class="arrow">↓</div>
          <div class="step ext">กดปุ่ม CTA → แหล่งข้อมูลเต็ม (dth.or.th / Job Fin Fin / ติดต่อ)</div>
          <div class="arrow">↓</div>
          <div class="step end"><b>ได้คำตอบ</b> รู้ว่าต้องเตรียมอะไร ไปที่ไหน</div>
        </div>
      </div>

      <div class="flow">
        <h3><span class="n">B</span> ติดตามข่าวสาร / สาระน่ารู้</h3>
        <div class="steps">
          <div class="step">เข้าหน้าแรก → section <b>สาระน่ารู้</b></div>
          <div class="arrow">↓</div>
          <div class="step act">เลือกแท็บหมวด <b>(ล่าสุด / สุขภาพ / ทั่วไป / สมาคมคนตาบอด)</b> — กรองการ์ดในหน้าทันที ไม่ reload</div>
          <div class="arrow">↓</div>
          <div class="step">เลือกการ์ดข่าว (ภาพ + วันที่ + ยอดเข้าชม)</div>
          <div class="arrow">↓</div>
          <div class="step ext">เปิดบทความเต็มที่ dth.or.th (แท็บใหม่ — ไม่หลุดจากหน้าเดิม)</div>
          <div class="arrow">↓</div>
          <div class="step end"><b>อ่านจบ</b> กลับมาหน้าเดิมได้ทันที</div>
        </div>
      </div>

      <div class="flow">
        <h3><span class="n">C</span> ติดต่อ / ร้องเรียน</h3>
        <div class="steps">
          <div class="step act">กดปุ่มติดต่อลอย <b>(FAB มุมขวาล่าง — มีทุกหน้า)</b></div>
          <div class="arrow">↓</div>
          <div class="split">
            <div class="step act">ส่งข้อความ → เปิด modal ฟอร์ม</div>
            <div class="step">โทร 02-354-4260 / สายด่วน 1479</div>
            <div class="step ext">Facebook Page</div>
            <div class="step">อีเมล disabilitiesth@gmail.com</div>
          </div>
          <div class="arrow">↓</div>
          <div class="step">กรอกชื่อ + ช่องทางติดต่อกลับ + ข้อความ → กดส่ง (มี validation)</div>
          <div class="arrow">↓</div>
          <div class="step end"><b>แจ้งเรื่องสำเร็จ</b> ทีมงานติดต่อกลับ</div>
        </div>
      </div>

      <div class="flow">
        <h3><span class="n">D</span> ปรับการแสดงผล (Accessibility)</h3>
        <div class="steps">
          <div class="step">แถบ a11y อยู่บนสุด มองเห็นก่อนเนื้อหา</div>
          <div class="arrow">↓</div>
          <div class="split">
            <div class="step act">ขนาดอักษร <b>ก ก ก</b> (เล็ก/ปกติ/ใหญ่)</div>
            <div class="step act">โหมดสี <b>C C C</b> (ปกติ/ขาวดำ/เหลืองดำ)</div>
          </div>
          <div class="arrow">↓</div>
          <div class="step">JS ปรับ CSS variable ทั้งเว็บทันที ไม่ reload</div>
          <div class="arrow">↓</div>
          <div class="step end"><b>อ่านสบายตา</b> ทุกกลุ่มผู้ใช้รวมผู้พิการทางสายตา</div>
        </div>
      </div>

    </div>
  </section>

  <!-- ================= SYSTEM FLOW ================= -->
  <section>
    <h2><span class="ic">⚙️</span> 3. Flow การทำงานของระบบ</h2>
    <p class="note">เว็บเป็น static site — HTML + CSS + vanilla JS ไม่มี backend ของตัวเอง ข้อมูลสด ๆ ดึงจากบริการภายนอก</p>
    <div class="sys">
      <div class="sysbox user">
        <h4>ผู้ใช้</h4>
        <ul>
          <li>คนพิการและครอบครัว</li>
          <li>ผู้ดูแล / องค์กรเครือข่าย</li>
          <li>ประชาชนทั่วไปที่หาข้อมูลสิทธิ</li>
          <li>ทุกอุปกรณ์ — responsive + screen reader</li>
        </ul>
      </div>
      <div class="harrow">⇄</div>
      <div class="sysbox site">
        <h4>เว็บไซต์ DTH (static)</h4>
        <ul>
          <li>dth-v2.html + dth-v2.css — โครงหน้า, ธีมธรรมชาติ</li>
          <li>JS ในหน้า: slider, แท็บข่าว/สื่อ/สิทธิ, เมนูมือถือ, FAB, modal</li>
          <li>ระบบ a11y: font-size scale + high-contrast themes</li>
          <li>รูป/โลโก้จากโฟลเดอร์ Pic/ และไฟล์งานในเครื่อง</li>
        </ul>
      </div>
      <div class="harrow">⇄</div>
      <div class="sysbox extsrc">
        <h4>บริการภายนอก</h4>
        <ul>
          <li>dth.or.th — บทความ, อินโฟกราฟิก, เอกสาร PDF</li>
          <li>Facebook Page Plugin — ฟีดข่าวสด</li>
          <li>Google Maps embed — แผนที่สมาคม</li>
          <li>Google Fonts — Mitr / Sarabun</li>
          <li>โทรศัพท์ / อีเมล (tel: , mailto:)</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ================= NETWORK ================= -->
  <section>
    <h2><span class="ic">🤝</span> 4. เครือข่าย 6 องค์การสมาชิก (โลโก้จากโฟลเดอร์งาน)</h2>
    <p class="note">แสดงในหน้าหลัก section #network — แต่ละโลโก้ลิงก์ไป Facebook ของสมาคมนั้น</p>
    <div class="orgs">
      <div class="org"><img src="<?php echo DTH_URI; ?>/Pic/members/blind.png" alt="สมาคมคนตาบอดฯ" onerror="this.replaceWith(Object.assign(document.createElement(String.fromCharCode(115,112,97,110)),{textContent:String.fromCodePoint(127963),style:String.fromCharCode(102,111,110,116,45,115,105,122,101,58,50,46,50,114,101,109)}))"><span>สมาคมคนตาบอด<br>แห่งประเทศไทย</span></div>
      <div class="org"><img src="<?php echo DTH_URI; ?>/Pic/members/deaf.png" alt="สมาคมคนหูหนวกฯ" onerror="this.replaceWith(Object.assign(document.createElement(String.fromCharCode(115,112,97,110)),{textContent:String.fromCodePoint(127963),style:String.fromCharCode(102,111,110,116,45,115,105,122,101,58,50,46,50,114,101,109)}))"><span>สมาคมคนหูหนวก<br>แห่งประเทศไทย</span></div>
      <div class="org"><img src="<?php echo DTH_URI; ?>/Pic/members/physical.png" alt="สมาคมคนพิการฯ" onerror="this.replaceWith(Object.assign(document.createElement(String.fromCharCode(115,112,97,110)),{textContent:String.fromCodePoint(127963),style:String.fromCharCode(102,111,110,116,45,115,105,122,101,58,50,46,50,114,101,109)}))"><span>สมาคมคนพิการ<br>แห่งประเทศไทย</span></div>
      <div class="org"><img src="<?php echo DTH_URI; ?>/Pic/members/intellectual.jpg" alt="สมาคมผู้ปกครองคนพิการทางสติปัญญาฯ" onerror="this.replaceWith(Object.assign(document.createElement(String.fromCharCode(115,112,97,110)),{textContent:String.fromCodePoint(127963),style:String.fromCharCode(102,111,110,116,45,115,105,122,101,58,50,46,50,114,101,109)}))"><span>สมาคมผู้ปกครองคนพิการ<br>ทางสติปัญญาฯ</span></div>
      <div class="org"><img src="<?php echo DTH_URI; ?>/Pic/members/autism.jpg" alt="สมาคมผู้ปกครองบุคคลออทิซึม" onerror="this.replaceWith(Object.assign(document.createElement(String.fromCharCode(115,112,97,110)),{textContent:String.fromCodePoint(127963),style:String.fromCharCode(102,111,110,116,45,115,105,122,101,58,50,46,50,114,101,109)}))"><span>สมาคมผู้ปกครอง<br>บุคคลออทิซึม (ไทย)</span></div>
      <div class="org"><img src="<?php echo DTH_URI; ?>/Pic/members/mental.jpg" alt="สมาคมเพื่อผู้บกพร่องทางจิตฯ" onerror="this.replaceWith(Object.assign(document.createElement(String.fromCharCode(115,112,97,110)),{textContent:String.fromCodePoint(127963),style:String.fromCharCode(102,111,110,116,45,115,105,122,101,58,50,46,50,114,101,109)}))"><span>สมาคมเพื่อผู้บกพร่อง<br>ทางจิตแห่งประเทศไทย</span></div>
    </div>
  </section>

  <div style="display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin:30px 0 8px">
    <a href="<?php echo esc_url( home_url('/') ); ?>" style="display:inline-flex;align-items:center;gap:8px;background:var(--brand-dark);color:#fff;font-family:'Anuphan',sans-serif;font-weight:500;text-decoration:none;padding:11px 22px;border-radius:999px;font-size:.95rem">← กลับหน้าแรก</a>
    <a href="<?php echo esc_url( home_url('/development/') ); ?>" style="display:inline-flex;align-items:center;gap:8px;background:transparent;color:var(--brand-dark);border:1.5px solid var(--border);font-family:'Anuphan',sans-serif;font-weight:500;text-decoration:none;padding:11px 22px;border-radius:999px;font-size:.95rem">ดูขั้นตอนการพัฒนา →</a>
  </div>
  <p class="foot">จัดทำเพื่อใช้สื่อสารโครงสร้างเว็บไซต์ DTH Redesign v2.1 "Human &amp; Natural" — มิถุนายน 2569 · พิมพ์เป็น PDF ได้ (Ctrl+P)</p>
</div>
<?php
get_footer();
