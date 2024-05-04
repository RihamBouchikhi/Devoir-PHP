<?php 
include_once("Rectangle.php");

// Création des rectangles
$Rect1 = new Rectangle(5, 2);
$Rect2 = new Rectangle(20, 10);

// Affichage des caractéristiques des rectangles
echo "Rectangle 1 : " . $Rect1;
echo "Rectangle 2 : " . $Rect2;

// Test les fonctions getLongueur() et getLargeur()
echo "Longueur de Rect1 : " . $Rect1->getLongueur() . "<br>";
echo "Largeur de Rect1 : " . $Rect1->getLargeur() . "<br>";

// Test les fonctions setLongueur() et setLargeur()
$Rect1->setLongueur(8);
$Rect1->setLargeur(3);
echo "Après modification : " . $Rect1;

// Test les fonctions surface() et perimetre()
echo "Surface de Rect1 : " . $Rect1->surface() . "<br>";
echo "Périmètre de Rect1 : " . $Rect1->perimetre() . "<br>";

// Test  la fonction equals()
if ($Rect1->equals($Rect2)) {
    echo "Les rectangles sont identiques. <br>";
} else {
    echo "Les rectangles ne sont pas identiques. <br>";
}
?>
