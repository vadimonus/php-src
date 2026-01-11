--TEST--
Testing left to right assign to property of an object in an array
--FILE--
<?php

array(new stdClass) |=> $arr;

clone $arr[0] |=> $arr[0]->a;
var_dump($arr);

new $arr[0] |=> $arr[0]->b;
var_dump($arr);

$arr[0]->a |=> $arr[0]->c;
var_dump($arr);

?>
--EXPECT--
array(1) {
  [0]=>
  object(stdClass)#1 (1) {
    ["a"]=>
    object(stdClass)#2 (0) {
    }
  }
}
array(1) {
  [0]=>
  object(stdClass)#1 (2) {
    ["a"]=>
    object(stdClass)#2 (0) {
    }
    ["b"]=>
    object(stdClass)#3 (0) {
    }
  }
}
array(1) {
  [0]=>
  object(stdClass)#1 (3) {
    ["a"]=>
    object(stdClass)#2 (0) {
    }
    ["b"]=>
    object(stdClass)#3 (0) {
    }
    ["c"]=>
    object(stdClass)#2 (0) {
    }
  }
}
