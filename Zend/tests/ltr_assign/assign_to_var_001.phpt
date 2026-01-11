--TEST--
complex cases of left to right variable assignment - 001
--FILE--
<?php

array(1,2,3) |=> $var;
&$var |=> $var1;
$var[1] |=> $var;

var_dump($var);
var_dump($var1);

echo "Done\n";
?>
--EXPECT--
int(2)
int(2)
Done
