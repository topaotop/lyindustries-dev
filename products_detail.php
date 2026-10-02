<?php
$products = [
    [
        "title" => "NEEDLE LOOM",
        "description" => "Structure and type of weaving provides strong properties, Can be adjusted to be flexible or inflexible as needed. It can also be woven into many different patterns, such as Herringbone tape, Gross gain, Twill and Jacquard suitable for use as waistband , Neck tape, Binding, Overlay tape or even a flat drawcord or drawcord.",
        "image" => "img/1.png"
    ],
    [
        "title" => "CROCHET",
        "description" => "Characteristics of knitting structure makes it have the properties of being lightweight and breathable because there are holes in the knitting structure. And is concise adjust to be flexible as needed. Suitable for use in decorating overlay parts of activewear, waist band etc.",
        "image" => "img/2.png"
    ],
    [
        "title" => "RASCHEL",
        "description" => "Another type of tape with a knit structure. Gives a softer touch and breathable well. There are a variety of pattern styles. Suitable for use in decorating sports wear or activewear to make them more special overlay. Can knit many different colors in the same tape.",
        "image" => "img/3.png"
    ],
    [
        "title" => "BRAIDING",
        "description" => "Braided and woven drawcord that can be made into many different forms and various patterns. Suitable for use as waist drawcord, shoe laces, multi-purpose drawstring as required. Provides strength, durability and a soft touch at the same time. Including assembly tipping with the drawcord. Can be done in a variety of techniques, such as Dip the silicone, Tipping metal head, Tipping plastic film head and using shrink tubing, etc.",
        "image" => "img/4.png"
    ],
    [
        "title" => "FINISHING",
        "description" => "Various formats for adding details to workpieces. Assemble the parts to be complete and more special. That has since Silk Screen color on the workpiece, Sublimation pattern printing, Debossed. You can choose the type of work that is appropriate for use and design. Makes it possible to add outstanding to clothes very well.",
        "image" => "img/5.png"
    ]
];
?>
<?php include 'header.php'; ?>

<!-- Premium Content Section -->
<section class="bg-black pt-32 pb-32 text-white min-h-screen">
    
    <!-- Title Header -->
    <div class="text-center mb-16 md:mb-24 px-4 relative z-20">
        <h1 class="text-[32px] md:text-[48px] font-extrabold uppercase tracking-[0.2em] text-white">
            OUR COLLECTIONS
        </h1>
        <div class="w-16 md:w-20 h-[2px] bg-white mx-auto mt-6"></div>
    </div>

    <div class="max-w-[1400px] mx-auto px-0 sm:px-8 space-y-16 lg:space-y-24">
        
        <?php foreach ($products as $index => $product): ?>
            <?php 
                $isImageLeft = ($index % 2 == 0); 
                $linkPath = 'index.php';
                $titleLower = strtolower($product['title']);
                if ($titleLower === 'needle loom') $linkPath = 'needle_loom.php';
                elseif ($titleLower === 'crochet') $linkPath = 'CROCHET.php';
                elseif ($titleLower === 'raschel') $linkPath = 'raschel.php';
                elseif ($titleLower === 'braiding') $linkPath = 'braiding.php';
                elseif ($titleLower === 'finishing') $linkPath = 'finishing.php';
            ?>
            <div class="relative w-full flex bg-transparent overflow-hidden sm:rounded-lg">
                
                <!-- Background Image (Original Size) -->
                <img src="<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['title']); ?>" class="w-full h-auto object-contain block transform scale-[1.03]">
                
                <!-- Absolute Text Overlay Layer -->
                <div class="absolute inset-0 z-10 w-full h-full flex items-center <?= $isImageLeft ? 'justify-end pr-[5%] md:pr-[6%]' : 'justify-start pl-[5%] md:pl-[6%]' ?>">
                    
                    <!-- Clean Text Card -->
                    <div class="w-[75%] sm:w-[50%] md:w-[45%] lg:w-[30%] xl:w-[26%] flex flex-col text-white">
                        
                        <div class="flex items-center gap-3 mb-2 md:mb-4">
                            <span class="w-6 md:w-8 h-[1px] bg-white"></span>
                            <span class="text-[8px] md:text-[11px] text-white tracking-[0.2em] font-semibold drop-shadow-md">SERIES 0<?= $index + 1 ?></span>
                        </div>
                        
                        <h2 class="text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold mb-2 md:mb-5 tracking-widest uppercase text-white drop-shadow-xl">
                            <?= htmlspecialchars($product['title']); ?>
                        </h2>
                        
                        <p class="text-[9px] sm:text-[11px] md:text-[13px] lg:text-[14px] font-light leading-[1.6] sm:leading-[1.8] lg:leading-[2] mb-4 md:mb-8 text-gray-100 drop-shadow-lg">
                            <?= htmlspecialchars($product['description']); ?>
                        </p>
                        
                        <div class="flex">
                            <a href="<?= $linkPath ?>" class="inline-flex items-center gap-3 px-4 md:px-8 py-2 md:py-3 border border-white text-white text-[8px] md:text-[11px] font-bold tracking-[0.15em] hover:bg-white hover:text-black transition-colors rounded-none uppercase backdrop-blur-sm bg-black/20">
                                <span>DISCOVER</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-4 md:w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        <?php endforeach; ?>

    </div>
</section>

<?php include 'footer.php'; ?>
