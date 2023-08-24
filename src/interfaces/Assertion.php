<?php

namespace sptf\interfaces;

interface Assertion {
    function result(): bool;
    function errorHTML(): string;
}