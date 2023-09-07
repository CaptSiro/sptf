<?php

namespace sptf\functions;

use Closure;
use sptf\structs\Func;

require_once __DIR__ . "/../structs/Func.php";

function func(Closure $fn, bool $propagateExceptions = false): Func {
    return new Func($fn, $propagateExceptions);
}