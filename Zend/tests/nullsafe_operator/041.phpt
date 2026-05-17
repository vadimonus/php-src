--TEST--
Test nullsafe on undefined array element
--FILE--
<?php

$foo = [];

var_dump($foo[0]?->bar);
var_dump($foo[0]?->bar());
var_dump($foo[0]?->bar->baz);
var_dump($foo[0]?->bar()->baz);
var_dump($foo[0]?->bar->baz());
var_dump($foo[0]?->bar()->baz());
var_dump($foo['key']?->bar);
var_dump($foo['key']?->bar());
var_dump($foo['key']?->bar->baz);
var_dump($foo['key']?->bar()->baz);
var_dump($foo['key']?->bar->baz());
var_dump($foo['key']?->bar()->baz());
var_dump($foo[0]['key']?->bar);
var_dump($foo[0]['key']?->bar());
var_dump($foo[0]['key']?->bar->baz);
var_dump($foo[0]['key']?->bar()->baz);
var_dump($foo[0]['key']?->bar->baz());
var_dump($foo[0]['key']?->bar()->baz());

?>
--EXPECT--
NULL
NULL
NULL
NULL
NULL
NULL
NULL
NULL
NULL
NULL
NULL
NULL
NULL
NULL
NULL
NULL
NULL
NULL
