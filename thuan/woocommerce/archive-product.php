<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<div class="archive-product container mt-5"><!--features_items-->
	<h2 class="title text-center text-uppercase">Sản phẩm</h2>
	<div class="row">
		<?php
			if(have_posts()): while (have_posts()): the_post(); global $product;
		?>
		<div class="col-sm-4 mb-3">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<a href="<?=the_permalink();?>">
							<?php 
								the_post_thumbnail('shop_catalog', array("title"=> get_the_title(),"alt"=>get_the_title(), "title"=>get_the_title()));
							?>
						</a>
						<p class="mb-0"><?=number_format($product->price, 0, ',', '.')?>đ</p>
						<h2 class="pri-color font-24"><?=the_title()?></h2>
						<a href="?add-to-cart=<?=$product->get_id();?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
					</div>
				</div>
			</div>
		</div>
		<?php 
				endwhile;
				if (function_exists('wp_corenavi')) 
				{ ?>
				<div class="limxanh-pagination text-right"><?php wp_corenavi($the_query);?>
					
				</div>
				<?php
					}
                else echo '<div class="col-md-12 text-center">No post found.</div>';
			endif;
		?>
	</div>
	
</div><!--features_items-->
<?php
get_footer();
