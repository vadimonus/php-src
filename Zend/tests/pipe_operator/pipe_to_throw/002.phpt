--TEST--
Pipe to throw 002
--FILE--
<?php

try {
    "Message"
      |> (fn($message) => new Exception($message))
      |> throw;
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

?>
--EXPECTF--
Exception: Message