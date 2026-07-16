@extends('layouts.app')

@section('title', 'PT Sumber Sehat Sejahtera - Distributor Farmasi Terlengkap di Kalimantan')
@section('meta_description', 'PT Sumber Sehat Sejahtera adalah mitra distribusi kesehatan terpercaya di Indonesia dengan standar CDOB, layanan Cold Chain Management, dan pengiriman cepat.')

@section('content')

    {{-- ═══════════════════════════════════════════════
         SECTION 1: HERO SLIDER
    ═══════════════════════════════════════════════ --}}
    <section class="relative w-full h-[85vh] min-h-[600px] flex items-center justify-center bg-deep-blue overflow-hidden group">
        <div class="swiper heroSwiper w-full h-full">
            <div class="swiper-wrapper">

                {{-- Slide 1: Kantor Pusat --}}
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[10s] ease-out group-hover:scale-110"
                         s
                         role="img" aria-label="Kantor Pusat PT Sumber Sehat Sejahtera">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-deep-blue/90 via-deep-blue/60 to-deep-blue/30 pointer-events-none"></div>
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-500"></div>
                    <div class="absolute inset-0 flex items-center px-6 lg:px-20 z-10">
                        <div class="max-w-3xl space-y-6">
                            <h1 class="text-4xl lg:text-5xl font-black text-white leading-tight drop-shadow-lg" data-aos="fade-up">
                                Mitra Distribusi Farmasi <br>
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-light-blue to-white">
                                    Terpercaya dan Terlengkap di Kalimantan
                                </span>
                            </h1>
                            <p class="text-white/80 text-lg lg:text-xl leading-relaxed max-w-2xl" data-aos="fade-up" data-aos-delay="150">
                                Menjamin ketersediaan obat berkualitas dengan standar distribusi terbaik sejak tahun 2012.
                                Kami hadir untuk mendukung kesehatan masyarakat di Kalimantan Selatan, Kalimantan Tengah, dan sekitarnya
                                dengan standar <strong class="text-white">CDOB</strong> yang ketat.
                            </p>
                            <div class="flex flex-wrap gap-4 pt-2" data-aos="fade-up" data-aos-delay="300">
                                <a href="{{ route('products') }}"
                                   class="px-8 py-4 bg-magenta-accent hover:bg-white hover:text-magenta-accent text-white font-bold rounded-lg transition-all shadow-lg">
                                    LIHAT PRODUK
                                </a>
                                <a href="{{ route('contact.submit') }}"
                                   class="px-8 py-4 border border-white/30 hover:border-white hover:bg-white/10 text-white font-bold rounded-lg transition-all backdrop-blur-sm">
                                    HUBUNGI KAMI
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Slide 2: Tim --}}
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[10s] ease-out group-hover:scale-110"
                         style="background-image: url('{{ Vite::asset('public/images/tim 3s.jpeg') }}');"
                         role="img" aria-label="Tim PT Sumber Sehat Sejahtera">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-deep-blue/90 via-deep-blue/60 to-deep-blue/30 pointer-events-none"></div>
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-500"></div>
                    <div class="absolute inset-0 flex items-center px-6 lg:px-20 z-10">
                        <div class="max-w-3xl space-y-6">
                            <h2 class="text-4xl lg:text-5xl font-black text-white leading-tight drop-shadow-lg">
                                Sinergi Profesionalisme<br>
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-magenta-accent to-white">
                                    Untuk Pelayanan Terbaik
                                </span>
                            </h2>
                            <p class="text-white/80 text-lg lg:text-xl leading-relaxed max-w-2xl">
                                Kualitas layanan PT Sumber Sehat Sejahtera bertumpu pada sumber daya manusia yang handal
                                dan berpengalaman di bidang farmasi. Bersama tim yang terlatih, kami bersinergi memberikan
                                pelayanan yang responsif, akurat, dan profesional demi kepuasan seluruh mitra usaha.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Swiper Controls --}}
            <div class="swiper-button-next !text-white/60 hover:!text-white transition-colors"></div>
            <div class="swiper-button-prev !text-white/60 hover:!text-white transition-colors"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         SECTION 2: INFO GRID
    ═══════════════════════════════════════════════ --}}
