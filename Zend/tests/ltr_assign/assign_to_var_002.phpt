--TEST--
Complex cases of left to riht variable assignment - 002
--FILE--
<?php

"intergalactic" |=> $var;
&$var |=> $var1;
$var[5] |=> $var;

var_dump($var);
var_dump($var1);

echo "Done\n";
?>
--EXPECT--
string(1) "g"
string(1) "g"
Done
