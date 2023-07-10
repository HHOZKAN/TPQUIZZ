<?php

session_start();
include('../utils/db_connect.php');

if (!empty($_POST['name'])) {
    // On regarde si un user portant le nom existe
    $request = $db->prepare("SELECT * FROM users WHERE name = :name");
        $request->execute([
            'name' => $_POST['name']
        ]);
        $pseudo = $request->fetch(PDO::FETCH_ASSOC);

        // Si oui on donne les valeurs aux variables session
        if($pseudo) {
            $_SESSION['pseudo'] = $pseudo['name'];
            $_SESSION['id'] = $pseudo['id'];
            $_SESSION['score'] = 0;

        // Si non on insère le pseudo dans la db
        } else{
            $request = $db->prepare("INSERT INTO users(name) VALUES (?)");
            $request->execute([$_POST['name']]);

            // Et on donne les valeurs aux variables session
            $id_pseudo = $db->lastInsertId();
            $_SESSION['pseudo'] = $_POST['name']; 
            $_SESSION['id'] = $id_pseudo;
            $_SESSION['score'] = 0;
        }
}
header('Location: ../board.php');

?>