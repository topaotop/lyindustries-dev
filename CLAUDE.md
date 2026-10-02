# CLAUDE.md

คู่มือสำหรับ agent ที่ทำงานในโปรเจกต์นี้ — อ่านไฟล์นี้และ [PROJECT_STATUS.md](PROJECT_STATUS.md) ก่อนเริ่มงานทุกครั้ง

## Project Overview

เว็บไซต์องค์กร (corporate / product showcase) ของ **L.Y. INDUSTRIES CO., LTD.** — ผู้ผลิตสิ่งทอ narrow fabrics, elastics, waistbands, drawcords และชิ้นส่วนตกแต่งเสื้อผ้ากีฬา (ก่อตั้ง 1978, ลูกค้าเช่น NIKE / ADIDAS / MIZUNO, รับรอง Oeko-Tex และ NIKE RSL)

- เป็นเว็บแสดงข้อมูล (brochure site) ล้วน — **ไม่มี database, ไม่มี login, ไม่มี backend logic**
- เนื้อหาทั้งหมดเป็นภาษาอังกฤษ, comment ในโค้ดเป็นภาษาไทย
- Git remote: `https://github.com/topaotop/lyindustries-dev.git` (branch `main`)

## Tech Stack

| ส่วน | เทคโนโลยี |
|---|---|
| Server-side | PHP แบบ plain (ไม่มี framework, ไม่มี Composer) — dev ใช้ PHP 8.2.12 จาก XAMPP |
| CSS | Tailwind CSS ผ่าน **Play CDN** (`<script src="https://cdn.tailwindcss.com">`) — ไม่มี build step, ไม่มี `tailwind.config` |
| Font | Google Fonts — Montserrat |
| JavaScript | Vanilla JS แบบ inline `<script>` ในแต่ละหน้า (ไม่มี npm / bundler) |
| Embed ภายนอก | YouTube iframe (`Lr59gy7RcWo`), Google Maps iframe |

## Architecture

**Multi-page PHP site แบบ include header/footer**

```
page.php
 ├─ (optional) กำหนด data array ของหน้า เช่น $products, $needleLoomProducts
 ├─ include 'header.php'   → เปิด <!DOCTYPE>, <head> (Tailwind + font), <body>, navbar, side menu + toggleMenu()
 ├─ เนื้อหาหน้า (loop data array ด้วย foreach แล้ว render ด้วย Tailwind)
 └─ include 'footer.php'   → footer ที่อยู่/ติดต่อ และปิด </body></html>
```

- **ข้อมูลสินค้าเป็น hardcoded PHP array** อยู่ด้านบนของแต่ละไฟล์ (key: `title`, `description`, `image`, `text_align`, บางหน้ามี `bg_class`, `description_title`, `description_subtitle`)
- **Dynamic จาก filesystem** (ใน `index.php`):
  - Hero video carousel = `glob("media/header/*.mp4")` โดยบังคับให้ `media/header/PASSION (1).mp4` เล่นเป็นตัวแรก
  - Certificate carousel = `glob("cert/*.{jpg,png,...}")` → เพิ่ม/ลบใบรับรองได้โดยวางไฟล์ในโฟลเดอร์ `cert/`
- Navigation: side drawer ใน `header.php`, active state เช็คจาก `basename($_SERVER['PHP_SELF'])`

### หน้าเว็บ

| ไฟล์ | หน้าที่ |
|---|---|
| `index.php` | Home: hero video carousel, "WHAT WE CAN DO" (5 หมวด), YouTube showcase, About/Vision, Certificate carousel + lightbox, Partners |
| `about.php` | About: วิดีโอ `media/721622625.733111.mp4`, ข้อความบริษัท, YouTube |
| `products_detail.php` | "OUR COLLECTIONS" — การ์ด 5 หมวด ลิงก์ไปหน้าหมวดสินค้า |
| `needle_loom.php`, `crochet.php`, `raschel.php`, `braiding.php`, `finishing.php` | หน้าหมวดสินค้า (layout สลับซ้าย-ขวาแบบ zig-zag, พื้นหลังสว่าง `#FAFAFA`) |
| `innovation.php` | "INNOVATION" — 5 รายการ VOL.01–05 |
| `contact.php` | ที่อยู่, Google Map, ฟอร์มติดต่อ (**ยังไม่มี backend**) |
| `shop.php` | Placeholder "INCOMING" |
| `header.php` / `footer.php` | Partial ที่ include ร่วมกัน |

