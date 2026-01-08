--TEST--
Pipe to return 003
--FILE--
<?php

function test() {
    "Hello World"
        |> htmlentities(...)
        |> str_split(...)
        |> (fn($x) => array_map(strtoupper(...), $x))
        |> return;
}

var_dump(test());
    
?>
--EXPECTF--
array(11) {
  [0]=>
  string(1) "H"
  [1]=>
  string(1) "E"
  [2]=>
  string(1) "L"
  [3]=>
  string(1) "L"
  [4]=>
  string(1) "O"
  [5]=>
  string(1) " "
  [6]=>
  string(1) "W"
  [7]=>
  string(1) "O"
  [8]=>
  string(1) "R"
  [9]=>
  string(1) "L"
  [10]=>
  string(1) "D"
}
