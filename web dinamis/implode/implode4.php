<?php

$sql = array();

foreach( $data as $row ) {
    $sql[] = '("' . mysql_real_escape_string($row['text']) . '", ' . $row['category_id'] . ')';
}

mysql_query('INSERT INTO table (text, category) VALUES ' . implode(',', $sql));
?>
