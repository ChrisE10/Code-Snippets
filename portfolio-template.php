
<?php
/**
 * Template Name: pretty-portfolio template
 * Description: Used as a page template to show page contents, followed by a loop through a CPT archive  
 */


/**
* use this to find all post names in database - very useful
 * <?php $show_post_types = get_post_types(); ?> 
 * <?php print_r($show_post_types); ?> 
 */

echo "<h2>Custom Portfolio template by vivid</h2>";	


//$show_post_types = get_post_types();

//  print_r($show_post_types); 



remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop


add_action( 'genesis_loop', 'cd_goh_loop' );

function cd_goh_loop() {


	$args = array(
		'post_type' => 'pp_portfolio', // enter your custom post type
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page'=> '12',  // overrides posts per page in theme settings
	);
	
	

	
	$loop = new WP_Query( $args );
	if( $loop->have_posts() ) {

		// loop through posts
		while( $loop->have_posts() ): $loop->the_post();





		echo '<div class="one-third first">';
			echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft' ) );
		echo '</div>';
		echo '<div class="two-thirds">';
			echo '<h4>' . get_the_title() . '</h4>';
			echo '<p>' . get_the_date() . '</p>';
					echo '<p>' . get_the_excerpt() . '</p>';
			echo '<p><a href="' . get_permalink() . '" target="_blank">Show Full news Article</a></p>';
		echo '</div>';
		

		
		
		

		endwhile;
	}

	wp_reset_postdata();

}



genesis();