--TEST--
Testing left to right assign precedence - 004
--FILE--
<?php

$a = 42 + 1 |=> $b + 1 |=> $c;
var_dump($a, $b, $c);

?>
--EXPECTF--
int(43)
int(43)
int(44)