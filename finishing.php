<?php
$finishingProducts = [
    [
        // ข้อมูลสินค้าแรกของหมวด Finishing
        "title" => "SCREEN",
        // นำข้อความแบบเดียวกับในรูปตัวอย่างมาใส่ (ไม่ใส่ Quote) ซึ่งเป็นคำอธิบายชุดเดียวกับหมวดอื่นๆ ที่ผ่านมา
        "description" => "Structure and type of weaving provides strong properties, Can be adjusted to be flexible or inflexible as needed. It can also be woven into many different patterns, such as Herringbone tape, Gross gain, Twill and Jacquard suitable for use as waistband, Neck tape, Binding, Overlay tape or even a flat drawcord or drawcord.",
        "image" => "img/11d.png", // เปลี่ยนชี้ไปใช้งานรูป 11d.png ตามที่สั่งมา
        "text_align" => "right" // จัดหน้าให้ข้อความอธิบายอยู่ฝั่งขวา (รูปภาพอยู่ซ้าย) แบบในรูปตัวอย่าง
    ],
    [
        // ข้อมูลสินค้าที่สองของหมวด Finishing
        "title" => "SUBLIMATION",
        // ดึงข้อความอธิบายแบบเป๊ะๆ จากรูปภาพมาวาง (ไม่ใส่ Quotes)
        "description" => "Characteristics of knitting structure makes it have the properties of being lightweight and breathable because here are holes in the knitting structure. And is concise adjust to be flexible as needed. Suitable for use in decorating overlay parts of activewear, waist band etc.",
        "image" => "img/22d.png", // ใช้ชื่อรูปตามที่คุณสั่งมา
        "text_align" => "left" // จัดหน้าแบบฟันปลา (ข้อความอยู่ซ้าย รูปภาพอยู่ขวา)
    ],
    [
        // ข้อมูลสินค้าที่สามของหมวด Finishing
        "title" => "EMBOSS",
        // ดึงข้อความอธิบายแบบเป๊ะๆ จากรูปภาพมาวาง (ไม่ใส่ Quotes)
        "description" => "Another type of tape with a knit structure. Gives a softer touch and breathable well. There are a variety of pattern styles. Suitable for use in decorating sports wear or activewear to make them more special overlay. Can knit many different colors in the same tape.",
        "image" => "img/33d.png", // ใช้ชื่อรูปชิ้นที่ 3 นี้ตามไฟล์ที่คุณบอก 33d.png
        "text_align" => "right" // จัดหน้าแบบฟันปลาสลับกลับมาให้รูปซ้าย-ข้อความขวา
    ],
    [
        // ข้อมูลสินค้าที่สี่ของหมวด Finishing
        "title" => "SILICONE",
        // ดึงข้อความอธิบายจากรูปภาพมาวาง (ไม่ใส่ Quotes)
        "description" => "Braided and woven drawcord that can be made into many different forms and various patterns. Suitable for use as waist drawcord, shoe laces, multi-purpose drawstring as required. Provides strength, durability and a soft touch at the same time. Including assembly tipping with the drawcord. Can be done in a variety of techniques, such as Dip the silicone, Tipping metal head, Tipping plastic film head and using shrink tubing, etc.",
        "image" => "img/44d.png", // ใช้ชื่อรูปตามไฟล์ที่คุณบอก 44d.png
        "text_align" => "left" // จัดหน้าให้ข้อความอยู่ซ้าย-รูปขวา เพื่อสลับฟันปลากับข้อที่ 3
    ],
    [
        // ข้อมูลสินค้าที่ห้าของหมวด Finishing
        "title" => "TIPPING",
        // ดึงข้อความอธิบายแบบเป๊ะๆ จากรูปภาพ "Various formats for adding details..." (ไม่ใส่ Quotes)
        "description" => "Various formats for adding details to workpieces. Assemble the parts to be complete and more special. That has since Silk Screen color on the workpiece, Sublimation pattern printing, Debossed. You can choose the type of work that is appropriate for use and design. Makes it possible to add outstanding to clothes very well.",
        "image" => "img/55d.png", // ไฟล์ภาพตามที่คุณระบุ 55d.png
        "text_align" => "right" // สลับหน้าอีกครั้งให้ข้อความอยู่ขวา (รูปภาพอยู่ซ้าย) แบบในรูปตัวอย่างเป๊ะๆ
    ]
];
?>
<?php include 'header.php'; ?>

<!-- Content Section -->
<section class="bg-[#FAFAFA] pt-32 pb-16 text-gray-900">
    
    <!-- Page Header -->
    <div class="text-center mb-16 px-4">
        <h1 class="text-4xl md:text-5xl font-black tracking-[0.15em] uppercase text-black">FINISHING</h1>
    </div>

    <!-- Main Container -->
    <div class="max-w-[1250px] mx-auto px-0 sm:px-8">
        
        <?php foreach ($finishingProducts as $index => $item): ?>
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
            
            <?php if ($index < count($finishingProducts) - 1): ?>
                <!-- เส้นคั่นระหว่างรายการสินค้าแต่ละชิ้น -->
                <hr class="border-t border-gray-300 w-full my-8 sm:my-12">
            <?php endif; ?>

        <?php endforeach; ?>

    </div>
</section>

<?php include 'footer.php'; ?>
