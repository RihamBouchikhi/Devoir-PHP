<?php

    $Login_valide = "RimiAsum";
    $password_valide = "Bouchikhi123?";

    if (isset($_POST['Login']) && isset($_POST['password'])) {

        if ($Login_valide == $_POST['Login'] && $password_valide == $_POST['password']) {

            session_start ();

            $_SESSION['login'] = $_POST['Login'];
            $_SESSION['pwd'] = $_POST['password'];

            echo '<html>';
            echo '<head>';
            echo '<title>session</title>';
            echo '</head>';
            echo '<body>';
            echo '<center>';
            echo "<h2>Bienvenus dans votre espace personnel </h2>";
            echo "<img src=\"B.png\">";
            echo '<center/>';
            echo '<br />';
        
            echo '<a href="deconnexion.php">Déconnection</a>';

        }
        else {
            echo '<body onLoad="alert(\'Membre non reconnu :( \')">';
            echo '<meta http-equiv="refresh" content="0;URL=login.php">';
        }

    }
    else {
        echo 'Les variables du formulaire ne sont pas déclarées.';
    }

?>

