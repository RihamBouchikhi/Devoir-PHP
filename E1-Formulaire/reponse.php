<?php
    if($_GET) 
    {
        $n = $_GET['prenom'];
        $a = $_GET['age'];
        if($n!='') {
        echo "<br/><br/>Bonjour " . "" . $n . "👋<br/>";
            if(isset($a)) {
            echo "Vous semblez avoir " . " " . $a ."
            ans 😊 <br/><br/>";
            }
        } 
    }   
    

?>