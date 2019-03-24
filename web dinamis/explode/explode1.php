<?php
$data=array('uploads/8/thumbs/8470177001370850253.png',
      'uploads/10/thumbs/967693821370850253.png',
      'uploads/9/thumbs/8470177001370850253.png',
      'uploads/11/thumbs/967693821370850253.png');

foreach ($data as $row){
$temparray=explode('/',$row);
$temparray[1]=20;
echo explode('/',$temparray);
echo "<br>";
echo implode('/',$temparray); 
}

?>
