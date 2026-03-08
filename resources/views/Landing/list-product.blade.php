<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Peliharaan — Petshop</title>
    <meta name="description"
        content="Temukan berbagai produk kebutuhan hewan peliharaan impian Anda dari koleksi lengkap kami.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-slate-50 font-[Poppins]" x-data="{
    imageModalOpen: false,
    activeImageSrc: '',
    activeImageName: '',
    activeImageCategory: '',
    openImage(src, name, category) {
        this.activeImageSrc = src;
        this.activeImageName = name;
        this.activeImageCategory = category;
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
            <!-- Product name overlay -->
            <div
                class="absolute bottom-0 left-0 right-0 z-10 bg-gradient-to-t from-black/70 to-transparent pt-12 pb-4 px-5">
                <p class="text-white font-bold text-lg leading-tight" x-text="activeImageName"></p>
                <p class="text-emerald-300 text-xs font-medium mt-0.5" x-text="activeImageCategory"></p>
            </div>
            <!-- Image -->
            <img :src="activeImageSrc" :alt="activeImageName" class="w-full max-h-[90vh] object-contain bg-slate-100">
        </div>
    </div>

    {{-- ====================================================== --}}
    {{-- MAIN PAGE WRAPPER                                      --}}
    {{-- ====================================================== --}}
    <main>

        <div class="bg-white border-b border-slate-100 py-3" data-aos="fade-down">
            <div class="px-4 xl:max-w-[1300px] mx-auto w-full flex items-center justify-start gap-3 sm:gap-4">

                {{-- Back Button - Simplified & Refined --}}
                <a href="{{ url('/') }}"
                    class="hidden sm:flex items-center justify-center gap-2.5 px-4 py-2 bg-primary text-white font-bold rounded-md hover:bg-emerald-600 transition-all duration-300 ease-in-out shadow-sm border border-primary/10 group shrink-0 ">
                    <div
                        class="w-5 h-5 rounded bg-white/20 flex items-center justify-center group-hover:-translate-x-0.5 transition-transform">
                        <i class="ph ph-arrow-left text-xs text-white"></i>
                    </div>
                    <span class="text-xs tracking-wide uppercase">Kembali</span>
                </a>

                {{-- Breadcrumb - Clean & Subtle --}}
                <nav aria-label="Breadcrumb">
                    <ol
                        class="flex items-center gap-2 bg-slate-50 border border-slate-200/50 p-1 rounded-md shadow-none">
                        <li>
                            <a href="{{ url('/') }}"
                                class="flex items-center gap-2 text-slate-500 hover:text-primary transition-colors group/nav">
                                <div
                                    class="w-7 h-7 rounded-sm bg-white border border-slate-200/60 text-primary flex items-center justify-center group-hover/nav:bg-primary group-hover/nav:text-white transition-colors">
                                    <i class="ph ph-house-line text-xs"></i>
                                </div>
                                <span class="text-xs font-semibold pr-1">Beranda</span>
                            </a>
                        </li>
                        <li class="flex items-center gap-1.5 text-slate-300">
                            <i class="ph ph-caret-right text-[10px]"></i>
                            <div class="flex items-center px-1.5">
                                <span class="text-dark font-bold text-xs uppercase tracking-tight">Daftar Produk</span>
                            </div>
                        </li>
                    </ol>
                </nav>

            </div>
        </div>

        {{-- ============================================== --}}
        {{-- PAGE HERO HEADER                               --}}
        {{-- ============================================== --}}
        <div class="relative bg-white border-b border-slate-100 overflow-hidden">
            {{-- Subtle decorative bg --}}
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute -top-20 -right-20 w-80 h-80 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-secondary/5 rounded-full blur-3xl"></div>
            </div>
            <div class="relative px-4 xl:max-w-[1300px] mx-auto w-full py-10 md:py-14" data-aos="fade-up">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                    <div data-aos="fade-right" data-aos-delay="100">
                        <span
                            class="inline-flex items-center gap-1.5 text-xs font-semibold text-primary bg-primary/10 px-3 py-1 rounded-full mb-3 uppercase tracking-wider">
                            <i class="ph ph-shopping-bag"></i>
                            Koleksi Produk
                        </span>
                        <h1 class="text-3xl md:text-4xl font-bold text-dark leading-tight mb-2">
                            Penuhi Kebutuhan <br class="hidden sm:block">
                            <span class="text-primary">Hewan Kesayanganmu</span>
                        </h1>
                        <p class="text-muted text-sm md:text-base max-w-lg">
                            Jelajahi koleksi produk perawatan, makanan, dan aksesoris terbaik untuk hewan peliharaan
                            Anda.
                        </p>
                    </div>
                    <div class="shrink-0">
                        <div class="flex items-center gap-3 text-sm bg-slate-50 border border-slate-200 px-4 py-2.5 rounded-md"
                            data-aos="fade-left" data-aos-delay="200">
                            <i class="ph ph-list-dashes text-primary text-lg"></i>
                            <div>
                                <span class="text-muted text-xs block">Total Produk</span>
                                <span class="font-bold text-dark text-lg">{{ $products->total() }} Produk</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============================================== --}}
        {{-- FILTER & SEARCH BAR                           --}}
        {{-- ============================================== --}}
        <div class="px-4 xl:max-w-[1300px] mx-auto w-full pt-8 pb-4" data-aos="fade-up" data-aos-delay="300">
            <form method="GET" action="{{ route('landing.list-product') }}"
                class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 md:p-5" x-data="{
                    search: '{{ $search ?? '' }}',
                    kategori: '{{ $kategoriId ?? 'semua' }}',
                    urutan: '{{ $urutan ?? 'terbaru' }}'
                }">

                <div class="flex flex-col lg:flex-row gap-4">

                    {{-- Search --}}
                    <div class="relative flex-1 min-w-0">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <i class="ph ph-magnifying-glass text-muted"></i>
                        </div>
                        <input type="text" name="search" x-model="search" @change="$event.target.form.submit()"
                            value="{{ $search ?? '' }}" placeholder="Cari nama produk..."
                            class="block w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-lg bg-slate-50 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary text-sm transition">
                    </div>

                    {{-- Filters Row --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 lg:w-auto">

                        {{-- Filter Kategori --}}
                        <div class="relative min-w-[200px]">
                            <select name="kategori" x-model="kategori" @change="$event.target.form.submit()"
                                class="block w-full pl-3 pr-9 py-2.5 border border-slate-200 bg-slate-50 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition appearance-none cursor-pointer text-slate-600">
                                <option value="semua">Semua Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ $kategoriId == $cat->id ? 'selected' : '' }}>{{ $cat->nama }}</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-muted">
                                <i class="ph ph-caret-down text-xs"></i>
                            </div>
                        </div>

                        {{-- Filter Urutan (Terbaru/Terlama) --}}
                        <div class="relative min-w-[200px]">
                            <select name="urutan" x-model="urutan" @change="$event.target.form.submit()"
                                class="block w-full pl-3 pr-9 py-2.5 border border-slate-200 bg-slate-50 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition appearance-none cursor-pointer text-slate-600">
                                <option value="terbaru" {{ ($urutan ?? '') === 'terbaru' ? 'selected' : '' }}>Terbaru
                                </option>
                                <option value="terlama" {{ ($urutan ?? '') === 'terlama' ? 'selected' : '' }}>Terlama
                                </option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-muted">
                                <i class="ph ph-caret-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Reset Button --}}
                    @if ($search || ($kategoriId && $kategoriId !== 'semua') || ($urutan && $urutan !== 'terbaru'))
                        <div class="shrink-0">
                            <a href="{{ route('landing.list-product') }}"
                                class="w-full lg:w-auto h-full min-h-[42px] px-4 py-2.5 border border-slate-200 text-slate-600 text-sm font-medium rounded-lg hover:bg-slate-100 hover:text-dark transition flex items-center justify-center gap-1.5 cursor-pointer">
                                <i class="ph ph-x-circle"></i>
                                Reset
                            </a>
                        </div>
                    @endif
                </div>

                {{-- Active Filter Chips --}}
                @if ($search || ($kategoriId && $kategoriId !== 'semua') || ($urutan && $urutan !== 'terbaru'))
                    <div class="flex flex-wrap gap-2 mt-3 pt-3 border-t border-slate-100">
                        <span class="text-xs text-muted font-medium self-center">Filter aktif:</span>
                        @if ($search)
                            <span
                                class="inline-flex items-center gap-1.5 text-xs bg-primary/10 text-primary px-2.5 py-1 rounded-full font-medium">
                                <i class="ph ph-magnifying-glass"></i>
                                "{{ $search }}"
                            </span>
                        @endif
                        @if ($kategoriId && $kategoriId !== 'semua')
                            @php $activeCat = $categories->firstWhere('id', $kategoriId); @endphp
                            <span
                                class="inline-flex items-center gap-1.5 text-xs bg-primary/10 text-primary px-2.5 py-1 rounded-full font-medium">
                                <i class="ph ph-tag"></i>
                                {{ $activeCat ? $activeCat->nama : $kategoriId }}
                            </span>
                        @endif
                        @if ($urutan && $urutan !== 'terbaru')
                            <span
                                class="inline-flex items-center gap-1.5 text-xs bg-primary/10 text-primary px-2.5 py-1 rounded-full font-medium">
                                <i class="ph ph-sort-ascending"></i>
                                {{ ucfirst($urutan) }}
                            </span>
                        @endif
                    </div>
                @endif
            </form>
        </div>

        {{-- ============================================== --}}
        {{-- RESULTS INFO                                   --}}
        {{-- ============================================== --}}
        <div class="px-4 xl:max-w-[1300px] mx-auto w-full pb-4">
            <div class="flex items-center justify-between">
                <p class="text-sm text-muted">
                    Menampilkan <span
                        class="font-semibold text-dark">{{ $products->firstItem() ?? 0 }}</span>&ndash;<span
                        class="font-semibold text-dark">{{ $products->lastItem() ?? 0 }}</span>
                    dari <span class="font-semibold text-dark">{{ $products->total() }}</span> produk
                </p>
                <div class="flex items-center gap-2 text-xs text-muted">
                    <i class="ph ph-sort-ascending"></i>
                    <span>Tampil {{ ucfirst($urutan) }}</span>
                </div>
            </div>
        </div>

        {{-- ============================================== --}}
        {{-- PRODUCT CARDS GRID                             --}}
        {{-- ============================================== --}}
        <section class="px-4 xl:max-w-[1300px] mx-auto w-full pb-12">

            {{-- Grid --}}
            @forelse ($products as $index => $product)
                @if ($loop->first)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                @endif
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-500 h-full flex flex-col relative"
                    data-aos="fade-up">

                    {{-- Image Container --}}
                    <div class="relative w-full aspect-[4/3] bg-gradient-to-br from-slate-50 to-slate-100 flex items-center justify-center p-4 overflow-hidden cursor-pointer border-b border-slate-100"
                        @click="openImage('{{ $product->foto_utama }}', '{{ addslashes($product->nama) }}', '{{ addslashes($product->category->nama ?? '') }}')">
                        {{-- Image Wrapper --}}
                        <div
                            class="w-full h-full rounded-lg overflow-hidden relative shadow-sm bg-white flex items-center justify-center">
                            {{-- Brand Label --}}
                            @if ($product->merek)
                                <div
                                    class="absolute top-3 left-3 z-20 flex items-center gap-1.5 px-2.5 py-1.5 bg-secondary text-white backdrop-blur-sm shadow-sm rounded text-[10px] font-bold uppercase tracking-wider">
                                    <i class="ph ph-tag text-xs transition-transform group-hover:scale-110"></i>
                                    {{ $product->merek }}
                                </div>
                            @endif
                            {{-- Hover Overlay --}}
                            <div
                                class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-center justify-center">
                                <div
                                    class="bg-white/90 backdrop-blur-sm rounded-lg px-3 py-1.5 flex items-center gap-1.5 text-dark text-xs font-semibold transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                    <i class="ph ph-arrows-out text-sm"></i>
                                    Perbesar
                                </div>
                            </div>
                            <img src="{{ $product->foto_utama }}" alt="{{ $product->nama }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>

                        {{-- Favorite badge --}}
                        @if ($product->is_favorit)
                            <div class="absolute top-6 left-6 z-10">
                                <span
                                    class="text-[10px] font-bold bg-secondary text-white px-2 py-1 rounded shadow flex items-center gap-0.5">
                                    <i class="ph ph-star-fill text-xs"></i> Top
                                </span>
                            </div>
                        @endif
                    </div>

                    {{-- Card Content --}}
                    <div class="p-4 flex flex-col flex-1 relative bg-white">

                        {{-- Category & Stock --}}
                        <div class="flex items-center justify-between mb-2">
                            <span
                                class="text-[11px] font-semibold text-primary bg-primary/10 border border-primary/20 px-2.5 py-0.5 rounded-sm uppercase tracking-wider">
                                {{ $product->category->nama ?? '-' }}
                            </span>

                            {{-- Stock Badge --}}
                            <div
                                class="flex items-center gap-1 text-[11px] bg-slate-50 text-primary font-semibold px-2 py-0.5 rounded-md border border-primary/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 stroke-current" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9-4 9 4-9 4-9-4z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10l9 4 9-4V7" />
                                </svg>
                                {{ $product->stok }}
                            </div>
                        </div>

                        {{-- Name --}}
                        <h3
                            class="text-base font-bold text-dark mb-1.5 group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                            {{ $product->nama }}</h3>

                        {{-- Description --}}
                        <p class="text-xs text-muted line-clamp-2 mb-3 flex-1">
                            {{ $product->deskripsi }}</p>

                        {{-- Price and CTA Section --}}
                        <div class="flex items-center justify-between mt-auto border-t border-slate-100 pt-3 mb-3">
                            <div class="flex flex-col">
                                <span
                                    class="text-[9px] text-muted uppercase tracking-wider font-semibold mb-0.5">Harga</span>
                                <span class="text-base font-bold text-secondary">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </span>
                            </div>

                            <!-- Pesanan Khusus Cart Button → WA -->
                            <a href="https://wa.me/6281234567890?text={{ urlencode('Halo, saya tertarik dengan produk ' . $product->nama . '. Bisakah saya mendapat informasi lebih lanjut?') }}"
                                target="_blank"
                                class="relative w-9 h-9 flex items-center justify-center bg-primary text-white rounded-lg hover:bg-emerald-600 transition shadow-sm shadow-primary/20 group shrink-0"
                                title="Pesanan Khusus via WhatsApp">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 stroke-current group-hover:scale-110 transition-transform"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                    </path>
                                </svg>

                                <span
                                    class="absolute -top-1 -right-1 w-3.5 h-3.5 bg-white text-primary text-[8px] font-bold rounded-full flex items-center justify-center shadow border">
                                    +
                                </span>
                            </a>
                        </div>

                        <!-- Detail Button Full Width -->
                        <a href="{{ route('landing.detail-product', $product->id) }}"
                            class="w-full py-2 px-3 text-slate-50 text-xs font-semibold rounded-md bg-primary hover:bg-primary/90 transition-all duration-300 text-center block">
                            Lihat Detail
                        </a>

                    </div>
                </div>
                @if ($loop->last)
                    </div>
                @endif

            @empty
                {{-- Empty State --}}
                <div class="flex flex-col items-center justify-center py-24 text-center">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                        <i class="ph ph-shopping-bag text-5xl text-slate-300"></i>
                    </div>
                    <h3 class="text-lg font-bold text-dark mb-1">Tidak Ada Produk Ditemukan</h3>
                    <p class="text-muted text-sm max-w-xs">Coba ubah kriteria pencarian atau filter yang Anda gunakan.
                    </p>
                    <a href="{{ route('landing.list-product') }}"
                        class="mt-5 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-lg hover:bg-emerald-600 transition-colors shadow-sm">
                        Reset Filter
                    </a>
                </div>
            @endforelse

            {{-- ============================================== --}}
            {{-- PAGINATION                                     --}}
            {{-- ============================================== --}}
            @if ($products->hasPages())
                <div class="mt-10 bg-white rounded-xl border border-slate-200 shadow-sm p-4" data-aos="fade-up">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        {{-- Info --}}
                        <div class="text-sm text-muted text-center sm:text-left">
                            Menampilkan <span class="font-semibold text-dark">{{ $products->firstItem() }}</span>
                            &ndash;
                            <span class="font-semibold text-dark">{{ $products->lastItem() }}</span>
                            dari <span class="font-semibold text-dark">{{ $products->total() }}</span> produk
                        </div>

                        {{-- Page Buttons --}}
                        <div class="flex items-center gap-1 flex-wrap justify-center">
                            {{-- Prev --}}
                            @if ($products->onFirstPage())
                                <span
                                    class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-md text-sm text-slate-300 bg-slate-50 cursor-not-allowed">
                                    <span class="hidden sm:inline">Sebelumnya</span>
                                    <i class="ph ph-caret-left sm:hidden"></i>
                                </span>
                            @else
                                <a href="{{ $products->previousPageUrl() }}"
                                    class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-md text-sm text-muted hover:bg-white hover:text-dark transition cursor-pointer">
                                    <span class="hidden sm:inline">Sebelumnya</span>
                                    <i class="ph ph-caret-left sm:hidden"></i>
                                </a>
                            @endif

                            {{-- Page Numbers --}}
                            @php
                                $currentPage = $products->currentPage();
                                $lastPage = $products->lastPage();
                                $delta = 1;
                                $pages = [1];
                                for (
                                    $i = max(2, $currentPage - $delta);
                                    $i <= min($lastPage - 1, $currentPage + $delta);
                                    $i++
                                ) {
                                    $pages[] = $i;
                                }
                                if ($lastPage > 1) {
                                    $pages[] = $lastPage;
                                }
                                $pages = array_unique($pages);
                                sort($pages);
                                $prev = null;
                            @endphp

                            @foreach ($pages as $page)
                                @if ($prev !== null && $page - $prev > 1)
                                    <span class="px-2 py-1.5 text-sm text-muted">...</span>
                                @endif

                                @if ($page == $currentPage)
                                    <span
                                        class="px-3 py-1.5 bg-primary text-white border border-primary rounded-md text-sm font-medium shadow-sm">{{ $page }}</span>
                                @else
                                    <a href="{{ $products->url($page) }}"
                                        class="px-3 py-1.5 border border-slate-200 rounded-md text-sm text-muted hover:bg-white hover:text-dark transition cursor-pointer">{{ $page }}</a>
                                @endif
                                @php $prev = $page; @endphp
                            @endforeach

                            {{-- Next --}}
                            @if ($products->hasMorePages())
                                <a href="{{ $products->nextPageUrl() }}"
                                    class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-md text-sm text-muted hover:bg-white hover:text-dark transition cursor-pointer">
                                    <span class="hidden sm:inline">Selanjutnya</span>
                                    <i class="ph ph-caret-right sm:hidden"></i>
                                </a>
                            @else
                                <span
                                    class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-md text-sm text-slate-300 bg-slate-50 cursor-not-allowed">
                                    <span class="hidden sm:inline">Selanjutnya</span>
                                    <i class="ph ph-caret-right sm:hidden"></i>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

        </section>

        {{-- ============================================== --}}
        {{-- CTA BANNER & FOOTER                            --}}
        {{-- ============================================== --}}
        @include('components.CTA-Banner')
        @include('components.footer')

    </main>


</body>

</html>
