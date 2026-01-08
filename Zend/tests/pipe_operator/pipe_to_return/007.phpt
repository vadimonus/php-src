--TEST--
Pipe to return 007
--FILE--
<?php

function test() : object {
    new stdClass |> return;
}

var_dump(test());
    
?>
--EXPECTF--
object(stdClass)#1 (0) {
}