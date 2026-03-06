<?php get_header(); ?>

<main class="pt-24 md:pt-32 pb-16 md:pb-24 bg-background">
    <?php while (have_posts()) : the_post(); 
        $terms = get_the_terms(get_the_ID(), 'project_category');
        $cat_name = !empty($terms) ? $terms[0]->name : '';
        $cat_slug = !empty($terms) ? $terms[0]->slug : '';
        
        $location = get_post_meta(get_the_ID(), '_project_location', true);
        $year = get_post_meta(get_the_ID(), '_project_year', true);
        $client = get_post_meta(get_the_ID(), '_project_client', true);
        $lat = get_post_meta(get_the_ID(), '_project_lat', true);
        $lng = get_post_meta(get_the_ID(), '_project_lng', true);
        
        $stat1_label = get_post_meta(get_the_ID(), '_project_stat1_label', true);
        $stat1_value = get_post_meta(get_the_ID(), '_project_stat1_value', true);
        $stat2_label = get_post_meta(get_the_ID(), '_project_stat2_label', true);
        $stat2_value = get_post_meta(get_the_ID(), '_project_stat2_value', true);
    ?>
    <article class="container mx-auto px-4">
        <!-- Header Section -->
        <header class="mb-12">
            <?php if ($cat_name) : ?>
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-medium mb-4 <?php echo $cat_slug === 'publico' ? 'bg-primary/10 text-primary' : 'bg-secondary/10 text-secondary'; ?>">
                    <?php echo esc_html($cat_name); ?>
                </span>
            <?php endif; ?>
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl mb-6 text-foreground">
                <?php the_title(); ?>
            </h1>
            
            <!-- Quick Meta -->
            <div class="flex flex-wrap items-center gap-6 text-muted-foreground text-sm">
                <?php if ($location) : ?>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    <?php echo esc_html($location); ?>
                </div>
                <?php endif; ?>
                
                <?php if ($year) : ?>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    <?php echo esc_html($year); ?>
                </div>
                <?php endif; ?>
                
                <?php if ($client) : ?>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                    Cliente: <span class="text-foreground font-medium"><?php echo esc_html($client); ?></span>
                </div>
                <?php endif; ?>
            </div>
        </header>

        <!-- Main Layout -->
        <div class="grid lg:grid-cols-3 gap-10">
            <!-- Left Column: Content & Image -->
            <div class="lg:col-span-2 space-y-10">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="rounded-2xl overflow-hidden shadow-lg border border-border aspect-video">
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover')); ?>
                    </div>
                <?php endif; ?>
                
                <!-- Technical Description -->
                <div class="prose prose-lg dark:prose-invert max-w-none text-muted-foreground leading-relaxed">
                    <h2 class="text-2xl font-display text-foreground mb-4">Descripción Técnica</h2>
                    <?php the_content(); ?>
                </div>
            </div>

            <!-- Right Column: Stats & Map -->
            <div class="space-y-8">
                <!-- Quantitative Data -->
                <?php if (($stat1_label && $stat1_value) || ($stat2_label && $stat2_value)) : ?>
                    <div class="bg-card rounded-2xl p-6 md:p-8 shadow-card border border-border">
                        <h3 class="font-display text-xl mb-6 text-foreground">Datos Relevantes</h3>
                        <div class="grid gap-6">
                            <?php if ($stat1_label && $stat1_value) : ?>
                                <div class="bg-muted rounded-xl p-4 border border-border/50">
                                    <div class="text-sm text-muted-foreground mb-1"><?php echo esc_html($stat1_label); ?></div>
                                    <div class="font-display text-2xl text-primary"><?php echo esc_html($stat1_value); ?></div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($stat2_label && $stat2_value) : ?>
                                <div class="bg-muted rounded-xl p-4 border border-border/50">
                                    <div class="text-sm text-muted-foreground mb-1"><?php echo esc_html($stat2_label); ?></div>
                                    <div class="font-display text-2xl text-secondary"><?php echo esc_html($stat2_value); ?></div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Map -->
                <?php if ($lat && $lng) : ?>
                    <div class="bg-card rounded-2xl p-6 md:p-8 shadow-card border border-border">
                        <h3 class="font-display text-xl mb-6 text-foreground">Geolocalización</h3>
                        <div class="rounded-xl overflow-hidden shadow-inner border border-border" style="min-height: 300px; height: 300px; width: 100%;">
                            <div id="project-map" style="width: 100%; height: 100%; min-height: 300px;"></div>
                        </div>
                    </div>
                    
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const mapElement = document.getElementById('project-map');
                        if (mapElement) {
                            const lat = <?php echo floatval($lat); ?>;
                            const lng = <?php echo floatval($lng); ?>;
                            const title = <?php echo json_encode(get_the_title()); ?>;
                            
                            function initSingleProjectMap() {
                                if (typeof google === 'undefined' || typeof google.maps === 'undefined' || typeof google.maps.Map === 'undefined' || typeof google.maps.marker === 'undefined') {
                                    setTimeout(initSingleProjectMap, 100);
                                    return;
                                }

                                const map = new google.maps.Map(mapElement, {
                                    zoom: 12,
                                    center: { lat, lng },
                                    mapId: 'DEMO_MAP_ID',
                                });

                                const pin = new google.maps.marker.PinElement({
                                    background: '#e11d48',
                                    borderColor: '#881337',
                                    glyphColor: '#ffffff',
                                });

                                new google.maps.marker.AdvancedMarkerElement({
                                    position: { lat, lng },
                                    map: map,
                                    title: title,
                                    content: pin
                                });
                            }

                            if (window.isGoogleMapsLoaded) {
                                initSingleProjectMap();
                            } else {
                                window.initMapFunctions = window.initMapFunctions || [];
                                window.initMapFunctions.push(initSingleProjectMap);
                            }
                        }
                    });
                    </script>
                <?php endif; ?>
                
                <!-- Return Button -->
                <div class="text-center md:text-left">
                    <a href="<?php echo get_post_type_archive_link('project'); ?>" class="inline-flex items-center justify-center gap-2 text-primary hover:text-primary/80 font-medium transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="m15 18-6-6 6-6"/></svg>
                        Volver a Proyectos
                    </a>
                </div>
            </div>
        </div>
    </article>
    <?php endwhile; ?>
</main>

<!-- Global CTA -->
<section class="py-20 bg-muted border-t border-border">
    <div class="container mx-auto px-4 text-center">
        <h2 class="font-display text-4xl md:text-5xl mb-6">¿TIENE UN PROYECTO SIMILAR EN MENTE?</h2>
        <p class="text-xl text-muted-foreground mb-10 max-w-2xl mx-auto">
            Contacte con nuestro equipo para evaluar y desarrollar su próxima gran obra de infraestructura.
        </p>
        <a href="<?php echo home_url('#contacto'); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-11 px-8 gradient-primary shadow-button hover:opacity-90 text-primary-foreground">
            Contactar Ahora
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ml-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
    </div>
</section>

<?php get_footer(); ?>
