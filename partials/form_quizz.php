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
    <p> <?= $_SESSION['score'] ?> </p>       
</main>