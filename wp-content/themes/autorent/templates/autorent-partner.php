<?php 

	global $autorent_option_data;

?>


<!-- Start Clients -->

<?php if(isset($autorent_option_data['autorent-partners-switch']) && !empty($autorent_option_data['autorent-partners-switch'])) : ?>

	
	<?php if(isset($autorent_option_data['autorent-our-partners']) && !empty($autorent_option_data['autorent-our-partners'])){ ?>



		<section class="clients">
			<div class="container">
				<div class="clients-slider">	

					<?php foreach ($autorent_option_data['autorent-our-partners'] as $key => $value) { ?>

						<?php if(!empty($value['image'])){ ?>
							<div class="client">
								<a href="<?php echo esc_url($value['url']); ?>"><img src="<?php echo esc_url($value['image']); ?>" alt=""></a>
							</div>
						<?php } ?>

					<?php } ?>

				</div>
			</div>
		</section>


	<?php } ?>

<?php endif; ?>


<!-- End Clients -->
		