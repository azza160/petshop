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
        <div class="relative bg-slate-50 overflow-hidden py-10">
            <!-- Background Decorative Elements -->
            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                <div class="absolute -top-32 -right-32 w-96 h-96 bg-primary/10 rounded-full blur-3xl opacity-50"></div>
                <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-secondary/10 rounded-full blur-3xl opacity-50">
                </div>
            </div>

            <div class="px-4 xl:max-w-[1300px] mx-auto w-full relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

                    <!-- Left Column: Gallery (Photo grid similar to Admin view, adapted for landing) -->
                    <div class="lg:col-span-5 space-y-4" data-aos="fade-right">
                        <!-- Main Photo -->
                        <div
                            class="bg-white p-3 rounded-2xl shadow-sm border border-slate-200 relative group overflow-hidden">
                            @if ($hewan->isFavorite)
                                <div class="absolute top-6 left-6 z-10">
                                    <span
                                        class="text-xs font-bold bg-secondary text-white px-2.5 py-1.5 rounded shadow-md flex items-center gap-1">
                                        <i class="ph ph-star-fill text-sm"></i> Top Pilihan
                                    </span>
                                </div>
                            @endif
                            <!-- Stock Badge relative to image bounds -->
                            <div class="absolute top-6 right-6 z-10">
                                @if ($hewan->stok > 0)
                                    <span
                                        class="text-xs font-bold bg-emerald-500 text-white px-2.5 py-1.5 rounded-full shadow-md">Tersedia</span>
                                @else
                                    <span
                                        class="text-xs font-bold bg-red-500 text-white px-2.5 py-1.5 rounded-full shadow-md">Habis</span>
                                @endif
                            </div>

                            <div class="aspect-square rounded-xl overflow-hidden cursor-pointer relative"
                                @click="openImage('{{ $hewan->photo }}')">
                                <img src="{{ $hewan->photo }}" alt="{{ $hewan->nama }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <div
                                        class="bg-white/90 backdrop-blur-sm text-dark px-4 py-2 rounded-full text-sm font-bold shadow-xl transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 flex items-center gap-2">
                                        <i class="ph ph-arrows-out text-lg"></i> Perbesar
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Photos Row -->
                        @if ($hewan->fotoHewan && count($hewan->fotoHewan) > 0)
                            <div class="grid grid-cols-4 gap-3">
                                @foreach ($hewan->fotoHewan as $img)
                                    <div class="aspect-square bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden cursor-pointer relative group p-1.5"
                                        @click="openImage('{{ $img->path_foto }}')">
                                        <div class="w-full h-full rounded-lg overflow-hidden relative">
                                            <img src="{{ $img->path_foto }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                            <div
                                                class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center mix-blend-multiply">
                                            </div>
                                            <div
                                                class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white">
                                                <i class="ph ph-magnifying-glass-plus text-2xl drop-shadow-md"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Right Column: Information -->
                    <div class="lg:col-span-7 flex flex-col h-full" data-aos="fade-left" data-aos-delay="100">

                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8 relative flex-1">
                            <!-- Header Info -->
                            <div class="flex flex-wrap items-center gap-2 mb-4">
                                <span
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-primary bg-primary/10 border border-primary/20 px-3 py-1 rounded-full uppercase tracking-wider">
                                    <i class="ph-fill ph-tag"></i> {{ $hewan->category->nama ?? '-' }}
                                </span>

                                @if ($hewan->jenis_kelamin === 'jantan')
                                    <span
                                        class="px-3 py-1 bg-blue-50 text-blue-600 border border-blue-100 rounded-full text-xs font-semibold uppercase tracking-wider flex items-center gap-1.5">
                                        <i class="ph-bold ph-gender-male"></i> Jantan
                                    </span>
                                @elseif($hewan->jenis_kelamin === 'betina')
                                    <span
                                        class="px-3 py-1 bg-pink-50 text-pink-600 border border-pink-100 rounded-full text-xs font-semibold uppercase tracking-wider flex items-center gap-1.5">
                                        <i class="ph-bold ph-gender-female"></i> Betina
                                    </span>
                                @endif

                                <span
                                    class="px-3 py-1 bg-slate-100 text-slate-600 border border-slate-200 rounded-full text-xs font-semibold uppercase tracking-wider flex items-center gap-1.5">
                                    <i class="ph-fill ph-map-pin"></i>
                                    {{ str_replace('_', ' ', $hewan->asal_hewan) ?? '-' }}
                                </span>
                            </div>

                            <!-- Title & Price -->
                            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-dark mb-3 leading-tight">
                                {{ $hewan->nama }}
                            </h1>
                            <div class="flex items-end gap-3 mb-6 pb-6 border-b border-slate-100">
                                <span
                                    class="text-sm text-muted font-semibold uppercase tracking-wider mb-1">Harga</span>
                                <span class="text-3xl sm:text-4xl font-bold text-secondary">Rp
                                    {{ number_format($hewan->harga, 0, ',', '.') }}</span>
                            </div>

                            <!-- Key Specifications Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
                                <!-- Umur -->
                                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                                    <div
                                        class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-primary mb-3 shadow-sm border border-slate-100">
                                        <i class="ph ph-calendar-blank text-xl"></i>
                                    </div>
                                    <p class="text-[11px] uppercase tracking-wider text-muted font-bold mb-0.5">Umur
                                    </p>
                                    <p class="font-bold text-dark text-base">{{ $hewan->umur }} Bulan</p>
                                </div>
                                <!-- Berat -->
                                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                                    <div
                                        class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-amber-500 mb-3 shadow-sm border border-slate-100">
                                        <i class="ph ph-scales text-xl"></i>
                                    </div>
                                    <p class="text-[11px] uppercase tracking-wider text-muted font-bold mb-0.5">Berat
                                    </p>
                                    <p class="font-bold text-dark text-base">{{ $hewan->berat }} Kg</p>
                                </div>
                                <!-- Steril -->
                                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                                    <div
                                        class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-indigo-500 mb-3 shadow-sm border border-slate-100">
                                        <i class="ph ph-scissors text-xl"></i>
                                    </div>
                                    <p class="text-[11px] uppercase tracking-wider text-muted font-bold mb-0.5">Steril
                                    </p>
                                    <p class="font-bold text-dark text-base">
                                        {{ $hewan->sudah_steril ? 'Sudah' : 'Belum' }}</p>
                                </div>
                                <!-- Kondisi -->
                                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                                    <div
                                        class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-emerald-500 mb-3 shadow-sm border border-slate-100">
                                        <i class="ph ph-heartbeat text-xl"></i>
                                    </div>
                                    <p class="text-[11px] uppercase tracking-wider text-muted font-bold mb-0.5">Kondisi
                                    </p>
                                    <p class="font-bold text-dark text-base">Sehat</p>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-8 flex-1">
                                <h3 class="text-lg font-bold text-dark mb-3 flex items-center gap-2">
                                    <i class="ph-fill ph-article text-primary"></i>
                                    Deskripsi Singkat
                                </h3>
                                <div
                                    class="prose prose-sm sm:prose-base prose-slate max-w-none text-muted leading-relaxed">
                                    {!! nl2br(e($hewan->deskripsi)) !!}
                                </div>
                            </div>

                            <!-- Action Area CTA -->
                            <div class="pt-6 border-t border-slate-100 mt-auto">
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo, saya tertarik dengan hewan ' . $hewan->nama . '. Bisakah saya mendapat informasi lebih lanjut mengenai ketersediaan dan proses adopsinya?') }}"
                                        target="_blank"
                                        class="flex-1 px-8 py-4 bg-primary text-white font-bold rounded-xl hover:bg-emerald-600 transition-all duration-300 shadow-lg shadow-primary/30 flex items-center justify-center gap-2 group transform hover:-translate-y-1">
                                        <i
                                            class="ph-fill ph-whatsapp-logo text-2xl group-hover:scale-110 transition-transform"></i>
                                        <span>Tanya Kami Sekarang</span>
                                    </a>
                                </div>
                                <p
                                    class="text-center text-xs text-muted mt-4 flex justify-center items-center gap-1.5">
                                    <i class="ph-fill ph-shield-check text-emerald-500 text-sm"></i>
                                    Kami menjamin kesehatan dan kualitas hewan peliharaan.
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
