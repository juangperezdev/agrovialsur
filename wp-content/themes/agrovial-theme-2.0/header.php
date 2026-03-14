<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-border shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16 md:h-20">
                <!-- Logo -->
                <a href="<?php echo home_url(); ?>" class="flex items-center">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                        ?>
                        <img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="h-10 md:h-12 w-auto" />
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-agrovial.png" alt="Agrovial Sur" class="h-10 md:h-12 w-auto" />
                    <?php endif; ?>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="<?php echo home_url(); ?>" class="text-muted-foreground hover:text-primary transition-colors font-medium">Inicio</a>
                    <a href="<?php echo home_url('/la-empresa/'); ?>" class="text-muted-foreground hover:text-primary transition-colors font-medium">La Empresa</a>
                    <a href="<?php echo home_url('/servicios/'); ?>" class="text-muted-foreground hover:text-primary transition-colors font-medium">Servicios</a>
                    <a href="<?php echo home_url('/proyectos/'); ?>" class="text-muted-foreground hover:text-primary transition-colors font-medium">Proyectos</a>
                    <a href="<?php echo home_url('#contacto'); ?>" class="text-muted-foreground hover:text-primary transition-colors font-medium">Contacto</a>
                    
                    <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 gradient-primary shadow-button hover:opacity-90 transition-opacity text-primary-foreground">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        Cotizar
                    </button>
                </nav>

                <!-- Mobile Menu Toggle -->
                <button id="mobile-menu-toggle" class="md:hidden p-2 text-foreground" aria-label="Toggle menu">
                    <svg id="icon-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    <svg id="icon-close" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 hidden"><path d="M18 6 6 18"/><path d="m6 6 18 18"/></svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <nav id="mobile-menu" class="hidden md:hidden py-4 border-t border-border animate-fade-up">
                <div class="flex flex-col gap-4">
                    <a href="<?php echo home_url(); ?>" class="text-muted-foreground hover:text-primary transition-colors font-medium py-2 mobile-link">Inicio</a>
                    <a href="<?php echo home_url('/la-empresa/'); ?>" class="text-muted-foreground hover:text-primary transition-colors font-medium py-2 mobile-link">La Empresa</a>
                    <a href="<?php echo home_url('/servicios/'); ?>" class="text-muted-foreground hover:text-primary transition-colors font-medium py-2 mobile-link">Servicios</a>
                    <a href="<?php echo home_url('/proyectos/'); ?>" class="text-muted-foreground hover:text-primary transition-colors font-medium py-2 mobile-link">Proyectos</a>
                    <a href="<?php echo home_url('#contacto'); ?>" class="text-muted-foreground hover:text-primary transition-colors font-medium py-2 mobile-link">Contacto</a>
                    
                    <button class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 gradient-primary shadow-button mt-2 text-primary-foreground">
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        Cotizar
                    </button>
                </div>
            </nav>
        </div>
    </header>
