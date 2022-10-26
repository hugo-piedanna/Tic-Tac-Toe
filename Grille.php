<?php
require_once("./Cases.php");
class grille{

    private array $cases;

    public function __construct(){
        $index = 0;
        for($x = 0; $x < 9; $x++){
            for($y = 0; $y < 9; $y++){
                $this->cases[$index] = new Cases($x, $y);
                $index++;
            }
        }
    }

    //make random location for place symbol
    public function askLocation(String $value): bool{
        try {
            $x = random_int(0, 8);
            $y = random_int(0, 8);
            return $this->play($x, $y, $value);
        } catch (Exception $e) {
            echo $e;
        }
        return false;
    }

    /*
     * try to place a symbol in case
     * return true if game is win
     */
    private function play(int $x, int $y, String $value): bool{
        $case = new Cases($x, $y);
        while(!$this->changeValueOf($case, $value)) {
            $this->askLocation($value);
        }

        return $this->checkWin();
    }

    /*
     * change value if the case is not busy
     */
    private function changeValueOf(Cases $case, String $value): bool{
        $result = false;
        foreach($this->cases as $c){
            if($c->equals($case)){
                if(!$c->isBusy()) {
                    $c->setValue($value);
                    $result = true;
                }
            }
        }
        return $result;
    }

    //return true if the game is finish and print the winner
    private function checkWin(): bool{
        /*
        *   Three ways to win:
        *       - Three same value in same line
        *       - Three same value in same diagonal
        *       - Three same value in same column
        */

        /*
         *  First way
         */
        if($this->cases[0]->hasSameValue($this->cases[1]) && $this->cases[1]->hasSameValue($this->cases[2])){
            echo $this->cases[0]->getValue();
            return true;
        }
        if($this->cases[3]->hasSameValue($this->cases[4]) && $this->cases[4]->hasSameValue($this->cases[5])){
            echo $this->cases[3]->getValue();
            return true;
        }
        if($this->cases[6]->hasSameValue($this->cases[7]) && $this->cases[7]->hasSameValue($this->cases[8])){
            echo $this->cases[6]->getValue();
            return true;
        }

        /*
         *  Second way
         */
        if($this->cases[0]->hasSameValue($this->cases[4]) && $this->cases[4]->hasSameValue($this->cases[8])){
            echo $this->cases[0]->getValue();
            return true;
        }
        if($this->cases[2]->hasSameValue($this->cases[4]) && $this->cases[4]->hasSameValue($this->cases[6])){
            echo $this->cases[2]->getValue();
            return true;
        }

        /*
         *  Third way
         */
        if($this->cases[0]->hasSameValue($this->cases[3]) && $this->cases[3]->hasSameValue($this->cases[6])){
            echo $this->cases[0]->getValue();
            return true;
        }
        if($this->cases[1]->hasSameValue($this->cases[4]) && $this->cases[4]->hasSameValue($this->cases[7])){
            echo $this->cases[1]->getValue();
            return true;
        }
        if($this->cases[3]->hasSameValue($this->cases[5]) && $this->cases[5]->hasSameValue($this->cases[8])){
            echo $this->cases[3]->getValue();
            return true;
        }

        return false;
    }
}

?>