<?php

namespace sptf;

use sptf\structs\Context;

function test(string $name, callable $suite): void {
    Context::startSuite();

    $suite();

    Context::stopSuite();

    $time = Context::getTime();

    $failed = [];
    $passed = 0;
    $i = -1;

    foreach (Context::getAssertions() as $assertion) {
        $i++;

        if ($assertion->perform()) {
            $passed++;
            continue;
        }

        $failed[] = $assertion->getErrorMessage($i);
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
        echo "<div>$passed assertions</div>";
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