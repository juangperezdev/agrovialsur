<?php
/**
 * Template Name: Home
 * Description: Página principal de Agrovial Sur con todas las secciones del sitio.
 */
get_header(); ?>
<main>
    <?php get_template_part('template-parts/hero'); ?>
    <?php get_template_part('template-parts/infrastructure'); ?>
    <?php get_template_part('template-parts/services'); ?>
    <?php get_template_part('template-parts/capacity'); ?>
    <?php get_template_part('template-parts/why-us'); ?>
    <?php get_template_part('template-parts/projects'); ?>
    <?php get_template_part('template-parts/contact'); ?>
</main>
<?php get_template_part('template-parts/map'); ?>
<?php get_footer(); ?>
