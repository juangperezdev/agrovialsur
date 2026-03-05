<?php get_header(); ?>
<main class="container mx-auto px-4 py-16">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>
            <article <?php post_class(); ?>>
                <h2 class="text-3xl font-display mb-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="prose max-w-none">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
    else :
        echo '<p>No content found</p>';
    endif;
    ?>
</main>
<?php get_footer(); ?>
