<?php
	$args = array (
	    'post_type'              => 'post',
	    'category_name'          => 'Hệ thống mua hàng',
	    'posts_per_page'         => '4',
	    'order'                  => 'DESC',
	    'orderby'                => 'date',
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ){
		?>
		<div id="system-product" class="system-product">
			<div class="container">
				<div class="title">
					<h3><span><img src="<?=get_template_directory_uri();?>/assets/images/index-11.png" alt=""></span>hệ thống mua hàng<span><img src="<?=get_template_directory_uri();?>/assets/images/index-12.png" alt=""></span></h3>
				</div>
				<div class="row item-local">
		<?php
		while ( $query->have_posts() ) : $query->the_post();
			?>
				<div class="col-md-3 item">
					<div class="local-title">
						<a href="<?=the_permalink();?>">
							<figure>
								<?php
									if (has_post_thumbnail()){
										the_post_thumbnail('home-thumbnail');
									}
									else{
										?>
										<img src="<?=get_template_directory_uri();?>/screenshot.jpg" alt="<?=the_title()?>" title="<?=the_title();?>">
										<?php
									}
								?>
							</figure>
							<p><?=the_excerpt();?></p>
						</a>
					</div>
					<div class="local-name">
						<?=the_title();?>
					</div>
				</div>
			<?php
		endwhile;
		wp_reset_postdata();
		?>
				</div>
			</div>
		</div>
		<?php
	}
	
?>
