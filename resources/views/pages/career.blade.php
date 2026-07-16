@extends('layouts.app')

@section('title', 'Karir - PT Sumber Sehat Sejahtera')

@section('content')

{{-- ═══════════════════════════════════════════
     1. HERO BANNER
═══════════════════════════════════════════ --}}
<section class="relative w-full h-[400px] md:h-[500px] flex items-center justify-center bg-transparent overflow-hidden group">

    {{-- Background Image --}}
    {{-- FIX: Vite::asset('public/images/...') → asset('images/...') --}}
    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[10s] ease-out group-hover:scale-110"
         style="background-image: url('{{ asset('images/tim 3s.jpeg') }}');"
         role="img"
         aria-label="Tim PT Sumber Sehat Sejahtera">
    </div>

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-500"></div>

    {{-- FIX: Sebelumnya ada dua div.relative.z-10 bersarang — outer tidak pernah ditutup.
         Dirapikan menjadi satu div saja. --}}
    <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
        <span class="inline-block py-1 px-4 border border-white/30 rounded-full bg-white/10 backdrop-blur-md mb-6"
              data-aos="fade-down">
            <span class="text-white font-bold tracking-[0.2em] uppercase text-xs">Career Center</span>
        </span>
        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight tracking-tight"
            data-aos="fade-up">
            Berkarya Untuk <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-light-blue to-magenta-accent">
                Kesehatan Indonesia
            </span>
        </h1>
        <p class="text-white/80 text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed"
           data-aos="fade-up" data-aos-delay="100">
            Jadilah bagian dari tim yang berdedikasi tinggi dalam mendistribusikan produk farmasi berkualitas dengan standar CDOB.
        </p>
    </div>
</section>

{{-- ═══════════════════════════════════════════
     2. INTRODUCTION (Values)
═══════════════════════════════════════════ --}}
<section class="py-16 bg-white text-center">
    <div class="max-w-3xl mx-auto px-6" data-aos="fade-up">
        <h2 class="text-2xl font-extrabold text-deep-blue mb-4">Kenapa Bergabung Dengan Kami?</h2>
        <p class="font-standard text-deep-blue/70 text-lg leading-relaxed">
            Di PT Sumber Sehat Sejahtera, kami tidak hanya bekerja, tetapi kami membangun masa depan distribusi kesehatan. Kami mencari individu yang memiliki integritas, semangat inovasi, dan keinginan untuk tumbuh bersama.
        </p>
    </div>
</section>

{{-- ═══════════════════════════════════════════
     3. PROGRAM CATEGORIES
═══════════════════════════════════════════ --}}
<section class="py-16 bg-bone-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        @php
            $loker    = \App\Models\Career::where('title_id', 'Lowongan Pekerjaan')->where('is_active', true)->first();
            $pkpa     = \App\Models\Career::where('title_id', 'Program PKPA')->where('is_active', true)->first();
            $kemenhub = \App\Models\Career::where('title_id', 'Magang Kemenhub')->where('is_active', true)->first();
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

            {{-- Card: Lowongan Pekerjaan --}}
            <div class="bg-white rounded-xl shadow-sm hover:shadow-2xl transition-shadow duration-300 border border-gray-100 flex flex-col overflow-hidden"
                 data-aos="fade-up">
                <div class="w-full">
                    <img src="{{ $loker && $loker->image ? asset('storage/' . $loker->image) : 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1000' }}"
                         alt="Lowongan Pekerjaan"
                         class="w-full h-auto"
                         loading="lazy">
                </div>
                <div class="p-8 flex-1 flex flex-col">
                    <span class="text-xs font-extrabold text-magenta-accent uppercase tracking-widest mb-2">
                        {{ $loker->badge_text ?? 'Hiring' }}
                    </span>
                    <h3 class="text-2xl font-black text-deep-blue mb-3">Lowongan Pekerjaan</h3>
                    <p class="text-deep-blue/60 text-sm leading-relaxed mb-6">
                        {{ $loker->description_id ?? 'Kesempatan karir profesional untuk berbagai posisi.' }}
                    </p>
                    <a href="{{ $loker->apply_url ?? '#' }}"
                       target="_blank" rel="noopener noreferrer"
                       class="w-full py-3 border-2 border-deep-blue text-deep-blue font-bold text-sm rounded-lg text-center hover:bg-deep-blue hover:text-white transition-all duration-200 mt-auto">
                        Apply Professional
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════
     4. FOOTER BANNER — dengan particle canvas
