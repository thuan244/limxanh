<?php get_header();?>
	<div class="post-wrap" id="post-<?=$post->ID;?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="container mt-5">
					<div class="row">
						<div class="main-entry col-md-8">
							<?php
							while ( have_posts() ) :
								the_post();
								?>
								<div class="entry-header">
									<h1 class="entry-title">
										<?=the_title();?>
									</h1>
									<div class="entry-meta mb-3">
										<span class="post-date">Đã đăng: <?=the_date();?> </span>
										<span class="post-author">bởi: <?=get_the_author();?>.</span>
										<span class="post-category">Danh mục: 
											<?php
												$categories = get_the_terms( $post->ID, 'category' );
												foreach( $categories as $category ) {
													$cateUrl = get_category_link($category);
													?>
												    <a href="<?php echo esc_url( $cateUrl ); ?>" title="<?=$category->name?>"><?=$category->name?>,</a>
												    <?php
												}
											?>
										</span>
									</div>
									<div class="entry-thumbnail mb-3">
										<?php
											if(has_post_thumbnail()){
												the_post_thumbnail();
											}
										?>
									</div>
								</div>
								<div class="entry-main">
									<?=the_content();?>
								</div>
								<?php
							endwhile; // End of the loop.
							?>
							<div class="post-tags mb-5">
								
							<?php 
								// GET TAGS BY POST_ID
							 	$tags = get_the_tags($post->ID);
							 	if( $tags ) {
							 		echo "<span>Tag:</span>";
							 		foreach($tags as $tag) : 
							      		?>
								        	<a class="post-tag-item" href="<?php bloginfo('url');?>/tag/<?php print_r($tag->slug);?>">
								                <?php print_r($tag->name); ?>,
								         	</a>
								      	<?php 
							  		endforeach;
							 	}
						      	
							?>
							</div>
						</div>
						<div class="sidebar col-md-4">
							<h3 class="sidebar-title">Sản phẩm đề xuất</h3>
							<div class="row">
								<?php
									$args = array(
										'posts_per_page' => 6,
										'post_type' => 'product',
										'orderby'	=>	'date',
										'order'		=>	'DESC'
									);
									$singleRelateProduct = new WP_Query($args);
									if( $singleRelateProduct->have_posts()): while ( $singleRelateProduct-> have_posts()): $singleRelateProduct->the_post(); global $product;
								?>
								<div class="product-item col-sm-6 mb-2 pb-3 pt-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<a href="<?=the_permalink();?>">
													<?php 
														the_post_thumbnail('home-product', array("title"=> get_the_title(),"alt"=>get_the_title(), "title"=>get_the_title()));
													?>
												</a>
												<p class="mb-0"><?=number_format($product->price, 0, ',', '.')?>đ</p>
												<h2><a href="<?=the_permalink()?>"><?=the_title()?></a></h2>
												<a href="?add-to-cart=<?=$product->get_id();?>" title="Thêm vào giỏ" class="btn btn-default add-to-cart d-inline-block"><i class="fa fa-shopping-cart"></i></a>
												<a href="<?=the_permalink()?>" title="Xem chi tiết" class="btn btn-default view-detail d-inline-block"><i class="fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div>
								<?php 
										endwhile;
									endif;
								?>
							</div>
						</div>
					</div>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .wrap -->
<?php get_footer();?>