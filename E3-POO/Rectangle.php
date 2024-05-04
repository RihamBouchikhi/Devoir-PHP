<?php
        class Rectangle {
            private $longueur;
            private $largeur;
            public function __construct($L, $l) {
                $this->largeur=$L;
                $this->longueur=$l;    
            }
        
            public function getLongueur() {
                return $this->longueur;
            }
            public function getLargeur() {
                return $this->largeur;
            }
            public function setLongueur($long) {
                return $this->longueur = $long;
            }
            public function setLargeur($larg) {
                return $this->largeur = $larg;
            }
            
            public function equals(Rectangle $rect){

                return $this->longueur == $rect->getLongueur() && $this->largeur == $rect->getLargeur();
            }
            
            function surface(){
                return $this->largeur*$this->longueur;
            }
            function perimetre(){
                return 2*($this->largeur+$this->longueur);
            }
            function __toString()
            {
            return "<pre>{Rectangle :"."Largeur:".$this->largeur .
            "<br> Longueur:".$this->longueur.
            "<br> surface:".$this->surface().
            "<br> perimetre:".$this->perimetre().
            "<br>}</pre>";
            }
        }
?>