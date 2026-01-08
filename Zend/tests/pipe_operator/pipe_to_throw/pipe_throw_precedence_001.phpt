--TEST--
Pipe to throw have higher precedence then throw operator 001
--FILE--
<?php

try {
    // Interpreting this as 
    // (new Exception('First') |> throw) new Exception('Second')
    // will cause syntax error, so it is treated as simple pipe operator,
    // new Exception('First') |> (throw new Exception('Second'))
    new Exception('First') |> throw new Exception('Second');
}
catch (Throwable $e) {
    echo $e::class, ": ", $e->getMessage(), PHP_EOL;
}

?>
--EXPECTF--
Exception: Second