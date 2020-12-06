<?php
$lines = preg_split('/\n\W+/', trim(file_get_contents('day4.txt')));
$counter = 0;
foreach ($lines as $l) {
    $l = trim(preg_replace('/\n/', ' ', $l));
    $single = explode(' ', $l);

    if (count($single) >= 7) {
        $check = [];
        foreach ($single as &$s) {
            $s = explode(":", $s);
            if ($s[0] == 'cid') {
                $check['cid'] = true;
            }
            if ($s[0] == 'byr' && $s[1] >= 1920 && $s[1] <= 2020) {
                $check['byr'] = true;
            }
            if ($s[0] == 'iyr' && $s[1] >= 2010 && $s[1] <= 2020) {
                $check['iyr'] = true;
            }
            if ($s[0] == 'eyr' && $s[1] >= 2020 && $s[1] <= 2030) {
                $check['eyr'] = true;
            }
            if ($s[0] == 'cid') {
                $cid = true;
            }
            if ($s[0] == 'cid') {
                $cid = true;
            }
            if ($s[0] == 'cid') {
                $cid = true;
            }
            if ($s[0] == 'cid') {
                $cid = true;
            }
        }
        var_dump($check);
    }
}
echo $counter;