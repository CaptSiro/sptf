<?php

use sptf\structs\Context;
use sptf\structs\Result;

function pass() {
    Context::assert(
        new Result(true, debug_backtrace())
    );
}