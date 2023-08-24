<?php

namespace sptf\functions;

require_once __DIR__ . "/../structs/Expectation.php";

use sptf\interfaces\Expect;
use sptf\structs\Context;
use sptf\structs\Expectation;

function expect(mixed $value): Expect {
    $e = new Expectation($value, debug_backtrace());

    Context::assert($e);

    return $e;
}