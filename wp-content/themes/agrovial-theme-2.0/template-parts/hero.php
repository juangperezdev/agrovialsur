<?php
$hero_bg = get_option('hero_image', get_template_directory_uri() . '/assets/images/hero-construction.jpg');
$hero_title = get_option('hero_title', 'INFRAESTRUCTURA PARA EL DESARROLLO PRIVADO EN RÍO NEGRO');
$hero_badge = get_option('hero_badge', '+25 años de experiencia en infraestructura vial');
$hero_desc = get_option('hero_description', 'Líderes en construcción y mantenimiento de infraestructura vial en la Patagonia. Proyectos públicos y privados con los más altos estándares de calidad.');

// Buttons
$btn1_text = get_option('hero_btn1_text', 'Nuestros Servicios');
$btn1_url = get_option('hero_btn1_url', '#servicios');
$btn2_text = get_option('hero_btn2_text', 'Ver Proyectos');
$btn2_url = get_option('hero_btn2_url', '#proyectos');

// Stats
$stats = [];
for ($i = 1; $i <= 4; $i++) {
    $default_val = '';
    $default_lbl = '';
    switch ($i) {
        case 1: $default_val = '500+'; $default_lbl = 'Proyectos Completados'; break;
        case 2: $default_val = '25+'; $default_lbl = 'Años de Experiencia'; break;
        case 3: $default_val = '1,200'; $default_lbl = 'Km Construidos'; break;
        case 4: $default_val = '98%'; $default_lbl = 'Clientes Satisfechos'; break;
    }
    $stats[] = [
        'value' => get_option("hero_stat{$i}_val", $default_val),
        'label' => get_option("hero_stat{$i}_lbl", $default_lbl),
    ];
}
?>
<section id="inicio" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="<?php echo esc_url($hero_bg); ?>" alt="<?php echo esc_attr($hero_title); ?>" class="w-full h-full object-cover" />
        <div class="absolute inset-0 hero-gradient"></div>
    </div>

    <!-- Content -->
    <div class="relative container mx-auto px-4 pt-20">
        <div class="max-w-4xl mx-auto text-center">
            <div class="animate-fade-up">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary/20 text-secondary border border-secondary/30 text-sm font-medium mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <?php echo esc_html($hero_badge); ?>
                </span>
            </div>

            <h1 class="font-display text-5xl md:text-7xl lg:text-8xl text-primary-foreground mb-6 animate-fade-up" style="animation-delay: 0.1s">
                <?php echo wp_kses_post($hero_title); ?>
            </h1>

            <div class="text-lg md:text-xl text-primary-foreground/80 max-w-2xl mx-auto mb-8 animate-fade-up font-body" style="animation-delay: 0.2s">
                <?php echo wp_kses_post($hero_desc); ?>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-up" style="animation-delay: 0.3s">
                <?php if ($btn1_text) : ?>
                <a href="<?php echo esc_url($btn1_url); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-11 rounded-md px-8 gradient-primary shadow-button hover:opacity-90 transition-all text-lg text-primary-foreground">
                    <?php echo esc_html($btn1_text); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ml-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
                <?php endif; ?>
                
                <?php if ($btn2_text) : ?>
                <a href="<?php echo esc_url($btn2_url); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-11 rounded-md px-8 border border-secondary/50 text-secondary hover:bg-secondary/10 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
                    <?php echo esc_html($btn2_text); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16 max-w-4xl mx-auto animate-fade-up" style="animation-delay: 0.4s">
            <?php foreach ($stats as $stat) : ?>
                <?php if ($stat['value']) : ?>
                <div class="text-center p-4 rounded-lg bg-primary-foreground/5 backdrop-blur-sm border border-primary-foreground/10">
                    <div class="font-display text-3xl md:text-4xl text-secondary mb-1">
                        <?php echo esc_html($stat['value']); ?>
                    </div>
                    <div class="text-sm text-primary-foreground/70"><?php echo esc_html($stat['label']); ?></div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 rounded-full border-2 border-primary-foreground/30 flex items-start justify-center pt-2">
            <div class="w-1.5 h-2.5 rounded-full bg-primary"></div>
        </div>
    </div>
</section>
