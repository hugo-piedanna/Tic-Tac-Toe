<?php
require_once("./Grille.php");


if(isset($_POST['btn_case'])){
    $id_case = $_POST['btn_case'];

    grille::getInstance()->changeValueOf($id_case);

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h2>Tic Tac Toe</h2>
    <?php grille::getInstance()->generateGrille(); ?>
</body>
</html>
