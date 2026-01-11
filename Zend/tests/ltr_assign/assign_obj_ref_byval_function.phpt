--TEST--
Left to right assign result of by-value function to object property by-reference
--FILE--
<?php

function notRef() {
    return null;
}

new stdClass |=> $obj;
& notRef() |=> $obj->prop;
var_dump($obj);

?>
--EXPECTF--
Notice: Only variables should be assigned by reference in %s on line %d
object(stdClass)#1 (1) {
  ["prop"]=>
  NULL
}
