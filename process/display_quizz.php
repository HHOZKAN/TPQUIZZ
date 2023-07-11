<?php   
session_start();
include('./utils/db_connect.php');

// On regarde si notre tableau de questions en comporte plus que 0 
if (!count($_SESSION['questionsTable']) == 0) {
    // Si oui, on sélectionne les réponses avec le même id que celui de la question à l'index 0
    $request = $db->prepare('SELECT * FROM answers WHERE id_question = :id_question ORDER BY RAND()');
    $request->execute([
        'id_question' => $_SESSION['questionsTable'][0]['id']
    ]);
    $answersTable = $request->fetchAll();

    // Si la valeur du bouton est égale true donc 1 on incrémente le score de 1
    if (isset($_POST['button'])) {
        if ($_POST['button'] == 1) {
            $_SESSION['score']++;
        }
    } 


include_once('./partials/form_quizz.php');


    // Puis on enlève du tableau de $_SESSION la question à l'index 0
    array_shift($_SESSION['questionsTable']);

} else {
    // Si il n'y a plus de questions dans le tableau, on renvoie sur la page des résultats
    header('Location: ./result.php');
}

?>
