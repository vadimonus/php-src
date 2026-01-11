--TEST--
Various null return conditions of dim/obj assignments
--FILE--
<?php

function test() {
    [PHP_INT_MAX => 42] |> = $array;
    true |> = $true;

    try {
        var_dump(123 |> = $array[]);
    } catch (Error $e) {
        echo $e->getMessage(), "\n";
    }

    try {
        var_dump(123 |> = $array[[]]);
    } catch (Error $e) {
        echo $e->getMessage(), "\n";
    }

    try {
        var_dump(123 |> = $array[new stdClass]);
    } catch (Error $e) {
        echo $e->getMessage(), "\n";
    }

    try {
        var_dump(456 |> = $true[123]);
    } catch (Error $e) {
        echo $e->getMessage(), "\n";
    }

    try {
        var_dump(123 |> += $array[]);
    } catch (Error $e) {
        echo $e->getMessage(), "\n";
    }

    try {
        var_dump(123 |> += $array[[]]);
    } catch (Error $e) {
        echo $e->getMessage(), "\n";
    }

    try {
        var_dump(123 |> += $array[new stdClass]);
    } catch (Error $e) {
        echo $e->getMessage(), "\n";
    }

    try {
        var_dump(456 |> += $true[123]);
    } catch (Error $e) {
        echo $e->getMessage(), "\n";
    }

    try {
        var_dump(123 |> += $true->foo);
    } catch (Error $e) {
        echo $e->getMessage(), "\n";
    }
    try {
        var_dump(123 |> += $true->foo);
    } catch (Error $e) {
        echo $e->getMessage(), "\n";
    }
}

test();

?>
--EXPECT--
Cannot add element to the array as the next element is already occupied
Cannot access offset of type array on array
Cannot access offset of type stdClass on array
Cannot use a scalar value as an array
Cannot add element to the array as the next element is already occupied
Cannot access offset of type array on array
Cannot access offset of type stdClass on array
Cannot use a scalar value as an array
Attempt to assign property "foo" on true
Attempt to assign property "foo" on true
