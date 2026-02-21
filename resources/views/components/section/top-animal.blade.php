@props([])

<section id="top-animals" class="relative py-20 bg-white" 
    x-data="topAnimalsCarousel()" 
    x-init="initCarousel()">
    
    <div class="px-4 xl:max-w-[1300px] mx-auto w-full">
         <x-heading-section title="Top Hewan Peliharaan" subtitle="Pilihan Favorit" align="center" class="mb-0" />
        <!-- Header & Nav -->
        <div class="flex  items-center justify-center sm:justify-end mb-7 sm:pr-3">     
            <!-- Custom Navigation Group -->
            <div class="flex items-center gap-2 border border-slate-200 p-1 rounded-md bg-white shadow-sm shrink-0">
                <button @click="prev()" 
                    class="w-10 h-10 flex items-center justify-center rounded-md text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors cursor-pointer focus:outline-none"
                    aria-label="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </button>
                <div class="w-[1px] h-6 bg-slate-200"></div>
                <button @click="next()" 
                    class="w-10 h-10 flex items-center justify-center rounded-md text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors cursor-pointer focus:outline-none"
                    aria-label="Next">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Carousel Container -->
        <div class="relative w-full mx-auto" @mouseenter="pause()" @mouseleave="play()">

            <!-- Cards Track -->
            <div class="overflow-hidden w-full">
                <!-- Inner track that slides -->
                <div class="flex transition-transform duration-500 ease-in-out"
                     :style="`transform: translateX(-${currentIndex * (100 / itemsPerSlide)}%);`">
                     
                    <!-- Loop through cards from config using Blade -->
                    @foreach (config('top_animals') as $index => $animal)
                        <div class="flex-none px-3" 
                             :style="`width: ${100 / itemsPerSlide}%`">
                            
                            <!-- Animal Card -->
                            <div class="bg-white border border-slate-200 shadow-sm rounded-md overflow-hidden group hover:shadow-lg transition-all duration-300 h-full flex flex-col relative"
                                 data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                                
                                <!-- Top Sale Badge -->
                                @if(isset($animal['isTopSale']) && $animal['isTopSale'])
                                <div class="absolute top-5 right-5 z-10 bg-secondary text-white text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded shadow-sm">
                                    Top Sale
                                </div>
                                @endif

                                <!-- Image Container with Padding -->
                                <div class="relative w-full aspect-[4/3] bg-slate-100 flex items-center justify-center p-4">
                                    <div class="w-full h-full rounded-sm overflow-hidden relative">
                                        <img src="{{ $animal['image'] }}" alt="{{ $animal['name'] }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                </div>
                                
                                <!-- Content -->
                                <div class="p-5 flex flex-col flex-1">
                                    
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-xs font-semibold text-primary bg-primary/10 px-2 py-1 rounded-sm uppercase tracking-wider">{{ $animal['category'] }}</span>
                                        <span class="text-xs text-muted font-medium bg-slate-100 px-2 py-1 rounded-sm flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>{{ $animal['age'] }}</span>
                                        </span>
                                    </div>

                                    <h3 class="text-lg font-bold text-dark mt-1 mb-2 group-hover:text-primary transition-colors line-clamp-1">{{ $animal['name'] }}</h3>
                                    <p class="text-sm text-muted line-clamp-2 mb-4 flex-1">{{ $animal['description'] }}</p>
                                    
                                    <div class="flex items-center justify-between pt-4 border-t border-slate-100 mb-4">
                                        <div class="flex flex-col">
                                            <span class="text-[10px] text-muted mb-0.5 uppercase tracking-wider font-semibold">Harga</span>
                                            <span class="text-lg font-bold text-secondary">Rp {{ number_format(isset($animal['price']) ? $animal['price'] : 0, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-xs text-emerald-600 font-medium bg-emerald-50 px-2 py-1 rounded-sm border border-emerald-100">{{ $animal['status'] }}</span>
                                        </div>
                                    </div>
                                    
                                    <!-- CTA Buttons -->
                                    <div class="grid grid-cols-2 gap-2 mt-auto">
                                        <button class="w-full py-2.5 px-3 border border-slate-300 text-slate-700 text-xs font-semibold rounded-md hover:bg-slate-50 hover:border-primary hover:text-primary transition-colors flex items-center justify-center gap-1">
                                            Lihat Detail
                                        </button>
                                        <button class="w-full py-2.5 px-3 bg-primary text-white text-xs font-semibold rounded-md hover:bg-emerald-600 transition-colors shadow-sm shadow-primary/20 flex items-center justify-center gap-1">
                                            Pesanan Khusus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>



            <!-- Indicators -->
            <div class="flex items-center justify-center gap-2 mt-8">
                <template x-for="(_, index) in totalSlides" :key="index">
                    <button @click="goTo(index)" 
                            :class="currentIndex === index ? 'w-8 bg-primary' : 'w-2 bg-slate-300 hover:bg-slate-400'"
                            class="h-2 rounded-md transition-all duration-300"
                            :aria-label="'Go to slide ' + (index + 1)"></button>
                </template>
            </div>

        </div>
    </div>
</section>

<!-- AlpineJS Carousel Logic -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('topAnimalsCarousel', () => ({
            currentIndex: 0,
            itemsPerSlide: 3,
            autoPlayInterval: null,
            totalItems: {{ count(config('top_animals')) }},

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
                    this.itemsPerSlide = 3; // Desktop
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
                // Auto play every 4 seconds
                clearInterval(this.autoPlayInterval);
                this.autoPlayInterval = setInterval(() => {
                    this.next();
                }, 2500); // Changed to 2.5s
            },

            pause() {
                clearInterval(this.autoPlayInterval);
            },

            formatRupiah(number) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(number);
            }
        }))
    });
</script>
