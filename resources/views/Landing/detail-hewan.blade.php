<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $hewan->nama }} — Petshop</title>
    <meta name="description" content="Detail informasi lengkap mengenai {{ $hewan->nama }}.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-slate-50 font-[Poppins]" x-data="{
    imageModalOpen: false,
    activeImageSrc: '',
    openImage(src) {
        this.activeImageSrc = src;
        this.imageModalOpen = true;
    }
}">

    {{-- ====================================================== --}}
    {{-- GLOBAL IMAGE PREVIEW MODAL                             --}}
    {{-- ====================================================== --}}
    <div x-show="imageModalOpen" x-transition:enter="transition ease-out duration-250"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-250" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click.self="imageModalOpen = false"
        @keydown.escape.window="imageModalOpen = false"
        class="fixed inset-0 z-[200] flex items-center justify-center p-4 bg-slate-900/80 backdrop-blur-sm" x-cloak>
        <div x-transition:enter="transition ease-out duration-250" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-250"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
            class="relative max-w-4xl w-full max-h-[90vh] overflow-hidden rounded-xl shadow-2xl bg-white">
            <!-- Close button -->
            <button @click="imageModalOpen = false"
                class="absolute top-3 right-3 z-10 w-9 h-9 bg-slate-900/70 hover:bg-slate-900 text-white rounded-full flex items-center justify-center transition-colors cursor-pointer backdrop-blur-sm">
                <i class="ph ph-x text-base"></i>
            </button>
            <!-- Image -->
            <img :src="activeImageSrc" alt="Preview Image" class="w-full max-h-[90vh] object-contain bg-slate-100">
        </div>
    </div>

    {{-- ====================================================== --}}
    {{-- MAIN PAGE WRAPPER                                      --}}
    {{-- ====================================================== --}}
    <main>

        <div class="bg-white border-b border-slate-100 py-3" data-aos="fade-down">
            <div class="px-4 xl:max-w-[1300px] mx-auto w-full flex items-center justify-start gap-3 sm:gap-4">

                {{-- Back Button - Simplified & Refined --}}
                <a href="{{ route('landing.list-hewan') }}"
                    class="hidden sm:flex items-center justify-center gap-2.5 px-4 py-2 bg-white text-slate-600 hover:text-primary font-bold rounded-md hover:bg-slate-50 transition-all duration-300 ease-in-out shadow-sm border border-slate-200 group shrink-0 ">
                    <div
                        class="w-5 h-5 rounded bg-slate-100 text-slate-500 group-hover:text-primary flex items-center justify-center group-hover:-translate-x-0.5 transition-all">
                        <i class="ph ph-arrow-left text-xs"></i>
                    </div>
                    <span class="text-xs tracking-wide uppercase">Daftar Hewan</span>
                </a>

                {{-- Breadcrumb - Clean & Subtle --}}
                <nav aria-label="Breadcrumb" class="flex-1 w-full overflow-hidden">
                    <ol
                        class="flex items-center gap-2 bg-slate-50 border border-slate-200/50 p-1 rounded-md shadow-none overflow-x-auto no-scrollbar whitespace-nowrap">
                        <li class="shrink-0">
                            <a href="{{ url('/') }}"
                                class="flex items-center gap-2 text-slate-500 hover:text-primary transition-colors group/nav">
                                <div
                                    class="w-7 h-7 rounded-sm bg-white border border-slate-200/60 text-primary flex items-center justify-center group-hover/nav:bg-primary group-hover/nav:text-white transition-colors">
                                    <i class="ph ph-house-line text-xs"></i>
                                </div>
                                <span class="text-xs font-semibold pr-1">Beranda</span>
                            </a>
                        </li>
                        <li class="flex items-center gap-1.5 text-slate-300 shrink-0">
                            <i class="ph ph-caret-right text-[10px]"></i>
                            <a href="{{ route('landing.list-hewan') }}"
                                class="flex items-center px-1.5 hover:text-primary transition-colors cursor-pointer">
                                <span class="text-slate-500 font-bold text-xs uppercase tracking-tight">Daftar
                                    Hewan</span>
                            </a>
                        </li>
                        <li class="flex items-center gap-1.5 text-slate-300 shrink-0">
                            <i class="ph ph-caret-right text-[10px]"></i>
                            <div class="flex items-center px-1.5">
                                <span
                                    class="text-dark font-bold text-xs uppercase tracking-tight max-w-[120px] sm:max-w-[200px] truncate block">{{ $hewan->nama }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

            </div>
        </div>

        {{-- ============================================== --}}
        {{-- ANIMAL DETAIL SECTION                          --}}
        {{-- ============================================== --}}
        <div class="relative bg-white py-10 lg:py-16">
            <!-- Background Decorative Elements -->
            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-primary/5 rounded-full blur-[100px] opacity-70"></div>
                <div class="absolute bottom-0 left-0 w-1/3 h-1/3 bg-secondary/5 rounded-full blur-[100px] opacity-70">
                </div>
            </div>

            <div class="px-4 xl:max-w-[1300px] mx-auto w-full relative z-10">
                <div class="flex flex-col lg:flex-row gap-10 lg:gap-16 items-start">

                    <!-- Left Column: Gallery (Sticky on desktop) -->
                    <div class="w-full lg:w-5/12 xl:w-1/2 lg:sticky lg:top-24 space-y-4" data-aos="fade-right">
                        <!-- Main Photo -->
                        <div class="bg-slate-50 rounded-3xl overflow-hidden shadow-sm relative group cursor-pointer aspect-square sm:aspect-[4/3] lg:aspect-square flex items-center justify-center border border-slate-100/60"
                            @click="openImage('{{ $hewan->photo }}')">

                            <!-- Badges -->
                            <!-- Stock Badge (Top Left) -->
                            <div class="absolute top-4 left-4 z-20">
                                @if ($hewan->stok > 0)
                                    <span
                                        class="text-[10px] sm:text-xs font-bold bg-emerald-500/90 text-white px-3 py-1.5 rounded-full shadow-md backdrop-blur-sm">Tersedia</span>
                                @else
                                    <span
                                        class="text-[10px] sm:text-xs font-bold bg-red-500/90 text-white px-3 py-1.5 rounded-full shadow-md backdrop-blur-sm">Habis</span>
                                @endif
                            </div>

                            <!-- Favorite Badge (Top Right) -->
                            <div class="absolute top-4 right-4 z-20">
                                @if ($hewan->isFavorite)
                                    <span
                                        class="text-[10px] sm:text-xs font-bold bg-secondary text-white px-3 py-1.5 rounded-full shadow-md flex items-center gap-1.5 backdrop-blur-sm">
                                        <i class="ph-fill ph-star text-sm"></i> Favorite
                                    </span>
                                @endif
                            </div>

                            <img src="{{ $hewan->photo }}" alt="{{ $hewan->nama }}"
                                class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">

                            <!-- Hover Overlay -->
                            <div
                                class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                <div
                                    class="bg-white/95 text-slate-800 px-5 py-2.5 rounded-full text-sm font-bold shadow-xl transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 flex items-center gap-2">
                                    <i class="ph ph-arrows-out text-lg"></i> Lihat Penuh
                                </div>
                            </div>
                        </div>

                        <!-- Thumbnails Row -->
                        @if ($hewan->fotoHewan && count($hewan->fotoHewan) > 0)
                            <div class="grid grid-cols-3 gap-3">
                                @foreach ($hewan->fotoHewan as $img)
                                    <div class="aspect-square bg-slate-50 rounded-2xl overflow-hidden cursor-pointer relative group border border-slate-100/60 hover:border-primary/30 transition-colors shadow-sm"
                                        @click="openImage('{{ $img->path_foto }}')">
                                        <img src="{{ $img->path_foto }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                        <div
                                            class="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center mix-blend-multiply">
                                        </div>
                                        <div
                                            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white">
                                            <i class="ph ph-magnifying-glass-plus text-xl drop-shadow-md"></i>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Right Column: Information -->
                    <div class="w-full lg:w-7/12 xl:w-1/2" data-aos="fade-up" data-aos-delay="100">

                        <div class="block">
                            <!-- Category & Tags -->
                            <div class="flex flex-wrap items-center gap-2 mb-4">
                                <span
                                    class="inline-flex items-center gap-1.5 text-xs font-bold text-primary bg-primary/10 px-3 py-1.5 rounded-lg uppercase tracking-wider">
                                    <i class="ph-fill ph-paw-print"></i> {{ $hewan->category->nama ?? 'Hewan' }}
                                </span>

                                @if ($hewan->jenis_kelamin === 'jantan')
                                    <span
                                        class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 bg-blue-50 border border-blue-100 px-2.5 py-1.5 rounded-lg uppercase tracking-wider">
                                        <i class="ph-bold ph-gender-male text-sm"></i> Jantan
                                    </span>
                                @elseif($hewan->jenis_kelamin === 'betina')
                                    <span
                                        class="inline-flex items-center gap-1 text-xs font-bold text-pink-600 bg-pink-50 border border-pink-100 px-2.5 py-1.5 rounded-lg uppercase tracking-wider">
                                        <i class="ph-bold ph-gender-female text-sm"></i> Betina
                                    </span>
                                @endif

                                <span
                                    class="inline-flex items-center gap-1 text-xs font-bold text-slate-600 bg-slate-100 border border-slate-200 px-2.5 py-1.5 rounded-lg uppercase tracking-wider">
                                    <i class="ph-fill ph-map-pin text-sm"></i>
                                    {{ str_replace('_', ' ', $hewan->asal_hewan) ?? '-' }}
                                </span>
                            </div>

                            <!-- Title & Price Area -->
                            <h1
                                class="text-4xl sm:text-5xl font-extrabold text-slate-900 mb-4 leading-tight tracking-tight">
                                {{ $hewan->nama }}
                            </h1>

                            <div class="flex items-end gap-3 mb-8">
                                <span class="text-4xl sm:text-5xl font-black text-primary tracking-tight">Rp
                                    {{ number_format($hewan->harga, 0, ',', '.') }}</span>
                            </div>

                            <!-- Highlights/Specs Area (Elegant list instead of boxes) -->
                            <div class="bg-slate-50/80 rounded-3xl p-6 sm:p-8 mb-8 border border-slate-100">
                                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-5">Spesifikasi
                                    Utama</h3>
                                <div class="grid grid-cols-2 gap-x-6 gap-y-5">

                                    <!-- Umur -->
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-primary shadow-sm border border-slate-100 shrink-0">
                                            <i class="ph-fill ph-calendar-blank text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-500 font-medium mb-0.5">Umur</p>
                                            <p class="font-bold text-slate-800">{{ $hewan->umur }} Bulan</p>
                                        </div>
                                    </div>

                                    <!-- Berat -->
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-amber-500 shadow-sm border border-slate-100 shrink-0">
                                            <i class="ph-fill ph-scales text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-500 font-medium mb-0.5">Berat</p>
                                            <p class="font-bold text-slate-800">{{ $hewan->berat }} Kg</p>
                                        </div>
                                    </div>

                                    <!-- Steril -->
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-indigo-500 shadow-sm border border-slate-100 shrink-0">
                                            <i class="ph-fill ph-scissors text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-500 font-medium mb-0.5">Status Steril</p>
                                            <p class="font-bold text-slate-800">
                                                {{ $hewan->sudah_steril ? 'Sudah Steril' : 'Belum Steril' }}</p>
                                        </div>
                                    </div>

                                    <!-- Kondisi -->
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-emerald-500 shadow-sm border border-slate-100 shrink-0">
                                            <i class="ph-fill ph-heartbeat text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-500 font-medium mb-0.5">Kondisi</p>
                                            <p class="font-bold text-slate-800">Sehat & Terawat</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-10">
                                <h3 class="text-xl font-bold text-slate-900 mb-4">Tentang {{ $hewan->nama }}</h3>
                                <div
                                    class="prose prose-slate prose-p:leading-relaxed prose-p:text-slate-600 max-w-none text-base">
                                    <p>{!! nl2br(e($hewan->deskripsi)) !!}</p>
                                </div>
                            </div>

                            <!-- Action Area CTA — Inline for all screen sizes -->
                            <div>
                                <a href="https://wa.me/6281234567890?text={{ urlencode('Halo, saya tertarik dengan hewan ' . $hewan->nama . ' (Rp ' . number_format($hewan->harga, 0, ',', '.') . '). Bisakah saya mendapat informasi lebih lanjut?') }}"
                                    target="_blank"
                                    class="w-full xl:w-5/6 py-4 px-8 bg-primary text-white font-bold rounded-2xl hover:bg-emerald-600 hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 flex items-center justify-center gap-3 transform hover:-translate-y-1">
                                    <i class="ph-fill ph-whatsapp-logo text-2xl"></i>
                                    <span class="text-lg">Tanya via WhatsApp</span>
                                </a>
                                <p class="text-[13px] text-slate-500 mt-3 flex items-center gap-2">
                                    <i class="ph-fill ph-shield-check text-emerald-500 text-lg"></i>
                                    <span class="font-medium">Kesehatan terjamin. Layanan terpercaya.</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============================================== --}}
        {{-- CTA BANNER & FOOTER                            --}}
        {{-- ============================================== --}}
        @include('components.CTA-Banner')
        @include('components.footer')

    </main>

</body>

</html>
