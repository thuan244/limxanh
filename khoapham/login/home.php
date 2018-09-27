<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bt3.css">
</head>
<body>
	<?php
	include "arrSP.php";
	session_start();
	?>
	
	<div class="content container">
		<div class="heading">
			<div class="login-section text-right">
				<?php
					header('Location: login.php');
				?>
			</div>
			<div class="cart-section text-right row">
				<div class="cart-btn mb-4 col-md-12"><a href="cart.php" class="d-inline-block btn btn-default btn-primary" target="_blank">Giỏ hàng</a>
				<div class="cart-info col-md-3 offset-md-9">
					<?php
						if(isset($_COOKIE['productIDS'])){
							?>
							<p class="text-left">Sản phẩm trong giỏ hàng:</p>
							
							<?php
							// $productID = $_SESSION['productID'];
							$product_ids = explode(',', $_COOKIE['productIDS']);
							foreach ($product_ids as $product_id){
								foreach ($arrSP as $sp){
					                if ($sp['id'] == $product_id){
					                    ?>
					                    <div class="row">
					                    	<div class="col-md-4 image">
					                    		<img src="<?php echo $sp['image']?>" alt="">
					                    	</div>
					                    	<div class="col-md-8 info">
					                    		<p><?=$sp['name']?></p>
					                    		<p>Giá: <?=number_format($sp['price'],2,',','.')?>đ</p>
					                    	</div>
					                    </div>
					                    
					                    <?php
					                }
					            }
							}
							
						}
						else{
							?>
							<p>Chưa có sản phẩm trong giỏ</p>
							<?php
						}
					?>
				</div>
			</div>
		</div>
		<div class="product-list row">
        <?php 
        foreach($arrSP as $sp):
        ?>
            <div class="item col-md-6">
                <div class="image">
                    <img src="<?php echo $sp['image']?>">
                </div>
                <div class="info">
                    <div class="name"><?=$sp['name']?></div>
                    <p>Nhắn tin 5.000đ xác nhận mua hàng</p>
                    <p class="promotion">Khuyến mãi</p> 
                    <p>Nhận sản phẩm trong 48h</p> 
                    <p>Không áp dụng chuyển hàng</p>
                </div>
                <div class="price"><?=number_format($sp['price'],2,',','.')?> vnd</div>
                <form action="xulygiohang.php" method="post">
                	<input type="text" value="<?=$sp['id']?>" name="productID" hidden>
                	<button type="submit" class="btn btn-default btn-primary float-right mb-4">Thêm vào giỏ</button>
                </form>
            </div>
        <?php
        endforeach
        ?>
        </div>
    </div>
</body>
</html>