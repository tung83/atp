<?php

global $woocommerce, $product , $autorent_option_data;

?>
	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart uou-form default-form" method="post" enctype='multipart/form-data'>

		<?php $get_product_base_cost = get_post_meta($product->id, 'uou_bookable_main_cost', true ); ?>

		<div id="uou-bookings-booking-form">
		
			
			<?php if(isset($autorent_option_data['autorent_show_resource_field_switch']) && !empty($autorent_option_data['autorent_show_resource_field_switch'])): ?>

				<h5><?php _e('Resource', 'uou-bookings') ?></h5>
				
				<select class="my_select_box" multiple data-placeholder="Select Your Options" name="resoruce_select">
				<?php

					$booking_resource_meta = json_decode(get_post_meta( $product->id,'bookable_availibility_resource',true));

				    $resource_name = '';
				    $resource_value = '';
				    
				    if(isset($booking_resource_meta) && !empty($booking_resource_meta)){

				    	foreach ($booking_resource_meta as $meta) {

					    	foreach ($meta as $key => $value) {
					    		if($meta[$key]->name == 'uou_booking_resouce_availibility'){
					    			$resource_name = $meta[$key]->value;

					    			$post_7 = get_post($resource_name, ARRAY_A);
									$title = $post_7['post_title'];
					    		}
					    		if($meta[$key]->name == '_uou_booking_resource_cost'){
					    			$resource_value = $meta[$key]->value;
					    		}
					    	}
					    	?>

					        	<?php $val = array("title","resource_value"); ?>
							    <option value='{"resource_name":"<?php echo esc_attr($title); ?>","cost":"<?php echo esc_attr($resource_value); ?>"}'><?php echo esc_attr($title) . ' : &nbsp; &nbsp; ' . esc_attr(get_woocommerce_currency_symbol()).$resource_value; ?></option>


					        <?php
					    }

				    }
				    

				?>

				</select><!-- #end resource -->

			<?php endif; ?>


			<?php if(isset($autorent_option_data['autorent_show_person_field_switch']) && !empty($autorent_option_data['autorent_show_person_field_switch'])): ?>

				<h5><label> <?php _e('No. of Person', 'uou-bookings') ?></label></h5>
				
				<select id="person_cost_dropdown" class="my_select_box" name="person_select" data-placeholder="Select Your Options">
				<?php
					$booking_meta = json_decode( get_post_meta( $product->id, 'bookable_meta', true ) );

					$people_capacity = get_post_meta( $product->id,'_concierge_vehicle_people_capacity',true);
					
					if(is_array($booking_meta)){
					    foreach ($booking_meta as $meta) {

					    	$person_check = $meta['0']->value;

					    	if($person_check == 'uou_person'){
					    		foreach ($meta as $key => $value) {

						    		if($meta[$key]->name == '_uou_booking_number_person'){
						    			$person_no = $meta[$key]->value;
						    		}

						    		if($meta[$key]->name == "_uou_booking_cost"){
						    			$person_cost = $meta[$key]->value;

						    		}
						    	}

					    		?>

						        <option value='{"person_no":"<?php echo esc_attr($person_no+$people_capacity); ?>","cost":"<?php echo esc_attr($person_cost); ?>"}'><?php echo 'No of person ( ' . $person_no . ' ) - Additional Cost :   &nbsp; &nbsp;' .esc_attr(get_woocommerce_currency_symbol()). $person_cost; ?></option>


						    	<?php

					    	}

					    }
					}

				?>
				</select>

			<?php endif; ?>




			<p id="check-in-wrapper" class="form-row">
				<span class="calendar-input input-left" title="Departure">
					<input type="text" class="check-in" name="check-in" placeholder="<?php _e('Arrival', 'uou-bookings') ?>">
					<i class="fa fa-calendar check-in"></i>
				</span>
			</p>

			<p id="check-out-wrapper" class="calendar-input">
				<input type="text" class="check-out" name="check-out" value="" placeholder="<?php _e('Departure', 'uou-bookings') ?>">
				<i class="fa fa-calendar check-out"></i>
			</p>

 			<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		</div>

		<h5 class="calculate-cart-total"><?php _e('Total Booking Cost : &nbsp;', 'uou-bookings') ?><?php echo esc_attr(get_woocommerce_currency_symbol()); ?><span class = "total_cost"></span></h5>

		<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
		<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_attr($product->single_add_to_cart_text()); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
