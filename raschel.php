<?php
$raschelProducts = [
    [
        // ข้อมูลสินค้าแรกของหมวด Raschel
        "title" => "BASIC RASCHEL",
        // นำข้อความตามในรูปมาใส่ (ไม่ใส่ Quote) ซึ่งเป็นคำอธิบายเดียวกันกับส่วน Basic
        "description" => "Structure and type of weaving provides strong properties, Can be adjusted to be flexible or inflexible as needed. It can also be woven into many different patterns, such as Herringbone tape, Gross gain, Twill and Jacquard suitable for use as waistband, Neck tape, Binding, Overlay tape or even a flat drawcord or drawcord.",
        "image" => "img/11b.png", // เปลี่ยนชี้ไปใช้งานรูป 11b.png ตามที่สั่งมา
        "text_align" => "right" // จัดหน้าให้ข้อความอยู่ขวา (รูปภาพอยู่ซ้าย)
    ],
    [
        // ข้อมูลสินค้าที่สองของหมวด Raschel
        "title" => "ADVANCE RASCHEL",
        // ดึงข้อความอธิบายแบบเป๊ะๆ มาวาง (ไม่ใส่ Quotes)
        "description" => "Characteristics of knitting structure makes it have the properties of being lightweight and breathable because here are holes in the knitting structure. And is concise adjust to be flexible as needed. Suitable for use in decorating overlay parts of activewear, waist band etc.",
        "image" => "img/22b.png", // ใช้ชื่อรูปตามที่คุณระบุมา
        "text_align" => "left" // จัดให้ข้อความอยู่ซ้าย (รูปภาพอยู่ขวา) เพื่อให้สลับหน้ากับตัวด้านบนได้อย่างสวยงาม
    ]
];
?>
<?php include 'header.php'; ?>

<!-- Content Section -->
<section class="bg-[#FAFAFA] pt-32 pb-16 text-gray-900">
    
    <!-- Page Header -->
    <div class="text-center mb-16 px-4">
        <h1 class="text-4xl md:text-5xl font-black tracking-[0.15em] uppercase text-black">RASCHEL</h1>
    </div>

    <!-- Main Container -->
    <div class="max-w-[1250px] mx-auto px-0 sm:px-8">
        
        <?php foreach ($raschelProducts as $index => $item): ?>
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
            
            <?php if ($index < count($raschelProducts) - 1): ?>
                <!-- เส้นคั่นระหว่างรายการสินค้าแต่ละชิ้น -->
                <hr class="border-t border-gray-300 w-full my-8 sm:my-12">
            <?php endif; ?>

        <?php endforeach; ?>

    </div>
</section>

<?php include 'footer.php'; ?>
