--TEST--
Test pipe to throw with various expressions. Same tests as in Zend/tests/throw/002.phpt with same behaviour.
--FILE--
<?php

class Foo {
    public function createNotFoundException() {
        return new Exception('Not found');
    }

    public function throwException() {
        $this->createNotFoundException() |> throw;
    }

    public static function staticCreateNotFoundException() {
        return new Exception('Static not found');
    }

    public static function staticThrowException() {
        static::staticCreateNotFoundException() |> throw;
    }
}

try {
    (new Foo())->throwException();
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    Foo::staticThrowException();
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    (true ? new Exception('Ternary true 1') : new Exception('Ternary true 2')) |> throw;
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    (false ? new Exception('Ternary false 1') : new Exception('Ternary false 2')) |> throw;
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $exception1 = new Exception('Coalesce non-null 1');
    $exception2 = new Exception('Coalesce non-null 2');
    ($exception1 ?? $exception2) |> throw;
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $exception1 = null;
    $exception2 = new Exception('Coalesce null 2');
    ($exception1 ?? $exception2) |> throw;
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $exception = new Exception('Assignment') |> throw;
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $exception = null;
    $exception ??= new Exception('Coalesce assignment null') |> throw;
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $exception = new Exception('Coalesce assignment non-null 1');
    ($exception ??= new Exception('Coalesce assignment non-null 2')) |> throw;
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

$andConditionalTest = function ($condition1, $condition2) {
    ($condition1 && $condition2
        ? new Exception('And in conditional 1')
        : new Exception('And in conditional 2'))
        |> throw;
};

try {
    $andConditionalTest(false, false);
} catch(Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $andConditionalTest(false, true);
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $andConditionalTest(true, false);
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $andConditionalTest(true, true);
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

?>
--EXPECT--
Not found
Static not found
Ternary true 1
Ternary false 2
Coalesce non-null 1
Coalesce null 2
Assignment
Coalesce assignment null
Coalesce assignment non-null 1
And in conditional 2
And in conditional 2
And in conditional 2
And in conditional 1
