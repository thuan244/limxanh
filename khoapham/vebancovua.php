<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> -->
	<style>
		.content{
			width: 160px;
			height: 160px;
			display: block;
		}
		.col-black{
			background: black;
			width: 20px;
			height: 20px;
			float: left;
			
		}
		.col-white{
			background: white;
			width: 20px;
			height: 20px;
			float: left;
		}

	</style>
</head>
<body>
    <div class="content">
        <?php 
			for ($i = 1; $i<= 8; $i++) {
				for ($j = 1; $j<=8; $j++){
					if( ($i+$j) % 2 ==0 ){
						echo '<div class="col-white"></div>';
					}
					else{
						echo '<div class="col-black"></div>';
					}
				}

			}
		?>
    </div>
</body>
</html>