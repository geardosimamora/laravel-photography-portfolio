@extends('layout')

@section('content')

<!-- Back Button -->
<div class="max-w-4xl mx-auto px-4 md:px-12 py-8">
    <a href="/" class="inline-flex items-center gap-2 text-stone-600 hover:text-stone-900 transition font-sans text-sm tracking-wide">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Back to Home
    </a>
</div>

<!-- Contact Section -->
<section class="max-w-4xl mx-auto px-4 md:px-12 py-12 md:py-24">
    <div class="text-center mb-16">
        <h1 class="font-serif text-4xl md:text-5xl text-stone-900 mb-4">Get In Touch</h1>
        <p class="font-sans text-stone-600 text-lg">Hubungi kami untuk booking atau pertanyaan lainnya</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 mb-16">
        <!-- Contact Info -->
        <div class="space-y-8">
            <div class="bg-stone-50 rounded-lg p-8">
                <div class="mb-8">
                    <h2 class="font-serif text-2xl text-stone-900 mb-6">Hubungi Kami</h2>
                </div>

                <!-- WhatsApp -->
                @if($setting->whatsapp)
                <div class="mb-8 pb-8 border-b border-stone-200">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#25D366] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-sans font-bold text-stone-900 mb-2">WhatsApp</h3>
                            <p class="text-stone-600 font-sans mb-3">Hubungi kami via WhatsApp untuk respon yang lebih cepat</p>
                            <a href="https://wa.me/{{ $setting->whatsapp }}" target="_blank" class="inline-block px-6 py-2 bg-[#25D366] text-white font-sans font-bold tracking-wide uppercase text-sm rounded hover:bg-[#20bd5a] transition">
                                Chat WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Instagram -->
                @if($setting->instagram)
                <div class="mb-8 pb-8 border-b border-stone-200">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22.5C6.201 22.5 1.5 17.799 1.5 12S6.201 1.5 12 1.5s10.5 4.701 10.5 10.5-4.701 10.5-10.5 10.5zm5.25-19.5h-10.5c-2.902 0-5.25 2.348-5.25 5.25v10.5c0 2.902 2.348 5.25 5.25 5.25h10.5c2.902 0 5.25-2.348 5.25-5.25v-10.5c0-2.902-2.348-5.25-5.25-5.25zm0 14.25h-10.5v-10.5h10.5v10.5z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-sans font-bold text-stone-900 mb-2">Instagram</h3>
                            <p class="text-stone-600 font-sans mb-3">Follow kami untuk portfolio dan update terbaru</p>
                            <a href="{{ $setting->instagram }}" target="_blank" class="inline-block px-6 py-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-sans font-bold tracking-wide uppercase text-sm rounded hover:opacity-90 transition">
                                Follow Instagram
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Facebook -->
                @if($setting->facebook)
                <div class="mb-8 pb-8 border-b border-stone-200">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#1877F2] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-sans font-bold text-stone-900 mb-2">Facebook</h3>
                            <p class="text-stone-600 font-sans mb-3">Kunjungi halaman Facebook kami</p>
                            <a href="{{ $setting->facebook }}" target="_blank" class="inline-block px-6 py-2 bg-[#1877F2] text-white font-sans font-bold tracking-wide uppercase text-sm rounded hover:bg-blue-700 transition">
                                Visit Facebook
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Email (Optional) -->
                <div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-stone-300 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-stone-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-sans font-bold text-stone-900 mb-2">Email</h3>
                            <p class="text-stone-600 font-sans">Kirim pertanyaan melalui email untuk konsultasi lebih detail</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Location Map -->
        <div class="bg-stone-50 rounded-lg p-8 h-full">
            <h2 class="font-serif text-2xl text-stone-900 mb-6">Studio Kami</h2>
            
            <div class="h-96 rounded-lg overflow-hidden shadow-md mb-6 bg-stone-200">
                @if($setting->whatsapp)
                    <!-- Placeholder atau bisa tambah Google Maps API -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3050.193019538776!2d99.23873569999999!3d3.1143923000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3033d44b1b07c121%3A0x4bf62298c1e1617a!2sJl.%20Mananggei%2C%20Kandangan%2C%20Kec.%20Pematang%20Bandar%2C%20Kabupaten%20Simalungun%2C%20Sumatera%20Utara!5e1!3m2!1sid!2sid!4v1769598638070!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                @else
                    <div class="w-full h-full flex items-center justify-center bg-stone-300">
                        <p class="text-stone-700 font-sans">Map belum dikonfigurasi</p>
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-lg p-6 border border-stone-200">
                <h3 class="font-sans font-bold text-stone-900 mb-4">Jam Operasional</h3>
                <ul class="space-y-2 font-sans text-sm text-stone-600">
                    <li>Senin - Jumat: 09:00 - 18:00</li>
                    <li>Sabtu: 10:00 - 17:00</li>
                    <li>Minggu: Tutup (Booking via WhatsApp)</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-stone-900 text-stone-100 py-16 md:py-24">
    <div class="max-w-4xl mx-auto px-4 md:px-12 text-center">
        <h2 class="font-serif text-3xl md:text-4xl mb-6">Siap Booking?</h2>
        <p class="font-sans text-stone-300 mb-8 text-lg">Hubungi kami sekarang dan amankan tanggal pemotretan Anda</p>
        @if($setting->whatsapp)
        <a href="https://wa.me/{{ $setting->whatsapp }}" target="_blank" class="inline-block px-8 py-4 bg-[#25D366] text-white font-sans font-bold tracking-widest uppercase rounded hover:bg-[#20bd5a] transition">
            Chat via WhatsApp
        </a>
        @endif
    </div>
</section>

@endsection
