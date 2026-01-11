--TEST--
Complex cases of left to riht variable assignment - 004
--FILE--
<?php

"intergalactic" |=> $var;
"space" |=> $var1;
&$var1 |=> $var2;

$var2 |=> $var;

var_dump($var);
var_dump($var1);
var_dump($var2);

echo "Done\n";
?>
--EXPECT--
string(5) "space"
string(5) "space"
string(5) "space"
Done
