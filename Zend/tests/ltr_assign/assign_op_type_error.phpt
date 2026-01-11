--TEST--
TypeError for compound assignment operations
--FILE--
<?php

[] |>= $x;
try {
    "1" |> += $x;
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
try {
     "1" |> -= $x;
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
try {
    "1" |> *= $x;
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
try {
    "1" |> /= $x;
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
try {
    "1" |> **= $x;
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
try {
    "1" |> %= $x;
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
try {
    "1" |> <<= $x;
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
try {
    "1" |> >>=$x;
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}

?>
--EXPECT--
Unsupported operand types: array + string
Unsupported operand types: array - string
Unsupported operand types: array * string
Unsupported operand types: array / string
Unsupported operand types: array ** string
Unsupported operand types: array % string
Unsupported operand types: array << string
Unsupported operand types: array >> string
