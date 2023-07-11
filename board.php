<?php
include_once('./partials/header.php');
include('./utils/db_connect.php');
?>


<main class="container d-flex flex-column justify-content-center align-items-center">
    <div class="justify-content-center align-items-cen ter">
        <a href="./process/initialize_quizz.php">
            <button type="button" class="btn btn-success btn-lg">
                Jouer au quizz !
            </button>
        </a>
    </div>
    <section class="bg-primary board d-flex">
        <article class="bg-danger pseudos-scores d-flex flex-column">

<?php
// On récupère tous les scores triés du meilleur au pire
$request = $db->prepare('SELECT * FROM scores ORDER BY number DESC ');
$request->execute();
$scoreList = $request->fetchAll(PDO::FETCH_ASSOC);

// Pour chaque score, on récupère le pseudo de l'id associé
foreach ($scoreList as $score) {
    $request2 = $db->prepare('SELECT * FROM users WHERE id = :id');
    $request2->execute([
        'id' => $score['id_user']
    ]);
    $userList = $request2->fetch(PDO::FETCH_ASSOC);
    // Dans la boucle, on crée les balises qui vont afficher le pseudo et le score
    echo '<div class="d-flex">';
    echo '<p>' . $userList['name'] . '</p><br>';
    echo '<p>' . $score['number'] . '</p><br>';
    echo '</div>';
};
?>

        </article>
        <article class="bg-warning graph col-6">
                <p> Graph </p>
        </article>
    </section>
</main>









<!-- include('../utils/db_connect.php');

$request = $db->prepare('SELECT * FROM scores ORDER BY number DESC'); // Récupère tous les scores triés du meilleur au pire
$request->execute();
$scoresList = $request->fetchAll(PDO::FETCH_ASSOC);

echo '<section>';
echo '<div>';
echo '<div>';
echo '<table>'; // Balise ouvrante du tableau

echo '<tr>'; // Première ligne pour les titres des colonnes
echo '<th>Utilisateur</th>';
echo '<th>Score</th>';
echo '</tr>';

foreach ($scoresList as $score) {
    $userid = $score['id_user'];
    $listuserstmnt = $db->prepare('SELECT * FROM users WHERE id = :userid');
    $listuserstmnt->bindParam(':userid', $userid);
    $listuserstmnt->execute();
    $listuser = $listuserstmnt->fetch(PDO::FETCH_ASSOC);

    echo '<tr>'; // Nouvelle ligne pour chaque score
    echo '<td>' . $listuser['name'] . '</td>'; // Nom de l'utilisateur
    echo '<td>' . $score['number'] . '</td>'; // Score
    echo '</tr>';
}

echo '</table>'; // Balise fermante du tableau
echo '</div>';
echo '</div>';
echo '</section>'; -->


<?php include_once('./partials/footer.php') ?>