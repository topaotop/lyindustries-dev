# PROJECT_STATUS.md

สถานะโปรเจกต์เว็บไซต์ L.Y. Industries — อัปเดตทุกครั้งที่จบงาน (ดูกติกาใน [CLAUDE.md](CLAUDE.md))

**อัปเดตล่าสุด:** 2026-10-02
**Git:** มี 1 commit — `a24fa07 init first` (2026-10-02, Itti Phuksawan) ซึ่ง import โค้ดทั้งหมดเข้ามาครั้งเดียว ไฟล์ source มี timestamp 2026-04-01 → ประวัติการพัฒนาก่อนหน้าไม่อยู่ใน git ข้อมูลด้านล่างจึงอนุมานจาก source code ปัจจุบัน

---

## ✅ งานที่ทำเสร็จแล้ว

- [x] Layout ร่วม: `header.php` (navbar + side drawer menu) และ `footer.php` (ที่อยู่, เบอร์โทร, อีเมล, เวลาทำการ)
- [x] Home (`index.php`): hero video carousel จาก `media/header/` พร้อม dots, section "WHAT WE CAN DO" 5 หมวด, YouTube showcase, About + Vision, Certificate carousel, Partners
- [x] About (`about.php`): วิดีโอ, ข้อความบริษัท, YouTube embed
- [x] Products overview (`products_detail.php`): การ์ด 5 หมวดพร้อมปุ่ม DISCOVER
- [x] หน้าหมวดสินค้า 5 หน้า: Needle Loom (7 รายการ), Crochet (3), Raschel (2), Braiding (3), Finishing (5)
- [x] Innovation (`innovation.php`): 5 รายการ VOL.01–05
- [x] Contact (`contact.php`): ที่อยู่ HQ, Google Maps, UI ฟอร์มติดต่อ
- [x] Shop (`shop.php`): หน้า placeholder "INCOMING"
- [x] ตั้ง git repo + remote GitHub (`topaotop/lyindustries-dev`)
- [x] **แก้ bug #1** (2026-10-02) — สร้างส่วน certificate lightbox + script ใน `index.php` ที่หายไปขึ้นใหม่ (ไม่มีไฟล์ต้นฉบับ จึงเขียนใหม่ให้เข้ากับฟังก์ชันที่เหลืออยู่)
- [x] **แก้ bug #2** (2026-10-02) — ลิงก์ `CROCHET.php` → `crochet.php` และตรวจ path ทุกไฟล์แบบ case-sensitive แล้ว ไม่พบจุดอื่นที่ไม่ตรง
- [x] **แก้ bug #3** (2026-10-02) — เอา `*.png`/`*.mp4` ออกจาก `.gitignore` และ commit รูป/วิดีโอทั้งหมดเข้า git

## 🔄 งานที่กำลังทำ

> ยังไม่มีข้อมูลยืนยันจากผู้ใช้ — สิ่งที่ code บ่งชี้ว่ายังทำไม่เสร็จ:

- [ ] ฟอร์มติดต่อ — มีแค่ UI, `action="#"` ยังไม่ส่งข้อมูลไปไหน
- [ ] Shop — ยังเป็น placeholder
- [ ] เนื้อหาคำอธิบายสินค้าในหน้าหมวดย่อย — ส่วนใหญ่เป็นข้อความ placeholder ที่ copy มาจาก 5 หมวดใน index (เช่น "GRIPPER", "SCREEN", "DRAWSTRING" ใช้คำอธิบายที่ไม่ตรงกับสินค้า) ต้องการ copy จริงจากฝ่ายการตลาด

## 🐞 Bug ที่พบ / ต้องแก้

เรียงตามความรุนแรง — แก้แล้วจะขีดฆ่าและระบุวันที่

| # | ความรุนแรง | ไฟล์ | ปัญหา |
|---|---|---|---|
| 1 | ✅ แก้แล้ว 2026-10-02 (ผู้ใช้ทดสอบผ่าน) | `index.php:272` | ~~ไฟล์เสียหาย (truncated/merged) — lightbox markup, `<script>`, `certList`, `currentCertIndex`, `scrollCert()` หายไป~~ → เขียนใหม่: ปุ่ม prev/next, `<img id="lightboxImg">`, คลิกพื้นหลังเพื่อปิด, `certList` จาก `json_encode($certFiles)`, `scrollCert()` เลื่อนทีละ 1 การ์ด |
| 2 | ✅ แก้แล้ว 2026-10-02 | `products_detail.php:51` | ~~ลิงก์ไป `CROCHET.php` แต่ไฟล์จริงคือ `crochet.php` → 404 บน Linux~~ → เปลี่ยนเป็น `crochet.php`; ตรวจ href/src/path ทุกไฟล์แบบ case-sensitive แล้วตรงทั้งหมด |
| 3 | ✅ แก้แล้ว 2026-10-02 | `.gitignore` | ~~ignore `*.png` และ `*.mp4` → รูป/วิดีโอไม่อยู่ใน git~~ → ลบออกจาก `.gitignore` และ commit asset 42 ไฟล์ (~231 MB) แบบไม่ลดขนาด ไม่ใช้ LFS |
| 4 | 🟡 ต่ำ | `contact.php`, `shop.php`, `innovation.php` | เขียน `<!DOCTYPE>/<html>/<head>/<body>` เองแล้ว include `header.php` ที่สร้างซ้ำอีกชุด และปิด `</body></html>` ซ้ำกับ `footer.php` → HTML ไม่ valid, `<title>` เฉพาะหน้าซ้อนกับของ header |
| 5 | 🟡 ต่ำ | `header.php:73` | ลิงก์ "Innovation" ไม่มี active state เหมือนเมนูอื่น; หน้าหมวดสินค้าย่อยก็ไม่ highlight "Products Detail" |
| 6 | 🟡 ต่ำ | `footer.php:44` | ลิงก์ Facebook เป็น `href="#"` |
| 7 | 🟡 ต่ำ | `footer.php:50` | อีเมล `Info@L.Y.Industries.co.th` — โดเมนมีจุดใน "L.Y." น่าจะไม่ใช่อีเมลจริง ต้องยืนยัน |
| 8 | 🟡 ต่ำ | หลายไฟล์ | Typo ในเนื้อหา: "Gross gain" (ควรเป็น Grosgrain), "because here are holes", "essemble", "Blazing the right" |
| 9 | 🟡 ต่ำ | `img/`, `media/header/` | `img/neck_tape.png` ไม่ถูกใช้ และไฟล์ซ้ำใน `media/header/` (`Banner_05 (1).mp4`, `banner1 (1).mp4`) — ไฟล์ที่ไม่ถูกใช้/ซ้ำ ทำให้ hero carousel เล่นวิดีโอซ้ำ (glob ดึงทุกไฟล์) |
| 10 | ℹ️ | ทุกหน้า | `Thumbs.db` ถูก commit เข้า git |

