<?php


function total_score($inputlist) {
    $sprinkles = [2, 0, -2, 0, 3];
    $butterscotch = [0, 5, -3, 0, 3];
    $chocolate = [0, 0, 5, -1, 8];    
    $candy = [0, -1, 0, 5, 8];
    
    $scores = [];
    for($i = 0; $i < 4; ++$i) {
        $sum = ($inputlist[0]*$sprinkles[$i]) +
               ($inputlist[1]*$butterscotch[$i]) +
               ($inputlist[2]*$chocolate[$i]) +
               ($inputlist[3]*$candy[$i]);
        if ($sum < 0) {
            return 0;
        } else {
             $scores[] = $sum;       
        }
    }
    return array_product($scores);
}


function generate_combinations() {
    $combinations = [];
    for($i = 0; $i < 101; ++$i) {
        for($j = 0; $j < 101; ++$j) {  
           for($k = 0; $k < 101; ++$k) {
               for($l = 0; $l < 101; ++$l) { 
                   $combination = [$i, $j, $k, $l];
                   if (array_sum($combination) == 100) {
                        $combinations[] = $combination;
                    }
                }
            }
        }
    }
    return $combinations;

}
    
$combs = generate_combinations(); 
$max_score = 0;
foreach ($combs as $combination) {
    $newscore = total_score($combination);
    if ($newscore > $max_score) {
        $max_score = $newscore;
        $bestcombi = $combination;
    }
}
    
print("{$bestcombi[0]} sprinkles, {$bestcombi[1]} butterscotch, {$bestcombi[2]} chocolate, {$bestcombi[3]} candy\n");
print("{$max_score}\n"); 





?>
