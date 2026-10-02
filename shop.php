<?php
// กำหนดหน้าปัจจุบัน
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP - L.Y. INDUSTRIES</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-black text-white overflow-x-hidden flex flex-col min-h-screen">

<?php include 'header.php'; ?>

<!-- Content Section -->
<section class="flex-grow flex items-center justify-center bg-black pt-32 pb-24 text-white min-h-[70vh]">
    <div class="text-center px-4">
        <!-- ป้าย INCOMING ตัวใหญ่เด่นชัด -->
        <h1 class="text-[40px] md:text-[60px] lg:text-[80px] font-extrabold uppercase tracking-widest text-white mb-6 animate-pulse">
            INCOMING
        </h1>
        
        <p class="text-[16px] md:text-[20px] text-gray-400 font-light tracking-wide max-w-2xl mx-auto">
            Our online store is currently under construction.<br class="hidden md:block"> Stay tuned for exciting products and updates!
        </p>
        
        <!-- ปุ่มกลับหน้าหลัก -->
        <div class="mt-12">
            <a href="index.php" class="inline-block border-2 border-white px-8 py-3 text-[14px] font-bold uppercase tracking-wider text-white hover:bg-white hover:text-black transition-colors duration-300 rounded-none">
                RETURN TO HOME
            </a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

</body>
</html>
