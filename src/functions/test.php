<?php

namespace sptf\functions;

require_once __DIR__ . "/../structs/Context.php";

use sptf\structs\Context;

function test(string $name, callable $suite): void {
    Context::startSuite();

    $suite();

    Context::stopSuite();

    $time = Context::getTime();

    $failed = [];
    $passed = 0;

    foreach (Context::getAssertions() as $assertion) {
        if ($assertion->result()) {
            $passed++;
            continue;
        }

        $failed[] = $assertion->errorHTML();
    }

    $class = empty($failed) ? 'passed' : 'failed';
    echo "<div class='test $class'>";

    if (!empty($failed)) {
        echo testHeader(false, $name, $time);
        foreach ($failed as $fail) {
            echo "<div>$fail</div>";
        }
    } else {
        echo testHeader(true, $name, $time);
        echo "<div class='assertions'>$passed assertions</div>";
    }

    echo "</div>";
}

function testHeader(bool $outcome, string $name, float $time): string {
    $outcomeText = $outcome ? "PASS" : "FAIL";

    return "
        <div>
            <span class='outcome'>$outcomeText</span>
            <span class='name'>$name</span>
            <span class='time'>$time s</span>
        </div>
    ";
}