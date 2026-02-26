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

    {{-- Flash Alerts --}}
    @if (session('success') || session('error') || $errors->any())
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
            class="mb-6 rounded-md px-4 py-3 flex items-start gap-3 shadow-sm border
                {{ session('success') ? 'bg-emerald-50 border-emerald-200 text-emerald-800' : 'bg-red-50 border-red-200 text-red-800' }}">
            <i
                class="{{ session('success') ? 'ph ph-check-circle text-emerald-500' : 'ph ph-warning-circle text-red-500' }} text-xl mt-0.5 shrink-0"></i>
            <div class="flex-1 text-sm font-medium">
                @if (session('success'))
                    {{ session('success') }}
                @elseif(session('error'))
                    {{ session('error') }}
                @else
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
            </div>
            <button @click="show = false"
                class="text-current opacity-60 hover:opacity-100 transition cursor-pointer shrink-0">
                <i class="ph ph-x"></i>
            </button>
        </div>
    @endif

    <!-- Alpine state for filter UI only -->
    <div x-data="{
        search: '{{ $search }}',
        tipe: '{{ $tipe ?? 'semua' }}',
        sort: '{{ $sort ?? 'terbaru' }}',
        addOpen: {{ $errors->any() && old('_form') === 'add' ? 'true' : 'false' }},
        editOpen: {{ $errors->any() && old('_form') === 'edit' ? 'true' : 'false' }},
    }">

        <!-- Toolbar -->
        <form method="GET" action="{{ route('admin.category') }}"
            class="bg-white rounded-md shadow-sm border border-slate-100 p-4 mb-6" data-aos="fade-up">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">

                <!-- Search & Filters -->
                <div class="flex flex-col sm:flex-row items-center gap-4 flex-1">
                    <!-- Search Input -->
                    <div class="relative w-full sm:w-72">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph ph-magnifying-glass text-muted"></i>
                        </div>
                        <input type="text" name="search" x-model="search" placeholder="Cari nama kategori..."
                            value="{{ $search }}"
                            class="block w-full pl-10 pr-3 py-2 border border-slate-200 rounded-md leading-5 bg-slate-50 placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition duration-150 ease-in-out sm:text-sm">
                    </div>

                    <!-- Type Filter -->
                    <div class="w-full sm:w-auto relative">
                        <select name="tipe" x-model="tipe" @change="$el.form.submit()"
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
                        <select name="sort" x-model="sort" @change="$el.form.submit()"
                            class="block w-full pl-3 pr-10 py-2 text-base border-slate-200 bg-slate-50 border rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm transition duration-150 ease-in-out appearance-none">
                            <option value="terbaru">Terbaru</option>
                            <option value="terlama">Terlama</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted">
                            <i class="ph ph-caret-down"></i>
                        </div>
                    </div>

                    <!-- Search Submit Button (visible on mobile or use Enter) -->
                    @if ($search)
                        <a href="{{ route('admin.category', ['tipe' => $tipe, 'sort' => $sort]) }}"
                            class="text-sm text-muted hover:text-red-500 transition flex items-center gap-1 cursor-pointer whitespace-nowrap">
                            <i class="ph ph-x-circle"></i>
                            Hapus Pencarian
                        </a>
                    @endif
                </div>

                <!-- Add Button -->
                <div class="flex-shrink-0 w-full lg:w-auto">
                    <button type="button" @click="$dispatch('open-modal-add')"
                        class="w-full lg:w-auto px-4 py-2 bg-primary text-white text-sm font-semibold rounded-md hover:bg-emerald-600 transition flex items-center justify-center gap-2 shadow-sm cursor-pointer">
                        <i class="ph ph-plus text-lg"></i>
                        Tambah Data
                    </button>
                </div>
            </div>
        </form>

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
                        @forelse($categories as $category)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="p-4 text-center text-muted font-medium">
                                    {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                                </td>
                                <td class="p-4">
                                    <span class="font-semibold text-dark">{{ $category->nama }}</span>
                                </td>
                                <td class="p-4">
                                    @if ($category->tipe === 'hewan')
                                        <span
                                            class="px-2.5 py-1 bg-amber-50 text-amber-700 rounded-md text-xs font-semibold border border-amber-100">Hewan</span>
                                    @else
                                        <span
                                            class="px-2.5 py-1 bg-primary/10 text-primary rounded-md text-xs font-semibold border border-primary/20">Produk</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center justify-center gap-2 text-lg">
                                        <button
                                            @click="$dispatch('open-modal-edit', { id: {{ $category->id }}, nama: '{{ addslashes($category->nama) }}', tipe: '{{ $category->tipe }}' })"
                                            class="p-1.5 text-blue-600 hover:text-white hover:bg-blue-600 rounded-md transition cursor-pointer"
                                            title="Edit">
                                            <i class="ph ph-pencil-simple"></i>
                                        </button>
                                        <button
                                            @click="$dispatch('open-modal-delete', { id: {{ $category->id }}, nama: '{{ addslashes($category->nama) }}' })"
                                            class="p-1.5 text-red-600 hover:text-white hover:bg-red-600 rounded-md transition cursor-pointer"
                                            title="Hapus">
                                            <i class="ph ph-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-8 text-center text-muted">
                                    <div class="flex flex-col items-center gap-3">
                                        <i class="ph ph-folder-open text-4xl text-slate-300"></i>
                                        <p class="font-semibold">Tidak ada data kategori ditemukan.</p>
                                        @if ($search || ($tipe && $tipe !== 'semua'))
                                            <p class="text-xs">Coba ubah filter pencarian Anda.</p>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-muted text-center sm:text-left">
                        Menampilkan
                        <span class="font-semibold text-dark">{{ $categories->firstItem() ?? 0 }}</span> -
                        <span class="font-semibold text-dark">{{ $categories->lastItem() ?? 0 }}</span>
                        dari <span class="font-semibold text-dark">{{ $categories->total() }}</span> data
                    </div>
                    <div class="flex items-center gap-1 flex-wrap justify-center">
                        {{-- Previous Button --}}
                        @if ($categories->onFirstPage())
                            <span
                                class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-md text-sm text-slate-300 bg-slate-50 cursor-not-allowed">
                                <span class="hidden sm:inline">Sebelumnya</span>
                                <i class="ph ph-caret-left sm:hidden"></i>
                            </span>
                        @else
                            <a href="{{ $categories->previousPageUrl() }}"
                                class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-md text-sm text-muted hover:bg-white hover:text-dark transition cursor-pointer">
                                <span class="hidden sm:inline">Sebelumnya</span>
                                <i class="ph ph-caret-left sm:hidden"></i>
                            </a>
                        @endif

                        {{-- Page Numbers with smart ellipsis --}}
                        @php
                            $currentPage = $categories->currentPage();
                            $lastPage = $categories->lastPage();
                            $delta = 1; // pages around current
                            $pages = [];

                            // Always show first page
                            $pages[] = 1;

                            // Pages around current
                            for (
                                $i = max(2, $currentPage - $delta);
                                $i <= min($lastPage - 1, $currentPage + $delta);
                                $i++
                            ) {
                                $pages[] = $i;
                            }

                            // Always show last page
                            if ($lastPage > 1) {
                                $pages[] = $lastPage;
                            }

                            $pages = array_unique($pages);
                            sort($pages);
                        @endphp

                        @php $prev = null; @endphp
                        @foreach ($pages as $page)
                            @if ($prev !== null && $page - $prev > 1)
                                <span class="px-2 py-1.5 text-sm text-muted">...</span>
                            @endif

                            @if ($page === $currentPage)
                                <span
                                    class="px-3 py-1.5 bg-primary text-white border border-primary rounded-md text-sm font-medium shadow-sm">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $categories->url($page) }}"
                                    class="px-3 py-1.5 border border-slate-200 bg-white rounded-md text-sm text-dark hover:bg-slate-50 transition cursor-pointer">
                                    {{ $page }}
                                </a>
                            @endif

                            @php $prev = $page; @endphp
                        @endforeach

                        {{-- Next Button --}}
                        @if ($categories->hasMorePages())
                            <a href="{{ $categories->nextPageUrl() }}"
                                class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-md text-sm text-dark bg-white hover:bg-slate-50 transition cursor-pointer">
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
        </div>

        @push('modals')
            <!-- Add Data Modal -->
            <div x-data="{ open: {{ $errors->any() && old('_form') === 'add' ? 'true' : 'false' }} }" @open-modal-add.window="open = true" x-show="open"
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

                    <form method="POST" action="{{ route('admin.category.store') }}">
                        @csrf
                        <input type="hidden" name="_form" value="add">
                        <div class="p-6 space-y-4">
                            <div>
                                <label for="add_nama" class="block text-sm font-semibold text-dark mb-1">Nama
                                    Kategori</label>
                                <input type="text" id="add_nama" name="nama"
                                    value="{{ old('_form') === 'add' ? old('nama') : '' }}"
                                    placeholder="Masukkan nama kategori" required
                                    class="w-full px-3 py-2 border {{ $errors->has('nama') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400 focus:border-red-400' : 'border-slate-200 focus:ring-primary focus:border-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                @if ($errors->has('nama') && old('_form') === 'add')
                                    <p class="text-red-500 text-xs mt-1">{{ $errors->first('nama') }}</p>
                                @endif
                            </div>
                            <div>
                                <label for="add_tipe" class="block text-sm font-semibold text-dark mb-1">Tipe</label>
                                <div class="relative">
                                    <select id="add_tipe" name="tipe" required
                                        class="w-full px-3 py-2 border {{ $errors->has('tipe') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400 focus:border-red-400' : 'border-slate-200 focus:ring-primary focus:border-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition appearance-none bg-white cursor-pointer text-slate-700">
                                        <option value="" disabled {{ old('tipe') ? '' : 'selected' }}>Pilih tipe
                                            kategori</option>
                                        <option value="hewan"
                                            {{ old('_form') === 'add' && old('tipe') === 'hewan' ? 'selected' : '' }}>Hewan
                                        </option>
                                        <option value="produk"
                                            {{ old('_form') === 'add' && old('tipe') === 'produk' ? 'selected' : '' }}>
                                            Produk</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted">
                                        <i class="ph ph-caret-down"></i>
                                    </div>
                                </div>
                                @if ($errors->has('tipe') && old('_form') === 'add')
                                    <p class="text-red-500 text-xs mt-1">{{ $errors->first('tipe') }}</p>
                                @endif
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
            <div x-data="{ open: {{ $errors->any() && old('_form') === 'edit' ? 'true' : 'false' }}, id: '{{ old('_id') }}', nama: '{{ addslashes(old('nama', '')) }}', tipe: '{{ old('tipe', '') }}' }"
                @open-modal-edit.window="open = true; id = $event.detail.id; nama = $event.detail.nama; tipe = $event.detail.tipe"
                x-show="open" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-0" x-cloak>
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

                    <form method="POST" :action="`{{ url('admin/category') }}/${id}`">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="_form" value="edit">
                        <input type="hidden" name="_id" :value="id">
                        <div class="p-6 space-y-4">
                            <div>
                                <label for="edit_nama" class="block text-sm font-semibold text-dark mb-1">Nama
                                    Kategori</label>
                                <input type="text" id="edit_nama" name="nama" x-model="nama" required
                                    class="w-full px-3 py-2 border {{ $errors->has('nama') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400 focus:border-red-400' : 'border-slate-200 focus:ring-primary focus:border-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                @if ($errors->has('nama') && old('_form') === 'edit')
                                    <p class="text-red-500 text-xs mt-1">{{ $errors->first('nama') }}</p>
                                @endif
                            </div>
                            <div>
                                <label for="edit_tipe" class="block text-sm font-semibold text-dark mb-1">Tipe</label>
                                <div class="relative">
                                    <select id="edit_tipe" name="tipe" x-model="tipe" required
                                        class="w-full px-3 py-2 border {{ $errors->has('tipe') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400 focus:border-red-400' : 'border-slate-200 focus:ring-primary focus:border-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition appearance-none bg-white cursor-pointer text-slate-700">
                                        <option value="hewan">Hewan</option>
                                        <option value="produk">Produk</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted">
                                        <i class="ph ph-caret-down"></i>
                                    </div>
                                </div>
                                @if ($errors->has('tipe') && old('_form') === 'edit')
                                    <p class="text-red-500 text-xs mt-1">{{ $errors->first('tipe') }}</p>
                                @endif
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
            <div x-data="{ open: false, id: null, nama: '' }"
                @open-modal-delete.window="open = true; id = $event.detail.id; nama = $event.detail.nama" x-show="open"
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
                        <p class="text-sm text-muted px-4">Anda akan menghapus kategori <strong x-text="nama"
                                class="text-dark"></strong>. Aksi ini tidak dapat dibatalkan.</p>
                    </div>

                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-center gap-3">
                        <button type="button" @click="open = false"
                            class="flex-1 px-4 py-2 bg-white border border-slate-200 rounded-md text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-dark transition cursor-pointer">
                            Batal
                        </button>
                        <form method="POST" :action="`{{ url('admin/category') }}/${id}`" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full px-4 py-2 bg-red-600 border border-red-600 rounded-md text-sm font-semibold text-white hover:bg-red-700 transition shadow-sm cursor-pointer">
                                Ya, Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endpush
    </div>
</x-admin-template>
