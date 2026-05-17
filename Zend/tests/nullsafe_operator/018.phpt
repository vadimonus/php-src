--TEST--
Test nullsafe on undefined variable
--FILE--
<?php

var_dump($foo);
var_dump($foo?->bar);
var_dump($foo?->bar());
var_dump($foo?->bar->baz);
var_dump($foo?->bar->baz());
var_dump($foo?->bar()->baz);
var_dump($foo?->bar()->baz());

?>
--EXPECTF--
Warning: Undefined variable $foo in %s.php on line 3
NULL
NULL
NULL
NULL
NULL
NULL
NULL
