<?php


class Smartphone extends Produit {

    // Appel du trait
    use EvolQuantite;

    protected $capacite = "16go";
    protected $poid;
    protected $resolution = ['1900', '1600'];

    // SETTERS

    public function setCapacite($capacite) {
        $this->capacite = $capacite;
    }
    public function setPoid($poid) {
        $this->poid = $poid;
    }
    public function setResolution($resolution) {
        $this->resolution = $resolution;
    }

    // GETTERS
    
    public function getCapacite() {
        return $this->capacite;
    }
    public function getPoid() {
        return $this->poid;
    }
    public function getResolution() {
        return $this->resolution;
    }

    // CONSTRUCTOR

    public function __construct(
        string $titre = "titre",
        string $capacite = "16go",
        int $poid = 0,
        array $resolution = ['1900', '1600']
    )
    {
        $this->titre = $titre;
        $this->capacite = $capacite;
        $this->poid = $poid;
        $this->resolution = $resolution;
        $this->setEnabled(true);
    }







}