<html>

<head>
  <title> page XSS</title>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      font-family: "Lato", sans-serif
    }
  </style>

  <?php

  if (isset($_GET["btn"])) //Action lors de l'action du bouton
  {

    var_dump(($_GET['id']));
    var_dump($_GET["mdp"]);
  }



  ?>
</head>

<body>
  <h1>Connexion à Google +</h1>
  <div style="display: ruby">
    <img src="../images/logogplus.png" alt="logo de google plus" onerror="">
    <div id="form">
      <form>
        <input placeholder="Entrer un identifiant" name="id">
        <input placeholder="Entrer votre mot de passe" name="mdp">
        <button name="btn">Se connecter</button>
      </form>
    </div>
  </div>

</body>

</html>