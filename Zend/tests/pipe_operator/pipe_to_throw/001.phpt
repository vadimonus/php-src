--TEST--
Pipe to throw 001
--FILE--
<?php

new RuntimeException |> throw;
    
?>
--EXPECTF--
Fatal error: Uncaught RuntimeException in %s:%d
Stack trace:
#0 {main}
  thrown in %s on line %d
