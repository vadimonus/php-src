--TEST--
Trying left to right assign value to property when an object is not returned in a function
--FILE--
<?php

class foo {
    public function a() {
    }
}

new foo |=> $test;

$test->a()->a;
print "ok\n";

try {
    1 |=> $test->a()->a;
} catch (Error $e) {
    echo $e->getMessage(), "\n";
}
print "ok\n";

?>
--EXPECTF--
Warning: Attempt to read property "a" on null in %s on line %d
ok
Attempt to assign property "a" on null
ok
