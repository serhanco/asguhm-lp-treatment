<?php
/*
Plugin Name: ASGUHM LP Treatment Support
Plugin URI: http://iesyazilim.com.tr
Description: Adds template and resources support for the LP Treatment custom post type.
Version: 1.2
Author: İES YAZILIM
Author URI: http://iesyazilim.com.tr
License: GPL2
*/

function lp_treatment_activate() {
    // Code to execute upon activation
}
register_activation_hook(__FILE__, 'lp_treatment_activate');

function lp_treatment_deactivate() {
    // Code to execute upon deactivation
}
register_deactivation_hook(__FILE__, 'lp_treatment_deactivate');

function lp_treatment_enqueue_assets() {
    global $post;
    if (isset($post->post_type) && $post->post_type == 'treatment-lp') {
        // Deueue the ones from the theme
        wp_dequeue_style('mytheme_css');
        wp_dequeue_style('google-fonts');
        wp_dequeue_style('fontawesome');
        wp_dequeue_script('all-js');
        // Enqueue each style with a unique handle
        $fonts_url = 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i';
        wp_enqueue_style( 'custom-fonts', $fonts_url,  false, null );
        wp_enqueue_style('lp-bs', plugins_url('assets/vendor/bootstrap/css/bootstrap.min.css', __FILE__));
        wp_enqueue_style('lp-fontawesome', plugins_url('assets/vendor/fontawesome-free/css/all.min.css', __FILE__));
        wp_enqueue_style('lp-animate', plugins_url('assets/vendor/animate.css/animate.min.css', __FILE__));
        wp_enqueue_style('lp-bootstrap-icons', plugins_url('assets/vendor/bootstrap-icons/bootstrap-icons.css', __FILE__));
        wp_enqueue_style('lp-boxicons', plugins_url('assets/vendor/boxicons/css/boxicons.min.css', __FILE__));
        wp_enqueue_style('lp-glightbox', plugins_url('assets/vendor/glightbox/css/glightbox.min.css', __FILE__));
        wp_enqueue_style('lp-remixicon', plugins_url('assets/vendor/remixicon/remixicon.css', __FILE__));
        wp_enqueue_style('lp-swiper', plugins_url('assets/vendor/swiper/swiper-bundle.min.css', __FILE__));
        wp_enqueue_style('lp-main-style', plugins_url('assets/css/style.css', __FILE__));

        // Conditionally enqueue the check-up packages style
        if (function_exists('get_field') && get_field('treatment_page_type') == 'check-up') {
            wp_enqueue_style('lp-checkup-packages', plugins_url('assets/css/checkup-packages.css', __FILE__));
        }

        // Enqueue JavaScript files with dependencies
        wp_enqueue_script('lp-purecounter', plugins_url('assets/vendor/purecounter/purecounter_vanilla.js', __FILE__), array(), null, true);
        wp_enqueue_script('lp-bootstrap', plugins_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js', __FILE__), array('jquery'), null, true);
        wp_enqueue_script('lp-glightbox', plugins_url('assets/vendor/glightbox/js/glightbox.min.js', __FILE__), array(), null, true);
        wp_enqueue_script('lp-swiper', plugins_url('assets/vendor/swiper/swiper-bundle.min.js', __FILE__), array(), null, true);
        //wp_enqueue_script('lp-email-form', plugins_url('assets/vendor/php-email-form/validate.js', __FILE__), array('jquery'), null, true);
        wp_enqueue_script('lp-main', plugins_url('assets/js/main.js', __FILE__), array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'lp_treatment_enqueue_assets',100);

function lp_treatment_template($template) {
    global $post;

    if ('treatment-lp' === $post->post_type && locate_template(array('single_treatment-lp.php')) == '') {
        // Check if the template exists in the theme, otherwise serve the plugin's file
        return plugin_dir_path(__FILE__) . 'templates/single_treatment-lp.php';
    }

    return $template;
}
add_filter('single_template', 'lp_treatment_template');



// /*
// function remove_figure_for_specific($block_content, $block) {
//     if ($block['blockName'] === 'core/image' && strpos($block_content, 'no-responsive') !== false) {
//         $block_content = preg_replace('/<figure[^>]*>(.*?)<\/figure>/', '$1', $block_content);
//     }
//     return $block_content;
// }
// add_filter('render_block', 'remove_figure_for_specific', 10, 2);
// 
// 
// function remove_responsive_images_completely($content) {
//     // Handle both standard img tags and those with no-responsive class
//     $pattern = '/<img[^>]*(?:class="[^"]*no-responsive[^"]*"|class=\'[^\\]*no-responsive[^\\]*\'|class=[^"\\]\[^>]*no-responsive[^>]*)[^>]*>/i';
//     
//     if (preg_match_all($pattern, $content, $matches)) {
//         foreach ($matches[0] as $img_tag) {
//             $cleaned_img = preg_replace([
//                 '/\ssrcset=["\\]*[^"\\]*["\\]*/',
//                 '/\ssizes=["\\]*[^"\\]*["\\]*/',
//                 '/\sdata-lazy-srcset=["\\]*[^"\\]*["\\]*/',
//                 '/\sdata-lazy-sizes=["\\]*[^"\\]*["\\]*/',
//                 '/\sdata-ll-status=["\\]*[^"\\]*["\\]*/',
//                 '/\sdata-lazy-src=["\\]*[^"\\]*["\\]*/'
//             ], '', $img_tag);
//             
//             $content = str_replace($img_tag, $cleaned_img, $content);
//         }
//     }
//     
//     return $content;
// }
// add_filter('the_content', 'remove_responsive_images_completely', 20);
// add_filter('render_block_core/image', 'remove_responsive_images_completely', 20);
// 
// // Also keep the previous filter for good measure
// function remove_responsive_block_images($block_content, $block) {
//     if ($block['blockName'] === 'core/image') {
//         return remove_responsive_images_completely($block_content);
//     }
//     return $block_content;
// }
// add_filter('render_block', 'remove_responsive_block_images', 20, 2);
// */

// ====== ASGUHM LP Settings ====== //

// 1. Add Admin Menu
function asguhm_lp_add_admin_menu() {
    add_options_page(
        'LP Treatment Settings',
        'LP Treatment',
        'manage_options',
        'asguhm_lp_treatment',
        'asguhm_lp_settings_page_html'
    );
}
add_action('admin_menu', 'asguhm_lp_add_admin_menu');

// 2. Register Settings
function asguhm_lp_settings_init() {
    register_setting('asguhm_lp_settings_group', 'asguhm_lp_test_mode');
    register_setting('asguhm_lp_settings_group', 'asguhm_lp_test_url');

    add_settings_section(
        'asguhm_lp_settings_section',
        'Form Settings',
        'asguhm_lp_settings_section_callback',
        'asguhm_lp_treatment'
    );

    add_settings_field(
        'asguhm_lp_test_mode_field',
        'Test Mode',
        'asguhm_lp_test_mode_field_callback',
        'asguhm_lp_treatment',
        'asguhm_lp_settings_section'
    );

    add_settings_field(
        'asguhm_lp_test_url_field',
        'Test Mode URL',
        'asguhm_lp_test_url_field_callback',
        'asguhm_lp_treatment',
        'asguhm_lp_settings_section'
    );
}
add_action('admin_init', 'asguhm_lp_settings_init');

// 3. Callbacks
function asguhm_lp_settings_section_callback() {
    echo 'Configure settings for the LP Treatment forms.';
}

function asguhm_lp_test_mode_field_callback() {
    $option = get_option('asguhm_lp_test_mode');
    ?>
    <input type="checkbox" id="asguhm_lp_test_mode" name="asguhm_lp_test_mode" value="yes" <?php checked('yes', $option, true); ?> />
    <label for="asguhm_lp_test_mode">Enable Test Mode. If checked, forms will submit to a debug handler instead of the live endpoint.</label>
    <?php
}

function asguhm_lp_test_url_field_callback() {
    $default_url = 'https://serhan.site/req_test/post_data_dump.php';
    $option = get_option('asguhm_lp_test_url', $default_url);
    ?>
    <input type="url" id="asguhm_lp_test_url" name="asguhm_lp_test_url" value="<?php echo esc_attr($option); ?>" size="50" placeholder="<?php echo $default_url; ?>" />
    <p class="description">The URL where forms will be sent when Test Mode is enabled. Defaults to the pre-configured dump URL.</p>
    <?php
}


// 4. Settings Page HTML
function asguhm_lp_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('asguhm_lp_settings_group');
            do_settings_sections('asguhm_lp_treatment');
            submit_button('Save Settings');
            ?>
        </form>
    </div>
    <?php
}

// 5. Admin Notice for Test Mode
function asguhm_lp_test_mode_admin_notice() {
    if (get_option('asguhm_lp_test_mode') === 'yes') {
        $default_url = 'https://serhan.site/req_test/post_data_dump.php';
        $test_url = get_option('asguhm_lp_test_url', $default_url);
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><strong>AsgUHM LP Treatment Plugin:</strong> Test Mode is currently active. Form submissions are being sent to <strong><?php echo esc_url($test_url); ?></strong> for debugging.</p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'asguhm_lp_test_mode_admin_notice');

function get_package_data() {
    static $package_data = null;
    if ($package_data === null) {
        $file_path = plugin_dir_path(__FILE__) . 'translations/packages-data.php';
        if (file_exists($file_path)) {
            $package_data = include $file_path;
        } else {
            $package_data = [];
        }
    }
    return $package_data;
}

