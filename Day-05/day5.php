<?php
$fn = fopen("day5.txt", "r");
$lines = [];
while (! feof($fn)) {
    $result = fgets($fn);
    $tmp = [];
    $lines[] = $result;
}

$seats = [];
foreach ($lines as $line) {
    $seatid = getSeat($line, 7, 3, 127, 7);

    if ($seatid)
        $seats[] = $seatid;
}

// Sort seats
sort($seats);

// last / highest seat number
echo end($seats);

// create new one and compare
var_dump(array_diff(range($seats[0], end($seats)), $seats));

function getSeat($seat, $rowsize, $colsize, $planerows, $planecols)
{
    if (strlen($seat) < 5)
        return;

    $rows = substr($seat, 0, $rowsize);
    $cols = substr($seat, $rowsize, $rowsize + $colsize);

    $row = getSeatRange($rows, $planerows);
    $col = getSeatRange($cols, $planecols);

    return ($row * 8) + $col;
}

function getSeatRange($rows, $max)
{
    $minrow = 0;
    $maxrow = $max;

    for ($i = 0; $i < strlen($rows); $i ++) {

        if ($rows[$i] == "B" || $rows[$i] == "R") {
            $minrow = ceil(($minrow + $maxrow) / 2);
            $maxrow = $maxrow;
        }

        if ($rows[$i] == "F" || $rows[$i] == "L") {
            $minrow = $minrow;
            $maxrow = floor(($minrow + $maxrow) / 2);
        }
    }

    if (substr($rows, - 1) == "F" || substr($rows, - 1) == "L") {
        return $minrow;
    } else {
        return $maxrow;
    }
}