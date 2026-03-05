<?php
$about_badge = get_option('about_badge', 'Sobre Nosotros');
$about_title = get_option('about_title', 'CONSTRUYENDO EXCELENCIA');
$about_text = get_option('about_text', 'Desde 1999, hemos sido pioneros en la construcción de infraestructura vial de alta calidad. Nuestro compromiso con la excelencia nos ha posicionado como líderes en el sector.');
$about_text_2 = get_option('about_text_2', 'Trabajamos con gobiernos, municipios y empresas privadas para desarrollar proyectos que transforman comunidades y mejoran la conectividad regional. Cada kilómetro construido representa nuestra dedicación a la calidad y la innovación.');

$stat1_val = get_option('about_stat_1_val', '99%');
$stat1_label = get_option('about_stat_1_label', 'Entregas a tiempo');
$stat2_val = get_option('about_stat_2_val', 'ISO 9001');
$stat2_label = get_option('about_stat_2_label', 'Certificación');
$stat3_val = get_option('about_stat_3_val', '15');
$stat3_label = get_option('about_stat_3_label', 'Estados cubiertos');

// Default Features (Icons hardcoded, Text editable via Customizer)
$features = [
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>',
        'title' => get_option('about_feat_1_title', 'Seguridad Garantizada'),
        'description' => get_option('about_feat_1_desc', 'Cumplimos con las normas más estrictas de seguridad vial internacional.')
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M2 12h20"/><path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-6"/><path d="M12 2v20"/></svg>',
        'title' => get_option('about_feat_2_title', 'Tecnología Avanzada'),
        'description' => get_option('about_feat_2_desc', 'Utilizamos maquinaria de última generación para optimizar tiempos y costos.')
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
        'title' => get_option('about_feat_3_title', 'Sostenibilidad'),
        'description' => get_option('about_feat_3_desc', 'Procesos optimizados para minimizar el impacto ambiental en cada obra.')
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" x2="20" y1="8" y2="14"/><line x1="23" x2="17" y1="11" y2="11"/></svg>',
        'title' => get_option('about_feat_4_title', 'Equipo Experto'),
        'description' => get_option('about_feat_4_desc', 'Ingenieros y técnicos altamente capacitados con años de experiencia.')
    ]
];
?>
<section id="nosotros" class="py-20 md:py-32 bg-secondary">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Content -->
            <div>
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-sm font-medium mb-4">
                    <?php echo esc_html($about_badge); ?>
                </span>
                <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-secondary-foreground mb-6">
                    <?php echo wp_kses_post($about_title); ?>
                </h2>
                <p class="text-secondary-foreground/80 text-lg mb-6">
                    <?php echo nl2br(esc_html($about_text)); ?>
                </p>
                <p class="text-secondary-foreground/70 mb-8">
                    <?php echo nl2br(esc_html($about_text_2)); ?>
                </p>

                <!-- Stats inline -->
                <div class="flex flex-wrap gap-8">
                    <div>
                        <div class="font-display text-4xl text-primary"><?php echo esc_html($stat1_val); ?></div>
                        <div class="text-sm text-secondary-foreground/70"><?php echo esc_html($stat1_label); ?></div>
                    </div>
                    <div>
                        <div class="font-display text-4xl text-primary"><?php echo esc_html($stat2_val); ?></div>
                        <div class="text-sm text-secondary-foreground/70"><?php echo esc_html($stat2_label); ?></div>
                    </div>
                    <div>
                        <div class="font-display text-4xl text-primary"><?php echo esc_html($stat3_val); ?></div>
                        <div class="text-sm text-secondary-foreground/70"><?php echo esc_html($stat3_label); ?></div>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="grid sm:grid-cols-2 gap-6">
                <?php foreach ($features as $key => $feature) : ?>
                    <div class="p-6 rounded-xl bg-card shadow-card hover:shadow-card-hover transition-all duration-300 group" style="animation-delay: <?php echo $key * 0.1; ?>s">
                        <div class="w-12 h-12 rounded-lg gradient-primary flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <?php echo $feature['icon']; ?>
                        </div>
                        <h3 class="font-display text-xl text-card-foreground mb-2">
                            <?php echo $feature['title']; ?>
                        </h3>
                        <p class="text-muted-foreground text-sm"><?php echo $feature['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
