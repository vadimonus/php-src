--TEST--
Pipe to return 005
--FILE--
<?php

function test() : array {
    null |> return;
}

var_dump(test());
    
?>
--EXPECTF--
Fatal error: Uncaught TypeError: test(): Return value must be of type array, null returned in %s:%d
Stack trace:
#0 %s: test()
#1 {main}
  thrown in %s on line %d
  