<?php
	$a = 4;
	$b = 5;
	$arr = [3,5,7];
	for ( $i = 0; $i < count($arr); $i++){
		echo ($arr[$i]);
		echo '<br>';
	};
	
	$arr2 = array(
		'name1' => 'PHP',
		'name2' => 'JS',
		'name3' => 'MySQL',
		'name4'	=> 'Angular'
	);
	foreach ( $arr2 as $key => $value ){
		echo $key . '->' . $value;
		echo '<br>';
	}
	
	$arg3 = array(
		'name1' => 'PHP',
		'name2' => 'JS',
		'name3' => 'Angula',
		1	=> array(1,2,3,4,5),
	);
	print_r($arg3);
	echo '<br>';
	echo $arg3['name1'][1];
	$arr4 = [4,6,$arg3];
	echo '<pre>';
	print_r($arr4);
	echo $arr4[2][1][4];
?>
