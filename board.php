<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <main class="container d-flex flex-column justify-content-center align-items-center">
        <div class="justify-content-center align-items-cen ter">
            <a href="./process/initialize_quizz.php">
                <button type="button" class="btn btn-success btn-lg">
                    Jouer au quizz !
                </button>
            </a>
        </div>
        <section class="bg-primary board d-flex">
            <article class="bg-danger pseudos-scores d-flex">
                <div class="pseudos">
                    <p> Pseudo </p>
                </div>
                <div class="scores">
                    <p> Score </p>
                </div>
            </article>
            <article class="bg-warning graph col-6">
                    <p> Graph </p>
            </article>
        </section>
    </main>
</body>
</html>