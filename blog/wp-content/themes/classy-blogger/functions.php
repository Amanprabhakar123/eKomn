<?php
require_once get_template_directory() . '/vendor/autoload.php';
// Get customizer options
use SuperbThemesCustomizer\CustomizerControls;

// New color variables
if (method_exists(CustomizerControls::class, "OverwriteDefault")) {
    CustomizerControls::OverwriteDefault(CustomizerControls::NAVIGATION_LAYOUT_STYLE, "navigation_layout_style_choice_large");
    CustomizerControls::OverwriteDefault(CustomizerControls::SITE_IDENTITY_HIDE_TAGLINE, "0");
    CustomizerControls::OverwriteDefault('--superb-pixels-primary', "#f8ad36");
    CustomizerControls::OverwriteDefault('--superb-pixels-primary-dark', "#d78a16");
    CustomizerControls::OverwriteDefault('--superb-pixels-secondary', "#eeeeee");
    CustomizerControls::OverwriteDefault('--superb-pixels-secondary-dark', "#e3e3e3");
    CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_COLUMNS_STYLE, "blogfeed_onecolumn");
    CustomizerControls::OverwriteDefault(CustomizerControls::BLOGFEED_HIDE_SIDEBAR, "blogfeed_show_sidebar");

}


// Get stylesheet
add_action('wp_enqueue_scripts', 'classy_blogger_enqueue_styles');
function classy_blogger_enqueue_styles()
{
    wp_enqueue_style('classy-blogger-parent-style', get_template_directory_uri() . '/style.css');
}



// New fonts
function classy_blogger_enqueue_assets()
{
    // Include the file.
    require_once get_theme_file_path('webfont-loader/wptt-webfont-loader.php');
    // Load the webfont.
    wp_enqueue_style(
        'classy-blogger-fonts',
        wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=auto'),
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'classy_blogger_enqueue_assets');
