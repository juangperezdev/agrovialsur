<?php
$args = array(
    'post_type' => 'service',
    'posts_per_page' => 6,
    'order' => 'ASC'
);
$services_query = new WP_Query($args);
?>
<section id="servicios" class="py-20 md:py-32 bg-muted">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                <?php echo esc_html(get_option('services_badge', 'Nuestros Servicios')); ?>
            </span>
            <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-foreground mb-4">
                <?php echo esc_html(get_option('services_title', 'SERVICIOS DESTACADOS')); ?>
            </h2>
            <p class="text-muted-foreground text-lg">
                <?php echo esc_html(get_option('services_desc', 'Movimiento de suelo, hormigón elaborado, obras de gas, infraestructura sanitaria y obras civiles. Soluciones integrales para cada proyecto.')); ?>
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            if ($services_query->have_posts()) :
                $delay_counter = 0;
                while ($services_query->have_posts()) : $services_query->the_post();
                    $delay_class = ($delay_counter % 2 == 0) ? 'animate-slide-in-left' : 'animate-slide-in-right';
                    $delay_counter++;
            ?>
                <div class="group relative overflow-hidden rounded-2xl shadow-card hover:shadow-card-hover transition-all duration-500 gradient-card <?php echo $delay_class; ?>">
                    <!-- Image -->
                    <div class="relative h-64 overflow-hidden">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110')); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/public-service.jpg" alt="<?php the_title(); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                        <?php endif; ?>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-card via-card/50 to-transparent"></div>
                        
                        <!-- Icon Badge -->
                        <div class="absolute top-4 left-4 w-14 h-14 rounded-xl gradient-primary flex items-center justify-center shadow-button">
                             <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-7 h-7 text-primary-foreground"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6 md:p-8">
                        <h3 class="font-display text-3xl md:text-4xl text-foreground mb-3">
                            <?php the_title(); ?>
                        </h3>
                        <div class="text-muted-foreground mb-6"><?php the_content(); ?></div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>
