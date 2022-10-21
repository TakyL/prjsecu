<html>

<head>
    <title>Page SQL Injection Solution </title>

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
    error_reporting(E_ALL & ~E_NOTICE);
    $mysqli = new mysqli("devbdd.iutmetz.univ-lorraine.fr", "leduc41u_appli", "32010660", "leduc41u_prjsecu"); //Connexion 




    function id($mysqli)   //Retourne l'id de la requete
    {
        //Recup pour l'id
        $nb = "SELECT * from banque";
        $resultat = mysqli_query($mysqli, $nb);
        $idreq = mysqli_num_rows($resultat);
        return $idreq;
    }


    if (isset($_GET["btn"])) //Action lors du bouton 
    {

        try {    //Tentative de connexion à la base de données
            $pdo = new PDO(
                'mysql:host=devbdd.iutmetz.univ-lorraine.fr;port=3306;dbname=leduc41u_prjsecu;charset=utf8',
                "leduc41u_appli",
                "32010660"
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }

        try {



            $nom = trim($_GET['nom']);  //Récupère le nom
            $valeur = intval(trim($_GET['depot']));    //Récupère l'argent
            //var_dump($nom);
            $rq_ctrl1 = $pdo->prepare("INSERT INTO banque VALUES (?,?,?)"); //Requête préparé
            $rq_ctrl1->execute([id($mysqli) + 1, $nom, $valeur]);
        } catch (PDOException $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
    }

    function contrsuction()
    {
        $mysqli = new mysqli("devbdd.iutmetz.univ-lorraine.fr", "leduc41u_appli", "32010660", "leduc41u_prjsecu"); //Connexion 
        if ($mysqli === false) {
            die("Erreur: Impossible de se connecter" . $mysqli->connect_error);
        } else {
            $sql = 'Select nom_cl,argent from banque '; //Récupère tous les noms 


            if ($result = mysqli_query($mysqli, $sql)) {  //Affichage des résultats dans un tableau
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
        contrsuction();  //Construit le tableau
        ?>
    </div>


</body>

</html>