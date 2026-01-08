--TEST--
Test pipe to throw with various expressions. Same tests as in Zend/tests/throw/002.phpt but with differences in behaviour.
--FILE--
<?php

try {
    $e = (true ? new Exception('Ternary true 1') : new Exception('Ternary true 2') |> throw);
} catch(Exception $e) {}
echo $e->getMessage() . "\n";

try {
    $exception1 = new Exception('Coalesce non-null 1');
    $exception2 = new Exception('Coalesce non-null 2');
    $e = ($exception1 ?? $exception2 |> throw);
} catch(Exception $e) {}
echo $e->getMessage() . "\n";

try {
    $exception = new Exception('Coalesce assignment non-null 1');
    $e = ($exception ??= new Exception('Coalesce assignment non-null 2') |> throw);
} catch(Exception $e) {}
echo $e->getMessage() . "\n";

$andConditionalTest = function ($condition1, $condition2) {
    return ($condition1 && $condition2
        ? new Exception('And in conditional 1')
        : new Exception('And in conditional 2') |> throw);
};

try {
    $e = $andConditionalTest(false, false);
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $e = $andConditionalTest(false, true);
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $e = $andConditionalTest(true, false);
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $e = $andConditionalTest(true, true);
} catch (Exception $e) {}
echo $e->getMessage() . "\n";

?>
--EXPECT--
Ternary true 1
Coalesce non-null 1
Coalesce assignment non-null 1
And in conditional 2
And in conditional 2
And in conditional 2
And in conditional 1
