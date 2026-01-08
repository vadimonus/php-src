--TEST--
Return and throw precedence 001
--FILE--
<?php

/*
Result must be same as for

return throw new RuntimeException;
*/

new RuntimeException |> throw |> return;
    
?>
--EXPECTF--
Fatal error: Uncaught RuntimeException in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d
