<?php get_header(); ?>
<main class="container mx-auto px-4 py-20 mt-20">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="mb-8">
                <h2 class="font-display text-3xl text-foreground mb-4">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="text-muted-foreground"><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p class="text-muted-foreground">No se encontraron entradas.</p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
