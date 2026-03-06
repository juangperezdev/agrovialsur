<?php
function agrovial_register_cpts() {
    // Projects CPT
    register_post_type('project', array(
        'labels' => array(
            'name' => 'Proyectos',
            'singular_name' => 'Proyecto',
            'add_new' => 'Añadir Nuevo',
            'add_new_item' => 'Añadir Nuevo Proyecto',
            'edit_item' => 'Editar Proyecto',
            'new_item' => 'Nuevo Proyecto',
            'view_item' => 'Ver Proyecto',
            'search_items' => 'Buscar Proyectos',
            'not_found' => 'No se encontraron proyectos',
            'not_found_in_trash' => 'No se encontraron proyectos en la papelera',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-building',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'rewrite' => array('slug' => 'proyectos'),
    ));

    // Register "Categoria de Proyecto" Taxonomy
    register_taxonomy('project_category', 'project', array(
        'labels' => array(
            'name' => 'Categorías de Proyecto',
            'singular_name' => 'Categoría',
            'search_items' => 'Buscar Categorías',
            'all_items' => 'Todas las Categorías',
            'parent_item' => 'Categoría Padre',
            'parent_item_colon' => 'Categoría Padre:',
            'edit_item' => 'Editar Categoría',
            'update_item' => 'Actualizar Categoría',
            'add_new_item' => 'Añadir Nueva Categoría',
            'new_item_name' => 'Nombre de la Nueva Categoría',
            'menu_name' => 'Categorías',
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categoria-proyecto'),
    ));

    // Services CPT
    register_post_type('service', array(
        'labels' => array(
            'name' => 'Servicios',
            'singular_name' => 'Servicio',
            'add_new' => 'Añadir Nuevo',
            'add_new_item' => 'Añadir Nuevo Servicio',
            'edit_item' => 'Editar Servicio',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
    ));

    // Testimonials CPT
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => 'Testimonios',
            'singular_name' => 'Testimonio',
            'add_new' => 'Añadir Nuevo',
            'add_new_item' => 'Añadir Nuevo Testimonio',
            'edit_item' => 'Editar Testimonio',
        ),
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
    ));
    // Locations CPT
    register_post_type('location', array(
        'labels' => array(
            'name' => 'Ubicaciones',
            'singular_name' => 'Ubicación',
            'add_new' => 'Añadir Nueva',
            'add_new_item' => 'Añadir Nueva Ubicación',
            'edit_item' => 'Editar Ubicación',
        ),
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-location',
        'supports' => array('title', 'custom-fields'),
    ));
}
add_action('init', 'agrovial_register_cpts');

// Helper function to handle meta boxes
function agrovial_add_meta_boxes() {
    add_meta_box('project_details', 'Detalles del Proyecto', 'agrovial_project_meta_callback', 'project', 'normal', 'high');
    add_meta_box('testimonial_details', 'Detalles del Testimonio', 'agrovial_testimonial_meta_callback', 'testimonial', 'normal', 'high');
    add_meta_box('location_details', 'Detalles de la Ubicación', 'agrovial_location_meta_callback', 'location', 'normal', 'high');
}
add_action('add_meta_boxes', 'agrovial_add_meta_boxes');

