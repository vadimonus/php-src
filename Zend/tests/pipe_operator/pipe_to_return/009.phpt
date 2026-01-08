--TEST--
Pipe to return 009
--FILE--
<?php

function test() : int {
    "Hello World" |> (fn($x) => strlen($x)) |> return;
}

var_dump(test());
    
?>
--EXPECTF--
int(11)
