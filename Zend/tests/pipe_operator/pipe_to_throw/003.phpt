--TEST--
Pipe to throw 003
--FILE--
<?php

throw |> 42;

?>
--EXPECTF--
Parse error: syntax error, unexpected token "|>" in %s on line %d