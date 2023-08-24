<?php

use function sptf\functions\fail;
use function sptf\functions\test;

test("pass", function () {
    pass();
});

test("fail without reason", function () {
    fail();
});

test("fail with reason", function () {
    fail("Some reason");
});