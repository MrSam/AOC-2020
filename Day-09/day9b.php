<?php
$fn = fopen("day9.txt", "r");
$lines = [];

while (! feof($fn)) {
    $result = fgets($fn);
    $lines[] = intval($result);
}

// try groups of 2,3,4,5,6...1000 
// spoiler: its a group of 17
for($i=2; $i< 1000; $i++) {
    if(runshit($lines, $i, 530627549)) {
        var_dump("FOUND");
    }
}

function runshit($lines, $preamble, $target_num)
{
    for ($i = 0; $i < count($lines); $i ++) {
        if ($i < $preamble) {
            $pre_array[] = $lines[$i];
            continue;
        }
        if(array_sum($pre_array) == $target_num) {
            sort($pre_array);
            var_dump($target_num, $pre_array, ($pre_array[0] + end($pre_array)));
        }
        $pre_array[] = $lines[$i];
        array_shift($pre_array);
    }
    return false;
}




