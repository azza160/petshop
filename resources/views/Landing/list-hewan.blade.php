<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hewan Peliharaan — Petshop</title>
    <meta name="description"
        content="Temukan hewan peliharaan impian Anda dari koleksi lengkap kami. Filter berdasarkan kategori, gender, dan asal hewan.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 font-[Poppins]" x-data="listHewan()">

    {{-- ====================================================== --}}
    {{-- GLOBAL IMAGE PREVIEW MODAL                             --}}
    {{-- ====================================================== --}}
    <div x-show="imageModalOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click.self="imageModalOpen = false"
        @keydown.escape.window="imageModalOpen = false"
        class="fixed inset-0 z-[200] flex items-center justify-center p-4 bg-slate-900/80 backdrop-blur-sm" x-cloak>
        <div x-show="imageModalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="relative max-w-4xl w-full max-h-[90vh] overflow-hidden rounded-xl shadow-2xl bg-white">
            <!-- Close button -->
            <button @click="imageModalOpen = false"
                class="absolute top-3 right-3 z-10 w-9 h-9 bg-slate-900/70 hover:bg-slate-900 text-white rounded-full flex items-center justify-center transition-colors cursor-pointer backdrop-blur-sm">
                <i class="ph ph-x text-base"></i>
            </button>
            <!-- Animal name overlay -->
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

        {{-- ============================================== --}}
        {{-- BREADCRUMB + BACK BUTTON BAR                   --}}
        {{-- ============================================== --}}
        <div class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
            <div class="px-4 xl:max-w-[1300px] mx-auto w-full py-3 flex items-center justify-between gap-4">
                {{-- Back Button --}}
                <a href="{{ url('/') }}"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-primary transition-colors group shrink-0">
                    <span
                        class="w-8 h-8 rounded-md border border-slate-200 bg-slate-50 flex items-center justify-center group-hover:bg-primary/10 group-hover:border-primary/30 transition-colors">
                        <i class="ph ph-arrow-left text-base"></i>
                    </span>
                    <span class="hidden sm:inline">Kembali ke Beranda</span>
                </a>

                {{-- Breadcrumb --}}
                <nav aria-label="Breadcrumb">
                    <ol class="inline-flex items-center gap-1 flex-wrap text-sm">
                        <li>
                            <a href="{{ url('/') }}"
                                class="text-muted hover:text-primary transition-colors flex items-center gap-1">
                                <i class="ph ph-house text-sm"></i>
                                <span class="hidden sm:inline">Beranda</span>
                            </a>
                        </li>
                        <li class="flex items-center gap-1 text-muted">
                            <i class="ph ph-caret-right text-xs"></i>
                            <span class="text-dark font-semibold">Daftar Hewan</span>
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
            <div class="relative px-4 xl:max-w-[1300px] mx-auto w-full py-10 md:py-14">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                    <div>
                        <span
                            class="inline-flex items-center gap-1.5 text-xs font-semibold text-primary bg-primary/10 px-3 py-1 rounded-full mb-3 uppercase tracking-wider">
                            <i class="ph ph-paw-print"></i>
                            Koleksi Hewan
                        </span>
                        <h1 class="text-3xl md:text-4xl font-bold text-dark leading-tight mb-2">
                            Temukan Sahabat <br class="hidden sm:block">
                            <span class="text-primary">Berbulu Anda</span>
                        </h1>
                        <p class="text-muted text-sm md:text-base max-w-lg">
                            Jelajahi koleksi hewan peliharaan kami yang lengkap dan berkualitas. Setiap hewan dirawat
                            dengan penuh kasih sayang.
                        </p>
                    </div>
                    <div class="shrink-0">
                        <div
                            class="flex items-center gap-3 text-sm bg-slate-50 border border-slate-200 px-4 py-2.5 rounded-md">
                            <i class="ph ph-list-dashes text-primary text-lg"></i>
                            <div>
                                <span class="text-muted text-xs block">Total Hewan</span>
                                <span class="font-bold text-dark text-lg">24 Ekor</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============================================== --}}
        {{-- FILTER & SEARCH BAR                           --}}
        {{-- ============================================== --}}
        <div class="px-4 xl:max-w-[1300px] mx-auto w-full pt-8 pb-4">
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 md:p-5">
                <div class="flex flex-col lg:flex-row gap-4">

                    {{-- Search --}}
                    <div class="relative flex-1 min-w-0">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <i class="ph ph-magnifying-glass text-muted"></i>
                        </div>
                        <input type="text" x-model="search" @input.debounce.300ms="filterAnimals()"
                            placeholder="Cari nama hewan..."
                            class="block w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-lg bg-slate-50 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary text-sm transition">
                    </div>

                    {{-- Filters Row --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 lg:w-auto">

                        {{-- Filter Kategori --}}
                        <div class="relative">
                            <select x-model="filterKategori" @change="filterAnimals()"
                                class="block w-full pl-3 pr-9 py-2.5 border border-slate-200 bg-slate-50 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition appearance-none cursor-pointer text-slate-600">
                                <option value="">Semua Kategori</option>
                                <option value="Kucing">Kucing</option>
                                <option value="Anjing">Anjing</option>
                                <option value="Kelinci">Kelinci</option>
                                <option value="Burung">Burung</option>
                                <option value="Reptil">Reptil</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-muted">
                                <i class="ph ph-caret-down text-xs"></i>
                            </div>
                        </div>

                        {{-- Filter Gender --}}
                        <div class="relative">
                            <select x-model="filterGender" @change="filterAnimals()"
                                class="block w-full pl-3 pr-9 py-2.5 border border-slate-200 bg-slate-50 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition appearance-none cursor-pointer text-slate-600">
                                <option value="">Semua Gender</option>
                                <option value="jantan">Jantan</option>
                                <option value="betina">Betina</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-muted">
                                <i class="ph ph-caret-down text-xs"></i>
                            </div>
                        </div>

                        {{-- Filter Asal --}}
                        <div class="relative">
                            <select x-model="filterAsal" @change="filterAnimals()"
                                class="block w-full pl-3 pr-9 py-2.5 border border-slate-200 bg-slate-50 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition appearance-none cursor-pointer text-slate-600">
                                <option value="">Semua Asal</option>
                                <option value="lokal">Lokal</option>
                                <option value="impor">Impor</option>
                                <option value="hasil_breeding">Hasil Breeding</option>
                                <option value="rescue">Rescue</option>
                                <option value="titipan">Titipan</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-muted">
                                <i class="ph ph-caret-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Reset Button --}}
                    <div class="shrink-0">
                        <button @click="resetFilters()"
                            x-show="search || filterKategori || filterGender || filterAsal" x-transition
                            class="w-full lg:w-auto h-full min-h-[42px] px-4 py-2.5 border border-slate-200 text-slate-600 text-sm font-medium rounded-lg hover:bg-slate-100 hover:text-dark transition flex items-center justify-center gap-1.5 cursor-pointer">
                            <i class="ph ph-x-circle"></i>
                            Reset
                        </button>
                    </div>
                </div>

                {{-- Active Filter Chips --}}
                <div x-show="search || filterKategori || filterGender || filterAsal" x-transition
                    class="flex flex-wrap gap-2 mt-3 pt-3 border-t border-slate-100">
                    <span class="text-xs text-muted font-medium self-center">Filter aktif:</span>
                    <template x-if="search">
                        <span
                            class="inline-flex items-center gap-1.5 text-xs bg-primary/10 text-primary px-2.5 py-1 rounded-full font-medium">
                            <i class="ph ph-magnifying-glass"></i>
                            <span x-text="`"${search}"`"></span>
                            <button @click="search = ''; filterAnimals()"
                                class="hover:text-primary/70 transition cursor-pointer"><i
                                    class="ph ph-x text-xs"></i></button>
                        </span>
                    </template>
                    <template x-if="filterKategori">
                        <span
                            class="inline-flex items-center gap-1.5 text-xs bg-primary/10 text-primary px-2.5 py-1 rounded-full font-medium">
                            <i class="ph ph-tag"></i>
                            <span x-text="filterKategori"></span>
                            <button @click="filterKategori = ''; filterAnimals()"
                                class="hover:text-primary/70 transition cursor-pointer"><i
                                    class="ph ph-x text-xs"></i></button>
                        </span>
                    </template>
                    <template x-if="filterGender">
                        <span
                            class="inline-flex items-center gap-1.5 text-xs bg-primary/10 text-primary px-2.5 py-1 rounded-full font-medium">
                            <i class="ph ph-gender-intersex"></i>
                            <span x-text="filterGender === 'jantan' ? 'Jantan' : 'Betina'"></span>
                            <button @click="filterGender = ''; filterAnimals()"
                                class="hover:text-primary/70 transition cursor-pointer"><i
                                    class="ph ph-x text-xs"></i></button>
                        </span>
                    </template>
                    <template x-if="filterAsal">
                        <span
                            class="inline-flex items-center gap-1.5 text-xs bg-primary/10 text-primary px-2.5 py-1 rounded-full font-medium">
                            <i class="ph ph-map-pin"></i>
                            <span x-text="filterAsal.replace('_', ' ')"></span>
                            <button @click="filterAsal = ''; filterAnimals()"
                                class="hover:text-primary/70 transition cursor-pointer"><i
                                    class="ph ph-x text-xs"></i></button>
                        </span>
                    </template>
                </div>
            </div>
        </div>

        {{-- ============================================== --}}
        {{-- RESULTS INFO                                   --}}
        {{-- ============================================== --}}
        <div class="px-4 xl:max-w-[1300px] mx-auto w-full pb-4">
            <div class="flex items-center justify-between">
                <p class="text-sm text-muted">
                    Menampilkan <span class="font-semibold text-dark" x-text="filteredAnimals.length"></span> hewan
                    <template x-if="search || filterKategori || filterGender || filterAsal">
                        <span> dari <span class="font-semibold text-dark">24</span> total</span>
                    </template>
                </p>
                <div class="flex items-center gap-2 text-xs text-muted">
                    <i class="ph ph-sort-ascending"></i>
                    <span>Terbaru</span>
                </div>
            </div>
        </div>

        {{-- ============================================== --}}
        {{-- ANIMAL CARDS GRID                              --}}
        {{-- ============================================== --}}
        <section class="px-4 xl:max-w-[1300px] mx-auto w-full pb-12">

            {{-- Grid --}}
            <div x-show="filteredAnimals.length > 0">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                    <template x-for="(animal, index) in paginatedAnimals" :key="animal.id">
                        <div
                            class="bg-white border border-slate-200 shadow-sm rounded-xl overflow-hidden group hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 flex flex-col relative">

                            {{-- Image Container --}}
                            <div class="relative w-full aspect-[4/3] bg-slate-100 flex items-center justify-center p-3 overflow-hidden cursor-pointer"
                                @click="openImage(animal)">

                                {{-- Hover overlay --}}
                                <div
                                    class="absolute inset-0 bg-slate-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-center justify-center">
                                    <div
                                        class="bg-white/90 backdrop-blur-sm rounded-lg px-3 py-1.5 flex items-center gap-1.5 text-dark text-xs font-semibold transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                        <i class="ph ph-arrows-out text-sm"></i>
                                        Lihat Foto
                                    </div>
                                </div>

                                {{-- Image --}}
                                <div class="w-full h-full rounded-lg overflow-hidden">
                                    <img :src="animal.photo" :alt="animal.nama"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>

                                {{-- Stock Badge --}}
                                <div class="absolute top-3 right-3 z-10">
                                    <span x-show="animal.stok > 0"
                                        class="text-[10px] font-bold bg-emerald-500 text-white px-2 py-0.5 rounded-full shadow">
                                        Tersedia
                                    </span>
                                    <span x-show="animal.stok <= 0"
                                        class="text-[10px] font-bold bg-red-500 text-white px-2 py-0.5 rounded-full shadow">
                                        Habis
                                    </span>
                                </div>

                                {{-- Favorite badge --}}
                                <div x-show="animal.isFavorite" class="absolute top-3 left-3 z-10">
                                    <span
                                        class="text-[10px] font-bold bg-secondary text-white px-2 py-0.5 rounded-full shadow flex items-center gap-0.5">
                                        <i class="ph ph-star-fill text-xs"></i> Top
                                    </span>
                                </div>
                            </div>

                            {{-- Card Content --}}
                            <div class="p-4 flex flex-col flex-1">

                                {{-- Category & Age --}}
                                <div class="flex items-center justify-between mb-2">
                                    <span
                                        class="text-[11px] font-semibold text-primary bg-primary/10 px-2.5 py-0.5 rounded-full uppercase tracking-wider"
                                        x-text="animal.category"></span>
                                    <span
                                        class="text-[11px] text-muted font-medium bg-slate-100 px-2 py-0.5 rounded-full flex items-center gap-0.5">
                                        <i class="ph ph-clock text-xs"></i>
                                        <span x-text="animal.umur + ' Bln'"></span>
                                    </span>
                                </div>

                                {{-- Name --}}
                                <h3 class="text-base font-bold text-dark mb-1 group-hover:text-primary transition-colors line-clamp-1"
                                    x-text="animal.nama"></h3>

                                {{-- Description --}}
                                <p class="text-xs text-muted line-clamp-2 mb-3 flex-1 leading-relaxed"
                                    x-text="animal.deskripsi"></p>

                                {{-- Meta tags --}}
                                <div class="flex flex-wrap items-center gap-1.5 mb-3">
                                    {{-- Gender --}}
                                    <span x-show="animal.gender === 'jantan'"
                                        class="text-[10px] font-medium text-blue-600 bg-blue-50 border border-blue-100 px-2 py-0.5 rounded-md flex items-center gap-0.5">
                                        <i class="ph ph-gender-male text-xs"></i> Jantan
                                    </span>
                                    <span x-show="animal.gender === 'betina'"
                                        class="text-[10px] font-medium text-pink-600 bg-pink-50 border border-pink-100 px-2 py-0.5 rounded-md flex items-center gap-0.5">
                                        <i class="ph ph-gender-female text-xs"></i> Betina
                                    </span>
                                    {{-- Origin --}}
                                    <span
                                        class="text-[10px] font-medium text-slate-500 bg-slate-100 px-2 py-0.5 rounded-md capitalize"
                                        x-text="animal.asal.replace('_',' ')"></span>
                                </div>

                                {{-- Price + Stock --}}
                                <div class="flex items-center justify-between pt-3 border-t border-slate-100 mb-3">
                                    <div class="flex flex-col">
                                        <span
                                            class="text-[9px] text-muted uppercase tracking-wider font-semibold mb-0.5">Harga</span>
                                        <span class="text-base font-bold text-secondary"
                                            x-text="'Rp ' + animal.harga.toLocaleString('id-ID')"></span>
                                    </div>
                                </div>

                                {{-- CTA Buttons --}}
                                <div class="grid grid-cols-2 gap-2 mt-auto">
                                    <button @click="openImage(animal)"
                                        class="w-full py-2 px-2 border border-slate-200 text-slate-700 text-xs font-semibold rounded-lg hover:bg-slate-50 hover:border-primary hover:text-primary transition-colors flex items-center justify-center gap-1">
                                        <i class="ph ph-eye text-sm"></i>
                                        Lihat Foto
                                    </button>
                                    <a :href="`https://wa.me/6281234567890?text=${encodeURIComponent('Halo, saya tertarik dengan hewan ' + animal.nama + '. Bisakah saya mendapat informasi lebih lanjut?')}`"
                                        target="_blank"
                                        class="w-full py-2 px-2 bg-primary text-white text-xs font-semibold rounded-lg hover:bg-emerald-600 transition-colors shadow-sm shadow-primary/20 flex items-center justify-center gap-1">
                                        <i class="ph ph-whatsapp-logo text-sm"></i>
                                        Tanya Kami
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            {{-- Empty State --}}
            <div x-show="filteredAnimals.length === 0" x-transition
                class="flex flex-col items-center justify-center py-24 text-center">
                <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                    <i class="ph ph-paw-print text-5xl text-slate-300"></i>
                </div>
                <h3 class="text-lg font-bold text-dark mb-1">Tidak Ada Hewan Ditemukan</h3>
                <p class="text-muted text-sm max-w-xs">Coba ubah kriteria pencarian atau filter yang Anda gunakan.</p>
                <button @click="resetFilters()"
                    class="mt-5 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-lg hover:bg-emerald-600 transition-colors shadow-sm cursor-pointer">
                    Reset Filter
                </button>
            </div>

            {{-- ============================================== --}}
            {{-- PAGINATION                                     --}}
            {{-- ============================================== --}}
            <div x-show="totalPages > 1" x-transition
                class="mt-10 bg-white rounded-xl border border-slate-200 shadow-sm p-4">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    {{-- Info --}}
                    <div class="text-sm text-muted text-center sm:text-left">
                        Menampilkan <span class="font-semibold text-dark" x-text="pageStart"></span> &ndash;
                        <span class="font-semibold text-dark" x-text="pageEnd"></span>
                        dari <span class="font-semibold text-dark" x-text="filteredAnimals.length"></span> hewan
                    </div>

                    {{-- Page Buttons --}}
                    <div class="flex items-center gap-1 flex-wrap justify-center">
                        {{-- Prev --}}
                        <button @click="prevPage()" :disabled="currentPage === 1"
                            :class="currentPage === 1 ? 'text-slate-300 cursor-not-allowed bg-slate-50 border-slate-100' :
                                'text-muted hover:bg-white hover:text-dark cursor-pointer'"
                            class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-lg text-sm transition">
                            <span class="hidden sm:inline">Sebelumnya</span>
                            <i class="ph ph-caret-left sm:hidden"></i>
                        </button>

                        {{-- Page Numbers --}}
                        <template x-for="page in pageNumbers" :key="page">
                            <template x-if="page === '...'">
                                <span class="px-2 py-1.5 text-sm text-muted">...</span>
                            </template>
                            <template x-if="page !== '...'">
                                <button @click="goToPage(page)"
                                    :class="currentPage === page ? 'bg-primary text-white border-primary shadow-sm' :
                                        'border-slate-200 text-muted hover:bg-white hover:text-dark cursor-pointer'"
                                    class="px-3 py-1.5 border rounded-lg text-sm font-medium transition"
                                    x-text="page">
                                </button>
                            </template>
                        </template>

                        {{-- Next --}}
                        <button @click="nextPage()" :disabled="currentPage === totalPages"
                            :class="currentPage === totalPages ?
                                'text-slate-300 cursor-not-allowed bg-slate-50 border-slate-100' :
                                'text-muted hover:bg-white hover:text-dark cursor-pointer'"
                            class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-lg text-sm transition">
                            <span class="hidden sm:inline">Selanjutnya</span>
                            <i class="ph ph-caret-right sm:hidden"></i>
                        </button>
                    </div>
                </div>
            </div>

        </section>

        {{-- ============================================== --}}
        {{-- CTA BANNER & FOOTER                            --}}
        {{-- ============================================== --}}
        @include('components.CTA-Banner')
        @include('components.footer')

    </main>

    {{-- ====================================================== --}}
    {{-- ALPINE JS COMPONENT                                     --}}
    {{-- ====================================================== --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('listHewan', () => ({
                // ---- Filter State ----
                search: '',
                filterKategori: '',
                filterGender: '',
                filterAsal: '',

                // ---- Image Modal State ----
                imageModalOpen: false,
                activeImageSrc: '',
                activeImageName: '',
                activeImageCategory: '',

                // ---- Pagination State ----
                currentPage: 1,
                perPage: 12,

                // ---- Static Demo Data (nanti ganti dengan data dari controller) ----
                allAnimals: [{
                        id: 1,
                        nama: 'Luna',
                        category: 'Kucing',
                        gender: 'betina',
                        asal: 'lokal',
                        umur: 6,
                        stok: 2,
                        harga: 1500000,
                        isFavorite: true,
                        deskripsi: 'Kucing persia berbulu lebat dengan sifat yang lembut dan penuh kasih. Sangat cocok untuk keluarga dengan anak kecil.',
                        photo: 'https://images.unsplash.com/photo-1574158622682-e40e69881006?w=400&h=300&fit=crop'
                    },
                    {
                        id: 2,
                        nama: 'Rocky',
                        category: 'Anjing',
                        gender: 'jantan',
                        asal: 'impor',
                        umur: 8,
                        stok: 1,
                        harga: 4500000,
                        isFavorite: true,
                        deskripsi: 'Golden Retriever jantan yang cerdas dan ramah. Terlatih dasar dan sangat aktif, ideal untuk keluarga dinamis.',
                        photo: 'https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=400&h=300&fit=crop'
                    },
                    {
                        id: 3,
                        nama: 'Mochi',
                        category: 'Kelinci',
                        gender: 'betina',
                        asal: 'lokal',
                        umur: 3,
                        stok: 5,
                        harga: 350000,
                        isFavorite: false,
                        deskripsi: 'Kelinci mini lop yang menggemaskan dengan telinga terkulai. Jinak dan mudah perawatannya.',
                        photo: 'https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?w=400&h=300&fit=crop'
                    },
                    {
                        id: 4,
                        nama: 'Rio',
                        category: 'Burung',
                        gender: 'jantan',
                        asal: 'hasil_breeding',
                        umur: 12,
                        stok: 3,
                        harga: 800000,
                        isFavorite: true,
                        deskripsi: 'Burung Lovebird jantan dengan warna bulu yang cerah dan suara yang merdu. Aktif dan lincah sepanjang hari.',
                        photo: 'https://images.unsplash.com/photo-1552728089-57bdde30beb3?w=400&h=300&fit=crop'
                    },
                    {
                        id: 5,
                        nama: 'Max',
                        category: 'Anjing',
                        gender: 'jantan',
                        asal: 'impor',
                        umur: 18,
                        stok: 1,
                        harga: 8500000,
                        isFavorite: false,
                        deskripsi: 'Husky Siberia dengan mata biru yang memesona. Sangat energik dan membutuhkan aktivitas fisik yang cukup.',
                        photo: 'https://images.unsplash.com/photo-1605568427561-40dd23c2acea?w=400&h=300&fit=crop'
                    },
                    {
                        id: 6,
                        nama: 'Kitty',
                        category: 'Kucing',
                        gender: 'betina',
                        asal: 'hasil_breeding',
                        umur: 4,
                        stok: 3,
                        harga: 2000000,
                        isFavorite: true,
                        deskripsi: 'Kucing British Shorthair dengan bulu abu-abu tebal. Sifatnya tenang dan suka tidur, cocok untuk apartemen.',
                        photo: 'https://images.unsplash.com/photo-1561948955-570b270e7c36?w=400&h=300&fit=crop'
                    },
                    {
                        id: 7,
                        nama: 'Dino',
                        category: 'Reptil',
                        gender: 'jantan',
                        asal: 'rescue',
                        umur: 24,
                        stok: 1,
                        harga: 1200000,
                        isFavorite: false,
                        deskripsi: 'Iguana hijau hasil rescue yang sudah jinak dan terbiasa dengan manusia. Sudah makan dengan baik.',
                        photo: 'https://images.unsplash.com/photo-1516750105099-4b8a83e217ee?w=400&h=300&fit=crop'
                    },
                    {
                        id: 8,
                        nama: 'Coco',
                        category: 'Burung',
                        gender: 'betina',
                        asal: 'lokal',
                        umur: 8,
                        stok: 2,
                        harga: 650000,
                        isFavorite: false,
                        deskripsi: 'Kenari betina dengan suara kicauan yang sangat indah. Aktif bernyanyi di pagi dan sore hari.',
                        photo: 'https://images.unsplash.com/photo-1444464666168-49d633b86797?w=400&h=300&fit=crop'
                    },
                    {
                        id: 9,
                        nama: 'Bella',
                        category: 'Anjing',
                        gender: 'betina',
                        asal: 'lokal',
                        umur: 10,
                        stok: 2,
                        harga: 2500000,
                        isFavorite: false,
                        deskripsi: 'Shih Tzu betina dengan bulu panjang yang indah. Sangat suka bermain dan penuh kasih sayang kepada pemiliknya.',
                        photo: 'https://images.unsplash.com/photo-1594834749049-5bcf4e7e4046?w=400&h=300&fit=crop'
                    },
                    {
                        id: 10,
                        nama: 'Snow',
                        category: 'Kucing',
                        gender: 'betina',
                        asal: 'titipan',
                        umur: 5,
                        stok: 0,
                        harga: 3500000,
                        isFavorite: false,
                        deskripsi: 'Kucing Angora putih mulus dengan mata biru yang indah. Sangat jinak dan suka dimanja oleh pemiliknya.',
                        photo: 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=400&h=300&fit=crop'
                    },
                    {
                        id: 11,
                        nama: 'Rex',
                        category: 'Anjing',
                        gender: 'jantan',
                        asal: 'impor',
                        umur: 14,
                        stok: 1,
                        harga: 6000000,
                        isFavorite: true,
                        deskripsi: 'Labrador Retriever berbulu hitam yang ramah dan setia. Terlatih basic obedience dan sangat mudah diajak bermain.',
                        photo: 'https://images.unsplash.com/photo-1611003228941-98852ba62227?w=400&h=300&fit=crop'
                    },
                    {
                        id: 12,
                        nama: 'Putih',
                        category: 'Kelinci',
                        gender: 'jantan',
                        asal: 'hasil_breeding',
                        umur: 2,
                        stok: 4,
                        harga: 280000,
                        isFavorite: false,
                        deskripsi: 'Kelinci rex putih mulus yang sangat lucu. Lincah dan suka bermain, cocok sebagai hewan pertama anak-anak.',
                        photo: 'https://images.unsplash.com/photo-1606425271394-c3ca9aa1fc06?w=400&h=300&fit=crop'
                    },
                    {
                        id: 13,
                        nama: 'Oliver',
                        category: 'Kucing',
                        gender: 'jantan',
                        asal: 'lokal',
                        umur: 7,
                        stok: 2,
                        harga: 1800000,
                        isFavorite: false,
                        deskripsi: 'Kucing Maine Coon jantan dengan tubuh besar dan bulu tebal. Kepribadiannya layaknya anjing — setia dan suka bermain.',
                        photo: 'https://images.unsplash.com/photo-1555685812-4b943f1cb0eb?w=400&h=300&fit=crop'
                    },
                    {
                        id: 14,
                        nama: 'Toto',
                        category: 'Burung',
                        gender: 'jantan',
                        asal: 'rescue',
                        umur: 36,
                        stok: 1,
                        harga: 2200000,
                        isFavorite: false,
                        deskripsi: 'Kakatua jambul kuning hasil rescue. Sudah pandai berbicara dan sangat interaktif dengan manusia di sekitarnya.',
                        photo: 'https://images.unsplash.com/photo-1520861680038-76fc6d0f7866?w=400&h=300&fit=crop'
                    },
                    {
                        id: 15,
                        nama: 'Pepper',
                        category: 'Anjing',
                        gender: 'betina',
                        asal: 'hasil_breeding',
                        umur: 6,
                        stok: 3,
                        harga: 3200000,
                        isFavorite: false,
                        deskripsi: 'Pomeranian betina mini dengan bulu oranye kecoklatan. Sangat aktif, lucu, dan suka berfoto!',
                        photo: 'https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=400&h=300&fit=crop'
                    },
                    {
                        id: 16,
                        nama: 'Komodo Jr',
                        category: 'Reptil',
                        gender: 'jantan',
                        asal: 'lokal',
                        umur: 18,
                        stok: 1,
                        harga: 950000,
                        isFavorite: false,
                        deskripsi: 'Biawak lokal yang sudah jinak dan dirawat dengan baik. Cocok untuk kolektor reptil pemula yang bertanggung jawab.',
                        photo: 'https://images.unsplash.com/photo-1616832880334-b1004d9808da?w=400&h=300&fit=crop'
                    },
                    {
                        id: 17,
                        nama: 'Nemo',
                        category: 'Kucing',
                        gender: 'jantan',
                        asal: 'titipan',
                        umur: 9,
                        stok: 1,
                        harga: 1200000,
                        isFavorite: false,
                        deskripsi: 'Kucing kampung super gemoy dengan pola bulu oranye dan putih. Jinak, sehat, dan sudah vaksin lengkap.',
                        photo: 'https://images.unsplash.com/photo-1518791841217-8f162f1912da?w=400&h=300&fit=crop'
                    },
                    {
                        id: 18,
                        nama: 'Buddy',
                        category: 'Anjing',
                        gender: 'jantan',
                        asal: 'impor',
                        umur: 20,
                        stok: 1,
                        harga: 5500000,
                        isFavorite: false,
                        deskripsi: 'Dalmatian jantan dengan bintik khas yang elegan. Aktif, cerdas, dan mudah dilatih berbagai trik.',
                        photo: 'https://images.unsplash.com/photo-1615748706591-8ed4fc77e0c2?w=400&h=300&fit=crop'
                    },
                    {
                        id: 19,
                        nama: 'Cici',
                        category: 'Kelinci',
                        gender: 'betina',
                        asal: 'lokal',
                        umur: 4,
                        stok: 6,
                        harga: 320000,
                        isFavorite: false,
                        deskripsi: 'Kelinci Holland Lop betina yang menggemaskan. Sangat jinak dan menyukai perhatian dari manusia.',
                        photo: 'https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?w=400&h=300&fit=crop'
                    },
                    {
                        id: 20,
                        nama: 'Cheeto',
                        category: 'Burung',
                        gender: 'jantan',
                        asal: 'hasil_breeding',
                        umur: 15,
                        stok: 2,
                        harga: 1500000,
                        isFavorite: false,
                        deskripsi: 'Betet hijau yang pandai menirukan suara. Sangat jinak dan suka bermain di luar kandang.',
                        photo: 'https://images.unsplash.com/photo-1544985361-b420d7a77043?w=400&h=300&fit=crop'
                    },
                    {
                        id: 21,
                        nama: 'Daisy',
                        category: 'Anjing',
                        gender: 'betina',
                        asal: 'lokal',
                        umur: 11,
                        stok: 2,
                        harga: 2800000,
                        isFavorite: true,
                        deskripsi: 'Beagle betina yang menggemaskan dengan telinga panjang. Hidung yang tajam membuatnya selalu ingin menjelajah.',
                        photo: 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=400&h=300&fit=crop'
                    },
                    {
                        id: 22,
                        nama: 'Tiger',
                        category: 'Kucing',
                        gender: 'jantan',
                        asal: 'rescue',
                        umur: 15,
                        stok: 1,
                        harga: 0,
                        isFavorite: false,
                        deskripsi: 'Kucing liar hasil penyelamatan yang kini sudah jinak. Bisa diadopsi secara gratis dengan persyaratan tertentu.',
                        photo: 'https://images.unsplash.com/photo-1572470021416-f8eed6ea92b0?w=400&h=300&fit=crop'
                    },
                    {
                        id: 23,
                        nama: 'Pepe',
                        category: 'Reptil',
                        gender: 'betina',
                        asal: 'impor',
                        umur: 6,
                        stok: 2,
                        harga: 750000,
                        isFavorite: false,
                        deskripsi: 'Kura-kura sulcata impor yang lucu. Pertumbuhannya lambat namun bisa menjadi sahabat selama puluhan tahun.',
                        photo: 'https://images.unsplash.com/photo-1559700728-d8e8b860d7e4?w=400&h=300&fit=crop'
                    },
                    {
                        id: 24,
                        nama: 'Brownie',
                        category: 'Anjing',
                        gender: 'jantan',
                        asal: 'lokal',
                        umur: 5,
                        stok: 3,
                        harga: 1800000,
                        isFavorite: false,
                        deskripsi: 'Cocker Spaniel jantan berwarna cokelat karamel yang imut. Aktif namun tidak agresif, ramah pada anak-anak.',
                        photo: 'https://images.unsplash.com/photo-1508890758574-35e5bd5f9e05?w=400&h=300&fit=crop'
                    },
                ],

                filteredAnimals: [],

                // ---- Image Modal Methods ----
                openImage(animal) {
                    this.activeImageSrc = animal.photo;
                    this.activeImageName = animal.nama;
                    this.activeImageCategory = animal.category;
                    this.imageModalOpen = true;
                },

                // ---- Filter Methods ----
                filterAnimals() {
                    this.currentPage = 1;
                    this.filteredAnimals = this.allAnimals.filter(a => {
                        const matchSearch = !this.search || a.nama.toLowerCase().includes(this
                            .search.toLowerCase()) || a.deskripsi.toLowerCase().includes(
                            this.search.toLowerCase());
                        const matchKategori = !this.filterKategori || a.category === this
                            .filterKategori;
                        const matchGender = !this.filterGender || a.gender === this
                            .filterGender;
                        const matchAsal = !this.filterAsal || a.asal === this.filterAsal;
                        return matchSearch && matchKategori && matchGender && matchAsal;
                    });
                },

                resetFilters() {
                    this.search = '';
                    this.filterKategori = '';
                    this.filterGender = '';
                    this.filterAsal = '';
                    this.filterAnimals();
                },

                // ---- Pagination Getters ----
                get totalPages() {
                    return Math.max(1, Math.ceil(this.filteredAnimals.length / this.perPage));
                },

                get paginatedAnimals() {
                    const start = (this.currentPage - 1) * this.perPage;
                    return this.filteredAnimals.slice(start, start + this.perPage);
                },

                get pageStart() {
                    if (this.filteredAnimals.length === 0) return 0;
                    return (this.currentPage - 1) * this.perPage + 1;
                },

                get pageEnd() {
                    return Math.min(this.currentPage * this.perPage, this.filteredAnimals.length);
                },

                get pageNumbers() {
                    const total = this.totalPages;
                    const current = this.currentPage;
                    const delta = 1;
                    const pages = [];
                    const range = [];

                    range.push(1);
                    for (let i = Math.max(2, current - delta); i <= Math.min(total - 1, current +
                            delta); i++) {
                        range.push(i);
                    }
                    if (total > 1) range.push(total);

                    let prev = null;
                    for (const p of range) {
                        if (prev !== null && p - prev > 1) pages.push('...');
                        pages.push(p);
                        prev = p;
                    }
                    return pages;
                },

                prevPage() {
                    if (this.currentPage > 1) {
                        this.currentPage--;
                        this.scrollToTop();
                    }
                },
                nextPage() {
                    if (this.currentPage < this.totalPages) {
                        this.currentPage++;
                        this.scrollToTop();
                    }
                },
                goToPage(p) {
                    if (p !== '...') {
                        this.currentPage = p;
                        this.scrollToTop();
                    }
                },

                scrollToTop() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                },

                // ---- Init ----
                init() {
                    this.filteredAnimals = [...this.allAnimals];
                }
            }));
        });
    </script>

</body>

</html>
