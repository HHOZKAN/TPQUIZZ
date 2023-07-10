<?php   
session_start();
include('./utils/db_connect.php');

// On regarde si notre tableau de questions en comporte plus que 0 
if (count($_SESSION['questionsTable']) > 0) {
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

?>

<main class="container">
        <div class="question border d-flex justify-content-center align-items-center">
            <p> <?= $_SESSION['questionsTable'][0]['text'] ?> </p>
        </div>
        <form method="post" action="quizz.php" class="answers d-flex flex-column">
            <div class="line1 d-flex justify-content-between">
                <button name="button" value="<?= $answersTable[0]['isTrue'] ?>" type="submit" class="cell border d-flex justify-content-center">
                    <?= $answersTable[0]['text'] ?>
                </button>
                <button name="button" value="<?= $answersTable[1]['isTrue'] ?>" type="submit" class="cell border d-flex justify-content-center">
                    <?= $answersTable[1]['text'] ?>
                </button>
            </div>
            <div class="line2 d-flex justify-content-between">
                <button name="button" value="<?= $answersTable[2]['isTrue'] ?>" type="submit" class="cell border d-flex justify-content-center">
                    <?= $answersTable[2]['text'] ?>
                </button>
                <button name="button" value="<?= $answersTable[3]['isTrue'] ?>" type="submit" class="cell border d-flex justify-content-center">
                    <?= $answersTable[3]['text'] ?>
                </button>
            </div>
        </div>
        <p> <?= count($_SESSION['questionsTable']) ?> </p>      
    </main>

<?php 

    // Puis on enlève du tableau de $_SESSION la question à l'index 0
    array_shift($_SESSION['questionsTable']);

} else {
    // Si il n'y a plus de questions dans le tableau, on renvoie sur la page des résultats
    header('Location: result.php');
}

?>
