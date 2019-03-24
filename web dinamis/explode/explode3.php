<?php

//I have a problem, I have a string array, and I want to explode in different delimiter. For Example

$string = ("iOS @ Android ");
$lin = ('Linux vs Windows ');

function multiExplode($delimiters,$string,$lin) {
    $array = explode($delimiters[0],$string,$lin);
    array_shift($delimiters);
    if($delimiters != NULL) {
        if(count($array) <2)
            $array = $this->multiExplode($delimiters, $string,$lin);
    }
    return  $array;
}
?>
