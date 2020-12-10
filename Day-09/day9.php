<?php
$fn = fopen("day9.txt", "r");
$lines = [];

while (! feof($fn)) {
    $result = fgets($fn);
    $lines[] = intval($result);
}

// Part1: run tru shit in groups of 25
$part1 = runshit($lines, 25);
var_dump($part1);

// Part 2: run tru shit in groups of 2,3,4,5,6...1000
// spoiler: its a group of 17
for ($i = 2; $i < 1000; $i ++) {
    $part2 = runshit($lines, $i, $part1);
    if ($part2)
        break;
}
var_dump($part2);

// /////
// SHIT
// /////
function runshit($lines, $preamble, $target_num = false)
{
    // this fills the preamble 'buffer' .. fixed for part1, variable for part 2
    for ($i = 0; $i < count($lines); $i ++) {
        if ($i < $preamble) {
            $pre_array[] = $lines[$i];
            continue;
        }

        // part 1, we need to find combos
        if (! $target_num) {
            // My current num ..
            $currentnum = $lines[$i];

            // foreach the shit out of it untill you cannot find a valid combo
            if (! findCombos($pre_array, $currentnum)) {
                return $currentnum;
            }
        }

        // part 2, we need to know the sum of all de keys in preamble
        if ($target_num && array_sum($pre_array) == $target_num) {
            // stupid sort because we need the first and the last key
            sort($pre_array);
            return ($pre_array[0] + end($pre_array));
        }

        // both .. go to the next step by removing the first item
        // and adding the last
        $pre_array[] = $lines[$i];
        array_shift($pre_array);
    }
    return false;
}

function findCombos($search_array, $number)
{
    for ($i = 0; $i < count($search_array); $i ++) {
        for ($y = 0; $y < count($search_array); $y ++) {
            // make sure you are not adding to yourself
            if ($y == $i) {
                continue;
            }
            // yay , we found a combo
            if ($search_array[$i] + $search_array[$y] == $number) {
                return true;
            }
        }
    }
    
    // we made it here so no combo, this is the result of part1
    // i can write return false .. but fuck that
    // fluffy PHP for the win
}