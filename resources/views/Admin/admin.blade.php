<x-admin-template>
    <x-slot:title>Dashboard</x-slot>
    <x-slot:headerTitle>Overview</x-slot>

    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-primary to-emerald-500 rounded-2xl p-6 sm:p-8 text-white shadow-lg shadow-primary/20 mb-8 relative overflow-hidden"
        data-aos="fade-up">
        <!-- Decorative Shapes -->
        <div class="absolute top-[-20%] right-[-5%] w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-[-10%] right-[15%] w-32 h-32 bg-secondary/20 rounded-full blur-xl"></div>

        <div class="relative z-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
            <div>
                <h3 class="text-2xl sm:text-3xl font-bold mb-2">Selamat Datang, Admin! 👋</h3>
                <p class="text-emerald-50 max-w-xl">Ini adalah dashboard manajemen utama Petshop. Pantau aktivitas toko,
                    kelola data hewan peliharaan, dan produk dengan mudah.</p>
            </div>
            <div class="hidden md:block">
                <div
                    class="w-24 h-24 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/30 rotate-3 shadow-xl">
                    <span class="text-5xl">🐾</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <!-- Stat Card 1 -->
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group relative overflow-hidden"
            data-aos="fade-up" data-aos-delay="100">
            <div
                class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0">
            </div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-muted mb-1 uppercase tracking-wider">Total Hewan</p>
                    <h4 class="text-3xl font-bold text-dark">124</h4>
                </div>
                <div
                    class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-2xl shadow-sm">
                    <i class="ph ph-paw-print"></i>
                </div>
            </div>
            <div class="relative z-10 mt-4 flex items-center gap-2 text-sm">
                <span class="flex items-center gap-1 text-emerald-500 font-medium">
                    <i class="ph ph-trend-up"></i> +12%
                </span>
                <span class="text-muted">dari bulan lalu</span>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group relative overflow-hidden"
            data-aos="fade-up" data-aos-delay="200">
            <div
                class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0">
            </div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-muted mb-1 uppercase tracking-wider">Total Produk</p>
                    <h4 class="text-3xl font-bold text-dark">845</h4>
                </div>
                <div
                    class="w-12 h-12 rounded-xl bg-emerald-100 text-primary flex items-center justify-center text-2xl shadow-sm">
                    <i class="ph ph-package"></i>
                </div>
            </div>
            <div class="relative z-10 mt-4 flex items-center gap-2 text-sm">
                <span class="flex items-center gap-1 text-emerald-500 font-medium">
                    <i class="ph ph-trend-up"></i> +5%
                </span>
                <span class="text-muted">dari bulan lalu</span>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group relative overflow-hidden"
            data-aos="fade-up" data-aos-delay="300">
            <div
                class="absolute -right-6 -top-6 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0">
            </div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-muted mb-1 uppercase tracking-wider">Kategori</p>
                    <h4 class="text-3xl font-bold text-dark">12</h4>
                </div>
                <div
                    class="w-12 h-12 rounded-xl bg-amber-100 text-secondary flex items-center justify-center text-2xl shadow-sm">
                    <i class="ph ph-folders"></i>
                </div>
            </div>
            <div class="relative z-10 mt-4 flex items-center gap-2 text-sm">
                <span class="text-muted">Total kategori aktif</span>
            </div>
        </div>

        <!-- Stat Card 4 -->
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-shadow group relative overflow-hidden"
            data-aos="fade-up" data-aos-delay="400">
            <div
                class="absolute -right-6 -top-6 w-24 h-24 bg-purple-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out z-0">
            </div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-muted mb-1 uppercase tracking-wider">Total User</p>
                    <h4 class="text-3xl font-bold text-dark">2,450</h4>
                </div>
                <div
                    class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl shadow-sm">
                    <i class="ph ph-users"></i>
                </div>
            </div>
            <div class="relative z-10 mt-4 flex items-center gap-2 text-sm">
                <span class="flex items-center gap-1 text-emerald-500 font-medium">
                    <i class="ph ph-trend-up"></i> +18%
                </span>
                <span class="text-muted">dari bulan lalu</span>
            </div>
        </div>
    </div>

    <!-- Main Content Area / Tables -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden" data-aos="fade-up"
        data-aos-delay="200">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
            <h3 class="text-xl font-bold text-dark">Hewan Terbaru Ditambahkan</h3>
            <button
                class="px-4 py-2 bg-primary text-white text-sm font-semibold rounded-lg hover:bg-emerald-600 transition flex items-center gap-2 shadow-sm">
                <i class="ph ph-plus-circle text-lg"></i>
                Tambah Hewan
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 text-muted text-sm uppercase tracking-wider">
                        <th class="p-4 font-semibold border-b border-slate-100">Nama Hewan</th>
                        <th class="p-4 font-semibold border-b border-slate-100">Kategori</th>
                        <th class="p-4 font-semibold border-b border-slate-100">Harga</th>
                        <th class="p-4 font-semibold border-b border-slate-100">Status</th>
                        <th class="p-4 font-semibold border-b border-slate-100 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-100 text-slate-700">
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center text-xl shrink-0">
                                    🐱</div>
                                <div>
                                    <p class="font-semibold text-dark">Kucing Persia Hidung Datar</p>
                                    <p class="text-xs text-muted">Ages 2 months</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-amber-100 text-amber-700 rounded-md text-xs font-semibold">Kucing</span>
                        </td>
                        <td class="p-4 font-semibold text-dark">Rp 3.500.000</td>
                        <td class="p-4">
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-md text-xs font-semibold border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Tersedia
                            </span>
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-2 text-xl">
                                <button
                                    class="p-1.5 text-muted hover:text-blue-500 hover:bg-blue-50 rounded transition"><i
                                        class="ph ph-pencil-simple"></i></button>
                                <button
                                    class="p-1.5 text-muted hover:text-red-500 hover:bg-red-50 rounded transition"><i
                                        class="ph ph-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-xl shrink-0">
                                    🐶</div>
                                <div>
                                    <p class="font-semibold text-dark">Golden Retriever Puppy</p>
                                    <p class="text-xs text-muted">Ages 3 months</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-semibold">Anjing</span>
                        </td>
                        <td class="p-4 font-semibold text-dark">Rp 5.000.000</td>
                        <td class="p-4">
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-md text-xs font-semibold border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Tersedia
                            </span>
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-2 text-xl">
                                <button
                                    class="p-1.5 text-muted hover:text-blue-500 hover:bg-blue-50 rounded transition"><i
                                        class="ph ph-pencil-simple"></i></button>
                                <button
                                    class="p-1.5 text-muted hover:text-red-500 hover:bg-red-50 rounded transition"><i
                                        class="ph ph-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-xl shrink-0">
                                    🐰</div>
                                <div>
                                    <p class="font-semibold text-dark">Kelinci Anggora Putih</p>
                                    <p class="text-xs text-muted">Ages 1 month</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-semibold">Kelinci</span>
                        </td>
                        <td class="p-4 font-semibold text-dark">Rp 350.000</td>
                        <td class="p-4">
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-amber-50 text-amber-600 rounded-md text-xs font-semibold border border-amber-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Terjual
                            </span>
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-2 text-xl">
                                <button
                                    class="p-1.5 text-muted hover:text-blue-500 hover:bg-blue-50 rounded transition"><i
                                        class="ph ph-pencil-simple"></i></button>
                                <button
                                    class="p-1.5 text-muted hover:text-red-500 hover:bg-red-50 rounded transition"><i
                                        class="ph ph-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-100 bg-slate-50/30 text-center">
            <a href="#" class="text-sm font-semibold text-primary hover:text-emerald-700 transition">Lihat Semua
                Data Hewan &rarr;</a>
        </div>
    </div>

</x-admin-template>
