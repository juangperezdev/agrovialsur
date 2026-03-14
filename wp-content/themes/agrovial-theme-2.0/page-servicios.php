<?php
/**
 * Template Name: Servicios
 * Description: Página de servicios de Agrovial Sur - Detalle de cada servicio ofrecido.
 */
get_header();

$hero_bg = get_option('servicios_hero_image', get_template_directory_uri() . '/assets/images/hero-construction.jpg');

// ── Services Data ──
$services_data = [
    [
        'id'    => 'movimiento-de-suelo',
        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="M2 22h20"/><path d="M6.36 17.4 4 17l-2-4 1.1-.55a2 2 0 0 1 2.74.73l.14.28a2 2 0 0 0 2.74.73L10 13l2 1 3-3 4 4v2H6.36Z"/><path d="m14 11 5.36-5.36a1 1 0 0 1 1.28-.12l.64.46"/></svg>',
        'title' => get_option('srv_1_title', 'Movimiento de Suelo'),
        'desc'  => get_option('srv_1_desc', 'Ejecución integral de trabajos de movimiento de suelo para obras viales, industriales y urbanas. Capacidad operativa para grandes volúmenes con flota propia.'),
        'sub'   => [
            get_option('srv_1_sub_1', 'Enripiado'),
            get_option('srv_1_sub_2', 'Pavimento'),
            get_option('srv_1_sub_3', 'Adoquinado'),
        ],
    ],
    [
        'id'    => 'hormigon-elaborado',
        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg>',
        'title' => get_option('srv_2_title', 'Hormigón Elaborado y Premoldeados'),
        'desc'  => get_option('srv_2_desc', 'Producción y provisión de hormigón elaborado con planta propia. Fabricación de premoldeados de hormigón para obras de infraestructura: conductos, bloques, cordones y piezas especiales.'),
        'sub'   => [],
    ],
    [
        'id'    => 'obras-de-gas',
        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="M12 12c2-2.96 0-7-1-8 0 3.038-1.773 4.741-3 6-1.226 1.26-2 3.24-2 5a6 6 0 1 0 12 0c0-1.532-1.056-3.94-2-5-1.786 3-2.791 3-4 2z"/></svg>',
        'title' => get_option('srv_3_title', 'Obras de Gas'),
        'desc'  => get_option('srv_3_desc', 'Construcción de redes de distribución y gasoductos. Extensiones de red, conexiones domiciliarias e instalaciones para proyectos industriales y urbanísticos.'),
        'sub'   => [],
    ],
    [
        'id'    => 'infraestructura-sanitaria',
        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"/><path d="M12.56 14.69c1.46 0 2.64-1.22 2.64-2.7 0-.78-.37-1.51-1.12-2.14-.75-.63-1.26-1.4-1.52-2.35-.26.95-.78 1.72-1.52 2.35-.76.64-1.12 1.36-1.12 2.14 0 1.49 1.18 2.7 2.64 2.7z"/><path d="M17 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S17.29 6.75 17 5.3c-.29 1.45-1.14 2.84-2.29 3.76S13 11.1 13 12.25c0 2.22 1.8 4.05 4 4.05z"/></svg>',
        'title' => get_option('srv_4_title', 'Infraestructura Sanitaria'),
        'desc'  => get_option('srv_4_desc', 'Ejecución de redes de agua potable y cloacas. Plantas de tratamiento, estaciones de bombeo y conexiones domiciliarias como parte integral de proyectos de desarrollo.'),
        'sub'   => [
            get_option('srv_4_sub_1', 'Agua potable'),
            get_option('srv_4_sub_2', 'Cloacas'),
        ],
    ],
    [
        'id'    => 'obras-civiles',
        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        'title' => get_option('srv_5_title', 'Obras Civiles'),
        'desc'  => get_option('srv_5_desc', 'Construcción integral de obras civiles: edificios institucionales, naves industriales, muros de contención, puentes y estructuras especiales.'),
        'sub'   => [],
    ],
    [
        'id'    => 'obras-electricas',
        'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-primary-foreground"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
        'title' => get_option('srv_6_title', 'Obras Eléctricas'),
        'desc'  => get_option('srv_6_desc', 'Servicio complementario de tendido eléctrico, iluminación pública y conexiones de media y baja tensión como parte de proyectos integrales de infraestructura.'),
        'sub'   => [],
        'complementary' => true,
    ],
];
?>

<!-- ═══════════════════════════════════════════
     HERO - Servicios
     ═══════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="min-height: 60vh; display: flex; align-items: center;">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="<?php echo esc_url($hero_bg); ?>" alt="Agrovial Sur - Servicios" class="w-full h-full object-cover" />
        <div class="absolute inset-0 hero-gradient"></div>
    </div>

    <!-- Content -->
    <div class="relative container mx-auto px-4" style="padding-top: 10rem; padding-bottom: 5rem;">
        <div class="max-w-4xl">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary/20 text-secondary border border-secondary/30 text-sm font-medium mb-6 animate-fade-up">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                Nuestros Servicios
            </span>
            <h1 class="font-display text-5xl md:text-6xl lg:text-7xl text-primary-foreground mb-6 animate-fade-up" style="animation-delay: 0.1s">
                Soluciones integrales de <span style="color: hsl(var(--secondary));">infraestructura</span>
            </h1>
            <p class="text-lg md:text-xl text-primary-foreground/80 max-w-2xl animate-fade-up font-body" style="animation-delay: 0.2s">
                Movimiento de suelo, hormigón, gas, agua, cloacas y obras civiles. Todo con capacidad operativa propia.
            </p>
        </div>
    </div>
