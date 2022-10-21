<!DOCTYPE html>
<html>
<head>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

<title>Fabrique de cookie - ADMIN</title>



<?php
 function affmodal()  //Affiche la modal
 {
  echo "<script>document.getElementById('ModalCo').style='display:flex'</script>";
 }

 function AjaxModal($url,$nommodal)
 {
     echo "<script>$.ajax('$url',  // request url
       {            
         success: function (data, status, xhr) {    // success callback function
         $('#deux').append(data);
         document.getElementById(`${nommodal}`).style= 'display:flex';
       }
       });
             </script>";
 }

 function AjaxContenu($url)
 {
  echo "<script>$.ajax('$url',  // request url
  {            
    success: function (data, status, xhr) {    // success callback function
    $('#deux').append(data);
    
  }
  });
        </script>";
 }
 

function perm($mail,$mdp) //Permet de savoir si l'utilisateur a les permissions ou non
{
  if($_GET["pwd"]=="123456789" && $_GET["mail"] == "nathanpro@gmail.com")
 {
      return true;//Possède les droits  
}else return false;
}

  //main
session_start();



    //SI user non connecté 
if(empty($_SESSION))
{
  AjaxModal("modal.php","ModalCo");
}

if(isset($_GET["btn"]))
{
  $_SESSION['logmail'] = trim($_GET["mail"]);
  $_SESSION['logmdp']  = trim($_GET["pwd"]);
  if(perm(trim($_GET["mail"]),trim($_GET["pwd"])) === true)
  {
    //AJAX
    AjaxContenu("pageadmin_solutionauto.php"); //Contenu de la page 
  }
else echo "VOUS NE DISPOSEZ PAS DES AUTORISATIONS NECESSAIRES POUR ACCEDER A CETTE PAGE";
}

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
</head>
<body>
<div id="deux"></div>


</div>

</body>
</html>
