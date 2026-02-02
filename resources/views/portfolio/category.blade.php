@extends('layout')

@section('content')

<!-- Back Button & Title -->
<section class="max-w-6xl mx-auto px-4 md:px-12 py-12">
    <div class="mb-8">
        <a href="/" class="inline-flex items-center gap-2 text-stone-600 hover:text-stone-900 transition font-sans text-sm tracking-wide mb-6">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Back to Home
        </a>
    </div>
    
    <div class="text-center mb-12 md:mb-16">
        <h1 class="font-serif text-4xl md:text-5xl text-stone-900 mb-4">{{ $category }}</h1>
        <p class="font-sans text-stone-600 tracking-wide">
            @if($portfolios->count() > 0)
                Menampilkan {{ $portfolios->count() }} karya
            @else
                Belum ada karya di kategori ini
            @endif
        </p>
    </div>
</section>

<!-- Gallery -->
<section class="max-w-6xl mx-auto px-4 md:px-12 pb-24">
    @if($portfolios->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @forelse($portfolios as $item)
                <div class="group relative cursor-pointer bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                    <!-- Carousel Slider untuk setiap karya -->
                    @php
                        $images = $item->getMedia('default');
                    @endphp
                    
                    <div class="relative h-80 md:h-96 bg-stone-100 overflow-hidden">
                        @if($images->count() > 0)
                            <!-- Instagram-style Carousel untuk kategori -->
                            <div class="splide-category splide" role="region">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach($images as $image)
                                        <li class="splide__slide">
                                            <img src="{{ $image->getUrl('large') }}" 
                                                 alt="{{ $item->title }}" 
                                                 class="w-full h-80 md:h-96 object-cover"
                                                 loading="lazy">
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="w-full h-80 md:h-96 bg-stone-200 flex items-center justify-center">
                                <svg class="w-12 h-12 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Overlay Info -->
                        <div class="absolute inset-0 flex flex-col justify-end p-4 md:p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-gradient-to-t from-stone-900/80 via-transparent to-transparent pointer-events-none">
                            <h3 class="text-white font-serif text-lg md:text-xl tracking-wide">
                                {{ $item->title }}
                            </h3>
                            <p class="text-stone-300 text-xs md:text-sm mt-2">{{ $item->project_date->format('F j, Y') }}</p>
                        </div>
                        
                        <!-- Carousel dots counter -->
                        @if($images->count() > 1)
                        <div class="absolute bottom-3 right-3 bg-black/50 text-white text-xs px-2 py-1 rounded font-sans tracking-wide">
                            <span class="category-slide-counter">1</span> / {{ $images->count() }}
                        </div>
                        @endif
                    </div>
                    
                    <!-- View Project Link -->
                    <a href="{{ route('portfolio.show', $item->slug) }}" class="absolute inset-0 z-10"></a>
                    
                    <!-- Project Info Bar -->
                    <div class="p-4 md:p-6 bg-white group-hover:bg-stone-50 transition">
                        <h4 class="font-serif text-stone-900 text-base md:text-lg truncate">{{ $item->title }}</h4>
                        <p class="text-stone-600 text-xs md:text-sm font-sans mt-1">
                            {{ $images->count() }} {{ $images->count() === 1 ? 'Photo' : 'Photos' }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 text-stone-400">
                    <p class="font-serif text-xl">Belum ada portfolio di kategori ini.</p>
                </div>
            @endforelse
        </div>
    @else
        <div class="text-center py-20">
            <p class="font-serif text-2xl text-stone-400">Belum ada karya di kategori {{ $category }}</p>
        </div>
    @endif
</section>

@endsection
