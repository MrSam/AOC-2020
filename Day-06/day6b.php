<?php
$lines = preg_split('/\n\W+/', trim(file_get_contents('day6.txt')));

$counter = 0;
foreach ($lines as $l) {
    $l = trim(preg_replace('/\n/', ' ', $l));
    $single = explode(' ', $l);

    $unique_single = [];

    foreach ($single as $s) {
        if (strlen($s) === 1) {
            if (isset($unique_single[$s])) {
                $unique_single[$s] ++;
            } else {
                $unique_single[$s] = 1;
            }
        } else if (strlen($s) > 1) {
            for ($i = 0; $i < strlen($s); $i ++) {
                if (isset($unique_single[$s[$i]])) {
                    $unique_single[$s[$i]] ++;
                } else {
                    $unique_single[$s[$i]] = 1;
                }
            }
        }
    }

    $number_of_voters = count($single);
    foreach ($unique_single as $snowflake) {
        if ($snowflake === $number_of_voters) {
            $counter ++;
        }
    }
}
var_dump($counter);