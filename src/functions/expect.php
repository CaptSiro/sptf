<?php

namespace sptf\functions;

require_once __DIR__ . "/../structs/Expectation.php";

use sptf\structs\Context;
use sptf\structs\Expectation;

function expect(mixed $value): Expectation {
    $e = new Expectation($value, debug_backtrace());

    Context::assert($e);

    return $e;
}