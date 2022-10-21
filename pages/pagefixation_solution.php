<html>

<head>
    <title>Fixation de session Solution</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: "Lato", sans-serif;
            text-align: center;
            background-color: rgba(204, 181, 193, 0.8);
        }
    </style>
</head>

<?php
session_start();


$old_sessionid = session_id();  //Récupère l'id de la session 
session_regenerate_id(true);    //Regen id de session en supprimant l'ancien

if ($_SESSION['id'] == session_id()) {
    $mdp_admin = "01234";
    $id_admin = "Evili@outlook.fr";
    $pseudo = "Evili_Magic";

    setcookie("PassWord_Admin", $mdp_admin);
    setcookie("Mail_Admin", $id_admin);
    setcookie("Pseudo_Admin", $pseudo);

    $_SESSION['mail'] = $_COOKIE["Mail_Admin"];
    $_SESSION['pwd'] =  $_COOKIE["PassWord_Admin"];
    $_SESSION['ps'] =  $_COOKIE["Pseudo_Admin"];
} else {
    $_SESSION['id'] = session_id();
    $_SESSION['mail'] = null;
    $_SESSION['pwd'] =  null;
    $_SESSION['ps'] =  null;
}
$new_sessionid = session_id();

//print_r($_SESSION);

?>

<body>
    <h1>Bonjour <?php if (isset($_SESSION['ps'])) echo  $_SESSION['ps'];
                else echo "User"; ?></h1>
    <p> Que voulez-vous faire?</p>
</body>

</html>