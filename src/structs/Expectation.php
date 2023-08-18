<?php


namespace sptf\structs;


use Closure;

class Expectation {
    private mixed $actual;
    private Closure $compare;



    function __construct(private readonly mixed $expected, private readonly int $line) {}



    function toBe(mixed $value): self {
        $this->actual = $value;
        return $this;
    }



    function compare(Closure $compare): self {
        $this->compare = $compare;
        return $this;
    }



    function perform(): bool {
        $compare = $this->compare ?? fn($a, $b) => $a === $b;

        return boolval($compare($this->expected, $this->actual));
    }



    function getErrorMessage(): string {
        return "
            <div class='index'>[$this->line]</div>
            <div class='expected'>Expected: ". json_encode($this->expected) ."</div>
            <div class='actual'>Got: ". json_encode($this->actual) ."</div>
        ";
    }
}