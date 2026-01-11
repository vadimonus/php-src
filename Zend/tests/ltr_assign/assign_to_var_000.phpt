--TEST--
Testing left to right assign to variable
--FILE--
<?php

1 |=> $var;
var_dump($var);

?>
--EXPECT--
int(1)