<?php
$fn = fopen("day1.txt", "r");
$lines = [];
while (! feof($fn)) {
    $result = fgets($fn);
    $lines[] = intval($result);
}

foreach ($lines as $first) {
    foreach ($lines as $second) {
        foreach ($lines as $third) {
            if ($first + $second + $third == 2020) {
                echo "$first + $second + $third : " . ($first + $second + $third) . " = " . ($first * $second * $third) . "\n";
            }
        }
    }
}