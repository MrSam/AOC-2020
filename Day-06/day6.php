<?php
$lines = preg_split('/\n\W+/', trim(file_get_contents('day6.txt')));

$counter = 0;
foreach ($lines as $l) {
    $l = trim(preg_replace('/\n/', ' ', $l));
    $single = explode(' ', $l);

    $unique_single = [];
    foreach ($single as $s) {
        if (strlen($s) === 1) {
            $unique_single[$s] = true;
        } else if (strlen($s) > 1) {
            for ($i = 0; $i < strlen($s); $i ++) {
                $unique_single[$s[$i]] = true;
            }
        }
    }

    foreach ($unique_single as $snowflake) {
        $counter += count($snowflake);
    }
}
var_dump($counter);