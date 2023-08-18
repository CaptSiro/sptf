<?php

use function sptf\functions\expect;
use function sptf\functions\test;

test("it expects", function () {
    expect(5)->toBe(5);
    expect("laggy")->toBe("LAGGY");
});

test("it expects 2", function () {
    expect(3)->toBe(3);
    expect("hey")->toBe("hey");
});