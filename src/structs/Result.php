<?php

namespace sptf\structs;

use sptf\interfaces\Assertion;

require_once __DIR__ . "/../interfaces/Assertion.php";

readonly class Result implements Assertion {
    private int $line;
    private string $message;



    public function __construct(
        private bool $hasPassed,
        array $trace
    ) {
        $this->line = $trace[0]["line"];
    }



    /**
     * @param string $message
     */
    public function setMessage(string $message): void {
        $this->message = $message;
    }



    function result(): bool {
        return $this->hasPassed;
    }



    function errorHTML(): string {
        $msg = $this->message ?? "Assertion has not been passed";

        return "
            <div class='index'>[$this->line]</div>
            <div class='assertion-failed'>$msg</div>
        ";
    }
}