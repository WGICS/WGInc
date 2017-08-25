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


?>