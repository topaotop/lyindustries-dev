<?php

// ข้อมูลผลิตภัณฑ์และบริการต่างๆ ดึงมาจากหน้าเว็บต้นฉบับ
$products = [
    [
        "title" => "NEEDLE LOOM",
        "description" => "Structure and type of weaving provides strong properties, Can be adjusted to be flexible or inflexible as needed. It can also be woven into many different patterns, such as Herringbone tape, Gross gain, Twill and Jacquard suitable for use as waistband , Neck tape, Binding, Overlay tape or even a flat drawcord or drawcord.",
        "image" => "img/nl.jpg"
    ],
    [
        "title" => "CROCHET",
        "description" => "Characteristics of knitting structure makes it have the properties of being lightweight and breathable because there are holes in the knitting structure. And is concise adjust to be flexible as needed. Suitable for use in decorating overlay parts of activewear, waist band etc.",
        "image" => "img/CROCHET.jpg"
    ],
    [
        "title" => "RASCHEL",
        "description" => "Another type of tape with a knit structure. Gives a softer touch and breathable well. There are a variety of pattern styles. Suitable for use in decorating sports wear or activewear to make them more special overlay. Can knit many different colors in the same tape.",
        "image" => "img/RASCHEL.jpg"
    ],
    [
        "title" => "BRAIDING",
        "description" => "Braided and woven drawcord that can be made into many different forms and various patterns. Suitable for use as waist drawcord, shoe laces, multi-purpose drawstring as required. Provides strength, durability and a soft touch at the same time. Including assembly tipping with the drawcord. Can be done in a variety of techniques, such as Dip the silicone, Tipping metal head, Tipping plastic film head and using shrink tubing, etc.",
        "image" => "img/BRAIDING.jpg"
    ],
    [
        "title" => "FINISHING",
        "description" => "Various formats for adding details to workpieces. Assemble the parts to be complete and more special. That has since Silk Screen color on the workpiece, Sublimation pattern printing, Debossed. You can choose the type of work that is appropriate for use and design. Makes it possible to add outstanding to clothes very well.",
        "image" => "img/FINISHING.jpg"
    ]
];

