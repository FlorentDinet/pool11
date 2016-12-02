<?php

class Tablette extends Produit 
{   
    // Appel du trait
    use EvolQuantite;

    protected   $orientation,
                $poid,
                $capacite,
                $puissance,
                $resolution,
                $connexion,
                $couleurs;

    public function __construct(
        string $titre = "titre",
        string $orientation,
        int $poid,
        string $capacite = "64Go",
        int $puissance,
        array $resolution,
        array $connexion,
        string $couleurs = "blanc"
    )
    {
        $this->titre = $titre;
        $this->orientation = $orientation;
        $this->poid = $poid;
        $this->capacite = $capacite;
        $this->puissance = $puissance;
        $this->resolution = $resolution;
        $this->connexion = $connexion;
        $this->couleurs = $couleurs;
    }

    // GETTERS SETTERS

    public function getPoid(){
        return $this->poid;
    }
    
    public function getResolution(){
        return $this->resolution;
    }

    // METHODES

   public function ajoutAccessoire(array $newAccessoire){
       if(is_int($newAccessoire[0]) && count($newAccessoire)<6)
       {
        $this->accessoire = 
        array_merge($this->accessoire, $newAccessoire);
       } else {
           throw new Exception("nous avons besoin d'un tableau de chaine de caractères", 1);       
       }
    }
}



?>