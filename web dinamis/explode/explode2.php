<?php
function explode (s, separator, limit){
    var arr = s.split(separator);
    if (limit) {
        arr.push(arr.splice(limit-1, (arr.length-(limit-1))).join(separator));
    }
    return arr;
}
?>
