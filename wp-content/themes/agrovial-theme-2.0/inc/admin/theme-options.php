<?php
/**
 * Theme Options Pages (Múltiples Menús)
 */

function agrovial2_add_theme_page() {
    // Main menu element
    add_menu_page(
        'Opciones Agrovial',
        'Opciones Agrovial',
        'manage_options',
        'agrovial-options-hero',
        'agrovial2_options_hero_page',
        'dashicons-admin-generic',
        60
    );

    // Submenus
    add_submenu_page('agrovial-options-hero', 'Hero / Portada', 'Hero / Portada', 'manage_options', 'agrovial-options-hero', 'agrovial2_options_hero_page');
    add_submenu_page('agrovial-options-hero', 'Infraestructura', 'Infraestructura', 'manage_options', 'agrovial-options-infra', 'agrovial2_options_infra_page');
    add_submenu_page('agrovial-options-hero', 'Servicios', 'Servicios', 'manage_options', 'agrovial-options-servicios', 'agrovial2_options_servicios_page');
    add_submenu_page('agrovial-options-hero', 'Capacidad Operativa', 'Capacidad Operativa', 'manage_options', 'agrovial-options-capacidad', 'agrovial2_options_capacidad_page');
    add_submenu_page('agrovial-options-hero', 'Por Qué Elegirnos', 'Por Qué Elegirnos', 'manage_options', 'agrovial-options-whyus', 'agrovial2_options_whyus_page');
    add_submenu_page('agrovial-options-hero', 'Proyectos', 'Proyectos', 'manage_options', 'agrovial-options-proyectos', 'agrovial2_options_proyectos_page');
    add_submenu_page('agrovial-options-hero', 'Mapa y Ubicaciones', 'Mapa y Ubicaciones', 'manage_options', 'agrovial-options-mapa', 'agrovial2_options_mapa_page');
    add_submenu_page('agrovial-options-hero', 'Contacto', 'Contacto', 'manage_options', 'agrovial-options-contacto', 'agrovial2_options_contacto_page');
}
add_action('admin_menu', 'agrovial2_add_theme_page');

function agrovial2_register_settings() {
    // Hero Section
    $hero_opts = ['hero_image','hero_title','hero_badge','hero_description','hero_btn1_text','hero_btn1_url','hero_btn2_text','hero_btn2_url'];
    foreach($hero_opts as $opt) register_setting('agrovial_options_hero', $opt);
    for ($i=1; $i<=4; $i++) { register_setting('agrovial_options_hero', "hero_stat{$i}_val"); register_setting('agrovial_options_hero', "hero_stat{$i}_lbl"); }

    // Infraestructura
    for ($i=1; $i<=3; $i++) { 
        register_setting('agrovial_options_infra', "infra_{$i}_title"); 
        register_setting('agrovial_options_infra', "infra_{$i}_desc"); 
        register_setting('agrovial_options_infra', "infra_{$i}_image"); 
    }

    // Servicios
    register_setting('agrovial_options_servicios', 'services_badge');
    register_setting('agrovial_options_servicios', 'services_title');
    register_setting('agrovial_options_servicios', 'services_desc');

    // Capacidad Operativa
    for ($i=1; $i<=4; $i++) { register_setting('agrovial_options_capacidad', "capacity_{$i}_value"); register_setting('agrovial_options_capacidad', "capacity_{$i}_title"); register_setting('agrovial_options_capacidad', "capacity_{$i}_desc"); }

    // Por qué elegirnos
    for ($i=1; $i<=6; $i++) { register_setting('agrovial_options_whyus', "whyus_feat_{$i}_title"); register_setting('agrovial_options_whyus', "whyus_feat_{$i}_desc"); }
    for ($i=1; $i<=3; $i++) { register_setting('agrovial_options_whyus', "whyus_stat_{$i}_val"); register_setting('agrovial_options_whyus', "whyus_stat_{$i}_label"); }

    // Proyectos
    register_setting('agrovial_options_proyectos', 'projects_badge');
    register_setting('agrovial_options_proyectos', 'projects_title');
    register_setting('agrovial_options_proyectos', 'projects_desc');

    // Mapa
    register_setting('agrovial_options_mapa', 'map_embed_url');

    // Contacto
    register_setting('agrovial_options_contacto', 'contact_phone');
    register_setting('agrovial_options_contacto', 'contact_email');
    register_setting('agrovial_options_contacto', 'contact_address');
}
add_action('admin_init', 'agrovial2_register_settings');

