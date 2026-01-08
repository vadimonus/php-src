--TEST--
Pipe to return 006
--FILE--
<?php

function test() : array {
    [1, 2] |> return;
}

var_dump(test());
    
?>
--EXPECTF--
array(2) {
  [0]=>
  int(1)
  [1]=>
  int(2)
}