═══════════════════════════════════════════ --}}
<section class="relative py-12 bg-deep-blue text-white border-t border-white/10 overflow-hidden"
         id="careerFooterBanner">

    {{-- Particle Canvas --}}
    <canvas id="careerParticleCanvas"
            class="absolute inset-0 w-full h-full pointer-events-none"
            style="z-index: 1;"></canvas>

    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6 relative"
         style="z-index: 2;">
        <div>
            <h4 class="text-xl font-extrabold">Butuh Bantuan?</h4>
            <p class="text-white/60 text-sm mt-1">Hubungi kami untuk info lebih lanjut</p>
        </div>
        <a href="mailto:dwtiotio@gmail.com"
           class="px-6 py-3 bg-white/10 hover:bg-white/20 rounded-lg font-bold text-sm transition-colors duration-200 flex items-center gap-2">
            <span class="material-symbols-outlined text-[20px]">mail</span>
            Hubungi HRD
        </a>
    </div>
</section>

@endsection

@push('head')
<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ── Particle Canvas — Career Footer Banner ───────────────── */
    const canvas  = document.getElementById('careerParticleCanvas');
    if (!canvas) return;

    const ctx     = canvas.getContext('2d');
    const section = document.getElementById('careerFooterBanner');

    function resizeCanvas() {
        canvas.width  = section.offsetWidth;
        canvas.height = section.offsetHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    const PARTICLE_COUNT = 55;
    const mouse = { x: -9999, y: -9999, radius: 100 };

    section.addEventListener('mousemove', e => {
        const rect = section.getBoundingClientRect();
        mouse.x = e.clientX - rect.left;
        mouse.y = e.clientY - rect.top;
    });
    section.addEventListener('mouseleave', () => {
        mouse.x = -9999;
        mouse.y = -9999;
    });

    const particles = Array.from({ length: PARTICLE_COUNT }, () => ({
        x:       Math.random() * canvas.width,
        y:       Math.random() * canvas.height,
        r:       Math.random() * 2 + 1,
        vx:      (Math.random() - 0.5) * 0.5,
        vy:      (Math.random() - 0.5) * 0.5,
        ox:      0,
        oy:      0,
        opacity: Math.random() * 0.4 + 0.15,
    }));

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        particles.forEach(p => {
            p.x += p.vx;
            p.y += p.vy;

            if (p.x < 0)             p.x = canvas.width;
            if (p.x > canvas.width)  p.x = 0;
            if (p.y < 0)             p.y = canvas.height;
            if (p.y > canvas.height) p.y = 0;

            const dx   = p.x - mouse.x;
            const dy   = p.y - mouse.y;
            const dist = Math.sqrt(dx * dx + dy * dy);

            if (dist < mouse.radius) {
                const force = (mouse.radius - dist) / mouse.radius;
                const angle = Math.atan2(dy, dx);
                p.ox = Math.cos(angle) * force * 3;
                p.oy = Math.sin(angle) * force * 3;
            } else {
                p.ox *= 0.9;
                p.oy *= 0.9;
            }

            ctx.beginPath();
            ctx.arc(p.x + p.ox, p.y + p.oy, p.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(255,255,255,${p.opacity})`;
            ctx.fill();
        });

        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const a  = particles[i];
                const b  = particles[j];
                const dx = a.x - b.x;
                const dy = a.y - b.y;
                const d  = Math.sqrt(dx * dx + dy * dy);
                if (d < 90) {
                    const alpha = (1 - d / 90) * 0.12;
                    ctx.beginPath();
                    ctx.moveTo(a.x + a.ox, a.y + a.oy);
                    ctx.lineTo(b.x + b.ox, b.y + b.oy);
                    ctx.strokeStyle = `rgba(255,255,255,${alpha})`;
                    ctx.lineWidth   = 1;
                    ctx.stroke();
                }
            }
        }

        requestAnimationFrame(draw);
    }

    draw();
});
</script>
@endpush
