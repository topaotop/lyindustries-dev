<?php
// กำหนดหน้าปัจจุบัน
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT US - L.Y. INDUSTRIES</title>
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
            CONTACT US
        </h1>
        <div class="w-16 md:w-20 h-[2px] bg-white mx-auto mt-6"></div>
    </div>

    <!-- Container สำหรับข้อมูลติดต่อ -->
    <div class="max-w-[1400px] mx-auto px-0 sm:px-8 space-y-24 lg:space-y-32">
        
        <!-- รูปภาพและข้อมูลที่อยู่ -->
        <div class="w-full flex flex-col md:flex-row gap-0 group transition-all duration-700 bg-transparent overflow-hidden">
            
            <!-- ฝั่งรูปภาพโรงงาน -->
            <div class="w-full md:w-[60%] overflow-hidden relative">
                <!-- อัปเดตไฟล์รูปภาพเป็น 11f.JPG ควบคุมนามสกุลให้ตรงเป๊ะ -->
                <img src="img/11f.JPG" 
                     alt="Factory Interior" 
                     class="w-full h-full min-h-[300px] md:min-h-full object-cover block transform transition-transform duration-[1.5s] ease-out group-hover:scale-[1.04]">
            </div>
            
            <!-- ฝั่งข้อความที่อยู่ -->
            <div class="w-full md:w-[40%] flex flex-col justify-center text-left py-12 px-8 md:py-16 md:px-12 lg:px-24">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-8 md:w-12 h-[1px] bg-gray-400 group-hover:bg-white transition-colors duration-500"></span>
                    <span class="text-[9px] md:text-[11px] text-gray-400 group-hover:text-white transition-colors duration-500 tracking-[0.2em] font-semibold uppercase">BANGKOK HQ</span>
                </div>
                <h2 class="text-[28px] md:text-[36px] lg:text-[42px] uppercase font-extrabold tracking-[0.08em] leading-[1.1] text-white drop-shadow-md mb-8">
                    HEAD OFFICE
                </h2>
                
                <p class="text-[14px] md:text-[16px] lg:text-[18px] leading-[1.6] text-gray-300 font-light mb-6 tracking-wide drop-shadow-sm">
                    124 L.Y. Industries Company Limited,<br>
                    Phraya Suren Road, Bang Chan,<br>
                    Khlong Sam Wa, Bangkok 10510
                </p>
                
                <p class="text-[14px] md:text-[16px] lg:text-[18px] text-gray-100 font-medium tracking-[0.1em]">
                    TEL: <span class="text-white">02-517-0768 EXT.120</span>
                </p>
            </div>
        </div>

        <!-- แผนที่ Google Maps แบบดั้งเดิม (Normal Map) -->
        <div class="w-full overflow-hidden">
            <!-- ซอร์สค้นหาพิกัดโดยค้นจากที่อยู่ L.Y. Industries -->
            <iframe 
                src="https://maps.google.com/maps?q=L.Y.%20Industries%20Company%20Limited,%20Bangkok&t=&z=16&ie=UTF8&iwloc=&output=embed" 
                width="100%" 
                height="500" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>

        <!-- Contact Form Section -->
        <div class="max-w-[800px] mx-auto px-4 sm:px-6">
            <!-- Form Header Sub -->
            <div class="text-center mb-16">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <span class="w-8 h-[1px] bg-gray-400"></span>
                    <span class="text-[10px] md:text-[12px] text-gray-400 tracking-[0.2em] font-semibold uppercase">GET IN TOUCH</span>
                    <span class="w-8 h-[1px] bg-gray-400"></span>
                </div>
                <h2 class="text-[24px] md:text-[32px] font-extrabold uppercase tracking-[0.1em] text-white">SEND A MESSAGE</h2>
            </div>

            <!-- Form -->
            <form action="#" method="POST" class="flex flex-col gap-6">
                
                <!-- Name -->
                <div class="flex flex-col gap-2">
                    <label for="name" class="text-[11px] md:text-[13px] font-bold text-gray-300 tracking-[0.15em] uppercase">ENTER YOUR NAME</label>
                    <input type="text" id="name" name="name" class="bg-white border-0 text-black p-4 rounded-none outline-none focus:ring-2 focus:ring-gray-400 transition-all duration-300 w-full">
                </div>
                
                <!-- Email -->
                <div class="flex flex-col gap-2">
                    <label for="email" class="text-[11px] md:text-[13px] font-bold text-gray-300 tracking-[0.15em] uppercase">E-MAIL</label>
                    <input type="email" id="email" name="email" class="bg-white border-0 text-black p-4 rounded-none outline-none focus:ring-2 focus:ring-gray-400 transition-all duration-300 w-full">
                </div>
                
                <!-- Subject -->
                <div class="flex flex-col gap-2">
                    <label for="subject" class="text-[11px] md:text-[13px] font-bold text-gray-300 tracking-[0.15em] uppercase">SUBJECT *</label>
                    <input type="text" id="subject" name="subject" required class="bg-white border-0 text-black p-4 rounded-none outline-none focus:ring-2 focus:ring-gray-400 transition-all duration-300 w-full">
                </div>
                
                <!-- Message -->
                <div class="flex flex-col gap-2">
                    <label for="message" class="text-[11px] md:text-[13px] font-bold text-gray-300 tracking-[0.15em] uppercase">MESSAGE</label>
                    <textarea id="message" name="message" rows="6" class="bg-white border-0 text-black p-4 rounded-none outline-none focus:ring-2 focus:ring-gray-400 transition-all duration-300 resize-y w-full"></textarea>
                </div>
                
                <!-- Submit Button -->
                <div class="flex justify-end mt-8">
                    <button type="submit" class="group/btn inline-flex items-center gap-4 bg-white text-black px-12 md:px-16 py-4 rounded-none text-[12px] md:text-[13px] font-bold tracking-[0.2em] hover:bg-gray-200 transition-colors duration-300 uppercase">
                        <span>SEND</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-transform duration-300 group-hover/btn:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
                
            </form>
        </div>

    </div>
</section>

<?php include 'footer.php'; ?>

</body>
</html>
