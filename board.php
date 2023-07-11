<?php
include_once('./partials/header.php');
include('./utils/db_connect.php');
?>

<body class="board">
    <div class="return">
        <a href="index.php"><img src="./assets/icon_retour.png" alt="flèche de retour"></a>
    </div>
    <main class="container d-flex flex-column justify-content-around align-items-center">
        <div class="justify-content-center align-items-cen ter">
            <a href="./process/initialize_quizz.php">
                <button type="button" class="btn btn-success btn-lg">
                    Jouer au quizz !
                </button>
            </a>
        </div>
        <section class="d-flex justify-content-around">
            <article class="pseudos-scores d-flex flex-column">

<?php
// On sélectionne tous les scores pour savoir leur nombre
$scores = $db->query('SELECT * FROM scores');
$totalScores = $scores->rowCount();
$scoresPerPage = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1; // On donne ) la variable page la valeur recu en get sinon 1
$totalPages = ceil($totalScores / $scoresPerPage); // On définie combien il aura de pages au total
$startIndex = ($page - 1) * $scoresPerPage; // On définie l'index de départ de LIMIT
$endIndex = $startIndex + $scoresPerPage - 1; // Et l'index de fin

// On récupère tous les scores triés du meilleur au pire
$request = $db->prepare('SELECT * FROM scores ORDER BY number DESC LIMIT '.$startIndex.', '.$scoresPerPage);
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
    echo '<div class="d-flex justify-content-around">';
    echo '<p>' . $userList['name'] . '</p>';
    echo '<p>' . $score['number'] . '</p>';
    echo '</div>';
};

// On affiche la liste des numéros des pages
echo '<div class="d-flex justify-content-center gap-3">';
for ($i = 1; $i <= $totalPages; $i++) {
    echo '<a href="?page=' . $i . '">' . $i . '</a> ';
}
echo '</div>';


?>
            </article>
            <article class="graph col-6">
                    <p> Graph </p>
            </article>
        </section>
    </main>
</body>


<?php include_once('./partials/footer.php') ?>