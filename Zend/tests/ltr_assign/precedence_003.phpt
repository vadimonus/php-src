--TEST--
Testing left to right assign precedence - 003
--FILE--
<?php

class Test {
    public function __set(string $name, mixed $value): void
    {
        echo "Assigning " . $name . "\n";
    }
}

$t = new Test;

$t->a = $t->b = 42 |=> $t->c |=> $t->d;

?>
--EXPECTF--
Assigning b
Assigning a
Assigning c
Assigning d