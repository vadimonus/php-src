--TEST--
Handling of undef variable exception in JMP_NULL
--FILE--
<?php

set_error_handler(function($_, $m) {
    throw new Exception($m);
});

$foo?->foo;

?>
--EXPECT--