## Folder Structure

```
lyindustries-dev/
├── *.php            # ทุกหน้าอยู่ที่ root (ไม่มี subfolder สำหรับ code)
├── img/             # รูปสินค้า/หมวด (.png ส่วนใหญ่ ถูก gitignore), .jpg ของ index
├── media/           # วิดีโอ about (*.mp4 — gitignored)
│   └── header/      # วิดีโอ hero carousel ของ index (*.mp4 — gitignored)
├── cert/            # รูปใบรับรอง — โหลดอัตโนมัติด้วย glob
├── partners/        # logopartners.jpg
├── CLAUDE.md
└── PROJECT_STATUS.md
```

**ข้อตั้งชื่อรูป** (เป็น convention ที่ใช้อยู่):
- `img/11.png`–`77.png` → needle_loom, suffix `a` → crochet, `b` → raschel, `c` → braiding, `d` → finishing, `e` → innovation (ลำดับ 11, 22, 33, … = รายการที่ 1, 2, 3, …)
- `img/1.png`–`5.png` → การ์ดใน products_detail
- `img/nl.jpg`, `CROCHET.jpg`, `RASCHEL.jpg`, `BRAIDING.jpg`, `FINISHING.jpg` → section ใน index

## Coding Conventions

ทำตามสไตล์ที่มีอยู่ ไม่เพิ่ม framework/เครื่องมือใหม่โดยไม่ได้รับอนุญาต

- **Styling**: ใช้ Tailwind utility class inline เท่านั้น (นิยม arbitrary values เช่น `text-[13px]`, `tracking-[0.2em]`, `bg-[#FAFAFA]`) — ไม่มีไฟล์ CSS แยก
- **Design language**: ธีมดำ-ขาว, ตัวอักษร uppercase + letter-spacing กว้าง, `font-extrabold`, ปุ่ม `rounded-none`, hover transition; หน้าหมวดสินค้าใช้พื้นสว่าง
- **PHP**: short echo `<?= ... ?>`, alternative syntax `foreach (...): ... endforeach;`, ตัวแปร camelCase (`$needleLoomProducts`) ปนกับ snake_case (`$current_page`, `$video_dir`)
- **Data-driven layout**: เพิ่ม/แก้สินค้าโดยแก้ array ด้านบนไฟล์ ไม่ copy markup; `text_align` = `"right"` → รูปซ้าย ข้อความขวา, `"left"` → กลับกัน
- **Escaping**: `title` และ `image` ผ่าน `htmlspecialchars()`; `description` ในหน้าหมวดสินค้า **ตั้งใจไม่ escape** เพื่อให้ใช้ `<br>` ได้ (ข้อมูลเป็น hardcoded เท่านั้น)
- **Comments**: ภาษาไทย อธิบายแต่ละ section ของ HTML
- **Line endings**: CRLF, encoding UTF-8
- **โครงหน้าใหม่**: ให้ใช้แบบ `about.php` / หน้าหมวดสินค้า คือ `<?php include 'header.php'; ?>` … `<?php include 'footer.php'; ?>` โดย **ไม่** เขียน `<!DOCTYPE>/<head>/<body>` เองซ้ำ (header/footer ทำให้แล้ว)

## Development / Production Environment

