<?php

namespace sptf;

use sptf\structs\Context;
use sptf\structs\Expectation;

function expect(mixed $value): Expectation {
    $trace = debug_backtrace();

    $e = new Expectation($value, $trace[0]['line']);
    Context::assert($e);

    return $e;
}