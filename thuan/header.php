<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Limxanh
 * @since Limxanh 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->
<html <?php language_attributes(); ?>>
<head >
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=bloginfo('description')?>">
    <meta name="author" content="">
    <title><?php bloginfo('name'); ?> - <?php is_home() ? bloginfo('description') : wp_title() ?></title>
    <link href="<?=get_template_directory_uri();?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=get_template_directory_uri();?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=get_template_directory_uri();?>/assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?=get_template_directory_uri();?>/assets/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?=get_template_directory_uri();?>/assets/css/style.css" rel="stylesheet">   
    <link rel="shortcut icon" href="<?=get_template_directory_uri();?>images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=get_template_directory_uri();?>/assets/images/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=get_template_directory_uri();?>/assets/images/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=get_template_directory_uri();?>/assets/images/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=get_template_directory_uri();?>/assets/images/apple-touch-icon-57-precomposed.png">
    <?php wp_head()?>
</head><!--/head-->

<body <?php body_class(); ?>>
<header>
	<div id="logo" class="logo">
		<div class="col-md-12">
			<div class="container">
				<div class="row">
					<div class="left-content col-md-4 d-none d-md-block"></div>
					<div class="center-content col-md-4">
						<?php 
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							if ( has_custom_logo() ) 
							{
							    ?>
								<a href="<?=get_bloginfo('url');?>"><img src="<?=esc_url( $logo[0] ) ?>"></a>
							    <?php
							} 
							else 
							{
						        if ( is_home() ) 
						        {
						          	printf(
							            '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
							            get_bloginfo( 'url' ),
							            get_bloginfo( 'description' ),
							            get_bloginfo( 'sitename' )
						          	);
						        } 
						        else 
						        {
						          	printf(
							            '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
							            get_bloginfo( 'url' ),
							            get_bloginfo( 'description' ),
							            get_bloginfo( 'sitename' )
						          	);
						        }
							}
						?>
					</div>
					<div class="right-content col-md-4">
						<div class="wr-search">
							<div class="search">
							  <div class="field-input">
							    <?php get_search_form();?>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="menu">
		<div class="menu">
			<div class="container">
				<div class="row">
					<div class="main-menu col-md-8">
						<div class="menu-bar-icon d-block d-md-none">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</div>
						<?php 
							if ( has_nav_menu( 'primary' ) ) {
							    wp_nav_menu( 
							    	array(
							    		'theme_location' => 'primary',
							    		'container_class'=> 'menu-wr',
							    		'menu_class'	 =>	'main-navigation'
							    	)
								);
							}
						?>
						
					</div>
					<div id="topcartlink" class="cart-header col-md-4">
						<div class="header-mini-cart">
						  	<a href="/cart" class="ico-cart dropdown-toggle minicart-anchor" data-hover="dropdown">
						    	<span class="cart-label"><i class="fa fa-shopping-cart"></i> Giỏ hàng</span>
						    	<span class="cart-qty">(<?=WC()->cart->get_cart_contents_count();?>)</span>
						  	</a>
						</div>
					  	<div class="minicart-dropdown-menu">
						  	<div class="count">
							    <a href="<?php echo wc_get_cart_url(); ?>" class="items">
									Có <?=WC()->cart->get_cart_contents_count();?> sản phẩm trong giỏ hàng.
							    </a>  
						   	</div>
						   	<div class="items ">
								<?php
									global $woocommerce;
									$items = $woocommerce->cart->get_cart();
									$totalcart;
									$haveitems = 0;
									foreach($items as $item => $values) { 
										$_product = apply_filters( 'woocommerce_cart_item_product', $values['data'], $values, $item );
										if ( $_product && $_product->exists() && $values['quantity'] > 0){
											$haveitems = 1;
											$_product = wc_get_product( $values['data']->get_id() );
											$linkpro= get_permalink( $values['product_id'] );
											$titlepro= $_product->get_title();
											$getProductDetail = wc_get_product( $values['product_id'] );
											$imgpro = $getProductDetail->get_image(array(80,80));
											$pricepro = get_post_meta($values['product_id'] , '_price', true);
											$quantitypro = $values['quantity'];
								?>
							   	<div class="item first row">
							      	<div class="col-md-4">
							         	<div class="picture">
							           	<a href="<?php echo $linkpro; ?>" title="<?php echo $titlepro; ?>">
							              	<?php echo $imgpro; ?>
							           	</a>
							         	</div>
							      	</div>
							      	<div class="col-md-8">
								        <div class="product">
								          	<h3 class="name">
								             	<a href="<?php echo $linkpro; ?>"><?php echo $titlepro; ?></a>
								          	</h3>
								          	<div class="price">Giá sản phẩm: <span><?php echo number_format($pricepro, 0, ',', '.'); ?> đ</span></div>
								          	<div class="quantity">Số lượng: <span><?php echo $quantitypro; ?></span></div>
								        </div>
							      	</div>
							    </div>
							    <?php 
							    		}
							  		}
							 	?>
						   	</div>
						 
						    <div class="totals">Tổng: <strong><?php echo WC()->cart->get_cart_subtotal(); ?></strong></div>
						    <div class="go-to-cart-button text-center">
						      	<a class="btn" href="<?php echo wc_get_cart_url(); ?>">Vào giỏ hàng</a>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>