<?php

use function sptf\expect;
use function sptf\test;

$dir_iterator = new RecursiveDirectoryIterator(__DIR__ . "/src");
$iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::CHILD_FIRST);

/** @var SplFileInfo $file */
foreach ($iterator as $file) {
    if (!$file->isFile() || $file->getFilename() === "." || $file->getFilename() === ".." || !str_ends_with($file->getFilename(), ".php")) {
        continue;
    }

    require_once $file->getRealPath();
}



test("it expects", function () {
    expect(1 + 2)->toBe(3);
    expect("hey")->toBe("hey");
});

test("it expects 2", function () {
    expect(3)->toBe(3);
    expect("poggy")->toBe("POGGY");
});