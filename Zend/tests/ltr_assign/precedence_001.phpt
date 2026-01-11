--TEST--
Testing left to right assign precedence - 001
--FILE--
<?php

$a = 1;
$a + 1 |=> $b + 1 |=> $c;
var_dump($a, $b, $c);

?>
--EXPECT--
int(1)
int(2)
int(3)
