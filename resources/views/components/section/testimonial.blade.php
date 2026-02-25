<section class="py-24 bg-slate-50 relative overflow-hidden" id="testimonial" x-data="testimonialCarousel()"
    x-init="initCarousel()">

    <!-- Decorative Background Splashes -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-[-10%] left-[20%] w-[30%] h-[30%] bg-primary/5 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-[10%] right-[-5%] w-[40%] h-[40%] bg-secondary/5 rounded-full blur-[120px]"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9IiMwZjE3MmEiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-50"
            style="mask-image: radial-gradient(circle at center, black, transparent 80%); -webkit-mask-image: radial-gradient(circle at center, black, transparent 80%);">
        </div>
    </div>

    <div class="px-4 xl:max-w-[1300px] mx-auto z-10 relative">
        <!-- Reusable Heading Section Component -->
        <x-heading-section title="Cerita Bahagia Mereka" subtitle="Testimoni Pelanggan" align="center" />

        <div class="text-center max-w-2xl mx-auto -mt-6 mb-12 lg:mb-16 text-muted font-medium" data-aos="fade-up"
            data-aos-delay="100">
            Dengarkan langsung dari para pecinta hewan bagaimana layanan kami telah membantu merawat dan memberikan
            kebahagiaan untuk peliharaan kesayangan mereka.
        </div>

        <!-- Carousel Wrapper with Side Buttons Layout -->
        <div
            class="relative flex items-center justify-center gap-4 lg:gap-8 w-full max-w-[1400px] mx-auto group/wrapper">

            <!-- Left Arrow Button -->
            <button @click="prev()"
                class="hidden md:flex absolute -left-4 lg:-left-12 xl:-left-16 z-20 w-12 h-12 lg:w-14 lg:h-14 items-center justify-center rounded-full bg-white text-slate-400 border border-slate-200 shadow-md hover:text-primary hover:border-primary/30 hover:shadow-lg transition-all focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed group-hover/wrapper:opacity-100 xl:opacity-0 cursor-pointer"
                aria-label="Previous Testimonial">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 lg:w-7 lg:h-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Carousel Track Container -->
            <!-- Using padding so cards don't scrape the absolute bounds -->
            <div class="relative w-full overflow-hidden px-2 pb-8 pt-4" @mouseenter="pause()" @mouseleave="play()">

                <!-- Inner slider track -->
                <!-- The gap is handled inside individual slides by adding padding -->
                <div class="flex transition-all duration-700 ease-[cubic-bezier(0.25,1,0.5,1)]"
                    :style="`transform: translateX(-${currentIndex * (100 / itemsPerSlide)}%);`">

                    <!-- Loop through Testimonials dynamically via JS configs -->
                    <template x-for="(review, index) in testimonials" :key="index">

                        <!-- Slide Item: Takes dynamic width depending on screen size. Py and Px gives breathing room for shadows -->
                        <div class="flex-none px-4 py-2" :style="`width: ${100 / itemsPerSlide}%`">

                            <!-- Testimonial Card with Hover Animation -->
                            <div class="bg-white rounded-[2rem] p-8 shadow-md border border-slate-100 relative group transition-all duration-500 ease-out hover:-translate-y-3 hover:shadow-2xl hover:shadow-primary/15 h-full flex flex-col justify-between"
                                :class="currentIndex <= index && index < (currentIndex + itemsPerSlide) ?
                                    'opacity-100 scale-100' :
                                    'opacity-50 scale-95 pointer-events-none'"
                                data-aos="fade-up" :data-aos-delay="index * 100">

                                <!-- Quote Icon -->
                                <div
                                    class="absolute top-6 right-8 text-6xl text-primary/10 font-serif leading-none group-hover:text-primary/20 group-hover:scale-110 group-hover:-rotate-6 transition-all duration-500 origin-center">
                                    &rdquo;
                                </div>

                                <div class="relative z-10 flex flex-col h-full">
                                    <!-- Stars -->
                                    <div
                                        class="flex gap-1 mb-6 text-secondary transform group-hover:scale-105 origin-left transition-transform duration-300">
                                        <template x-for="i in 5">
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                            </svg>
                                        </template>
                                    </div>

                                    <!-- Content -->
                                    <p class="text-dark/80 text-lg leading-relaxed italic flex-1" x-text="review.quote">
                                    </p>

                                    <!-- User Info Profile -->
                                    <div
                                        class="mt-8 flex items-center gap-4 border-t border-slate-100 pt-6 transform group-hover:translate-x-2 transition-transform duration-500">
                                        <div class="relative overflow-hidden rounded-full w-14 h-14 border-2 p-0.5 transition-colors duration-500"
                                            :class="review.colorBorder">
                                            <img :src="review.image" :alt="review.name"
                                                class="w-full h-full rounded-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-dark group-hover:text-primary transition-colors duration-300"
                                                x-text="review.name"></h4>
                                            <p class="text-sm font-medium" :class="review.colorText"
                                                x-text="review.role"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                </div>
            </div>

            <!-- Right Arrow Button -->
            <button @click="next()"
                class="hidden md:flex absolute -right-4 lg:-right-12 xl:-right-16 z-20 w-12 h-12 lg:w-14 lg:h-14 items-center justify-center rounded-full bg-white text-slate-400 border border-slate-200 shadow-md hover:text-primary hover:border-primary/30 hover:shadow-lg transition-all focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed group-hover/wrapper:opacity-100 xl:opacity-0 cursor-pointer"
                aria-label="Next Testimonial">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 lg:w-7 lg:h-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Mobile Controls & Progress Bar -->
        <div class="flex flex-col items-center justify-center w-full max-w-md mx-auto mt-6 px-4">

            <!-- Mobile Prev/Next (Visible only on small screens) -->
            <div class="flex md:hidden items-center justify-center gap-4 mb-6">
                <button @click="prev()"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-white text-slate-600 border border-slate-200 shadow-sm hover:text-primary active:scale-95 transition-all focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <div class="text-sm font-semibold text-muted">
                    <span x-text="currentIndex + 1"></span> / <span x-text="totalSlides"></span>
                </div>
                <button @click="next()"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-white text-slate-600 border border-slate-200 shadow-sm hover:text-primary active:scale-95 transition-all focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Indicators -->
            <div class="flex items-center justify-center gap-2 mt-8">
                <template x-for="(_, index) in totalSlides" :key="index">
                    <button @click="goTo(index)"
                        :class="currentIndex === index ? 'w-8 bg-primary' : 'w-2 bg-slate-300 hover:bg-slate-400'"
                        class="h-2 rounded-md transition-all duration-300 focus:outline-none"
                        :aria-label="'Go to slide ' + (index + 1)"></button>
                </template>
            </div>

        </div>

    </div>
