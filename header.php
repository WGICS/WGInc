<!DOCTYPE html>

<!--[if IE 6]>

<html id="ie6" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 7]>

<html id="ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html id="ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->



<head>

<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-5MPVTDC');</script>

<!-- End Google Tag Manager -->

    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <?php elegant_description(); ?>

        <?php elegant_keywords(); ?>

            <?php elegant_canonical(); ?>



                <?php do_action( 'et_head_meta' ); ?>



                    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



                    <?php $template_directory_uri = get_template_directory_uri(); ?>

                        <!--[if lt IE 9]>

	<script src="<?php echo esc_url( $template_directory_uri . '/js/html5.js"' ); ?>" type="text/javascript"></script>

	<![endif]-->

                        <script src="https://use.fontawesome.com/f6b7f73979.js"></script>

                        <script type="text/javascript">

                            document.documentElement.className = 'js';

                        </script>

                        <!-- Facebook Pixel Code -->

                        <script>

                            ! function (f, b, e, v, n, t, s) {

                                if (f.fbq) return;

                                n = f.fbq = function () {

                                    n.callMethod ?

                                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)

                                };

                                if (!f._fbq) f._fbq = n;

                                n.push = n;

                                n.loaded = !0;

                                n.version = '2.0';

                                n.queue = [];

                                t = b.createElement(e);

                                t.async = !0;

                                t.src = v;

                                s = b.getElementsByTagName(e)[0];

                                s.parentNode.insertBefore(t, s)

                            }(window

                                , document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

                            fbq('init', '122337885000351'); // Insert your pixel ID here.

                            fbq('track', 'PageView');

                        </script>

                        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=122337885000351&ev=PageView&noscript=1" /></noscript>

                        <!-- DO NOT MODIFY -->

                        <!-- End Facebook Pixel Code -->



                        <?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5MPVTDC"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->

    <div id="page-container">

        <?php

	if ( is_page_template( 'page-template-blank.php' ) ) {

		return;

	}



	$et_secondary_nav_items = et_divi_get_top_nav_items();



	$et_phone_number = $et_secondary_nav_items->phone_number;



	$et_email = $et_secondary_nav_items->email;



	$et_contact_info_defined = $et_secondary_nav_items->contact_info_defined;



	$show_header_social_icons = $et_secondary_nav_items->show_header_social_icons;



	$et_secondary_nav = $et_secondary_nav_items->secondary_nav;



	$et_top_info_defined = $et_secondary_nav_items->top_info_defined;



	$et_slide_header = 'slide' === et_get_option( 'header_style', 'left' ) || 'fullscreen' === et_get_option( 'header_style', 'left' ) ? true : false;

?>



            <?php if ( $et_top_info_defined && ! $et_slide_header || is_customize_preview() ) : ?>

                <div id="top-header" <?php echo $et_top_info_defined ? '' : 'style="display: none;"'; ?>>

                    <div class="container clearfix">



                        <?php if ( $et_contact_info_defined ) : ?>



                            <div id="et-info">

                                <?php if ( '' !== ( $et_phone_number = et_get_option( 'phone_number' ) ) ) : ?>

                                    <span id="et-info-phone"><?php echo et_sanitize_html_input_text( $et_phone_number ); ?></span>

                                    <?php endif; ?>



                                        <?php if ( '' !== ( $et_email = et_get_option( 'header_email' ) ) ) : ?>

                                            <a href="<?php echo esc_attr( 'mailto:' . $et_email ); ?>"><span id="et-info-email"><?php echo esc_html( $et_email ); ?></span></a>

                                            <?php endif; ?>



                                                <?php

				if ( true === $show_header_social_icons ) {

					get_template_part( 'includes/social_icons', 'header' );

				} ?>

                            </div>

                            <!-- #et-info -->



                            <?php endif; // true === $et_contact_info_defined ?>



                                <div id="et-secondary-menu">

                                    <?php

					if ( ! $et_contact_info_defined && true === $show_header_social_icons ) {

						get_template_part( 'includes/social_icons', 'header' );

					} else if ( $et_contact_info_defined && true === $show_header_social_icons ) {

						ob_start();



						get_template_part( 'includes/social_icons', 'header' );



						$duplicate_social_icons = ob_get_contents();



						ob_end_clean();



						printf(

							'<div class="et_duplicate_social_icons">

								%1$s

							</div>',

							$duplicate_social_icons

						);

					}



					if ( '' !== $et_secondary_nav ) {

						echo $et_secondary_nav;

					}



					et_show_cart_total();

				?>

                                </div>

                                <!-- #et-secondary-menu -->



                    </div>

                    <!-- .container -->

                </div>

                <!-- #top-header -->

                <?php endif; // true ==== $et_top_info_defined ?>



                    <?php if ( $et_slide_header || is_customize_preview() ) : ?>

                        <div class="et_slide_in_menu_container">

                            <?php if ( 'fullscreen' === et_get_option( 'header_style', 'left' ) || is_customize_preview() ) { ?>

                                <span class="mobile_menu_bar et_toggle_fullscreen_menu"></span>

                                <?php } ?>



                                    <?php

				if ( $et_contact_info_defined || true === $show_header_social_icons || false !== et_get_option( 'show_search_icon', true ) || class_exists( 'woocommerce' ) ) { ?>

                                        <div class="et_slide_menu_top">



                                            <?php if ( 'fullscreen' === et_get_option( 'header_style', 'left' ) ) { ?>

                                                <div class="et_pb_top_menu_inner">

                                                    <?php } ?>

                                                        <?php }



				if ( true === $show_header_social_icons ) {

					get_template_part( 'includes/social_icons', 'header' );

				}



				et_show_cart_total();

			?>

                                                            <?php if ( false !== et_get_option( 'show_search_icon', true ) || is_customize_preview() ) : ?>

                                                                <?php if ( 'fullscreen' !== et_get_option( 'header_style', 'left' ) ) { ?>

                                                                    <div class="clear"></div>

                                                                    <?php } ?>

                                                                        <form role="search" method="get" class="et-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

                                                                            <?php

						printf( '<input type="search" class="et-search-field" placeholder="%1$s" placeholder="%2$s" name="s" title="%3$s" />',

							esc_attr__( 'Search &hellip;', 'Divi' ),

							get_search_query(),

							esc_attr__( 'Search for:', 'Divi' )

						);

					?>

                                                                                <button type="submit" id="searchsubmit_header"></button>

                                                                        </form>

                                                                        <?php endif; // true === et_get_option( 'show_search_icon', false ) ?>



                                                                            <?php if ( $et_contact_info_defined ) : ?>



                                                                                <div id="et-info">

                                                                                    <?php if ( '' !== ( $et_phone_number = et_get_option( 'phone_number' ) ) ) : ?>

                                                                                        <span id="et-info-phone"><?php echo et_sanitize_html_input_text( $et_phone_number ); ?></span>

                                                                                        <?php endif; ?>



                                                                                            <?php if ( '' !== ( $et_email = et_get_option( 'header_email' ) ) ) : ?>

                                                                                                <a href="<?php echo esc_attr( 'mailto:' . $et_email ); ?>"><span id="et-info-email"><?php echo esc_html( $et_email ); ?></span></a>

                                                                                                <?php endif; ?>

                                                                                </div>

                                                                                <!-- #et-info -->



                                                                                <?php endif; // true === $et_contact_info_defined ?>

                                                                                    <?php if ( $et_contact_info_defined || true === $show_header_social_icons || false !== et_get_option( 'show_search_icon', true ) || class_exists( 'woocommerce' ) ) { ?>

                                                                                        <?php if ( 'fullscreen' === et_get_option( 'header_style', 'left' ) ) { ?>

                                                </div>

                                                <!-- .et_pb_top_menu_inner -->

                                                <?php } ?>



                                        </div>

                                        <!-- .et_slide_menu_top -->

                                        <?php } ?>



                                            <div class="et_pb_fullscreen_nav_container">

                                                <?php

					$slide_nav = '';

					$slide_menu_class = 'et_mobile_menu';



					$slide_nav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'echo' => false, 'items_wrap' => '%3$s' ) );

					$slide_nav .= wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'container' => '', 'fallback_cb' => '', 'echo' => false, 'items_wrap' => '%3$s' ) );

				?>



                                                    <ul id="mobile_menu_slide" class="<?php echo esc_attr( $slide_menu_class ); ?>">



                                                        <?php

					if ( '' == $slide_nav ) :

				?>

                                                            <?php if ( 'on' == et_get_option( 'divi_home_link' ) ) { ?>

                                                                <li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>>

                                                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">

                                                                        <?php esc_html_e( 'Home', 'Divi' ); ?>

                                                                    </a>

                                                                </li>

                                                                <?php }; ?>



                                                                    <?php show_page_menu( $slide_menu_class, false, false ); ?>

                                                                        <?php show_categories_menu( $slide_menu_class, false ); ?>

                                                                            <?php

					else :

						echo( $slide_nav );

					endif;

				?>



                                                    </ul>

                                            </div>

                        </div>

                        <?php endif; // true ==== $et_slide_header ?>



                            <header id="main-header" data-height-onload="<?php echo esc_attr( et_get_option( 'menu_height', '66' ) ); ?>">



                                <div class="WGI-info <?php if ( is_front_page() ) echo( 'WGI-info-home' ); ?>">

                                    <div class="container clearfix et_menu_container">

                                        <?php

                    $logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && '' != $user_logo

                        ? $user_logo

                        : $template_directory_uri . '/images/logo.png';

                ?>

                                            <div class="logo-info">

                                                <div class="logo_container">

                                                    <span class="logo_helper"></span>

                                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">

                                <img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="logo" data-height-percentage="<?php echo esc_attr( et_get_option( 'logo_height', '54' ) ); ?>" />

                            </a>

                                                </div>

                                                <div class="info_container">

                                                    <span class="social-media">

                                                        <a class="element" href="https://www.facebook.com/wginc/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>

                                                        <a class="element" href="https://twitter.com/wantmangroup" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>

                                                        <a class="element" href="https://www.linkedin.com/company/wantman-group-inc-" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>

                                                        <a class="element" href="https://www.youtube.com/channel/UCSdkMrzFgN5zEM4ZdzUhwzA" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>

                                                        <a class="element" href="http://www.wgicreative.com" target="_blank"><img src="/wp-content/uploads/2016/12/CS_Logo-Icon_Green.png" alt="WGI Creative Services"></a>

                                                    </span>

                                                    <div class="phone">

                                                        <p class="title">Toll Free</p>

                                                        <p class="description">866.909.2220</p>

                                                    </div>

                                                </div>

                                            </div>

                                    </div>

                                </div>

                                <!-- .container -->

                                <div class="nav-menu">

                                    <div class="container clearfix et_menu_container">

                                        <div id="et-top-navigation" class="navigation" data-height="<?php echo esc_attr( et_get_option( 'menu_height', '66' ) ); ?>" data-fixed-height="<?php echo esc_attr( et_get_option( 'minimized_menu_height', '40' ) ); ?>">

                                            <?php if ( ! $et_slide_header || is_customize_preview() ) : ?>

                                                <nav id="top-menu-nav">

                                                    <?php

							$menuClass = 'nav';

							if ( 'on' == et_get_option( 'divi_disable_toptier' ) ) $menuClass .= ' et_disable_top_tier';

							$primaryNav = '';



							$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'top-menu', 'echo' => false ) );



							if ( '' == $primaryNav ) :

						?>

                                                        <ul id="top-menu" class="<?php echo esc_attr( $menuClass ); ?>">

                                                            <?php if ( 'on' == et_get_option( 'divi_home_link' ) ) { ?>

                                                                <li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>>

                                                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">

                                                                        <?php esc_html_e( 'Home', 'Divi' ); ?>

                                                                    </a>

                                                                </li>

                                                                <?php }; ?>



                                                                    <?php show_page_menu( $menuClass, false, false ); ?>

                                                                        <?php show_categories_menu( $menuClass, false ); ?>

                                                        </ul>

                                                        <?php

							else :

								echo( $primaryNav );

							endif;

						?>

                                                </nav>

                                                <?php endif; ?>



                                                    <?php

					if ( ! $et_top_info_defined && ( ! $et_slide_header || is_customize_preview() ) ) {

						et_show_cart_total( array(

							'no_text' => true,

						) );

					}

					?>



                                                        <?php if ( $et_slide_header || is_customize_preview() ) : ?>

                                                            <span class="mobile_menu_bar et_pb_header_toggle et_toggle_<?php echo et_get_option( 'header_style', 'left' ); ?>_menu"></span>

                                                            <?php endif; ?>



                                                                <?php if ( ( false !== et_get_option( 'show_search_icon', true ) && ! $et_slide_header ) || is_customize_preview() ) : ?>

                                                                    <div id="et_top_search">

                                                                        <span id="et_search_icon"></span>

                                                                    </div>

                                                                    <?php endif; // true === et_get_option( 'show_search_icon', false ) ?>



                                                                        <?php do_action( 'et_header_top' ); ?>

                                        </div>

                                        <!-- #et-top-navigation -->

                                    </div>

                                </div>



                                <div class="et_search_outer">

                                    <div class="container et_search_form_container">

                                        <form role="search" method="get" class="et-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

                                            <?php

						printf( '<input type="search" class="et-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',

							esc_attr__( 'Search &hellip;', 'Divi' ),

							get_search_query(),

							esc_attr__( 'Search for:', 'Divi' )

						);

					?>

                                        </form>

                                        <span class="et_close_search_field"></span>

                                    </div>

                                </div>

                            </header>

                            <!-- #main-header -->



                            <div id="et-main-area">