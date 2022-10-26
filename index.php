<?php
require_once("./Grille.php");

$grille = new grille();

$value = caseValue::CIRCLE;

//play until the game is done
while($grille->askLocation($value)){
    if($value === caseValue::CIRCLE){
        $value = caseValue::CROSS;
    }else{
        $value = caseValue::CIRCLE;
    }
}
