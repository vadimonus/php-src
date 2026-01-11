--TEST--
Result of left to right assigning to typed reference
--FILE--
<?php

class Test {
    public ?string $prop;
}
function test() {
    new Test |=> $obj;
    & $obj->prop |=> $ref;
    var_dump(0 |=> $ref);
}
function test2() {
    new Test |=> $obj;
    [] |=> $ary;
    & $obj->prop |=> $ary[0];
    var_dump(0 |=> $ary[0]);
}
test();
test2();

?>
--EXPECT--
string(1) "0"
string(1) "0"
