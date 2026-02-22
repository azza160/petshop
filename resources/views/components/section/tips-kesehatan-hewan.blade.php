<section id="tips-kesehatan" class="py-24 bg-slate-50 relative overflow-hidden">
    <!-- Decorative Background Shapes & Bridge Effect -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-[10%] left-[-5%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-3xl" data-aos="fade-in" data-aos-duration="2000"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[35%] h-[35%] bg-secondary/5 rounded-full blur-3xl flex" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="200"></div>
        <!-- subtle grid as bridge -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9IiMwZjE3MmEiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-40 mix-blend-multiply" style="mask-image: linear-gradient(to bottom, transparent, white, white, transparent); -webkit-mask-image: linear-gradient(to bottom, transparent, white, white, transparent);"></div>
    </div>

    <div class="px-4 xl:max-w-[1300px] mx-auto w-full z-10 relative">
        <x-heading-section title="Tips & Kesehatan Hewan" subtitle="Panduan Perawatan" align="center" class="mb-12" />

        <!-- Bento Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 xl:gap-8 mt-12">
            
            <!-- Item 1: Large Featured Card (Spans 2 cols, 2 rows) -->
            <div data-aos="fade-up" class="md:col-span-2 lg:col-span-2 lg:row-span-2 relative rounded-[2rem] overflow-hidden shadow-lg group cursor-pointer min-h-[400px] lg:min-h-full">
                <!-- Background Image -->
                <img src="https://images.unsplash.com/photo-1628009368231-7bb7cbcb8122?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Pemeriksaan Rutin" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-dark/95 via-dark/40 to-transparent transition-opacity duration-500"></div>
                
                <!-- Content -->
                <div class="absolute bottom-0 left-0 w-full p-6 md:p-8 flex flex-col justify-end">
                    <div class="mb-2">
                        <span class="inline-block px-3 py-1 bg-primary text-white text-xs font-bold rounded-full shadow-md mb-3 transform -translate-y-2 group-hover:translate-y-0 transition-transform duration-300">Penting</span>
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-3 group-hover:text-emerald-300 transition-colors drop-shadow-md">Pentingnya Vaksinasi Rutin untuk Kucing & Anjing</h3>
                        <p class="text-slate-200 text-sm md:text-base line-clamp-2 md:line-clamp-3 mb-5 opacity-90">Vaksinasi adalah langkah pencegahan paling efektif untuk melindungi hewan peliharaan kesayangan Anda dari berbagai penyakit menular dan mematikan.</p>
                        
                        <!-- Author / Meta -->
                        <div class="flex items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1594824432258-410d5106199f?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Dr. Hewan" class="w-10 h-10 rounded-full border-2 border-white/20 object-cover shadow-sm">
                            <div>
                                <p class="text-sm font-semibold text-white">Drh. Ananda</p>
                                <p class="text-[11px] text-slate-300 font-medium">5 Min read • 1.2K Views</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Hover Play/Read Icon -->
                <div class="absolute top-6 right-6 w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 border border-white/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </div>
            </div>

            <!-- Item 2: Horizontal Card (Spans 2 cols, 1 row) -->
            <div data-aos="fade-up" data-aos-delay="100" class="md:col-span-2 lg:col-span-2 lg:row-span-1 bg-white rounded-[2rem] p-4 sm:p-6 shadow-sm hover:shadow-xl hover:shadow-primary/5 transition-all duration-300 border border-slate-100 flex flex-col sm:flex-row gap-5 items-center group cursor-pointer relative overflow-hidden">
                <!-- Image -->
                <div class="w-full sm:w-1/3 aspect-[2/1] sm:aspect-square sm:max-w-[160px] shrink-0 rounded-2xl overflow-hidden bg-slate-100 relative">
                    <img src="https://images.unsplash.com/photo-1589924691995-400dc9ecc119?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Nutrisi Hewan" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <!-- Content -->
                <div class="flex-1 text-center sm:text-left">
                    <span class="text-xs font-bold text-secondary bg-secondary/10 px-2.5 py-1 rounded-md mb-3 inline-block uppercase tracking-wider">Nutrisi</span>
                    <h4 class="text-xl font-bold text-dark group-hover:text-primary transition-colors mb-2 leading-tight">Memilih Makanan yang Tepat Sesuai Usia</h4>
                    <p class="text-sm text-muted line-clamp-2 mb-4">Kebutuhan nutrisi anak anjing sangat berbeda dengan anjing senior. Ketahui cara memilih takaran dan jenis makanan yang tepat.</p>
                    <div class="flex items-center justify-center sm:justify-start text-primary text-sm font-semibold group-hover:translate-x-1 transition-transform">
                        <span>Baca Artikel</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Item 3: Square Card 1 -->
            <div data-aos="fade-up" data-aos-delay="200" class="md:col-span-1 lg:col-span-1 lg:row-span-1 bg-emerald-50 rounded-[2rem] p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 border border-emerald-100 flex flex-col justify-between group cursor-pointer relative overflow-hidden h-full min-h-[220px]">
                <!-- Abstract Blob -->
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-primary/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="w-14 h-14 rounded-2xl bg-white text-primary flex items-center justify-center text-3xl mb-6 relative z-10 shadow-sm border border-emerald-100 shadow-primary/10 transform group-hover:-translate-y-2 transition-transform duration-300">
                    🛁
                </div>
                <div class="relative z-10 mt-auto">
                    <h4 class="text-lg font-bold text-dark group-hover:text-primary transition-colors mb-2 leading-snug">Tips Grooming di Rumah</h4>
                    <p class="text-[13px] text-slate-600 line-clamp-2 md:line-clamp-3">Cara memandikan dan memotong kuku peliharaan tanpa membuatnya stres.</p>
                </div>
                <!-- Hover Arrow -->
                <div class="absolute bottom-6 right-6 opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition-all duration-300">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Item 4: Square Card 2 -->
            <div data-aos="fade-up" data-aos-delay="300" class="md:col-span-1 lg:col-span-1 lg:row-span-1 bg-amber-50 rounded-[2rem] p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 border border-amber-100 flex flex-col justify-between group cursor-pointer relative overflow-hidden h-full min-h-[220px]">
                <!-- Abstract Blob -->
                <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-secondary/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="w-14 h-14 rounded-2xl bg-white text-secondary flex items-center justify-center text-3xl mb-6 relative z-10 shadow-sm border border-amber-100 shadow-secondary/10 transform group-hover:-translate-y-2 transition-transform duration-300">
                    🎾
                </div>
                <div class="relative z-10 mt-auto">
                    <h4 class="text-lg font-bold text-dark group-hover:text-secondary transition-colors mb-2 leading-snug">Pentingnya Waktu Bermain</h4>
                    <p class="text-[13px] text-slate-600 line-clamp-2 md:line-clamp-3">Aktivitas fisik mencegah obesitas dan menjaga kesehatan mental.</p>
                </div>
                <!-- Hover Arrow -->
                <div class="absolute bottom-6 right-6 opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition-all duration-300">
                    <div class="w-8 h-8 rounded-full bg-secondary text-white flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>

        <!-- Call to Action Bawah -->
        <div data-aos="fade-up" data-aos-delay="400" class="mt-14 flex items-center justify-center">
            <a href="#" class="inline-flex items-center justify-center bg-white text-dark border border-slate-200 px-8 py-3.5 rounded-xl font-bold hover:border-primary hover:text-primary transition-all shadow-sm shadow-slate-200/50 group">
                Jelajahi Semua Tips
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2.5 transform group-hover:translate-x-1.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

    </div>
</section>