### Development
- Windows + **XAMPP** (Apache + PHP 8.2.12) — project อยู่ที่ `C:\xampp\htdocs\lyindustries-dev`
- เปิดผ่าน `http://localhost/lyindustries-dev/` (เปิด Apache ใน XAMPP Control Panel)
- ไม่มี build, ไม่มี dependency install, ไม่มี test suite
- ตรวจ syntax: `C:\xampp\php\php.exe -l <file>.php`

### Production
- **ยังไม่มีข้อมูลใน repo** (ไม่มี deploy script / config / CI) — ต้องสอบถามเจ้าของโปรเจกต์ก่อนสรุปเรื่อง host, OS, วิธี deploy
- ข้อควรระวังเมื่อ deploy:
  - `.gitignore` ตัด `*.png` และ `*.mp4` ออก → **deploy จาก git อย่างเดียวจะขาดรูปสินค้าและวิดีโอเกือบทั้งหมด** ต้อง copy asset แยก
  - ถ้า server เป็น Linux ชื่อไฟล์ case-sensitive (เช่น ลิงก์ `CROCHET.php` จะ 404)
  - Tailwind Play CDN ไม่แนะนำสำหรับ production

## Important Rules for Agents

1. **อ่าน `PROJECT_STATUS.md` ก่อนเริ่มงาน** และ **ทุกครั้งที่แก้ source code ต้องตรวจว่าต้องอัปเดต `CLAUDE.md` และ `PROJECT_STATUS.md` หรือไม่**
   - `PROJECT_STATUS.md` → งานเสร็จ, bug ที่แก้/เจอใหม่, backlog, technical decision ใหม่, วันที่อัปเดตล่าสุด
   - `CLAUDE.md` → เมื่อเปลี่ยน architecture, tech stack, folder structure, convention, environment หรือเพิ่ม/ลบหน้า
   - ถ้าต้องอัปเดต ให้แก้ใน commit เดียวกับ source code
2. **อย่าแก้ source code เกินกว่าที่ได้รับมอบหมาย** — ถ้าเจอ bug อื่นระหว่างทาง ให้บันทึกใน PROJECT_STATUS.md แล้วแจ้งผู้ใช้ ไม่แก้เอง
3. **ห้ามเพิ่ม framework / build tool / package manager / database** (npm, Composer, Laravel, Tailwind build ฯลฯ) โดยไม่ได้รับอนุมัติ
4. **ห้ามลบหรือเปลี่ยนชื่อไฟล์ใน `img/`, `media/`, `cert/`, `partners/`** — asset ส่วนใหญ่ไม่อยู่ใน git (gitignored) ลบแล้วกู้คืนจาก git ไม่ได้
5. **ห้ามแก้ `.gitignore` ให้ track `*.png`/`*.mp4`** โดยไม่ถามก่อน (ไฟล์วิดีโอใหญ่)
6. ระวัง **ตัวพิมพ์เล็ก/ใหญ่ของชื่อไฟล์** ให้ตรงกับไฟล์จริงเสมอ (dev เป็น Windows ซึ่งไม่ case-sensitive จึงซ่อน bug ได้)
7. ข้อมูลบริษัท (ที่อยู่, เบอร์โทร, อีเมล, ชื่อแบรนด์ลูกค้า, ใบรับรอง) **ห้ามแต่งเติมเอง** — ใช้เฉพาะที่มีในโค้ดหรือที่ผู้ใช้ให้มา
8. แก้ header/footer กระทบทุกหน้า — ตรวจทุกหน้าหลังแก้
9. หลังแก้ PHP ให้รัน `php -l` และเปิดหน้าใน browser ผ่าน localhost เพื่อตรวจ
10. **Git: commit ทุกครั้งที่ทำงานเสร็จแต่ละงาน (ไม่ต้องรอสั่ง) แต่ห้าม push** — ผู้ใช้ push เองผ่าน SourceTree
    - commit message สั้น บอกว่าทำอะไร; commit เฉพาะไฟล์ที่เกี่ยวกับงานนั้น
    - ตรวจ `git status` / `git diff` ก่อน commit ห้ามติดไฟล์ที่ไม่เกี่ยวข้อง
