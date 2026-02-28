<x-admin-template>
    <x-slot:title>Detail Produk - Royal Canin</x-slot>
    <x-slot:headerTitle>Detail Produk</x-slot>

    @php
        // Dummy Product Detail
        $Produk = (object) [
            'id' => '01J6XXXXX1',
            'nama' => 'Royal Canin Kitten',
            'category' => (object) ['nama' => 'Makanan'],
            'kategori_id' => 1,
            'deskripsi' =>
                'Makanan kering kucing khusus untuk anakan kucing usia 1-4 bulan menyehatkan tanpa pengawet dan kaya nutrisi. Mengandung vitamin E dan C yang sangat berguna menunjang antibodi anak kucing.',
            'harga' => 85000,
            'stok' => 25,
            'photo' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?auto=format&fit=crop&q=80&w=500',
            'merek' => 'Royal Canin',
            'tanggal_kadaluarsa' => '2027-04-12',
            'berat' => 0.4,
            'isFavorite' => true,
            'fotoProduk' => [
                (object) [
                    'id' => 1,
                    'path_foto' =>
                        'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?auto=format&fit=crop&q=80&w=500',
                ],
                (object) [
                    'id' => 2,
                    'path_foto' =>
                        'https://images.unsplash.com/photo-1574158622682-e40e69881006?auto=format&fit=crop&q=80&w=500',
                ],
            ],
        ];
    @endphp

    <div x-data="{}">

        <!-- Page Header & Breadcrumb -->
        <div class="mb-8" data-aos="fade-down">
            <!-- Breadcrumb -->
            <nav class="flex text-sm text-muted font-medium mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin') }}"
                            class="hover:text-primary transition-colors flex items-center gap-1 cursor-pointer">
                            <i class="ph ph-house"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="ph ph-caret-right text-xs"></i>
                            <a href="{{ route('admin.product') }}"
                                class="ml-1 md:ml-2 hover:text-primary transition-colors cursor-pointer">
                                Produk
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="ph ph-caret-right text-xs"></i>
                            <span class="ml-1 md:ml-2 text-slate-800">Detail Info</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Title & Back Button -->
            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                <a href="{{ route('admin.product') }}"
                    class="group flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 rounded-lg text-slate-600 hover:text-primary hover:border-primary hover:shadow-md transition-all duration-300 w-fit cursor-pointer">
                    <i class="ph ph-arrow-left text-lg transition-transform group-hover:-translate-x-1"></i>
                    <span class="font-semibold text-sm">Kembali</span>
                </a>
                <div class="h-8 w-px bg-slate-200 hidden sm:block mx-1"></div>
                <h2 class="text-3xl font-extrabold text-dark tracking-tight">Detail Informasi Produk</h2>
            </div>
        </div>

        <!-- Detail section for: {{ $Produk->nama }} -->

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <!-- Left Column: Media (Photos) -->
            <div class="lg:col-span-5 space-y-4" data-aos="fade-right">
                <!-- Main Photo -->
                <div class="bg-white p-2 rounded-xl shadow-sm border border-slate-100 relative group overflow-hidden">
                    @if ($Produk->isFavorite)
                        <div
                            class="absolute top-4 right-4 z-10 bg-white/90 backdrop-blur text-red-500 w-10 h-10 flex items-center justify-center rounded-full shadow-md">
                            <i class="ph-fill ph-heart text-xl animate-pulse"></i>
                        </div>
                    @endif
                    <div class="aspect-square rounded-lg overflow-hidden cursor-pointer"
                        @click="$dispatch('open-global-image', { src: '{{ $Produk->photo }}' })">
                        <img src="{{ $Produk->photo }}" alt="{{ $Produk->nama }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-black/opacity-0 group-hover:bg-black/10 transition-colors flex items-center justify-center">
                            <div
                                class="bg-white/80 backdrop-blur-sm text-dark px-3 py-1.5 rounded-full text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity transform translate-y-4 group-hover:translate-y-0 gap-2 flex items-center shadow-lg">
                                <i class="ph ph-arrows-out"></i> Perbesar
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Photos -->
                @if ($Produk->fotoProduk && count($Produk->fotoProduk) > 0)
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100">
                        <h3 class="text-sm font-bold text-dark mb-3">Galeri Foto Lainnya</h3>
                        <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-3 gap-2">
                            @foreach ($Produk->fotoProduk as $img)
                                <div class="aspect-square rounded-md overflow-hidden border border-slate-200 cursor-pointer relative group"
                                    @click="$dispatch('open-global-image', { src: '{{ $img->path_foto }}' })">
                                    <img src="{{ $img->path_foto }}"
                                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                                    <div
                                        class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <i class="ph ph-magnifying-glass-plus text-white text-xl"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column: Info Details -->
            <div class="lg:col-span-7 space-y-6" data-aos="fade-left" data-aos-delay="100">

                <!-- Main Info Card -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden relative">
                    <!-- Color strip at top -->
                    <div class="h-1.5 w-full bg-gradient-to-r from-primary to-emerald-400"></div>

                    <div class="p-6 sm:p-8">
                        <!-- Badges row -->
                        <div class="flex flex-wrap items-center gap-2 mb-4">
                            <span
                                class="px-3 py-1 bg-primary/10 text-primary border border-primary/20 rounded-full text-xs font-semibold tracking-wide flex items-center gap-1.5">
                                <i class="ph-fill ph-tag"></i> {{ $Produk->category->nama ?? '-' }}
                            </span>
                            <span
                                class="px-3 py-1 bg-blue-50 text-blue-600 border border-blue-100 rounded-full text-xs font-semibold tracking-wide flex items-center gap-1.5">
                                <i class="ph-bold ph-trademark font-bold"></i> {{ $Produk->merek }}
                            </span>
                            @if ($Produk->isFavorite)
                                <span
                                    class="px-3 py-1 bg-red-50 text-red-600 border border-red-100 rounded-full text-xs font-semibold tracking-wide flex items-center gap-1.5 capitalize">
                                    <i class="ph-fill ph-heart"></i> Favorit
                                </span>
                            @endif
                        </div>

                        <!-- Title & Price -->
                        <div class="mb-6 pb-6 border-b border-slate-100">
                            <h1 class="text-3xl sm:text-4xl font-bold text-dark mb-2 leading-tight">{{ $Produk->nama }}
                            </h1>
                            <div class="text-3xl font-bold text-emerald-600 mb-2">Rp
                                {{ number_format($Produk->harga, 0, ',', '.') }}</div>
                            <p class="text-sm text-slate-500 flex items-center gap-1"><i
                                    class="ph-fill ph-check-circle text-emerald-500"></i> Harga sudah termasuk pajak &
                                dokumen relevan</p>
                        </div>

                        <!-- Specs Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
                            <!-- Kategori -->
                            <div
                                class="bg-slate-50 rounded-lg p-3 text-center border border-slate-100 hover:border-slate-200 transition-colors">
                                <div
                                    class="w-10 h-10 mx-auto bg-white rounded-full flex items-center justify-center text-primary mb-2 shadow-sm border border-slate-100 relative group-hover:scale-110 transition">
                                    <i class="ph ph-tag text-xl"></i>
                                </div>
                                <p class="text-xs text-muted font-medium mb-0.5">Kategori</p>
                                <p class="font-bold text-dark">{{ $Produk->category->nama ?? '-' }}</p>
                            </div>
                            <!-- Berat -->
                            <div
                                class="bg-slate-50 rounded-lg p-3 text-center border border-slate-100 hover:border-slate-200 transition-colors">
                                <div
                                    class="w-10 h-10 mx-auto bg-white rounded-full flex items-center justify-center text-secondary mb-2 shadow-sm border border-slate-100">
                                    <i class="ph ph-scales text-xl"></i>
                                </div>
                                <p class="text-xs text-muted font-medium mb-0.5">Berat</p>
                                <p class="font-bold text-dark">{{ $Produk->berat }} Kg</p>
                            </div>
                            <!-- Stok -->
                            <div
                                class="bg-slate-50 rounded-lg p-3 text-center border border-slate-100 hover:border-slate-200 transition-colors">
                                <div
                                    class="w-10 h-10 mx-auto bg-white rounded-full flex items-center justify-center text-blue-500 mb-2 shadow-sm border border-slate-100">
                                    <i class="ph ph-archive-box text-xl"></i>
                                </div>
                                <p class="text-xs text-muted font-medium mb-0.5">Stok</p>
                                <p class="font-bold text-dark">{{ $Produk->stok }} Qty</p>
                            </div>
                            <!-- Tanggal Kadaluarsa -->
                            <div
                                class="bg-slate-50 rounded-lg p-3 text-center border border-slate-100 hover:border-slate-200 transition-colors">
                                <div
                                    class="w-10 h-10 mx-auto bg-white rounded-full flex items-center justify-center text-indigo-500 mb-2 shadow-sm border border-slate-100">
                                    <i class="ph ph-calendar-x text-xl"></i>
                                </div>
                                <p class="text-xs text-muted font-medium mb-0.5">Kadaluarsa</p>
                                <p class="font-bold text-dark">
                                    {{ $Produk->tanggal_kadaluarsa ? \Carbon\Carbon::parse($Produk->tanggal_kadaluarsa)->format('d M Y') : '-' }}
                                </p>
                            </div>
                        </div>

                        <!-- Full Description -->
                        <div>
                            <h3 class="text-lg font-bold text-dark mb-3 flex items-center gap-2">
                                <i class="ph-fill ph-article text-primary"></i>
                                Deskripsi Produk
                            </h3>
                            <div class="prose prose-sm sm:prose-base prose-slate max-w-none text-muted leading-relaxed">
                                {!! nl2br(e($Produk->deskripsi)) !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- (Local image modal removed) -->

    </div>
</x-admin-template>