<div class="relative z-20 px-4 lg:px-10 -mt-16 lg:-mt-20 mb-0">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-xl shadow-2xl grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-gray-100 overflow-hidden border-t-4 border-magenta-accent"
             data-aos="fade-up">

            {{-- Jam Operasional --}}
            <div class="p-8 group hover:bg-gray-50 transition-colors">
                <div class="flex items-start gap-5">
                    <div class="w-14 h-14 shrink-0 rounded-full bg-deep-blue/5 text-deep-blue flex items-center justify-center group-hover:bg-deep-blue group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">schedule</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-deep-blue uppercase tracking-widest text-xs mb-2">Jam Operasional</h3>
                        <div class="text-sm font-semibold text-gray-700 space-y-1">
                            <p class="flex justify-between gap-4">
                                <span>Senin – Sabtu</span>
                                <span>08:00 – 16:00</span>
                            </p>
                            <p class="text-gray-400 text-xs font-medium mt-1">Minggu & Hari Besar: Libur</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- /Jam Operasional --}}

            {{-- Alamat --}}
            <a href="https://maps.app.goo.gl/6gXKeU7fx8UkaGP7A?g_st=ic"
               target="_blank"
               rel="noopener noreferrer"
               class="p-8 group hover:bg-gray-50 transition-colors flex items-start gap-5 cursor-pointer">
                <div class="w-14 h-14 shrink-0 rounded-full bg-magenta-accent/5 text-magenta-accent flex items-center justify-center group-hover:bg-magenta-accent group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-3xl">location_on</span>
                </div>
                <address class="not-italic flex-1">
                    <h3 class="font-bold text-deep-blue uppercase tracking-widest text-xs mb-2">Lokasi</h3>
                    <p class="text-gray-700 text-sm font-medium leading-relaxed">
                        Jl. A. Yani Km. 5,5 No. 448,<br>Banjarmasin, Kalimantan Selatan
                    </p>
                </address>
            </a>
            {{-- /Alamat --}}

            {{-- Kontak --}}
            <div class="p-8 group hover:bg-gray-50 transition-colors">
                <div class="flex items-start gap-5">
                    <div class="w-14 h-14 shrink-0 rounded-full bg-light-blue/5 text-light-blue flex items-center justify-center group-hover:bg-light-blue group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-3xl">support_agent</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-deep-blue uppercase tracking-widest text-xs mb-2">Layanan Pelanggan</h3>
                        <a href="tel:085156767900"
                           class="text-2xl lg:text-3xl font-black text-deep-blue tracking-tight group-hover:text-magenta-accent transition-colors block">
                            0851-5676-7900
                        </a>
                    </div>
                </div>
            </div>
            {{-- /Kontak --}}

        </div>
    </div>
</div>


    {{-- ═══════════════════════════════════════════════
         SECTION 3: YEL-YEL CORPORATE
    ═══════════════════════════════════════════════ --}}
