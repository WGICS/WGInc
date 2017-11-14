<?php

	require get_stylesheet_directory() . '/lib/shortcodes.php';
	require get_stylesheet_directory() . '/lib/utilities.php';


	function owl_scripts() {

		wp_register_script('my_owl_carousel', get_stylesheet_directory_uri(). '/JS/Owl/owl.carousel.min.js', array('jquery'),'1.1', true);

		wp_enqueue_script('my_owl_carousel');
	}

	add_action( 'wp_enqueue_scripts', 'owl_scripts' );

	function gray_scripts() {

		wp_register_script('gray', get_stylesheet_directory_uri(). '/JS/jquery.gray.min.js', array('jquery'),'1.1', true);

		wp_enqueue_script('gray');
	}

	add_action( 'wp_enqueue_scripts', 'gray_scripts' );

	function wpb_adding_scripts() {

		wp_register_script('my_animate', get_stylesheet_directory_uri(). '/JS/animate.js', array('jquery'),'1.1', true);

		wp_enqueue_script('my_animate');
	}

	add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );

    // Divi Builder on custom post types by https://wpcolt.com
    add_filter('et_builder_post_types', 'divicolt_post_types');
    add_filter('et_fb_post_types','divicolt_post_types' ); // Enable Divi Visual Builder on the custom post types
    function divicolt_post_types($post_types)
    {
        foreach (get_post_types() as $post_type) {
            if (!in_array($post_type, $post_types) and post_type_supports($post_type, 'editor')) {
                $post_types[] = $post_type;
            }
        }
        return $post_types;
    }
    add_action('add_meta_boxes', 'divicolt_add_meta_box');
    function divicolt_add_meta_box()
    {
        foreach (get_post_types() as $post_type) {
            if (post_type_supports($post_type, 'editor') and function_exists('et_single_settings_meta_box')) {
                $obj= get_post_type_object( $post_type );
                add_meta_box('et_settings_meta_box', sprintf(__('Divi %s Settings', 'Divi'), $obj->labels->singular_name), 'et_single_settings_meta_box', $post_type, 'side', 'high');
            }
        }
    }
    add_action('admin_head', 'divicolt_admin_js');
    function divicolt_admin_js()
    {
        $s = get_current_screen();
        if (!empty($s->post_type) and $s->post_type != 'page' and $s->post_type != 'post') {
            ?>
        <script>
            jQuery(function ($) {
                $('#et_pb_layout').insertAfter($('#et_pb_main_editor_wrap'));
            });
        </script>
        <?php
        }
    }
    //
?>
