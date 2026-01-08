--TEST--
Pipe to return 008
--DESCRIPTION--
|> return after at the end of arrow function without parenthesis can be read as trying to return from arrow function
and as trying to return callcable from outer function. Such code leads to ambiguity and is not treated valid.
--FILE--
<?php

function test() {
    fn ($str) => strlen($str) |> return;
}

?>
--EXPECTF--
Parse error: syntax error, unexpected token "return" in %s on line %d
