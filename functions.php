
<?php

function add_josh_styles_and_scripts() {

    wp_enqueue_style( 'josh.css', get_stylesheet_directory_uri() . '/css/josh.css');
    wp_enqueue_script( 'josh.js', get_template_directory_uri() . '/js/josh.js', array(),'1.0', true);
}
add_action( 'wp_enqueue_scripts', 'add_josh_styles_and_scripts' );

?>
