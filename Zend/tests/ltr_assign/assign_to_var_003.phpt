--TEST--
Complex cases of left to riht variable assignment - 003
--FILE--
<?php

0.213123123 |=> $var;
&$var |=> $var1;
$var[1] |=> $var;

var_dump($var);
var_dump($var1);

echo "Done\n";
?>
--EXPECTF--
Warning: Trying to access array offset on float in %s on line %d
NULL
NULL
Done
