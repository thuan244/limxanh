<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Limxanh
 * @since Limxanh 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="page-wrap" id="page-<?=$post->ID?>">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container mt-5 mb-5">
				<header class="page-header">
					<h2>
			  			<?=the_title();?>
			  		</h2>
				</header>
				<div class="archive-wrapper">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<?php
				  		if (has_post_thumbnail()){
				  			the_post_thumbnail();
				  		}
				  	?>
				  	<div class="page-body mt-3">
				  		
				    	<?=the_content();?>
				    	
				  	</div>
					<?php
				endwhile;
				?>
				</div>
			</div>
			

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();?>
