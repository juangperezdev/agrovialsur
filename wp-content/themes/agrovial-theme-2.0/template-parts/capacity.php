<?php
/**
 * Capacity Section - Capacidad Operativa
 * +70 rodados | Maquinaria propia | Taller | Equipo técnico
 */
$capacity_items = [
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-primary-foreground"><path d="M10 2v8l3-3h7"/><path d="M14 2h-4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V8Z"/><circle cx="12" cy="18" r="2"/></svg>',
        'value' => get_option('capacity_1_value', '+70'),
        'title' => get_option('capacity_1_title', 'Rodados'),
        'desc'  => get_option('capacity_1_desc', 'Flota propia de más de 70 vehículos y equipos pesados para operar en simultáneo en múltiples proyectos.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-primary-foreground"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></svg>',
        'value' => get_option('capacity_2_value', '100%'),
        'title' => get_option('capacity_2_title', 'Maquinaria Propia'),
        'desc'  => get_option('capacity_2_desc', 'Operamos con maquinaria propia de última generación, garantizando disponibilidad inmediata y control total de costos.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-primary-foreground"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/></svg>',
        'value' => get_option('capacity_3_value', '24/7'),
        'title' => get_option('capacity_3_title', 'Taller'),
        'desc'  => get_option('capacity_3_desc', 'Taller propio con capacidad de mantenimiento preventivo y correctivo para minimizar tiempos de inactividad.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-primary-foreground"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" x2="20" y1="8" y2="14"/><line x1="23" x2="17" y1="11" y2="11"/></svg>',
        'value' => get_option('capacity_4_value', '150+'),
        'title' => get_option('capacity_4_title', 'Equipo Técnico'),
        'desc'  => get_option('capacity_4_desc', 'Equipo multidisciplinario de ingenieros, técnicos y operarios altamente capacitados con experiencia en grandes obras.'),
    ],
];
?>
<section id="capacidad" class="py-20 md:py-32 bg-primary">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary-foreground/10 text-primary-foreground text-sm font-medium mb-4">
                Nuestros Recursos
            </span>
            <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-primary-foreground mb-4">
                CAPACIDAD OPERATIVA
            </h2>
            <p class="text-primary-foreground/70 text-lg">
                Contamos con los recursos necesarios para ejecutar múltiples proyectos de gran envergadura en forma simultánea.
            </p>
        </div>

        <!-- Capacity Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($capacity_items as $key => $item) : ?>
            <div class="text-center p-8 rounded-2xl bg-primary-foreground/5 backdrop-blur-sm border border-primary-foreground/10 hover:bg-primary-foreground/10 transition-all duration-300 group animate-fade-up" style="animation-delay: <?php echo $key * 0.1; ?>s">
                <!-- Icon -->
                <div class="w-16 h-16 rounded-xl bg-primary-foreground/10 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <?php echo $item['icon']; ?>
                </div>
                
                <!-- Value -->
                <div class="font-display text-5xl text-secondary mb-2">
                    <?php echo esc_html($item['value']); ?>
                </div>

                <h3 class="font-display text-2xl text-primary-foreground mb-3">
                    <?php echo esc_html($item['title']); ?>
                </h3>
                <div class="text-primary-foreground/70 text-sm leading-relaxed">
                    <?php echo wp_kses_post($item['desc']); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
