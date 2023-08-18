<?php

use function sptf\functions\expect;
use function sptf\functions\test;

test("one", function () {
    expect(3)->toBe(3);
    expect("hey")->toBe("hey");
});

test("two", function () {
    expect(3)->toBe(3);
    expect("poggy")->toBe("poggy");
});