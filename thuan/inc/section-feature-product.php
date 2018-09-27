<div id="featured" class="featured">
	<div class="container">
		<div class="title">
			<h3><span><img src="img/index-11.png" alt=""></span>Sản phẩm nổi bật<span><img src="img/index-12.png" alt=""></span></h3>
		</div>
		<div class="content">
			<div class="row">
				<?php
				   	$args2 = array(
					   'posts_per_page' => 3,
					   'tax_query' => array(
                            array(
                                'taxonomy' => 'product_visibility',
                                'field' => 'name',
                                'terms' => 'featured',
                                'operator' => 'IN'
                            ),
                        ),
					);
				   	$loop2 = new WP_Query( $args2 );
				   	while ( $loop2->have_posts() ) : $loop2->the_post(); global $product; 
				   		$regularPrice = $product->regular_price;
						$salePrice = $product->sale_price;
						$saleNumber = $regularPrice - $salePrice;
				   	?>
				   	<div class="col-md-4 product-item">
						<div class="hover">
							<div class="img-product">
								<a href="<?=the_permalink();?>">
									<?=the_post_thumbnail('home-product',array("title"=> get_the_title(), "alt"=> get_the_title(), "title" => get_the_title()))?>
								</a>
								<div class="product-category">
									<?php
										$product_cats_ids = wc_get_product_term_ids( $product->get_id(), 'product_cat' );
										foreach( $product_cats_ids as $cat_id ) {
										    $term = get_term_by( 'id', $cat_id, 'product_cat' );
										    $termUrl = get_term_link( $cat_id, 'product_cat' );
										    ?>
										    <a href="<?=$termUrl?>"><?=$term->name?></a>
										    <?php
										}
									?>
								</div>
							</div>
							<div class="detail">
								<h3 class="tit"><a href="<?=the_permalink()?>"><?=the_title();?></a></h3>
								<p class="price">Giá: <span><?=number_format($salePrice, 0, ',', '.')?></span>đ</p>
								<div class="btn-buy">
									<p class="btn-left hvr-sweep-to-left"><a href="<?=the_permalink()?>">Xem chi tiết</a></p>
									<p class="btn-right hvr-sweep-to-right"><a href="?add-to-cart=<?=$product->get_id();?>">Thêm vào giỏ</a></p>
								</div>
							</div>
							<div class="name-product">
								<p>Giảm: <span><?=number_format($saleNumber, 0, ',', '.')?>đ</span></p>
							</div>

							<div class="clear-both"></div>
						</div>
					</div>

				<?php 
				   endwhile;
				   wp_reset_query(); 
				?>
			</div>
		</div>
	</div>
</div>