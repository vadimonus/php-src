--TEST--
Two concurrenting return statements
--FILE--
<?php

return 42 |> return;

?>
--EXPECTF--
Parse error: syntax error, unexpected token "return" in %s on line %d