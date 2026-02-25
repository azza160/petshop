<div x-data="{ open: false, isScrolled: false }" @scroll.window="isScrolled = (window.pageYOffset > 20)" class="sticky top-0 z-50 w-full">

    <!-- Mobile Overlay -->
    <div x-show="open" x-cloak x-transition:enter="transition opacity-100 ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition opacity-100 ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="open = false"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-40 md:hidden"></div>

    <header class="transition-all duration-300 text-dark relative z-50"
        :class="(isScrolled || open) ? 'bg-white/95 backdrop-blur-md shadow-sm border-b border-slate-200/80' :
        'bg-transparent py-2'">
        <nav class="px-4 xl:max-w-[1300px] mx-auto flex items-center justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center gap-2">
                <span class="text-2xl">🐾</span>
                <span class="text-lg font-bold text-primary">Petshop</span>
            </div>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex items-center gap-8 text-sm font-medium">
                <li><a href="#hero" class="hover:text-primary transition">Beranda</a></li>
                <li><a href="#about" class="hover:text-primary transition">Tentang</a></li>
                <li><a href="#top-animals" class="hover:text-primary transition">Hewan</a></li>
                <li><a href="#tips-kesehatan" class="hover:text-primary transition">Tips</a></li>
                <li><a href="#top-products" class="hover:text-primary transition">Produk</a></li>
                <li><a href="#statistik" class="hover:text-primary transition">Statistik</a></li>
                <li><a href="#testimonial" class="hover:text-primary transition">Testimoni</a></li>
                <li><a href="#contact" class="hover:text-primary transition">Kontak</a></li>

            </ul>

            <!-- CTA -->
            <div class="hidden md:flex">
                <a href="#" class="btn-primary text-sm">
                    Hubungi Kami
                </a>
            </div>

            <!-- Mobile Button -->
            <button @click="open = !open" class="md:hidden text-2xl cursor-pointer relative w-8 h-8"
                aria-label="Toggle Menu">
                <!-- Hamburger -->
                <span x-show="!open" x-transition:enter="transition-all duration-200 ease-out"
                    x-transition:enter-start="opacity-0 rotate-45 scale-75"
                    x-transition:enter-end="opacity-100 rotate-0 scale-100"
                    x-transition:leave="transition-all duration-150 ease-in"
                    x-transition:leave-start="opacity-100 rotate-0 scale-100"
                    x-transition:leave-end="opacity-0 -rotate-45 scale-75"
                    class="absolute inset-0 flex items-center justify-center">
                    ☰
                </span>

                <!-- Close -->
                <span x-show="open" x-transition:enter="transition-all duration-200 ease-out"
                    x-transition:enter-start="opacity-0 -rotate-45 scale-75"
                    x-transition:enter-end="opacity-100 rotate-0 scale-100"
                    x-transition:leave="transition-all duration-150 ease-in"
                    x-transition:leave-start="opacity-100 rotate-0 scale-100"
                    x-transition:leave-end="opacity-0 rotate-45 scale-75"
                    class="absolute inset-0 flex items-center justify-center">
                    ✕
                </span>
            </button>



        </nav>

        <!-- Mobile Menu -->
        <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4"
            class="md:hidden origin-top overflow-hidden bg-white border-t border-slate-200/80 relative z-50">

            <ul class="flex flex-col p-4 gap-4 text-sm font-medium">
                <li><a href="#" @click="open=false" class="block hover:text-primary">Beranda</a></li>
                <li><a href="#" @click="open=false" class="block hover:text-primary">Tentang Kami</a></li>
                <li><a href="#" @click="open=false" class="block hover:text-primary">Hewan</a></li>
                <li><a href="#" @click="open=false" class="block hover:text-primary">Produk</a></li>
                <li><a href="#" @click="open=false" class="block hover:text-primary">Kontak</a></li>

                <li class="pt-2">
                    <a href="#" class="btn-primary w-full text-center">
                        Hubungi Kami
                    </a>
                </li>
            </ul>
        </div>





    </header>
</div>
