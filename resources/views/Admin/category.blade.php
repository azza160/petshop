<x-admin-template>
    <x-slot:title>Data Kategori</x-slot>
    <x-slot:headerTitle>Data Kategori</x-slot>

    <!-- Page Header & Breadcrumb -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-dark mb-1">Manajemen Kategori</h2>
            <nav class="flex text-sm text-muted font-medium" aria-label="Breadcrumb">
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
                            <span class="ml-1 md:ml-2 text-slate-800">Kategori</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div x-data="{
        search: '',
        filterType: 'semua',
        sortTime: 'terbaru',
    }">

        <!-- Toolbar -->
        <div class="bg-white rounded-md shadow-sm border border-slate-100 p-4 mb-6" data-aos="fade-up">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">

                <!-- Search & Filters -->
                <div class="flex flex-col sm:flex-row items-center gap-4 flex-1">
                    <!-- Search Input -->
                    <div class="relative w-full sm:w-72">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph ph-magnifying-glass text-muted"></i>
                        </div>
                        <input type="text" x-model="search" placeholder="Cari nama kategori..."
                            class="block w-full pl-10 pr-3 py-2 border border-slate-200 rounded-md leading-5 bg-slate-50 placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition duration-150 ease-in-out sm:text-sm">
                    </div>

                    <!-- Type Filter -->
                    <div class="w-full sm:w-auto relative">
                        <select x-model="filterType"
                            class="block w-full pl-3 pr-10 py-2 text-base border-slate-200 bg-slate-50 border rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm transition duration-150 ease-in-out appearance-none">
                            <option value="semua">Semua Tipe</option>
                            <option value="hewan">Hewan</option>
                            <option value="produk">Produk</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted">
                            <i class="ph ph-caret-down"></i>
                        </div>
                    </div>

                    <!-- Sort Filter -->
                    <div class="w-full sm:w-auto relative">
                        <select x-model="sortTime"
                            class="block w-full pl-3 pr-10 py-2 text-base border-slate-200 bg-slate-50 border rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm transition duration-150 ease-in-out appearance-none">
                            <option value="terbaru">Terbaru</option>
                            <option value="terlama">Terlama</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted">
                            <i class="ph ph-caret-down"></i>
                        </div>
                    </div>
                </div>

                <!-- Add Button -->
                <div class="flex-shrink-0 w-full lg:w-auto">
                    <button @click="$dispatch('open-modal-add')"
                        class="w-full lg:w-auto px-4 py-2 bg-primary text-white text-sm font-semibold rounded-md hover:bg-emerald-600 transition flex items-center justify-center gap-2 shadow-sm cursor-pointer">
                        <i class="ph ph-plus text-lg"></i>
                        Tambah Data
                    </button>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="bg-white rounded-md shadow-sm border border-slate-100 overflow-hidden mb-6" data-aos="fade-up"
            data-aos-delay="100">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-muted text-xs uppercase tracking-wider">
                            <th class="p-4 font-semibold w-16 text-center">No</th>
                            <th class="p-4 font-semibold">Nama Kategori</th>
                            <th class="p-4 font-semibold">Tipe</th>
                            <th class="p-4 font-semibold text-center w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-slate-100 text-slate-700">
                        <!-- Static Row 1 -->
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4 text-center text-muted font-medium">1</td>
                            <td class="p-4">
                                <span class="font-semibold text-dark">Kucing</span>
                            </td>
                            <td class="p-4">
                                <span
                                    class="px-2.5 py-1 bg-amber-50 text-amber-700 rounded-md text-xs font-semibold border border-amber-100">Hewan</span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2 text-lg">
                                    <button @click="$dispatch('open-modal-edit', { name: 'Kucing', type: 'hewan' })"
                                        class="p-1.5 text-blue-600 hover:text-white hover:bg-blue-600 rounded-md transition cursor-pointer"
                                        title="Edit">
                                        <i class="ph ph-pencil-simple"></i>
                                    </button>
                                    <button @click="$dispatch('open-modal-delete')"
                                        class="p-1.5 text-red-600 hover:text-white hover:bg-red-600 rounded-md transition cursor-pointer"
                                        title="Hapus">
                                        <i class="ph ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Static Row 2 -->
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4 text-center text-muted font-medium">2</td>
                            <td class="p-4">
                                <span class="font-semibold text-dark">Anjing</span>
                            </td>
                            <td class="p-4">
                                <span
                                    class="px-2.5 py-1 bg-amber-50 text-amber-700 rounded-md text-xs font-semibold border border-amber-100">Hewan</span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2 text-lg">
                                    <button @click="$dispatch('open-modal-edit', { name: 'Kucing', type: 'hewan' })"
                                        class="p-1.5 text-blue-600 hover:text-white hover:bg-blue-600 rounded-md transition cursor-pointer"
                                        title="Edit">
                                        <i class="ph ph-pencil-simple"></i>
                                    </button>
                                    <button @click="$dispatch('open-modal-delete')"
                                        class="p-1.5 text-red-600 hover:text-white hover:bg-red-600 rounded-md transition cursor-pointer"
                                        title="Hapus">
                                        <i class="ph ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Static Row 3 -->
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4 text-center text-muted font-medium">3</td>
                            <td class="p-4">
                                <span class="font-semibold text-dark">Makanan Kering</span>
                            </td>
                            <td class="p-4">
                                <span
                                    class="px-2.5 py-1 bg-primary/10 text-primary rounded-md text-xs font-semibold border border-primary/20">Produk</span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2 text-lg">
                                    <button @click="$dispatch('open-modal-edit', { name: 'Kucing', type: 'hewan' })"
                                        class="p-1.5 text-blue-600 hover:text-white hover:bg-blue-600 rounded-md transition cursor-pointer"
                                        title="Edit">
                                        <i class="ph ph-pencil-simple"></i>
                                    </button>
                                    <button @click="$dispatch('open-modal-delete')"
                                        class="p-1.5 text-red-600 hover:text-white hover:bg-red-600 rounded-md transition cursor-pointer"
                                        title="Hapus">
                                        <i class="ph ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Static Row 4 -->
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4 text-center text-muted font-medium">4</td>
                            <td class="p-4">
                                <span class="font-semibold text-dark">Vitamin & Obat</span>
                            </td>
                            <td class="p-4">
                                <span
                                    class="px-2.5 py-1 bg-primary/10 text-primary rounded-md text-xs font-semibold border border-primary/20">Produk</span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2 text-lg">
                                    <button @click="$dispatch('open-modal-edit', { name: 'Kucing', type: 'hewan' })"
                                        class="p-1.5 text-blue-600 hover:text-white hover:bg-blue-600 rounded-md transition cursor-pointer"
                                        title="Edit">
                                        <i class="ph ph-pencil-simple"></i>
                                    </button>
                                    <button @click="$dispatch('open-modal-delete')"
                                        class="p-1.5 text-red-600 hover:text-white hover:bg-red-600 rounded-md transition cursor-pointer"
                                        title="Hapus">
                                        <i class="ph ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div
                class="p-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4 bg-slate-50/50">
                <div class="text-sm text-muted text-center sm:text-left">
                    Menampilkan <span class="font-semibold text-dark">1</span> - <span
                        class="font-semibold text-dark">4</span> dari <span class="font-semibold text-dark">12</span>
                </div>
                <div class="flex items-center gap-1">
                    <button
                        class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-md text-sm text-muted hover:bg-white hover:text-dark transition disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer"
                        disabled>
                        <span class="hidden sm:inline">Sebelumnya</span>
                        <i class="ph ph-caret-left sm:hidden"></i>
                    </button>
                    <button
                        class="px-3 py-1.5 bg-primary text-white border border-primary rounded-md text-sm font-medium hover:bg-emerald-600 transition shadow-sm cursor-pointer">
                        1
                    </button>
                    <button
                        class="px-3 py-1.5 border border-slate-200 bg-white rounded-md text-sm text-dark hover:bg-slate-50 transition cursor-pointer">
                        2
                    </button>
                    <button
                        class="px-3 py-1.5 border border-slate-200 bg-white rounded-md text-sm text-dark hover:bg-slate-50 transition cursor-pointer">
                        3
                    </button>
                    <button
                        class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-md text-sm text-dark bg-white hover:bg-slate-50 transition cursor-pointer">
                        <span class="hidden sm:inline">Selanjutnya</span>
                        <i class="ph ph-caret-right sm:hidden"></i>
                    </button>
                </div>
            </div>
        </div>

        @push('modals')
            <!-- Add Data Modal -->
            <div x-data="{ open: false }" @open-modal-add.window="open = true" x-show="open"
                class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-0" x-cloak>
                <!-- Overlay -->
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm"
                    @click="open = false"></div>

                <!-- Modal Content -->
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative bg-white rounded-md shadow-xl sm:w-full sm:max-w-md overflow-hidden">

                    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                        <h3 class="text-lg font-bold text-dark">Tambah Kategori Baru</h3>
                        <button @click="open = false" class="text-muted hover:text-dark transition cursor-pointer">
                            <i class="ph ph-x text-xl"></i>
                        </button>
                    </div>

                    <form @submit.prevent="open = false">
                        <div class="p-6 space-y-4">
                            <div>
                                <label for="nama_kategori" class="block text-sm font-semibold text-dark mb-1">Nama
                                    Kategori</label>
                                <input type="text" id="nama_kategori" placeholder="Masukkan nama kategori" required
                                    class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition text-slate-700">
                            </div>
                            <div>
                                <label for="tipe_kategori" class="block text-sm font-semibold text-dark mb-1">Tipe</label>
                                <div class="relative">
                                    <select id="tipe_kategori" required
                                        class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition appearance-none bg-white cursor-pointer text-slate-700">
                                        <option value="" disabled selected>Pilih tipe kategori</option>
                                        <option value="hewan">Hewan</option>
                                        <option value="produk">Produk</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted">
                                        <i class="ph ph-caret-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3">
                            <button type="button" @click="open = false"
                                class="px-4 py-2 bg-white border border-slate-200 rounded-md text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-dark transition cursor-pointer">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-primary border border-primary rounded-md text-sm font-semibold text-white hover:bg-emerald-600 transition shadow-sm cursor-pointer">
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Edit Data Modal -->
            <div x-data="{ open: false, name: '', type: '' }"
                @open-modal-edit.window="open = true; name = $event.detail.name; type = $event.detail.type" x-show="open"
                class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-0" x-cloak>
                <!-- Overlay -->
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm"
                    @click="open = false"></div>

                <!-- Modal Content -->
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative bg-white rounded-md shadow-xl sm:w-full sm:max-w-md overflow-hidden">

                    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                        <h3 class="text-lg font-bold text-dark">Edit Kategori</h3>
                        <button @click="open = false" class="text-muted hover:text-dark transition cursor-pointer">
                            <i class="ph ph-x text-xl"></i>
                        </button>
                    </div>

                    <form @submit.prevent="open = false">
                        <div class="p-6 space-y-4">
                            <div>
                                <label for="edit_nama_kategori" class="block text-sm font-semibold text-dark mb-1">Nama
                                    Kategori</label>
                                <input type="text" id="edit_nama_kategori" x-model="name" required
                                    class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition text-slate-700">
                            </div>
                            <div>
                                <label for="edit_tipe_kategori"
                                    class="block text-sm font-semibold text-dark mb-1">Tipe</label>
                                <div class="relative">
                                    <select id="edit_tipe_kategori" x-model="type" required
                                        class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition appearance-none bg-white cursor-pointer text-slate-700">
                                        <option value="hewan">Hewan</option>
                                        <option value="produk">Produk</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted">
                                        <i class="ph ph-caret-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3">
                            <button type="button" @click="open = false"
                                class="px-4 py-2 bg-white border border-slate-200 rounded-md text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-dark transition cursor-pointer">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 border border-blue-600 rounded-md text-sm font-semibold text-white hover:bg-blue-700 transition shadow-sm cursor-pointer">
                                Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Modal -->
            <div x-data="{ open: false }" @open-modal-delete.window="open = true" x-show="open"
                class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-0" x-cloak>
                <!-- Overlay -->
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm"
                    @click="open = false"></div>

                <!-- Modal Content -->
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative bg-white rounded-md shadow-xl sm:w-full sm:max-w-sm overflow-hidden text-center">

                    <div class="p-6 pt-8">
                        <div
                            class="w-16 h-16 bg-red-100 text-red-600 rounded-md flex items-center justify-center text-3xl mx-auto mb-4">
                            <i class="ph ph-warning-circle"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-2">Hapus Kategori?</h3>
                        <p class="text-sm text-muted px-4">Aksi ini tidak dapat dibatalkan. Data kategori ini akan dihapus
                            secara permanen dari sistem.</p>
                    </div>

                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-center gap-3">
                        <button type="button" @click="open = false"
                            class="flex-1 px-4 py-2 bg-white border border-slate-200 rounded-md text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-dark transition cursor-pointer">
                            Batal
                        </button>
                        <button type="button" @click="open = false"
                            class="flex-1 px-4 py-2 bg-red-600 border border-red-600 rounded-md text-sm font-semibold text-white hover:bg-red-700 transition shadow-sm cursor-pointer">
                            Ya, Hapus
                        </button>
                    </div>
                </div>
            </div>
        @endpush
    </div>
</x-admin-template>
