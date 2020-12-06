<?php
$fn = fopen("day3.txt", "r");
$lines = [];
while (! feof($fn)) {
    $result = fgets($fn);
    $tmp = [];
    $lines[] = $result;
}

$line = 0;
$left = 0;
$tree = 0;
while ($line < sizeof($lines) - 1) {
    if ($lines[$line]) {
        echo "checking line" . $lines[$line] . " $line and left $left: ";
        if ($lines[$line][$left] == "#") {
            $tree ++;
            echo "#";
        } else {
            echo "O";
        }
        echo "\n";
        # go 1 down
        if ($line < sizeof($lines)) {
            $line ++;
        }
        # go 3 left
        for ($i = 0; $i < 3; $i ++) {
            if ($left + 1 < strlen($lines[$line]) - 1) {
                $left ++;
            } else {
                $left = 0;
            }
        }
    }
}

echo "trees : " . $tree;