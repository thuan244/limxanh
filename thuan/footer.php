	<?php
		$footer = get_page_by_title( 'Footer' );
		if($footer){
			$tru_so = get_field('tru_so', $footer->ID);
			$so_dien_thoai = get_field('so_dien_thoai', $footer->ID);
			$hotline = get_field('hotline', $footer->ID);
			$chinh_sach_mua_hang = get_field('chinh_sach_mua_hang', $footer->ID);
			$cskh = get_field('cham_soc_khach_hang', $footer->ID);
			$cskhName = get_sub_field('tu_van_vien', $footer->ID);
			$cskhNumber = get_sub_field('so_dien_thoai_tu_van', $footer->ID);
		}
	?>
	<footer id="footer" class="footer"><!--Footer-->
		<div class="container footer-content">
			<div class="row">
				<div class="col-md-4 left">
					<h3>Thông tin liên hệ</h3>
					<ul>
   						<li>
   							<p>
								<span>
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									Trụ sở:
								</span><br>
								<span>
									<strong><?=$tru_so?></strong>
								</span>
							</p>
						</li>
						 <li>
   							<p>
								<span>
									<i class="fa fa-phone" aria-hidden="true"></i>
									Số điện thoại:
								</span><br>
								<span>
									 
									<strong><a href="tel:<?=str_replace('.', '', $so_dien_thoai);?>" class="text-dark"><?=$so_dien_thoai?></a></strong>
								</span>
							</p>
						</li>
   						<li>
   							<p>
								<span>
									<i class="fa fa-mobile" aria-hidden="true"></i>
									Hotline:
								</span><br>
								<span>
									 
									<strong><a href="tel:<?=str_replace('.', '', $hotline);?>" class="text-dark"><?=$hotline?></a></strong>
								</span>
							</p>
						</li>
					</ul>
				</div>
				<div class="col-md-4 center">
					<h3>Chính sách mua hàng</h3>
					<p>
						<?=$chinh_sach_mua_hang?>
					</p>
				</div>
				<div class="col-md-4 right">
					<h3>Chăm sóc khách hàng</h3>
					<?php
						if ($cskh){
							while(has_sub_field('cham_soc_khach_hang', $footer->ID)):
							?>
							<p><?=the_sub_field('tu_van_vien', $footer->ID);?><br> <strong><a href="tel:<?=str_replace('.', '', the_sub_field('so_dien_thoai_tu_van', $footer->ID));?>" class="text-white"><?=the_sub_field('so_dien_thoai_tu_van', $footer->ID);?></a></strong></p>
							<?php
							endwhile;
						}
					?>
				</div>
			</div>
		</div>
		<div class="line-copy">
			<div class="container">
				<div class="row">
					<div class="col-md-8 left">
						<p class="text-uppercase">Copyright &copy;<?=date('Y')?> - <a href="<?=site_url();?>" class="text-uppercase text-white"><?=bloginfo('name')?> - <?=bloginfo('description')?></a></p>
					</div>
					<div class="col-md-4 right">
						<p>
							<span class="hvr-pulse">
								<img src="<?=get_template_directory_uri();?>/assets/images/icon-phone.png" alt="">
							</span>
							<span>
								Hot line:<br>
								<strong><a href="tel:<?=str_replace('.', '', $hotline);?>" class="text-white"><?=$hotline?></a></strong>
							</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
	<script src="<?=get_template_directory_uri();?>/assets/js/jquery.js"></script>
	<script src="<?=get_template_directory_uri();?>/assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?=get_template_directory_uri();?>/assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".menu-bar-icon").click(function(){
				$(this).next().toggleClass("heightauto");	
			});
			$('.field-input span').click(function(){
				$('.field-input #search-submit').trigger('click');
			});
			$('.slide-wrapper').owlCarousel({
			    loop:false,
			    margin:10,
				items:1,
				nav: true,
			})
		});
	</script>
    <?php wp_footer(); ?>
</body>
</html>