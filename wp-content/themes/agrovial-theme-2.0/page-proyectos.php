<?php
/**
 * Template Name: Proyectos
 * Description: Página de proyectos de Agrovial Sur - Listado con filtros, mapa y fichas de proyecto.
 */
get_header();

$hero_bg = get_option('proyectos_hero_image', get_template_directory_uri() . '/assets/images/hero-construction.jpg');

// ── Query all projects ──
$args = [
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'order'          => 'DESC',
];
$projects_query = new WP_Query($args);

// ── Categories (Tipo de obra) ──
$categories = get_terms([
    'taxonomy'   => 'project_category',
    'hide_empty' => true,
]);

// ── Locations (unique) ──
$all_locations = [];
$map_projects  = [];
$temp_query = new WP_Query($args);
if ($temp_query->have_posts()) :
    while ($temp_query->have_posts()) : $temp_query->the_post();
        $loc = get_post_meta(get_the_ID(), '_project_location', true);
        if ($loc && !in_array($loc, $all_locations)) {
            $all_locations[] = $loc;
        }
        $lat = get_post_meta(get_the_ID(), '_project_lat', true);
        $lng = get_post_meta(get_the_ID(), '_project_lng', true);
        if (!empty($lat) && !empty($lng)) {
            $map_projects[] = [
                'title'   => get_the_title(),
                'lat'     => $lat,
                'lng'     => $lng,
                'link'    => get_permalink(),
                'address' => $loc,
            ];
        }
    endwhile;
    wp_reset_postdata();
endif;
sort($all_locations);
?>

<!-- ═══════════════════════════════════════════
     HERO - Proyectos
     ═══════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="min-height: 60vh; display: flex; align-items: center;">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="<?php echo esc_url($hero_bg); ?>" alt="Agrovial Sur - Proyectos" class="w-full h-full object-cover" />
        <div class="absolute inset-0 hero-gradient"></div>
    </div>

    <!-- Content -->
    <div class="relative container mx-auto px-4" style="padding-top: 10rem; padding-bottom: 5rem;">
        <div class="max-w-4xl">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary/20 text-secondary border border-secondary/30 text-sm font-medium mb-6 animate-fade-up">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
                Portafolio
            </span>
            <h1 class="font-display text-5xl md:text-6xl lg:text-7xl text-primary-foreground mb-6 animate-fade-up" style="animation-delay: 0.1s">
                Proyectos <span style="color: hsl(var(--secondary));">ejecutados</span>
            </h1>
            <p class="text-lg md:text-xl text-primary-foreground/80 max-w-2xl animate-fade-up font-body" style="animation-delay: 0.2s">
                Conozca nuestra trayectoria a través de las obras de infraestructura que hemos realizado en Río Negro.
            </p>
        </div>
    </div>
</section>