</section>

<!-- AlpineJS Carousel Logic for Testimonial -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('testimonialCarousel', () => ({
            currentIndex: 0,
            itemsPerSlide: 3,
            autoPlayInterval: null,

            // Raw data to prevent spamming HTML
            testimonials: [{
                    name: "Sarah Amalia",
                    role: "Pemilik Kucing (Luna)",
                    quote: `"Pelayanan yang sangat ramah dan profesional! Kucing Persia saya mendapatkan treatment yang luar biasa saat di-grooming. Hasilnya sangat bersih, wangi, dan dia terlihat sangat nyaman."`,
                    image: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=2670&auto=format&fit=crop",
                    colorBorder: "border-primary/30",
                    colorText: "text-primary"
                },
                {
                    name: "Budi Santoso",
                    role: "Pemilik Anjing (Max)",
                    quote: `"Produk makanan dan vitamin yang dijual di sini sangat lengkap dan terjamin keasliannya. Golden Retriever saya jadi jauh lebih aktif dan nafsu makannya meningkat sejak beli vitamin dari sini."`,
                    image: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=2574&auto=format&fit=crop",
                    colorBorder: "border-secondary/30",
                    colorText: "text-secondary"
                },
                {
                    name: "Nadia Putri",
                    role: "Pemilik Reptil",
                    quote: `"Saya sangat merekomendasikan layanan kesehatan hewan di sini. Dokternya sangat ahli dan sabar menjelaskan kondisi iguana saya dengan detail. Terasa seperti keluarga sendiri!"`,
                    image: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=2788&auto=format&fit=crop",
                    colorBorder: "border-blue-400/30",
                    colorText: "text-blue-500"
                },
                {
                    name: "Rizky Firmansyah",
                    role: "Pemilik Kelinci",
                    quote: `"Tempat penitipan hewannya luar biasa bersih. Saya menitipkan kelinci saya selama seminggu ke luar kota dan setiap hari diberi update video. Sangat menenangkan pikiran."`,
                    image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=2787&auto=format&fit=crop",
                    colorBorder: "border-purple-400/30",
                    colorText: "text-purple-500"
                },
                {
                    name: "Rina Marlina",
                    role: "Pemilik Burung Nuri",
                    quote: `"Beli aksesoris dan kandang ukuran spesifik ternyata ada di sini. Harganya masuk akal kualitasnya premium. CS-nya juga membantu mencarikan ukuran yang pas tanpa memaksa."`,
                    image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=2787&auto=format&fit=crop",
                    colorBorder: "border-emerald-400/30",
                    colorText: "text-emerald-500"
                }
            ],

            initCarousel() {
                this.updateItemsPerSlide();
                this.play();

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

                if (this.currentIndex > this.totalSlides - 1) {
                    this.currentIndex = Math.max(0, this.totalSlides - 1);
                }
            },

            get totalSlides() {
                return Math.max(1, this.testimonials.length - this.itemsPerSlide + 1);
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
                clearInterval(this.autoPlayInterval);
                this.autoPlayInterval = setInterval(() => {
                    this.next();
                }, 4000);
            },

            pause() {
                clearInterval(this.autoPlayInterval);
            }
        }))
    });
</script>
