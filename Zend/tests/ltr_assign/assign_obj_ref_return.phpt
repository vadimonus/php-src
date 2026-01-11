--TEST--
Left to right ASSIGN_OBJ should not return reference
--FILE--
<?php

new stdClass |>= $obj;
& $ref |>= $obj->ref;
42 |>= $obj->ref |>= $obj->val;
var_dump($obj);

?>
--EXPECT--
object(stdClass)#1 (2) {
  ["ref"]=>
  &int(42)
  ["val"]=>
  int(42)
}