// (Certs are now loaded dynamically from the cert/ folder below)
?>
<?php include 'header.php'; ?>

    <!-- ส่วนหัว/ฮีโร่ (Hero Section) -->
    <?php
        // อ่านไฟล์วีดีโอจากโฟลเดอร์ media/header
        $video_dir = "media/header/";
        $videos = glob($video_dir . "*.mp4");
        
        // กำหนดไฟล์วีดีโอแรกที่ต้องเล่น
        $first_video = $video_dir . "PASSION (1).mp4";
        
        // ลบตัวแรกออกจาก array ถ้ามีอยู่แล้วเพื่อกันการซ้ำ
        if (($key = array_search($first_video, $videos)) !== false) {
            unset($videos[$key]);
        }
        
        // นำวีดีโอแรกไปต่อเข้าข้างหน้าสุดของ array
        // ถ้าไฟล์ไม่มีในโฟลเดอร์ก็ยังเอาขึ้นมาเล่นเป็นตัวแรก (ถึงแม้จะ error 404 แต่ตามโจทย์คือต้องเล่นก่อน)
        array_unshift($videos, $first_video);
        
        // รีเซ็ต index ของ array และเปลี่ยนเป็น json ให้ javascript
        $videos_values = array_values($videos);
        $videos_json = json_encode($videos_values);
    ?>
    <section id="home" class="pt-20 bg-black">
        <div class="relative w-full h-[50vh] md:h-[70vh] overflow-hidden group bg-black">
            <!-- Video Element -->
            <video id="hero-video" class="w-full h-full object-cover" autoplay muted playsinline>
                <source id="hero-video-source" src="<?= htmlspecialchars($videos_values[0]); ?>" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            
            <!-- Pagination Dots -->
            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex items-center space-x-2.5 z-10">
                <?php foreach($videos_values as $index => $video): ?>
                    <button type="button" onclick="playVideo(<?= $index; ?>)" 
                        class="hero-dot rounded-full transition-all duration-300 <?= $index === 0 ? 'w-2 h-2 bg-white' : 'w-1.5 h-1.5 bg-white/50 hover:bg-white/80' ?>"
                        aria-label="Play video <?= $index + 1; ?>">
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Script สำหรับควบคุมการเล่นวีดีโอ Background -->
    <script>
        const heroVideos = <?= $videos_json; ?>;
        let currentVideoIndex = 0;
        const videoElement = document.getElementById('hero-video');
        const videoSource = document.getElementById('hero-video-source');
        const dots = document.querySelectorAll('.hero-dot');

        // เมื่อวีดีโอเล่นจบ ให้เล่นวีดีโอถัดไปทันที
        videoElement.addEventListener('ended', playNextVideo);

        function playNextVideo() {
            if (heroVideos.length <= 1) return;
            currentVideoIndex = (currentVideoIndex + 1) % heroVideos.length;
            playVideo(currentVideoIndex);
        }

        function playVideo(index) {
            if (index < 0 || index >= heroVideos.length) return;
            currentVideoIndex = index;
            
            // อัพเดท source
            videoSource.src = heroVideos[currentVideoIndex];
            videoElement.load();
            
            // ใช้ Promise สำหรับ Chrome / Safari auto-play policy
            const playPromise = videoElement.play();
            if (playPromise !== undefined) {
                playPromise.catch(error => {
                    console.log("Auto-play prevented", error);
                });
            }
            
            // อัพเดทสถานะของจุด (dots) คล้ายคลึงกับในรูป
            dots.forEach((dot, i) => {
                if (i === currentVideoIndex) {
                    dot.className = "hero-dot rounded-full transition-all duration-300 w-2 h-2 bg-white";
                } else {
                    dot.className = "hero-dot rounded-full transition-all duration-300 w-1.5 h-1.5 bg-white/50 hover:bg-white/80";
                }
            });
        }
    </script>

    <!-- ส่วนบริการ/สินค้า (What We Can Do) -->
    <section id="products" class="py-24 bg-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-5xl font-extrabold text-center mb-16 md:mb-24 tracking-[0.15em] text-white">WHAT WE CAN DO</h2>

            <!-- วนลูปเพื่อแสดงรายการผลิตภัณฑ์ด้วย PHP (บีบลงในกล่องไม่ให้ใหญ่เกินไปตามต้องการ) -->
            <div class="w-full flex flex-col space-y-12 md:space-y-24">
                <?php foreach($products as $index => $product): ?>
                <div class="relative w-full overflow-hidden group">
                    <!-- ใช้ w-full h-auto เพื่อคงอัตราส่วนดั้งเดิม และภาพจะใหญ่ไม่เกิน max-w-7xl -->
                    <img src="<?= $product['image']; ?>" class="w-full h-auto block transform transition-transform duration-[1200ms] group-hover:scale-[1.03]"
                        alt="<?= str_replace('<br>', ' ', empty($product['title']) ? '' : $product['title']); ?>">
                    
                    <!-- ส่วนตัวหนังสือ (Absolute) ซ้อนทับเฉพาะพื้นที่สีดำ สลับซ้ายขวาตามภาพต้นฉบับ -->
                    <div class="absolute inset-0 flex items-center <?= $index % 2 == 1 ? 'justify-start' : 'justify-end' ?>">
                        <div class="w-full md:w-[48%] p-6 sm:p-10 md:p-12 lg:p-16 xl:p-20 flex flex-col justify-center h-full">
                            <h3 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-4 md:mb-6 tracking-wide text-white uppercase leading-[1.1] text-left">
                                <?= str_replace(' ', '<br>', $product['title']); ?>
                            </h3>
                            <p class="text-gray-300 leading-relaxed text-left text-xs sm:text-sm md:text-base lg:text-lg font-light xl:max-w-lg">
                                <?= $product['description']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- โรงภาพยนตร์ (Video Theater Showcase) -->
    <section class="pb-24 bg-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative w-full overflow-hidden bg-[#050505] flex items-center justify-center shadow-lg">
                <!-- พื้นหลัง bgvideo1.jpg จะทำหน้าที่เป็นเหมือนผนังโรงหนัง -->
                <img src="img/bgvideo1.jpg" class="absolute inset-0 w-full h-full object-cover opacity-80" alt="Theater Background">
                
                <!-- ส่วนจอ YouTube ที่เล่นตรงกลาง -->
                <div class="relative z-10 w-[95%] sm:w-[85%] md:w-[75%] lg:w-[65%] aspect-video my-6 sm:my-10 md:my-16 lg:my-20 shadow-[0_0_50px_rgba(0,0,0,0.5)]">
                    <iframe 
                        class="w-full h-full rounded-sm"
                        src="https://www.youtube.com/embed/Lr59gy7RcWo?autoplay=1&mute=1&playlist=Lr59gy7RcWo&loop=1" 
                        title="YouTube video player" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- ส่วนอธิบายธุรกิจและวิสัยทัศน์ (About Us & Vision) -->
    <section id="about" class="py-24 bg-black">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Company History -->
            <div class="flex flex-col items-center text-center mb-24 md:mb-32">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 text-white tracking-widest">L.Y. Industries Co., Ltd.</h2>
                <p class="text-gray-300 leading-relaxed text-sm md:text-[15px] font-light max-w-5xl">
                    <span class="font-bold text-white">L.Y. INDUSTRIES CO.,LTD.</span> was established in 1978 and operates in the textile industry,
                    specializing in the weaving of narrow fabrics, elastics, waistbands, ropes, as well as decorative
                    parts for sports clothing. For more than 40 years, we have been conducting business with renowned
                    clothing brands, including leading sports brands such as <span class="font-bold text-white">NIKE, ADIDAS, MIZUNO,</span> and many more,
                    both domestically and internationally. In addition to holding production standard certificates from
                    <span class="font-bold text-white">Oeko-Tex</span> and compliance with the <span class="font-bold text-white">NIKE Restricted Substance List (RSL),</span> you can be confident that
                    the quality of our products and services will meet your expectations. We are ready to accompany our
                    customers' growth with sincere service.
                </p>
            </div>

            <!-- Vision Section -->
            <div class="flex flex-col md:flex-row items-center justify-center gap-12 lg:gap-24">
                <!-- คอลัมน์ซ้าย รูปโรงงาน -->
                <div class="w-full md:w-1/2 flex md:justify-end">
                    <div class="w-full max-w-md">
                        <img src="img/beemmc.png" class="w-full h-auto object-cover shadow-2xl" alt="L.Y. Industries Factory">
                    </div>
                </div>
                
                <!-- คอลัมน์ขวา ข้อความ Vision -->
                <div class="w-full md:w-1/2 flex flex-col justify-center">
                    <h2 class="text-5xl md:text-[3.5rem] font-bold mb-8 md:mb-12 tracking-wide text-white uppercase">VISION</h2>
                    <p class="text-white text-lg md:text-xl font-light leading-relaxed">
                        "We will be one of the <span class="font-bold">top 5</span><br>
                        leaders in AEC. In terms of<br>
                        clothing decoration parts and<br>
                        sports equipment"
                    </p>
                </div>
            </div>

        </div>
    </section>

    <?php
        // ดึงไฟล์รูปทั้งหมดในโฟลเดอร์ cert/
        $certFiles = glob("cert/*.{jpg,jpeg,png,gif,webp,JPG,JPEG,PNG,GIF,WEBP}", GLOB_BRACE);
        if (!$certFiles) {
            $certFiles = [];
        }
    ?>
    <!-- ส่วนใบรับรอง (Certificates) -->
    <section id="certificates" class="py-24 bg-black relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-16 tracking-[0.15em] text-white">CERTIFICATE</h2>
            
            <!-- Carousel Container -->
            <div class="relative group flex items-center justify-center max-w-5xl mx-auto">
                <!-- ปุ่มซ้าย (ปรับลดปุ่มพื้นหลังเหลือแค่ลูกศรตามต้นฉบับ) -->
                <button onclick="scrollCert('left')" class="absolute -left-2 md:-left-12 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white z-10 focus:outline-none transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-12 md:w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- แถบเลื่อนรูปภาพ -->
                <div id="certContainer" class="flex items-center justify-start gap-6 md:gap-10 overflow-x-auto snap-x snap-mandatory scroll-smooth px-4 w-full" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <?php foreach($certFiles as $index => $cert): ?>
                    <div class="flex-none w-[200px] sm:w-[240px] md:w-[280px] snap-center cursor-pointer transform hover:scale-[1.03] transition-transform duration-300">
                        <img src="<?= $cert; ?>" 
                            class="w-full h-[280px] sm:h-[320px] md:h-[380px] object-contain bg-transparent"
                            alt="Certificate <?= $index+1 ?>"
                            onclick="openLightbox(<?= $index ?>)">
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- ปุ่มขวา -->
                <button onclick="scrollCert('right')" class="absolute -right-2 md:-right-12 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white z-10 focus:outline-none transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-12 md:w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="certLightbox" class="fixed inset-0 z-[100] hidden bg-black/95 flex flex-col items-center justify-center">
        <!-- ปุ่มปิด -->
        <button onclick="closeLightbox()" class="absolute top-6 right-6 text-white hover:text-gray-400 focus:outline-none z-[101]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- คอนเทนเนอร์แสดงภาพและปุ่มเลื่อน -->
        <!-- คลิกพื้นที่ว่างรอบรูปเพื่อปิด (ปุ่มเลื่อนใช้ stopPropagation กันไม่ให้ปิด) -->
        <div class="relative w-full h-full flex items-center justify-between px-4 sm:px-10" onclick="closeLightbox()">
            <button onclick="prevLightboxCert(event)" class="text-white hover:text-gray-400 focus:outline-none p-4 z-[101]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 md:h-14 md:w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- รูปใบรับรองขนาดใหญ่ -->
            <img id="lightboxImg" src="" alt="Certificate" class="max-w-[80vw] max-h-[85vh] object-contain" onclick="event.stopPropagation()">

            <button onclick="nextLightboxCert(event)" class="text-white hover:text-gray-400 focus:outline-none p-4 z-[101]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 md:h-14 md:w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Script สำหรับ Certificate Carousel และ Lightbox -->
    <script>
        // รายการไฟล์ใบรับรองจากโฟลเดอร์ cert/ (ลำดับเดียวกับ carousel)
        const certList = <?= json_encode(array_values($certFiles)); ?>;
        let currentCertIndex = 0;

        // เลื่อน carousel ทีละ 1 ใบ (ความกว้างการ์ด + gap)
        function scrollCert(direction) {
            const container = document.getElementById('certContainer');
            const card = container.firstElementChild;
            const gap = parseFloat(getComputedStyle(container).columnGap) || 0;
            const scrollAmount = card ? card.offsetWidth + gap : container.clientWidth;

            if (direction === 'left') {
                container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            } else {
                container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        }

        function openLightbox(index) {
            currentCertIndex = index;
            updateLightboxImg();
            document.getElementById('certLightbox').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function updateLightboxImg() {
            if(certList.length === 0) return;
            document.getElementById('lightboxImg').src = certList[currentCertIndex];
        }

        function prevLightboxCert(e) {
            if(e) e.stopPropagation();
            if(certList.length === 0) return;
            currentCertIndex = (currentCertIndex - 1 + certList.length) % certList.length;
            updateLightboxImg();
        }

        function nextLightboxCert(e) {
            if(e) e.stopPropagation();
            if(certList.length === 0) return;
            currentCertIndex = (currentCertIndex + 1) % certList.length;
            updateLightboxImg();
        }

        function closeLightbox() {
            document.getElementById('certLightbox').classList.add('hidden');
            document.body.style.overflow = '';
        }
        
        window.addEventListener('keydown', function(event) {
            const lightbox = document.getElementById('certLightbox');
            if (lightbox && !lightbox.classList.contains('hidden')) {
                if (event.key === 'ArrowLeft') prevLightboxCert();
                if (event.key === 'ArrowRight') nextLightboxCert();
                if (event.key === 'Escape') closeLightbox();
            }
        });
    </script>

    <!-- ส่วนพาร์ทเนอร์ (Partners) -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold mb-12 tracking-widest text-black">PARTNERS</h2>
            <img src="partners/logopartners.jpg" class="w-full h-auto mx-auto object-contain px-2 md:px-12 xl:px-20" alt="Our Partners">
        </div>
    </section>

<?php include 'footer.php'; ?>