<main class="bg-background">

    <!-- ═══════════════════════════════════════════
         PROYECTOS EJECUTADOS + FILTROS
         ═══════════════════════════════════════════ -->
    <section class="py-20 md:py-32 bg-background">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary-alt text-sm font-medium mb-4">
                    Portafolio de Obras
                </span>
                <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-foreground mb-4">
                    PROYECTOS <span class="text-gradient">EJECUTADOS</span>
                </h2>
                <p class="text-muted-foreground text-lg">
                    Filtre por tipo de obra o ubicación para encontrar proyectos específicos.
                </p>
            </div>

            <!-- ── Filters Row ── -->
            <div class="space-y-4 mb-12">
                <!-- Filter by Category -->
                <div class="flex flex-wrap justify-center gap-3" id="project-filters">
                    <button class="filter-btn flex items-center gap-2 px-5 py-2.5 rounded-full font-medium transition-all duration-300 gradient-primary text-primary-foreground shadow-button" data-filter="todos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        Todos
                    </button>
                    <?php foreach ($categories as $cat) : ?>
                        <button class="filter-btn flex items-center gap-2 px-5 py-2.5 rounded-full font-medium transition-all duration-300 bg-card text-muted-foreground hover:text-foreground hover:bg-card/80 shadow-card" data-filter="<?php echo esc_attr($cat->slug); ?>">
                            <?php echo esc_html($cat->name); ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <!-- Filter by Location -->
                <?php if (!empty($all_locations)) : ?>
                <div class="flex justify-center">
                    <div class="relative inline-block">
                        <select id="location-filter" class="appearance-none px-5 py-2.5 pr-10 rounded-full font-medium bg-card text-muted-foreground shadow-card border border-border focus:outline-none focus:ring-2 focus:ring-primary cursor-pointer" style="min-width: 220px;">
                            <option value="todas">📍 Todas las ubicaciones</option>
                            <?php foreach ($all_locations as $loc) : ?>
                                <option value="<?php echo esc_attr($loc); ?>"><?php echo esc_html($loc); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-muted-foreground"><path d="m6 9 6 6 6-6"/></svg>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- ── Projects Grid ── -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8" id="projects-grid">
                <?php
                if ($projects_query->have_posts()) :
                    $delay_counter = 0;
                    while ($projects_query->have_posts()) : $projects_query->the_post();
                        $terms    = get_the_terms(get_the_ID(), 'project_category');
                        $cat_slug = !empty($terms) ? $terms[0]->slug : '';
                        $cat_name = !empty($terms) ? $terms[0]->name : '';
                        
                        $location    = get_post_meta(get_the_ID(), '_project_location', true);
                        $year        = get_post_meta(get_the_ID(), '_project_year', true);
                        $stat1_label = get_post_meta(get_the_ID(), '_project_stat1_label', true);
                        $stat1_value = get_post_meta(get_the_ID(), '_project_stat1_value', true);
                        $stat2_label = get_post_meta(get_the_ID(), '_project_stat2_label', true);
                        $stat2_value = get_post_meta(get_the_ID(), '_project_stat2_value', true);
                        
                        $delay = $delay_counter * 0.05;
                        $delay_counter++;
                ?>
                    <article class="project-item group bg-card rounded-2xl overflow-hidden shadow-card hover:shadow-card-hover transition-all duration-500" data-category="<?php echo esc_attr($cat_slug); ?>" data-location="<?php echo esc_attr($location); ?>" style="animation-delay: <?php echo $delay; ?>s">
                        <!-- Image -->
                        <div class="relative h-56 overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110']); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project-bridge.jpg" alt="<?php the_title(); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <?php endif; ?>
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-card/90 via-transparent to-transparent"></div>
                            
                            <!-- Category Badge -->
                            <?php if ($cat_name) : ?>
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium <?php echo $cat_slug === 'publico' ? 'bg-primary text-primary-foreground' : 'bg-secondary text-secondary-foreground'; ?>">
                                    <?php echo esc_html($cat_name); ?>
                                </span>
                            </div>
                            <?php endif; ?>

                            <!-- Stats overlay -->
                            <div class="absolute bottom-4 left-4 right-4 flex gap-3">
                                <?php if ($stat1_label && $stat1_value) : ?>
                                    <div class="px-3 py-1.5 rounded-lg bg-card/90 backdrop-blur-sm">
                                        <div class="text-xs text-muted-foreground"><?php echo esc_html($stat1_label); ?></div>
                                        <div class="font-display text-lg text-foreground"><?php echo esc_html($stat1_value); ?></div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($stat2_label && $stat2_value) : ?>
                                    <div class="px-3 py-1.5 rounded-lg bg-card/90 backdrop-blur-sm">
                                        <div class="text-xs text-muted-foreground"><?php echo esc_html($stat2_label); ?></div>
                                        <div class="font-display text-lg text-foreground"><?php echo esc_html($stat2_value); ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-muted-foreground mb-3">
                                <?php if ($location) : ?>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                    <?php echo esc_html($location); ?>
                                </span>
                                <?php endif; ?>
                                <?php if ($year) : ?>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                    <?php echo esc_html($year); ?>
                                </span>
                                <?php endif; ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="block">
                                <h3 class="font-display text-2xl text-card-foreground mb-2 group-hover:text-primary transition-colors">
                                    <?php the_title(); ?>
                                </h3>
                            </a>

                            <div class="text-muted-foreground text-sm leading-relaxed mb-4">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-primary font-medium text-sm hover:gap-3 transition-all">
                                Ver Ficha Técnica
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </a>
                        </div>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <!-- No results message -->
            <div id="no-results" class="hidden text-center py-16">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12 text-muted-foreground/50 mx-auto mb-4"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <p class="text-muted-foreground text-lg">No se encontraron proyectos con los filtros seleccionados.</p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         MAPA DE PROYECTOS
         ═══════════════════════════════════════════ -->
    <section class="py-20 md:py-32 bg-muted">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary-alt text-sm font-medium mb-4">
                    Presencia Territorial
                </span>
                <h2 class="font-display text-4xl md:text-5xl text-foreground mb-4">
                    MAPA DE <span class="text-gradient">OBRAS</span>
                </h2>
                <p class="text-muted-foreground text-lg">
                    Mapa interactivo con la ubicación de nuestros proyectos ejecutados en toda la provincia.
                </p>
            </div>

            <div class="rounded-xl overflow-hidden shadow-lg border border-border" style="min-height: 550px; height: 550px; width: 100%;">
                <div id="projects-page-map" style="width: 100%; height: 100%; min-height: 550px;"></div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════
         CTA Final
         ═══════════════════════════════════════════ -->
    <section class="py-20 bg-background border-t border-border">
        <div class="container mx-auto px-4 text-center">
            <h2 class="font-display text-4xl md:text-5xl mb-6">¿TIENE UN PROYECTO <span class="text-gradient">SIMILAR</span> EN MENTE?</h2>
            <p class="text-xl text-muted-foreground mb-10 max-w-2xl mx-auto">
                Contacte con nuestro equipo para evaluar y desarrollar su próxima gran obra de infraestructura.
            </p>
            <a href="<?php echo home_url('#contacto'); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-11 px-8 gradient-primary shadow-button hover:opacity-90 text-primary-foreground">
                Contactar Ahora
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ml-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>
    </section>

</main>

