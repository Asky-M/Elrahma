<?php

//I have a problem, I have a string array, and I want to explode in different delimiter. For E
xample

$string = 'Appel @ Ratte';
//$example2 = 'apple vs ratte'
//and I need an array which is explode in @ or vs.

//I already wrote a solution, but If everybody have a better solution please post here.

private function multiExplode($delimiters,$string) {
    $ary = explode($delimiters[0],$string);
    array_shift($delimiters);
    if($delimiters != NULL) {
        if(count($ary) <2)
            $ary = $this->multiExplode($delimiters, $string);
    }
    return  $ary;
}
?>
