<?php

namespace sptf\structs;

class Context {
    /** @var Expectation[] $assertions */
    static private array $assertions = [];
    static private float $start = 0.;
    static private float $end = 0.;
    static private int $suitesCount = 0;
    static private bool $isInitialized = false;



    /**
     * @return Expectation[]
     */
    static function getAssertions(): array {
        return self::$assertions;
    }



    static function assert(Expectation $expectation): void {
        self::$assertions[] = $expectation;
    }



    /**
     * @return int
     */
    static function getSuitesCount(): int {
        return self::$suitesCount;
    }



    static function init(): void {
        ob_clean();
        echo "<!doctype html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
                <meta http-equiv='X-UA-Compatible' content='ie=edge'>
                <title>Tests</title>
                
                <style>". file_get_contents(realpath(__DIR__ . '/../css/styles.css')) ."</style>
            </head>
            <body>";

        self::$isInitialized = true;
    }



    /**
     * @return float
     */
    public static function getTime(): float {
        return round((self::$end - self::$start) * 1000) / 1000;
    }



    static function startSuite(): void {
        if (self::$isInitialized === false) {
            self::init();
        }

        self::$assertions = [];
        self::$start = microtime(true);
    }



    static function stopSuite(): void {
        self::$end = microtime(true);
        self::$suitesCount++;
    }
}