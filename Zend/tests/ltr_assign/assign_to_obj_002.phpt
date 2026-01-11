--TEST--
Left to right assign to $this leaks when $this not defined
--FILE--
<?php

try {
    new stdClass |>= $this->a;
} catch (Error $e) { echo $e->getMessage(), "\n"; }

?>
--EXPECT--
Using $this when not in object context
