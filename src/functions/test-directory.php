<?php

namespace sptf\functions;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use sptf\structs\Context;

function test_directory($dir): void {
    Context::init();

    $dir_iterator = new RecursiveDirectoryIterator($dir);
    $iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);

    /** @var SplFileInfo $file */
    foreach ($iterator as $file) {
        if (!$file->isFile() || $file->getFilename() === "." || $file->getFilename() === ".." || !str_ends_with($file->getFilename(), ".php")) {
            continue;
        }

        $p = $file->getRealPath();

        echo "<div class='file'>$p</div>";
        require $p;
    }
}