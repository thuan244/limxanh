<?php get_header();?>
	<section class="archive mt-5">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header>
				<div class="archive-wrapper row">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<div class="post-item col-sm-4 mb-4">
						<div class="card">
							<a href="<?=the_permalink();?>">
							  	<?php
							  		if (has_post_thumbnail()){
							  			the_post_thumbnail('home-product');
							  		}
							  	?>
							</a>
						  	<div class="card-body">
						  		<h3>
						  			<a href="<?=the_permalink();?>" class="pri-color font-24">
						  				<?=the_title();?>
						  			</a>
						  		</h3>
						    	<?=the_excerpt();?>
						    	<a href="<?=the_permalink();?>" class="btn btn-default">Xem chi tiết &raquo;</a>
						  	</div>
						</div>
					</div>
					<?php
				endwhile;
				if (function_exists('wp_corenavi')) : 
					?>
					<div class="fractal-pagination col-12 mb-5 text-right">
						<?php wp_corenavi($the_query);?>
					</div>
					<?php endif;
				?>
				</div>
				<?php
			else :
				?>
				<div class="text-center">
					Chưa có bài viết nào.
				</div>
				<?php

			endif;
		?>
		</div>
	</section>
<?php get_footer();?>