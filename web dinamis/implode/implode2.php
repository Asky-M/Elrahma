<?php
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
?>
