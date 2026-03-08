<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $produk->nama }} — Petshop</title>
    <meta name="description" content="Detail informasi lengkap mengenai produk {{ $produk->nama }}.">
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
                <a href="{{ route('landing.list-product') }}"
                    class="hidden sm:flex items-center justify-center gap-2.5 px-4 py-2 bg-white text-slate-600 hover:text-primary font-bold rounded-md hover:bg-slate-50 transition-all duration-300 ease-in-out shadow-sm border border-slate-200 group shrink-0 ">
                    <div
                        class="w-5 h-5 rounded bg-slate-100 text-slate-500 group-hover:text-primary flex items-center justify-center group-hover:-translate-x-0.5 transition-all">
                        <i class="ph ph-arrow-left text-xs"></i>
                    </div>
                    <span class="text-xs tracking-wide uppercase">Daftar Produk</span>
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
                            <a href="{{ route('landing.list-product') }}"
                                class="flex items-center px-1.5 hover:text-primary transition-colors cursor-pointer">
                                <span class="text-slate-500 font-bold text-xs uppercase tracking-tight">Daftar
                                    Produk</span>
                            </a>
                        </li>
                        <li class="flex items-center gap-1.5 text-slate-300 shrink-0">
                            <i class="ph ph-caret-right text-[10px]"></i>
                            <div class="flex items-center px-1.5">
                                <span
                                    class="text-dark font-bold text-xs uppercase tracking-tight max-w-[120px] sm:max-w-[200px] truncate block">{{ $produk->nama }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

            </div>
        </div>

        {{-- ============================================== --}}
        {{-- PRODUCT DETAIL SECTION                          --}}
        {{-- ============================================== --}}
        <div class="relative bg-white overflow-hidden py-10 lg:py-16">
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
                            @click="openImage('{{ $produk->foto_utama }}')">

                            <!-- Badges -->
                            <div class="absolute top-4 left-4 z-20 flex flex-col gap-2">
                                @if ($produk->is_favorit)
                                    <span
                                        class="text-xs font-bold bg-secondary text-white px-3 py-1.5 rounded-full shadow-md flex items-center gap-1.5 backdrop-blur-sm w-fit">
                                        <i class="ph-fill ph-star text-sm"></i> Produk Unggulan
                                    </span>
                                @endif
                                @if ($produk->stok > 0)
                                    <span
                                        class="text-xs font-bold bg-emerald-500/90 text-white px-3 py-1.5 rounded-full shadow-md backdrop-blur-sm w-fit">Tersedia
                                        ({{ $produk->stok }})</span>
                                @else
                                    <span
                                        class="text-xs font-bold bg-red-500/90 text-white px-3 py-1.5 rounded-full shadow-md backdrop-blur-sm w-fit">Habis</span>
                                @endif
                            </div>

                            <img src="{{ $produk->foto_utama }}" alt="{{ $produk->nama }}"
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
                        @if ($produk->galeri && count($produk->galeri) > 0)
                            <div class="grid grid-cols-3 gap-3">
                                @foreach ($produk->galeri as $img)
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
                    <div class="w-full lg:w-7/12 xl:w-1/2 flex flex-col" data-aos="fade-up" data-aos-delay="100">

                        <div class="flex-1">
                            <!-- Category & Tags -->
                            <div class="flex flex-wrap items-center gap-2 mb-4">
                                <span
                                    class="inline-flex items-center gap-1.5 text-xs font-bold text-primary bg-primary/10 px-3 py-1.5 rounded-lg uppercase tracking-wider">
                                    <i class="ph-fill ph-tag"></i> {{ $produk->category->nama ?? 'Umum' }}
                                </span>

                                @if ($produk->merek)
                                    <span
                                        class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 bg-blue-50 border border-blue-100 px-2.5 py-1.5 rounded-lg uppercase tracking-wider">
                                        <i class="ph-bold ph-trademark text-sm"></i> {{ $produk->merek }}
                                    </span>
                                @endif
                            </div>

                            <!-- Title & Price Area -->
                            <h1
                                class="text-4xl sm:text-5xl font-extrabold text-slate-900 mb-4 leading-tight tracking-tight">
                                {{ $produk->nama }}
                            </h1>

                            <div class="flex items-end gap-3 mb-8">
                                <span class="text-4xl sm:text-5xl font-black text-primary tracking-tight">Rp
                                    {{ number_format($produk->harga, 0, ',', '.') }}</span>
                            </div>

                            <!-- Highlights/Specs Area (Elegant list instead of boxes) -->
                            <div class="bg-slate-50/80 rounded-3xl p-6 sm:p-8 mb-8 border border-slate-100">
                                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-5">Spesifikasi
                                    Produk</h3>
                                <div class="grid grid-cols-2 gap-x-6 gap-y-5">

                                    <!-- Berat -->
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-amber-500 shadow-sm border border-slate-100 shrink-0">
                                            <i class="ph-fill ph-scales text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-500 font-medium mb-0.5">Berat</p>
                                            <p class="font-bold text-slate-800">{{ $produk->berat }} Kg</p>
                                        </div>
                                    </div>

                                    <!-- Stok -->
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-blue-500 shadow-sm border border-slate-100 shrink-0">
                                            <i class="ph-fill ph-archive-box text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-500 font-medium mb-0.5">Ketersediaan</p>
                                            <p class="font-bold text-slate-800">{{ $produk->stok }} Tersedia</p>
                                        </div>
                                    </div>

                                    <!-- Tanggal Kadaluarsa -->
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-indigo-500 shadow-sm border border-slate-100 shrink-0">
                                            <i class="ph-fill ph-calendar-x text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-500 font-medium mb-0.5">Kadaluarsa</p>
                                            <p class="font-bold text-slate-800">
                                                @if ($produk->tanggal_kadaluarsa)
                                                    {{ \Carbon\Carbon::parse($produk->tanggal_kadaluarsa)->format('d M Y') }}
                                                @else
                                                    Tidak ada
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-10">
                                <h3 class="text-xl font-bold text-slate-900 mb-4">Informasi Produk</h3>
                                <div
                                    class="prose prose-slate prose-p:leading-relaxed prose-p:text-slate-600 max-w-none text-base">
                                    <p>{!! nl2br(e($produk->deskripsi)) !!}</p>
                                </div>
                            </div>

                            <!-- Action Area CTA (Sticky on mobile, inline on desktop) -->
                            <div
                                class="fixed bottom-0 left-0 right-0 p-4 bg-white/90 backdrop-blur-md border-t border-slate-200 z-50 lg:relative lg:p-0 lg:bg-transparent lg:border-t-0 lg:z-auto">
                                <div class="flex flex-col gap-3 max-w-[1300px] mx-auto">
                                    <!-- Main Action -->
                                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo, saya tertarik untuk membeli produk ' . $produk->nama . ' (Rp ' . number_format($produk->harga, 0, ',', '.') . '). Bisakah saya mendapat informasi ketersediaannya?') }}"
                                        target="_blank"
                                        class="w-full xl:w-5/6 py-4 px-8 bg-primary text-white font-bold rounded-2xl hover:bg-emerald-600 hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 flex items-center justify-center gap-3 transform hover:-translate-y-1">
                                        <i class="ph-fill ph-whatsapp-logo text-2xl"></i>
                                        <span class="text-lg">Beli via WhatsApp</span>
                                    </a>

                                    <!-- Trust Badge -->
                                    <p
                                        class="text-center justify-center lg:justify-start xl:w-5/6 text-[13px] text-slate-500 mt-2 flex items-center gap-2">
                                        <i class="ph-fill ph-bag-check text-emerald-500 text-lg"></i>
                                        <span class="font-medium">Jaminan Kualitas 100% Original.</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spacer for mobile sticky button -->
        <div class="h-28 lg:hidden bg-slate-50 border-t border-slate-100"></div>

        {{-- ============================================== --}}
        {{-- CTA BANNER & FOOTER                            --}}
        {{-- ============================================== --}}
        @include('components.CTA-Banner')
        @include('components.footer')

    </main>

</body>

</html>
