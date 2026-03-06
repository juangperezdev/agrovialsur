<?php
/**
 * Infrastructure Section - Infraestructura para desarrollo productivo
 * Industria | Minería | Desarrollo urbano
 */
$infra_items = [
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M17 18h1"/><path d="M12 18h1"/><path d="M7 18h1"/></svg>',
        'title' => get_option('infra_1_title', 'Industria'),
        'desc'  => get_option('infra_1_desc', 'Desarrollamos infraestructura industrial de alta calidad para impulsar la productividad regional. Plantas, naves industriales y accesos.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="m2 22 10-10"/><path d="m16 8-1.17 1.17"/><path d="M3.47 12.53 5 11l1.53 1.53a3.5 3.5 0 0 1 0 4.94L5 19l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"/><path d="m8 8 2-2 1.5 1.5"/><path d="M14.5 5.5 18 2l4 4-3.5 3.5"/><path d="m9.5 14.5-1-1"/></svg>',
        'title' => get_option('infra_2_title', 'Minería'),
        'desc'  => get_option('infra_2_desc', 'Proveemos soluciones de infraestructura para el sector minero: caminos de acceso, plataformas de exploración y obras complementarias.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        'title' => get_option('infra_3_title', 'Desarrollo Urbano'),
        'desc'  => get_option('infra_3_desc', 'Construimos la infraestructura necesaria para el crecimiento de las ciudades: pavimentación, redes de servicios y espacios públicos.'),
    ],
];
?>
<section id="infraestructura" class="py-20 md:py-32 bg-background">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                Áreas de Desarrollo
            </span>
            <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-foreground mb-4">
                INFRAESTRUCTURA PARA <span class="text-gradient">DESARROLLO PRODUCTIVO</span>
            </h2>
            <p class="text-muted-foreground text-lg">
                Brindamos soluciones integrales de infraestructura en tres áreas clave para el crecimiento de Río Negro.
            </p>
        </div>

        <!-- Cards -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($infra_items as $key => $item) : ?>
            <div class="group relative overflow-hidden rounded-2xl shadow-card hover:shadow-card-hover transition-all duration-500 gradient-card animate-fade-up" style="animation-delay: <?php echo $key * 0.15; ?>s">
                <!-- Gradient Top Bar -->
                <div class="h-2 gradient-primary"></div>
                
                <div class="p-8">
                    <!-- Icon -->
                    <div class="w-16 h-16 rounded-xl gradient-primary flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <?php echo $item['icon']; ?>
                    </div>

                    <h3 class="font-display text-3xl md:text-4xl text-foreground mb-3">
                        <?php echo esc_html($item['title']); ?>
                    </h3>
                    <div class="text-muted-foreground leading-relaxed">
                        <?php echo wp_kses_post($item['desc']); ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
