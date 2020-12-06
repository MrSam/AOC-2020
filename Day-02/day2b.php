<?php
$fn = fopen("day2.txt", "r");
$lines = [];
while (! feof($fn)) {
    $result = fgets($fn);
    $tmp = [];
    preg_match('/^(\d*)-(\d*) (\w): (\w+)/', $result, $tmp);
    $lines[] = array(
        'min' => intval($tmp[1]),
        'max' => intval($tmp[2]),
        'letter' => $tmp[3],
        'password' => $tmp[4]
    );
}

echo "------------";
$pos = 0;
$neg = 0;
foreach ($lines as $l) {
    $count = substr_count($l['password'], $l['letter']);
    if ($count > 0) {
        // we found the letter in the string, now tell me where
        $positions = [];
        $lastPos = 0;
        while (($lastPos = strpos($l['password'], $l['letter'], $lastPos)) !== false) {
            $positions[$lastPos + 1] = $l['letter'];
            $lastPos = $lastPos + strlen($l['letter']);
        }

        if ($positions[$l['min']] == $l['letter'] xor $positions[$l['max']] == $l['letter']) {
            $pos ++;
        } else {
            $neg ++;
        }
    }
}

echo $pos . " " . $neg . " =" . ($pos + $neg);