--TEST--
Return value of left tot right assigning by-val function result by-reference
--FILE--
<?php
[&$a] |>= $a;
var_dump(& returnsVal() |>= $a[0]);
function returnsVal() {}
?>
--EXPECTF--
Notice: Only variables should be assigned by reference in %s on line %d
NULL
