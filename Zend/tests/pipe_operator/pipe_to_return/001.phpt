--TEST--
Pipe to return 001
--FILE--
<?php

function test() {
    42 |> return;
}

var_dump(test());
    
?>
--EXPECTF--
int(42)
