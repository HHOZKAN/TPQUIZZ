<?php

session_start();
include('../utils/db_connect.php');

// On sélectionne les questions dans un ordre aléatoire avec une limite de 20 et on les met dans une variable de
// $_SESSION contenant un tableau
$request = $db->prepare('SELECT * FROM questions ORDER BY RAND()');
$request->execute();
$_SESSION['questionsTable'] = $request->fetchAll();

header('Location: ../quizz.php');

?>