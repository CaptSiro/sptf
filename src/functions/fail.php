<?php

namespace sptf\functions;

use sptf\structs\Context;
use sptf\structs\Result;

function fail(string $reason = "") {
    $result = new Result(false, debug_backtrace());

    if ($reason !== "") {
        $result->setMessage($reason);
    }

    Context::assert($result);
}