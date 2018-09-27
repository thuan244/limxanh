<div id="home-blog"class="home-blog">
	<div class="container">
		<div class="row detail-wr-2">
			<?php
				$categories = get_categories( array(
				    'orderby' => 'name',
				    'order'   => 'ASC',
				    'hide_empty' => 1,
				    'number'	=> 4
				) );
				foreach($categories as $category){
					$catLink = get_category_link( $category->term_id );
					$catImage = get_field('category_thumbnail', 'term_'. $category->term_id);
					$catDescription = category_description( $category->term_id );
				?>
				<div class="col-md-3 item-post">
					<figure>
						<img src="<?=$catImage?>">
					</figure>
					<p class="blog-title">
						<?=$catDescription?>
					</p>
					
					<p class="name-post">
						<?=$category->name;?>
					</p>
					<div class="view-more">
						<a href="<?=$catLink?>">Xem chi tiết</a>
					</div>
				</div>
				<?php
				}
			?>
		</div>
	</div>
</div>