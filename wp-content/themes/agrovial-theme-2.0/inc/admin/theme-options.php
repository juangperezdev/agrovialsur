<?php
/**
 * Theme Options — Organizado por Página
 * 
 * Estructura del menú:
 *   Opciones Agrovial
 *   ├── 🏠 Home (Hero)
 *   ├── 🏢 La Empresa
 *   ├── 🔧 Servicios
 *   ├── 📐 Proyectos
 *   ├── ── Infraestructura (compartida Home + Empresa)
 *   ├── ── Por qué Elegirnos (compartida Home)
 *   ├── ── Capacidad Operativa (compartida Home)
 *   ├── 📍 Mapa y Ubicaciones
 *   └── 📞 Contacto
 */

// ═══════════════════════════════════════════════
// REGISTER ADMIN MENUS
// ═══════════════════════════════════════════════
function agrovial2_add_theme_page() {
    // Main menu
    add_menu_page(
        'Opciones Agrovial',
        'Opciones Agrovial',
        'manage_options',
        'agrovial-options-home',
        'agrovial2_page_home',
        'dashicons-admin-generic',
        60
    );

    // ── Submenus organizados por página ──
    add_submenu_page('agrovial-options-home', '🏠 Home (Hero)',       '🏠 Home (Hero)',       'manage_options', 'agrovial-options-home',       'agrovial2_page_home');
    add_submenu_page('agrovial-options-home', '🏢 La Empresa',        '🏢 La Empresa',        'manage_options', 'agrovial-options-empresa',    'agrovial2_page_empresa');
    add_submenu_page('agrovial-options-home', '🔧 Servicios',         '🔧 Servicios',         'manage_options', 'agrovial-options-servicios',  'agrovial2_page_servicios');
    add_submenu_page('agrovial-options-home', '📐 Proyectos',         '📐 Proyectos',         'manage_options', 'agrovial-options-proyectos',  'agrovial2_page_proyectos');
    add_submenu_page('agrovial-options-home', '── Infraestructura',    '── Infraestructura',    'manage_options', 'agrovial-options-infra',      'agrovial2_page_infra');
    add_submenu_page('agrovial-options-home', '── Por qué Elegirnos', '── Por qué Elegirnos', 'manage_options', 'agrovial-options-whyus',      'agrovial2_page_whyus');
    add_submenu_page('agrovial-options-home', '── Capacidad (Home)',   '── Capacidad (Home)',   'manage_options', 'agrovial-options-capacidad',  'agrovial2_page_capacidad');
    add_submenu_page('agrovial-options-home', '📍 Mapa y Ubicaciones','📍 Mapa y Ubicaciones','manage_options', 'agrovial-options-mapa',       'agrovial2_page_mapa');
    add_submenu_page('agrovial-options-home', '📞 Contacto',          '📞 Contacto',          'manage_options', 'agrovial-options-contacto',   'agrovial2_page_contacto');
}
add_action('admin_menu', 'agrovial2_add_theme_page');

