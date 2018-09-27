<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

?>
<?php global $product;?>
<section>
	<div class="container">
		<div class="row">		
			<div class="col-sm-8 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="row">
						<div class="col-sm-6">
							<div class="view-product">
								<?php
									$image = wp_get_attachment_image_src(get_post_thumbnail_id($loop->post->ID), 'single-post-thumbnail');
								?>
								<img src="<?=$image[0]?>" alt="<?=the_title();?>" title="the_title();">
								<!-- <h3>ZOOM</h3> -->
							</div>
						</div>
						<div class="col-sm-6">
							<div class="product-information"><!--/product-information-->
								<!-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> -->
								<h2><?=the_title();?></h2>
								<p>Mã sản phẩm: <?php echo $product->get_sku(); ?></p>
								<!-- <img src="images/product-details/rating.png" alt="" /> -->
								<span>
									<span><?php echo $product->get_price(); ?></span>										
									<form method="post" class="form-inline cart" enctype="multipart/form-data">
									 	<div class="form-group">
										   	<label for="exampleInputName2"><b>Số lượng:</b></label>
										   	<div class="custom custom-btn-number form-control">
										     	<input type="text" pattern="[0-9]*" class="input-text qty" id="qty" min="1" title="SL" max="100" max inputmode="numeric" value="1" maxlength="3" name="quantity" onkeyup="valid(this,&#39;numbers&#39;)" onblur="valid(this,&#39;numbers&#39;)">
										     	<button onclick="var result = document.getElementById(&#39;qty&#39;); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count2" type="button"><i class="fa fa-plus"></i></button>
										     	<button onclick="var result = document.getElementById(&#39;qty&#39;); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items-count2" type="button"><i class="fa fa-minus"></i></button>
										   	</div>
										   	<button type="submit" name="add-to-cart" value="<?php echo get_the_id();?>" class="btn btn-lg btn-style btn-cart add_to_cart" title="Cho vào giỏ hàng">Cho vào giỏ hàng</button>
									  	</div>
									</form>
								</span>
								<p><b>Tình trạng:</b> <?php echo $stock = str_replace( array('instock', 'outofstock'), array('Còn hàng', 'Hết hàng'),$product->get_stock_status()) ?></p>
							</div><!--/product-information-->
						</div>
					</div>
				</div><!--/product-details-->
				
				<div class="category-tab shop-details-tab"><!--category-tab-->
					<?=the_content();?>
				</div><!--/category-tab-->					
			</div>
			<div class="col-sm-4">
				<div class="right-sidebar">
					
				</div>
			</div>
		</div>
	</div>
</section>