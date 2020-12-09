<?php
getBags();

$res = countBags("shiny gold");
  // we found count($res) bags .. these are our first outer bags

  // iterate the fuck out of it -- IT IS THE DREAM WITHIN THE DREAM
  // why 10 ? WHY NOT! 
for ($i = 0; $i < 10; $i ++) {
    foreach (array_keys($res) as $resbag) {
        $res = array_merge($res, countBags($resbag));
    }
}

// tell me.. give me my bag
var_dump(count($res));

function countBags($search)
{
    $bags = getBags();
    $foundbags = [];
    foreach ($bags as &$b) {
        // No i don't need no scrub
        unset($b[0]);
        unset($b[2]);
        unset($b[3]);
        
        // whats inside this fancy bag ?
        if (! isset($b['contains'])) {
            $b['contains'] = [];
            preg_match_all('#(\d) ([\w ]+?) bags?#', $b[4], $inner);
            $b['contains'] = array_combine($inner[1], $inner[2]);
        }
        
        // hello ? is it me you are looking for
        if (strpos($b[4], $search) !== false) {
            $foundbags[$b[1]] = $b[4];
        }
        
    }
    return $foundbags;
}

function getBags()
{
    $fn = fopen("day7.txt", "r");
    $bags = [];
    while (! feof($fn)) {
        $res = fgets($fn);
        preg_match('/((\w*) (\w*)) bags contain (.*)/', $res, $bag);
        $bags[] = $bag;
    }
    return $bags;
}





