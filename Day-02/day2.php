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

$pos = 0;
$neg = 0;
foreach ($lines as $l) {
    $count = substr_count($l['password'], $l['letter']);
    if ($count >= $l['min'] && $count <= $l['max'] && $count > 0) {
        $pos ++;
        var_dump($l);
    } else {
        $neg ++;
    }
}

echo $pos . " " . $neg . " =" . ($pos + $neg);