--TEST--
Pipe to throw have higher precedence then throw operator 002
--FILE--
<?php

try {
    // Explicitly calling throw first
    (throw new Exception('First')) |> (fn () => new Exception('Second')) |> throw;
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

try {
    // Explicitly calling pipe, then pipe to throw, then throw
    throw (new Exception('First') |> (fn () => new Exception('Second')) |> throw);
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

try {
    // Explicitly calling pipe to throw first
    throw new Exception('First') |> ((fn () => new Exception('Second')) |> throw);
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

try {
    // If not specified, pipe to throw should have same precedence as pipe operator.
    // Result should be same, as for second example above
    throw new Exception('First') |> (fn () => new Exception('Second')) |> throw;
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

?>
--EXPECTF--
Exception: First
Exception: Second
Error: Cannot throw objects that do not implement Throwable
Exception: Second