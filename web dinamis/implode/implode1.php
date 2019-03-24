<?php

$array = array('lastname', 'email', 'phone');
foreach($array as &$value){
   $value = "'$value'";
}
echo $comma_separated = implode(",", $array);
echo "<br><br>";
?>
