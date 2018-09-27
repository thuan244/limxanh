<?php
$image = $_FILES['image'];
echo '<pre>';
// print_r($image);
$arrs = [];
$file_count = count($image['name']);
$file_key = array_keys($image);

for ($i = 0; $i< $file_count; $i++){
	foreach ( $file_key as $key ){
		$arrs[$i][$key] = $image[$key][$i];
	}
}
print_r($arrs);
foreach ( $arrs as $arr ) {
	if ($arr['error'] <= 0) {
		if ( $arr['size'] < 1024*1024 ){
			$oldName = $arr['name'];
    		$ext = pathinfo($oldName,PATHINFO_EXTENSION);
    		$arrExt = ['png', 'jpg', 'gif', 'jpeg','txt'];

			if ( in_array($ext, $arrExt ) ){
				$newName = date('Y-m-d-H-i-s-',time()).$oldName;
				
				$des = 'avatar/'.$newName;
				move_uploaded_file($arr['tmp_name'],$des);
				if(file_exists("avatar/$newName")){
		            echo "Sucess upload: $newName<br>";
		        }
		        else echo 'Upload Fail!';
			}
			else{
				echo 'File type is not allowed';
			}
		}
		else{
			echo 'File too large';
		}
	}
	else{
		echo 'Error!';
	}
}
?>