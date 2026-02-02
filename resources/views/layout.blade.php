<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting->site_name ?? 'Photography' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:wght@400;700;900&display=swap" rel="stylesheet">
    
    <!-- Splide Carousel CSS (for Instagram-like slider) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <style>
        /* Custom styling untuk carousel Instagram-like */
        .splide__slide {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .splide__progress__bar {
            background: #78716c;
        }
        
        .splide__arrow {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            width: 45px;
            height: 45px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .splide__arrow:hover {
            background: rgba(255, 255, 255, 0.95);
        }
        
        .splide:hover .splide__arrow {
            opacity: 1;
        }
        
        .splide__arrow svg {
            width: 20px;
            height: 20px;
            stroke: #292524;
            stroke-width: 3;
        }
        
        .carousel-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .carousel-dot.active {
            background-color: rgba(255, 255, 255, 1);
            width: 24px;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-stone-50 text-stone-900">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white/95 backdrop-blur-sm z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 md:px-12 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 hover:opacity-80 transition">
                @php
                    $logoUrl = $setting->getFirstMediaUrl('logo');
                @endphp
                @if($logoUrl)
                    <img src="{{ $logoUrl }}" alt="Logo" class="h-12 w-12 rounded-full shadow-sm object-cover">
                @else
                    <div class="h-12 w-12 rounded-full bg-stone-900 flex items-center justify-center shadow-sm">
                        <span class="text-white font-bold text-sm">📸</span>
                    </div>
                @endif
                <span class="font-serif text-lg md:text-xl font-bold text-stone-900 tracking-wider">{{ $setting->site_name ?? 'DUNIA FOTOGRAFI' }}</span>
            </a>
            
            <!-- Menu Desktop -->
            <div class="hidden md:flex gap-8 font-sans text-sm tracking-wide">
                <a href="{{ route('portfolio.category', 'Wedding') }}" class="text-stone-700 hover:text-stone-900 transition">Wedding</a>
                <a href="{{ route('portfolio.category', 'Prewedding') }}" class="text-stone-700 hover:text-stone-900 transition">Prewedding</a>
                <a href="{{ route('portfolio.category', 'Engagement') }}" class="text-stone-700 hover:text-stone-900 transition">Engagement</a>
                <a href="{{ route('portfolio.category', 'Cinematic Video') }}" class="text-stone-700 hover:text-stone-900 transition">Video</a>
                <a href="{{ route('contact') }}" class="text-stone-700 hover:text-stone-900 transition">Contact</a>
            </div>

            <!-- Hamburger Menu Mobile -->
            <button id="hamburger" class="md:hidden flex flex-col gap-1.5 focus:outline-none">
                <span class="w-6 h-0.5 bg-stone-900 transition-all duration-300 origin-left" id="bar1"></span>
                <span class="w-6 h-0.5 bg-stone-900 transition-all duration-300" id="bar2"></span>
                <span class="w-6 h-0.5 bg-stone-900 transition-all duration-300 origin-left" id="bar3"></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-stone-200 max-h-0 overflow-hidden transition-all duration-300">
            <div class="flex flex-col gap-4 px-4 py-6 font-sans text-sm tracking-wide">
                <a href="{{ route('portfolio.category', 'Wedding') }}" class="text-stone-700 hover:text-stone-900 transition py-2">Wedding</a>
                <a href="{{ route('portfolio.category', 'Prewedding') }}" class="text-stone-700 hover:text-stone-900 transition py-2">Prewedding</a>
                <a href="{{ route('portfolio.category', 'Engagement') }}" class="text-stone-700 hover:text-stone-900 transition py-2">Engagement</a>
                <a href="{{ route('portfolio.category', 'Cinematic Video') }}" class="text-stone-700 hover:text-stone-900 transition py-2">Video</a>
                <a href="{{ route('contact') }}" class="text-stone-700 hover:text-stone-900 transition py-2 border-t border-stone-200 pt-4">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Content dengan padding untuk navbar -->
    <div class="pt-20">
        @yield('content')
    </div>

    <!-- Script untuk Hamburger Menu -->
    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        const bar1 = document.getElementById('bar1');
        const bar2 = document.getElementById('bar2');
        const bar3 = document.getElementById('bar3');
        let isOpen = false;

        hamburger.addEventListener('click', () => {
            isOpen = !isOpen;
            
            if (isOpen) {
                // Animasi X
                bar1.style.transform = 'rotate(45deg) translateY(11px)';
                bar2.style.opacity = '0';
                bar3.style.transform = 'rotate(-45deg) translateY(-11px)';
                
                // Buka menu
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                }, 0);
            } else {
                // Tutup animasi
                bar1.style.transform = 'rotate(0) translateY(0)';
                bar2.style.opacity = '1';
                bar3.style.transform = 'rotate(0) translateY(0)';
                
                // Tutup menu
                mobileMenu.style.maxHeight = '0';
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }
        });

        // Tutup menu saat link diklik
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => {
                isOpen = false;
                bar1.style.transform = 'rotate(0) translateY(0)';
                bar2.style.opacity = '1';
                bar3.style.transform = 'rotate(0) translateY(0)';
                mobileMenu.style.maxHeight = '0';
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            });
        });
    </script>

    <!-- Splide Carousel JS -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        // Initialize all carousels on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Main carousel for detail page
            const mainCarousels = document.querySelectorAll('.splide:not(.splide-category):not(.splide-home)');
            mainCarousels.forEach((carousel, index) => {
                const splide = new Splide(carousel, {
                    type: 'fade',
                    rewind: true,
                    perPage: 1,
                    autoplay: false,
                    interval: 0,
                    arrows: true,
                    pagination: true,
                    gap: '1rem',
                    padding: 0,
                    speed: 800,
                    easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                });
                
                // Update counter for main carousel
                const counter = carousel.parentElement.querySelector('.slide-counter');
                if (counter) {
                    splide.on('mounted move', () => {
                        counter.textContent = splide.index + 1;
                    });
                }
                
                splide.mount();
            });
            
            // Category page carousels
            const categoryCarousels = document.querySelectorAll('.splide-category');
            categoryCarousels.forEach((carousel, index) => {
                const splide = new Splide(carousel, {
                    type: 'fade',
                    rewind: true,
                    perPage: 1,
                    autoplay: true,
                    interval: 3000,
                    arrows: false,
                    pagination: false,
                    gap: '1rem',
                    padding: 0,
                    speed: 600,
                    easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                });
                
                // Update counter for category carousel
                const counter = carousel.parentElement.querySelector('.category-slide-counter');
                if (counter) {
                    splide.on('mounted move', () => {
                        counter.textContent = splide.index + 1;
                    });
                }
                
                splide.mount();
            });

            // Homepage carousels - slower autoplay
            const homeCarousels = document.querySelectorAll('.splide-home');
            homeCarousels.forEach((carousel, index) => {
                const splide = new Splide(carousel, {
                    type: 'fade',
                    rewind: true,
                    perPage: 1,
                    autoplay: true,
                    interval: 4000,
                    arrows: false,
                    pagination: false,
                    gap: '1rem',
                    padding: 0,
                    speed: 700,
                    easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                });
                
                splide.mount();
            });
        });
    </script>
</body>
</html>
