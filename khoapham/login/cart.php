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
    <div class="container">
	<?php
        include "arrSP.php";
        session_start();
        if(isset($_COOKIE['productIDS'])){
            ?>
            <p class="text-left">Sản phẩm trong giỏ hàng:</p>
            <div class="item row">
                <div class="col-md-7">
                    <p>Sản phẩm</p>
                </div>
                <div class="col-md-5">
                    Số lượng
                </div>
            </div>
            <?php
            // $productID = $_SESSION['productID'];
            $product_ids = explode(',', $_COOKIE['productIDS']);
            foreach ($product_ids as $product_id){
                foreach ($arrSP as $sp){
                    if ($sp['id'] == $product_id){
                        ?>
                        <div class="item row">
                            <div class="col-md-1 image">
                                <img src="<?php echo $sp['image']?>" alt="">
                            </div>
                            <div class="col-md-6 info">
                                <p><?=$sp['name']?></p>
                                <p>Giá: <?=number_format($sp['price'],2,',','.')?>đ</p>
                            </div>
                            <div class="col-md-5 qty">
                                <p>1</p>
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
</body>
</html>