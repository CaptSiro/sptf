<?php



namespace sptf\functions;

use sptf\structs\Context;
use sptf\structs\Result;

require_once __DIR__ . "/../structs/Result.php";



function fail(string $reason = ""): void {
    $result = new Result(false, debug_backtrace());

    if ($reason !== "") {
        $result->setMessage($reason);
    }

    Context::assert($result);
}