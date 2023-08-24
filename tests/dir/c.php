<?php

use function sptf\functions\expect;
use function sptf\functions\test;

test("call 4 times", function () {
    $fn = func(fn() => 0);

    for ($i = 0; $i < 4; $i++) {
        $fn();
    }

    expect($fn->invokeCount)->toBe(4);
    expect($fn->hasBeenInvoked())->toBe(true);
});

test("catch throw in function", function () {
    $fn = func(function () {
        throw new Exception();
    });

    $fn();

    expect($fn->hasThrown)->toBe(true);
});