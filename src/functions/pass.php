<?php



namespace sptf\functions;

use sptf\structs\Context;
use sptf\structs\Result;

require_once __DIR__ . "/../structs/Result.php";



function pass(): void {
    Context::assert(
        new Result(true, debug_backtrace())
    );
}