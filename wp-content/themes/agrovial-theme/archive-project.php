<?php get_header(); ?>

<main class="pt-16 md:pt-20">
    <!-- Hero Section para el Archivo -->
    <section class="bg-primary py-16 md:py-24 text-primary-foreground">
        <div class="container mx-auto px-4">
            <h1 class="font-display text-5xl md:text-7xl mb-4">TODOS LOS PROYECTOS</h1>
            <p class="text-xl opacity-90 max-w-2xl">
                Explore nuestra trayectoria completa en el desarrollo de infraestructura vial de alta calidad para el sector público y privado.
            </p>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="py-20 bg-muted">
        <div class="container mx-auto px-4">
            <?php
            $categories = get_terms(array(
                'taxonomy' => 'project_category',
                'hide_empty' => true,
            ));
            ?>

            <!-- Filters -->
            <div class="flex flex-wrap justify-center gap-3 mb-12" id="project-filters">
                <button class="filter-btn flex items-center gap-2 px-5 py-2.5 rounded-full font-medium transition-all duration-300 gradient-primary text-primary-foreground shadow-button" data-filter="todos">
                    Todos
                </button>
                <?php foreach ($categories as $cat) : ?>
                    <button class="filter-btn flex items-center gap-2 px-5 py-2.5 rounded-full font-medium transition-all duration-300 bg-card text-muted-foreground hover:text-foreground hover:bg-card/80 shadow-card" data-filter="<?php echo esc_attr($cat->slug); ?>">
                        <?php echo esc_html($cat->name); ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8" id="projects-grid">
                <?php
                if (have_posts()) :
                    $delay_counter = 0;
                    while (have_posts()) : the_post();
                        $terms = get_the_terms(get_the_ID(), 'project_category');
                        $cat_slug = !empty($terms) ? $terms[0]->slug : '';
                        $cat_name = !empty($terms) ? $terms[0]->name : '';
                        
                        $location = get_post_meta(get_the_ID(), '_project_location', true);
                        $year = get_post_meta(get_the_ID(), '_project_year', true);
                        $stat1_label = get_post_meta(get_the_ID(), '_project_stat1_label', true);
                        $stat1_value = get_post_meta(get_the_ID(), '_project_stat1_value', true);
                        $stat2_label = get_post_meta(get_the_ID(), '_project_stat2_label', true);
                        $stat2_value = get_post_meta(get_the_ID(), '_project_stat2_value', true);
                        
                        $delay = $delay_counter * 0.1;
                        $delay_counter++;
                ?>
                    <article class="project-item group bg-card rounded-2xl overflow-hidden shadow-card hover:shadow-card-hover transition-all duration-500" data-category="<?php echo esc_attr($cat_slug); ?>" style="animation-delay: <?php echo $delay; ?>s">
                        <!-- Image -->
                        <div class="relative h-56 overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110')); ?>
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

                            <h3 class="font-display text-2xl text-card-foreground mb-2 group-hover:text-primary transition-colors">
                                <?php the_title(); ?>
                            </h3>

                            <div class="text-muted-foreground text-sm leading-relaxed">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article>
                <?php
                    endwhile;
                    
                    // Pagination
                    echo '<div class="col-span-full mt-12 flex justify-center gap-4 py-8">';
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="m15 18-6-6 6-6"/></svg>',
                        'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="m9 18 6-6-6-6"/></svg>',
                    ));
                    echo '</div>';
                else :
                    echo '<p class="col-span-full text-center text-muted-foreground">No se encontraron proyectos.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Global CTA -->
    <section class="py-20 bg-background border-t border-border">
        <div class="container mx-auto px-4 text-center">
            <h2 class="font-display text-4xl md:text-5xl mb-6">¿TIENE UN PROYECTO EN MENTE?</h2>
            <p class="text-xl text-muted-foreground mb-10 max-w-2xl mx-auto">
                Nuestro equipo está listo para ayudarle a hacer realidad su visión con los más altos estándares de calidad.
            </p>
            <a href="<?php echo home_url('#contacto'); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-11 px-8 gradient-primary shadow-button hover:opacity-90 transition-opacity text-primary-foreground">
                Contáctenos Ahora
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 ml-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectItems = document.querySelectorAll('.project-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.getAttribute('data-filter');

            // Update active button state
            filterBtns.forEach(b => {
                b.classList.remove('gradient-primary', 'text-primary-foreground', 'shadow-button');
                b.classList.add('bg-card', 'text-muted-foreground', 'shadow-card');
            });
            btn.classList.remove('bg-card', 'text-muted-foreground', 'shadow-card');
            btn.classList.add('gradient-primary', 'text-primary-foreground', 'shadow-button');

            // Filter items
            projectItems.forEach(item => {
                if (filter === 'todos' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                    setTimeout(() => { item.style.opacity = '1'; }, 10);
                } else {
                    item.style.opacity = '0';
                    setTimeout(() => { item.style.display = 'none'; }, 500);
                }
            });
        });
    });
});
</script>

<?php get_footer(); ?>
