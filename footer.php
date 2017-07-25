<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

    <span class="et_pb_scroll_top et-pb-icon"></span>

    <?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>





        <footer id="main-footer">
            <?php if (is_front_page()) : ?>
                <div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left button-list et_pb_text_1">

                    <p><a class="button careers" href="/careers"><i class="fa fa-users" aria-hidden="true"></i>Careers</a><a class="button videos" href="/videos"><i class="fa fa-play-circle-o" aria-hidden="true"></i>Videos</a><a class="button news" href="/news"><i class="fa fa-newspaper-o" aria-hidden="true"></i>News</a></p>

                </div>
                <?php endif;
                             ?>
                    <div id="footer-bottom">
                        <div class="container clearfix">
                            <div class="footer-section twitter-feed">
                                <h2>TWITTER</h2>
                                <?php
                                echo do_shortcode('[custom-twitter-feeds]');
                            ?>
                            </div>
                            <div class="footer-section award-logos">
                                <h2>AWARDS</h2>
                                <img src="https://wginc.com/wp-content/uploads/2017/07/logoHotFirm.png" alt="Zweig Group Hot Firm Award">
                                <img src="https://wginc.com/wp-content/uploads/2017/07/logoBestFirms.png" alt="Zweig Group Best Firm">
                                <img src="https://wginc.com/wp-content/uploads/2017/07/logoInc5000.png" alt="Inc. 5000 Award">
                                <img src="https://wginc.com/wp-content/uploads/2017/07/logoENR.png" alt="ENR Award">
                                <img src="https://wginc.com/wp-content/uploads/2017/07/marketing-excellence-2017.png" alt="Zweig Group Marketing Excellence Award">
                            </div>
                            <div class="footer-section news">
                                <h2>NEWS</h2>
                                <?php
                                $output = '<div id="Home-News">';
                                $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 1,
                                'order' => 'DES'
                                );
                                $query = new WP_Query( $args );
                                if ( $query->have_posts() ) :
                                    $query->the_post();
                                    $output .= '<div class="news-article">';
                                        $output .= '<div class="article-title"><h3>' . apply_filters('the_title', get_the_title()) . '</h3></div>';
                                        $output .= '<a class="read-more" href="'. get_permalink() .'">Read More</a>';
                                    $output .= '</div>';
                                endif;
                                $output .= '</div>';
                                echo($output);
                            ?>
                            </div>
                        </div>
                        <!-- .container -->
                    </div>
        </footer>
        <!-- #main-footer -->
        </div>
        <!-- #et-main-area -->

        <?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

            </div>
            <!-- #page-container -->

            <?php wp_footer(); ?>
                </body>

                </html>