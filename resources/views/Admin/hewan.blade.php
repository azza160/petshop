<x-admin-template>
    <x-slot:title>Data Hewan</x-slot>
    <x-slot:headerTitle>Data Hewan</x-slot>

    <!-- Page Header & Breadcrumb -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-dark mb-1">Manajemen Hewan</h2>
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
                            <span class="ml-1 md:ml-2 text-slate-800">Hewan</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    @php
        // Dummy data untuk visualisasi UI tanpa integrasi database
        $hewans = [
            (object) [
                'id' => 1,
                'photo' =>
                    'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
                'nama' => 'Milo (Persia)',
                'category' => 'Kucing',
                'jenis_kelamin' => 'jantan',
                'deskripsi' =>
                    'Kucing persia asli yang sangat lucu dan lincah. Sudah divaksin lengkap dan rutin pemeriksaan dokter hewan.',
                'harga' => 1500000,
                'asal_hewan' => 'lokal',
            ],
            (object) [
                'id' => 2,
                'photo' =>
                    'https://images.unsplash.com/photo-1543466835-00a7907e9de1?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
                'nama' => 'Bella (Beagle)',
                'category' => 'Anjing',
                'jenis_kelamin' => 'betina',
                'deskripsi' =>
                    'Anjing jenis beagle yang sangat aktif dan ramah. Cocok untuk diajak bermain dan penjaga rumah.',
                'harga' => 2500000,
                'asal_hewan' => 'hasil_breeding',
            ],
        ];
    @endphp

    <!-- Alpine state -->
    <div x-data="{
        search: '',
        kategori: 'semua',
        jenis_kelamin: 'semua',
        asal_hewan: 'semua'
    }">

        <!-- Toolbar (Filters & Search) -->
        <div class="bg-white rounded-md shadow-sm border border-slate-100 p-4 mb-6" data-aos="fade-up">
            <div class="flex flex-col lg:flex-row justify-between gap-4">

                <!-- Filters Container -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 flex-1">
                    <!-- Search Input -->
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph ph-magnifying-glass text-muted"></i>
                        </div>
                        <input type="text" x-model="search" placeholder="Cari nama hewan..."
                            class="block w-full pl-10 pr-3 py-2 border border-slate-200 rounded-md leading-5 bg-slate-50 placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition duration-150 ease-in-out sm:text-sm">
                    </div>

                    <!-- Category Filter -->
                    <div class="relative w-full">
                        <select x-model="kategori"
                            class="block w-full pl-3 pr-10 py-2 text-base border-slate-200 bg-slate-50 border rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm transition duration-150 ease-in-out appearance-none">
                            <option value="semua">Semua Kategori</option>
                            <option value="kucing">Kucing</option>
                            <option value="anjing">Anjing</option>
                            <option value="burung">Burung</option>
                            <option value="ikan">Ikan</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted">
                            <i class="ph ph-caret-down"></i>
                        </div>
                    </div>

                    <!-- Gender Filter -->
                    <div class="relative w-full">
                        <select x-model="jenis_kelamin"
                            class="block w-full pl-3 pr-10 py-2 text-base border-slate-200 bg-slate-50 border rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm transition duration-150 ease-in-out appearance-none">
                            <option value="semua">Semua Gender</option>
                            <option value="jantan">Jantan</option>
                            <option value="betina">Betina</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-muted">
                            <i class="ph ph-caret-down"></i>
                        </div>
                    </div>

                    <!-- Origin Filter -->
                    <div class="relative w-full">
                        <select x-model="asal_hewan"
                            class="block w-full pl-3 pr-10 py-2 text-base border-slate-200 bg-slate-50 border rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm transition duration-150 ease-in-out appearance-none">
                            <option value="semua">Semua Asal</option>
                            <option value="lokal">Lokal</option>
                            <option value="impor">Impor</option>
                            <option value="hasil_breeding">Hasil Breeding</option>
                            <option value="rescue">Rescue</option>
                            <option value="titipan">Titipan</option>
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
                        Tambah Hewan
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
                            <th class="p-4 font-semibold">J. Kelamin</th>
                            <th class="p-4 font-semibold min-w-[200px]">Deskripsi</th>
                            <th class="p-4 font-semibold">Harga</th>
                            <th class="p-4 font-semibold">Asal Hewan</th>
                            <th class="p-4 font-semibold text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-slate-100 text-slate-700">
                        @forelse($hewans as $hewan)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="p-4 text-center text-muted font-medium">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-4">
                                    <img src="{{ $hewan->photo }}" alt="{{ $hewan->nama }}"
                                        @click="$dispatch('open-global-image', { src: '{{ $hewan->photo }}' })"
                                        class="w-12 h-12 rounded-md object-cover border border-slate-200 cursor-pointer hover:opacity-80 transition-opacity shadow-sm">
                                </td>
                                <td class="p-4">
                                    <span class="font-semibold text-dark">{{ $hewan->nama }}</span>
                                </td>
                                <td class="p-4">
                                    <span
                                        class="px-2.5 py-1 bg-primary/10 text-primary rounded-md text-xs font-semibold border border-primary/20">
                                        {{ $hewan->category }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    @if ($hewan->jenis_kelamin === 'jantan')
                                        <span
                                            class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-md text-xs font-medium border border-blue-100 flex items-center gap-1 w-max">
                                            <i class="ph ph-gender-male"></i> Jantan
                                        </span>
                                    @else
                                        <span
                                            class="px-2.5 py-1 bg-pink-50 text-pink-600 rounded-md text-xs font-medium border border-pink-100 flex items-center gap-1 w-max">
                                            <i class="ph ph-gender-female"></i> Betina
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <p class="text-xs text-muted leading-relaxed max-w-xs whitespace-normal line-clamp-2"
                                        title="{{ $hewan->deskripsi }}">
                                        {{ $hewan->deskripsi }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <span class="font-semibold text-dark">Rp
                                        {{ number_format($hewan->harga, 0, ',', '.') }}</span>
                                </td>
                                <td class="p-4">
                                    <span
                                        class="text-xs font-medium text-slate-500 capitalize px-2 py-1 bg-slate-100 rounded-md">
                                        {{ str_replace('_', ' ', $hewan->asal_hewan) }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center justify-center gap-2 text-lg">
                                        <a href="{{ route('admin.hewan.detail') }}"
                                            class="p-1.5 text-emerald-600 hover:text-white hover:bg-emerald-600 rounded-md transition cursor-pointer"
                                            title="Detail">
                                            <i class="ph ph-eye"></i>
                                        </a>
                                        <button @click="$dispatch('open-modal-edit')"
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
                        @empty
                            <tr>
                                <td colspan="9" class="p-8 text-center text-muted">
                                    <div class="flex flex-col items-center gap-3">
                                        <i class="ph ph-paw-print text-4xl text-slate-300"></i>
                                        <p class="font-semibold">Tidak ada data hewan ditemukan.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination (Placeholder) -->
            <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-muted text-center sm:text-left">
                        Menampilkan <span class="font-semibold text-dark">1</span> - <span
                            class="font-semibold text-dark">2</span> dari <span
                            class="font-semibold text-dark">2</span> data
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
            <div x-data="{ open: false }" @open-modal-add.window="open = true" x-show="open"
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
                        <h3 class="text-lg font-bold text-dark">Tambah Data Hewan</h3>
                        <button @click="open = false" class="text-muted hover:text-dark transition cursor-pointer">
                            <i class="ph ph-x text-xl"></i>
                        </button>
                    </div>

                    <form class="flex-1 overflow-y-auto w-full scrollbar-thin scrollbar-thumb-slate-200">
                        <div class="p-6 space-y-5">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <!-- Nama -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Nama Hewan</label>
                                    <input type="text" placeholder="Masukkan nama hewan"
                                        class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition text-slate-700">
                                </div>

                                <!-- Kategori -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Kategori</label>
                                    <select
                                        class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition bg-white cursor-pointer text-slate-700">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        <option value="1">Kucing</option>
                                        <option value="2">Anjing</option>
                                    </select>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Jenis Kelamin</label>
                                    <select
                                        class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition bg-white cursor-pointer text-slate-700">
                                        <option value="" disabled selected>Pilih Gender</option>
                                        <option value="jantan">Jantan</option>
                                        <option value="betina">Betina</option>
                                    </select>
                                </div>

                                <!-- Asal Hewan -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Asal Hewan</label>
                                    <select
                                        class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition bg-white cursor-pointer text-slate-700">
                                        <option value="" disabled selected>Pilih Asal</option>
                                        <option value="lokal">Lokal</option>
                                        <option value="impor">Impor</option>
                                        <option value="hasil_breeding">Hasil Breeding</option>
                                        <option value="rescue">Rescue</option>
                                        <option value="titipan">Titipan</option>
                                    </select>
                                </div>

                                <!-- Umur -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Umur (Bulan)</label>
                                    <input type="number" min="0" placeholder="Misal: 12"
                                        class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition text-slate-700">
                                </div>

                                <!-- Berat -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Berat (Kg)</label>
                                    <input type="number" step="0.01" min="0" placeholder="Misal: 4.5"
                                        class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition text-slate-700">
                                </div>

                                <!-- Harga -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Harga (Rp)</label>
                                    <input type="number" min="0" placeholder="Misal: 1500000"
                                        class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition text-slate-700">
                                </div>

                                <!-- Stok / Jumlah -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Stok / Jumlah</label>
                                    <input type="number" min="0" placeholder="Misal: 1"
                                        class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition text-slate-700">
                                </div>

                                <!-- Sudah Steril -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-2">Sudah Steril?</label>
                                    <div class="flex items-center gap-4">
                                        <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                            <input type="radio" name="sudah_steril" value="1"
                                                class="text-primary focus:ring-primary border-slate-300">
                                            Ya
                                        </label>
                                        <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                            <input type="radio" name="sudah_steril" value="0"
                                                class="text-primary focus:ring-primary border-slate-300" checked>
                                            Belum
                                        </label>
                                    </div>
                                </div>

                                <!-- Foto Utama -->
                                <div>
                                    <label class="block text-sm font-semibold text-dark mb-1">Foto Utama</label>
                                    <input type="file" accept="image/*"
                                        class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition text-slate-700 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label class="block text-sm font-semibold text-dark mb-1">Deskripsi</label>
                                <textarea rows="4" placeholder="Tuliskan deskripsi lengkap tentang hewan ini..."
                                    class="w-full px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm transition text-slate-700 resize-none"></textarea>
                            </div>
                        </div>

                        <div
                            class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3 shrink-0">
                            <button type="button" @click="open = false"
                                class="px-4 py-2 bg-white border border-slate-200 rounded-md text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-dark transition cursor-pointer">
                                Batal
                            </button>
                            <button type="button"
                                class="px-4 py-2 bg-primary border border-primary rounded-md text-sm font-semibold text-white hover:bg-emerald-600 transition shadow-sm cursor-pointer">
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Edit Data Modal (Placeholder) -->
            <div x-data="{ open: false }" @open-modal-edit.window="open = true" x-show="open"
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
                        <h3 class="text-lg font-bold text-dark">Edit Data Hewan</h3>
                        <button @click="open = false" class="text-muted hover:text-dark transition cursor-pointer">
                            <i class="ph ph-x text-xl"></i>
                        </button>
                    </div>

                    <div class="p-8 text-center text-muted">
                        <i class="ph ph-pencil-simple text-4xl text-slate-300 mb-2 block"></i>
                        <p>Form edit mirip dengan tambah data. Ditampilkan dummy form.</p>
                    </div>

                    <div
                        class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3 shrink-0">
                        <button type="button" @click="open = false"
                            class="px-4 py-2 bg-white border border-slate-200 rounded-md text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-dark transition cursor-pointer">
                            Batal
                        </button>
                        <button type="button" @click="open = false"
                            class="px-4 py-2 bg-blue-600 border border-blue-600 rounded-md text-sm font-semibold text-white hover:bg-blue-700 transition shadow-sm cursor-pointer">
                            Update Data
                        </button>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div x-data="{ open: false }" @open-modal-delete.window="open = true" x-show="open"
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
                    class="relative bg-white rounded-md shadow-xl sm:w-full sm:max-w-sm overflow-hidden text-center">

                    <div class="p-6 pt-8">
                        <div
                            class="w-16 h-16 bg-red-100 text-red-600 rounded-md flex items-center justify-center text-3xl mx-auto mb-4">
                            <i class="ph ph-warning-circle"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-2">Hapus Hewan?</h3>
                        <p class="text-sm text-muted px-4">Anda akan menghapus data hewan ini. Aksi ini tidak dapat
                            dibatalkan.</p>
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
