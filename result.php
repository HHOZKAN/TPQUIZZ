<?php
session_start();
include('./utils/db_connect.php');

$request = $db->prepare('INSERT INTO scores (id_user, number) VALUES (:score, :id)');
$request->execute([
    'id' => $_SESSION['id'],
    'score' => $_SESSION['score']
]);
// $idUser = $request->fetchAll();

session_reset();
header('Location: board.php');


?>