<?php
/**
 * Template Name: La Empresa
 * Description: Página institucional de Agrovial Sur - Quiénes somos, capacidad operativa y equipo técnico.
 */
get_header();

// ── Options ──
$about_title   = get_option('empresa_title', 'QUIÉNES SOMOS');
$about_text    = get_option('empresa_text', 'Somos una empresa constructora radicada en Río Negro, especializada en infraestructura para el desarrollo productivo de la provincia. Desde nuestros inicios, trabajamos junto a la industria, la minería y el desarrollo urbano, ejecutando obras que acompañan el crecimiento de la región.');
$about_text_2  = get_option('empresa_text_2', 'Nuestra experiencia abarca movimiento de suelo, hormigón elaborado, obras de gas, infraestructura sanitaria y obras civiles. Contamos con maquinaria propia, taller de mantenimiento y un equipo técnico especializado que nos permite responder con calidad y eficiencia a cada proyecto.');
$hero_bg       = get_option('empresa_hero_image', get_template_directory_uri() . '/assets/images/hero-construction.jpg');

// ── Capacity Items ──
$capacity_items = [
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></svg>',
        'value' => get_option('empresa_cap_1_value', '+70'),
        'title' => get_option('empresa_cap_1_title', 'Rodados'),
        'desc'  => get_option('empresa_cap_1_desc', 'Flota de más de 70 vehículos y equipos pesados para la ejecución simultánea de múltiples obras en distintos puntos de la provincia.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M17 18h1"/><path d="M12 18h1"/><path d="M7 18h1"/></svg>',
        'value' => get_option('empresa_cap_2_value', '100%'),
        'title' => get_option('empresa_cap_2_title', 'Maquinaria Propia'),
        'desc'  => get_option('empresa_cap_2_desc', 'Equipos de última generación de propiedad total. Retroexcavadoras, motoniveladoras, compactadores, camiones volcadores y más.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
        'value' => get_option('empresa_cap_3_value', 'Propio'),
        'title' => get_option('empresa_cap_3_title', 'Taller de Mantenimiento'),
        'desc'  => get_option('empresa_cap_3_desc', 'Taller mecánico integral con personal especializado para el mantenimiento preventivo y correctivo de toda la flota.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="M12 2v20"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><circle cx="12" cy="12" r="10"/></svg>',
        'value' => get_option('empresa_cap_4_value', 'Certificados'),
        'title' => get_option('empresa_cap_4_title', 'Procesos y Estándares'),
        'desc'  => get_option('empresa_cap_4_desc', 'Procedimientos estandarizados de calidad, seguridad y medio ambiente aplicados en cada etapa de obra.'),
    ],
];

// ── Team Members ──
$team_members = [
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" x2="20" y1="8" y2="14"/><line x1="23" x2="17" y1="11" y2="11"/></svg>',
        'title' => get_option('empresa_team_1_title', 'Ingenieros Civiles'),
        'desc'  => get_option('empresa_team_1_desc', 'Profesionales con experiencia en dirección y supervisión de obras de infraestructura de gran envergadura.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>',
        'title' => get_option('empresa_team_2_title', 'Técnicos en Seguridad e Higiene'),
        'desc'  => get_option('empresa_team_2_desc', 'Responsables de garantizar condiciones seguras en cada frente de obra según normativa vigente.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
        'title' => get_option('empresa_team_3_title', 'Topógrafos y Geodestas'),
        'desc'  => get_option('empresa_team_3_desc', 'Equipo de relevamiento y control de calidad geométrica con instrumental de última generación.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
        'title' => get_option('empresa_team_4_title', 'Operadores y Maquinistas'),
        'desc'  => get_option('empresa_team_4_desc', 'Personal calificado para la operación de maquinaria pesada con foco en eficiencia y seguridad.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>',
        'title' => get_option('empresa_team_5_title', 'Administración y Logística'),
        'desc'  => get_option('empresa_team_5_desc', 'Gestión administrativa, compras y coordinación logística que garantizan la continuidad operativa.'),
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        'title' => get_option('empresa_team_6_title', 'Capataces y Jefes de Obra'),
        'desc'  => get_option('empresa_team_6_desc', 'Líderes de campo con experiencia comprobada en la coordinación de trabajos complejos y múltiples cuadrillas.'),
    ],
];
?>

<!-- ═══════════════════════════════════════════
     HERO - La Empresa
     ═══════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="min-height: 60vh; display: flex; align-items: center;">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="<?php echo esc_url($hero_bg); ?>" alt="Agrovial Sur - La Empresa" class="w-full h-full object-cover" />
        <div class="absolute inset-0 hero-gradient"></div>
    </div>

    <!-- Content -->
    <div class="relative container mx-auto px-4" style="padding-top: 10rem; padding-bottom: 5rem;">
        <div class="max-w-4xl">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary/20 text-secondary border border-secondary/30 text-sm font-medium mb-6 animate-fade-up">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                La Empresa
            </span>
            <h1 class="font-display text-5xl md:text-6xl lg:text-7xl text-primary-foreground mb-6 animate-fade-up" style="animation-delay: 0.1s">
                Infraestructura para el <span style="color: hsl(var(--secondary));">desarrollo de Río Negro</span>
            </h1>
            <p class="text-lg md:text-xl text-primary-foreground/80 max-w-2xl animate-fade-up font-body" style="animation-delay: 0.2s">
                Construimos la infraestructura que hace posible el crecimiento productivo de la provincia.
            </p>
        </div>
    </div>
</section>

<main class="bg-background">

    <!-- ═══════════════════════════════════════════
         QUIÉNES SOMOS
         ═══════════════════════════════════════════ -->
    <section class="py-20 md:py-32 bg-background">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <!-- Text Content -->
                <div>
                    <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary-alt text-sm font-medium mb-4">
                        Nuestra Historia
                    </span>
                    <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-foreground mb-6">
                        <?php echo esc_html($about_title); ?>
                    </h2>
                    <p class="text-muted-foreground text-lg mb-6 leading-relaxed">
                        <?php echo nl2br(esc_html($about_text)); ?>
                    </p>
                    <p class="text-muted-foreground mb-8 leading-relaxed">
                        <?php echo nl2br(esc_html($about_text_2)); ?>
                    </p>

                    <!-- Quick Stats -->
                    <div class="flex flex-wrap gap-8">
                        <div>
                            <div class="font-display text-4xl text-primary"><?php echo esc_html(get_option('empresa_stat_1_val', '+25')); ?></div>
                            <div class="text-sm text-muted-foreground"><?php echo esc_html(get_option('empresa_stat_1_label', 'Años de experiencia')); ?></div>
                        </div>
                        <div>
                            <div class="font-display text-4xl text-primary"><?php echo esc_html(get_option('empresa_stat_2_val', '+70')); ?></div>
                            <div class="text-sm text-muted-foreground"><?php echo esc_html(get_option('empresa_stat_2_label', 'Rodados en flota')); ?></div>
                        </div>
                        <div>
                            <div class="font-display text-4xl text-primary"><?php echo esc_html(get_option('empresa_stat_3_val', 'Río Negro')); ?></div>
                            <div class="text-sm text-muted-foreground"><?php echo esc_html(get_option('empresa_stat_3_label', 'Presencia provincial')); ?></div>
                        </div>
                    </div>
                </div>

                <!-- Image -->
                <div class="relative">
                    <div class="rounded-2xl overflow-hidden shadow-lg">
                        <?php 
                        $empresa_img = get_option('empresa_about_image', get_template_directory_uri() . '/assets/images/hero-construction.jpg');
                        ?>
                        <img src="<?php echo esc_url($empresa_img); ?>" alt="Agrovial Sur - Quiénes Somos" class="w-full h-auto object-cover aspect-[4/3]" />
                    </div>
                    <!-- Decorative accent -->
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 rounded-2xl gradient-primary opacity-20 -z-10"></div>
                    <div class="absolute -top-4 -left-4 w-24 h-24 rounded-2xl bg-secondary/20 -z-10"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         INFRAESTRUCTURA PARA DESARROLLO PRIVADO
         ═══════════════════════════════════════════ -->
    <?php get_template_part('template-parts/infrastructure'); ?>

    <!-- ═══════════════════════════════════════════
         CAPACIDAD OPERATIVA (Detallada)
         ═══════════════════════════════════════════ -->
    <section class="py-20 md:py-32 bg-primary">
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
                    Infraestructura propia y recursos dedicados para ejecutar múltiples proyectos de gran envergadura en forma simultánea.
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

    <!-- ═══════════════════════════════════════════
         EQUIPO TÉCNICO
         ═══════════════════════════════════════════ -->
    <section class="py-20 md:py-32 bg-muted">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary-alt text-sm font-medium mb-4">
                    Nuestro Equipo
                </span>
                <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-foreground mb-4">
                    EQUIPO <span class="text-gradient">TÉCNICO</span>
                </h2>
                <p class="text-muted-foreground text-lg">
                    Profesionales y técnicos especializados con experiencia en obras de infraestructura y desarrollo territorial.
                </p>
            </div>

            <!-- Team Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($team_members as $key => $member) : ?>
                    <div class="p-6 rounded-xl bg-card shadow-card hover:shadow-card-hover transition-all duration-300 group" style="animation-delay: <?php echo $key * 0.1; ?>s">
                        <div class="w-12 h-12 rounded-lg gradient-primary flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <?php echo $member['icon']; ?>
                        </div>
                        <h3 class="font-display text-xl text-card-foreground mb-2">
                            <?php echo esc_html($member['title']); ?>
                        </h3>
                        <p class="text-muted-foreground text-sm"><?php echo wp_kses_post($member['desc']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         CTA Final
         ═══════════════════════════════════════════ -->
    <section class="py-20 bg-background border-t border-border">
        <div class="container mx-auto px-4 text-center">
            <h2 class="font-display text-4xl md:text-5xl mb-6">¿NECESITA <span class="text-gradient">INFRAESTRUCTURA</span> PARA SU PROYECTO?</h2>
            <p class="text-xl text-muted-foreground mb-10 max-w-2xl mx-auto">
                Cuente con la capacidad operativa y el equipo técnico de Agrovial Sur.
            </p>
            <a href="<?php echo home_url('#contacto'); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-11 px-8 gradient-primary shadow-button hover:opacity-90 text-primary-foreground">
                Contactar Ahora
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ml-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
