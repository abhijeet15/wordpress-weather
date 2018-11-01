<?php

//flush_rewrite_rules( false );


add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
add_action( 'wp_enqueue_scripts', 'display_custom_fields' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function display_custom_fields( ){
	global $post;
    $custom = get_post_custom($post->ID);

    $ticket_price = number_format( $custom["ticket-price"][0], 2 );
    $release_date = $custom["release-date"][0];
	$return = '<div class="row">';
	$return .= '<div class="col-md-12"><p class="group inner list-group-item-text">';

	$return .= '<b>Country:</b>' . strip_tags ( get_the_term_list( get_the_ID( ), 'country-tag', '', ', ', '' ) ) . '';
	$return .= '<br /><b>Genre:</b>' . strip_tags( get_the_term_list( get_the_ID( ), 'genre-tag', '', ', ', '' ) ) . '';
	$return .= '<br /><b>Ticket Price:</b> Rs. ' . $ticket_price . '';
	$return .= '<br /><b>Release Date:</b>' . $release_date . '';
	$return .= '</p></div></div>';

	return $return;
}

function latest_five_films() {

	$recent_posts = wp_get_recent_posts(array(
        'post_type'		=>'film',
        'orderby' 		=> 'id',
        'order' 		=> 'DESC',
        'posts_per_page'=> 5
    ));
	?>
	<aside id="latest-films-1" class="widget widget_recent_entries">
		<h3 class="widget-title">Latest Posts</h3>
			<ul>
				<?php
				foreach( $recent_posts as $recent )
				{
			        echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
			    }
			    ?>		
			</ul>
		</aside>
<?php
}
add_shortcode('latest-five-films', 'latest_five_films');


function scpt_custom_post_type_film() {
    if ( ! class_exists( 'Super_Custom_Post_Type' ) )
        return;

    $demo_posts = new Super_Custom_Post_Type( 'film' );

    # Test Icon. Should be a square grid.
    $demo_posts->set_icon( 'th-movie' );

    # Taxonomy test, should be like tags
    $genre_tag = new Super_Custom_Taxonomy( 'genre-tag' );
    $country_tag = new Super_Custom_Taxonomy( 'country-tag' );
    $year_tag = new Super_Custom_Taxonomy( 'year-tag' );
    $actor_tag = new Super_Custom_Taxonomy( 'actor-tag' );

    # Taxonomy test, should be like categories
    // $tax_cats = new Super_Custom_Taxonomy( 'tax-cat', 'Tax Cat', 'Tax Cats', 'category' );

    # Connect both of the above taxonomies with the post type
    connect_types_and_taxes( $demo_posts, array( $genre_tag, $country_tag, $year_tag, $actor_tag ) );

    # Add a meta box with every field type
    $demo_posts->add_meta_box( array(
        'id' => 'custom-text-
        fields ',
        'context' => 'normal',
        'fields' => array(
            'ticket-price' => array(),
            'release-date' => array( 'type' => 'date' )
        )
    ) );
}
add_action( 'after_setup_theme', 'scpt_custom_post_type_film' );