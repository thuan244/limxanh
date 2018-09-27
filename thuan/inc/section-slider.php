<div id="banner-header" class="banner-header">
	<div class="slide-wrapper owl-carousel owl-theme">
	<?php
		$args = array(
			'post_type'	=>	'slider',
			'posts_per_page'	=> -1,
			'orderby'	=>	'date',
			'order'		=>	'DESC',
		);
		$slider = new WP_Query( $args );
		if ( $slider -> have_posts() ){
			while ( $slider-> have_posts() ){
				$slider->the_post();
				$imagePC = get_field('image_on_pc');
				$imageMobile = get_field('image_on_mobile');
				?>
					<div class="content-center">
						<div class="banner-image d-none d-md-block">
							<img src="<?=$imagePC?>" alt="<?=the_title()?>" title="<?=the_title()?>">
						</div>
						<div class="banner-image d-block d-md-none">
							<img src="<?=$imageMobile?>" alt="<?=the_title()?>" title="<?=the_title()?>">
						</div>
						<div class="banner-content">
							<h3>
								<span><?=the_title();?></span>
							</h3>
							<?=the_content();?>
							<?php if(get_field('call_to_action_button')): ?>
							<div class="slider-button">
							<?php while(has_sub_field('call_to_action_button')): ?>
								<a href="<?=the_sub_field('button_link')?>"><?=the_sub_field('button_name')?></a>
							<?php endwhile; ?>
							</div>
						<?php endif; ?>
						</div>
						
					</div>
				<?php
			}
		}
	?>
	</div>
</div>