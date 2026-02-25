<div x-data="{
    open: false,
    isScrolled: false,
    activeSection: 'hero'
}" x-init="const sections = ['hero', 'about', 'top-animals', 'tips-kesehatan', 'top-products', 'statistik', 'testimonial', 'contact'];
const observerOptions = {
    root: null,
    rootMargin: '-20% 0px -70% 0px',
    threshold: 0
};
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            activeSection = entry.target.id;
        }
    });
}, observerOptions);
sections.forEach(id => {
    const el = document.getElementById(id);
    if (el) observer.observe(el);
});" @scroll.window="isScrolled = (window.pageYOffset > 20)"
    class="sticky top-0 z-50 w-full">

    <!-- Mobile Overlay -->
    <div x-show="open" x-cloak x-transition:enter="transition opacity-100 ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition opacity-100 ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="open = false"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-40 lg:hidden"></div>

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
            <ul class="hidden lg:flex items-center gap-8 text-sm font-medium">
                <li><a href="#hero" class="transition hover:text-primary"
                        :class="activeSection === 'hero' ? 'text-primary' : ''">Beranda</a></li>
                <li><a href="#about" class="transition hover:text-primary"
                        :class="activeSection === 'about' ? 'text-primary' : ''">Tentang</a></li>
                <li><a href="#top-animals" class="transition hover:text-primary"
                        :class="activeSection === 'top-animals' ? 'text-primary' : ''">Hewan</a></li>
                <li><a href="#tips-kesehatan" class="transition hover:text-primary"
                        :class="activeSection === 'tips-kesehatan' ? 'text-primary' : ''">Tips</a></li>
                <li><a href="#top-products" class="transition hover:text-primary"
                        :class="activeSection === 'top-products' ? 'text-primary' : ''">Produk</a></li>
                <li><a href="#statistik" class="transition hover:text-primary"
                        :class="activeSection === 'statistik' ? 'text-primary' : ''">Statistik</a></li>
                <li><a href="#testimonial" class="transition hover:text-primary"
                        :class="activeSection === 'testimonial' ? 'text-primary' : ''">Testimoni</a></li>
                <li><a href="#contact" class="transition hover:text-primary"
                        :class="activeSection === 'contact' ? 'text-primary' : ''">Kontak</a></li>
            </ul>

            <!-- CTA -->
            <div class="hidden lg:flex">
                <a href="#" class="btn-primary text-sm">
                    Hubungi Kami
                </a>
            </div>

            <!-- Mobile Button -->
            <button @click="open = !open" class="lg:hidden text-2xl cursor-pointer relative w-8 h-8"
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
            class="lg:hidden origin-top overflow-hidden bg-white border-t border-slate-200/80 relative z-50">

            <ul class="flex flex-col p-4 gap-4 text-sm font-medium">
                <li><a href="#hero" @click="open=false" class="block hover:text-primary"
                        :class="activeSection === 'hero' ? 'text-primary' : ''">Beranda</a></li>
                <li><a href="#about" @click="open=false" class="block hover:text-primary"
                        :class="activeSection === 'about' ? 'text-primary' : ''">Tentang Kami</a></li>
                <li><a href="#top-animals" @click="open=false" class="block hover:text-primary"
                        :class="activeSection === 'top-animals' ? 'text-primary' : ''">Hewan</a></li>
                <li><a href="#top-products" @click="open=false" class="block hover:text-primary"
                        :class="activeSection === 'top-products' ? 'text-primary' : ''">Produk</a></li>
                <li><a href="#contact" @click="open=false" class="block hover:text-primary"
                        :class="activeSection === 'contact' ? 'text-primary' : ''">Kontak</a></li>

                <li class="pt-2">
                    <a href="#" class="btn-primary w-full text-center">
                        Hubungi Kami
                    </a>
                </li>
            </ul>
        </div>
    </header>
</div>