## 📋 งานที่ต้องทำต่อ (Backlog)

1. ~~แก้ bug #1~~ ✅ เสร็จแล้ว
2. ~~แก้ bug #2 และตรวจทุกลิงก์/path ให้ตรงตัวพิมพ์~~ ✅ เสร็จแล้ว
3. ~~ตัดสินใจวิธีจัดการ asset~~ ✅ เก็บใน git ปกติ — (พิจารณาภายหลัง) ลดขนาดรูปเป็น WebP / บีบอัดวิดีโอ เพื่อความเร็วเว็บ: รูป PNG 3–10 MB/รูป, `PASSION (1).mp4` 28.8 MB
4. ปรับ `contact.php`, `shop.php`, `innovation.php` ให้ใช้โครง header/footer แบบเดียวกับหน้าอื่น
5. ทำ backend ฟอร์มติดต่อ (ส่งอีเมล / บันทึก) + validation + กัน spam
6. ใส่คำอธิบายสินค้าจริงแทน placeholder และแก้ typo
7. ใส่ลิงก์ Facebook และยืนยันอีเมลบริษัทที่ถูกต้อง
8. ระบุ production environment และขั้นตอน deploy แล้วบันทึกใน CLAUDE.md
9. (พิจารณา) เปลี่ยน Tailwind Play CDN เป็น build จริงสำหรับ production, ทำ SEO meta / title รายหน้า, ย้ายข้อมูลสินค้าที่ซ้ำกัน (index / products_detail) ไปไว้ที่เดียว
10. ลบ `Thumbs.db` ออกจาก git และเพิ่มใน `.gitignore`

## 🧭 Technical Decisions ที่สำคัญ

| Decision | เหตุผล / ผลกระทบ |
|---|---|
| Plain PHP + include header/footer ไม่ใช้ framework | เว็บเป็น brochure site ขนาดเล็ก รันบน XAMPP ได้ทันที |
| Tailwind ผ่าน Play CDN ไม่มี build step | พัฒนาเร็ว ไม่ต้องติดตั้งอะไร — แลกกับ performance และไม่เหมาะ production |
| ข้อมูลสินค้าเป็น PHP array ในแต่ละหน้า (ไม่มี DB) | แก้เนื้อหาง่าย แต่ข้อมูลซ้ำระหว่าง `index.php` กับ `products_detail.php` |
| Hero video และ certificate โหลดด้วย `glob()` จากโฟลเดอร์ | เพิ่ม/ลบเนื้อหาได้แค่วางไฟล์ ไม่ต้องแก้โค้ด; `PASSION (1).mp4` ถูกบังคับให้เล่นก่อน |
| `description` ในหน้าหมวดสินค้าไม่ escape | เพื่อรองรับ `<br>` — ปลอดภัยเพราะข้อมูล hardcoded เท่านั้น ห้ามรับ input จากผู้ใช้เข้าฟิลด์นี้ |
| Track `*.png` / `*.mp4` ใน git แบบปกติ ไม่ใช้ LFS และไม่ลดขนาด (2026-10-02, ผู้ใช้ตัดสินใจ) | asset ได้ backup และ deploy จาก git ครบ, ไม่ต้องตั้งค่า LFS — แลกกับ repo ใหญ่ (~230 MB) และทุกการแก้รูป/วิดีโอจะเพิ่มขนาด history ถาวร |
| Cache busting แบบ query string (`img/77.png?v=new`) | ใช้ครั้งเดียวใน `needle_loom.php` เพื่อบังคับโหลดรูปใหม่ |

## ❓ คำถามที่รอคำตอบจากเจ้าของโปรเจกต์

- Production server คืออะไร (shared hosting / VPS, Linux หรือ Windows) และ deploy อย่างไร
- มีไฟล์ `index.php` ต้นฉบับที่ไม่เสียหายหรือไม่
- ฟอร์มติดต่อควรส่งไปที่อีเมลไหน
- อีเมลและ Facebook ที่ถูกต้องของบริษัท
