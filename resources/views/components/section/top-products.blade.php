@props([])

<section id="top-products" class="relative py-20 bg-slate-50/50" x-data="topProductsCarousel()" x-init="initCarousel()">

    <!-- Background Decor (Circles & Blurs) -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute top-[20%] right-[-10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-3xl" data-aos="fade-in"
            data-aos-duration="2000"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[35%] h-[35%] bg-secondary/5 rounded-full blur-3xl flex"
            data-aos="fade-in" data-aos-duration="2000" data-aos-delay="200"></div>
    </div>

    <div class="px-4 xl:max-w-[1300px] mx-auto w-full relative z-10">
        <x-heading-section title="Top Produk Terbaik" subtitle="Katalog Lengkap" align="center" class="mb-0" />

        <!-- Header & Nav Buttons -->
        <div class="flex items-center justify-center sm:justify-end mb-10 sm:pr-3">
            <!-- Custom Navigation Group -->
            <div class="flex items-center gap-2 border border-slate-200 p-1 rounded-md bg-white shadow-sm shrink-0"
                data-aos="fade-left">
                <button @click="prev()"
                    class="w-10 h-10 flex items-center justify-center rounded-md text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors cursor-pointer focus:outline-none"
                    aria-label="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </button>
                <div class="w-[1px] h-6 bg-slate-200"></div>
                <button @click="next()"
                    class="w-10 h-10 flex items-center justify-center rounded-md text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors cursor-pointer focus:outline-none"
                    aria-label="Next">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Carousel Container -->
        <div class="relative w-full mx-auto" @mouseenter="pause()" @mouseleave="play()">
            <!-- Cards Track -->
            <div class="overflow-hidden w-full pb-8"> <!-- pb-8 for shadow spread -->
                <!-- Inner track that slides -->
                <div class="flex transition-transform duration-500 ease-in-out"
                    :style="`transform: translateX(-${currentIndex * (100 / itemsPerSlide)}%);`">

                    <!-- Loop through cards from config using Blade -->
                    @foreach (config('top_products', []) as $index => $product)
                        <div class="flex-none px-3" :style="`width: ${100 / itemsPerSlide}%`">

                            <div class="bg-white rounded-2xl overflow-hidden group  transition-all duration-500 h-full flex flex-col relative border border-slate-100 shadow-md"
                                data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">

                                <!-- Decorative BG -->
                                <div
                                    class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-bl-full blur-2xl group-hover:scale-150 transition-transform duration-700 pointer-events-none z-0">
                                </div>

                                <!-- Image -->
                                <div
                                    class="relative w-full aspect-[4/3] bg-gradient-to-br from-slate-50 to-slate-100 flex items-center justify-center p-6 z-10 overflow-hidden">

                                    @if (isset($product['isTopSale']) && $product['isTopSale'])
                                        <div
                                            class="absolute top-8 left-8 z-20 bg-secondary text-white text-[10px] md:text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded shadow-sm">
                                            Top Sale
                                        </div>
                                    @endif

                                    <div
                                        class="relative w-full h-full transform group-hover:scale-105 transition-all duration-500 rounded-lg overflow-hidden shadow-sm bg-white">
                                        <div
                                            class="absolute inset-0 bg-black/5 mix-blend-multiply z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                        </div>
                                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                                            class="absolute inset-0 w-full h-full object-cover">
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-5 flex flex-col flex-1 relative z-10 bg-white">

                                    <!-- Category + Stock -->
                                    <div class="flex items-center justify-between mb-3">

                                        <span
                                            class="text-xs font-semibold text-primary bg-primary/10 px-2.5 py-1 rounded-sm border border-primary/20 uppercase tracking-wider">
                                            {{ $product['category'] }}
                                        </span>

                                        <!-- Stock Badge -->
                                        <div
                                            class="flex items-center gap-1.5 bg-slate-100 text-primary text-xs font-semibold px-2.5 py-1 rounded-md border border-primary">
                                            <!-- Box Icon (stok) -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 stroke-current"
                                                fill="none" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 7l9-4 9 4-9 4-9-4z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 7v10l9 4 9-4V7" />
                                            </svg>
                                            {{ $product['stock'] }}
                                        </div>
                                    </div>

                                    <!-- Product Name -->
                                    <h3
                                        class="text-lg font-bold text-dark mb-2 group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                                        {{ $product['name'] }}
                                    </h3>

                                    <!-- Description -->
                                    <p class="text-sm text-muted line-clamp-2 mb-4">
                                        {{ $product['description'] }}
                                    </p>

                                    <!-- Price + Cart -->
                                    <div class="flex items-center justify-between mb-4 border-t border-slate-100 pt-3">

                                        <div class="flex flex-col">
                                            <span
                                                class="text-[11px] text-muted uppercase tracking-wider font-semibold">Harga</span>
                                            <span class="text-xl font-bold text-secondary">
                                                Rp {{ number_format($product['price'], 0, ',', '.') }}
                                            </span>
                                        </div>

                                        <!-- Cart Button -->
                                        <button
                                            class="relative w-11 h-11 flex items-center justify-center bg-primary text-white rounded-lg hover:bg-emerald-600 transition shadow-sm shadow-primary/20 group">

                                            <!-- Cart Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 h-5 stroke-current group-hover:scale-110 transition-transform"
                                                fill="none" viewBox="0 0 24 24" stroke-width="2">
                                                <circle cx="9" cy="21" r="1"></circle>
                                                <circle cx="20" cy="21" r="1"></circle>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                </path>
                                            </svg>

                                            <!-- Plus Badge -->
                                            <span
                                                class="absolute -top-1 -right-1 w-4 h-4 bg-white text-primary text-[10px] font-bold rounded-full flex items-center justify-center shadow border">
                                                +
                                            </span>
                                        </button>
                                    </div>

                                    <!-- Detail Button Full Width -->
                                    <button
                                        class="w-full py-2.5 px-3  text-slate-50 text-sm font-semibold rounded-md bg-primary hover:bg-primary/70 cursor-pointer transition-all duration-300">
                                        Lihat Detail
                                    </button>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Indicators: Styled as minimalist dot progress -->
            <!-- Removed data-aos="fade-up" to ensure desktop visibility regardless of scroll triggers -->
            <div class="flex items-center justify-center gap-2 mt-4 relative z-20">
                <template x-for="(_, index) in totalSlides" :key="index">
                    <button @click="goTo(index)"
                        :class="currentIndex === index ? 'w-10 bg-primary' : 'w-2.5 bg-slate-300 hover:bg-slate-400'"
                        class="h-2.5 rounded-full transition-all duration-300 ease-out"
                        :aria-label="'Go to slide ' + (index + 1)"></button>
                </template>
            </div>

        </div>
    </div>
</section>

<!-- AlpineJS Carousel Logic -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('topProductsCarousel', () => ({
            currentIndex: 0,
            itemsPerSlide: 3,
            autoPlayInterval: null,
            totalItems: {{ count(config('top_products', [])) }},

            initCarousel() {
                this.updateItemsPerSlide();
                this.play();

                // Listen for window resize
                window.addEventListener('resize', () => {
                    this.updateItemsPerSlide();
                });
            },

            updateItemsPerSlide() {
                if (window.innerWidth < 768) {
                    this.itemsPerSlide = 1; // Mobile
                } else if (window.innerWidth < 1024) {
                    this.itemsPerSlide = 2; // Tablet
                } else {
                    this.itemsPerSlide = 3; // Desktop (3 cards max)
                }

                // Adjust index if needed to prevent empty space at the end
                if (this.currentIndex > this.totalSlides - 1) {
                    this.currentIndex = Math.max(0, this.totalSlides - 1);
                }
            },

            get totalSlides() {
                return Math.max(1, this.totalItems - this.itemsPerSlide + 1);
            },

            next() {
                if (this.currentIndex < this.totalSlides - 1) {
                    this.currentIndex++;
                } else {
                    this.currentIndex = 0; // Loop back
                }
            },

            prev() {
                if (this.currentIndex > 0) {
                    this.currentIndex--;
                } else {
                    this.currentIndex = this.totalSlides - 1; // Loop end
                }
            },

            goTo(index) {
                this.currentIndex = index;
            },

            play() {
                // Auto play every 3 seconds
                clearInterval(this.autoPlayInterval);
                this.autoPlayInterval = setInterval(() => {
                    this.next();
                }, 3000);
            },

            pause() {
                clearInterval(this.autoPlayInterval);
            }
        }))
    });
</script>
