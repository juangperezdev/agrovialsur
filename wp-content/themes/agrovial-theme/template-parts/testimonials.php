<?php
$args = array(
    'post_type' => 'testimonial',
    'posts_per_page' => -1,
    'order' => 'DESC'
);
$testimonials_query = new WP_Query($args);
?>
<section class="py-20 md:py-32 bg-secondary overflow-hidden">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-sm font-medium mb-4">
                Testimonios
            </span>
            <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-secondary-foreground mb-4">
                LO QUE DICEN <span class="text-gradient">NUESTROS CLIENTES</span>
            </h2>
            <p class="text-secondary-foreground/70 text-lg">
                La satisfacción de nuestros clientes es nuestro mayor logro. Descubra por qué
                confían en nosotros.
            </p>
        </div>

        <!-- Carousel -->
        <div class="relative group">
            <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 no-scrollbar scroll-smooth" id="testimonials-carousel">
                <?php
                if ($testimonials_query->have_posts()) :
                    while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                        $role = get_post_meta(get_the_ID(), '_testimonial_role', true);
                        $company = get_post_meta(get_the_ID(), '_testimonial_company', true);
                        $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
                        $category = get_post_meta(get_the_ID(), '_testimonial_category', true);
                ?>
                    <div class="flex-[0_0_100%] min-w-0 md:flex-[0_0_50%] lg:flex-[0_0_33.333%] px-3 md:px-4 snap-center">
                        <div class="bg-card rounded-2xl p-6 md:p-8 shadow-card hover:shadow-card-hover transition-all duration-300 h-full flex flex-col">
                            <!-- Quote Icon -->
                            <div class="w-12 h-12 rounded-xl gradient-primary flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/></svg>
                            </div>

                            <!-- Rating -->
                            <div class="flex gap-1 mb-4">
                                <?php for($i=0; $i<$rating; $i++): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none" class="w-4 h-4 text-accent"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <?php endfor; ?>
                            </div>

                            <!-- Quote -->
                            <blockquote class="text-card-foreground leading-relaxed mb-6 flex-grow">
                                "<?php echo get_the_content(); ?>"
                            </blockquote>

                            <!-- Author -->
                            <div class="flex items-center gap-4 pt-6 border-t border-border">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('thumbnail', array('class' => 'w-14 h-14 rounded-full object-cover ring-2 ring-primary/20')); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/testimonial-1.jpg" alt="<?php the_title(); ?>" class="w-14 h-14 rounded-full object-cover ring-2 ring-primary/20" />
                                <?php endif; ?>
                                
                                <div class="flex-grow">
                                    <div class="font-display text-lg text-card-foreground">
                                        <?php the_title(); ?>
                                    </div>
                                    <div class="text-sm text-muted-foreground">
                                        <?php echo esc_html($role); ?>
                                    </div>
                                    <div class="text-xs text-muted-foreground/70">
                                        <?php echo esc_html($company); ?>
                                    </div>
                                </div>
                                <div class="p-2 rounded-lg <?php echo $category === 'publico' ? 'bg-primary/10 text-primary' : 'bg-secondary text-secondary-foreground'; ?>">
                                    <?php if ($category === 'publico') : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg>
                                    <?php else : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <!-- Navigation Buttons -->
            <button id="prev-testimonial" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 md:-translate-x-4 w-12 h-12 rounded-full bg-card shadow-card flex items-center justify-center text-foreground hover:bg-primary hover:text-primary-foreground transition-colors z-10 hidden md:flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            <button id="next-testimonial" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 md:translate-x-4 w-12 h-12 rounded-full bg-card shadow-card flex items-center justify-center text-foreground hover:bg-primary hover:text-primary-foreground transition-colors z-10 hidden md:flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="m9 18 6-6-6-6"/></svg>
            </button>
        </div>
    </div>
</section>

<style>
/* Hide scrollbar for Chrome, Safari and Opera */
.no-scrollbar::-webkit-scrollbar {
  display: none;
}
/* Hide scrollbar for IE, Edge and Firefox */
.no-scrollbar {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('testimonials-carousel');
    const prevBtn = document.getElementById('prev-testimonial');
    const nextBtn = document.getElementById('next-testimonial');
    
    if (prevBtn && nextBtn && carousel) {
        prevBtn.addEventListener('click', () => {
             carousel.scrollBy({ left: -carousel.offsetWidth / 2, behavior: 'smooth' });
        });
        
        nextBtn.addEventListener('click', () => {
             carousel.scrollBy({ left: carousel.offsetWidth / 2, behavior: 'smooth' });
        });
    }
});
</script>