function agrovial_project_meta_callback($post) {
    $location = get_post_meta($post->ID, '_project_location', true);
    $year = get_post_meta($post->ID, '_project_year', true);
    $client = get_post_meta($post->ID, '_project_client', true);
    $lat = get_post_meta($post->ID, '_project_lat', true);
    $lng = get_post_meta($post->ID, '_project_lng', true);
    
    // Stats array storage logic can be complex, simplifying to text inputs for now
    $stat1_label = get_post_meta($post->ID, '_project_stat1_label', true);
    $stat1_value = get_post_meta($post->ID, '_project_stat1_value', true);
    $stat2_label = get_post_meta($post->ID, '_project_stat2_label', true);
    $stat2_value = get_post_meta($post->ID, '_project_stat2_value', true);

    wp_nonce_field('agrovial_save_project_meta', 'agrovial_project_meta_nonce');
    ?>
    <p>
        <label for="project_location">Ubicación:</label>
        <input type="text" id="project_location" name="project_location" value="<?php echo esc_attr($location); ?>" class="widefat">
    </p>
    <p>
        <label for="project_year">Año:</label>
        <input type="text" id="project_year" name="project_year" value="<?php echo esc_attr($year); ?>" class="widefat">
    </p>
    <p>
        <label for="project_client">Cliente:</label>
        <input type="text" id="project_client" name="project_client" value="<?php echo esc_attr($client); ?>" class="widefat">
    </p>
    <div style="display: flex; gap: 1rem;">
        <p style="flex: 1;">
            <label for="project_lat">Latitud:</label>
            <input type="text" id="project_lat" name="project_lat" value="<?php echo esc_attr($lat); ?>" class="widefat">
        </p>
        <p style="flex: 1;">
            <label for="project_lng">Longitud:</label>
            <input type="text" id="project_lng" name="project_lng" value="<?php echo esc_attr($lng); ?>" class="widefat">
        </p>
    </div>
    <hr>
    <p><strong>Estadística 1</strong></p>
    <p>
        <label>Etiqueta:</label> <input type="text" name="project_stat1_label" value="<?php echo esc_attr($stat1_label); ?>">
        <label>Valor:</label> <input type="text" name="project_stat1_value" value="<?php echo esc_attr($stat1_value); ?>">
    </p>
    <p><strong>Estadística 2</strong></p>
    <p>
        <label>Etiqueta:</label> <input type="text" name="project_stat2_label" value="<?php echo esc_attr($stat2_label); ?>">
        <label>Valor:</label> <input type="text" name="project_stat2_value" value="<?php echo esc_attr($stat2_value); ?>">
    </p>
    <?php
}