function agrovial2_options_enqueue_scripts() { wp_enqueue_media(); }
add_action('admin_enqueue_scripts', 'agrovial2_options_enqueue_scripts');

/**
 * Partial Helper to render wrap and common styles
 */
function agrovial2_options_header($title) {
    ?>
    <style>
    .agrovial-options-wrap { max-width: 1000px; }
    .agrovial-options-wrap h2.title { background: #fff; padding: 15px; border-left: 4px solid #2271b1; box-shadow: 0 1px 1px rgba(0,0,0,0.04); margin-top: 30px; }
    .agrovial-options-wrap .form-table { background: #fff; padding: 20px; box-shadow: 0 1px 1px rgba(0,0,0,0.04); margin-top: 0; }
    .agrovial-options-wrap .form-table th { padding-left: 20px; }
    </style>
    <div class="wrap agrovial-options-wrap">
        <h1><?php echo esc_html($title); ?></h1>
    <?php
}

/**
 * HERO PAGE
 */
function agrovial2_options_hero_page() {
    agrovial2_options_header('Configuración: Hero (Portada)');
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_options_hero'); ?>
            <h2 class="title">Sección Hero</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Título Principal</th>
                    <td><input type="text" name="hero_title" value="<?php echo esc_attr(get_option('hero_title', 'INFRAESTRUCTURA PARA EL DESARROLLO PRIVADO EN RÍO NEGRO')); ?>" class="large-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Badge (Etiqueta superior)</th>
                    <td><input type="text" name="hero_badge" value="<?php echo esc_attr(get_option('hero_badge', '+25 años de experiencia en infraestructura vial')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Descripción</th>
                    <td><?php wp_editor(get_option('hero_description', 'Líderes en construcción y mantenimiento de infraestructura vial en la Patagonia. Proyectos públicos y privados con los más altos estándares de calidad.'), 'hero_description', array('textarea_name' => 'hero_description', 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 4)); ?></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Imagen de Fondo</th>
                    <td>
                        <?php $hero_image_url = get_option('hero_image', get_template_directory_uri() . '/assets/images/hero-construction.jpg'); ?>
                        <div style="margin-bottom: 15px;">
                            <img id="hero_image_preview" src="<?php echo esc_url($hero_image_url); ?>" style="max-width: 400px; height: auto; border: 1px solid #ddd; padding: 4px; border-radius: 4px; background: #fff; <?php echo empty($hero_image_url) ? 'display: none;' : ''; ?>" />
                        </div>
                        <input type="hidden" name="hero_image" id="hero_image" value="<?php echo esc_attr($hero_image_url); ?>" />
                        <button type="button" class="button button-secondary" id="hero_image_button">Seleccionar Imagen</button>
                        <button type="button" class="button button-link-delete" id="hero_image_remove" style="<?php echo empty($hero_image_url) ? 'display: none;' : ''; ?> color: #b32d2e; text-decoration: none;">Eliminar</button>
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row">Botón 1</th>
                    <td>Texto: <input type="text" name="hero_btn1_text" value="<?php echo esc_attr(get_option('hero_btn1_text', 'Nuestros Servicios')); ?>" class="regular-text" /><br><br>
                        Link: <input type="text" name="hero_btn1_url" value="<?php echo esc_attr(get_option('hero_btn1_url', '#servicios')); ?>" class="regular-text" /></td>
                </tr>
                 <tr valign="top">
                    <th scope="row">Botón 2</th>
                    <td>Texto: <input type="text" name="hero_btn2_text" value="<?php echo esc_attr(get_option('hero_btn2_text', 'Ver Proyectos')); ?>" class="regular-text" /><br><br>
                        Link: <input type="text" name="hero_btn2_url" value="<?php echo esc_attr(get_option('hero_btn2_url', '#proyectos')); ?>" class="regular-text" /></td>
                </tr>
                <?php for ($i = 1; $i <= 4; $i++) : ?>
                     <tr valign="top">
                        <th scope="row">Estadística <?php echo $i; ?></th>
                        <td>Valor: <input type="text" name="hero_stat<?php echo $i; ?>_val" value="<?php echo esc_attr(get_option("hero_stat{$i}_val")); ?>" class="small-text" style="margin-right:20px;" />
                            Etiqueta: <input type="text" name="hero_stat<?php echo $i; ?>_lbl" value="<?php echo esc_attr(get_option("hero_stat{$i}_lbl")); ?>" class="regular-text" /></td>
                    </tr>
                <?php endfor; ?>
            </table>
            <?php submit_button('Guardar Hero', 'primary', 'submit', true, array('style' => 'font-size: 16px; padding: 10px 30px; margin-top: 30px;')); ?>
        </form>
    </div>
    <script>
    jQuery(document).ready(function($){
        var mediaUploader;
        $('#hero_image_button').click(function(e) {
            e.preventDefault();
            if (mediaUploader) { mediaUploader.open(); return; }
            mediaUploader = wp.media.frames.file_frame = wp.media({ title: 'Seleccionar Imagen de Fondo', button: { text: 'Usar esta imagen' }, multiple: false });
            mediaUploader.on('select', function() { 
                var attachment = mediaUploader.state().get('selection').first().toJSON(); 
                $('#hero_image').val(attachment.url); 
                $('#hero_image_preview').attr('src', attachment.url).show();
                $('#hero_image_remove').show();
            });
            mediaUploader.open();
        });
        
        $('#hero_image_remove').click(function(e) {
            e.preventDefault();
            $('#hero_image').val('');
            $('#hero_image_preview').attr('src', '').hide();
            $(this).hide();
        });
    });
    </script>
    <?php
}

/**
 * INFRAESTRUCTURA PAGE
 */
function agrovial2_options_infra_page() {
    agrovial2_options_header('Configuración: Infraestructura');
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_options_infra'); ?>
            <h2 class="title">Infraestructura</h2>
            <table class="form-table">
                <?php for ($i = 1; $i <= 3; $i++) : ?>
                     <tr valign="top">
                        <th scope="row">Tarjeta <?php echo $i; ?></th>
                        <td>
                            <?php $infra_img = get_option("infra_{$i}_image"); ?>
                            <div style="margin-bottom: 10px;">
                                <img id="infra_<?php echo $i; ?>_preview" src="<?php echo esc_url($infra_img); ?>" style="max-width: 100px; height: auto; border: 1px solid #ddd; padding: 4px; border-radius: 4px; background: #fff; <?php echo empty($infra_img) ? 'display: none;' : ''; ?>" />
                            </div>
                            <div style="margin-bottom: 15px;">
                                <input type="hidden" name="infra_<?php echo $i; ?>_image" id="infra_<?php echo $i; ?>_image" value="<?php echo esc_attr($infra_img); ?>" />
                                <button type="button" class="button button-secondary infra-img-btn" data-target="infra_<?php echo $i; ?>">Seleccionar Imagen/Icono</button>
                                <button type="button" class="button button-link-delete infra-img-remove" data-target="infra_<?php echo $i; ?>" style="<?php echo empty($infra_img) ? 'display: none;' : ''; ?> color: #b32d2e; text-decoration: none;">Eliminar</button>
                            </div>
                            Título:<br><input type="text" name="infra_<?php echo $i; ?>_title" value="<?php echo esc_attr(get_option("infra_{$i}_title", ($i==1?'Industria':($i==2?'Minería':'Desarrollo Urbano')))); ?>" class="regular-text" /><br><br>
                            Descripción:<br><?php wp_editor(get_option("infra_{$i}_desc"), "infra_desc_{$i}", array('textarea_name' => "infra_{$i}_desc", 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 4)); ?>
                        </td>
                    </tr>
                <?php endfor; ?>
            </table>
            <?php submit_button('Guardar Infraestructura'); ?>
        </form>
    </div>
    <script>
    jQuery(document).ready(function($){
        var mediaUploader;
        $('.infra-img-btn').click(function(e) {
            e.preventDefault();
            var targetId = $(this).data('target');
            if (mediaUploader) { mediaUploader.off('select'); }
            else { mediaUploader = wp.media.frames.file_frame = wp.media({ title: 'Seleccionar Imagen/Icono', button: { text: 'Usar imagen' }, multiple: false }); }
            mediaUploader.on('select', function() { 
                var attachment = mediaUploader.state().get('selection').first().toJSON(); 
                $('#' + targetId + '_image').val(attachment.url); 
                $('#' + targetId + '_preview').attr('src', attachment.url).show();
                $('.infra-img-remove[data-target="'+targetId+'"]').show();
            });
            mediaUploader.open();
        });
        $('.infra-img-remove').click(function(e) {
            e.preventDefault();
            var targetId = $(this).data('target');
            $('#' + targetId + '_image').val('');
            $('#' + targetId + '_preview').attr('src', '').hide();
            $(this).hide();
        });
    });
    </script>
    <?php
}

/**
 * SERVICIOS PAGE
 */
function agrovial2_options_servicios_page() {
    agrovial2_options_header('Configuración: Servicios Destacados');
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_options_servicios'); ?>
            <h2 class="title">Servicios Destacados</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Badge</th>
                    <td><input type="text" name="services_badge" value="<?php echo esc_attr(get_option('services_badge', 'Nuestros Servicios')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Título</th>
                    <td><input type="text" name="services_title" value="<?php echo esc_attr(get_option('services_title', 'SERVICIOS DESTACADOS')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Descripción</th>
                    <td><?php wp_editor(get_option('services_desc', 'Movimiento de suelo, hormigón elaborado...'), 'services_desc', array('textarea_name' => 'services_desc', 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 4)); ?></td>
                </tr>
            </table>
            <?php submit_button('Guardar Servicios'); ?>
        </form>
    </div>
    <?php
}

/**
 * CAPACIDAD OPERATIVA PAGE
 */
function agrovial2_options_capacidad_page() {
    agrovial2_options_header('Configuración: Capacidad Operativa');
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_options_capacidad'); ?>
            <h2 class="title">Capacidad Operativa</h2>
            <table class="form-table">
                <?php for ($i = 1; $i <= 4; $i++) : 
                    $def_val = $i==1?'+70':($i==2?'100%':($i==3?'24/7':'150+'));
                    $def_tit = $i==1?'Rodados':($i==2?'Maquinaria Propia':($i==3?'Taller':'Equipo Técnico'));
                ?>
                     <tr valign="top">
                        <th scope="row">Tarjeta <?php echo $i; ?></th>
                        <td>Valor grande:<br><input type="text" name="capacity_<?php echo $i; ?>_value" value="<?php echo esc_attr(get_option("capacity_{$i}_value", $def_val)); ?>" class="regular-text" /><br><br>
                            Título:<br><input type="text" name="capacity_<?php echo $i; ?>_title" value="<?php echo esc_attr(get_option("capacity_{$i}_title", $def_tit)); ?>" class="regular-text" /><br><br>
                            Descripción:<br><?php wp_editor(get_option("capacity_{$i}_desc"), "capacity_desc_{$i}", array('textarea_name' => "capacity_{$i}_desc", 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 4)); ?></td>
                    </tr>
                <?php endfor; ?>
            </table>
            <?php submit_button('Guardar Capacidad'); ?>
        </form>
    </div>
    <?php
}

/**
 * POR QUÉ ELEGIRNOS PAGE
 */
function agrovial2_options_whyus_page() {
    agrovial2_options_header('Configuración: Por qué Elegirnos');
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_options_whyus'); ?>
            <h2 class="title">Estadísticas Principales</h2>
            <table class="form-table">
                <?php for ($i = 1; $i <= 3; $i++) : ?>
                     <tr valign="top">
                        <th scope="row">Métrica <?php echo $i; ?></th>
                        <td>Valor: <input type="text" name="whyus_stat_<?php echo $i; ?>_val" value="<?php echo esc_attr(get_option("whyus_stat_{$i}_val")); ?>" class="small-text" style="margin-right:20px;" />
                            Etiqueta: <input type="text" name="whyus_stat_<?php echo $i; ?>_label" value="<?php echo esc_attr(get_option("whyus_stat_{$i}_label")); ?>" class="regular-text" /></td>
                    </tr>
                <?php endfor; ?>
            </table>
            
            <h2 class="title">Tarjetas de Características</h2>
            <table class="form-table">
                <?php for ($i = 1; $i <= 6; $i++) : ?>
                     <tr valign="top">
                        <th scope="row">Feature <?php echo $i; ?></th>
                        <td>Título:<br><input type="text" name="whyus_feat_<?php echo $i; ?>_title" value="<?php echo esc_attr(get_option("whyus_feat_{$i}_title")); ?>" class="regular-text" /><br><br>
                            Descripción:<br><?php wp_editor(get_option("whyus_feat_{$i}_desc"), "whyus_feat_desc_{$i}", array('textarea_name' => "whyus_feat_{$i}_desc", 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 4)); ?></td>
                    </tr>
                <?php endfor; ?>
            </table>
            <?php submit_button('Guardar Por qué Elegirnos'); ?>
        </form>
    </div>
    <?php
}

/**
 * PROYECTOS PAGE
 */
function agrovial2_options_proyectos_page() {
    agrovial2_options_header('Configuración: Proyectos Destacados');
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_options_proyectos'); ?>
            <h2 class="title">Proyectos Destacados</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Badge</th>
                    <td><input type="text" name="projects_badge" value="<?php echo esc_attr(get_option('projects_badge', 'Portafolio')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Título</th>
                    <td><input type="text" name="projects_title" value="<?php echo esc_attr(get_option('projects_title', 'PROYECTOS COMPLETADOS')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Descripción</th>
                    <td><?php wp_editor(get_option('projects_desc', 'Más de 500 proyectos exitosos en todo el país. Explore nuestra trayectoria en obras públicas y privadas.'), 'projects_desc', array('textarea_name' => 'projects_desc', 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 4)); ?></td>
                </tr>
            </table>
            <?php submit_button('Guardar Proyectos'); ?>
        </form>
    </div>
    <?php
}

/**
 * MAPA PAGE
 */
function agrovial2_options_mapa_page() {
    agrovial2_options_header('Configuración: Mapa');
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_options_mapa'); ?>
            <h2 class="title">Mapa y Ubicaciones</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">URL de Google Maps (Iframe SRC)</th>
                    <td>
                        <input type="text" name="map_embed_url" value="<?php echo esc_attr(get_option('map_embed_url', 'https://maps.google.com/maps?q=-41.1335,-71.3103&z=7&output=embed')); ?>" class="large-text" />
                        <p class="description">Esta URL se usará sólo si no hay ubicaciones registradas en el Custom Post Type de Ubicaciones.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button('Guardar Mapa'); ?>
        </form>
    </div>
    <?php
}

/**
 * CONTACTO PAGE
 */
function agrovial2_options_contacto_page() {
    agrovial2_options_header('Configuración: Contacto');
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_options_contacto'); ?>
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
            <?php submit_button('Guardar Contacto'); ?>
        </form>
    </div>
    <?php
}
