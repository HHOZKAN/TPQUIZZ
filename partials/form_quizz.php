<body class="quizz">
    <main class="container d-flex flex-column justify-content-center gap-4">
        <div class="question border d-flex justify-content-center align-items-center">
            <p class="border"> <?= $_SESSION['questionsTable'][0]['text'] ?> </p>
        </div>
        <form method="post" action="quizz.php" class="answers d-flex flex-column gap-4">
            <div class="line1 d-flex justify-content-between">
                <button name="button" value="<?= $answersTable[0]['isTrue'] ?>" type="submit" class="btn btn-primary d-flex justify-content-center align-items-center">
                    <?= $answersTable[0]['text'] ?>
                </button>
                <button name="button" value="<?= $answersTable[1]['isTrue'] ?>" type="submit" class="btn btn-danger d-flex justify-content-center align-items-center">
                    <?= $answersTable[1]['text'] ?>
                </button>
            </div>
            <div class="line2 d-flex justify-content-between">
                <button name="button" value="<?= $answersTable[2]['isTrue'] ?>" type="submit" class="btn btn-success d-flex justify-content-center align-items-center">
                    <?= $answersTable[2]['text'] ?>
                </button>
                <button name="button" value="<?= $answersTable[3]['isTrue'] ?>" type="submit" class="btn btn-warning d-flex justify-content-center align-items-center">
                    <?= $answersTable[3]['text'] ?>
                </button>
            </div>
        </div>
        <p> <?= count($_SESSION['questionsTable']) ?> </p>
        <p> <?= $_SESSION['score'] ?> </p>       
    </main>
</body>