--TEST--
Pipe to throw expression. Same tests as in Zend/tests/throw/001.phpt but with differences in behaviour.
--FILE--
<?php

try {
    $exception = new Exception() |> throw;
} catch (Exception $e) {}
var_dump(isset($exception));

try {
    $exception = null;
    $exception ??= new Exception() |> throw;
} catch (Exception $e) {}
var_dump($exception);

?>
--EXPECT--
bool(false)
NULL
