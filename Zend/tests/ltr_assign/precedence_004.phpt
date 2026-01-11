--TEST--
Testing left to right assign precedence - 004
--FILE--
<?php

class Test {
    private array $props = [];
    public function __set(string $name, mixed $value): void
    {
        $value |>= $this->props[$name];
        echo "Assigning " . $name . " with " . $value . "\n";
    }
    public function __get(string $name): mixed
    {
        return $this->props[$name];
    }
}

$t = new Test;

$t->a <<=
    $t->a **=
        $t->a -=
            $t->a *=
                $t->a +=
                    $t->a =
                        2
                            |> $t->b
                            |> $t->b
                            |> *= $t->b
                            |> -= $t->b
                            |> **= $t->b
                            |> <<= $t->b;

?>
--EXPECTF--
Assigning a with 2
Assigning a with 4
Assigning a with 16
Assigning a with 0
Assigning a with 1
Assigning a with 2
Assigning b with 2
Assigning b with 4
Assigning b with 16
Assigning b with 0
Assigning b with 1
Assigning b with 2
