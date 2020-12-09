<?php
$fn = fopen("day8.txt", "r");
$lines = [];
while (! feof($fn)) {
    $result = fgets($fn);
    $lines[] = $result;
}

// Part 1
$res = runprog($lines, 0);
var_dump($res);

// part 2
// we will try to change every jump
// if the for loop exits $res[0] will be true
// if we exit it because of a duplicate command false
for ($i = 0; $i < count($lines); $i ++) {
    $res = runprog($lines, $i);
    if ($res[0] === true)
        var_dump($res);
}

// how to call a prog ? prog
function runprog($lines, $offset)
{

    // introducing a new var that we only use once! good
    $max = count($lines) - 1;

    $accumulator = 0;

    // we use this to see if we run a command twice
    // is there anything you cannot solve with arrays ?
    $visited_steps = [];

    for ($i = 0; $i < $max;) {
        if (isset($visited_steps[$i])) {
            // OMGOMG I HAVE SEEN THIS STEP BEFORE!
            return [
                false,
                $accumulator
            ];
        } else {
            $visited_steps[$i] = true;
        }

        // cameras, sound and .. $action
        $action = substr($lines[$i], 0, 3);
        $num = intval(substr($lines[$i], 4));

        // very usefull codeblock
        if ($action == "nop") {
            // have seen my fair share of bugs when using short ifs no { and then removing the last command in it
        }

        // i hate using switch
        if ($action == "acc") {
            // not the nintendo switch, i love zelda
            $accumulator += $num;
        }

        // nothing beats good old nested ifs
        if ($action == "jmp") {
            if ($offset != $i) {
                $i = $i + $num;
            } else {
                $i ++;
            }
            // elses like this make code very maintainable
        } else {
            // notice the for loop, if we don't do this we will run forever
            $i ++;
        }
    }
    // Well we made it .. this is the part2 answer
    // php8 supports multiple returns
    // lets go for good old arrays
    return [
        true,
        $accumulator
    ];
}