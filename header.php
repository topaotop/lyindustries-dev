<?php
// กำหนดชื่อเว็บไซต์
$siteTitle = "L . Y .  I N D U S T R I E S";

// ตรวจสอบว่าอยู่หน้าไหนเพื่อตั้งค่าลิงก์ให้ถูกต้อง
$current_page = basename($_SERVER['PHP_SELF']);
$is_home = ($current_page == 'index.php' || $current_page == '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $siteTitle; ?>
    </title>
    <!-- เรียกใช้ Tailwind CSS เพื่อความสวยงามที่เหมือนเดิม -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- นำเข้าฟอนต์ Montserrat แบบเดียวกับเว็บหลัก -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-black text-gray-100 antialiased selection:bg-white selection:text-black">

    <!-- แถบนำทาง (Navigation Bar) -->
    <nav class="fixed w-full z-50 bg-[#FCFCF5]/90 backdrop-blur shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- ปุ่มเมนู Hamburger 3 ขีด ด้านซ้าย -->
                <div class="flex items-center">
                    <button type="button" onclick="toggleMenu()" class="text-gray-800 hover:text-black focus:outline-none">
                        <svg class="h-9 w-9 font-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <!-- โลโก้ตรงกลาง -->
                <div class="absolute left-1/2 transform -translate-x-1/2">
                    <a href="index.php" class="text-xl md:text-2xl font-bold tracking-[0.2em] text-gray-900 whitespace-nowrap hover:opacity-75 transition-opacity">
                        <?= $siteTitle; ?>
                    </a>
                </div>
                <!-- กล่องเปล่าด้านขวาเพื่อให้ดูสมดุล -->
                <div class="w-9 h-9"></div>
            </div>
        </div>
    </nav>

    <!-- Side Menu Overlay -->
    <div id="side-menu" class="fixed inset-0 z-[60] hidden">
        <div id="side-menu-overlay" class="fixed inset-0 bg-black/40 opacity-0 transition-opacity duration-300 cursor-pointer" onclick="toggleMenu()"></div>
        
        <div id="side-menu-drawer" class="fixed inset-y-0 left-0 w-[80%] max-w-sm bg-gradient-to-b from-[#fbeaf0] via-[#c6e6fc] to-[#dbccf0] transform -translate-x-full transition-transform duration-300 ease-in-out shadow-2xl">
            <div class="flex justify-start pt-6 px-6 pb-4">
                <button type="button" onclick="toggleMenu()" class="text-gray-800 hover:text-black focus:outline-none mt-2">
                    <svg class="h-9 w-9 font-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="px-5 flex flex-col space-y-1 mt-2 text-center font-bold text-gray-800 text-[18px]">
                <a href="index.php" onclick="toggleMenu()" class="<?= ($current_page == 'index.php' || $current_page == '') ? 'bg-white text-black shadow-sm' : 'hover:bg-white/30' ?> py-2.5 rounded-full transition tracking-wide">Home</a>
                <a href="about.php" onclick="toggleMenu()" class="<?= ($current_page == 'about.php') ? 'bg-white text-black shadow-sm' : 'hover:bg-white/30' ?> py-2.5 rounded-full transition tracking-wide">About</a>
                <a href="products_detail.php" onclick="toggleMenu()" class="<?= ($current_page == 'products_detail.php') ? 'bg-white text-black shadow-sm' : 'hover:bg-white/30' ?> py-2.5 rounded-full transition tracking-wide">Products Detail</a>
                <a href="innovation.php" onclick="toggleMenu()" class="py-2.5 hover:bg-white/30 rounded-full transition tracking-wide">Innovation</a>
                <a href="contact.php" onclick="toggleMenu()" class="<?= ($current_page == 'contact.php') ? 'bg-white text-black shadow-sm' : 'hover:bg-white/30' ?> py-2.5 rounded-full transition tracking-wide">Contact</a>
                <a href="shop.php" onclick="toggleMenu()" class="<?= ($current_page == 'shop.php') ? 'bg-white text-black shadow-sm' : 'hover:bg-white/30' ?> py-2.5 rounded-full transition tracking-wide">Shop</a>
            </div>
        </div>
    </div>

    <!-- Script สำหรับ Side Menu -->
    <script>
        function toggleMenu() {
            const menu = document.getElementById('side-menu');
            const drawer = document.getElementById('side-menu-drawer');
            const overlay = document.getElementById('side-menu-overlay');
            
            if (menu.classList.contains('hidden')) {
                // เปิดเมนู
                menu.classList.remove('hidden');
                setTimeout(() => {
                    drawer.classList.remove('-translate-x-full');
                    overlay.classList.remove('opacity-0');
                    overlay.classList.add('opacity-100');
                }, 10);
            } else {
                // ปิดเมนู
                drawer.classList.add('-translate-x-full');
                overlay.classList.remove('opacity-100');
                overlay.classList.add('opacity-0');
                setTimeout(() => {
                    menu.classList.add('hidden');
                }, 300);
            }
        }
    </script>
