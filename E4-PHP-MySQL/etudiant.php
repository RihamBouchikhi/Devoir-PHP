<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    // ou $password = "root";
    $dbname = "gestionetudiants";
    // Création de la connexion
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Tester la connexion 
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    //Après clic sur le bouton "Envoyer" envoie de données par post
    if(count($_POST)>2) {
        //récupération et protection des données envoyées
        $nom_etud = mysqli_real_escape_string($conn, $_POST["nom_etud"]);
        $prenom_etud = mysqli_real_escape_string($conn, $_POST["prenom_etud"]);
        $date_nais = mysqli_real_escape_string($conn,$_POST["date_nais"]);
        $sexe = mysqli_real_escape_string($conn, $_POST["sexe"]);
        $adresse = mysqli_real_escape_string($conn, $_POST["adresse"]);
        $sql = "INSERT INTO etudiants (nom_etud, prenom_etud, date_nais, sexe, 
        adresse)
        VALUES ('{$nom_etud}', '{$prenom_etud}', '{$date_nais}', '{$sexe}', 
        '{$adresse}')";
        //exécuter la requête d'insertion
        if (mysqli_query($conn, $sql)) {
        $message= "l'étudiant a été ajouté avec succès";
        } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    if(isset($_GET["message"])){
    $message=$_GET["message"];
    }
    ?>

<!doctype html>
<html>
    <head>
        <title>PHP MYSQL " </title>
        <meta charset="utf-8">
        <style type="text/css">
            /* Des styles pour la mise en forme de la page*/
            body {
                background-image: url('image2.jpg');
                background-repeat: no-repeat; 
                background-size: cover; 
                
            }
            div{
            margin: auto;
            width: 600px;
            margin-bottom: 20px;
            } 
            label{
            display: block;
            width: 150px;
            color: white;
            float: left;
            }
            legend{
                color:white;
                margin-bottom: 10px;
            }
            thead{
                background: #F08484;
                color: black
            }
            tbody{
                background: rgb(201, 187, 187) !important;
                color: white
            }
            td,th{
            width: 100px;
            text-align: center;
            border: 1px solid white;
            }
            a{
                color: red;
            }
            
            .message{
                background: #F08484;
                color:black;
                padding: 10px;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>
    
        <?php
            if(isset($message)) { echo "<div class='message'>".$message."</div>"; } 
        ?>
        <div class="frm">
            <form name="exe" action="etudiant.php" method="post">
                <fieldset>
                    <legend>Ajouter un etudiant</legend>
                    
                    <label for="nom_etud">Nom de l'étudiant</label>
                    <input type="text" id="nom_etud" name="nom_etud" required autofocus placeholder="votre nom"> <br/> <br/>

                    <label for="prenom_etud">Prénom de l'étudiant</label>
                    <input type="text" id="prenom_etud" name="prenom_etud" required placeholder="votre prénom"><br/> <br/>

                    <label for="date_nais">Date de naissance</label>
                    <input type="date" id="date_nais" name="date_nais" required><br/> <br/>
                    
                    <label for="sexe">Sexe</label>
                    <input type="text" id="sexe" name="sexe" required placeholder="votre sexe (H/F)"><br/> <br/>

                    <label for="adresse">Adresse </label>
                    <input type="text" id="adresse" name="adresse" required 
                    placeholder="votre adresse"><br/> <br/>
                    
                    <input type="submit" value="Envoyer">
                </fieldset>
            </form>
        </div>
    
        <div class="grid">
            <table cellspacing="0">
                <thead>
                <tr>
                    <th>Numéro l'étudiant</th>
                    <th>Nom d'étudiant</th>
                    <th>Prénom d'étudiant</th>
                    <th>Date</th>
                    <th>Sexe</th>
                    <th>Adresse</th>
                    <th colspan="2">Opérations</th>
                </tr>
                </thead>
                <tbody>

                    <!-- Récupération de la liste des livres -->
                    <?php
                        $sql = "SELECT * FROM etudiants";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) 
                        {
                        // Parcourir les lignes de résultat
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                        echo "<tr><td> " . $row["num_etu"]. "</td><td>" . $row["nom_etud"]. "</td><td>" . 
                        $row["prenom_etud"]."</td><td>" . $row["date_nais"]."</td><td>" . 
                        $row["sexe"]."</td><td>" . $row["adresse"] ."</td><td>
                        <a href=\"modifier_etudiant.php?num_etu=".$row["num_etu"]."\">Modifier</a></td>"
                        ."</td><td>
                        <a href=\"supprimer_etudiant.php?num_etu=".$row["num_etu"]."\" onclick=\"return confirm('Vous voulez vraiment supprimer cet etudiant')\">Supprimer</a></td></tr>";

                        }
                        }
                    ?>
                </tbody>
            </table>
        </div>


    </body>