<?php
class Location{

    private int $x;
    private int $y;

    public function __construct(int $x, int $y){
        $this->x = $x;
        $this->y = $y;
    }

    //return value x of the location
    public function getX(): int{
        return $this->x;
    }

    //return value y of the location
    public function getY(): int{
        return $this->y;
    }
}
?>