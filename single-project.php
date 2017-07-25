<?php

get_header();

?>

<div id="main-content">
    <div class="container">
        <div id="content-area" class="clearfix">
            <div id="left-area">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <?php
                                the_content();
                            ?>
                        </div> <!-- .entry-content -->
                    </article> <!-- .et_pb_post -->
                <?php endwhile; ?>
            </div> <!-- #left-area -->
        </div> <!-- #content-area -->
    </div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>