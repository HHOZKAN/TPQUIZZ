<?php
session_start();
include('./utils/db_connect.php');

$request = $db->prepare('INSERT INTO scores (id_user, number) VALUES (:id, :score)');
$request->execute([
    'id' => $_SESSION['id'],
    'score' => $_SESSION['score']
]);
// $idUser = $request->fetchAll();

$_SESSION['score']=0;
header('Location: board.php');


?>