function agrovial_testimonial_meta_callback($post) {
    $role = get_post_meta($post->ID, '_testimonial_role', true);
    $company = get_post_meta($post->ID, '_testimonial_company', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    $category = get_post_meta($post->ID, '_testimonial_category', true); // publico | privado

    wp_nonce_field('agrovial_save_testimonial_meta', 'agrovial_testimonial_meta_nonce');
    ?>
    <p>
        <label for="testimonial_role">Cargo/Rol:</label>
        <input type="text" id="testimonial_role" name="testimonial_role" value="<?php echo esc_attr($role); ?>" class="widefat">
    </p>
    <p>
        <label for="testimonial_company">Empresa/Entidad:</label>
        <input type="text" id="testimonial_company" name="testimonial_company" value="<?php echo esc_attr($company); ?>" class="widefat">
    </p>
    <p>
        <label for="testimonial_rating">Calificación (1-5):</label>
        <input type="number" id="testimonial_rating" name="testimonial_rating" value="<?php echo esc_attr($rating); ?>" min="1" max="5" class="widefat">
    </p>
    <p>
        <label for="testimonial_category">Categoría:</label>
        <select name="testimonial_category" id="testimonial_category" class="widefat">
            <option value="publico" <?php selected($category, 'publico'); ?>>Sector Público</option>
            <option value="privado" <?php selected($category, 'privado'); ?>>Sector Privado</option>
        </select>
    </p>
    <?php
}

function agrovial_location_meta_callback($post) {
    $address = get_post_meta($post->ID, '_location_address', true);
    $map_query = get_post_meta($post->ID, '_location_map_query', true);

    wp_nonce_field('agrovial_save_location_meta', 'agrovial_location_meta_nonce');
    ?>
    <p>
        <label for="location_address">Dirección (Texto visible):</label>
        <input type="text" id="location_address" name="location_address" value="<?php echo esc_attr($address); ?>" class="widefat">
    </p>
    <p>
        <label for="location_map_query">Términos de Búsqueda (Google Maps):</label>
        <input type="text" id="location_map_query" name="location_map_query" value="<?php echo esc_attr($map_query); ?>" class="widefat" placeholder="Ej: Calle+123+Ciudad">
        <span class="description">Esto se usará si no hay coordenadas definidas.</span>
    </p>
    <div style="display: flex; gap: 1rem;">
        <p style="flex: 1;">
            <label for="location_lat">Latitud:</label>
            <input type="text" id="location_lat" name="location_lat" value="<?php echo esc_attr(get_post_meta($post->ID, '_location_lat', true)); ?>" class="widefat">
        </p>
        <p style="flex: 1;">
            <label for="location_lng">Longitud:</label>
            <input type="text" id="location_lng" name="location_lng" value="<?php echo esc_attr(get_post_meta($post->ID, '_location_lng', true)); ?>" class="widefat">
        </p>
    </div>
    <?php
}

function agrovial_save_meta_boxes($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    // Save Location Meta
    if (isset($_POST['agrovial_location_meta_nonce']) && wp_verify_nonce($_POST['agrovial_location_meta_nonce'], 'agrovial_save_location_meta')) {
        if (isset($_POST['location_address'])) update_post_meta($post_id, '_location_address', sanitize_text_field($_POST['location_address']));
        if (isset($_POST['location_map_query'])) update_post_meta($post_id, '_location_map_query', sanitize_text_field($_POST['location_map_query']));
        if (isset($_POST['location_lat'])) update_post_meta($post_id, '_location_lat', sanitize_text_field($_POST['location_lat']));
        if (isset($_POST['location_lng'])) update_post_meta($post_id, '_location_lng', sanitize_text_field($_POST['location_lng']));
    }
    
    // Save Project Meta
    if (isset($_POST['agrovial_project_meta_nonce']) && wp_verify_nonce($_POST['agrovial_project_meta_nonce'], 'agrovial_save_project_meta')) {
        if (isset($_POST['project_location'])) update_post_meta($post_id, '_project_location', sanitize_text_field($_POST['project_location']));
        if (isset($_POST['project_year'])) update_post_meta($post_id, '_project_year', sanitize_text_field($_POST['project_year']));
        if (isset($_POST['project_client'])) update_post_meta($post_id, '_project_client', sanitize_text_field($_POST['project_client']));
        if (isset($_POST['project_lat'])) update_post_meta($post_id, '_project_lat', sanitize_text_field($_POST['project_lat']));
        if (isset($_POST['project_lng'])) update_post_meta($post_id, '_project_lng', sanitize_text_field($_POST['project_lng']));
        if (isset($_POST['project_stat1_label'])) update_post_meta($post_id, '_project_stat1_label', sanitize_text_field($_POST['project_stat1_label']));
        if (isset($_POST['project_stat1_value'])) update_post_meta($post_id, '_project_stat1_value', sanitize_text_field($_POST['project_stat1_value']));
        if (isset($_POST['project_stat2_label'])) update_post_meta($post_id, '_project_stat2_label', sanitize_text_field($_POST['project_stat2_label']));
        if (isset($_POST['project_stat2_value'])) update_post_meta($post_id, '_project_stat2_value', sanitize_text_field($_POST['project_stat2_value']));
    }

    // Save Testimonial Meta
    if (isset($_POST['agrovial_testimonial_meta_nonce']) && wp_verify_nonce($_POST['agrovial_testimonial_meta_nonce'], 'agrovial_save_testimonial_meta')) {
        if (isset($_POST['testimonial_role'])) update_post_meta($post_id, '_testimonial_role', sanitize_text_field($_POST['testimonial_role']));
        if (isset($_POST['testimonial_company'])) update_post_meta($post_id, '_testimonial_company', sanitize_text_field($_POST['testimonial_company']));
        if (isset($_POST['testimonial_rating'])) update_post_meta($post_id, '_testimonial_rating', sanitize_text_field($_POST['testimonial_rating']));
        if (isset($_POST['testimonial_category'])) update_post_meta($post_id, '_testimonial_category', sanitize_text_field($_POST['testimonial_category']));
    }
}
add_action('save_post', 'agrovial_save_meta_boxes');