<section id="yel-yel-section" class="relative w-full min-h-[60dvh] md:min-h-[50vh] bg-white flex items-center justify-center overflow-hidden">
        <div class="relative z-10 w-full max-w-6xl px-4 text-center pointer-events-none">

            {{-- Phase 1: Intro --}}
            <div id="net-intro" class="absolute inset-0 flex items-center justify-center transition-all duration-700 opacity-0 scale-150">
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-8xl font-black text-transparent bg-clip-text bg-gradient-to-r from-light-blue to-magenta-accent tracking-tight">
                    SPECIAL PEOPLE
                </h2>
            </div>

            {{-- Phase 2: Slogan --}}
            <div id="net-slogan" class="relative z-10 flex flex-col md:flex-row items-center justify-center gap-6 md:gap-12 h-full opacity-0 translate-y-8 transition-all duration-700">
                <span id="n-word-1" class="text-3xl sm:text-4xl md:text-6xl font-black text-deep-blue uppercase tracking-widest opacity-50 scale-90 transition-all duration-500">Bersama</span>
                <span id="n-word-2" class="text-3xl sm:text-4xl md:text-6xl font-black text-deep-blue uppercase tracking-widest opacity-50 scale-90 transition-all duration-500">Berkarya</span>
                <span id="n-word-3" class="text-3xl sm:text-4xl md:text-6xl font-black text-deep-blue uppercase tracking-widest opacity-50 scale-90 transition-all duration-500">Bermakna</span>
            </div>
        </div>
    </section>
    {{-- ═══════════════════════════════════════════════
         SECTION 4: CORE EXPERTISE
    ═══════════════════════════════════════════════ --}}
    <section class="py-24 bg-white relative overflow-hidden">

        {{-- Subtle decorative blobs --}}
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
            <div class="absolute top-0 right-0 w-[600px] h-[600px] rounded-full opacity-[0.04]"
                 style="background: radial-gradient(circle, #0f2a5e 0%, transparent 70%); transform: translate(30%, -30%);"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] rounded-full opacity-[0.04]"
                 style="background: radial-gradient(circle, #0f2a5e 0%, transparent 70%); transform: translate(-30%, 30%);"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

            {{-- Section Header --}}
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="inline-block text-xs font-bold tracking-[0.25em] uppercase text-blue-600 bg-blue-50 border border-blue-100 px-4 py-1.5 rounded-full mb-4">
                    Keunggulan Kami
                </span>
                <h2 class="text-3xl md:text-4xl font-black text-deep-blue mt-3 leading-tight">
                    Layanan Distribusi Kesehatan Unggulan
                </h2>
            </div>

            {{-- 2x2 Card Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                {{-- Card 1: CDOB --}}
                <article class="group relative bg-white rounded-3xl p-8 shadow-sm border border-gray-100 overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-500"
                         data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-blue-700 rounded-t-3xl scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                    <div class="flex flex-col sm:flex-row sm:items-start gap-6">
                        <div class="flex-shrink-0 w-20 h-20 rounded-2xl bg-blue-50 flex items-center justify-center">
                            <dotlottie-wc src="/lottie/Regulatorycompliance.json" background="transparent" speed="1" style="width:64px;height:64px;" loop autoplay></dotlottie-wc>
                        </div>
                        <div class="flex-1">
                            <span class="inline-block text-[10px] font-bold tracking-widest uppercase text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full mb-3">BPOM Certified</span>
                            <h3 class="text-xl font-bold text-deep-blue mb-3 leading-snug">Standar Resmi &amp; Bersertifikat CDOB</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Sebagai Pedagang Besar Farmasi (PBF) terpercaya, operasional kami mematuhi regulasi BPOM secara penuh. Kami menerapkan standar Cara Distribusi Obat yang Baik (CDOB) secara ketat guna menjamin mutu, khasiat, dan keamanan produk farmasi hingga ke tangan Anda.
                            </p>
                        </div>
                    </div>
                </article>

                {{-- Card 2: GSP --}}
                <article class="group relative bg-white rounded-3xl p-8 shadow-sm border border-gray-100 overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-500"
                         data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-t-3xl scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                    <div class="flex flex-col sm:flex-row sm:items-start gap-6">
                        <div class="flex-shrink-0 w-20 h-20 rounded-2xl bg-emerald-50 flex items-center justify-center">
                            <dotlottie-wc src="/lottie/Warehousing.json" background="transparent" speed="1" style="width:64px;height:64px;" loop autoplay></dotlottie-wc>
                        </div>
                        <div class="flex-1">
                            <span class="inline-block text-[10px] font-bold tracking-widest uppercase text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full mb-3">Good Storage Practice</span>
                            <h3 class="text-xl font-bold text-deep-blue mb-3 leading-snug">Produk Terlengkap &amp; Jaminan Mutu (GSP)</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Kami mendistribusikan produk farmasi terlengkap dan resmi langsung dari principal. Fasilitas pergudangan kami dikelola dengan standar Good Storage Practice (GSP) yang dilengkapi pemantauan suhu 24 jam nonstop untuk memastikan stabilitas produk selalu terjaga.
                            </p>
                        </div>
                    </div>
                </article>

                {{-- Card 3: FEFO --}}
                <article class="group relative bg-white rounded-3xl p-8 shadow-sm border border-gray-100 overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-500"
                         data-aos="fade-up" data-aos-delay="300">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-400 to-orange-500 rounded-t-3xl scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                    <div class="flex flex-col sm:flex-row sm:items-start gap-6">
                        <div class="flex-shrink-0 w-20 h-20 rounded-2xl bg-amber-50 flex items-center justify-center">
                            <dotlottie-wc src="/lottie/recycling.json" background="transparent" speed="1" style="width:64px;height:64px;" loop autoplay></dotlottie-wc>
                        </div>
                        <div class="flex-1">
                            <span class="inline-block text-[10px] font-bold tracking-widest uppercase text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full mb-3">Sistem FEFO</span>
                            <h3 class="text-xl font-bold text-deep-blue mb-3 leading-snug">Manajemen Gudang Terintegrasi (FEFO)</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Keamanan suplai Anda adalah prioritas kami. Manajemen tata kelola gudang kami terintegrasi dengan sistem First Expired, First Out (FEFO) untuk mencegah risiko obat kedaluwarsa, menjamin perputaran stok yang sehat, dan mendistribusikan produk dalam masa simpan terbaik.
                            </p>
                        </div>
                    </div>
                </article>

                {{-- Card 4: Logistik --}}
                <article class="group relative bg-white rounded-3xl p-8 shadow-sm border border-gray-100 overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-500"
                         data-aos="fade-up" data-aos-delay="400">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-400 to-blue-500 rounded-t-3xl scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                    <div class="flex flex-col sm:flex-row sm:items-start gap-6">
                        <div class="flex-shrink-0 w-20 h-20 rounded-2xl bg-sky-50 flex items-center justify-center">
                            <dotlottie-wc src="/lottie/Fastdelivery.json" background="transparent" speed="1" style="width:64px;height:64px;" loop autoplay></dotlottie-wc>
                        </div>
                        <div class="flex-1">
                            <span class="inline-block text-[10px] font-bold tracking-widest uppercase text-sky-600 bg-sky-50 px-2.5 py-1 rounded-full mb-3">Armada Khusus Farmasi</span>
                            <h3 class="text-xl font-bold text-deep-blue mb-3 leading-snug">Logistik Andal &amp; Pengiriman Terjadwal</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Memastikan ketersediaan stok Anda adalah komitmen kami. Didukung armada logistik farmasi khusus yang andal, kami menjangkau pengiriman dalam dan luar kota secara terjadwal, efisien, dan aman agar suplai medis Anda selalu tiba tepat waktu.
                            </p>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════
         SCRIPTS
    ═══════════════════════════════════════════════ --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .swiper-pagination-bullet        { width:12px; height:12px; background:white; opacity:0.4; transition:all 0.3s; }
        .swiper-pagination-bullet-active { background:#E91E63; opacity:1; transform:scale(1.3); }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // ── Swiper ──────────────────────────────────────
            const heroEl = document.querySelector('.heroSwiper');
            if (heroEl) {
                new Swiper('.heroSwiper', {
                    effect:     'fade',
                    fadeEffect: { crossFade: true },
                    speed:      1200,
                    autoplay:   { delay: 6500, disableOnInteraction: false },
                    pagination: { el: '.swiper-pagination', clickable: true },
                    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                    loop:       true,
                });
            }

            // ── Yel-Yel Animation ────────────────────────────
            const intro  = document.getElementById('net-intro');
            const slogan = document.getElementById('net-slogan');
            const w1     = document.getElementById('n-word-1');
            const w2     = document.getElementById('n-word-2');
            const w3     = document.getElementById('n-word-3');

            if (!intro || !slogan || !w1 || !w2 || !w3) return;

            const wait = ms => new Promise(r => setTimeout(r, ms));

            const BASE_CLASS  = 'text-4xl md:text-6xl font-black text-deep-blue uppercase tracking-widest transition-all duration-500';
            const HIDDEN_CLASS = `${BASE_CLASS} opacity-50 scale-90`;

            const runLoop = async () => {
                while (true) {
                    // Reset
                    intro.classList.replace('opacity-100', 'opacity-0');
                    intro.classList.replace('scale-100',   'scale-150');
                    slogan.classList.replace('opacity-100', 'opacity-0');
                    slogan.classList.replace('translate-y-0', 'translate-y-8');
                    [w1, w2, w3].forEach(w => (w.className = HIDDEN_CLASS));

                    // Show intro
                    await wait(400);
                    intro.classList.replace('opacity-0',   'opacity-100');
                    intro.classList.replace('scale-150',   'scale-100');
                    await wait(2500);

                    // Hide intro
                    intro.classList.replace('opacity-100', 'opacity-0');
                    await wait(400);

                    // Show slogan
                    slogan.classList.replace('opacity-0',    'opacity-100');
                    slogan.classList.replace('translate-y-8', 'translate-y-0');

                    // Animate words
                    for (const w of [w1, w2, w3]) {
                        w.className = `${BASE_CLASS} opacity-100 scale-110`;
                        await wait(600);
                        w.classList.replace('scale-110', 'scale-100');
                    }

                    await wait(2500);

                    // Fade out slogan
                    slogan.classList.replace('opacity-100', 'opacity-0');
                    await wait(700);
                }
            };

            runLoop();
        });
    </script>

@endsection