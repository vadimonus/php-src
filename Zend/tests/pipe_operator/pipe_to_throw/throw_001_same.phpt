--TEST--
Pipe to throw expression. Same tests as in Zend/tests/throw/001.phpt with same behaviour.
--FILE--
<?php

try {
    $result = true && new Exception("true && pipe to throw") |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = false && new Exception("false && pipe to throw") |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = true and new Exception("true and pipe to throw") |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = false and new Exception("false and pipe to throw") |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = true || new Exception("true || pipe to throw") |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = false || new Exception("false || pipe to throw") |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = true or new Exception("true or pipe to throw") |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = false or new Exception("false or pipe to throw") |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = null ?? new Exception("null ?? pipe to throw") |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = "foo" ?? new Exception('"foo" ?? pipe to throw') |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = null ?: new Exception("null ?: pipe to throw") |> throw ;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = "foo" ?: new Exception('"foo" ?: pipe to throw') |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $callable = fn() => new Exception("fn() => pipe to throw") |> throw;
    var_dump("not yet");
    $callable();
} catch (Exception $e) {
    var_dump($e->getMessage());
}

$result = "bar";
try {
    $result = new Exception() |> throw;
} catch (Exception $e) {}
var_dump($result);

try {
    var_dump(
        new Exception("exception 1") |> throw,
        new Exception("exception 2") |> throw
    );
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = true ? true : new Exception("true ? true : throw") |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    $result = false ? true : new Exception("false ? true : pipe to throw") |> throw;
    var_dump($result);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

try {
    new Exception() + 1 |> throw;
} catch (Throwable $e) {
    var_dump($e->getMessage());
}

try {
    // Behaviour differs from
    // throw $exception = new Exception()
    // because pipe has higher priority than assignment
    $exception = new Exception('$exception = new Exception() |> throw;') |> throw;
} catch (Exception $e) {
}
var_dump(isset($exception));

try {
    // Behaviour differs from
    // throw $exception ??= new Exception()
    // because pipe has higher priority than assignment
    $exception = null;
    $exception ??= new Exception('$exception ??= new Exception() |> throw;') |> throw;
} catch (Exception $e) {}
var_dump($exception);

try {
    ($exception = new Exception('($exception = new Exception()) |> throw;')) |> throw;
} catch (Exception $e) {}
var_dump($exception->getMessage());

try {
    $exception = null;
    ($exception ??= new Exception('($exception ??= new Exception()) |> throw;')) |> throw;
} catch (Exception $e) {}
var_dump($exception->getMessage());

try {
    null ?? new Exception('null ?? new Exception() |> throw;') |> throw;
} catch (Exception $e) {
    var_dump($e->getMessage());
}

?>
--EXPECT--
string(21) "true && pipe to throw"
bool(false)
string(22) "true and pipe to throw"
bool(false)
bool(true)
string(22) "false || pipe to throw"
bool(true)
string(22) "false or pipe to throw"
string(21) "null ?? pipe to throw"
string(3) "foo"
string(21) "null ?: pipe to throw"
string(3) "foo"
string(7) "not yet"
string(21) "fn() => pipe to throw"
string(3) "bar"
string(11) "exception 1"
bool(true)
string(28) "false ? true : pipe to throw"
string(42) "Unsupported operand types: Exception + int"
bool(false)
NULL
string(40) "($exception = new Exception()) |> throw;"
string(42) "($exception ??= new Exception()) |> throw;"
string(33) "null ?? new Exception() |> throw;"
