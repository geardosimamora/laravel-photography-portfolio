@extends('layout')

@section('content')

    <section class="relative h-screen w-full overflow-hidden bg-stone-900">
        <!-- Hero Image Background -->
        @php
            $heroImage = $setting->getFirstMediaUrl('hero_image');
        @endphp
        
        @if($heroImage)
            <div class="absolute inset-0 opacity-60">
                <img src="{{ $heroImage }}" 
                     alt="Hero Background" 
                     class="w-full h-full object-cover">
            </div>
        @else
            <div class="absolute inset-0 opacity-60">
                 <img src="https://images.unsplash.com/photo-1537905569824-f89f14cceb68?q=80&w=1920&auto=format&fit=crop" 
                      class="w-full h-full object-cover" 
                      alt="Hero Background">
            </div>
        @endif
        
        <div class="absolute inset-0 bg-black/30"></div>

        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 md:px-6">
            <h1 class="font-serif text-4xl sm:text-5xl md:text-7xl lg:text-8xl text-stone-100 tracking-widest mb-4 md:mb-6 animate-fade-in-up leading-tight">
                {{ $setting->hero_title ?? 'Nadi Memori' }}
            </h1>
            <p class="font-sans text-xs sm:text-sm md:text-lg text-stone-200 tracking-[0.2em] uppercase opacity-90">
                {{ $setting->hero_subtitle ?? 'Sebab Setiap Detik Memiliki Cerita yang Pantas Diingat' }}
            </p>
            
            <div class="absolute bottom-10 animate-bounce">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
            </div>
        </div>
    </section>

    <!-- Owner Section -->
    @if($setting->owner_name)
    <section class="bg-white py-16 md:py-24 px-4 md:px-12">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Owner Image -->
            <div class="flex justify-center">
                @if($setting->getFirstMediaUrl('owner_image'))
                    <img src="{{ $setting->getFirstMediaUrl('owner_image') }}" 
                         alt="{{ $setting->owner_name }}" 
                         class="w-64 h-64 rounded-full object-cover shadow-lg border-4 border-stone-900">
                @else
                    <div class="w-64 h-64 rounded-full bg-stone-200 flex items-center justify-center">
                        <svg class="w-24 h-24 text-stone-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                @endif
            </div>

            <!-- Owner Info -->
            <div>
                <h2 class="font-serif text-4xl md:text-5xl text-stone-900 mb-4">{{ $setting->owner_name }}</h2>
                
                @if($setting->owner_bio)
                <p class="font-sans text-stone-600 text-lg leading-relaxed mb-8">
                    {{ $setting->owner_bio }}
                </p>
                @endif

                <!-- Social Links -->
                <div class="flex gap-6 items-center">
                    @if($setting->whatsapp)
                    <a href="https://wa.me/{{ $setting->whatsapp }}" target="_blank" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-[#25D366] text-white font-sans font-bold tracking-wide uppercase text-sm rounded hover:bg-[#20bd5a] transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.6915026,13.4744748 C17.3157315,13.1260165 16.5369681,12.7625992 16.0230131,12.8995849 C15.5274186,13.0274971 15.0915502,13.5215225 14.4694075,13.4744748 C13.5545225,13.4051895 12.4694892,12.6374925 11.4566527,11.4839181 C10.5259467,10.4513667 9.92812328,9.27832776 9.85883538,8.26908805 C9.83156996,7.88464511 10.252071,7.51850225 10.3408359,7.06379801 C10.4295958,6.60887277 10.1272231,6.10338508 9.88119707,5.50694737 C9.6273151,4.8607282 9.41815149,4.25885297 8.9011041,4.13946452 C8.37879948,4.01926206 7.72944208,4.21631525 7.0241527,4.27589197 C5.9033909,4.36861358 4.84750948,4.98862853 4.10885813,5.85315357 C3.6146816,6.38504787 3.35944403,7.07147826 3.22877378,7.71635827 C2.93751192,8.96995323 3.75897441,10.447732 4.35942395,11.56 C5.34950186,13.5075289 6.6615915,15.7581216 8.60876676,16.6870393 C9.1876649,16.9589606 10.3121916,17.152266 11.0320882,17.0139965 C11.6563168,16.8938697 12.1258852,16.3280137 12.7131806,16.4562722 C13.2491263,16.5706001 13.5927761,17.2087015 14.1066812,17.4041932 C14.6930881,17.6319822 15.8747503,17.2060508 16.6484186,16.8532452 C18.1118857,16.1267134 18.8359312,14.8203936 18.9284881,13.5944683 C18.9709346,12.9971436 18.0672736,13.8229331 17.6915026,13.4744748 Z"/></svg>
                        WhatsApp
                    </a>
                    @endif

                    @if($setting->owner_instagram)
                    <a href="https://instagram.com/{{ $setting->owner_instagram }}" target="_blank"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-sans font-bold tracking-wide uppercase text-sm rounded hover:opacity-90 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.217.6c-.688.267-1.286.613-1.853 1.18-.566.566-.912 1.168-1.179 1.853-.266.688-.467 1.557-.527 2.834C.039 8.333.024 8.74 0 12c0 3.26.015 3.667.072 4.947.06 1.277.261 2.148.527 2.834.266.687.613 1.286 1.18 1.853.566.566 1.166.91 1.853 1.178.687.266 1.557.466 2.834.526C8.333 23.961 8.74 23.976 12 23.976s3.667-.015 4.947-.072c1.277-.06 2.148-.26 2.834-.527.688-.266 1.286-.612 1.853-1.179.566-.566.912-1.166 1.178-1.853.266-.687.466-1.557.527-2.834.048-1.28.063-1.687.063-4.947s-.015-3.667-.072-4.947c-.06-1.277-.261-2.148-.527-2.834-.266-.687-.612-1.286-1.179-1.853-.566-.566-1.166-.912-1.853-1.178-.687-.266-1.557-.467-2.834-.527C15.667.039 15.26.024 12 0zm0 2.16c3.203 0 3.585.009 4.849.070 1.171.054 1.805.244 2.227.408.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.354 1.056.408 2.227.061 1.264.07 1.646.07 4.849s-.009 3.585-.07 4.849c-.054 1.171-.244 1.805-.408 2.227-.217.562-.477.96-.896 1.382-.42.419-.819.679-1.381.896-.422.164-1.056.354-2.227.408-1.264.061-1.646.07-4.849.07s-3.585-.009-4.849-.07c-1.171-.054-1.805-.244-2.227-.408-.562-.217-.96-.477-1.382-.896-.419-.42-.679-.819-.896-1.381-.164-.422-.354-1.056-.408-2.227-.061-1.264-.07-1.646-.07-4.849s.009-3.585.07-4.849c.054-1.171.244-1.805.408-2.227.217-.562.477-.96.896-1.382.42-.419.819-.679 1.381-.896.422-.164 1.056-.354 2.227-.408 1.264-.061 1.646-.07 4.849-.07z"/></svg>
                        Instagram
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Testimonials Section -->
    <section class="bg-stone-50 py-16 md:py-24 px-4 md:px-12">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="font-serif text-3xl md:text-4xl text-stone-900 mb-4">Testimonial</h2>
                <p class="font-sans text-stone-600">Dengarkan cerita klien kami</p>
            </div>

            @php
                $testimonials = \App\Models\Testimonial::where('is_featured', true)->orderBy('order')->take(5)->get();
            @endphp

            @if($testimonials->count() > 0)
            <div class="relative">
                <!-- Testimonials Carousel -->
                <div id="testimonialCarousel" class="relative">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial-slide hidden" data-slide="{{ $loop->index }}">
                        <div class="bg-white rounded-lg shadow-lg p-8 md:p-12">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                                <!-- Customer Photo -->
                                <div class="flex justify-center md:justify-start">
                                    @if($testimonial->getFirstMediaUrl('customer_photo'))
                                        <img src="{{ $testimonial->getFirstMediaUrl('customer_photo') }}" 
                                             alt="{{ $testimonial->client_name }}" 
                                             class="w-40 h-40 rounded-full object-cover shadow-md border-4 border-stone-900">
                                    @else
                                        <div class="w-40 h-40 rounded-full bg-stone-200 flex items-center justify-center">
                                            <svg class="w-16 h-16 text-stone-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                        </div>
                                    @endif
                                </div>

                                <!-- Review Text -->
                                <div class="md:col-span-2">
                                    <blockquote class="font-sans text-lg md:text-xl text-stone-700 italic mb-6">
                                        "{{ $testimonial->review }}"
                                    </blockquote>

                                    <div>
                                        <p class="font-serif text-lg font-bold text-stone-900">{{ $testimonial->couple_names ?? $testimonial->client_name }}</p>
                                        @if($testimonial->couple_names)
                                        <p class="font-sans text-sm text-stone-500 mt-1">Dari: {{ $testimonial->client_name }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Carousel Controls -->
                @if($testimonials->count() > 1)
                <div class="flex justify-center gap-3 mt-8">
                    @foreach($testimonials as $testimonial)
                    <button class="carousel-dot w-3 h-3 rounded-full bg-stone-300 transition-all hover:bg-stone-900" 
                            data-dot="{{ $loop->index }}" 
                            @if($loop->first) style="background-color: #1c1917;" @endif></button>
                    @endforeach
                </div>
                @endif

                <!-- Arrow Navigation -->
                @if($testimonials->count() > 1)
                <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 -ml-6 md:-ml-12 text-stone-900 hover:text-stone-600 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 -mr-6 md:-mr-12 text-stone-900 hover:text-stone-600 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
                @endif
            </div>

            <script>
                let currentSlide = 0;
                const slides = document.querySelectorAll('.testimonial-slide');
                const totalSlides = slides.length;

                function showSlide(n) {
                    slides.forEach(slide => slide.classList.add('hidden'));
                    slides[n].classList.remove('hidden');
                    
                    // Update dots
                    document.querySelectorAll('.carousel-dot').forEach((dot, index) => {
                        dot.style.backgroundColor = index === n ? '#1c1917' : '#d6d3d1';
                    });
                }

                if (document.getElementById('nextBtn')) {
                    document.getElementById('nextBtn').addEventListener('click', () => {
                        currentSlide = (currentSlide + 1) % totalSlides;
                        showSlide(currentSlide);
                    });

                    document.getElementById('prevBtn').addEventListener('click', () => {
                        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                        showSlide(currentSlide);
                    });
                }

                document.querySelectorAll('.carousel-dot').forEach(dot => {
                    dot.addEventListener('click', () => {
                        currentSlide = parseInt(dot.dataset.dot);
                        showSlide(currentSlide);
                    });
                });

                // Show first slide
                showSlide(0);
            </script>
            @endif
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="bg-white py-16 md:py-24 px-4 md:px-12">
        <div class="text-center mb-12 md:mb-20">
            <span class="font-sans text-xs font-bold tracking-widest text-stone-500 uppercase block mb-3">Selected Works</span>
            <h2 class="font-serif text-3xl sm:text-4xl md:text-5xl text-stone-800 italic">Curated Memories</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mx-auto max-w-7xl">
            @forelse($portfolios as $item)
                @php
                    $images = $item->getMedia('default');
                @endphp
                <div class="group relative cursor-pointer bg-stone-50 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                    <!-- Mini Carousel untuk Homepage -->
                    @if($images->count() > 0)
                        <div class="relative h-64 md:h-80 bg-stone-100 overflow-hidden">
                            <div class="splide-home splide" role="region">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach($images as $image)
                                        <li class="splide__slide">
                                            <img src="{{ $image->getUrl('large') }}" 
                                                 alt="{{ $item->title }}" 
                                                 class="w-full h-64 md:h-80 object-cover"
                                                 loading="lazy">
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="w-full h-64 md:h-80 bg-stone-200 flex items-center justify-center">
                            <svg class="w-12 h-12 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                    
                    <!-- Hover Info Overlay -->
                    <div class="absolute inset-0 flex flex-col justify-end p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-gradient-to-t from-stone-900/80 via-transparent to-transparent">
                        <span class="text-stone-300 text-xs tracking-widest uppercase mb-2">
                            {{ $item->category?->value ?? 'Gallery' }}
                        </span>
                        <h3 class="text-white font-serif text-xl md:text-2xl tracking-wide">
                            {{ $item->title }}
                        </h3>
                        <p class="text-stone-300 text-sm mt-1">{{ $item->project_date->format('F Y') }}</p>
                    </div>
                    
                    <!-- Click Link -->
                    <a href="{{ route('portfolio.show', $item->slug) }}" class="absolute inset-0 z-10"></a>
                    
                    <!-- Info Bar -->
                    <div class="p-4 md:p-6 bg-white group-hover:bg-stone-50 transition">
                        <h4 class="font-serif text-stone-900 text-base md:text-lg font-semibold truncate">{{ $item->title }}</h4>
                        <p class="text-stone-600 text-xs md:text-sm font-sans mt-1">
                            {{ $images->count() }} {{ $images->count() === 1 ? 'Photo' : 'Photos' }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 text-stone-400">
                    <p class="font-serif text-xl">Belum ada portfolio yang diupload.</p>
                </div>
            @endforelse
        </div>
    </section>

    <footer class="bg-stone-900 text-stone-400 py-12 md:py-16 text-center px-4">
        <div class="max-w-4xl mx-auto">
            <h3 class="font-serif text-xl md:text-2xl text-stone-200 mb-6">{{ implode(' ', str_split($setting->site_name ?? 'DUNIA FOTOGRAFI')) }}</h3>
            
            <div class="flex flex-wrap justify-center gap-4 md:gap-8 mb-8 text-xs md:text-sm font-sans tracking-widest uppercase">
                @if($setting->instagram) <a href="{{ $setting->instagram }}" class="text-stone-400 hover:text-white transition">Instagram</a> @endif
                @if($setting->facebook) <a href="{{ $setting->facebook }}" class="text-stone-400 hover:text-white transition">Facebook</a> @endif
                @if($setting->whatsapp) <a href="https://wa.me/{{ $setting->whatsapp }}" class="text-stone-400 hover:text-white transition">Contact</a> @endif
            </div>

            <p class="text-xs tracking-wide opacity-50">&copy; {{ date('Y') }} All rights reserved.</p>
        </div>
    </footer>

    @if($setting->whatsapp)
    <a href="https://wa.me/{{ $setting->whatsapp }}" target="_blank" 
       class="fixed bottom-8 right-8 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-xl hover:bg-[#20bd5a] hover:scale-110 transition duration-300 flex items-center justify-center group">
       <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
    </a>
    @endif

@endsection