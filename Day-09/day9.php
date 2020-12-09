<?php
$fn = fopen("day9.txt", "r");
$lines = [];
while (! feof($fn)) {
    $result = fgets($fn);
    $lines[] = intval($result);
}

$preamble = 25;
for($i=0; $i<count($lines); $i++) {   
    if($i < $preamble) {
        $pre_array[] = $lines[$i];
        continue;
    }

    // first time we reach this there should be 5 in the array
    $currentnum = $lines[$i];
    

    if(findCombos($pre_array, $currentnum)) {
    } else {
        die("COMBO NOT FOUND: $currentnum");
    }
    
    // add current to the array 
    $pre_array[] = $lines[$i];
    
    //remove the first one
    array_shift($pre_array);
}

function findCombos($search_array, $number) {
    
    for($i=0;$i<count($search_array); $i++) {
        for($y=0; $y  < count($search_array) ; $y++) {
            if($y==$i) {
                continue;
            }
            $tmp = $search_array[$i] + $search_array[$y];
            
            if($search_array[$i] + $search_array[$y] == $number) {
                return true;
            }
        }
    }
}


