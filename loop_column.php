<?php
$array = array();
for ($i = 0; $i < 20; $i++) {
    array_push($array, 'Data-' . $i);
}
var_dump($array);

$maxRows = 3;
$columns = 3;
$totalLen = count($array);
$totalPage = ceil($totalLen / ($maxRows * $columns));

for ($p = 0; $p < $totalPage; $p++) {
	$lastIndex = 0;
    for ($i = 0; $i < $maxRows; $i++) {
		/*******/		
		for($e=0;$e<$columns;$e++){
			$index = $p * $maxRows * $columns + $i;
			if($e==0){
				if(isset($array[$index])){
					echo $array[$index];
					$lastIndex = $lastIndex > $index ? $lastIndex : $index;
				} else break 2;					
			} else {
				if(isset($array[$index + $e*$maxRows])){
					echo '|' . $array[$index + $e*$maxRows];
					$lastIndex = $lastIndex > $index + $e*$maxRows ? $lastIndex : $index + $e*$maxRows;
				}				
			}
		}
		echo '<br>';
    }
    $indexStart = $p*$maxRows * $columns+1;
    $indexEnd = $lastIndex+1;
    echo "since {$indexStart} - {$indexEnd} <br>";
    echo '<hr>';
}
