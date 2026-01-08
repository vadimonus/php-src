--TEST--
Pipe to throw 004
--FILE--
<?php

try {
     new Exception("Message") |> throw |> 42;
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

?>
--EXPECTF--
Exception: Message