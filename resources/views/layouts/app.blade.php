<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    @php
        $siteName        = 'PT Sumber Sehat Sejahtera';
        $defaultTitle    = $siteName . ' - Distributor Farmasi Terpercaya';
        $title           = trim($__env->yieldContent('title')) ?: $defaultTitle;

        $defaultDesc     = 'PT Sumber Sehat Sejahtera adalah perusahaan distributor obat terpercaya dengan standar mutu, kepatuhan regulasi, serta layanan distribusi profesional untuk mitra dan pelanggan.';
        $description     = trim($__env->yieldContent('meta_description')) ?: $defaultDesc;

        $defaultKeywords = 'distributor obat, distributor farmasi, PBF, distribusi farmasi, produk kesehatan, PT Sumber Sehat Sejahtera';
        $keywords        = trim($__env->yieldContent('meta_keywords')) ?: $defaultKeywords;

        $canonical       = trim($__env->yieldContent('canonical')) ?: url()->current();
        $ogImage         = trim($__env->yieldContent('og_image')) ?: asset('images/3s.png');
    @endphp

    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="keywords"    content="{{ $keywords }}">
    <meta name="robots"      content="@yield('meta_robots', 'index,follow')">
    <link rel="canonical"    href="{{ $canonical }}">

    {{-- Open Graph --}}
    <meta property="og:type"        content="website">
    <meta property="og:site_name"   content="{{ $siteName }}">
    <meta property="og:title"       content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url"         content="{{ $canonical }}">
    <meta property="og:image"       content="{{ $ogImage }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image"       content="{{ $ogImage }}">

    {{-- Favicons (favicon.ico bawaan Laravel kosong 0 byte, pakai logo PNG) --}}
    <link rel="icon" type="image/png" href="{{ asset('images/3s.png') }}">
    <link rel="apple-touch-icon"      href="{{ asset('images/3s.png') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
    <script defer src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- GSAP --}}
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

    {{-- Lottie --}}
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.11/dist/dotlottie-wc.js" type="module"></script>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Recaptcha --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'deep-blue':      '#0A2463',
                        'magenta-accent': '#E91E63',
                        'soft-purple':    '#9C27B0',
                        'light-blue':     '#00A8E8',
                        'light-pink':     '#FFF0F5',
                        'bone-white':     '#FFFFFF',
                    },
                    fontFamily: {
                        jakarta: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                },
            },
        }
    </script>

    <style>
        ::-webkit-scrollbar       { width: 8px; }
        ::-webkit-scrollbar-track { background: #ffffff; }
        ::-webkit-scrollbar-thumb { background: #677db0; border-radius: 6px; }

        .skip-link {
            position: absolute;
            left: -9999px;
            top: auto;
            width: 1px;
            height: 1px;
            overflow: hidden;
        }
        .skip-link:focus {
            position: fixed;
            left: 1rem;
            top: 1rem;
            width: auto;
            height: auto;
            z-index: 100;
            padding: 0.6rem 1rem;
            border-radius: 0.75rem;
            background: #fff;
            color: #0A2463;
            box-shadow: 0 10px 30px rgba(2, 95, 188, 0.29);
        }

        .header-mural {
            background:
                linear-gradient(135deg,
                    rgba(251, 220, 236, 0.151) 0%,
                    rgba(169, 84, 128, 0.527)  22%,
                    rgb(137, 2, 72)            22%,
                    rgba(12, 56, 90, 0.767)    62%,
                    rgba(14, 73, 161, 0.048)   62%,
                    rgba(136, 0, 70, 0)        100%
                ),
                linear-gradient(225deg,
                    rgba(222, 233, 241, 0.468) 0%,
                    rgba(78, 120, 155, 0)      30%,
                    rgba(120, 155, 221, 0.473) 30%,
                    rgba(126, 179, 223, 0.647) 52%,
                    rgba(3, 28, 63, 0.843)     52%,
                    rgba(175, 219, 255, 0)     100%
                ),
                linear-gradient(90deg, #f3b8c9 0%, #f3b8c9 100%);
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.88);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            transition: color 0.2s ease, transform 0.2s ease;
        }
        .nav-link:hover {
            color: #fff;
            transform: translateY(-1px);
        }
        .nav-link-active {
            color: #fff;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            border-bottom: 2px solid rgba(255, 255, 255, 0.85);
            padding-bottom: 4px;
        }

        .mobile-menu-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        .mobile-menu-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 85%;
            max-width: 400px;
            height: 100vh;
            background: white;
            z-index: 1000;
            transition: right 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.15);
            overflow-y: auto;
        }
        .mobile-menu.active { right: 0; }

        .mobile-nav-item {
            display: flex;
            align-items: center;
            padding: 1.25rem 1.5rem;
            color: #0a2463;
            font-weight: 700;
            font-size: 15px;
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .mobile-nav-item:hover  { background-color: #ffffff; color: #E91E63; }
        .mobile-nav-item.active { background-color: #ffffff; color: #E91E63; border-left: 4px solid #E91E63; }

        #brandText       { color: #fff; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.22); letter-spacing: 0.02em; }
        #brandText:hover { text-shadow: 0 4px 16px rgba(0, 0, 0, 0.28); }
    </style>

    @stack('head')
</head>

<body class="bg-white font-jakarta font-semibold text-deep-blue antialiased overflow-x-hidden" x-data="{ mobileMenuOpen: false }">

    <a href="#main-content" class="skip-link">Skip to content</a>

    {{-- Scroll to Top --}}
    <button id="scrollToTopBtn"
        class="fixed bottom-8 right-8 z-50 p-3 bg-[#0a2463] text-white rounded-lg shadow-lg opacity-0 pointer-events-none translate-y-10 transition-all duration-300 hover:bg-[#0a2463]/80 hover:-translate-y-1 flex items-center justify-center"
        aria-label="Scroll to top">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    {{-- Header --}}
    <header class="sticky top-0 z-50 text-white shadow-lg header-mural" id="siteHeader" role="banner">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-12 py-4">
            <div class="flex items-center justify-between">

                {{-- Brand --}}
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" aria-label="Home">
                        <img src="{{ asset('images/3s.png') }}" class="h-10 w-auto" alt="Logo PT Sumber Sehat Sejahtera" width="120" height="40" loading="eager">
                    </a>
                    <a href="{{ route('home') }}" class="hidden sm:block font-jakarta font-black text-[18px] lg:text-[22px] leading-none" id="brandText" aria-label="PT Sumber Sehat Sejahtera - Home">
                        Sumber Sehat Sejahtera
                    </a>
                </div>

                {{-- Desktop Nav --}}
                <nav class="hidden lg:flex items-center gap-7" aria-label="Primary Navigation">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'nav-link-active' : 'nav-link' }}">BERANDA</a>

                    <div class="relative" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'nav-link-active' : 'nav-link' }} flex items-center gap-1.5 py-1">
                            Tentang Kami
                            <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </a>

                        <div x-cloak x-show="dropdownOpen"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                             class="absolute top-full left-0 mt-3 w-64 bg-white rounded-xl shadow-2xl py-2 z-[60] border border-gray-100/50 overflow-hidden"
                             style="display: none;">

                            {{-- Invisible bridge to prevent hover gap --}}
                            <div class="absolute -top-4 left-0 w-full h-4"></div>

                            <a href="{{ route('about') }}#sejarah" class="group/item relative flex items-center gap-3 px-5 py-3 text-sm text-[#0a2463] font-bold hover:bg-slate-50 transition-all duration-300">
                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#0a2463] scale-y-0 group-hover/item:scale-y-100 transition-transform duration-300 origin-center"></div>
                                <span class="material-symbols-outlined text-[#0a2463]/70 group-hover/item:text-[#0a2463] text-[20px] transition-colors">history_edu</span>
                                <span class="group-hover/item:translate-x-1 transition-transform duration-300">SEJARAH</span>
                            </a>

                            <a href="{{ route('about') }}#visimisi" class="group/item relative flex items-center gap-3 px-5 py-3 text-sm text-[#0a2463] font-bold hover:bg-slate-50 transition-all duration-300">
                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#E91E63] scale-y-0 group-hover/item:scale-y-100 transition-transform duration-300 origin-center"></div>
                                <span class="material-symbols-outlined text-[#0a2463]/70 group-hover/item:text-[#E91E63] text-[20px] transition-colors">visibility</span>
                                <span class="group-hover/item:translate-x-1 transition-transform duration-300">VISI & MISI</span>
                            </a>

                            <a href="{{ route('about') }}#struktur" class="group/item relative flex items-center gap-3 px-5 py-3 text-sm text-[#0a2463] font-bold hover:bg-slate-50 transition-all duration-300">
                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#00A8E8] scale-y-0 group-hover/item:scale-y-100 transition-transform duration-300 origin-center"></div>
                                <span class="material-symbols-outlined text-[#0a2463]/70 group-hover/item:text-[#00A8E8] text-[20px] transition-colors">account_tree</span>
                                <span class="group-hover/item:translate-x-1 transition-transform duration-300">STRUKTUR</span>
                            </a>
                        </div>
                    </div>

                    <div class="relative" x-data="{ dropdownOpen: false }" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                        <a href="{{ route('partners') }}" class="{{ request()->routeIs('partners') ? 'nav-link-active' : 'nav-link' }} flex items-center gap-1.5 py-1">
                            Partner
                            <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </a>

                        <div x-cloak x-show="dropdownOpen"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                             class="absolute top-full left-0 mt-3 w-56 bg-white rounded-xl shadow-2xl py-2 z-[60] border border-gray-100/50 overflow-hidden"
                             style="display: none;">

                            <div class="absolute -top-4 left-0 w-full h-4"></div>

                            <a href="{{ route('partners') }}#principal" class="group/item relative flex items-center gap-3 px-5 py-3 text-sm text-[#0a2463] font-bold hover:bg-slate-50 transition-all duration-300">
                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#E91E63] scale-y-0 group-hover/item:scale-y-100 transition-transform duration-300 origin-center"></div>
                                <span class="material-symbols-outlined text-[#0a2463]/70 group-hover/item:text-[#E91E63] text-[20px] transition-colors">domain</span>
                                <span class="group-hover/item:translate-x-1 transition-transform duration-300">PRINCIPAL</span>
                            </a>

                            <a href="{{ route('partners') }}#mitra" class="group/item relative flex items-center gap-3 px-5 py-3 text-sm text-[#0a2463] font-bold hover:bg-slate-50 transition-all duration-300">
                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#00A8E8] scale-y-0 group-hover/item:scale-y-100 transition-transform duration-300 origin-center"></div>
                                <span class="material-symbols-outlined text-[#0a2463]/70 group-hover/item:text-[#00A8E8] text-[20px] transition-colors">handshake</span>
                                <span class="group-hover/item:translate-x-1 transition-transform duration-300">MITRA</span>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('products') }}" class="{{ request()->routeIs('products') ? 'nav-link-active' : 'nav-link' }}">PRODUK</a>
                    <a href="{{ route('career') }}"   class="{{ request()->routeIs('career')   ? 'nav-link-active' : 'nav-link' }}">KARIER</a>
                    <a href="{{ route('contact') }}"  class="{{ request()->routeIs('contact')  ? 'nav-link-active' : 'nav-link' }}">KONTAK SALES</a>
                </nav>

                {{-- Hamburger --}}
                <button @click="mobileMenuOpen = true"
                    class="lg:hidden flex flex-col justify-center items-center gap-[5px] w-10 h-10 hover:bg-white/10 rounded-lg transition-colors"
                    aria-label="Open Menu">
                    <span class="block w-6 h-[2.5px] bg-white rounded-full"></span>
                    <span class="block w-6 h-[2.5px] bg-white rounded-full"></span>
                    <span class="block w-4 h-[2.5px] bg-white rounded-full self-start ml-1"></span>
                </button>
            </div>
        </div>
    </header>

    {{-- Mobile Menu --}}
    <div @keydown.escape.window="mobileMenuOpen = false">
        {{-- Overlay --}}
        <div class="mobile-menu-overlay"
             :class="{ 'active': mobileMenuOpen }"
             @click="mobileMenuOpen = false"
             x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             style="display: none;">
        </div>

        <aside class="mobile-menu"
               :class="{ 'active': mobileMenuOpen }"
               x-show="mobileMenuOpen"
               x-transition:enter="transition ease-out duration-300"
               x-transition:enter-start="translate-x-full"
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in duration-200"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="translate-x-full"
               role="navigation"
               aria-label="Mobile Navigation"
               style="display: none;">

            {{-- Mobile Header --}}
            <div class="flex items-center justify-between px-5 py-4 header-mural text-white">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/3s.png') }}" class="h-8 w-auto" alt="Logo" width="100" height="32">
                    <span class="font-jakarta font-black text-[17px] leading-tight">Sumber Sehat Sejahtera</span>
                </div>
                <button @click="mobileMenuOpen = false"
                    class="flex items-center justify-center w-9 h-9 hover:bg-white/15 rounded-lg transition-colors"
                    aria-label="Close Menu">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Nav Items --}}
            <nav class="py-1">

                {{-- Beranda --}}
                <a href="{{ route('home') }}"
                    class="mobile-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    BERANDA
                </a>

                {{-- Tentang Kami Accordion --}}
                <div x-data="{ open: {{ request()->routeIs('about') ? 'true' : 'false' }} }">
                    <button @click="open = !open"
                        class="mobile-nav-item w-full justify-between {{ request()->routeIs('about') ? 'active' : '' }}">
                        <span>TENTANG KAMI</span>
                        <svg class="w-4 h-4 flex-shrink-0 transition-transform duration-300"
                             :class="open ? 'rotate-180 text-[#E91E63]' : ''"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-2"
                         class="bg-slate-50 border-l-4 border-[#0A2463]/20"
                         style="display: none;">
                        <a href="{{ route('about') }}#sejarah"
                            class="flex items-center gap-3 px-8 py-3.5 text-sm font-bold text-[#0a2463] hover:text-[#E91E63] hover:bg-white transition-colors border-b border-gray-100/80">
                            <span class="material-symbols-outlined text-[18px] opacity-60">history_edu</span>
                            SEJARAH
                        </a>
                        <a href="{{ route('about') }}#visimisi"
                            class="flex items-center gap-3 px-8 py-3.5 text-sm font-bold text-[#0a2463] hover:text-[#E91E63] hover:bg-white transition-colors border-b border-gray-100/80">
                            <span class="material-symbols-outlined text-[18px] opacity-60">visibility</span>
                            VISI & MISI
                        </a>
                        <a href="{{ route('about') }}#struktur"
                            class="flex items-center gap-3 px-8 py-3.5 text-sm font-bold text-[#0a2463] hover:text-[#E91E63] hover:bg-white transition-colors">
                            <span class="material-symbols-outlined text-[18px] opacity-60">account_tree</span>
                            STRUKTUR
                        </a>
                    </div>
                </div>

                {{-- Partner Accordion --}}
                <div x-data="{ open: {{ request()->routeIs('partners') ? 'true' : 'false' }} }">
                    <button @click="open = !open"
                        class="mobile-nav-item w-full justify-between {{ request()->routeIs('partners') ? 'active' : '' }}">
                        <span>PARTNER</span>
                        <svg class="w-4 h-4 flex-shrink-0 transition-transform duration-300"
                             :class="open ? 'rotate-180 text-[#E91E63]' : ''"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-2"
                         class="bg-slate-50 border-l-4 border-[#0A2463]/20"
                         style="display: none;">
                        <a href="{{ route('partners') }}#principal"
                            class="flex items-center gap-3 px-8 py-3.5 text-sm font-bold text-[#0a2463] hover:text-[#E91E63] hover:bg-white transition-colors border-b border-gray-100/80">
                            <span class="material-symbols-outlined text-[18px] opacity-60">domain</span>
                            PRINCIPAL
                        </a>
                        <a href="{{ route('partners') }}#mitra"
                            class="flex items-center gap-3 px-8 py-3.5 text-sm font-bold text-[#0a2463] hover:text-[#E91E63] hover:bg-white transition-colors">
                            <span class="material-symbols-outlined text-[18px] opacity-60">handshake</span>
                            MITRA
                        </a>
                    </div>
                </div>

                {{-- Single Links --}}
                <a href="{{ route('products') }}" class="mobile-nav-item {{ request()->routeIs('products') ? 'active' : '' }}">PRODUK</a>
                <a href="{{ route('career') }}"   class="mobile-nav-item {{ request()->routeIs('career')   ? 'active' : '' }}">KARIER</a>
                <a href="{{ route('contact') }}"  class="mobile-nav-item {{ request()->routeIs('contact')  ? 'active' : '' }}">KONTAK SALES</a>
            </nav>

            {{-- Footer --}}
            <div class="absolute bottom-0 left-0 right-0 p-4 bg-gray-50 border-t border-gray-100">
                <p class="text-xs text-gray-400 text-center font-medium">© {{ date('Y') }} PT Sumber Sehat Sejahtera</p>
            </div>
        </aside>
    </div>

    {{-- Main Content --}}
    <main id="main-content" class="w-full" role="main">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-50 border-t border-deep-blue/10" role="contentinfo">
        <div class="max-w-[1280px] mx-auto px-6 lg:px-10 py-14">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 items-start">

                {{-- Kolom 1: Brand & Sosial --}}
                <div class="md:col-span-4">
                    <div class="flex items-center gap-3 mb-5">
                        <img src="{{ asset('images/3s.png') }}" class="h-10 w-auto" alt="Logo PT Sumber Sehat Sejahtera" width="120" height="40" loading="lazy">
                        <span class="text-xl font-black text-deep-blue tracking-tight">PT Sumber Sehat Sejahtera</span>
                    </div>
                    <p class="text-deep-blue/70 max-w-md leading-relaxed text-sm">Mitra distribusi farmasi yang berfokus pada kepatuhan mutu, ketepatan layanan, dan standar regulasi untuk mendukung kebutuhan kesehatan.</p>
                    <p class="mt-5 mb-4 text-deep-blue/60 text-xs font-semibold tracking-widest uppercase">Professional Distribution Partner</p>

                    <div class="flex gap-4 items-center">
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="text-deep-blue/70 hover:text-magenta-accent transition-colors duration-300" aria-label="Instagram">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.468 2.53c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="text-deep-blue/70 hover:text-light-blue transition-colors duration-300" aria-label="LinkedIn">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer" class="text-deep-blue/70 hover:text-magenta-accent transition-colors duration-300" aria-label="TikTok">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93v6.16c0 2.52-1.12 4.84-2.9 6.24-1.72 1.35-3.8 2.06-5.96 2.06-3.23.01-6.19-2.05-7.25-5.04-1.18-3.35.48-7.05 3.94-8.73 1.09-.54 2.3-.82 3.53-.82.16 0 .32.01.48.01v4.04c-.11-.01-.22-.01-.33-.01-1.39.02-2.55.94-2.91 2.29-.38 1.43.34 2.94 1.65 3.49 1.26.54 2.78.14 3.57-1.04.59-.88.91-1.92.91-2.99V.02z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Kolom 2: Kontak --}}
                <div class="md:col-span-4">
                    <ul class="space-y-4 text-deep-blue/70 text-sm">
                        <li class="flex gap-3 items-start">
                            <svg class="w-5 h-5 text-magenta-accent mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Jl. Mahligai No.12, RT.006/RW.002, Sungai Lulut, Kec. Banjarmasin Timur, Kota Banjarmasin, Kalimantan Selatan, 70564, Indonesia</span>
                        </li>
                        <li class="flex gap-3 items-start">
                            <svg class="w-5 h-5 text-light-blue mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <span>0851-5676-7900</span>
                        </li>
                        <li class="flex gap-3 items-start">
                            <svg class="w-5 h-5 text-magenta-accent mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            <span>winantiotio@gmail.com</span>
                        </li>
                    </ul>
                </div>

