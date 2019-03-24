<?php

$array = [['k1'=>['v1','v2']],['k2'=>'v3'], ['k3' => ['k4'=>['v4','k5'=>['v5']]]], 'k6'=>'v6'];
echo(implode_recursive($array));
//// Should return "k1.v1.v2.k2.v3.k3.k4.v4.k5.v5.k6.v6"

?>
