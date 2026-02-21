<section class="py-24 bg-slate-50 relative overflow-hidden" id="about">
    <!-- Decorative Background Shapes -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-secondary/5 rounded-full blur-3xl"></div>
    </div>

    <div class="px-4 xl:max-w-[1300px] mx-auto">
        <!-- Reusable Heading Section Component -->
        <x-heading-section 
            title="Tentang Petshop Kami" 
            subtitle="Kenali Kami Lebih Dekat" 
            align="center"
        />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center mt-16">
            
            <!-- Left: Image Layout with Alpine Interactivity -->
            <div class="relative" data-aos="fade-right">
                <div x-data="{ hovered: false }" 
                     @mouseenter="hovered = true" 
                     @mouseleave="hovered = false"
                     class="relative z-10 rounded-3xl overflow-hidden shadow-2xl transition-all duration-500 border-4 border-white"
                     :class="hovered ? 'scale-[1.02] shadow-primary/20 cursor-pointer' : 'scale-100'">
                    
                    <!-- Dummy Image -->
                    <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?q=80&w=2688&auto=format&fit=crop" alt="Tentang Petshop Kami" class="w-full h-auto object-cover aspect-[4/3] lg:aspect-[4/5] transition-transform duration-700" :class="hovered ? 'scale-110' : 'scale-100'">
                    
                    <!-- Hover Overlay Info -->
                    <div class="absolute inset-0 bg-gradient-to-t from-dark/80 via-dark/20 to-transparent flex flex-col justify-end p-8 opacity-0 transition-opacity duration-300"
                         :class="hovered ? 'opacity-100' : 'opacity-0'">
                        <div class="transform translate-y-4 transition-transform duration-300" :class="hovered ? 'translate-y-0' : 'translate-y-4'">
                            <h4 class="text-white text-xl font-bold mb-2">Pet Care Terbaik</h4>
                            <p class="text-slate-200 text-sm">Memberikan cinta dan perhatian untuk setiap sahabat peliharaan Anda.</p>
                        </div>
                    </div>
                </div>

                <!-- Floating Badge / Stats Elements -->
                <div class="absolute -bottom-6 right-4 sm:-right-2 md:bottom-12 md:-right-6 lg:-right-12 bg-white p-4 md:p-5 rounded-2xl shadow-xl z-20 flex items-center gap-4 md:gap-5 border border-slate-100" data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-gradient-to-br from-primary to-emerald-400 text-white rounded-full flex items-center justify-center text-xl md:text-2xl font-bold shadow-lg shadow-primary/30 shrink-0">
                        5+
                    </div>
                    <div>
                        <p class="text-xs md:text-sm text-muted font-medium uppercase tracking-wider">Tahun</p>
                        <p class="text-base md:text-lg text-dark font-bold">Pengalaman</p>
                    </div>
                </div>
                
                <!-- Extra Decorative Element -->
                <div class="absolute -top-6 -left-6 bg-secondary/10 w-32 h-32 rounded-full blur-2xl -z-10"></div>
            </div>

            <!-- Right: Content -->
            <div class="flex flex-col gap-8" data-aos="fade-left" data-aos-delay="100">
                <div class="space-y-4">
                    <h3 class="text-3xl md:text-4xl font-bold text-dark leading-snug">
                        Merawat Peliharaan Anda <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-emerald-500">Sepenuh Hati</span>
                    </h3>
                    
                    <p class="text-muted text-lg leading-relaxed">
                        Kami percaya bahwa setiap peliharaan adalah bagian dari keluarga. Oleh karena itu, kami hadir untuk menyediakan produk, layanan, dan perawatan terbaik demi kebahagiaan dan kesehatan sahabat berbulu Anda.
                    </p>
                </div>

                <!-- Features List -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-2">
                    <!-- Feature 1 -->
                    <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-white hover:shadow-lg transition-all border border-transparent hover:border-slate-100 group">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-primary group-hover:text-white transition-all">
                            🐾
                        </div>
                        <div>
                            <h4 class="font-bold text-dark text-lg mb-1">Produk Premium</h4>
                            <p class="text-sm text-muted leading-relaxed">Pilihan makanan dan perlengkapan berkualitas tinggi.</p>
                        </div>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-white hover:shadow-lg transition-all border border-transparent hover:border-slate-100 group">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-secondary/10 text-secondary flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-secondary group-hover:text-white transition-all">
                            ❤️
                        </div>
                        <div>
                            <h4 class="font-bold text-dark text-lg mb-1">Staf Ramah</h4>
                            <p class="text-sm text-muted leading-relaxed">Dilayani oleh pecinta hewan yang profesional.</p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-white hover:shadow-lg transition-all border border-transparent hover:border-slate-100 group">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-blue-500 group-hover:text-white transition-all">
                            🏥
                        </div>
                        <div>
                            <h4 class="font-bold text-dark text-lg mb-1">Klinik 24 Jam</h4>
                            <p class="text-sm text-muted leading-relaxed">Layanan medis sigap kapan pun dibutuhkan.</p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-white hover:shadow-lg transition-all border border-transparent hover:border-slate-100 group">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-purple-500/10 text-purple-500 flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-purple-500 group-hover:text-white transition-all">
                            ✂️
                        </div>
                        <div>
                            <h4 class="font-bold text-dark text-lg mb-1">Grooming & Spa</h4>
                            <p class="text-sm text-muted leading-relaxed">Perawatan mandi dan bulu agar tampil maksimal.</p>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <div class="mt-4 flex items-center gap-4">
                    <a href="#" class="btn-primary group relative overflow-hidden">
                        <span class="relative z-10 flex items-center transition-colors group-hover:text-white">
                            Lebih Lanjut Tentang Kami
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 transform group-hover:translate-x-1.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
