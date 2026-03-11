<x-admin-template>
    <x-slot:title>Dashboard</x-slot>
    <x-slot:headerTitle>Main Dashboard</x-slot>

    <div class="flex flex-col min-h-[calc(100vh-200px)]">
        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-primary to-emerald-500 rounded-2xl p-6 sm:p-8 text-white shadow-lg shadow-primary/20 mb-8 relative overflow-hidden shrink-0"
            data-aos="fade-up">
            <!-- Decorative Shapes -->
            <div class="absolute top-[-20%] right-[-5%] w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute bottom-[-10%] right-[15%] w-32 h-32 bg-secondary/20 rounded-full blur-xl"></div>

            <div class="relative z-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                <div>
                    <h3 class="text-2xl sm:text-3xl font-bold mb-2 text-slate-100">Selamat Datang, Admin! 👋</h3>
                    <p class="text-emerald-50 max-w-xl">Ini adalah dashboard manajemen utama Petshop. Pantau aktivitas
                        toko,
                        kelola data hewan peliharaan, dan produk dengan mudah.</p>
                </div>
                <div class="hidden md:block">
                    <div
                        class="w-24 h-24 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/30 rotate-3 shadow-xl">
                        <span class="text-5xl ">🐾</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 shrink-0">

            <!-- Stat Card 1: Total Hewan -->
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group relative overflow-hidden flex flex-col"
                data-aos="fade-up" data-aos-delay="100">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0">
                </div>
                <div class="relative z-10 flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm font-semibold text-muted mb-1 uppercase tracking-wider">Total Hewan</p>
                        <h4 class="text-3xl font-bold text-dark">{{ $totalHewan }}</h4>
                    </div>
                    <div
                        class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-2xl shadow-sm shrink-0">
                        <i class="ph ph-paw-print"></i>
                    </div>
                </div>
                <div class="relative z-10 mt-auto pt-4 border-t border-slate-50 flex items-center justify-between">
                    <a href="{{ route('admin.hewan') }}"
                        class="text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors flex items-center gap-1 group-hover:gap-2">
                        Lihat Detail <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Stat Card 2: Total Produk -->
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group relative overflow-hidden flex flex-col"
                data-aos="fade-up" data-aos-delay="200">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0">
                </div>
                <div class="relative z-10 flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm font-semibold text-muted mb-1 uppercase tracking-wider">Total Produk</p>
                        <h4 class="text-3xl font-bold text-dark">{{ $totalProduct }}</h4>
                    </div>
                    <div
                        class="w-12 h-12 rounded-xl bg-emerald-100 text-primary flex items-center justify-center text-2xl shadow-sm shrink-0">
                        <i class="ph ph-package"></i>
                    </div>
                </div>
                <div class="relative z-10 mt-auto pt-4 border-t border-slate-50 flex items-center justify-between">
                    <a href="{{ route('admin.product') }}"
                        class="text-sm font-medium text-primary hover:text-emerald-700 transition-colors flex items-center gap-1 group-hover:gap-2">
                        Lihat Detail <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Stat Card 3: Kategori Hewan -->
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group relative overflow-hidden flex flex-col"
                data-aos="fade-up" data-aos-delay="300">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0">
                </div>
                <div class="relative z-10 flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm font-semibold text-muted mb-1 uppercase tracking-wider">Kategori Hewan</p>
                        <h4 class="text-3xl font-bold text-dark">{{ $totalKategoriHewan }}</h4>
                    </div>
                    <div
                        class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-2xl shadow-sm shrink-0">
                        <i class="ph ph-folders"></i>
                    </div>
                </div>
                <div class="relative z-10 mt-auto pt-4 border-t border-slate-50 flex items-center justify-between">
                    <a href="{{ route('admin.category', ['tipe' => 'hewan']) }}"
                        class="text-sm font-medium text-amber-600 hover:text-amber-700 transition-colors flex items-center gap-1 group-hover:gap-2">
                        Lihat Detail <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Stat Card 4: Kategori Produk -->
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group relative overflow-hidden flex flex-col"
                data-aos="fade-up" data-aos-delay="400">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-purple-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0">
                </div>
                <div class="relative z-10 flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm font-semibold text-muted mb-1 uppercase tracking-wider">Kategori Produk</p>
                        <h4 class="text-3xl font-bold text-dark">{{ $totalKategoriProduct }}</h4>
                    </div>
                    <div
                        class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl shadow-sm shrink-0">
                        <i class="ph ph-folder-star"></i>
                    </div>
                </div>
                <div class="relative z-10 mt-auto pt-4 border-t border-slate-50 flex items-center justify-between">
                    <a href="{{ route('admin.category', ['tipe' => 'produk']) }}"
                        class="text-sm font-medium text-purple-600 hover:text-purple-700 transition-colors flex items-center gap-1 group-hover:gap-2">
                        Lihat Detail <i class="ph ph-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Flex-grow spacer to push footer down -->
        <div class="flex-grow"></div>
    </div>
</x-admin-template>
