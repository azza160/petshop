<x-admin-template>
    <x-slot:title>Data Produk</x-slot>
    <x-slot:headerTitle>Data Produk</x-slot>

    @php
        // Dummy Categories
        $categories = [
            (object) ['id' => 1, 'nama' => 'Makanan'],
            (object) ['id' => 2, 'nama' => 'Aksesoris'],
            (object) ['id' => 3, 'nama' => 'Mainan'],
            (object) ['id' => 4, 'nama' => 'Pasir'],
        ];

        // Dummy Products
        $produks = [
            (object) [
                'id' => '01J6XXXXX1',
                'nama' => 'Royal Canin Kitten',
                'category' => (object) ['nama' => 'Makanan'],
                'kategori_id' => 1,
                'deskripsi' =>
                    'Makanan kering kucing khusus untuk anakan kucing usia 1-4 bulan menyehatkan tanpa pengawet dan kaya nutrisi. Mengandung vitamin E dan C yang sangat berguna menunjang antibodi anak kucing.',
                'harga' => 85000,
                'stok' => 25,
                'foto_utama' =>
                    'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?auto=format&fit=crop&q=80&w=200',
                'merek' => 'Royal Canin',
                'tanggal_kadaluarsa' => '2027-04-12',
                'berat' => 0.4,
                'is_favorit' => true,
                'galeri' => [
                    (object) [
                        'id' => 1,
                        'path_foto' =>
                            'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?auto=format&fit=crop&q=80&w=500',
                    ],
                ],
            ],
            (object) [
                'id' => '01J6XXXXX2',
                'nama' => 'Mainan Tikus Interaktif',
                'category' => (object) ['nama' => 'Mainan'],
                'kategori_id' => 3,
                'deskripsi' =>
                    'Mainan interaktif untuk kucing agar aktif bergerak dan tidak stress, dilengkapi bel yang menarik perhatian anabul kesayangan.',
                'harga' => 15000,
                'stok' => 50,
                'foto_utama' =>
                    'https://images.unsplash.com/photo-1545249390-6bdfa286032f?auto=format&fit=crop&q=80&w=200',
                'merek' => 'Cat Toy',
                'tanggal_kadaluarsa' => null,
                'berat' => 0.1,
                'is_favorit' => false,
                'galeri' => [],
            ],
            (object) [
                'id' => '01J6XXXXX3',
                'nama' => 'Pasir Gumpal Wangi Kopi',
                'category' => (object) ['nama' => 'Pasir'],
                'kategori_id' => 4,
                'deskripsi' =>
                    'Pasir gumpal wangi aroma kopi yang ampuh menetralisir bau kotoran kucing. Mudah menggumpal dan ekonomis.',
                'harga' => 35000,
                'stok' => 20,
                'foto_utama' =>
                    'https://images.unsplash.com/photo-1628151015968-3a4429e9ef04?auto=format&fit=crop&q=80&w=200',
                'merek' => 'Meow Litter',
                'tanggal_kadaluarsa' => null,
                'berat' => 5.0,
                'is_favorit' => true,
                'galeri' => [],
            ],
        ];
    @endphp

    <!-- Page Header & Breadcrumb -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-dark mb-1">Manajemen Produk</h2>
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
                            <span class="ml-1 md:ml-2 text-slate-800">Produk</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Flash Alerts --}}
    @if (session('success') || session('error'))
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
                @endif
            </div>
            <button @click="show = false"
                class="text-current opacity-60 hover:opacity-100 transition cursor-pointer shrink-0">
                <i class="ph ph-x"></i>
            </button>
        </div>
    @endif

    <!-- Alpine state -->
    <div x-data="{
        search: '',
        kategori: 'semua',
        sort: 'terbaru'
    }">

        <!-- Toolbar (Filters & Search) -->
        <div class="bg-white rounded-md shadow-sm border border-slate-100 p-4 mb-6" data-aos="fade-up">

            <div class="flex flex-col lg:flex-row justify-between gap-4">

                <!-- Filters Container -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 flex-1">
                    <!-- Search Input -->
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph ph-magnifying-glass text-muted"></i>
                        </div>
                        <input type="text" x-model="search" placeholder="Cari nama produk..."
                            class="block w-full pl-10 pr-3 py-2 border border-slate-200 rounded-md leading-5 bg-slate-50 placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition duration-150 ease-in-out sm:text-sm">
                    </div>

                    <!-- Category Filter -->
                    <div class="relative w-full">
                        <select x-model="kategori"
                            class="block w-full pl-3 pr-10 py-2 text-base border-slate-200 bg-slate-50 border rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm transition duration-150 ease-in-out appearance-none cursor-pointer">
                            <option value="semua">Semua Kategori</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nama }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted">
                            <i class="ph ph-caret-down"></i>
                        </div>
                    </div>

                    <!-- Sort Filter -->
                    <div class="relative w-full">
                        <select x-model="sort"
                            class="block w-full pl-3 pr-10 py-2 text-base border-slate-200 bg-slate-50 border rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm transition duration-150 ease-in-out appearance-none cursor-pointer">
                            <option value="terbaru">Data Terbaru</option>
                            <option value="terlama">Data Terlama</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted">
                            <i class="ph ph-caret-down"></i>
                        </div>
                    </div>
                </div>

                <!-- Add Button -->
                <div class="flex-shrink-0 w-full lg:w-auto flex items-end">
                    <button type="button" @click="$dispatch('open-modal-add')"
                        class="w-full lg:w-auto px-4 py-2 bg-primary text-white text-sm font-semibold rounded-md hover:bg-emerald-600 transition flex items-center justify-center gap-2 shadow-sm cursor-pointer">
                        <i class="ph ph-plus text-lg"></i>
                        Tambah Produk
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
                            <th class="p-4 font-semibold">Foto</th>
                            <th class="p-4 font-semibold">Nama</th>
                            <th class="p-4 font-semibold">Kategori</th>
                            <th class="p-4 font-semibold min-w-[200px]">Deskripsi</th>
                            <th class="p-4 font-semibold">Harga</th>
                            <th class="p-4 font-semibold text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-slate-100 text-slate-700">
                        @forelse($produks as $produk)
                            <!-- Filter Alpine Logic (Static) -->
                            <tr class="hover:bg-slate-50/50 transition-colors"
                                x-show="(search === '' || '{{ strtolower($produk->nama) }}'.includes(search.toLowerCase())) && (kategori === 'semua' || kategori == '{{ $produk->kategori_id }}')">
                                <td class="p-4 text-center text-muted font-medium">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-4">
                                    <img src="{{ $produk->foto_utama }}" alt="{{ $produk->nama }}"
                                        @click="$dispatch('open-global-image', { src: '{{ $produk->foto_utama }}' })"
                                        class="w-12 h-12 rounded-md object-cover border border-slate-200 cursor-pointer hover:opacity-80 transition-opacity shadow-sm">
                                </td>
                                <td class="p-4">
                                    <span class="font-semibold text-dark">{{ $produk->nama }}</span>
                                </td>
                                <td class="p-4">
                                    <span
                                        class="px-2.5 py-1 bg-primary/10 text-primary rounded-md text-xs font-semibold border border-primary/20">
                                        {{ $produk->category->nama ?? '-' }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <p class="text-xs text-muted leading-relaxed max-w-xs whitespace-normal line-clamp-2"
                                        title="{{ $produk->deskripsi }}">
                                        {{ Str::limit($produk->deskripsi, 60) }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <span class="font-semibold text-dark">Rp
                                        {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center justify-center gap-2 text-lg">
                                        <a href="{{ route('admin.product.detail', ['id' => $produk->id]) }}"
                                            class="p-1.5 text-emerald-600 hover:text-white hover:bg-emerald-600 rounded-md transition cursor-pointer"
                                            title="Detail">
                                            <i class="ph ph-eye"></i>
                                        </a>
                                        <button id="edit-btn-{{ $produk->id }}"
                                            @click="$dispatch('open-modal-edit', { produk: {{ json_encode($produk) }}, galleries: {{ json_encode($produk->galeri) }} })"
                                            class="p-1.5 text-blue-600 hover:text-white hover:bg-blue-600 rounded-md transition cursor-pointer"
                                            title="Edit">
                                            <i class="ph ph-pencil-simple"></i>
                                        </button>
                                        <button
                                            @click="$dispatch('open-modal-delete', { id: '{{ $produk->id }}', nama: '{{ addslashes($produk->nama) }}' })"
                                            class="p-1.5 text-red-600 hover:text-white hover:bg-red-600 rounded-md transition cursor-pointer"
                                            title="Hapus">
                                            <i class="ph ph-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="p-8 text-center text-muted">
                                    <div class="flex flex-col items-center gap-3">
                                        <i class="ph ph-paw-print text-4xl text-slate-300"></i>
                                        <p class="font-semibold">Tidak ada data Produk ditemukan.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Static Pagination UI -->
            <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-muted text-center sm:text-left">
                        Menampilkan <span class="font-semibold text-dark">1</span> -
                        <span class="font-semibold text-dark">{{ count($produks) }}</span>
                        dari <span class="font-semibold text-dark">{{ count($produks) }}</span> data
                    </div>
                    <div class="flex items-center gap-1 flex-wrap justify-center">
                        <span
                            class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-md text-sm text-slate-300 bg-slate-50 cursor-not-allowed">
                            <span class="hidden sm:inline">Sebelumnya</span>
                            <i class="ph ph-caret-left sm:hidden"></i>
                        </span>

                        <span
                            class="px-3 py-1.5 bg-primary text-white border border-primary rounded-md text-sm font-medium shadow-sm">
                            1
                        </span>

                        <span
                            class="px-2 sm:px-3 py-1.5 border border-slate-200 rounded-md text-sm text-slate-300 bg-slate-50 cursor-not-allowed">
                            <span class="hidden sm:inline">Selanjutnya</span>
                            <i class="ph ph-caret-right sm:hidden"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- (Local image modal removed) -->

        @push('modals')
            <!-- Add Data Modal -->
            <div x-data="{
                open: {{ $errors->any() && old('_form') === 'add' ? 'true' : 'false' }},
                photoPreview: null,
                gallery1Preview: null,
                gallery2Preview: null,
                gallery3Preview: null,
                handleFileChange(event, type) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this[type] = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                },
                removeImage(type, inputId) {
                    this[type] = null;
                    document.getElementById(inputId).value = '';
                }
            }" @open-modal-add.window="open = true" x-show="open"
                class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-0" x-cloak>
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm"
                    @click="open = false"></div>

                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative bg-white rounded-md shadow-xl sm:w-full sm:max-w-3xl overflow-hidden flex flex-col max-h-[90vh]">

                    <div
                        class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50 shrink-0">
                        <h3 class="text-lg font-bold text-dark">Tambah Data Produk</h3>
                        <button @click="open = false" class="text-muted hover:text-dark transition cursor-pointer">
                            <i class="ph ph-x text-xl"></i>
                        </button>
                    </div>

                    <form method="POST" action="" enctype="multipart/form-data"
                        class="flex-1 overflow-y-auto w-full scrollbar-thin scrollbar-thumb-slate-200">
                        @csrf
                        <input type="hidden" name="_form" value="add">
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nama -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Nama Produk</label>
                                    <input type="text" name="nama"
                                        value="{{ old('_form') === 'add' ? old('nama') : '' }}"
                                        placeholder="Masukkan nama Produk"
                                        class="w-full px-3 py-2 border {{ $errors->has('nama') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('nama') && old('_form') === 'add')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('nama') }}</p>
                                    @endif
                                </div>

                                <!-- Kategori -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Kategori</label>
                                    <select name="category_id"
                                        class="w-full px-3 py-2 border {{ $errors->has('category_id') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition bg-white cursor-pointer text-slate-700">
                                        <option value="" disabled
                                            {{ old('_form') !== 'add' || !old('category_id') ? 'selected' : '' }}>Pilih
                                            Kategori</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ old('_form') === 'add' && old('category_id') == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id') && old('_form') === 'add')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('category_id') }}</p>
                                    @endif
                                </div>

                                <!-- Merek -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Merek</label>
                                    <input type="text" name="merek"
                                        value="{{ old('_form') === 'add' ? old('merek') : '' }}"
                                        placeholder="Masukkan Merek Produk"
                                        class="w-full px-3 py-2 border {{ $errors->has('merek') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('merek') && old('_form') === 'add')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('merek') }}</p>
                                    @endif
                                </div>

                                <!-- Tanggal Kadaluarsa -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Tanggal Kadaluarsa</label>
                                    <input type="date" name="tanggal_kadaluarsa"
                                        value="{{ old('_form') === 'add' ? old('tanggal_kadaluarsa') : '' }}"
                                        class="w-full px-3 py-2 border {{ $errors->has('tanggal_kadaluarsa') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('tanggal_kadaluarsa') && old('_form') === 'add')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('tanggal_kadaluarsa') }}
                                        </p>
                                    @endif
                                </div>



                                <!-- Berat -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Berat (Kg)</label>
                                    <input type="number" name="berat"
                                        value="{{ old('_form') === 'add' ? old('berat') : '' }}" step="0.01"
                                        min="0" placeholder="Misal: 4.5"
                                        class="w-full px-3 py-2 border {{ $errors->has('berat') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('berat') && old('_form') === 'add')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('berat') }}</p>
                                    @endif
                                </div>

                                <!-- Harga -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Harga (Rp)</label>
                                    <input type="number" name="harga"
                                        value="{{ old('_form') === 'add' ? old('harga') : '' }}" min="0"
                                        placeholder="Misal: 1500000"
                                        class="w-full px-3 py-2 border {{ $errors->has('harga') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('harga') && old('_form') === 'add')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('harga') }}</p>
                                    @endif
                                </div>

                                <!-- Stok / Jumlah -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Stok / Jumlah</label>
                                    <input type="number" name="stok"
                                        value="{{ old('_form') === 'add' ? old('stok') : '' }}" min="0"
                                        placeholder="Misal: 1"
                                        class="w-full px-3 py-2 border {{ $errors->has('stok') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('stok') && old('_form') === 'add')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('stok') }}</p>
                                    @endif
                                </div>



                                <!-- Foto Utama -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Foto Utama</label>
                                    <div x-show="!photoPreview">
                                        <input type="file" name="photo" id="addPhotoInput" accept="image/*"
                                            @change="handleFileChange($event, 'photoPreview')"
                                            class="w-full px-3 py-2 border {{ $errors->has('photo') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                    </div>
                                    <div x-show="photoPreview" class="relative w-max mt-2">
                                        <img :src="photoPreview"
                                            class="w-24 h-24 object-cover rounded-md border border-slate-200 shadow-sm">
                                        <button type="button" @click="removeImage('photoPreview', 'addPhotoInput')"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 shadow-md">
                                            <i class="ph ph-x text-xs"></i>
                                        </button>
                                    </div>
                                    @if ($errors->has('photo') && old('_form') === 'add')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('photo') }}</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label class="block text-sm font-semibold text-dark mb-1">Deskripsi</label>
                                <textarea name="deskripsi" rows="3" placeholder="Tuliskan deskripsi lengkap tentang Produk ini..."
                                    class="w-full px-3 py-2 border {{ $errors->has('deskripsi') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700 resize-none">{{ old('_form') === 'add' ? old('deskripsi') : '' }}</textarea>
                                @if ($errors->has('deskripsi') && old('_form') === 'add')
                                    <p class="text-red-500 text-xs mt-1">{{ $errors->first('deskripsi') }}</p>
                                @endif
                            </div>

                            <hr class="border-slate-100">

                            <div>
                                <h4 class="text-sm font-bold text-dark mb-3">Foto Gallery (Opsional)</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                                    <!-- Gallery 1 -->
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">Gallery 1</label>
                                        <div x-show="!gallery1Preview">
                                            <input type="file" name="foto_gallery_1" id="addGallery1Input"
                                                accept="image/*" @change="handleFileChange($event, 'gallery1Preview')"
                                                class="w-full px-2 py-1.5 border {{ $errors->has('foto_gallery_1') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-xs transition text-slate-700 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                        </div>
                                        <div x-show="gallery1Preview" class="relative w-max mt-2">
                                            <img :src="gallery1Preview"
                                                class="w-20 h-20 object-cover rounded-md border border-slate-200 shadow-sm">
                                            <button type="button"
                                                @click="removeImage('gallery1Preview', 'addGallery1Input')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 shadow-md transform scale-90">
                                                <i class="ph ph-x text-xs"></i>
                                            </button>
                                        </div>
                                        @if ($errors->has('foto_gallery_1') && old('_form') === 'add')
                                            <p class="text-red-500 text-xs mt-1">{{ $errors->first('foto_gallery_1') }}
                                            </p>
                                        @endif
                                    </div>

                                    <!-- Gallery 2 -->
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">Gallery 2</label>
                                        <div x-show="!gallery2Preview">
                                            <input type="file" name="foto_gallery_2" id="addGallery2Input"
                                                accept="image/*" @change="handleFileChange($event, 'gallery2Preview')"
                                                class="w-full px-2 py-1.5 border {{ $errors->has('foto_gallery_2') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-xs transition text-slate-700 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                        </div>
                                        <div x-show="gallery2Preview" class="relative w-max mt-2">
                                            <img :src="gallery2Preview"
                                                class="w-20 h-20 object-cover rounded-md border border-slate-200 shadow-sm">
                                            <button type="button"
                                                @click="removeImage('gallery2Preview', 'addGallery2Input')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 shadow-md transform scale-90">
                                                <i class="ph ph-x text-xs"></i>
                                            </button>
                                        </div>
                                        @if ($errors->has('foto_gallery_2') && old('_form') === 'add')
                                            <p class="text-red-500 text-xs mt-1">{{ $errors->first('foto_gallery_2') }}
                                            </p>
                                        @endif
                                    </div>

                                    <!-- Gallery 3 -->
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">Gallery 3</label>
                                        <div x-show="!gallery3Preview">
                                            <input type="file" name="foto_gallery_3" id="addGallery3Input"
                                                accept="image/*" @change="handleFileChange($event, 'gallery3Preview')"
                                                class="w-full px-2 py-1.5 border {{ $errors->has('foto_gallery_3') && old('_form') === 'add' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-xs transition text-slate-700 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                        </div>
                                        <div x-show="gallery3Preview" class="relative w-max mt-2">
                                            <img :src="gallery3Preview"
                                                class="w-20 h-20 object-cover rounded-md border border-slate-200 shadow-sm">
                                            <button type="button"
                                                @click="removeImage('gallery3Preview', 'addGallery3Input')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 shadow-md transform scale-90">
                                                <i class="ph ph-x text-xs"></i>
                                            </button>
                                        </div>
                                        @if ($errors->has('foto_gallery_3') && old('_form') === 'add')
                                            <p class="text-red-500 text-xs mt-1">{{ $errors->first('foto_gallery_3') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div
                            class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3 shrink-0">
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
            <div x-data="{
                open: false,
                formData: {},
                photoPreview: null,
                gallery1Preview: null,
                gallery2Preview: null,
                gallery3Preview: null,
                remove_photo: 0,
                remove_gallery_1: 0,
                remove_gallery_2: 0,
                remove_gallery_3: 0,
                gallery_1_id: null,
                gallery_2_id: null,
                gallery_3_id: null,
            
                handleFileChange(event, previewKey) {
                    const file = event.target.files[0];
                    if (file) {
                        this[previewKey] = URL.createObjectURL(file);
            
                        // If they picked a new file, we reset the 'remove' flag
                        // since they are replacing it rather than just deleting.
                        if (previewKey === 'photoPreview') this.remove_photo = 0;
                        if (previewKey === 'gallery1Preview') this.remove_gallery_1 = 0;
                        if (previewKey === 'gallery2Preview') this.remove_gallery_2 = 0;
                        if (previewKey === 'gallery3Preview') this.remove_gallery_3 = 0;
                    }
                },
                removeImage(previewKey, inputId) {
                    this[previewKey] = null;
                    document.getElementById(inputId).value = '';
            
                    // Set the remove flags so the backend knows to delete existing files
                    if (previewKey === 'photoPreview') {
                        this.remove_photo = 1;
                    } else if (previewKey === 'gallery1Preview') {
                        this.remove_gallery_1 = 1;
                    } else if (previewKey === 'gallery2Preview') {
                        this.remove_gallery_2 = 1;
                    } else if (previewKey === 'gallery3Preview') {
                        this.remove_gallery_3 = 1;
                    }
                }
            }"
                @open-modal-edit.window="
                    formData = $event.detail.produk;
                    
                    // Reset File Inputs
                    document.getElementById('editPhotoInput').value = '';
                    document.getElementById('editGallery1Input').value = '';
                    document.getElementById('editGallery2Input').value = '';
                    document.getElementById('editGallery3Input').value = '';
                    
                    // Reset Removal Flags
                    remove_photo = 0;
                    remove_gallery_1 = 0;
                    remove_gallery_2 = 0;
                    remove_gallery_3 = 0;
                    
                    // Load existing photos into previews
                    photoPreview = formData.foto_utama ? formData.foto_utama : null;
                    
                    gallery1Preview = null;
                    gallery2Preview = null;
                    gallery3Preview = null;
                    gallery_1_id = null;
                    gallery_2_id = null;
                    gallery_3_id = null;

                    if ($event.detail.galleries && $event.detail.galleries.length > 0) {
                        if($event.detail.galleries[0]) {
                            gallery1Preview = $event.detail.galleries[0].path_foto;
                            gallery_1_id = $event.detail.galleries[0].id;
                        }
                        if($event.detail.galleries[1]) {
                            gallery2Preview = $event.detail.galleries[1].path_foto;
                            gallery_2_id = $event.detail.galleries[1].id;
                        }
                        if($event.detail.galleries[2]) {
                            gallery3Preview = $event.detail.galleries[2].path_foto;
                            gallery_3_id = $event.detail.galleries[2].id;
                        }
                    }

                    open = true;
                "
                x-init="" x-show="open"
                class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-0" x-cloak>
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm"
                    @click="open = false"></div>

                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative bg-white rounded-md shadow-xl sm:w-full sm:max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">

                    <div
                        class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50 shrink-0">
                        <h3 class="text-lg font-bold text-dark">Edit Data Produk</h3>
                        <button @click="open = false" class="text-muted hover:text-dark transition cursor-pointer">
                            <i class="ph ph-x text-xl"></i>
                        </button>
                    </div>

                    <form :action="`/admin/Produk/${formData.id}`" method="POST" enctype="multipart/form-data"
                        class="flex-1 overflow-y-auto w-full scrollbar-thin scrollbar-thumb-slate-200">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="_form" value="edit">
                        <input type="hidden" name="Produk_id" :value="formData.id">

                        <!-- Hidden inputs for removed state tracking -->
                        <input type="hidden" name="remove_photo" :value="remove_photo">
                        <input type="hidden" name="remove_gallery_1" :value="remove_gallery_1">
                        <input type="hidden" name="remove_gallery_2" :value="remove_gallery_2">
                        <input type="hidden" name="remove_gallery_3" :value="remove_gallery_3">

                        <div class="p-6 space-y-5">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <!-- Nama -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Nama Produk</label>
                                    <input type="text" name="nama" x-model="formData.nama"
                                        placeholder="Masukkan nama Produk"
                                        class="w-full px-3 py-2 border {{ $errors->has('nama') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('nama') && old('_form') === 'edit')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('nama') }}</p>
                                    @endif
                                </div>

                                <!-- Kategori -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Kategori</label>
                                    <select name="kategori_id" x-model="formData.kategori_id"
                                        class="w-full px-3 py-2 border {{ $errors->has('kategori_id') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition bg-white cursor-pointer text-slate-700">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('kategori_id') && old('_form') === 'edit')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('kategori_id') }}</p>
                                    @endif
                                </div>

                                <!-- Merek -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Merek</label>
                                    <input type="text" name="merek" x-model="formData.merek"
                                        placeholder="Masukkan Merek Produk"
                                        class="w-full px-3 py-2 border {{ $errors->has('merek') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('merek') && old('_form') === 'edit')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('merek') }}</p>
                                    @endif
                                </div>

                                <!-- Tanggal Kadaluarsa -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Tanggal Kadaluarsa</label>
                                    <input type="date" name="tanggal_kadaluarsa" x-model="formData.tanggal_kadaluarsa"
                                        class="w-full px-3 py-2 border {{ $errors->has('tanggal_kadaluarsa') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('tanggal_kadaluarsa') && old('_form') === 'edit')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('tanggal_kadaluarsa') }}
                                        </p>
                                    @endif
                                </div>



                                <!-- Berat -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Berat (Kg)</label>
                                    <input type="number" name="berat" x-model="formData.berat" step="0.01"
                                        min="0" placeholder="Misal: 4.5"
                                        class="w-full px-3 py-2 border {{ $errors->has('berat') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('berat') && old('_form') === 'edit')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('berat') }}</p>
                                    @endif
                                </div>

                                <!-- Harga -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Harga (Rp)</label>
                                    <input type="number" name="harga" x-model="formData.harga" min="0"
                                        placeholder="Misal: 1500000"
                                        class="w-full px-3 py-2 border {{ $errors->has('harga') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('harga') && old('_form') === 'edit')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('harga') }}</p>
                                    @endif
                                </div>

                                <!-- Stok / Jumlah -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Stok / Jumlah</label>
                                    <input type="number" name="stok" x-model="formData.stok" min="0"
                                        placeholder="Misal: 1"
                                        class="w-full px-3 py-2 border {{ $errors->has('stok') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700">
                                    @if ($errors->has('stok') && old('_form') === 'edit')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('stok') }}</p>
                                    @endif
                                </div>



                                <!-- Foto Utama -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Foto Utama</label>
                                    <div x-show="!photoPreview">
                                        <input type="file" name="photo" id="editPhotoInput" accept="image/*"
                                            @change="handleFileChange($event, 'photoPreview')"
                                            class="w-full px-3 py-2 border {{ $errors->has('photo') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                    </div>
                                    <div x-show="photoPreview" class="relative w-max mt-2">
                                        <img :src="photoPreview"
                                            class="w-24 h-24 object-cover rounded-md border border-slate-200 shadow-sm">
                                        <button type="button" @click="removeImage('photoPreview', 'editPhotoInput')"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 shadow-md transform scale-90 transition-transform hover:scale-100">
                                            <i class="ph ph-x text-xs"></i>
                                        </button>
                                    </div>
                                    @if ($errors->has('photo') && old('_form') === 'edit')
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('photo') }}</p>
                                    @endif
                                    @if (old('_form') === 'edit' && $errors->has('photo') == false && old('remove_photo') == '1' && !$errors->any())
                                        <p class="text-red-500 text-xs mt-1">Foto utama wajib diunggah karena yang lama
                                            telah dihapus.</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label class="block text-sm font-semibold text-dark mb-1">Deskripsi</label>
                                <textarea name="deskripsi" rows="3" x-model="formData.deskripsi"
                                    placeholder="Tuliskan deskripsi lengkap tentang Produk ini..."
                                    class="w-full px-3 py-2 border {{ $errors->has('deskripsi') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-sm transition text-slate-700 resize-none"></textarea>
                                @if ($errors->has('deskripsi') && old('_form') === 'edit')
                                    <p class="text-red-500 text-xs mt-1">{{ $errors->first('deskripsi') }}</p>
                                @endif
                            </div>

                            <hr class="border-slate-100">

                            <div>
                                <h4 class="text-sm font-bold text-dark mb-3">Foto Gallery</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                                    <!-- Gallery 1 -->
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">Gallery 1</label>
                                        <div x-show="!gallery1Preview">
                                            <input type="file" name="foto_gallery_1" id="editGallery1Input"
                                                accept="image/*" @change="handleFileChange($event, 'gallery1Preview')"
                                                class="w-full px-2 py-1.5 border {{ $errors->has('foto_gallery_1') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-xs transition text-slate-700 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                        </div>
                                        <div x-show="gallery1Preview" class="relative w-max mt-2">
                                            <img :src="gallery1Preview"
                                                class="w-20 h-20 object-cover rounded-md border border-slate-200 shadow-sm">
                                            <button type="button"
                                                @click="removeImage('gallery1Preview', 'editGallery1Input')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 shadow-md transform scale-90 transition-transform hover:scale-100">
                                                <i class="ph ph-x text-xs"></i>
                                            </button>
                                        </div>
                                        @if ($errors->has('foto_gallery_1') && old('_form') === 'edit')
                                            <p class="text-red-500 text-xs mt-1">{{ $errors->first('foto_gallery_1') }}
                                            </p>
                                        @endif
                                    </div>

                                    <!-- Gallery 2 -->
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">Gallery 2</label>
                                        <div x-show="!gallery2Preview">
                                            <input type="file" name="foto_gallery_2" id="editGallery2Input"
                                                accept="image/*" @change="handleFileChange($event, 'gallery2Preview')"
                                                class="w-full px-2 py-1.5 border {{ $errors->has('foto_gallery_2') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-xs transition text-slate-700 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                        </div>
                                        <div x-show="gallery2Preview" class="relative w-max mt-2">
                                            <img :src="gallery2Preview"
                                                class="w-20 h-20 object-cover rounded-md border border-slate-200 shadow-sm">
                                            <button type="button"
                                                @click="removeImage('gallery2Preview', 'editGallery2Input')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 shadow-md transform scale-90 transition-transform hover:scale-100">
                                                <i class="ph ph-x text-xs"></i>
                                            </button>
                                        </div>
                                        @if ($errors->has('foto_gallery_2') && old('_form') === 'edit')
                                            <p class="text-red-500 text-xs mt-1">{{ $errors->first('foto_gallery_2') }}
                                            </p>
                                        @endif
                                    </div>

                                    <!-- Gallery 3 -->
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">Gallery 3</label>
                                        <div x-show="!gallery3Preview">
                                            <input type="file" name="foto_gallery_3" id="editGallery3Input"
                                                accept="image/*" @change="handleFileChange($event, 'gallery3Preview')"
                                                class="w-full px-2 py-1.5 border {{ $errors->has('foto_gallery_3') && old('_form') === 'edit' ? 'border-red-400 focus:ring-red-400' : 'border-slate-200 focus:ring-primary' }} rounded-md focus:outline-none focus:ring-1 text-xs transition text-slate-700 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                        </div>
                                        <div x-show="gallery3Preview" class="relative w-max mt-2">
                                            <img :src="gallery3Preview"
                                                class="w-20 h-20 object-cover rounded-md border border-slate-200 shadow-sm">
                                            <button type="button"
                                                @click="removeImage('gallery3Preview', 'editGallery3Input')"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 shadow-md transform scale-90 transition-transform hover:scale-100">
                                                <i class="ph ph-x text-xs"></i>
                                            </button>
                                        </div>
                                        @if ($errors->has('foto_gallery_3') && old('_form') === 'edit')
                                            <p class="text-red-500 text-xs mt-1">{{ $errors->first('foto_gallery_3') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3 shrink-0">
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
            <div x-data="{ open: false, ProdukId: null, ProdukNama: '' }"
                @open-modal-delete.window="
                    open = true;
                    ProdukId = $event.detail.id;
                    ProdukNama = $event.detail.nama;
                "
                x-show="open" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-0" x-cloak>
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm"
                    @click="open = false"></div>

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
                        <h3 class="text-xl font-bold text-dark mb-2">Hapus Produk?</h3>
                        <p class="text-sm text-muted px-4">Anda akan menghapus data Produk <span
                                class="font-bold text-dark" x-text="ProdukNama"></span>. Aksi ini tidak dapat dibatalkan.
                        </p>
                    </div>

                    <form :action="`/admin/Produk/${ProdukId}`" method="POST"
                        class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-center gap-3">
                        @csrf
                        @method('DELETE')
                        <button type="button" @click="open = false"
                            class="flex-1 px-4 py-2 bg-white border border-slate-200 rounded-md text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-dark transition cursor-pointer">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-2 bg-red-600 border border-red-600 rounded-md text-sm font-semibold text-white hover:bg-red-700 transition shadow-sm cursor-pointer">
                            Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endpush
    </div>
</x-admin-template>
