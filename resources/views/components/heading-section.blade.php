@props(['title', 'subtitle' => '', 'align' => 'center'])

<div 
    class="mb-12 flex flex-col {{ $align === 'center' ? 'items-center text-center' : ($align === 'right' ? 'items-end text-right' : 'items-start text-left') }}"
>
    @if($subtitle)
    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-semibold mb-4 border border-primary/20" data-aos="fade-up">
        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
        {{ $subtitle }}
    </div>
    @endif
    
    <h2 class="text-3xl md:text-5xl font-bold text-dark leading-tight" data-aos="fade-up" data-aos-delay="100">
        {{ $title }}
    </h2>
    
    <div class="w-24 h-1.5 bg-gradient-to-r from-primary to-secondary mt-6 rounded-full" data-aos="fade-up" data-aos-delay="200"></div>
</div>
