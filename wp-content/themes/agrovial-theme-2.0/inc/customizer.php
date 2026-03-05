<?php
function agrovial_customize_register($wp_customize) {
    // Panel
    $wp_customize->add_panel('agrovial_options', array(
        'title' => 'Opciones Agrovial Sur',
        'priority' => 10,
    ));

    // --- Hero Section ---
    $wp_customize->add_section('agrovial_hero', array(
        'title' => 'Hero / Portada',
        'panel' => 'agrovial_options',
    ));

    // Hero Title
    $wp_customize->add_setting('hero_title', array('default' => 'CONSTRUIMOS EL FUTURO VIAL'));
    $wp_customize->add_control('hero_title', array(
        'label' => 'Título Principal',
        'section' => 'agrovial_hero',
        'type' => 'text',
    ));
    
    // Hero Subtitle/Badge
    $wp_customize->add_setting('hero_badge', array('default' => '+25 años de experiencia en infraestructura vial'));
    $wp_customize->add_control('hero_badge', array(
        'label' => 'Texto del Badge',
        'section' => 'agrovial_hero',
        'type' => 'text',
    ));

    // Hero Description
    $wp_customize->add_setting('hero_description', array('default' => 'Líderes en construcción y mantenimiento de infraestructura vial. Proyectos públicos y privados con los más altos estándares de calidad.'));
    $wp_customize->add_control('hero_description', array(
        'label' => 'Descripción',
        'section' => 'agrovial_hero',
        'type' => 'textarea',
    ));

    // Hero Image
    $wp_customize->add_setting('hero_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label' => 'Imagen de Fondo',
        'section' => 'agrovial_hero',
    )));

    // Hero Button 1
    $wp_customize->add_setting('hero_btn1_text', array('default' => 'Nuestros Servicios'));
    $wp_customize->add_control('hero_btn1_text', array(
        'label' => 'Botón 1: Texto',
        'section' => 'agrovial_hero',
        'type' => 'text',
    ));
    $wp_customize->add_setting('hero_btn1_url', array('default' => '#servicios'));
    $wp_customize->add_control('hero_btn1_url', array(
        'label' => 'Botón 1: Enlace',
        'section' => 'agrovial_hero',
        'type' => 'text',
    ));

    // Hero Button 2
    $wp_customize->add_setting('hero_btn2_text', array('default' => 'Ver Proyectos'));
    $wp_customize->add_control('hero_btn2_text', array(
        'label' => 'Botón 2: Texto',
        'section' => 'agrovial_hero',
        'type' => 'text',
    ));
    $wp_customize->add_setting('hero_btn2_url', array('default' => '#proyectos'));
    $wp_customize->add_control('hero_btn2_url', array(
        'label' => 'Botón 2: Enlace',
        'section' => 'agrovial_hero',
        'type' => 'text',
    ));

    // Stats
    for ($i = 1; $i <= 4; $i++) {
        $default_val = '';
        $default_lbl = '';
        
        switch ($i) {
            case 1: $default_val = '500+'; $default_lbl = 'Proyectos Completados'; break;
            case 2: $default_val = '25+'; $default_lbl = 'Años de Experiencia'; break;
            case 3: $default_val = '1,200'; $default_lbl = 'Km Construidos'; break;
            case 4: $default_val = '98%'; $default_lbl = 'Clientes Satisfechos'; break;
        }

        $wp_customize->add_setting("hero_stat{$i}_val", array('default' => $default_val));
        $wp_customize->add_control("hero_stat{$i}_val", array(
            'label' => "Estadística {$i}: Valor",
            'section' => 'agrovial_hero',
            'type' => 'text',
        ));
        
        $wp_customize->add_setting("hero_stat{$i}_lbl", array('default' => $default_lbl));
        $wp_customize->add_control("hero_stat{$i}_lbl", array(
            'label' => "Estadística {$i}: Etiqueta",
            'section' => 'agrovial_hero',
            'type' => 'text',
        ));
    }

    // --- About Section ---
    $wp_customize->add_section('agrovial_about', array(
        'title' => 'Sección Sobre Nosotros',
        'panel' => 'agrovial_options',
    ));

    $wp_customize->add_setting('about_title', array('default' => 'CONSTRUYENDO EXCELENCIA'));
    $wp_customize->add_control('about_title', array('label' => 'Título', 'section' => 'agrovial_about', 'type' => 'text'));

    $wp_customize->add_setting('about_text', array('default' => 'Desde 1999, hemos sido pioneros...'));
    $wp_customize->add_control('about_text', array('label' => 'Texto Principal', 'section' => 'agrovial_about', 'type' => 'textarea'));

    // --- Contact Info ---
    $wp_customize->add_section('agrovial_contact', array(
        'title' => 'Información de Contacto',
        'panel' => 'agrovial_options',
    ));

    $wp_customize->add_setting('contact_phone', array('default' => '+52 (55) 1234-5678'));
    $wp_customize->add_control('contact_phone', array('label' => 'Teléfono', 'section' => 'agrovial_contact', 'type' => 'text'));

    $wp_customize->add_setting('contact_email', array('default' => 'contacto@constructoravial.mx'));
    $wp_customize->add_control('contact_email', array('label' => 'Email', 'section' => 'agrovial_contact', 'type' => 'text'));
    
    $wp_customize->add_setting('contact_address', array('default' => 'Ciudad de México, México'));
    $wp_customize->add_control('contact_address', array('label' => 'Dirección', 'section' => 'agrovial_contact', 'type' => 'text'));
    // --- Services Section ---
    $wp_customize->add_section('agrovial_services', array(
        'title' => 'Sección Servicios',
        'panel' => 'agrovial_options',
    ));

    // Services Badge
    $wp_customize->add_setting('services_badge', array('default' => 'Nuestros Servicios'));
    $wp_customize->add_control('services_badge', array(
        'label' => 'Etiqueta Superior',
        'section' => 'agrovial_services',
        'type' => 'text',
    ));

    // Services Title
    $wp_customize->add_setting('services_title', array('default' => 'SERVICIOS DESTACADOS'));
    $wp_customize->add_control('services_title', array(
        'label' => 'Título Principal',
        'section' => 'agrovial_services',
        'type' => 'text',
    ));

    // Services Description
    $wp_customize->add_setting('services_desc', array('default' => 'Ofrecemos soluciones integrales para el sector público y privado, adaptándonos a las necesidades específicas de cada proyecto.'));
    $wp_customize->add_control('services_desc', array(
        'label' => 'Descripción',
        'section' => 'agrovial_services',
        'type' => 'textarea',
    ));

    // --- Projects Section ---
    $wp_customize->add_section('agrovial_projects', array(
        'title' => 'Sección Proyectos',
        'panel' => 'agrovial_options',
    ));

    // Projects Badge
    $wp_customize->add_setting('projects_badge', array('default' => 'Portafolio'));
    $wp_customize->add_control('projects_badge', array(
        'label' => 'Etiqueta Superior',
        'section' => 'agrovial_projects',
        'type' => 'text',
    ));

    // Projects Title
    $wp_customize->add_setting('projects_title', array('default' => 'PROYECTOS COMPLETADOS'));
    $wp_customize->add_control('projects_title', array(
        'label' => 'Título Principal',
        'section' => 'agrovial_projects',
        'type' => 'text',
    ));

    // Projects Description
    $wp_customize->add_setting('projects_desc', array('default' => 'Más de 500 proyectos exitosos en todo el país. Explore nuestra trayectoria en obras públicas y privadas.'));
    $wp_customize->add_control('projects_desc', array(
        'label' => 'Descripción',
        'section' => 'agrovial_projects',
        'type' => 'textarea',
    ));

    // --- About Us Section ---
    $wp_customize->add_section('agrovial_about', array(
        'title' => 'Sección Sobre Nosotros',
        'panel' => 'agrovial_options',
    ));

    // About Badge
    $wp_customize->add_setting('about_badge', array('default' => 'Sobre Nosotros'));
    $wp_customize->add_control('about_badge', array(
        'label' => 'Etiqueta Superior',
        'section' => 'agrovial_about',
        'type' => 'text',
    ));

    // About Title
    $wp_customize->add_setting('about_title', array('default' => 'CONSTRUYENDO EXCELENCIA'));
    $wp_customize->add_control('about_title', array(
        'label' => 'Título Principal',
        'section' => 'agrovial_about',
        'type' => 'text',
    ));

    // About Desc 1
    $wp_customize->add_setting('about_text', array('default' => 'Desde 1999, hemos sido pioneros en la construcción de infraestructura vial de alta calidad. Nuestro compromiso con la excelencia nos ha posicionado como líderes en el sector.'));
    $wp_customize->add_control('about_text', array(
        'label' => 'Párrafo 1',
        'section' => 'agrovial_about',
        'type' => 'textarea',
    ));

    // About Desc 2
    $wp_customize->add_setting('about_text_2', array('default' => 'Trabajamos con gobiernos, municipios y empresas privadas para desarrollar proyectos que transforman comunidades y mejoran la conectividad regional. Cada kilómetro construido representa nuestra dedicación a la calidad y la innovación.'));
    $wp_customize->add_control('about_text_2', array(
        'label' => 'Párrafo 2',
        'section' => 'agrovial_about',
        'type' => 'textarea',
    ));

    // Stat 1
    $wp_customize->add_setting('about_stat_1_val', array('default' => '99%'));
    $wp_customize->add_control('about_stat_1_val', array('label' => 'Estadística 1: Valor', 'section' => 'agrovial_about', 'type' => 'text'));
    $wp_customize->add_setting('about_stat_1_label', array('default' => 'Entregas a tiempo'));
    $wp_customize->add_control('about_stat_1_label', array('label' => 'Estadística 1: Etiqueta', 'section' => 'agrovial_about', 'type' => 'text'));

    // Stat 2
    $wp_customize->add_setting('about_stat_2_val', array('default' => 'ISO 9001'));
    $wp_customize->add_control('about_stat_2_val', array('label' => 'Estadística 2: Valor', 'section' => 'agrovial_about', 'type' => 'text'));
    $wp_customize->add_setting('about_stat_2_label', array('default' => 'Certificación'));
    $wp_customize->add_control('about_stat_2_label', array('label' => 'Estadística 2: Etiqueta', 'section' => 'agrovial_about', 'type' => 'text'));

    // Stat 3
    $wp_customize->add_setting('about_stat_3_val', array('default' => '15'));
    $wp_customize->add_control('about_stat_3_val', array('label' => 'Estadística 3: Valor', 'section' => 'agrovial_about', 'type' => 'text'));
    $wp_customize->add_setting('about_stat_3_label', array('default' => 'Estados cubiertos'));
    $wp_customize->add_control('about_stat_3_label', array('label' => 'Estadística 3: Etiqueta', 'section' => 'agrovial_about', 'type' => 'text'));

    // --- Features (Hardcoded Icons, Editable Text) ---
    // Feature 1
    $wp_customize->add_setting('about_feat_1_title', array('default' => 'Seguridad Garantizada'));
    $wp_customize->add_control('about_feat_1_title', array('label' => 'Característica 1: Título', 'section' => 'agrovial_about', 'type' => 'text'));
    $wp_customize->add_setting('about_feat_1_desc', array('default' => 'Cumplimos con las normas más estrictas de seguridad vial internacional.'));
    $wp_customize->add_control('about_feat_1_desc', array('label' => 'Característica 1: Descripción', 'section' => 'agrovial_about', 'type' => 'textarea'));

    // Feature 2
    $wp_customize->add_setting('about_feat_2_title', array('default' => 'Tecnología Avanzada'));
    $wp_customize->add_control('about_feat_2_title', array('label' => 'Característica 2: Título', 'section' => 'agrovial_about', 'type' => 'text'));
    $wp_customize->add_setting('about_feat_2_desc', array('default' => 'Utilizamos maquinaria de última generación para optimizar tiempos y costos.'));
    $wp_customize->add_control('about_feat_2_desc', array('label' => 'Característica 2: Descripción', 'section' => 'agrovial_about', 'type' => 'textarea'));

    // Feature 3
    $wp_customize->add_setting('about_feat_3_title', array('default' => 'Sostenibilidad'));
    $wp_customize->add_control('about_feat_3_title', array('label' => 'Característica 3: Título', 'section' => 'agrovial_about', 'type' => 'text'));
    $wp_customize->add_setting('about_feat_3_desc', array('default' => 'Procesos optimizados para minimizar el impacto ambiental en cada obra.'));
    $wp_customize->add_control('about_feat_3_desc', array('label' => 'Característica 3: Descripción', 'section' => 'agrovial_about', 'type' => 'textarea'));

    // Feature 4
    $wp_customize->add_setting('about_feat_4_title', array('default' => 'Equipo Experto'));
    $wp_customize->add_control('about_feat_4_title', array('label' => 'Característica 4: Título', 'section' => 'agrovial_about', 'type' => 'text'));
    $wp_customize->add_setting('about_feat_4_desc', array('default' => 'Ingenieros y técnicos altamente capacitados con años de experiencia.'));
    $wp_customize->add_control('about_feat_4_desc', array('label' => 'Característica 4: Descripción', 'section' => 'agrovial_about', 'type' => 'textarea'));

    // --- Map Section ---
    $wp_customize->add_section('agrovial_map', array(
        'title' => 'Mapa / Ubicaciones',
        'panel' => 'agrovial_options',
    ));

    // Main Map Reference
    $wp_customize->add_setting('map_embed_url', array(
        'default' => 'https://maps.google.com/maps?q=-41.1335,-71.3103&z=7&output=embed',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('map_embed_url', array(
        'label' => 'URL del Mapa Principal (Embed)',
        'description' => 'URL para el iframe del mapa grande.',
        'section' => 'agrovial_map',
        'type' => 'url',
    ));

    // Locations 1-4 loop removed in favor of CPT 'location'
}
add_action('customize_register', 'agrovial_customize_register');
