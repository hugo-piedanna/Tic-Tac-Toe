<?php
require_once("./Coordonnee.php");

//enum by php 7.4
abstract class caseValue{
    const CIRCLE = "O";
    const CROSS = "X";
    const EMPTY = "*";

}

class Cases{

    private Location $loc;
    private String $value;

    public function __construct(int $x, int $y){
        $this->loc = new Location($x, $y);
        $this->value = caseValue::EMPTY;
    }

    //return location's case
    public function getLocation(): Location {
        return $this->loc;
    }

    //return true if the case was a symbol
    public function isBusy(): bool{
        return empty($this->value);
    }

    //set symbol value
    public function setValue(String $value): void{
        $this->value = $value;
    }

    //return symbol value
    public function getValue(): String{
        return $this->value;
    }

    public function showCase(int $i): String{
        if($this->value == caseValue::EMPTY){
            return "<div><button form='interactCase' name='btn_case' value='$i'>$i</button></div>";
        }
        return "<div><p>$this->value</p></div>";
    }

    //Check if equals by location
    public function equals(Cases $case): bool{
        return ($case->getLocation()->getX() == $this->loc->getX() && $case->getLocation()->getY() == $this->loc->getY());
    }

    //Check if the case is busy by the same symbol
    public function hasSameValue(Cases $case): bool{
        return ($this->value === $case->getValue());
    }
}