<!-- ═══════════════════════════════════════════
     SCRIPTS
     ═══════════════════════════════════════════ -->
<script>
document.addEventListener('DOMContentLoaded', function() {

    // ── Filter Logic ──
    const filterBtns    = document.querySelectorAll('.filter-btn');
    const locationSelect = document.getElementById('location-filter');
    const projectItems  = document.querySelectorAll('.project-item');
    const noResults     = document.getElementById('no-results');

    let currentCategory = 'todos';
    let currentLocation = 'todas';

    function applyFilters() {
        let visibleCount = 0;

        projectItems.forEach(item => {
            const itemCat = item.getAttribute('data-category');
            const itemLoc = item.getAttribute('data-location');

            const matchesCat = currentCategory === 'todos' || itemCat === currentCategory;
            const matchesLoc = currentLocation === 'todas' || itemLoc === currentLocation;

            if (matchesCat && matchesLoc) {
                item.style.display = 'block';
                item.style.opacity = '1';
                visibleCount++;
            } else {
                item.style.display = 'none';
                item.style.opacity = '0';
            }
        });

        if (noResults) {
            noResults.classList.toggle('hidden', visibleCount > 0);
        }
    }

    // Category filter buttons
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            currentCategory = btn.getAttribute('data-filter');

            filterBtns.forEach(b => {
                b.classList.remove('gradient-primary', 'text-primary-foreground', 'shadow-button');
                b.classList.add('bg-card', 'text-muted-foreground', 'shadow-card');
            });
            btn.classList.remove('bg-card', 'text-muted-foreground', 'shadow-card');
            btn.classList.add('gradient-primary', 'text-primary-foreground', 'shadow-button');

            applyFilters();
        });
    });

    // Location filter dropdown
    if (locationSelect) {
        locationSelect.addEventListener('change', () => {
            currentLocation = locationSelect.value;
            applyFilters();
        });
    }

    // ── Map Logic ──
    const mapProjects = <?php echo json_encode($map_projects) ?: '[]'; ?>;
    const mapElement  = document.getElementById('projects-page-map');

    if (mapElement) {
        let center = { lat: -41.1335, lng: -71.3103 };
        if (mapProjects && mapProjects.length > 0) {
            center = { lat: parseFloat(mapProjects[0].lat), lng: parseFloat(mapProjects[0].lng) };
        }

        function initProjectsPageMap() {
            if (typeof google === 'undefined' || typeof google.maps === 'undefined' || typeof google.maps.Map === 'undefined' || typeof google.maps.marker === 'undefined') {
                setTimeout(initProjectsPageMap, 100);
                return;
            }

            try {
                const map = new google.maps.Map(mapElement, {
                    zoom: 6,
                    center: { lat: parseFloat(center.lat) || -41.1335, lng: parseFloat(center.lng) || -71.3103 },
                    mapId: 'PROJECTS_PAGE_MAP',
                });

                const infoWindow = new google.maps.InfoWindow();

                if (mapProjects) {
                    mapProjects.forEach((loc) => {
                        if (!loc.lat || !loc.lng) return;
                        
                        const position = { lat: parseFloat(loc.lat), lng: parseFloat(loc.lng) };
                        if (isNaN(position.lat) || isNaN(position.lng)) return;

                        const pin = new google.maps.marker.PinElement({
                            background: '#2E8B57',
                            borderColor: '#0F5C3A',
                            glyphColor: '#F6D000',
                        });

                        const marker = new google.maps.marker.AdvancedMarkerElement({
                            position: position,
                            map: map,
                            title: loc.title,
                            content: pin
                        });
                        
                        pin.style.cursor = 'pointer';
                        
                        marker.addListener("gmp-click", () => {
                            infoWindow.close();
                            infoWindow.setContent(`
                                <div style="font-family: 'Manrope', sans-serif; padding: 12px 14px; min-width: 220px; max-width: 280px;">
                                    <h3 style="margin: 0 0 6px 0; font-weight: 700; font-size: 15px; color: #19191B; line-height: 1.3;">${loc.title}</h3>
                                    ${loc.address ? `<p style="margin: 0 0 10px 0; font-size: 12px; color: #4A4A4A; display: flex; align-items: center; gap: 4px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#2E8B57" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                        ${loc.address}
                                    </p>` : ''}
                                    <a href="${loc.link}" style="display: inline-flex; align-items: center; gap: 6px; background: linear-gradient(135deg, #0F5C3A, #2E8B57); color: #fff; text-decoration: none; padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; width: 100%; justify-content: center; box-sizing: border-box;"
                                       onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
                                        Ver Proyecto
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                                    </a>
                                </div>
                            `);
                            infoWindow.open({ anchor: marker, map: map });
                        });
                    });
                }
            } catch (error) {
                console.error('Error initializing Projects Page Map:', error);
            }
        }

        if (window.isGoogleMapsLoaded) {
            initProjectsPageMap();
        } else {
            window.initMapFunctions = window.initMapFunctions || [];
            window.initMapFunctions.push(initProjectsPageMap);
        }
    }
});
</script>

<?php get_footer(); ?>
