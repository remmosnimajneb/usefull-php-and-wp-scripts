<?php
/* Mass Update ACF Fields to push the updates live
* Issue occured when importing ACF fields to WP, the values were there....but not.
* Run this once in your functions.php to update the fields and have them show properly
* H/T to the script author: https://jboullion.com/update-acf-post-fields/ for the code */

function mass_update_posts() {
		
	$args = array(	'post_type'=>'audiolibrary', //whatever post type you need to update 
					'posts_per_page'   => -1);
		
	$my_posts = get_posts($args);
	
	foreach($my_posts as $key => $my_post){
		$meta_values = get_post_meta( $my_post->ID);
		foreach($meta_values as $meta_key => $meta_value ){
			update_field($meta_key, $meta_value[0], $my_post->ID);
		}
	}

}
add_action( 'init', 'mass_update_posts' );