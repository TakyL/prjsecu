<html>
    <head>
  <?php 

    if(isset($_GET["btn"]))
    {
     
      var_dump(($_GET['id']));
      var_dump($_GET["mdp"]);
    }
  
     
    
?>
    </head>
    <body>
        <img src="../images/logogplus.png" alt="logo de google plus" onerror="">
        <div id="form" >
            <form>
            <input placeholder="Entrer un identifiant" name="id">
            <input placeholder="Entrer votre mot de passe" name="mdp">
            <button  name="btn" >Se connecter</button>
            </form>
        </div>
    </body>
</html>