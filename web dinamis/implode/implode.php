<?php

$array = array('lastname', 'email', 'phone');
foreach($array as &$value){
   $value = "'$value'";
}
echo $comma_separated = implode(",", $array);
echo "<br><br>";

function implode_recursive($array, $glue = '.') {
    $return = '';

    foreach ($array as $key => $value) {
        if (! is_int($key)) {
            $return .= $key.$glue;
        }

        if (is_array($value)) {
            $return .= implode_recursive($value, $glue) . $glue;
        } else {
            $return .= $value . $glue;
        }
    }

    $return = substr($return, 0, 0-strlen($glue));

    return $return;
}

$array = [['k1'=>['v1','v2']],['k2'=>'v3'], ['k3' => ['k4'=>['v4','k5'=>['v5']]]], 'k6'=>'v6'];
echo(implode_recursive($array));
//// Should return "k1.v1.v2.k2.v3.k3.k4.v4.k5.v5.k6.v6"
echo "<br><br>";

$sql = array();

foreach( $data as $row ) {
    $sql[] = '("' . mysql_real_escape_string($row['text']) . '", ' . $row['category_id'] . ')';
}

mysql_query('INSERT INTO table (text, category) VALUES ' . implode(',', $sql));
echo "<br><br>";

$fields = implode(",", array_keys($_POST));
$newdata = implode(",", array_map(function($x) use ($dbc) {
    return "'" . $dbc->real_escape_string($x) . "'";
}, $_POST));

$query = (
"INSERT INTO Food_entered ($fields)
VALUES ($newdata)");

$result = mysqli_query($dbc, $query);
?>
