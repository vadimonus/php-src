--TEST--
Pipe to throw have same precedence as pipe operator 001
--FILE--
<?php

try {
    42 |> (fn () => new Exception('pipe then throw')) |> throw;
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

try {
    new Exception('First') |> throw |> 42 |> (throw new Exception('Second'));
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

try {
    new Exception('First') |> throw |> 42 |> throw new Exception('Second');
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

?>
--EXPECTF--
Exception: pipe then throw
Exception: First
Exception: First
