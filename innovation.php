<?php
$innovationProducts = [
    [
        "title" => "INNER AND<br>THE HIDDEN",
        "description_title" => "Expert for<br>the new thing",
        "description_subtitle" => "Jacquard Tape",
        "image" => "img/11e.png",
        "text_align" => "right", // รูปภาพซ้าย ข้อความขวา
        "bg_class" => "" 
    ],
    [
        "title" => "FLEXY PULL",
        "description_title" => "Mesh the<br>difference",
        "description_subtitle" => "Raschel",
        "image" => "img/22e.png",
        "text_align" => "left", // ข้อความซ้าย รูปภาพขวา
        "bg_class" => "bg-gradient-to-r from-[#010411] via-[#051442] to-[#01061c]" // พื้นหลังสีน้ำเงินเข้มแบบในภาพ
    ],
    [
        "title" => "REFLECT ON<br>YOURSELF",
        "description_title" => "Blazing the right",
        "description_subtitle" => "Jacquard",
        "image" => "img/33e.png", // ใช้รูปชิ้นที่ 3 (33e.png) ตามที่สั่งมา
        "text_align" => "right", // รูปภาพอยู่ซ้าย ข้อความอยู่ขวา (สลับฟันปลาจากข้อ 2)
        "bg_class" => "" // ไม่ตั้งค่าพื้นหลังเพื่อให้กลืนไปกับสีดำของ Body
    ],
    [
        "title" => "EASY<br>AVAILABLE",
        "description_title" => "For essemble<br>your style",
        "description_subtitle" => "Crochet",
        "image" => "img/44e.png", // ตามที่คุณระบุ (44e.png)
        "text_align" => "left", // ข้อความซ้าย รูปภาพขวา สลับกับข้อที่สาม
        "bg_class" => "bg-gradient-to-r from-[#010411] via-[#051442] to-[#01061c]" // พื้นหลังสีน้ำเงินเข้ม (ใช้ของเดิมจากกรอบที่สอง)
    ],
    [
        "title" => "TOUCH THE<br>SOFT",
        "description_title" => "Feel the Smooth",
        "description_subtitle" => "Jacquard",
        "image" => "img/55e.png", // รูปภาพชิ้นที่ 5 (55e.png) 
        "text_align" => "right", // รูปซ้าย ข้อความขวา (จัดจังหวะสลับฟันปลาตัว Z)
        "bg_class" => "" // ไม่เติมคลาสพื้นหลังเพื่มเติมเพื่อให้กลืนไปกับสีดำสนิทของหน้าเว็บ
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INNOVATION - L.Y. INDUSTRIES</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-black text-white overflow-x-hidden">

<?php include 'header.php'; ?>

<!-- Premium Content Section -->
<section class="bg-black pt-32 pb-32 text-white min-h-screen">
    
    <!-- Title Header -->
    <div class="text-center mb-16 md:mb-24 px-4">
        <h1 class="text-[32px] md:text-[48px] font-extrabold uppercase tracking-[0.2em] text-white">
            INNOVATION
        </h1>
        <div class="w-16 md:w-20 h-[2px] bg-white mx-auto mt-6"></div>
    </div>

    <!-- Container สำหรับแสดงรายการสินค้า -->
    <div class="max-w-[1400px] mx-auto px-0 sm:px-8 space-y-16 lg:space-y-32">
        
        <?php foreach ($innovationProducts as $index => $item): ?>
            <?php 
                // เช็คว่า item ปัจจุบันข้อความอยู่ฝั่งไหน
                $flexDirection = ($item['text_align'] === 'left') ? 'md:flex-row-reverse' : 'md:flex-row';
                $bgClass = isset($item['bg_class']) ? $item['bg_class'] : '';
            ?>
            
            <div class="<?= $bgClass ?> w-full flex flex-col <?= $flexDirection ?> group transition-all duration-700 bg-transparent overflow-hidden sm:rounded-none">
                
                <!-- ฝั่งรูปภาพ -->
                <div class="w-full md:w-[65%] overflow-hidden relative">
                    <img src="<?= htmlspecialchars($item['image']) ?>" 
                         alt="<?= strip_tags($item['title']) ?>" 
                         class="w-full h-full min-h-[400px] md:min-h-full object-cover block transform transition-transform duration-[1.5s] ease-out group-hover:scale-[1.04]"> 
                </div>
                
                <!-- ฝั่งข้อความ -->
                <div class="w-full md:w-[35%] flex flex-col justify-between text-left py-12 px-8 md:py-16 md:px-12 lg:px-16">
                    
                    <!-- ข้อความหัวข้อด้านบน -->
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <span class="w-8 md:w-12 h-[1px] bg-gray-400 group-hover:bg-white transition-colors duration-500"></span>
                            <span class="text-[9px] md:text-[11px] text-gray-400 group-hover:text-white transition-colors duration-500 tracking-[0.2em] font-semibold uppercase">VOL. 0<?= $index + 1 ?></span>
                        </div>
                        <h2 class="text-[28px] md:text-[36px] lg:text-[46px] uppercase font-extrabold tracking-[0.08em] leading-[1.1] text-white drop-shadow-md">
                            <?= $item['title'] ?>
                        </h2>
                    </div>
                    
                    <!-- ข้อความอธิบายด้านล่างสุดของกรอบ -->
                    <div class="mt-12 md:mt-24">
                        <p class="text-[18px] md:text-[22px] lg:text-[28px] leading-[1.4] text-gray-200 font-medium mb-3 tracking-wide drop-shadow-sm">
                            <?= $item['description_title'] ?>
                        </p>
                        <p class="text-[11px] md:text-[13px] lg:text-[14px] text-gray-400 font-light tracking-[0.15em] uppercase">
                            <?= $item['description_subtitle'] ?>
                        </p>
                    </div>
                </div>
                
            </div>
            
        <?php endforeach; ?>

    </div>
</section>

<?php include 'footer.php'; ?>



</body>
</html>
