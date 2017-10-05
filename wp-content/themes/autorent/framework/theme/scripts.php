<?php



/*-------------------------------------------------------------------------
  START ENQUEUING THEME SCRIPTS
------------------------------------------------------------------------- */

if( !function_exists('autorent_add_theme_scripts') ){

 	function autorent_add_theme_scripts(){

 		global $is_IE,$autorent_option_data;

		/**
		 * mordanizr
		 * @param $handle, $src, $deps, $ver, $in_footer
		 * @since		Version 1.0
		*/



		wp_enqueue_script( 'jquery' );

		wp_register_script( 'owl.carousel.min', AUTORENT_JS.'owl.carousel.min.js', array('jquery'), $ver = true, true );
		wp_enqueue_script('owl.carousel.min');

		wp_register_script( 'tab', AUTORENT_JS.'tab.js', array('jquery'), $ver = true, true );
		wp_enqueue_script('tab');


		wp_register_script( 'jquery.ba-outside-events.min', AUTORENT_JS.'jquery.ba-outside-events.min.js', array('jquery'), $ver = true, true );
		wp_enqueue_script('jquery.ba-outside-events.min');

		wp_register_script( 'isotope.pkgd.min', AUTORENT_JS.'isotope.pkgd.min.js', array('jquery'), $ver = true, true );
		wp_enqueue_script('isotope.pkgd.min');


		wp_register_script( 'jquery.vide.min', AUTORENT_JS.'jquery.vide.min.js', array('jquery'), $ver = true, true );
		wp_enqueue_script('jquery.vide.min');

		wp_register_script( 'autorent-custom', AUTORENT_JS.'autorent-custom.js', array('jquery'), $ver = true, true );
		wp_enqueue_script('autorent-custom');

		wp_register_script( 'autorent-main-scirpt', AUTORENT_JS.'scripts.js', array('jquery'), $ver = true, true );
		wp_enqueue_script('autorent-main-scirpt');


		/*-------------------------------------------------------------------------
		  GOOGLE MAP FOR CONTACT US PAGE START
		------------------------------------------------------------------------- */

		$args = array('post_type' => 'company_location','posts_per_page' => '-1');

		$my_query = new WP_Query( $args );

		$marker_content_prev = array();


		foreach ($my_query->posts as $key => $value) {


			$post_id = $my_query->posts[$key]->ID;
			$lat = get_post_meta( $post_id, '_autorent_property_address_lat');
			$lng = get_post_meta( $post_id, '_autorent_property_address_lng');

			$icon_id = get_post_meta($post_id,'_autorent_company_location_icon');
			$icon = wp_get_attachment_image_src( $icon_id[0] );

			$post_title = $my_query->posts[$key]->post_title;
			$post_permalink = $my_query->posts[$key]->guid;
			$content = $my_query->posts[$key]->post_content;
			$trimmed_content = wp_trim_words( $content, 10, '<a href="'. $post_permalink .'"> Read More</a>'  );



            $marker_content_prev[$key]['lat'] = floatval($lat[0]);
            $marker_content_prev[$key]['lon'] = floatval($lng[0]);
            $marker_content_prev[$key]['id'] = (string)$post_id;
            $marker_content_prev[$key]['zoom'] = $autorent_option_data['autorent_map_zoom_for_contact_page'];



			if(isset($group)){
				$marker_content_prev[$key]['group'] = $group;
			}

			if(isset($icon) && !empty($icon)){
				$marker_content_prev[$key]['icon'] = $icon[0];
			}

			$marker_content_prev[$key]['html'] = '<div class="post-'.$post_id.' map-product"><h5><a href ="'.$post_permalink.'">'.$post_title.'</a></h5><p>'.$trimmed_content.'</p></div>';


		}


		$marker_content = array();

		foreach ($marker_content_prev as $keys => $values) {
			array_push($marker_content, $values);
		}


		wp_register_script( 'autorent_custom_map_script', AUTORENT_JS.'map-script.js', array('jquery'), $ver = false, true );
		wp_localize_script( 'autorent_custom_map_script', 'marker_location', $marker_content );
		wp_localize_script( 'autorent_custom_map_script', 'autorent_option_data', $autorent_option_data );
		wp_enqueue_script( 'autorent_custom_map_script' );


		/*-------------------------------------------------------------------------
		   GOOGLE MAP FOR CONTACT US PAGE END
		------------------------------------------------------------------------- */



 	}

}


add_action('wp_enqueue_scripts', 'autorent_add_theme_scripts');

/*-------------------------------------------------------------------------
  END ENQUEUING THEME SCRIPTS
------------------------------------------------------------------------- */



/*-------------------------------------------------------------------------
  START ENQUEUING ADMIN SCRIPTS
------------------------------------------------------------------------- */

if( !function_exists('autorent_admin_load_scripts') ){

	function autorent_admin_load_scripts($hook) {

		if(in_array($hook,array("post.php","post-new.php"))) {

	        wp_register_script( 'autorent-admin', AUTORENT_JS.'autorent-admin.js', array('jquery'), $ver = false, true );
			wp_enqueue_script('autorent-admin');

			wp_enqueue_script('maps.google', 'http://maps.google.com/maps/api/js?sensor=false', array('jquery'), false, true);

			wp_register_script( 'gps_converter', AUTORENT_JS.'gps_converter.js', array('jquery'), $ver = false, true );
			wp_enqueue_script('gps_converter');

	    }

	}

}

add_action('admin_enqueue_scripts', 'autorent_admin_load_scripts');

/*-------------------------------------------------------------------------
  END ENQUEUING ADMIN SCRIPTS
------------------------------------------------------------------------- */




