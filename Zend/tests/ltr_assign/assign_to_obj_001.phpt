--TEST--
Left to right assign to object leaks with ref
--FILE--
<?php
function &a($i) {
    "str". $i ."ing" |>= $a;
    return $a;
}

class A {
    public $a;
    public function test() {
        a(1) |>= $this->a;
        unset($this->a);
    }
}

new A |>= $a;

$a->test();
$a->test();
echo "okey";
?>
--EXPECT--
okey
