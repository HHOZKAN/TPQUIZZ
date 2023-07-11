<?php include_once('./partials/header.php') ?>

<body class="index">
  <main class="container d-flex flex-column justify-content-center align-items-center">
    <h1 class="index-title">L'infini dans les cieux ! </h1>
    <form method="post" action="./process/add_user.php">
      <div class="mt-5 input-group mb-3">
          <input class="form-control" type="text" name="name" placeholder="Entrez un pseudo...">
          <button class="form-control btn btn-secondary" type="submit">Se connecter</button>
      </div>
  </div>
  </form>
</body>


<?php include_once('./partials/footer.php') ?>