
<?php 

global $autorent_option_data; 



$background_image = $autorent_option_data['autorent-home-page-banner-image']['url'];

$search_form = get_post_meta($post->ID, '_autorent_search_form_type', true);

if(isset($autorent_option_data['autorent-select-search-page'])){
	$search_page = $autorent_option_data['autorent-select-search-page'];										
}

if($search_form === 'search_form_with_solid_bg'){
	$bg_color = "light-skin";
}else{
	$bg_color = "dark-skin";
}
	


?>


<?php if(isset($autorent_option_data['autorent-home-page-banner']) && !empty($autorent_option_data['autorent-home-page-banner'])): ?>

<!-- Start Intro -->
<div class="intro" style="<?php if(isset($background_image) && !empty($background_image)){?>background-image: url(<?php echo esc_url($background_image);}?>);background-size:cover;">
   

    <div class="container">


      	
      	<?php if(isset($autorent_option_data['autorent-home-page-search']) && !empty($autorent_option_data['autorent-home-page-search'])): ?>

	    <div class="col-lg-5 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-8 col-sm-offset-2">


	        <div class="reservation">
	          
				<!-- Start Nav-Tabs -->
				<?php if(isset($autorent_option_data['autorent_buytype_switch']) || $autorent_option_data['autorent_buytype_switch'] && isset($autorent_option_data['autorent_booktype_switch']) && $autorent_option_data['autorent_booktype_switch']): ?>

					<?php 

						if($autorent_option_data['autorent_buytype_switch'] && !$autorent_option_data['autorent_booktype_switch']){
							$buy_active = 'active'; 
							$book_active = '';
						}else{
							$book_active = 'active';
							$buy_active = '';
						}


					 ?>	

					<ul class="nav nav-tabs list-inline horizontal-tab clearfix" role="tablist">

						<?php if(isset($autorent_option_data['autorent_booktype_switch']) && $autorent_option_data['autorent_booktype_switch']): ?>

							<?php if(!empty($autorent_option_data['autorent_bookcar_chage_name'])): ?>
								<li class=" <?php echo esc_attr($book_active); ?>"><a href="#book" role="tab" data-toggle="tab" data-rel="book"><?php echo esc_attr($autorent_option_data['autorent_bookcar_chage_name']); ?></a>
								</li>						
							<?php else: ?>    
								<li class=" <?php echo esc_attr($book_active); ?>"><a href="#book" role="tab" data-toggle="tab" data-rel="book"><?php _e('Đặt xe ngay','autorent'); ?></a>
								</li>						
							<?php endif; ?>

						<?php endif; ?>

						<?php if(isset($autorent_option_data['autorent_buytype_switch']) && $autorent_option_data['autorent_buytype_switch']): ?>

							<?php if(!empty($autorent_option_data['autorent_buycar_chage_name'])): ?>					
								<li class=" <?php echo esc_attr($buy_active); ?>"><a href="#buy" role="tab" data-toggle="tab" data-rel="buy"><?php echo esc_attr($autorent_option_data['autorent_buycar_chage_name']); ?></a></li>						
							<?php else: ?>  						
								<li class=" <?php echo esc_attr($buy_active); ?>"><a href="#buy" role="tab" data-toggle="tab" data-rel="buy"><?php _e('Đặt tour','autorent'); ?></a></li>					
							<?php endif; ?>

						<?php endif; ?>

						
					</ul>

				<?php endif; ?>
				<!-- End Nav-Tabs -->
	          
				<!-- Start Tab-Content -->
				<div class="tab-content">


					<!-- Start book section -->

					<?php if(isset($autorent_option_data['autorent_booktype_switch']) && $autorent_option_data['autorent_booktype_switch']): ?>

					<div class="tab-pane fade <?php echo esc_attr($book_active); ?> in" id="book">
						
						<form action="#" class="reservation-form <?php echo esc_attr($bg_color); ?> default-form">


							<?php if($autorent_option_data['autorent_location_switch'] == 1) : ?>
							
							<div class="location reservation-step">
							
								<span class="step-number color-yellow">1</span>


								<!-- Arrival date start -->
								
								<?php if(!empty($autorent_option_data['autorent_location_chage_name'])): ?>
									<h4 class="step-title"><?php echo esc_attr($autorent_option_data['autorent_location_chage_name']); ?></h4>
								<?php else: ?>    
									<h4 class="step-title"><?php _e('Pick-up Location:','autorent'); ?></h4>
								<?php endif; ?>


								<?php 

									$selected_location = $autorent_option_data['autoren_search_location_select'];


									if($selected_location == 'city'){
										$placeholder = 'Select a city';
									}elseif($selected_location == 'state'){
										$placeholder = 'Select a state';
									}elseif($selected_location == 'airport'){
										$placeholder = 'Select a Airport';
									}
									

									$args = array(
										'orderby'           => 'name', 
										'order'             => 'ASC',
										'fields'      => 'all',       
									); 

									if(taxonomy_exists($selected_location)){
										$terms = get_terms($selected_location, $args);
									}
									
								?>

								
								<?php if(isset($terms) && !empty($terms)) : ?>     

									<span class="select-box" title="car_location">
										<select name="car_location" data-placeholder="- <?php echo esc_attr(_e($placeholder,'autorent')); ?> -">
											<option value=""><?php _e('- Select -','autorent'); ?></option>           
											<?php foreach($terms as $key => $value) { ?>
												<option value="<?php echo esc_attr($value->slug); ?>"><?php echo esc_attr($value->name); ?></option>
											<?php } ?>
										</select>
									</span>

								<?php endif; ?> 


								<input type="hidden" name="location_tax" value="<?php echo esc_attr($selected_location); ?>">

								<input type="hidden" name="search_page" value="<?php echo esc_url(get_permalink($search_page)); ?>">


								<!-- Arrival date end -->






								<!-- Return on Location start -->


								<?php if($autorent_option_data['autorent_return_location_switch']) : ?>


									

									<span class="checkbox-input">
										<input type="checkbox" name="return_location" id="return-car-to-different-location">
										<label for="return-car-to-different-location"><?php _e('Return car to a different location','autorent'); ?></label>
									</span>	

									<div class="return-car">
								
										<?php if(!empty($autorent_option_data['autorent_return_location_chage_name'])): ?>
											<h4 class="step-title"><?php echo esc_attr($autorent_option_data['autorent_return_location_chage_name']); ?></h4>
										<?php else: ?>    
											<h4 class="step-title"><?php _e('Return Location:','autorent'); ?></h4>
										<?php endif; ?>


										<?php 

											$return_location = $autorent_option_data['autoren_return_location_select'];


										
											$args = array(
												'orderby'           => 'name', 
												'order'             => 'ASC',
												'fields'      => 'all',       
											); 

											if(taxonomy_exists($return_location)){
												$return_terms = get_terms($return_location, $args);
											}
											
										?>

										
										<?php if(isset($return_terms) && !empty($return_terms)) : ?>     

											<span class="select-box" title="car_location">
												<select name="car_return_location" data-placeholder="- <?php _e('Select Return Location','autorent'); ?> -">
													<option value=""><?php _e('- Select -','autorent'); ?></option>           
													<?php foreach($return_terms as $key => $value) { ?>
														<option value="<?php echo esc_attr($value->slug); ?>"><?php echo esc_attr($value->name); ?></option>
													<?php } ?>
												</select>
											</span>

										<?php endif; ?> 


										<input type="hidden" name="return_location_tax" value="<?php echo esc_attr($return_location); ?>">
				
									</div>	


								<?php endif; ?>


								<!-- Return on Location end -->
										



							</div>

							<?php endif; ?>







							<?php if($autorent_option_data['autorent_pickup_date_switch'] || $autorent_option_data['autorent_return_date_switch'] == 1) : ?>						

							<div class="date reservation-step">


								<span class="step-number color-yellow"><?php _e('2','autorent'); ?></span>							


								<?php if($autorent_option_data['autorent_pickup_date_switch'] == 1) : ?>

									<?php if(!empty($autorent_option_data['autorent_pickup_date_chage_name'])): ?>
										<h4 class="step-title"><?php echo esc_attr($autorent_option_data['autorent_pickup_date_chage_name']); ?></h4>
									<?php else: ?>    
										<h4 class="step-title"><?php _e('Pick-up Date:','autorent'); ?></h4>
									<?php endif; ?>

									<span class="calendar-input">
										<input type="text" name="pickUpDate" placeholder="<?php _e('Pick Up Date','autorent'); ?>" data-dateformat="dd-mm-yy">
										<i class="fa fa-calendar"></i>
									</span>

								<?php endif; ?>							


								<?php if($autorent_option_data['autorent_return_date_switch'] == 1) : ?>

									<?php if(!empty($autorent_option_data['autorent_return_date_chage_name'])): ?>
										<h4 class="step-title"><?php echo esc_attr($autorent_option_data['autorent_return_date_chage_name']); ?></h4>
									<?php else: ?>    
										<h4 class="step-title"><?php _e('Return Date:','autorent'); ?></h4>
									<?php endif; ?>

									<span class="calendar-input">
										<input type="text" name="returnDate" placeholder="<?php _e('Return Date','autorent'); ?>" data-dateformat="dd-mm-yy">
										<i class="fa fa-calendar"></i>
									</span>

								<?php endif; ?>


							</div>

							<?php endif; ?>




							<?php if($autorent_option_data['autorent_car_type_search_switch'] == 1) : ?>

							<div class="car-type reservation-step">

								<span class="step-number color-yellow"><?php _e('3','autorent'); ?></span>

								<?php if(!empty($autorent_option_data['autorent_car_type_search_chage_name'])): ?>
									<h4 class="step-title"><?php echo esc_attr($autorent_option_data['autorent_car_type_search_chage_name']); ?></h4>
								<?php else: ?>    
									<h4 class="step-title"><?php _e('Choose Car Type:','autorent'); ?></h4>
								<?php endif; ?>


								<?php 

									$selected_tax = $autorent_option_data['autorent_car_type_search_select'];

									$args = array(
										'orderby'           => 'name', 
										'order'             => 'ASC',
										'fields'      => 'all',       
									); 

									if(taxonomy_exists($selected_tax)){
										$terms = get_terms($selected_tax, $args);
									}

									
								?>

								
								<?php if(isset($terms) && !empty($terms)) : ?>     

									<span class="select-box" title="car-type">
										<select name="car_type" data-placeholder="<?php _e('- Select -','autorent'); ?> ">
											<option value=""><?php _e('- Select -','autorent'); ?></option>           
											<?php foreach($terms as $key => $value) { ?>
												<option value="<?php echo esc_attr($value->slug); ?>"><?php echo esc_attr($value->name); ?></option>
											<?php } ?>
										</select>
									</span>

								<?php endif; ?> 						
										
									
							</div>

							<?php endif; ?>
							

							<input type="hidden" name="car_type_tax" value="<?php echo esc_attr($selected_tax); ?>">

							<div class="cta-button">
								<button class="yellow"><?php _e('Đặt ngay','autorent'); ?></button>
							</div>




						</form>

					</div>

					<?php endif; ?>

					<!-- End Book Section -->



					<!-- start buy section -->

					<?php if(isset($autorent_option_data['autorent_buytype_switch']) && $autorent_option_data['autorent_buytype_switch']): ?>


					<div class="tab-pane <?php echo esc_attr($buy_active); ?> fade" id="buy">

						<form action="#" class="reservation-form <?php echo esc_attr($bg_color); ?> default-form">


							<?php if($autorent_option_data['autorent_location_switch'] == 1) : ?>
							
							<div class="location reservation-step">
							
								<span class="step-number color-yellow">1</span>
								
								<?php if(!empty($autorent_option_data['autorent_location_chage_name'])): ?>
									<h4 class="step-title"><?php echo esc_attr($autorent_option_data['autorent_location_chage_name']); ?></h4>
								<?php else: ?>    
									<h4 class="step-title"><?php _e('Pick-up Location:','autorent'); ?></h4>
								<?php endif; ?>


								<?php 

									$selected_location = $autorent_option_data['autoren_search_location_select'];


									if($selected_location == 'city'){
										$placeholder = 'Select a city';
									}elseif($selected_location == 'state'){
										$placeholder = 'Select a state';
									}elseif($selected_location == 'airport'){
										$placeholder = 'Select a Airport';
									}
									

									$args = array(
										'orderby'           => 'name', 
										'order'             => 'ASC',
										'fields'      => 'all',       
									); 

									if(taxonomy_exists($selected_location)){
										$terms = get_terms($selected_location, $args);
									}
									
								?>

								
								<?php if(isset($terms) && !empty($terms)) : ?>     

									<span class="select-box" title="car-location">
										<select name="car_location" data-placeholder="- <?php echo esc_attr(_e($placeholder,'autorent')); ?> -">
											<option value=""><?php _e('- Select -','autorent'); ?></option>           
											<?php foreach($terms as $key => $value) { ?>
												<option value="<?php echo esc_attr($value->slug); ?>"><?php echo esc_attr($value->name); ?></option>
											<?php } ?>
										</select>
									</span>

								<?php endif; ?> 


								<input type="hidden" name="search_page" value="<?php echo esc_url(get_permalink($search_page)); ?>">

								<input type="hidden" name="location_tax" value="<?php echo esc_attr($selected_location); ?>">


							</div>

							<?php endif; ?>



							<?php if($autorent_option_data['autorent_car_type_search_switch'] == 1) : ?>

							<div class="car-type reservation-step">

								<span class="step-number color-yellow"><?php _e('2','autorent'); ?></span>

								<?php if(!empty($autorent_option_data['autorent_car_type_search_chage_name'])): ?>
									<h4 class="step-title"><?php echo esc_attr($autorent_option_data['autorent_car_type_search_chage_name']); ?></h4>
								<?php else: ?>    
									<h4 class="step-title"><?php _e('Choose Car Type:','autorent'); ?></h4>
								<?php endif; ?>


								<?php 

									$selected_tax = $autorent_option_data['autorent_car_type_search_select'];

									$args = array(
										'orderby'           => 'name', 
										'order'             => 'ASC',
										'fields'      => 'all',       
									); 

									if(taxonomy_exists($selected_tax)){
										$terms = get_terms($selected_tax, $args);
									}

									
								?>

								
								<?php if(isset($terms) && !empty($terms)) : ?>     

									<span class="select-box" title="car-type">
										<select name="car_type" data-placeholder="<?php _e('- Select -','autorent'); ?> ">
											<option value=""><?php _e('- Select -','autorent'); ?></option>           
											<?php foreach($terms as $key => $value) { ?>
												<option value="<?php echo esc_attr($value->slug); ?>"><?php echo esc_attr($value->name); ?></option>
											<?php } ?>
										</select>
									</span>

								<?php endif; ?> 						
										
									
							</div>

							<?php endif; ?>


							<input type="hidden" name="car_type_tax" value="<?php echo esc_attr($selected_tax); ?>">


							<div class="cta-button">
								<button class="yellow"><?php _e('Make reservation now','autorent'); ?></button>
							</div>


						</form>

					</div>

					<?php endif; ?>

					<!-- End buy section -->


				</div>
				<!-- End Tab-Content -->

	        </div> 


	    </div>


		<?php endif; ?>

      



		<!-- start shortcut section -->


		
		<?php if(isset($autorent_option_data['autorent_quick_search_switch']) && !empty($autorent_option_data['autorent_quick_search_switch'])) : ?>


		<?php 

			$selected_quick_tax = $autorent_option_data['autorent_quick_search_select_tax'];

			$args = array(
				'orderby'           => 'name', 
				'order'             => 'ASC',
				'fields'      => 'all',       
			); 

			if(taxonomy_exists($selected_quick_tax)){
				$terms = get_terms($selected_quick_tax, $args);
			}

			
		?>






	    <div class="col-lg-6 col-lg-offset-1 col-md-7 col-md-offset-0 col-sm-8 col-sm-offset-2">
			<ul class="short-cuts custom-list">


				<?php if(isset($terms) && !empty($terms)) : ?>     

			         
					<?php foreach($terms as $key => $value) { ?>


						<li>
							<a href="#">
								<div class="icon-left"><i class="fa fa-rocket fa-3x"></i></div>
								<span data-taxonomy="<?php echo esc_attr($selected_quick_tax); ?>"  data-search="<?php echo esc_url(get_permalink($search_page)); ?>" data-terms="<?php echo esc_attr($value->slug); ?>">Cars for <?php echo esc_attr($value->name); ?></span>
								<div class="icon-ahead"><i class="fa fa-long-arrow-right"></i></div>
							</a>						

						</li>

				
					<?php } ?>
			
				<?php endif; ?> 



				
				<!-- 
				<a href="#">
					<div class="icon-left"><i class="fa fa-credit-card fa-3x"></i></div>
					<span>Fidelity Card</span>
					<div class="icon-ahead"><i class="fa fa-long-arrow-right"></i></div>
				</a>
				</li> -->


			</ul>

			<?php if(isset($autorent_option_data['autorent_intro_switch']) && !empty($autorent_option_data['autorent_intro_switch'])) : ?>

	        <div class="intro-text">
				<h1 class="main-title"><?php echo esc_attr($autorent_option_data['autorent_intro_title_text']); ?></h1>
				<h5><?php echo esc_attr($autorent_option_data['autorent_intro_subtitle_text']); ?></h5>
	        </div>

	    	<?php endif; ?>

	    </div>

		<?php endif; ?>





	    <!-- End shortcut section -->



    </div>


</div>

<?php endif; ?>
<!-- End Intro -->