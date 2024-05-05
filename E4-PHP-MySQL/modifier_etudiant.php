<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestionetudiants";
    // Création de la connexion
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Tester la connexion
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    //Après appel de la page on récupéré le numéro du etudiant en question
    if(isset($_GET["num_etu"]))
        {
    //protection de données
    $idm = mysqli_real_escape_string($conn,$_GET["num_etu"]);
    $sql = "SELECT * FROM etudiants WHERE num_etu=$idm";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) 
    {
    // Récupérer des informations du etudiant en question qui seront afficher par la suite dans le formulaire
    $row = mysqli_fetch_assoc($result);
    $num_etu=$row["num_etu"];
    $nom_etud=$row["nom_etud"];
    $prenom_etud=$row["prenom_etud"];
    $date_nais=$row["date_nais"];
    $sexe=$row["sexe"];
    $adresse =$row["adresse"];
    } 
    else
    {
    //Si erreur envoie de message à la page etudiant.php
    $message="L'étudiant est introuvable";
    header("Location:etudiant.php?message=$message");
    }
    }
    // Après clic sur le bouton modifier on récupère les données envoyées par la méthode post
    if(count($_POST)>3) 
    {
    $nom_etud = mysqli_real_escape_string($conn,$_POST["nom_etud"]);
    $prenom_etud = mysqli_real_escape_string($conn, $_POST["prenom_etud"]);
    $date_nais = mysqli_real_escape_string($conn, $_POST["date_nais"]);
    $sexe = mysqli_real_escape_string($conn, $_POST["sexe"]);
    $adresse = mysqli_real_escape_string($conn, $_POST["adresse"]);
    $num_etu=mysqli_real_escape_string($conn, $_POST["num_etu"]);
    $sql = "update etudiants set nom_etud='{$nom_etud}' , prenom_etud='{$prenom_etud}', 
    date_nais='{$date_nais}', sexe='{$sexe}', adresse='{$adresse}' 
    WHERE num_etu=$num_etu";
    //executer le requete de l'update et redirection vers la page livre.php
    if (mysqli_query($conn, $sql)) {
    $message= "L'étudiant a été mis à jour avec succes";
    } else {
    $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    
    }
    header("Location:etudiant.php?message=$message");
    }
?>
<!-- Afficher le formulaire pour le remplissage des données du livre récupéré en haut.-->
<html>
    <head>
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
            padding-top: 100px;;
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
        <div class="frm">
            <form name="exe" action="modifier_etudiant.php" method="post">
                <fieldset>
                    <legend>Modifier un etudiant</legend>
                    <input type="hidden" id="num_etu" name="num_etu" value="<?php 
                    if(isset($num_etu)) { echo $num_etu; } ?>"><br/> <br/>
                    <label for="nom_etud"> Nom de l'étudiant </label>
                    <input type="text" id="nom_etud" name="nom_etud" required value="<?php 
                    if(isset($nom_etud)) { echo $nom_etud; } ?>"><br/> <br/>
                    <label for="prenom_etud"> Prenom de l'étudiant </label><input type="text" 
                    id="prenom_etud" name="prenom_etud" required value="<?php 
                    if(isset($prenom_etud)) { echo $prenom_etud; } ?>"><br/> <br/>
                    <label for="date_nais"> Date de naissance</label>
                    <input type="date" id="date_nais" name="date_nais" required value="<?php 
                    if(isset($date_nais)) { echo $date_nais; } ?>"><br/> <br/>
                    <label for="sexe"> Sexe</label>
                    <input type="text" id="sexe" name="sexe" required value="<?php 
                    if(isset($sexe)) { echo $sexe; } ?>"><br/> <br/>
                    <label for="adresse"> Adresse </label>
                    <input type="text" id="adresse" name="adresse" required value="<?php 
                    if(isset($adresse)) { echo $adresse; } ?>"><br/> <br/>
                    <input type="submit" value="Modifier">
                </fieldset>
            </form>
        </div>
    </body>
</html>

