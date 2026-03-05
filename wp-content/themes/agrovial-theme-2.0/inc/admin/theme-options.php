<?php
/**
 * Theme Options Page
 */

function agrovial2_add_theme_page() {
    add_menu_page(
        'Opciones Agrovial',
        'Opciones Agrovial',
        'manage_options',
        'agrovial-options',
        'agrovial2_theme_options_page',
        'dashicons-admin-generic',
        60
    );
}
add_action('admin_menu', 'agrovial2_add_theme_page');

function agrovial2_register_settings() {
    // Hero Section
    register_setting('agrovial_options_group', 'hero_title');
    register_setting('agrovial_options_group', 'hero_badge');
    register_setting('agrovial_options_group', 'hero_description');
    register_setting('agrovial_options_group', 'hero_btn1_text');
    register_setting('agrovial_options_group', 'hero_btn1_url');
    register_setting('agrovial_options_group', 'hero_btn2_text');
    register_setting('agrovial_options_group', 'hero_btn2_url');
    for ($i = 1; $i <= 4; $i++) {
        register_setting('agrovial_options_group', "hero_stat{$i}_val");
        register_setting('agrovial_options_group', "hero_stat{$i}_lbl");
    }

    // Contact
    register_setting('agrovial_options_group', 'contact_phone');
    register_setting('agrovial_options_group', 'contact_email');
    register_setting('agrovial_options_group', 'contact_address');
    
    // Services
    register_setting('agrovial_options_group', 'services_badge');
    register_setting('agrovial_options_group', 'services_title');
    register_setting('agrovial_options_group', 'services_desc');

    // Projects
    register_setting('agrovial_options_group', 'projects_badge');
    register_setting('agrovial_options_group', 'projects_title');
    register_setting('agrovial_options_group', 'projects_desc');

    // Infraestructura
    for ($i = 1; $i <= 3; $i++) {
        register_setting('agrovial_options_group', "infra_{$i}_title");
        register_setting('agrovial_options_group', "infra_{$i}_desc");
    }

    // Capacidad Operativa
    for ($i = 1; $i <= 4; $i++) {
        register_setting('agrovial_options_group', "capacity_{$i}_value");
        register_setting('agrovial_options_group', "capacity_{$i}_title");
        register_setting('agrovial_options_group', "capacity_{$i}_desc");
    }

    // Por qué elegirnos
    for ($i = 1; $i <= 6; $i++) {
        register_setting('agrovial_options_group', "whyus_feat_{$i}_title");
        register_setting('agrovial_options_group', "whyus_feat_{$i}_desc");
    }
    for ($i = 1; $i <= 3; $i++) {
        register_setting('agrovial_options_group', "whyus_stat_{$i}_val");
        register_setting('agrovial_options_group', "whyus_stat_{$i}_label");
    }

    // Map
    register_setting('agrovial_options_group', 'map_embed_url');
}
add_action('admin_init', 'agrovial2_register_settings');

function agrovial2_theme_options_page() {
    ?>
    <div class="wrap">
        <h1>Opciones Agrovial Sur</h1>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_options_group'); ?>
            <?php do_settings_sections('agrovial_options_group'); ?>

            <h2 class="title">Sección Hero</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Título Principal</th>
                    <td><input type="text" name="hero_title" value="<?php echo esc_attr(get_option('hero_title', 'INFRAESTRUCTURA PARA EL DESARROLLO PRIVADO EN RÍO NEGRO')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Badge</th>
                    <td><input type="text" name="hero_badge" value="<?php echo esc_attr(get_option('hero_badge', '+25 años de experiencia en infraestructura vial')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Descripción</th>
                    <td><textarea name="hero_description" rows="3" class="large-text"><?php echo esc_textarea(get_option('hero_description', 'Líderes en construcción y mantenimiento de infraestructura vial en la Patagonia. Proyectos públicos y privados con los más altos estándares de calidad.')); ?></textarea></td>
                </tr>
                 <tr valign="top">
                    <th scope="row">Botón 1 (Texto)</th>
                    <td><input type="text" name="hero_btn1_text" value="<?php echo esc_attr(get_option('hero_btn1_text', 'Nuestros Servicios')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Botón 1 (Link)</th>
                    <td><input type="text" name="hero_btn1_url" value="<?php echo esc_attr(get_option('hero_btn1_url', '#servicios')); ?>" class="regular-text" /></td>
                </tr>
                 <tr valign="top">
                    <th scope="row">Botón 2 (Texto)</th>
                    <td><input type="text" name="hero_btn2_text" value="<?php echo esc_attr(get_option('hero_btn2_text', 'Ver Proyectos')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Botón 2 (Link)</th>
                    <td><input type="text" name="hero_btn2_url" value="<?php echo esc_attr(get_option('hero_btn2_url', '#proyectos')); ?>" class="regular-text" /></td>
                </tr>
                <?php for ($i = 1; $i <= 4; $i++) : ?>
                     <tr valign="top">
                        <th scope="row">Stat <?php echo $i; ?></th>
                        <td>
                            Valor: <input type="text" name="hero_stat<?php echo $i; ?>_val" value="<?php echo esc_attr(get_option("hero_stat{$i}_val")); ?>" class="small-text" />
                            Etiqueta: <input type="text" name="hero_stat<?php echo $i; ?>_lbl" value="<?php echo esc_attr(get_option("hero_stat{$i}_lbl")); ?>" class="regular-text" />
                        </td>
                    </tr>
                <?php endfor; ?>
            </table>
            
           <h2 class="title">Información de Contacto</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teléfono</th>
                    <td><input type="text" name="contact_phone" value="<?php echo esc_attr(get_option('contact_phone', '+54 (299) 123-4567')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Email</th>
                    <td><input type="email" name="contact_email" value="<?php echo esc_attr(get_option('contact_email', 'contacto@agrovialsur.com')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Dirección</th>
                    <td><input type="text" name="contact_address" value="<?php echo esc_attr(get_option('contact_address', 'Río Negro, Argentina')); ?>" class="regular-text" /></td>
                </tr>
            </table>

            <h2 class="title">Otras Secciones (Textos Generales)</h2>
            <p>Se mantendrán los valores por defecto si se dejan en blanco.</p>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
