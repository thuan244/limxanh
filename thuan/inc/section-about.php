<?php
	$page = get_page_by_title( 'Giới thiệu chúng tôi' );
	if ( $page ){
		?>
			<div id="about-us-home" class="about-us-home">
				<div class="container">
					<div class="row detail-wr-1">
						<div class="col-md-6 pg-r-0">
							<div class="title">
								<h3><span><img src="<?=get_template_directory_uri();?>/assets/images/index-11.png" alt=""></span><?=$page->post_title;?><span><img src="<?=get_template_directory_uri();?>/assets/images/index-12.png" alt=""></span></h3>
							</div>
							<div class="detail">
								<p><?=$page->post_content;?></p>
							</div>
						</div>
						<div class="col-md-6 content-right">
							<?=get_the_post_thumbnail( $page->ID );?>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
?>