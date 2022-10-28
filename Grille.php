<?php
require_once("./Cases.php");
class grille{

    private array $cases;
    private int $counter;

    private static $_instance = null;

    private function __construct(){
        $this->counter = 0;
        $index = 0;
        for($x = 0; $x < 3; $x++){
            for($y = 0; $y < 3; $y++){
                $this->cases[$index] = new Cases($x, $y);
                $index++;
            }
        }
    }

    public static function getInstance(): self{
        if(is_null(self::$_instance)) {
            self::$_instance = new Grille();
        }

        return self::$_instance;
    }

    public function generateGrille(): void{
        echo "<form id='interactCase' method='post'></form> <div class='container'>";
        $index = 0;
        foreach($this->cases as $case){
            echo $case->showCase($index);
            $index++;
        }
        echo "</div>";
    }

    /*
     * change value if the case is not busy
     */
    public function changeValueOf(int $nb_case){
        $c = $this->cases[$nb_case];
        echo "<script>console.log($this->counter)</script>";
        if($this->counter % 2 == 0){
           $c->setValue(caseValue::CROSS);
        }else{
            $c->setValue(caseValue::CIRCLE);
        }

        $this->cases[$nb_case] = $c;
        $this->counter++;
        //$this->checkWin();
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