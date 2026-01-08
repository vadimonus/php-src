--TEST--
Pipe to return 004
--FILE--
<?php

function test() {
    null |> return;
}

var_dump(test());
    
?>
--EXPECTF--
NULL
