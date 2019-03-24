<?php

//explode string dengan lebih dari 1 spasi atau menggunakan tab
$str = "A      B      C      D";
$s = explode(" ",$str);
foreach ($s as $a=>$b){    
    if ( trim($b) ) {
     print " $b\n";
    }
}

//explode untuk mengambil kata kapital dengan tambahan fungsi ctype_upper
echo "<br><br>";
$text = "HELLO world from BRAZIL";
$up = explode(' ',$text);

foreach($up AS $value){
    if (ctype_upper($value)) {
        echo $value;
    }
}

//multilnie string
$matches="value1
value2
value3
value4
value5
";

$matches=explode('\n',$matches);
print_r($matches);
?>

