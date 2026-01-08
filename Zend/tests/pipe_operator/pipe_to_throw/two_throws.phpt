--TEST--
Double pipe to throw
--FILE--
<?php

try {
     new Exception("Message") |> throw |> throw;
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

?>
--EXPECTF--
Exception: Message