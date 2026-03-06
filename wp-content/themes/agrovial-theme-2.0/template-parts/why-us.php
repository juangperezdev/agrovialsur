<?php
/**
 * Why Us Section - Por qué elegir Agrovial Sur
 */
$features = [
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>',
        'title' => get_option('whyus_feat_1_title', 'Seguridad Garantizada'),
        'description' => get_option('whyus_feat_1_desc', 'Cumplimos con las normas más estrictas de seguridad vial, protegiendo a nuestros trabajadores y las comunidades.')
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        'title' => get_option('whyus_feat_2_title', 'Cumplimiento de Plazos'),
        'description' => get_option('whyus_feat_2_desc', 'Nos comprometemos con los plazos de entrega y los cumplimos. Nuestra tasa de entregas a tiempo supera el 99%.')
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
        'title' => get_option('whyus_feat_3_title', 'Tecnología Avanzada'),
        'description' => get_option('whyus_feat_3_desc', 'Utilizamos maquinaria de última generación y sistemas GPS para optimizar cada etapa del proyecto.')
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" x2="20" y1="8" y2="14"/><line x1="23" x2="17" y1="11" y2="11"/></svg>',
        'title' => get_option('whyus_feat_4_title', 'Equipo Experto'),
        'description' => get_option('whyus_feat_4_desc', 'Ingenieros y técnicos altamente capacitados con décadas de experiencia en infraestructura vial patagónica.')
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M2 12h20"/><path d="M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-6"/><path d="M12 2v20"/></svg>',
        'title' => get_option('whyus_feat_5_title', 'Presencia Regional'),
        'description' => get_option('whyus_feat_5_desc', 'Presencia en toda la provincia de Río Negro con múltiples bases operativas para una respuesta rápida y eficiente.')
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
        'title' => get_option('whyus_feat_6_title', 'Sostenibilidad'),
        'description' => get_option('whyus_feat_6_desc', 'Procesos optimizados para minimizar el impacto ambiental. Compromiso con el desarrollo sustentable de la región.')
    ],
];

$stat1_val = get_option('whyus_stat_1_val', '99%');
$stat1_label = get_option('whyus_stat_1_label', 'Entregas a tiempo');
$stat2_val = get_option('whyus_stat_2_val', 'ISO 9001');
$stat2_label = get_option('whyus_stat_2_label', 'Certificación');
$stat3_val = get_option('whyus_stat_3_val', '+25');
$stat3_label = get_option('whyus_stat_3_label', 'Años de trayectoria');
?>
<section id="nosotros" class="py-20 md:py-32 bg-muted">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary-alt text-sm font-medium mb-4">
                Por Qué Elegirnos
            </span>
            <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-secondary-foreground mb-4">
                POR QUÉ ELEGIR <span class="text-gradient">AGROVIAL SUR</span>
            </h2>
            <p class="text-secondary-foreground/80 text-lg mb-8">
                Infraestructura con capacidad operativa real para el desarrollo productivo de Río Negro.
            </p>

            <!-- Stats inline -->
            <div class="flex flex-wrap justify-center gap-8 mb-8">
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
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($features as $key => $feature) : ?>
                <div class="p-6 rounded-xl bg-card shadow-card hover:shadow-card-hover transition-all duration-300 group" style="animation-delay: <?php echo $key * 0.1; ?>s">
                    <div class="w-12 h-12 rounded-lg gradient-primary flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <?php echo $feature['icon']; ?>
                    </div>
                    <h3 class="font-display text-xl text-card-foreground mb-2">
                        <?php echo esc_html($feature['title']); ?>
                    </h3>
                    <div class="text-muted-foreground text-sm"><?php echo wp_kses_post($feature['description']); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