// ═══════════════════════════════════════════════
// REGISTER ALL SETTINGS
// ═══════════════════════════════════════════════
function agrovial2_register_settings() {

    // ─── HOME (Hero) ───
    $hero_opts = ['hero_image','hero_title','hero_badge','hero_description','hero_btn1_text','hero_btn1_url','hero_btn2_text','hero_btn2_url'];
    foreach ($hero_opts as $opt) register_setting('agrovial_group_home', $opt);
    for ($i = 1; $i <= 4; $i++) {
        register_setting('agrovial_group_home', "hero_stat{$i}_val");
        register_setting('agrovial_group_home', "hero_stat{$i}_lbl");
    }

    // ─── LA EMPRESA ───
    $empresa_opts = ['empresa_hero_image','empresa_title','empresa_text','empresa_text_2','empresa_about_image'];
    foreach ($empresa_opts as $opt) register_setting('agrovial_group_empresa', $opt);
    // Stats rápidos
    for ($i = 1; $i <= 3; $i++) {
        register_setting('agrovial_group_empresa', "empresa_stat_{$i}_val");
        register_setting('agrovial_group_empresa', "empresa_stat_{$i}_label");
    }
    // Capacidad operativa detallada (Empresa)
    for ($i = 1; $i <= 4; $i++) {
        register_setting('agrovial_group_empresa', "empresa_cap_{$i}_value");
        register_setting('agrovial_group_empresa', "empresa_cap_{$i}_title");
        register_setting('agrovial_group_empresa', "empresa_cap_{$i}_desc");
    }
    // Equipo técnico
    for ($i = 1; $i <= 6; $i++) {
        register_setting('agrovial_group_empresa', "empresa_team_{$i}_title");
        register_setting('agrovial_group_empresa', "empresa_team_{$i}_desc");
    }

    // ─── SERVICIOS ───
    register_setting('agrovial_group_servicios', 'servicios_hero_image');
    // Header de sección (home)
    register_setting('agrovial_group_servicios', 'services_badge');
    register_setting('agrovial_group_servicios', 'services_title');
    register_setting('agrovial_group_servicios', 'services_desc');
    // 6 servicios detallados
    for ($i = 1; $i <= 6; $i++) {
        register_setting('agrovial_group_servicios', "srv_{$i}_title");
        register_setting('agrovial_group_servicios', "srv_{$i}_desc");
    }
    // Sub-items de Movimiento de Suelo
    for ($s = 1; $s <= 3; $s++) register_setting('agrovial_group_servicios', "srv_1_sub_{$s}");
    // Sub-items de Infraestructura Sanitaria
    for ($s = 1; $s <= 2; $s++) register_setting('agrovial_group_servicios', "srv_4_sub_{$s}");

    // ─── PROYECTOS ───
    register_setting('agrovial_group_proyectos', 'proyectos_hero_image');
    register_setting('agrovial_group_proyectos', 'projects_badge');
    register_setting('agrovial_group_proyectos', 'projects_title');
    register_setting('agrovial_group_proyectos', 'projects_desc');

    // ─── INFRAESTRUCTURA (sección compartida) ───
    for ($i = 1; $i <= 3; $i++) {
        register_setting('agrovial_group_infra', "infra_{$i}_title");
        register_setting('agrovial_group_infra', "infra_{$i}_desc");
        register_setting('agrovial_group_infra', "infra_{$i}_image");
    }

    // ─── POR QUÉ ELEGIRNOS (sección compartida) ───
    for ($i = 1; $i <= 6; $i++) {
        register_setting('agrovial_group_whyus', "whyus_feat_{$i}_title");
        register_setting('agrovial_group_whyus', "whyus_feat_{$i}_desc");
    }
    for ($i = 1; $i <= 3; $i++) {
        register_setting('agrovial_group_whyus', "whyus_stat_{$i}_val");
        register_setting('agrovial_group_whyus', "whyus_stat_{$i}_label");
    }

    // ─── CAPACIDAD OPERATIVA (sección Home) ───
    for ($i = 1; $i <= 4; $i++) {
        register_setting('agrovial_group_capacidad', "capacity_{$i}_value");
        register_setting('agrovial_group_capacidad', "capacity_{$i}_title");
        register_setting('agrovial_group_capacidad', "capacity_{$i}_desc");
    }

    // ─── MAPA ───
    register_setting('agrovial_group_mapa', 'map_embed_url');

    // ─── CONTACTO ───
    register_setting('agrovial_group_contacto', 'contact_phone');
    register_setting('agrovial_group_contacto', 'contact_email');
    register_setting('agrovial_group_contacto', 'contact_address');
}
add_action('admin_init', 'agrovial2_register_settings');

// ═══════════════════════════════════════════════
// ENQUEUE MEDIA UPLOADER
// ═══════════════════════════════════════════════
function agrovial2_options_enqueue_scripts() { wp_enqueue_media(); }
add_action('admin_enqueue_scripts', 'agrovial2_options_enqueue_scripts');

