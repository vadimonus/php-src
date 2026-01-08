--TEST--
Pipe to return 002
--FILE--
<?php

function test() : int {
    "Hello World" |> strlen(...) |> return;
}

var_dump(test());
    
?>
--EXPECTF--
int(11)
