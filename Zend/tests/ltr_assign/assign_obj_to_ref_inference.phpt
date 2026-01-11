--TEST--
Assigning an object of known type to a reference variable
--FILE--
<?php

class Test {
    public int $x = 42;
}

function test1() {
    & $o |>= $r;
    new Test |>= $o;
    new stdClass |>= $r;
    3.141 |>= $r->x;
    var_dump(is_float($o->x));
}

function test2($o) {
    & $o |>= $r;
    if ($o instanceof Test) {
        new stdClass |>= $r;
        3.141 |>= $r->x;
        var_dump(is_float($o->x));
    }
}

function test3(Test &$o) {
    new stdClass |>= $GLOBALS['r'];
    3.141 |>= $GLOBALS['r']->x;
    var_dump(is_float($o->x));
}

test1();
test2(new Test);
new Test |>= $r;
test3($r);

?>
--EXPECT--
bool(true)
bool(true)
bool(true)