// ═══════════════════════════════════════════════
// HELPERS
// ═══════════════════════════════════════════════
function agrovial2_options_header($title, $subtitle = '') {
    ?>
    <style>
    .agrovial-options-wrap { max-width: 1000px; }
    .agrovial-options-wrap h2.title { background: #fff; padding: 15px; border-left: 4px solid #2271b1; box-shadow: 0 1px 1px rgba(0,0,0,0.04); margin-top: 30px; }
    .agrovial-options-wrap .form-table { background: #fff; padding: 20px; box-shadow: 0 1px 1px rgba(0,0,0,0.04); margin-top: 0; }
    .agrovial-options-wrap .form-table th { padding-left: 20px; }
    .agrovial-page-info { background: #f0f6fc; border-left: 4px solid #72aee6; padding: 12px 16px; margin: 15px 0 25px; font-size: 13px; color: #1d2327; }
    .agrovial-page-info strong { color: #135e96; }
    </style>
    <div class="wrap agrovial-options-wrap">
        <h1><?php echo esc_html($title); ?></h1>
        <?php if ($subtitle) : ?>
            <div class="agrovial-page-info"><?php echo wp_kses_post($subtitle); ?></div>
        <?php endif; ?>
    <?php
}

/**
 * Helper: Render image upload field
 */
function agrovial2_image_field($field_id, $label = 'Seleccionar Imagen', $preview_width = '400px') {
    $url = get_option($field_id, '');
    ?>
    <div style="margin-bottom: 15px;">
        <img id="<?php echo $field_id; ?>_preview" src="<?php echo esc_url($url); ?>" style="max-width: <?php echo $preview_width; ?>; height: auto; border: 1px solid #ddd; padding: 4px; border-radius: 4px; background: #fff; <?php echo empty($url) ? 'display: none;' : ''; ?>" />
    </div>
    <input type="hidden" name="<?php echo $field_id; ?>" id="<?php echo $field_id; ?>" value="<?php echo esc_attr($url); ?>" />
    <button type="button" class="button button-secondary agrovial-img-btn" data-target="<?php echo $field_id; ?>"><?php echo esc_html($label); ?></button>
    <button type="button" class="button button-link-delete agrovial-img-remove" data-target="<?php echo $field_id; ?>" style="<?php echo empty($url) ? 'display: none;' : ''; ?> color: #b32d2e; text-decoration: none;">Eliminar</button>
    <?php
}

/**
 * Helper: Shared image upload script (add once per page)
 */
function agrovial2_image_upload_script() {
    ?>
    <script>
    jQuery(document).ready(function($){
        var mediaUploader;
        $(document).on('click', '.agrovial-img-btn', function(e) {
            e.preventDefault();
            var targetId = $(this).data('target');
            mediaUploader = wp.media({ title: 'Seleccionar Imagen', button: { text: 'Usar esta imagen' }, multiple: false });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#' + targetId).val(attachment.url);
                $('#' + targetId + '_preview').attr('src', attachment.url).show();
                $('.agrovial-img-remove[data-target="'+targetId+'"]').show();
            });
            mediaUploader.open();
        });
        $(document).on('click', '.agrovial-img-remove', function(e) {
            e.preventDefault();
            var targetId = $(this).data('target');
            $('#' + targetId).val('');
            $('#' + targetId + '_preview').attr('src', '').hide();
            $(this).hide();
        });
    });
    </script>
    <?php
}


// ═══════════════════════════════════════════════════════════
//
//  🏠  PÁGINA: HOME (Hero / Portada)
//
// ═══════════════════════════════════════════════════════════
function agrovial2_page_home() {
    agrovial2_options_header(
        '🏠 Home — Hero / Portada',
        'Configuración del hero principal que se muestra en la <strong>página de inicio</strong>. Incluye título, descripción, imagen de fondo, botones y estadísticas.'
    );
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_group_home'); ?>

            <h2 class="title">Contenido Principal</h2>
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
                    <td><?php wp_editor(get_option('hero_description', 'Líderes en construcción y mantenimiento de infraestructura vial en la Patagonia.'), 'hero_description', ['textarea_name' => 'hero_description', 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 4]); ?></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Imagen de Fondo</th>
                    <td><?php agrovial2_image_field('hero_image'); ?></td>
                </tr>
            </table>

            <h2 class="title">Botones CTA</h2>
            <table class="form-table">
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
            </table>

            <h2 class="title">Estadísticas del Hero</h2>
            <table class="form-table">
                <?php for ($i = 1; $i <= 4; $i++) : ?>
                <tr valign="top">
                    <th scope="row">Estadística <?php echo $i; ?></th>
                    <td>Valor: <input type="text" name="hero_stat<?php echo $i; ?>_val" value="<?php echo esc_attr(get_option("hero_stat{$i}_val")); ?>" class="small-text" style="margin-right:20px;" />
                        Etiqueta: <input type="text" name="hero_stat<?php echo $i; ?>_lbl" value="<?php echo esc_attr(get_option("hero_stat{$i}_lbl")); ?>" class="regular-text" /></td>
                </tr>
                <?php endfor; ?>
            </table>

            <?php submit_button('Guardar Home', 'primary', 'submit', true, ['style' => 'font-size: 16px; padding: 10px 30px; margin-top: 30px;']); ?>
        </form>
    </div>
    <?php agrovial2_image_upload_script(); ?>
    <?php
}


// ═══════════════════════════════════════════════════════════
//
//  🏢  PÁGINA: LA EMPRESA
//
// ═══════════════════════════════════════════════════════════
function agrovial2_page_empresa() {
    agrovial2_options_header(
        '🏢 La Empresa',
        'Configuración completa de la página <strong>La Empresa</strong>: Quiénes somos, capacidad operativa detallada (Flota, Maquinaria, Taller, Estándares) y equipo técnico.'
    );
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_group_empresa'); ?>

            <!-- ── HERO ── -->
            <h2 class="title">Hero de la Página</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Imagen de Fondo</th>
                    <td><?php agrovial2_image_field('empresa_hero_image'); ?></td>
                </tr>
            </table>

            <!-- ── QUIÉNES SOMOS ── -->
            <h2 class="title">Quiénes Somos</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Título</th>
                    <td><input type="text" name="empresa_title" value="<?php echo esc_attr(get_option('empresa_title', 'QUIÉNES SOMOS')); ?>" class="large-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Texto Principal</th>
                    <td><textarea name="empresa_text" rows="5" class="large-text"><?php echo esc_textarea(get_option('empresa_text', 'Somos una empresa constructora radicada en Río Negro...')); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Texto Secundario</th>
                    <td><textarea name="empresa_text_2" rows="5" class="large-text"><?php echo esc_textarea(get_option('empresa_text_2', 'Nuestra experiencia abarca movimiento de suelo...')); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Imagen de Sección</th>
                    <td><?php agrovial2_image_field('empresa_about_image', 'Seleccionar Imagen', '300px'); ?></td>
                </tr>
            </table>

            <!-- ── STATS RÁPIDOS ── -->
            <h2 class="title">Estadísticas Rápidas (Quiénes Somos)</h2>
            <table class="form-table">
                <?php for ($i = 1; $i <= 3; $i++) : ?>
                <tr valign="top">
                    <th scope="row">Métrica <?php echo $i; ?></th>
                    <td>Valor: <input type="text" name="empresa_stat_<?php echo $i; ?>_val" value="<?php echo esc_attr(get_option("empresa_stat_{$i}_val")); ?>" class="small-text" style="margin-right:20px;" />
                        Etiqueta: <input type="text" name="empresa_stat_<?php echo $i; ?>_label" value="<?php echo esc_attr(get_option("empresa_stat_{$i}_label")); ?>" class="regular-text" /></td>
                </tr>
                <?php endfor; ?>
            </table>

            <!-- ── CAPACIDAD OPERATIVA DETALLADA ── -->
            <h2 class="title">Capacidad Operativa (Detallada)</h2>
            <p class="description" style="padding: 0 15px; color: #646970;">Flota (+70 rodados) · Maquinaria propia · Taller de mantenimiento · Procesos y estándares</p>
            <table class="form-table">
                <?php
                $cap_defaults = [
                    1 => ['+70', 'Rodados', 'Flota de más de 70 vehículos y equipos pesados...'],
                    2 => ['100%', 'Maquinaria Propia', 'Equipos de última generación de propiedad total...'],
                    3 => ['Propio', 'Taller de Mantenimiento', 'Taller mecánico integral...'],
                    4 => ['Certificados', 'Procesos y Estándares', 'Procedimientos estandarizados...'],
                ];
                for ($i = 1; $i <= 4; $i++) : ?>
                <tr valign="top">
                    <th scope="row">Tarjeta <?php echo $i; ?></th>
                    <td>
                        Valor grande:<br><input type="text" name="empresa_cap_<?php echo $i; ?>_value" value="<?php echo esc_attr(get_option("empresa_cap_{$i}_value", $cap_defaults[$i][0])); ?>" class="regular-text" /><br><br>
                        Título:<br><input type="text" name="empresa_cap_<?php echo $i; ?>_title" value="<?php echo esc_attr(get_option("empresa_cap_{$i}_title", $cap_defaults[$i][1])); ?>" class="regular-text" /><br><br>
                        Descripción:<br><?php wp_editor(get_option("empresa_cap_{$i}_desc", $cap_defaults[$i][2]), "empresa_cap_desc_{$i}", ['textarea_name' => "empresa_cap_{$i}_desc", 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 3]); ?>
                    </td>
                </tr>
                <?php endfor; ?>
            </table>

            <!-- ── EQUIPO TÉCNICO ── -->
            <h2 class="title">Equipo Técnico</h2>
            <p class="description" style="padding: 0 15px; color: #646970;">6 roles del equipo que se muestran como tarjetas en la sección de Equipo Técnico.</p>
            <table class="form-table">
                <?php
                $team_defaults = [
                    1 => ['Ingenieros Civiles', 'Profesionales con experiencia en dirección y supervisión de obras...'],
                    2 => ['Técnicos en Seguridad e Higiene', 'Responsables de garantizar condiciones seguras...'],
                    3 => ['Topógrafos y Geodestas', 'Equipo de relevamiento y control de calidad geométrica...'],
                    4 => ['Operadores y Maquinistas', 'Personal calificado para la operación de maquinaria pesada...'],
                    5 => ['Administración y Logística', 'Gestión administrativa, compras y coordinación logística...'],
                    6 => ['Capataces y Jefes de Obra', 'Líderes de campo con experiencia comprobada...'],
                ];
                for ($i = 1; $i <= 6; $i++) : ?>
                <tr valign="top">
                    <th scope="row">Rol <?php echo $i; ?></th>
                    <td>
                        Título:<br><input type="text" name="empresa_team_<?php echo $i; ?>_title" value="<?php echo esc_attr(get_option("empresa_team_{$i}_title", $team_defaults[$i][0])); ?>" class="regular-text" /><br><br>
                        Descripción:<br><?php wp_editor(get_option("empresa_team_{$i}_desc", $team_defaults[$i][1]), "empresa_team_desc_{$i}", ['textarea_name' => "empresa_team_{$i}_desc", 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 3]); ?>
                    </td>
                </tr>
                <?php endfor; ?>
            </table>

            <?php submit_button('Guardar La Empresa', 'primary', 'submit', true, ['style' => 'font-size: 16px; padding: 10px 30px; margin-top: 30px;']); ?>
        </form>
    </div>
    <?php agrovial2_image_upload_script(); ?>
    <?php
}


// ═══════════════════════════════════════════════════════════
//
//  🔧  PÁGINA: SERVICIOS
//
// ═══════════════════════════════════════════════════════════
function agrovial2_page_servicios() {
    agrovial2_options_header(
        '🔧 Servicios',
        'Configuración de la página <strong>Servicios</strong>. Incluye el encabezado de la sección en Home y los 6 servicios detallados con sus sub-ítems para la página dedicada.'
    );
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_group_servicios'); ?>

            <!-- ── HERO ── -->
            <h2 class="title">Hero de la Página Servicios</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Imagen de Fondo</th>
                    <td><?php agrovial2_image_field('servicios_hero_image'); ?></td>
                </tr>
            </table>

            <!-- ── HEADER SECCIÓN HOME ── -->
            <h2 class="title">Encabezado de la Sección (Home)</h2>
            <p class="description" style="padding: 0 15px; color: #646970;">Estos textos se muestran en la sección "Servicios Destacados" de la página de inicio.</p>
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
                    <td><?php wp_editor(get_option('services_desc', 'Movimiento de suelo, hormigón elaborado...'), 'services_desc', ['textarea_name' => 'services_desc', 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 3]); ?></td>
                </tr>
            </table>

            <!-- ── 6 SERVICIOS DETALLADOS ── -->
            <?php
            $srv_defaults = [
                1 => ['Movimiento de Suelo', 'Ejecución integral de trabajos de movimiento de suelo...', ['Enripiado','Pavimento','Adoquinado']],
                2 => ['Hormigón Elaborado y Premoldeados', 'Producción y provisión de hormigón elaborado con planta propia...', []],
                3 => ['Obras de Gas', 'Construcción de redes de distribución y gasoductos...', []],
                4 => ['Infraestructura Sanitaria', 'Ejecución de redes de agua potable y cloacas...', ['Agua potable','Cloacas']],
                5 => ['Obras Civiles', 'Construcción integral de obras civiles...', []],
                6 => ['Obras Eléctricas', 'Servicio complementario de tendido eléctrico...', []],
            ];
            for ($i = 1; $i <= 6; $i++) :
                $complementary = ($i === 6) ? ' (Complementario)' : '';
            ?>
            <h2 class="title">Servicio <?php echo $i; ?>: <?php echo esc_html($srv_defaults[$i][0] . $complementary); ?></h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Título</th>
                    <td><input type="text" name="srv_<?php echo $i; ?>_title" value="<?php echo esc_attr(get_option("srv_{$i}_title", $srv_defaults[$i][0])); ?>" class="large-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Descripción</th>
                    <td><?php wp_editor(get_option("srv_{$i}_desc", $srv_defaults[$i][1]), "srv_{$i}_desc", ['textarea_name' => "srv_{$i}_desc", 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 4]); ?></td>
                </tr>
                <?php if ($i === 1) : // Sub-items: Movimiento de suelo ?>
                    <tr valign="top">
                        <th scope="row">Sub-ítems</th>
                        <td>
                            <?php for ($s = 1; $s <= 3; $s++) : ?>
                                <?php echo $s; ?>. <input type="text" name="srv_1_sub_<?php echo $s; ?>" value="<?php echo esc_attr(get_option("srv_1_sub_{$s}", $srv_defaults[1][2][$s-1])); ?>" class="regular-text" style="margin-bottom: 8px;" /><br>
                            <?php endfor; ?>
                        </td>
                    </tr>
                <?php elseif ($i === 4) : // Sub-items: Infraestructura Sanitaria ?>
                    <tr valign="top">
                        <th scope="row">Sub-ítems</th>
                        <td>
                            <?php for ($s = 1; $s <= 2; $s++) : ?>
                                <?php echo $s; ?>. <input type="text" name="srv_4_sub_<?php echo $s; ?>" value="<?php echo esc_attr(get_option("srv_4_sub_{$s}", $srv_defaults[4][2][$s-1])); ?>" class="regular-text" style="margin-bottom: 8px;" /><br>
                            <?php endfor; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </table>
            <?php endfor; ?>

            <?php submit_button('Guardar Servicios', 'primary', 'submit', true, ['style' => 'font-size: 16px; padding: 10px 30px; margin-top: 30px;']); ?>
        </form>
    </div>
    <?php agrovial2_image_upload_script(); ?>
    <?php
}


// ═══════════════════════════════════════════════════════════
//
//  📐  PÁGINA: PROYECTOS
//
// ═══════════════════════════════════════════════════════════
function agrovial2_page_proyectos() {
    agrovial2_options_header(
        '📐 Proyectos',
        'Configuración de la página <strong>Proyectos</strong>. Los proyectos individuales se gestionan desde el <strong>Custom Post Type "Proyectos"</strong> en el menú lateral. Aquí se configuran los textos del encabezado y el hero.'
    );
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_group_proyectos'); ?>

            <h2 class="title">Hero de la Página</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Imagen de Fondo</th>
                    <td><?php agrovial2_image_field('proyectos_hero_image'); ?></td>
                </tr>
            </table>

            <h2 class="title">Encabezado de la Sección</h2>
            <p class="description" style="padding: 0 15px; color: #646970;">Estos textos se usan tanto en la sección de proyectos del Home como en la página dedicada.</p>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Badge</th>
                    <td><input type="text" name="projects_badge" value="<?php echo esc_attr(get_option('projects_badge', 'Portafolio')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Título</th>
                    <td><input type="text" name="projects_title" value="<?php echo esc_attr(get_option('projects_title', 'PROYECTOS DESTACADOS')); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Descripción</th>
                    <td><?php wp_editor(get_option('projects_desc', 'Conozca nuestras principales obras de infraestructura en la región.'), 'projects_desc', ['textarea_name' => 'projects_desc', 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 4]); ?></td>
                </tr>
            </table>

            <?php submit_button('Guardar Proyectos', 'primary', 'submit', true, ['style' => 'font-size: 16px; padding: 10px 30px; margin-top: 30px;']); ?>
        </form>
    </div>
    <?php agrovial2_image_upload_script(); ?>
    <?php
}


// ═══════════════════════════════════════════════════════════
//
//  ── SECCIÓN COMPARTIDA: INFRAESTRUCTURA
//     (Usada en Home + La Empresa)
//
// ═══════════════════════════════════════════════════════════
function agrovial2_page_infra() {
    agrovial2_options_header(
        '── Infraestructura',
        'Sección compartida entre <strong>Home</strong> y <strong>La Empresa</strong>. Tres columnas: Industria, Minería, Desarrollo Urbano.'
    );
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_group_infra'); ?>
            <h2 class="title">Tarjetas de Infraestructura</h2>
            <table class="form-table">
                <?php for ($i = 1; $i <= 3; $i++) : ?>
                <tr valign="top">
                    <th scope="row">Tarjeta <?php echo $i; ?></th>
                    <td>
                        <?php
                        $infra_img = get_option("infra_{$i}_image");
                        ?>
                        <div style="margin-bottom: 10px;">
                            <img id="infra_<?php echo $i; ?>_image_preview" src="<?php echo esc_url($infra_img); ?>" style="width: 100px; height: 100px; object-fit: cover; border: 1px solid #ddd; padding: 4px; border-radius: 4px; background: #fff; <?php echo empty($infra_img) ? 'display: none;' : ''; ?>" />
                        </div>
                        <div style="margin-bottom: 15px;">
                            <input type="hidden" name="infra_<?php echo $i; ?>_image" id="infra_<?php echo $i; ?>_image" value="<?php echo esc_attr($infra_img); ?>" />
                            <button type="button" class="button button-secondary agrovial-img-btn" data-target="infra_<?php echo $i; ?>_image">Seleccionar Imagen</button>
                            <button type="button" class="button button-link-delete agrovial-img-remove" data-target="infra_<?php echo $i; ?>_image" style="<?php echo empty($infra_img) ? 'display: none;' : ''; ?> color: #b32d2e; text-decoration: none;">Eliminar</button>
                        </div>
                        Título:<br><input type="text" name="infra_<?php echo $i; ?>_title" value="<?php echo esc_attr(get_option("infra_{$i}_title", ($i==1?'Industria':($i==2?'Minería':'Desarrollo Urbano')))); ?>" class="regular-text" /><br><br>
                        Descripción:<br><?php wp_editor(get_option("infra_{$i}_desc"), "infra_desc_{$i}", ['textarea_name' => "infra_{$i}_desc", 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 4]); ?>
                    </td>
                </tr>
                <?php endfor; ?>
            </table>
            <?php submit_button('Guardar Infraestructura'); ?>
        </form>
    </div>
    <?php agrovial2_image_upload_script(); ?>
    <?php
}


// ═══════════════════════════════════════════════════════════
//
//  ── SECCIÓN COMPARTIDA: POR QUÉ ELEGIRNOS
//     (Usada en Home)
//
// ═══════════════════════════════════════════════════════════
function agrovial2_page_whyus() {
    agrovial2_options_header(
        '── Por qué Elegirnos',
        'Sección de la página <strong>Home</strong>. Estadísticas principales y 6 tarjetas de características.'
    );
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_group_whyus'); ?>

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
                    <th scope="row">Característica <?php echo $i; ?></th>
                    <td>Título:<br><input type="text" name="whyus_feat_<?php echo $i; ?>_title" value="<?php echo esc_attr(get_option("whyus_feat_{$i}_title")); ?>" class="regular-text" /><br><br>
                        Descripción:<br><?php wp_editor(get_option("whyus_feat_{$i}_desc"), "whyus_feat_desc_{$i}", ['textarea_name' => "whyus_feat_{$i}_desc", 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 3]); ?></td>
                </tr>
                <?php endfor; ?>
            </table>
            <?php submit_button('Guardar Por qué Elegirnos'); ?>
        </form>
    </div>
    <?php
}


// ═══════════════════════════════════════════════════════════
//
//  ── SECCIÓN COMPARTIDA: CAPACIDAD OPERATIVA (Home)
//     (Resumen en Home — diferente del detallado en Empresa)
//
// ═══════════════════════════════════════════════════════════
function agrovial2_page_capacidad() {
    agrovial2_options_header(
        '── Capacidad Operativa (Home)',
        'Esta es la versión <strong>resumida</strong> que se muestra en la página de inicio. La versión detallada se edita desde <strong>🏢 La Empresa</strong>.'
    );
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_group_capacidad'); ?>
            <h2 class="title">Tarjetas de Capacidad (Home)</h2>
            <table class="form-table">
                <?php
                $cap_home_defaults = [
                    1 => ['+70', 'Capacidad Operativa', 'Flota de más de 70 rodados...'],
                    2 => ['+25 Años', 'Experiencia en Infraestructura', 'Participación en obras...'],
                    3 => ['Expertos', 'Equipo Técnico Especializado', 'Profesionales y técnicos...'],
                    4 => ['Río Negro', 'Presencia Provincial', 'Obras ejecutadas en distintas localidades...'],
                ];
                for ($i = 1; $i <= 4; $i++) : ?>
                <tr valign="top">
                    <th scope="row">Tarjeta <?php echo $i; ?></th>
                    <td>Valor grande:<br><input type="text" name="capacity_<?php echo $i; ?>_value" value="<?php echo esc_attr(get_option("capacity_{$i}_value", $cap_home_defaults[$i][0])); ?>" class="regular-text" /><br><br>
                        Título:<br><input type="text" name="capacity_<?php echo $i; ?>_title" value="<?php echo esc_attr(get_option("capacity_{$i}_title", $cap_home_defaults[$i][1])); ?>" class="regular-text" /><br><br>
                        Descripción:<br><?php wp_editor(get_option("capacity_{$i}_desc", $cap_home_defaults[$i][2]), "capacity_desc_{$i}", ['textarea_name' => "capacity_{$i}_desc", 'teeny' => true, 'media_buttons' => false, 'textarea_rows' => 3]); ?></td>
                </tr>
                <?php endfor; ?>
            </table>
            <?php submit_button('Guardar Capacidad (Home)'); ?>
        </form>
    </div>
    <?php
}


// ═══════════════════════════════════════════════════════════
//
//  📍  MAPA Y UBICACIONES
//
// ═══════════════════════════════════════════════════════════
function agrovial2_page_mapa() {
    agrovial2_options_header(
        '📍 Mapa y Ubicaciones',
        'La sección de mapa se muestra en <strong>Home</strong> y la página de <strong>Proyectos</strong>. Las ubicaciones individuales se gestionan desde el CPT <strong>Ubicaciones</strong> en el menú lateral.'
    );
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_group_mapa'); ?>
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


// ═══════════════════════════════════════════════════════════
//
//  📞  CONTACTO
//
// ═══════════════════════════════════════════════════════════
function agrovial2_page_contacto() {
    agrovial2_options_header(
        '📞 Contacto',
        'Información de contacto. Se muestra en la sección de <strong>Contacto</strong> del Home y en el footer.'
    );
    ?>
        <form method="post" action="options.php">
            <?php settings_fields('agrovial_group_contacto'); ?>
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
