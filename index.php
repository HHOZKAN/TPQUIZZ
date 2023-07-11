<?php include_once('./partials/header.php') ?>


<main class="container d-flex flex-column justify-content-center align-items-center">
    <h1 class="border border-primary">Apprendre un don de dieu !</h1>
    <form method="post" action="./process/add_user.php">
        <div class="d-flex flex-column">
            <input type="text" name="name" placeholder="Entrez un pseudo...">
            <button type="submit">Se connecter</button>
        </div>
    </form>
</main>


<?php include_once('./partials/footer.php') ?>