{{-- Kolom 3: Form Kontak --}}
                <div class="md:col-span-4">
                    <h5 class="text-deep-blue font-black uppercase tracking-widest text-sm mb-5 border-b-2 border-magenta-accent inline-block">Hubungi Kami</h5>

                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded text-sm font-bold">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" id="contactForm" class="space-y-3">
                        @csrf

                        <div id="errorContainer" class="hidden mb-4 p-5 bg-[#0A2463] text-white rounded shadow-md">
                            <p class="mb-3 font-semibold text-[15px]">Silakan, isi kolom berikut terlebih dahulu:</p>
                            <ul id="errorList" class="list-disc pl-6 space-y-1.5 text-[15px]"></ul>
                        </div>

                        <div>
                            <label for="name" class="sr-only">Nama</label>
                            <input type="text" name="name" id="name" placeholder="Nama"
                                class="w-full bg-white/50 border border-deep-blue/10 rounded px-4 py-2 text-sm focus:outline-none focus:border-light-blue focus:ring-1 focus:ring-light-blue placeholder-deep-blue/40">
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="email" class="sr-only">Surel</label>
                                <input type="email" name="email" id="email" placeholder="Surel"
                                    class="w-full bg-white/50 border border-deep-blue/10 rounded px-4 py-2 text-sm focus:outline-none focus:border-light-blue focus:ring-1 focus:ring-light-blue placeholder-deep-blue/40">
                            </div>
                            <div>
                                <label for="phone" class="sr-only">Nomor Telepon</label>
                                <input type="tel" name="phone" id="phone" placeholder="No. Telepon"
                                    class="w-full bg-white/50 border border-deep-blue/10 rounded px-4 py-2 text-sm focus:outline-none focus:border-light-blue focus:ring-1 focus:ring-light-blue placeholder-deep-blue/40">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="sr-only">Subjek</label>
                            <input type="text" name="subject" id="subject" placeholder="Subjek"
                                class="w-full bg-white/50 border border-deep-blue/10 rounded px-4 py-2 text-sm focus:outline-none focus:border-light-blue focus:ring-1 focus:ring-light-blue placeholder-deep-blue/40">
                        </div>

                        <div>
                            <label for="message" class="sr-only">Pesan</label>
                            <textarea name="message" id="message" rows="3" placeholder="Tulis pesan Anda di sini..."
                                class="w-full bg-white/50 border border-deep-blue/10 rounded px-4 py-2 text-sm focus:outline-none focus:border-light-blue focus:ring-1 focus:ring-light-blue placeholder-deep-blue/40 resize-none"></textarea>
                        </div>

                        {{-- AWAL PENAMBAHAN RECAPTCHA --}}
                        <div>
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            @error('g-recaptcha-response')
                                <span class="text-red-500 text-xs mt-1 block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- AKHIR PENAMBAHAN RECAPTCHA --}}

                        <button type="submit" class="w-full bg-deep-blue text-white font-bold text-xs uppercase tracking-widest py-3 px-4 rounded hover:bg-deep-blue/90 transition-all duration-300">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-deep-blue/10">
                <p class="text-deep-blue/45 text-xs font-bold tracking-widest uppercase text-center md:text-left">© {{ date('Y') }} PT Sumber Sehat Sejahtera</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // AOS
            if (window.AOS) {
                AOS.init({ once: true, offset: 120, duration: 900, easing: 'ease-out-cubic' });
            }

            // Contact form validation
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function (e) {
                    const fields = [
                        { id: 'name',    label: 'Nama' },
                        { id: 'email',   label: 'Surel' },
                        { id: 'phone',   label: 'No. Telepon' },
                        { id: 'subject', label: 'Subjek' },
                        { id: 'message', label: 'Pesan' },
                    ];

                    const empty = fields.filter(({ id }) => {
                        const el = document.getElementById(id);
                        return el && !el.value.trim();
                    });

                    const errorContainer = document.getElementById('errorContainer');
                    const errorList      = document.getElementById('errorList');

                    if (empty.length > 0) {
                        e.preventDefault();
                        errorContainer.classList.remove('hidden');
                        errorList.innerHTML = empty.map(({ label }) => `<li>${label}</li>`).join('');
                    } else {
                        errorContainer.classList.add('hidden');
                    }
                });
            }

            // Scroll to top button
            const scrollBtn = document.getElementById('scrollToTopBtn');
            if (scrollBtn) {
                const toggleScrollBtn = () => {
                    const show = window.scrollY > 300;
                    scrollBtn.classList.toggle('opacity-0',           !show);
                    scrollBtn.classList.toggle('pointer-events-none', !show);
                    scrollBtn.classList.toggle('translate-y-10',      !show);
                    scrollBtn.classList.toggle('opacity-100',          show);
                    scrollBtn.classList.toggle('translate-y-0',        show);
                };

                window.addEventListener('scroll', toggleScrollBtn, { passive: true });
                scrollBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
            }
        });
    </script>

</body>
</html>