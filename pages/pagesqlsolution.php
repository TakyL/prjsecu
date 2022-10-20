<html>
    <head>
        <title>Page SQL Injection</title>

        <?php
    
        if(isset($_GET["btn"]))
        {
            try{
            $pdo = new PDO('mysql:host=devbdd.iutmetz.univ-lorraine.fr;port=3306;dbname=leduc41u_prjsecu;charset=utf8' 
            , "leduc41u_appli", "32010660");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die("ERROR: Could not connect. " . $e->getMessage());
        }

            try{
                $nom = trim($_GET['nom']);
                $valeur = intval(trim($_GET['valeur']));
                //var_dump($nom);
                $rq_ctrl1 = $pdo->prepare("INSERT INTO banque VALUES (?,?,?)");
                $rq_ctrl1->execute([11,$nom,$valeur]);

                echo "Records inserted successfully.";
            } catch(PDOException $e){
                die("ERROR: Could not able to execute $sql. " . $e->getMessage());
            }
        }
        ?>
    </head>
    <body>
      <h3>Banque du Petit puit</h3>
        <h5>Liste des clients</h5>

        <div title="tableau des clients">
            <?php
               $mysqli = new mysqli("devbdd.iutmetz.univ-lorraine.fr", "leduc41u_appli", "32010660", "leduc41u_prjsecu"); 
                if($mysqli === false)
                {
                    die("Erreur: Impossible de se connecter" . $mysqli->connect_error);
                }
                else{
                $sql = 'Select nom_cl,argent from banque ';
                

                if($result = mysqli_query($mysqli, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo "<table>";
                            echo "<tr>";
                                echo "<th>Nom</th>";
                                echo "<th>Argent</th>";
                            echo "</tr>";
                        while($row = mysqli_fetch_array($result)){
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

        <div>
            <form>
            <label>Nom</label><input type="text" name="nom" placeholder="Saisir votre nom">
            <label>Depot</label><input type="text" name="depot" placeholder="déposer votre argent">
            <button  type="submit" name="btn">CLICK</button>
            <form>
        </div>
    </body>
</html>