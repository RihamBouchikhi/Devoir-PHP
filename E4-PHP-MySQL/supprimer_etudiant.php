<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestionetudiants";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    if(!empty($_GET["num_etu"]))
    {
    //Supprimer le livre dont le numéro est envoyé avec l'URL
    $ids = mysqli_real_escape_string($conn,$_GET["num_etu"]);
    $sql = "DELETE FROM etudiants WHERE num_etu=$ids";
    echo $sql;
    if (mysqli_query($conn, $sql)) {
    $message= "l'étudiant a été supprimé avec succés";
    } else {
    $mesasge="Erreur pendant la suppression du étudiant: " . mysqli_error($conn);
    }
    //Redirection vers la page liver.php avec un message résultat de la suppression 
    header("Location:etudiant.php?message=$message");
    }

?>