<html>

<head>
    <title>Page SQL Injection</title>

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

    <?php
    $mysqli = new mysqli("devbdd.iutmetz.univ-lorraine.fr", "leduc41u_appli", "32010660", "leduc41u_prjsecu");
    if (isset($_GET["btn"])) {
        if ($mysqli === false) {
            die("Erreur: Impossible de se connecter" . $mysqli->connect_error);
        } else {

            $nom = $_GET['nom'];
            $valeur = $_GET['depot'];

            //Recup pour l'id
            $nb = "SELECT * from banque";
            $resultat = mysqli_query($mysqli, $nb);
            $idreq = mysqli_num_rows($resultat);   //Lancement de la requête

            $requete = "INSERT INTO banque (idbanque, nom_cl, argent) VALUES ($idreq+1,'$nom',$valeur)";
            //echo($requete);

            try {
                if ($mysqli->query($requete)) {
                    echo "Données ajoutés"; //INSERT INTO banque (idbanque, nom_cl, argent) VALUES (3+1,'reussi',0);DELETE from banque; -- ')) 
                }
            } catch (Exception $exception) {
                die($exception->getMessage());
            }
        }
    }
    ?>
</head>

<body>
    <h3>Banque du Petit puit</h3>
    <h5>Liste des clients</h5>

    <div>
        <form>
            <label>Nom</label><input type="text" name="nom" placeholder="Saisir votre nom">
            <label>Depot</label><input type="text" name="depot" placeholder="déposer votre argent">
            <button type="submit" name="btn">CLICK</button>
            <form>
    </div>

    <div title="tableau des clients">
        <?php
        //   $mysqli = new mysqli("devbdd.iutmetz.univ-lorraine.fr", "leduc41u_appli", "32010660", "leduc41u_prjsecu"); 
        if ($mysqli === false) {
            die("Erreur: Impossible de se connecter" . $mysqli->connect_error);
        } else {
            $sql = 'Select nom_cl,argent from banque ';


            if ($result = mysqli_query($mysqli, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Nom</th>";
                    echo "<th>Argent</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nom_cl'] . "</td>";
                        echo "<td>" . $row['argent'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
        }
        ?>
    </div>


</body>

</html>