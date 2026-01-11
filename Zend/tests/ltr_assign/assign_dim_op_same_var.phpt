--TEST--
Compound array assignment with same variable
--FILE--
<?php
function test() {
    [[]] |> = $ary;
    $ary |> += $ary[0];
    foreach ($ary as $v) {
        var_dump($v);
    }
}
test();
?>
--EXPECT--
array(1) {
  [0]=>
  array(0) {
  }
}
