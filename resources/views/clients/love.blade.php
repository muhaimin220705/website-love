@extends('layouts.app')

@section('content')
<div class="fixed inset-0 flex items-center justify-center bg-[#001f3f] overflow-hidden" id="main-container">
    
    <audio id="lagu-cinta" loop>
        <source src="{{ asset('audio/jatuh-cinta.mp3') }}" type="audio/mpeg">
    </audio>

    <div id="wrapper-surat" class="z-20 text-center transition-opacity duration-1000">
        <div id="ikon-surat" class="text-white cursor-pointer hover:scale-110 transition-transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-40 h-40 mx-auto">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
        </div>

        <div id="pertanyaan" class="hidden mt-6">
            <h1 class="text-white text-2xl font-light mb-6 tracking-widest uppercase">Buka pesan ini?</h1>
            <button id="btn-buka" class="bg-white text-[#001f3f] px-12 py-3 rounded-full font-bold text-lg hover:scale-105 transition shadow-xl">Buka</button>
        </div>
    </div>

    <div id="layar-hati" class="hidden fixed inset-0 z-50 bg-[#001f3f]">
        <div id="container-hati" class="relative w-full h-full"></div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    const wrapper = document.getElementById('wrapper-surat');
    const ikon = document.getElementById('ikon-surat');
    const tanya = document.getElementById('pertanyaan');
    const btn = document.getElementById('btn-buka');
    const layar = document.getElementById('layar-hati');
    const audio = document.getElementById('lagu-cinta');

    // 1. Logika Klik Ikon
    ikon.addEventListener('click', () => {
        ikon.classList.add('hidden');
        tanya.classList.remove('hidden');
    });

    // 2. Logika Klik Tombol Buka
    btn.addEventListener('click', () => {
        if (audio) {
            audio.play().catch(e => console.log("Izin audio diperlukan browser"));
        }

        wrapper.style.opacity = '0';
        setTimeout(() => {
            wrapper.classList.add('hidden');
            layar.classList.remove('hidden');
            jalankanHati();
        }, 800);
    });

    // 3. Fungsi Animasi Hati
    function jalankanHati() {
        const container = document.getElementById('container-hati');
        const teks = "i love luvv"; // SUDAH DIPERBAIKI (Ditutup tanda kutip)
        const jumlah = 120; 

        for (let i = 0; i < jumlah; i++) {
            const span = document.createElement('span');
            span.innerText = teks;
            span.className = 'absolute text-red-600 font-bold text-[14px] pointer-events-none whitespace-nowrap opacity-90 drop-shadow-[0_0_5px_rgba(255,0,0,0.4)]';
            // Set posisi awal di tengah agar kalkulasi translate benar
            span.style.left = "50%";
            span.style.top = "50%";
            container.appendChild(span);
        }

        const spans = container.querySelectorAll('span');

        function animate() {
            const time = Date.now() * 0.0015;

            spans.forEach((el, i) => {
                const t = (i / jumlah) * Math.PI * 2;
                const x = 16 * Math.pow(Math.sin(t), 3);
                const y = -(13 * Math.cos(t) - 5 * Math.cos(2 * t) - 2 * Math.cos(3 * t) - Math.cos(4 * t));

                const scale = window.innerWidth < 768 ? 7 : 13; 
                const pulse = 1 + Math.sin(time * 3) * 0.06;

                // Gunakan translate -50% agar titik tengah teks pas di koordinat
                el.style.transform = `
                    translate(calc(-50% + ${x * scale * pulse}px), calc(-50% + ${y * scale * pulse}px)) 
                    rotate(${time * 0.5}rad)
                `;
            });
            requestAnimationFrame(animate);
        }
        animate();
    }
</script>
@endpush