<?php
session_start();
include('./utils/db_connect.php');
include_once('./partials/header.php');

// On insère dans les scores les valeurs qui se trouvent dans les variables $_SESSION
$request = $db->prepare('INSERT INTO scores (id_user, number) VALUES (:id, :score)');
$request->execute([
    'id' => $_SESSION['id'],
    'score' => $_SESSION['score']
]);

// On adapte la réponse en fonction du score
if ($_SESSION['score'] >= 17) {
    $response = "Arrête d'utiliser chatgpt !";
} elseif ($_SESSION['score'] >= 14 && $_SESSION['score'] < 17) {
    $response = "Bravo le veau !";
} elseif ($_SESSION['score'] >= 10 && $_SESSION['score'] < 14) {
    $response = "Il y a encore du progrès à faire mais c'est bien.";
} elseif ($_SESSION['score'] >= 7 && $_SESSION['score'] < 10) {
    $response = "Pas bien folichon tout ça...";
} else {
    $response = "Nul à chier, tu devrais avoir honte.";
};

?>

<h2> <?= $response ?> </h2>
<p>Ton score est de : <?= $_SESSION['score'] ?> </p>
<a href="./board.php"><button>Continuer</button></a>


<?php include_once('./partials/header.php'); ?>





<!-- // On reset uniquement le score de session à 0
$_SESSION['score'] = 0;

// On sélectionne le score lié au dernier id qui vient d'être insert (donc celui du dessus), on ne prend pas celui
// de la session car on va le remettre à 0
$id_score = $db->lastInsertId();
$request = $db->prepare('SELECT number FROM scores WHERE id = :id');
$request->execute([
    'id' => $id_score
]);
$score = $request->fetch();
// var_dump($score);

// On adapte la réponse en fonction du score

if ($score['number'] >= 17) {
    $response = "Arrête d'utiliser chatgpt !";
} elseif ($score['number'] >= 14 && $score['number'] < 17) {
    $response = "Bravo le veau !";
} elseif ($score['number'] >= 10 && $score['number'] < 14) {
    $response = "Il y a encore du progrès à faire mais c'est bien.";
} elseif ($score['number'] >= 7 && $score['number'] < 10) {
    $response = "Pas bien folichon tout ça...";
} else {
    $response = "Nul à chier, tu devrais avoir honte.";
}

?>

include_once('./partials/header.php');


header('Location: ../result.php'); -->
