<?php

function portfolio_shortcode($atts, $content, $tag) {
    
    $values = shortcode_atts(array('cat' => ''), $atts);
    $cat = $values['cat'];
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => -1,
        'tax_query' => array(
				array(
					'taxonomy' => 'project_category',
					'field' => 'id',
					'terms' => $cat, 
				),
			),
    );

    

    $output .= '<div class="portfolio-tiles">';
    $query = new WP_Query( $args );

    //var_dump($query);

    if ( $query->have_posts() ){

    

    while ( $query->have_posts() ) : $query->the_post();


        $page_img = get_the_post_thumbnail();

        $output .= '<div class="portfolio-project">';

            $output .= '<a href="' . get_permalink() . '">';



                $output .= '<div class="portfolio-project-img">';

                    $output .= '<div class="see-more"> See More </div>';

                    $output .= '<div class="portfolio-project-img">' . $page_img . '</div>';

                $output .= '</div>';



                $output .= '<div class="portfolio-project-overlay">';

                    $output .= '<div class="portfolio-project_name portfolio-project-info"><h5>' . get_the_title() . '</h5></div>';

                $output .= '</div>';

            $output .= '</a>';

        $output .= '</div>';

    

    endwhile;

        

    $output .= '</div>';

}

    return $output;

}

add_shortcode('portfolio_tiles', 'portfolio_shortcode');







function news_shortcode($atts, $content, $tag) {

    

  $output = '<div id="All-News">';  

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

  $args = array(

    'post_type' => 'post',

    'posts_per_page' => 15,

    'order' => 'DES',

    'paged' => $paged,

  );

  $query = new WP_Query( $args );



  if ( $query->have_posts() ) :

    

    while ( $query->have_posts() ) : $query->the_post();

    

        $output .= '<div class="news-article">';

                $output .= '<div class="article-title"><h3>' . apply_filters('the_title', get_the_title()) . '</h3></div>';

                //$output .= '<div class="article-teaser"><p>' . get_field('news_teaser') . '</p></div>';

                $output .= '<a class="read-more" href="'. get_permalink() .'">Read More</a>';

        $output .= '</div>';

    

    endwhile;



    $output .= '</div>';

    if (function_exists(pagination)) {

      $output .= pagination($query->max_num_pages,"",$paged);

    }



  wp_reset_postdata();

    

  endif;

    

  

  return $output;

}

add_shortcode( 'news', 'news_shortcode' );





function project_portfolio_shortcode() {
	
    echo do_shortcode(get_field('slideshow_shortcode'));
	$post_title = get_the_title();
	$location = get_field('project_location');
	$description = get_field('project_description');
	$cat = wp_get_post_terms(get_the_ID(), 'project_category', array("fields" => "ids"));
	//$output .= '<p>' . $cat[0] . '</p>';
	$args = array(
		'post_type' => 'project',
		'posts_per_page' => -1,
		'tax_query' => array(
				array(
					'taxonomy' => 'project_category',
					'field' => 'id',
					'terms' => $cat[0], 
				),
			),
	);
	
	$query = new WP_Query( $args );
	//var_dump($query);
	if ( $query->have_posts() ){
		
		$maxcount = $query->post_count;
		$projects_id = array();
		while ( $query->have_posts() ) : $query->the_post();
			$i++;
			array_push($projects_id, get_the_ID());
			if(get_the_title() == $post_title)
			{
				$project_number = $i;
			}
		endwhile;
	}

    for($j = 0; $j <= $maxcount; $j++)
	{
		if($j == $project_number)
		{
			$j = $j - 2;
			$prev_link = get_permalink($projects_id[$j]);
			//print_r($prev_link); //Test
			$j = $j + 2;
			$next_link = get_permalink($projects_id[$j]);
			//print_r($next_link); //Test
		}
				
	}
	//Post Information

    $output .= '<div class="project">';
		
		$output .= '<div class="project-prev-next">';
			if($i != 1)
			{
				$output .= '<div class="previous-project">';
					$output .= '<a href="' . $prev_link . '">< Previous Project</a>';
				$output .= '</div>';
			}

			if($i != 1)
			{	
				$output .= '<div class="next-project">';
					$output .= '<a href="' . $next_link . '">Next Project ></a>';
				$output .= '</div>';
			}
		$output .= '</div>';

        $output .= '<div class="project-details">';

            $output .= '<h1 class="project-name">' . $post_title . '</h1>';

            $output .= '<h2 class="project-location">' . $location . '</h2>';

            $output .= '<p class="project-description">' . $description . '</p>';

        $output .= '</div>';

        $output .= '<div class="portfolio-categories">';

            $output .= '<p><a class="portfolio-category" href="/portfolio/transportation-portfolio/">Transportation</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/structures-portfolio/">Structures Systems</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/water-resources-portfolio/">Water Resources</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/land-development-portfolio/">Land Development</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/municipal-portfolio/">Municipal</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/planning-portfolio/">Planning</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/landscape-architecture-portfolio/">Landscape Architecture</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/survey-portfolio/">Survey</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/sue-portfolio/">SUE</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/environmental-portfolio/">Environmental</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/design-build-portfolio/">Design-Build</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/public-entities-portfolio/">Public Entities</a></p>';

            $output .= '<p><a class="portfolio-category" href="/portfolio/private-portfolio/">Private Clients</a></p>';

        $output .= '</div>';

    $output .= '</div>';

    

    return $output;

}

add_shortcode('project_portfolio', 'project_portfolio_shortcode');


function social_media_shortcode()
{
	$output .= '<div class="article-social-share">';
		$output .= '<a href="https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() . '" target="_blank">';
			$output .= '<i class="fa fa-facebook-official" aria-hidden="true"></i>';
		$output .= '</a>'; 
		$output .= '<a  href="https://twitter.com/home?status=' .'WGI%202017%20Internship%20Program%20%20' . get_permalink() . '%20via%20%40WantmanGroup" target="_blank">';
			$output .= '<i class="fa fa-twitter-square" aria-hidden="true"></i>';
		$output .= '</a>';
	$output .= '</div>';        
	return $output;
}

add_shortcode('social_share','social_media_shortcode');