</section>

<main class="bg-background">

    <!-- ═══════════════════════════════════════════
         LISTADO DE SERVICIOS
         ═══════════════════════════════════════════ -->
    <?php foreach ($services_data as $index => $service) :
        $is_even   = ($index % 2 === 0);
        $bg_class  = $is_even ? 'bg-background' : 'bg-muted';
        $is_complementary = !empty($service['complementary']);
    ?>
    <section id="<?php echo esc_attr($service['id']); ?>" class="py-20 md:py-28 <?php echo $bg_class; ?>">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center <?php echo !$is_even ? 'direction-rtl' : ''; ?>">
                <!-- Content Side -->
                <div class="<?php echo !$is_even ? 'lg:order-2' : ''; ?>">
                    <?php if ($is_complementary) : ?>
                        <span class="inline-block px-4 py-1.5 rounded-full bg-accent/10 text-accent text-sm font-medium mb-4">
                            Servicio Complementario
                        </span>
                    <?php else : ?>
                        <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary-alt text-sm font-medium mb-4">
                            Servicio Principal
                        </span>
                    <?php endif; ?>

                    <h2 class="font-display text-4xl md:text-5xl text-foreground mb-6">
                        <?php echo esc_html($service['title']); ?>
                    </h2>

                    <p class="text-muted-foreground text-lg leading-relaxed mb-8">
                        <?php echo wp_kses_post($service['desc']); ?>
                    </p>

                    <?php if (!empty($service['sub'])) : ?>
                        <div class="space-y-3 mb-8">
                            <h3 class="font-display text-xl text-foreground mb-4">Incluye:</h3>
                            <?php foreach ($service['sub'] as $sub_item) : ?>
                                <div class="flex items-center gap-3 p-3 rounded-lg bg-card shadow-sm border border-border/50">
                                    <div class="w-8 h-8 rounded-lg gradient-primary flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-primary-foreground"><polyline points="20 6 9 17 4 12"/></svg>
                                    </div>
                                    <span class="text-foreground font-medium"><?php echo esc_html($sub_item); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <a href="<?php echo home_url('#contacto'); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-11 px-8 gradient-primary shadow-button hover:opacity-90 text-primary-foreground">
                        Solicitar Cotización
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ml-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>

                <!-- Visual Side -->
                <div class="<?php echo !$is_even ? 'lg:order-1' : ''; ?>">
                    <div class="relative">
                        <!-- Main card -->
                        <div class="rounded-2xl overflow-hidden shadow-lg border border-border bg-card p-8 md:p-12 text-center">
                            <div class="w-20 h-20 rounded-2xl gradient-primary flex items-center justify-center mx-auto mb-6">
                                <?php echo $service['icon']; ?>
                            </div>
                            <h3 class="font-display text-3xl text-foreground mb-4"><?php echo esc_html($service['title']); ?></h3>
                            
                            <?php
                            // Query projects for this service type
                            $srv_query = new WP_Query([
                                'post_type' => 'service',
                                'posts_per_page' => 1,
                                'meta_query' => [],
                                's' => $service['title'],
                            ]);
                            if ($srv_query->have_posts()) :
                                while ($srv_query->have_posts()) : $srv_query->the_post();
                                    if (has_post_thumbnail()) :
                            ?>
                                <div class="rounded-xl overflow-hidden mt-6">
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-auto object-cover']); ?>
                                </div>
                            <?php
                                    endif;
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                        <!-- Decorative -->
                        <div class="absolute -bottom-3 -right-3 w-full h-full rounded-2xl border-2 border-primary/20 -z-10"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endforeach; ?>

    <!-- ═══════════════════════════════════════════
         CTA Final
         ═══════════════════════════════════════════ -->
    <section class="py-20 bg-background border-t border-border">
        <div class="container mx-auto px-4 text-center">
            <h2 class="font-display text-4xl md:text-5xl mb-6">¿NECESITA UN <span class="text-gradient">SERVICIO ESPECÍFICO</span>?</h2>
            <p class="text-xl text-muted-foreground mb-10 max-w-2xl mx-auto">
                Contamos con la capacidad operativa para resolver cualquier necesidad de infraestructura. Consúltenos sin compromiso.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo home_url('#contacto'); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-11 px-8 gradient-primary shadow-button hover:opacity-90 text-primary-foreground">
                    Cotizar Ahora
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ml-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
                <a href="<?php echo get_post_type_archive_link('project'); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-11 px-8 border border-border text-foreground hover:bg-muted transition-colors">
                    Ver Proyectos Ejecutados
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ml-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
