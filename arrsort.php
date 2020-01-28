<?php
$a = array(-5,24,6,8,99,547,2,6,7,996,4);
function findMaxMin($arr){
	 $max =0;
	 $min = 0;
for($i =0;$i<count($arr);$i++){
			if($i==0){
				$max = $arr[0];
				$min = $max;
				continue;
			}
			if($max<$arr[$i]){
				$max = $arr[$i];
			}
			if($min>$arr[$i]){
				$min = $arr[$i];
			}
	} 	
	echo $max ." maximum<br>" . $min . " minimum";
}
findMaxMin($a);
