@extends('layout')

@section('content')

<div class="max-w-6xl mx-auto px-4 md:px-12 py-8">
    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-stone-600 hover:text-stone-900 transition font-sans text-sm tracking-wide">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Back to Gallery
    </a>
</div>

<section class="max-w-6xl mx-auto px-4 md:px-12 py-12">
    <div class="mb-12 rounded-lg overflow-hidden shadow-lg">
        <img src="{{ $portfolio->getFirstMediaUrl('default', 'large') }}" 
             alt="{{ $portfolio->title }}" 
             class="w-full h-96 md:h-[600px] object-cover">
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12">
        <div class="lg:col-span-2">
            <div class="mb-8">
                <div class="flex items-center gap-4 mb-4">
                    <span class="inline-block px-4 py-2 bg-stone-800 text-stone-100 text-xs font-sans tracking-widest uppercase rounded">
                        {{ $portfolio->category?->value ?? 'Gallery' }}
                    </span>
                    <span class="text-stone-500 text-sm font-sans">{{ $portfolio->project_date->format('F j, Y') }}</span>
                </div>
                <h1 class="font-serif text-4xl md:text-5xl text-stone-900 mb-6 leading-tight">
                    {{ $portfolio->title }}
                </h1>
            </div>

            <div class="prose prose-stone max-w-none mb-12">
                <div class="text-stone-700 text-lg leading-relaxed font-sans">
                    {!! $portfolio->description !!}
                </div>
            </div>

            @if($portfolio->video_url)
            <div class="mb-12">
                <h2 class="font-serif text-2xl text-stone-900 mb-6">Video Highlights</h2>
                
                {{-- 1. Cek Instagram --}}
                @if(Str::contains($portfolio->video_url, 'instagram.com'))
                    @php
                        // LOGIC PEMBERSIH URL:
                        // 1. Ambil hanya bagian depan sebelum tanda tanya '?' (buang ?igsh=...)
                        $cleanUrl = Str::before($portfolio->video_url, '?');
                        
                        // 2. Buang slash di akhir jika ada, lalu tambah /embed
                        $embedUrl = rtrim($cleanUrl, '/') . '/embed';
                    @endphp

                    <div class="flex justify-center my-8 bg-stone-100 rounded-xl py-8">
                        <iframe 
                            src="{{ $embedUrl }}" 
                            class="w-full max-w-[350px] aspect-[9/16] rounded-xl shadow-lg border border-stone-200 bg-white" 
                            frameborder="0" 
                            scrolling="no" 
                            allowtransparency="true">
                        </iframe>
                    </div>

                

                {{-- 2. Cek YouTube / Vimeo --}}
                @else
                    @php
                        $videoId = '';
                        if (strpos($portfolio->video_url, 'youtube.com') !== false || strpos($portfolio->video_url, 'youtu.be') !== false) {
                            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $portfolio->video_url, $matches);
                            $videoId = $matches[1] ?? '';
                        } elseif (strpos($portfolio->video_url, 'vimeo.com') !== false) {
                            preg_match('/vimeo\.com\/(\d+)/', $portfolio->video_url, $matches);
                            $videoId = $matches[1] ?? '';
                        }
                    @endphp

                    <div class="aspect-video rounded-lg overflow-hidden shadow-lg bg-black">
                        @if(Str::contains($portfolio->video_url, ['youtube.com', 'youtu.be']))
                            <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $videoId }}" 
                                    title="YouTube Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen></iframe>
                        @elseif(Str::contains($portfolio->video_url, 'vimeo.com'))
                            <iframe class="w-full h-full" src="https://player.vimeo.com/video/{{ $videoId }}" 
                                    title="Vimeo Video" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        @endif
                    </div>
                @endif
            </div>
            @endif

            @php
                $images = $portfolio->getMedia('default');
                $galleryImages = $images->count() > 1 ? $images->skip(1) : collect([$images->first()]);
            @endphp
            @if($images->count() > 0)
            <div class="mb-12">
                <h2 class="font-serif text-2xl text-stone-900 mb-6">Gallery</h2>
                
                <!-- Instagram-like Carousel Slider -->
                <div class="splide rounded-lg overflow-hidden shadow-lg" role="region" aria-label="Gallery Carousel">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($galleryImages as $image)
                            <li class="splide__slide">
                                <div class="w-full">
                                    <img src="{{ $image->getUrl('large') }}" 
                                         alt="{{ $portfolio->title }}" 
                                         class="w-full h-96 md:h-[500px] object-cover"
                                         loading="lazy">
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- Navigation Arrows -->
                    @if($galleryImages->count() > 1)
                    <div class="splide__arrows">
                        <button class="splide__arrow splide__arrow--prev">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button>
                        <button class="splide__arrow splide__arrow--next">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                    </div>
                    @endif
                </div>
                
                <!-- Image Counter -->
                @if($galleryImages->count() > 1)
                <div class="mt-4 text-center text-stone-500 text-sm font-sans">
                    <span class="slide-counter">1</span> / <span class="total-slides">{{ $galleryImages->count() }}</span>
                </div>
                @endif
            </div>
            @endif
        </div>

        <div class="lg:col-span-1">
            <div class="bg-stone-50 rounded-lg p-8 mb-8 sticky top-32">
                <h3 class="font-serif text-xl text-stone-900 mb-6 border-b border-stone-200 pb-2">Project Details</h3>
                
                @if($portfolio->client_name)
                <div class="mb-6">
                    <p class="text-xs font-sans tracking-widest text-stone-500 uppercase mb-2">Client</p>
                    <p class="text-stone-800 font-medium font-serif">{{ $portfolio->client_name }}</p>
                </div>
                @endif

                <div class="mb-6">
                    <p class="text-xs font-sans tracking-widest text-stone-500 uppercase mb-2">Date</p>
                    <p class="text-stone-800 font-medium font-serif">{{ $portfolio->project_date->format('F j, Y') }}</p>
                </div>

                <div class="mb-6">
                    <p class="text-xs font-sans tracking-widest text-stone-500 uppercase mb-2">Category</p>
                    <p class="text-stone-800 font-medium font-serif">{{ $portfolio->category?->value ?? 'Gallery' }}</p>
                </div>

                @if($portfolio->google_maps_embed)
                <div class="mt-8 pt-8 border-t border-stone-200">
                    <h4 class="font-serif text-lg text-stone-900 mb-4">Location</h4>
                    {{-- Class [&>iframe]:w-full memaksa iframe dari Google Maps mengikuti lebar container --}}
                    <div class="rounded-lg overflow-hidden h-64 shadow-md [&>iframe]:w-full [&>iframe]:h-full">
                        {!! $portfolio->google_maps_embed !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="bg-stone-50 py-16 md:py-24 mt-12 border-t border-stone-200">
    <div class="max-w-6xl mx-auto px-4 md:px-12">
        <h2 class="font-serif text-3xl md:text-4xl text-stone-900 mb-12 text-center">More Works</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Mengambil 3 portfolio terkait, kecuali yang sedang dibuka --}}
            @foreach(\App\Models\Portfolio::where('id', '!=', $portfolio->id)->latest('project_date')->take(3)->get() as $related)
            <div class="group relative cursor-pointer">
                <a href="{{ route('portfolio.show', $related->slug) }}" class="block overflow-hidden rounded-lg shadow-md h-full">
                    <div class="relative h-80 overflow-hidden">
                        <img src="{{ $related->getFirstMediaUrl('default', 'large') }}" 
                             alt="{{ $related->title }}" 
                             class="w-full h-full object-cover transform transition duration-1000 ease-in-out group-hover:scale-105 group-hover:brightness-90">
                        
                        <div class="absolute inset-0 flex flex-col justify-end p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-gradient-to-t from-stone-900/80 via-transparent to-transparent">
                            <span class="text-stone-300 text-xs tracking-widest uppercase mb-2">
                                {{ $related->category?->value ?? 'Gallery' }}
                            </span>
                            <h3 class="text-white font-serif text-xl tracking-wide">
                                {{ $related->title }}
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection