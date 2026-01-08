--TEST--
Return and throw precedence 002
--FILE--
<?php

/*
Should cause parse error, same as 
throw return new RuntimeException;
*/

new RuntimeException |> return |> throw;
    
?>
--EXPECTF--
Parse error: syntax error, unexpected token "|>", expecting ";" in %s on line %d
