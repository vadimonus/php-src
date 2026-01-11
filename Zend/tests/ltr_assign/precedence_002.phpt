--TEST--
Testing left to right assign precedence - 002
--FILE--
<?php

$a = 1;
$с = 1;
$a |=> $b = $c;

?>
--EXPECTF--
Parse error: syntax error, unexpected token "=" in %s on line %d
