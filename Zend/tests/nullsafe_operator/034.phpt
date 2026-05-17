--TEST--
Test nullsafe operator on delayed dim
--FILE--
<?php

$arr = [
    'foo' => null,
    'bar' => [
        'baz' => null,
    ],
];

var_dump($arr['foo']?->something);
var_dump($arr['invalid']?->something);

var_dump($arr['bar']['baz']?->something);
var_dump($arr['bar']['invalid']?->something);

?>
--EXPECTF--
NULL
NULL
NULL
NULL
