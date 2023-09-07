<?php



namespace sptf\structs;

use Closure;
use sptf\interfaces\Assertion;
use sptf\interfaces\Expect;

require_once __DIR__ . "/../interfaces/Assertion.php";
require_once __DIR__ . "/../interfaces/Expect.php";



class Expectation implements Assertion, Expect {
    private mixed $expected;
    private Closure $compare;
    private readonly int $line;



    function __construct(
        private readonly mixed $actual,
        array $trace
    ) {
        $this->line = $trace[0]['line'];
    }



    function toBe(mixed $value): self {
        $this->expected = $value;
        return $this;
    }



    function compare(Closure $compare): self {
        $this->compare = $compare;
        return $this;
    }



    function result(): bool {
        $compare = $this->compare ?? fn($a, $b) => $a === $b;

        return boolval($compare($this->expected, $this->actual));
    }



    function errorHTML(): string {
        return "
            <div class='index'>[$this->line]</div>
            <div class='expected'>Expected: ". json_encode($this->expected) ."</div>
            <div class='actual'>Got: ". json_encode($this->actual) ."</div>
        ";
    }
}