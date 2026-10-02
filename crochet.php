<?php
$crochetProducts = [
    [
        // ข้อมูลสินค้าแรก: BASIC CROCHET
        "title" => "BASIC CROCHET",
        // อิงตามรูปตัวอย่างล่าสุด: ไม่มีการครอบด้วยเครื่องหมายคำพูด ""
        "description" => "Structure and type of weaving provides strong properties, Can be adjusted to be flexible or inflexible as needed. It can also be woven into many different patterns, such as Herringbone tape, Gross gain, Twill and Jacquard suitable for use as waistband, Neck tape, Binding, Overlay tape or even a flat drawcord or drawcord.",
        "image" => "img/11a.png", // เปลี่ยนมาใช้งานรูป 11a.png โชว์ความคมชัดของโครเชต์
        "text_align" => "right" // กำหนดให้ข้อความอยู่ขวา (รูปอยู่ซ้าย) แบบในรูปตัวอย่าง
    ],
    [
        // ข้อมูลสินค้าที่สอง: ADVANCE CROCHET
        "title" => "ADVANCE CROCHET",
        // ดึงข้อความเป๊ะๆ ตามรูปภาพมาใส่ และไม่มีเครื่องหมายคำพูด (Quotes) 
        "description" => "Characteristics of knitting structure makes it have the properties of being lightweight and breathable because here are holes in the knitting structure. And is concise adjust to be flexible as needed. Suitable for use in decorating overlay parts of activewear, waist band etc.",
        "image" => "img/22a.png", // อ้างอิงไฟล์รูปชื่อ 22a ตามคำสั่ง
        "text_align" => "left" // จัดให้ข้อความอยู่ทางซ้าย และรูปอยู่ทางขวา เพื่อสลับฟันปลาจากรายการแรก
    ],
    [
        // ข้อมูลสินค้าที่สาม: GRIPPER
        "title" => "GRIPPER",
        // ดึงข้อความตามรูปภาพมาใส่ สังเกตว่าเริ่มเขียนติดกันไปเลย ไม่มีพิมพ์ใหม่ หรือเครื่องหมายคำพูด
        "description" => "Another type of tape with a knit structure. Gives a softer touch and breathable well. There are a variety of pattern styles. Suitable for use in decorating sports wear or activewear to make them more special overlay. Can knit many different colors in the same tape.",
        "image" => "img/33a.png", // อ้างอิงไฟล์รูปชื่อ 33a ตามที่ระบุมา
        "text_align" => "right" // ตั้งค่าให้ข้อความอยู่ทางขวา (รูปภาพอยู่ซ้าย) สลับฟันปลาจากรายการที่สอง
    ]
];
?>
<?php include 'header.php'; ?>

<!-- Content Section -->
<section class="bg-[#FAFAFA] pt-32 pb-16 text-gray-900">
    
    <!-- Page Header -->
    <div class="text-center mb-16 px-4">
        <h1 class="text-4xl md:text-5xl font-black tracking-[0.15em] uppercase text-black">CROCHET</h1>
    </div>

    <!-- Main Container -->
    <div class="max-w-[1250px] mx-auto px-0 sm:px-8">
        
        <?php foreach ($crochetProducts as $index => $item): ?>
            <?php 
                // ตรวจสอบตำแหน่งของข้อความ ถ้าระบุ 'right' ข้อความจะอยู่ขวาภาพ กรณีไม่ได้ตั้งให้สลับซ้าย-ขวา
                $align = isset($item['text_align']) ? $item['text_align'] : ($index % 2 == 0 ? 'left' : 'right');
                
                // กำหนดทิศทาง Flexbox: ถ้าข้อความชิดขวา ให้รูปภาพอยู่ซ้าย (flex-row), ส่วนข้อความชิดซ้าย ให้รูปภาพอยู่ขวา (flex-row-reverse)
                $flexDirection = ($align === 'right') ? 'md:flex-row' : 'md:flex-row-reverse';
            ?>
            
            <!-- คอนเทนเนอร์หลักสำหรับสินค้าแต่ละชิ้น เปลี่ยนจากการใช้ absolute เป็น flex-box ขนาบข้างแบบในตัวอย่าง -->
            <div class="w-full flex flex-col <?= $flexDirection ?> items-center gap-8 md:gap-12 lg:gap-16 my-10 sm:my-16">
                
                <!-- ส่วนของรูปภาพสินค้า จัดการให้กินพื้นที่ประมาณ 50-60% ของจอเดสก์ท็อป -->
                <div class="w-full md:w-3/5">
                    <img src="<?= htmlspecialchars($item['image']); ?>" alt="<?= htmlspecialchars($item['title']); ?>" class="w-full h-auto object-cover block">
                </div>
                
                <!-- ส่วนของข้อความและรายละเอียดสินค้า จัดให้ชิดซ้ายหรือขวาตาม layout สลับ -->
                <div class="w-full md:w-2/5 flex flex-col text-black px-4 md:px-0 <?= $align === 'right' ? 'text-left' : 'text-right md:text-left' ?>">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-[40px] font-extrabold mb-4 sm:mb-6 tracking-wide uppercase">
                        <?= htmlspecialchars($item['title']); ?>
                    </h2>
                    <!-- แสดงคำอธิบายสินค้า ยอมให้ใช้ tag HTML (อย่าง <br>) ในเนื้อหาได้เลยไม่ได้ครอบ htmlspecialchars -->
                    <p class="text-sm sm:text-base md:text-md lg:text-[16px] font-medium leading-[1.8] text-gray-800 break-words">
                        <?= $item['description']; ?>
                    </p>
                </div>

            </div>
            
            <?php if ($index < count($crochetProducts) - 1): ?>
                <!-- เส้นคั่นระหว่างรายการสินค้าแต่ละชิ้น -->
                <hr class="border-t border-gray-300 w-full my-8 sm:my-12">
            <?php endif; ?>

        <?php endforeach; ?>

    </div>
</section>

<?php include 'footer.php'; ?>
