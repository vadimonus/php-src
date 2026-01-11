--TEST--
Left to right assigning rc=1 reference to next dim
--FILE--
<?php
var_dump($x |=> [&$x] |=> $ary[]);
var_dump($x);
?>
--EXPECT--
array(1) {
  [0]=>
  &NULL
}
NULL
