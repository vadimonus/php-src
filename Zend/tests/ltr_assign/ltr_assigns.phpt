--TEST--
Testing left to right assign to variable
--FILE--
<?php

1 |>= $var;
var_dump($var);

1 |>= $var;
1 |> += $var;
var_dump($var);

1 |>= $var;
1 |> -= $var;
var_dump($var);

1 |>= $var;
2 |> *= $var;
var_dump($var);

5 |>= $var;
2 |> /= $var;
var_dump($var);

'foo' |>= $var;
'bar' |> .= $var;
var_dump($var);

5 |>= $var;
2 |> %= $var;
var_dump($var);

0b1010 |>= $var;
0b1100 |> &= $var;
var_dump(str_pad(decbin($var), 8, '0', STR_PAD_LEFT));

0b1010 |>= $var;
0b1100 |> |= $var;
var_dump(str_pad(decbin($var), 8, '0', STR_PAD_LEFT));

0b1010 |>= $var;
0b1100 |> ^= $var;
var_dump(str_pad(decbin($var), 8, '0', STR_PAD_LEFT));

0b00100 |>= $var;
2 |> <<= $var;
var_dump(str_pad(decbin($var), 8, '0', STR_PAD_LEFT));

0b00100 |>= $var;
2 |> >>= $var;
var_dump(str_pad(decbin($var), 8, '0', STR_PAD_LEFT));

NULL |>= $var;
42 |> ??= $var;
var_dump($var);

0 |> = $var;
42 |> ??= $var;
var_dump($var);

2 |>= $var;
4 |> **= $var;
var_dump($var);

?>
--EXPECT--
int(1)
int(2)
int(0)
int(2)
float(2.5)
string(6) "foobar"
int(1)
string(8) "00001000"
string(8) "00001110"
string(8) "00000110"
string(8) "00010000"
string(8) "00000001"
int(42)
int(0)
int(16)