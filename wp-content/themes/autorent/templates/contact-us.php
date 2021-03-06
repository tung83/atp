<?php  
/**
 * Template Name: Contact-Us
 *
 */
get_header();

?>


<?php 

	$args = array(

			'post_type' => 'company_location',
			'show_per_page' => -1

		);

	$all_locations = get_posts( $args );

?>	


<!-- Start Contact-Form -->
<div class="container">
    
    <iframe style="height:523px !important;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d244.9023162692545!2d106.77252827454886!3d10.854324499292186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752775b9cb3643%3A0xc5a2118bc943ec5f!2zMzYgSG_DoG5nIERp4buHdSAyLCBMaW5oIENoaeG7g3UsIFRo4bunIMSQ4bupYywgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1506956590524" width="620" height="650" frameborder="0" style="border:0" allowfullscreen></iframe>
    
	<div class="contact-box">
		<form id = "send_mail_to_office" class="contact-form dark-skin default-form">
			<div class="heading light">
				<h4 class="title"><?php _e('Gửi tin nhắn','autorent'); ?></h4>
				<span><i class="fa fa-car"></i></span>
			</div>


			<div class="row">


				<?php if(isset($all_locations) && !empty($all_locations)) :  ?>

				<div class="col-lg-12">
					<span class="select-box" title="car-type">
						<select name="email_to" data-placeholder="<?php _e('- Select -','autorent'); ?> ">


							<?php foreach($all_locations as $agecy_key => $agency_value){ ?>	

								<?php $company_loc = get_post_meta($agency_value->ID,'_autorent_company_location_place',true);  ?>


								<?php $agency_email = get_post_meta($agency_value->ID,'_autorent_company_location_email',true);  ?>
								
								<?php if(!empty($agency_email)): ?>
									<?php foreach($agency_email as $email_key => $email_value){ ?>

										<option value="<?php echo esc_attr($email_value); ?>"><?php echo esc_attr($company_loc); ?></option>
										
									<?php } ?>	
								<?php endif; ?>


							<?php } ?>

						</select>
					</span>
				</div>

				<?php endif; ?>



				<div class="col-lg-6 col-md-6">
					<input type="text" class="required" name="name" placeholder="<?php _e('Họ và tên','autorent'); ?>">
				</div>
				<div class="col-lg-6 col-md-6">
					<input class="required" name="phone"  type="text" placeholder="<?php _e('Số điện thoại','autorent'); ?>">
				</div>
				<div class="col-lg-6 col-md-6">
					<input type="text" class="required" name="email" placeholder="<?php _e('Email','autorent'); ?>">
				</div>
				<div class="col-lg-6 col-md-6">
					<input type="text" class="required" name="topics"  placeholder="<?php _e('Yêu cầu','autorent'); ?>">
				</div>
				<div class="col-lg-12">
					<textarea name="message" placeholder="<?php _e('Nội dung','autorent'); ?>"></textarea>
				</div>
				<div class="col-lg-12 text-center">
					<button  class="btn yellow"><?php _e('Gửi','autorent'); ?></button>
				</div>

				<div class="col-lg-12 send-mail-success">
					<h5 class="success-msg"> <?php _e( 'Message send successfully !', 'concierge' ); ?></h5>
				</div> 


			</div>
		</form>
	</div>
</div>
<!-- End Contact-Form -->



  
<!-- Start Contact-Map  
<div id="contact-map">

  
</div>
<!-- End Contact-Map -->




<!-- Start Contact -->

<?php if(isset($all_locations) && !empty($all_locations)) :  ?>
				
<section class="contact">
	<div class="container">
		<div class="locations">

            

			<?php foreach($all_locations as $agecy_key => $agency_value){ ?>	

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="offices">

					<?php $company_loc = get_post_meta($agency_value->ID,'_autorent_company_location_place',true);  ?>

					<?php if(isset($company_loc) && !empty($company_loc)): ?>	
						<h3 class="title"><?php echo esc_attr($company_loc); ?></h3>
					<?php endif; ?>
					
					<h5 class="sub-title"><?php _e('Office','autorent'); ?></h5>


					<div class="row">


						<?php $agency_field = get_post_meta($agency_value->ID,'_autorent_company_location_field_1',true);  ?>


						<?php if(!empty($agency_field)): ?>

						<div class="col-lg-6 col-md-6">

							<ul class="location-details custom-list">					
								
								<?php foreach($agency_field as $field_key => $field_value){ ?>	
									<li><?php echo esc_attr($field_value); ?></li>
								<?php } ?>

							</ul>

						</div>

						<?php endif; ?>



						<div class="col-lg-6 col-md-6">

							<ul class="location-details custom-list">
									
								<?php $agency_phone = get_post_meta($agency_value->ID,'_autorent_company_location_phone',true);  ?>
								
								<?php if(!empty($agency_phone)): ?>	
									<?php foreach($agency_phone as $phone_key => $phone_value){ ?>	
										<li><?php echo esc_attr('Phone '.intval($phone_key+1).' :&nbsp; '); ?><?php echo esc_attr($phone_value); ?></li>
									<?php } ?>
								<?php endif; ?>

								
								<?php $agency_fax = get_post_meta($agency_value->ID,'_autorent_company_location_fax',true);  ?>
								
								<?php if(!empty($agency_fax)): ?>
									<?php foreach($agency_fax as $fax_key => $fax_value){ ?>	
										<li><?php echo esc_attr('Fax '.intval($fax_key+1).' :&nbsp; '); ?><?php echo esc_attr($fax_value); ?></li>
									<?php } ?>	
								<?php endif; ?>

							</ul>
							
						</div>



						<?php $agency_field_2 = get_post_meta($agency_value->ID,'_autorent_company_location_field_2',true);  ?>

						<?php if(!empty($agency_field_2)): ?>

						<div class="col-lg-6 col-md-6">

							<ul class="location-details custom-list">					
								
								<?php foreach($agency_field_2 as $field_key => $field_value){ ?>	
									<li><?php echo esc_attr($field_value); ?></li>
								<?php } ?>

							</ul>

						</div>

						<?php endif; ?>


						<div class="col-lg-6 col-md-6">

							<ul class="location-details custom-list">
								
								<?php $agency_email = get_post_meta($agency_value->ID,'_autorent_company_location_email',true);  ?>
								<?php if(!empty($agency_email)): ?>
									<?php foreach($agency_email as $email_key => $email_value){ ?>	
										<li><?php echo esc_attr('Email '.intval($email_key+1).' :&nbsp; '); ?><?php echo esc_attr($email_value); ?></li>
									<?php } ?>	
								<?php endif; ?>
								
								<?php $agency_website = get_post_meta($agency_value->ID,'_autorent_company_location_website',true);  ?>
								<?php if(!empty($agency_website)): ?>
								<?php foreach($agency_website as $website_key => $website_value){ ?>	
									<li><?php echo esc_attr('Website '.intval($website_key+1).' :&nbsp; '); ?><?php echo esc_attr($website_value); ?></li>
								<?php } ?>	
								<?php endif; ?>

							</ul>

						</div>



					</div>
				</div>
			</div>

			<?php } ?>




		</div>

	</div>

</section>

<?php endif; ?>
  <!-- End Contact -->




<!-- Start Partners -->
<?php get_template_part( 'templates/autorent', 'rental_experience'); ?>  
<!-- End Partners --> 



<?php get_footer();   ?>
	