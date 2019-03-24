<?php

$fields = implode(",", array_keys($_POST));
$newdata = implode(",", array_map(function($x) use ($dbc) {
    return "'" . $dbc->real_escape_string($x) . "'";
}, $_POST));

$query = (
"INSERT INTO nama_makanan ($fields)
VALUES ($newdata)");

$result = mysqli_query($dbc, $query);

?>
