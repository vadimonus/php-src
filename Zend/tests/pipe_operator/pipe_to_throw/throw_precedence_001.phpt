--TEST--
A pipe to throw interrupted by an exception 001
--FILE--
<?php

try {
    new Exception('First')
        |> (throw new Exception('Second'))
        |> throw;
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

?>
--EXPECTF--
Exception: Second
