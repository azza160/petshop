<section class="py-24 relative overflow-hidden bg-slate-50" id="contact">
    
    <!-- Decorative Background Meshes / Blobs -->
    <div class="absolute top-0 right-0 w-full h-full overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-[5%] right-[-10%] w-[50%] h-[50%] bg-gradient-to-bl from-primary/10 to-emerald-400/5 rounded-full blur-[120px] mix-blend-multiply"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[40%] h-[40%] bg-gradient-to-tr from-primary/10 to-teal-300/5 rounded-full blur-[120px] mix-blend-multiply"></div>
        
        <!-- Subtle Pattern overlay -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9IiMwZjE3MmEiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-[0.15]" style="mask-image: radial-gradient(circle at center, black, transparent 80%); -webkit-mask-image: radial-gradient(circle at center, black, transparent 80%);"></div>
    </div>

    <div class="px-4 xl:max-w-[1200px] mx-auto z-10 relative">
        
        <!-- Reusable Heading Section Component -->
        <x-heading-section 
            title="Lokasi & Kontak" 
            subtitle="Kunjungan & Informasi" 
            align="center"
            class="mb-4"
        />
        
        <!-- Text Pengantar -->
        <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up" data-aos-delay="100">
            <p class="text-muted text-lg relative inline-block">
                Jangan ragu untuk menghubungi kami jika ada pertanyaan seputar produk maupun layanan perawatan peliharaan kesayangan Anda. Kami selalu siap membantu!
            </p>
        </div>

        <!-- 2 Column Layout Container -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch relative">
            
            <!-- Floating Decorative Element over the whole card area -->
            <div class="hidden lg:block absolute -top-10 -left-10 w-32 h-32 bg-primary/10 rounded-lg blur-2xl -z-10 animate-pulse"></div>

            <!-- Left: Main Hubungi Kami Card -->
            <div class="bg-white rounded-xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.1)] border border-slate-100 p-6 sm:p-8 flex flex-col h-full relative overflow-hidden" data-aos="fade-right">
                
                <!-- Tiny corner accent -->
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-primary/5 to-transparent"></div>

                <div class="mb-6 border-b border-primary/10 pb-4 flex items-center gap-3">
                    <div class="w-1.5 h-6 bg-gradient-to-b from-primary to-emerald-400 rounded-lg"></div>
                    <h3 class="text-xl font-bold text-dark">
                        Hubungi Kami
                    </h3>
                </div>

                <!-- Vertical Stack for Sub-cards -->
                <div class="flex flex-col gap-4 flex-1">
                    
                    <!-- Sub-Card: Instagram -->
                    <a href="https://instagram.com" target="_blank" class="bg-gradient-to-br from-emerald-50/50 to-primary/5 border border-emerald-100/60 rounded-md p-4 flex items-center gap-4 group hover:border-primary/50 hover:shadow-md hover:shadow-primary/10 transition-all duration-300">
                        <div class="w-12 h-12 rounded-md bg-gradient-to-tr from-yellow-400 via-rose-500 to-purple-600 text-white flex items-center justify-center shrink-0 shadow-sm shadow-rose-200 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-dark text-sm mb-0.5 group-hover:text-primary transition-colors">Instagram</h4>
                            <p class="text-dark font-semibold">@PetshopHarmoni</p>
                            <span class="text-[11px] text-emerald-600/80 block mt-0.5">Follow kami di Instagram</span>
                        </div>
                        <div class="text-slate-300 group-hover:text-primary transition-colors transform group-hover:translate-x-1 duration-300 pr-2">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </div>
                    </a>

                    <!-- Sub-Card: WhatsApp / Telepon -->
                    <a href="https://wa.me/6281234567890" target="_blank" class="bg-gradient-to-br from-emerald-50/50 to-primary/5 border border-emerald-100/60 rounded-md p-4 flex items-center gap-4 group hover:border-primary/30 hover:shadow-md hover:shadow-primary/10 transition-all duration-300">
                        <div class="w-12 h-12 rounded-md bg-gradient-to-br from-primary to-emerald-500 text-white flex items-center justify-center shrink-0 shadow-sm shadow-emerald-200 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-dark text-sm mb-0.5 group-hover:text-primary transition-colors">Telp & WhatsApp</h4>
                            <p class="text-dark font-semibold">0812-3456-7890</p>
                            <span class="text-[11px] text-emerald-600/80 block mt-0.5">Konsultasi cepat via Chat</span>
                        </div>
                        <div class="text-slate-300 group-hover:text-primary transition-colors transform group-hover:translate-x-1 duration-300 pr-2">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </div>
                    </a>

                    <!-- Sub-Card: Operational Hours -->
                    <div class="bg-gradient-to-br from-emerald-50/50 to-primary/5 border border-emerald-100/60 rounded-md p-4 flex items-center gap-4 group hover:border-primary/30 hover:shadow-md hover:shadow-primary/10 transition-all duration-300 cursor-default">
                        <div class="w-12 h-12 rounded-md bg-gradient-to-br from-secondary to-orange-400 text-white flex items-center justify-center shrink-0 shadow-sm shadow-amber-300 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-dark text-sm mb-0.5 group-hover:text-primary transition-colors">Jam Operasional</h4>
                            <p class="text-dark font-semibold">08:00 - 20:00</p>
                            <span class="text-[11px] text-emerald-600/80 block mt-0.5">Senin s/d Sabtu (Minggu Libur)</span>
                        </div>
                    </div>

                    <!-- Sub-Card: Address -->
                    <div class="bg-gradient-to-br from-emerald-50/50 to-primary/5 border border-emerald-100/60 rounded-md p-4 flex items-center gap-4 group hover:border-primary/30 hover:shadow-md hover:shadow-primary/10 transition-all duration-300 cursor-default">
                        <div class="w-12 h-12 rounded-md bg-gradient-to-br from-blue-500 to-indigo-500 text-white flex items-center justify-center shrink-0 shadow-sm shadow-blue-300 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-dark text-sm mb-0.5 group-hover:text-primary transition-colors">Alamat Pusat</h4>
                            <p class="text-dark font-semibold line-clamp-1">Jl. Satwa Harmoni No. 12</p>
                            <span class="text-[11px] text-emerald-600/80 block mt-0.5">Kunjungi toko fisik kami</span>
                        </div>
                    </div>

                </div>
                
                <!-- Extra accent line at bottom of left card -->
                <div class="absolute bottom-0 left-0 w-full h-1 bg-primary opacity-30"></div>
            </div>

            <!-- Right: Embedded Google Maps -->
            <div class="w-full min-h-[350px] lg:min-h-full h-full p-2" data-aos="fade-left" data-aos-delay="200">
                
                <!-- Map Container with decorative wrapper -->
                <div class="relative w-full h-full rounded-xl bg-white p-2 border border-slate-100 shadow-[0_10px_40px_-15px_rgba(0,0,0,0.1)] group overflow-hidden">
                    
                    <!-- Map wrapper with border radius limit -->
                    <div class="w-full h-full rounded-md overflow-hidden bg-slate-100 relative shadow-inner">
                        
                        <!-- Overlay gradient gives it a colored glow that fades on hover -->
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/20 via-transparent to-transparent pointer-events-none mix-blend-multiply z-10 transition-opacity duration-700 group-hover:opacity-0"></div>
                        
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.504246949826!2d106.82111749851608!3d-6.180218898166548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f436b8c94b07%3A0x6ea77169bedcb6f0!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                            class="absolute inset-0 w-full h-full border-0 grayscale opacity-90 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
