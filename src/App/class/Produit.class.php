<?php

/**
*
*/
class Produit implements Enabled {

  /**
   * ATTRIBUTS
   */
  protected $id = 0;
  protected $titre;
  protected $summary;
  protected $quantite;
  protected $prix;
  protected $taxe;
  protected $colors = [];
  protected $accessoire = [];
  protected $enabled = false; 

  // CONSTRUCT

  public function __construct(
      string $titre = "titre",
      string $summary = "resume",
      int $quantite = 0,
      int $prix = 0,
      int $taxe = 20,
      array $colors = [],
      array $accessoire = [],
      bool $enabled = true
    )
    {
      $this->setTitre($titre);
      $this->setSummary($summary);
      $this->setQuantite($quantite);
      $this->setPrix($prix);
      $this->setTaxe($taxe);
      $this->setColors($colors);
      $this->setAccessoire($accessoire);
      $this->setEnabled($enabled);   
    }

  /**
   * GETTERS & SETTERS
   */

   //id
  public function setId($nb){
    $this->id = $nb;
  }

  public function getId(){
    return $this->id;
  }

  // titre
  public function setTitre($string){
    $this->titre = $string;
    return $this;
  }

  public function getTitre(){
    return $this->titre;
  }

  // summary
  public function setSummary($string){
    $this->summary = $string;
  }

  public function getSummary(){
    return $this->summary;
  }

  // quantite
  public function setQuantite($nb){
    if($nb<0) {
      throw new Exception('La quantité doit être un nombre positif');
    }
    $this->quantite = $nb;
  }

  public function getQuantite(){
    return $this->quantite;
  }

  // prix
  public function setPrix($nb){
    if($nb<0) {
      throw new Exception('Le prix doit être un nombre positif');
    }
    $this->prix = $nb;
  }

  public function getPrix(){
    return $this->prix;
  }

  // taxe
  public function setTaxe($nb){
    $this->taxe = $nb;
  }

  public function getTaxe(){
    return $this->taxe;
  }

  // colors
  public function setColors(array $tab){
    $this->colors = $tab;
  }

  public function getColors(){
    return $this->colors;
  } 

  public function setAccessoire(array $accessoire){
    $this->accessoire = $accessoire;
  }

  public function setEnabled($enable) 
  {
    $this->enabled = $enable;
  } 
  public function getEnabled()
  {
    return $this->enabled;
  }

  // METHODES

  public function getAccessoire(){
    return $this->accessoire;
  }

  public function getTtc(){
      return $this->getPrix() * $this->getQuantite() * 
             ($this->getTaxe() / 100);
  }

  public function countAccesories(){
    return count($this->accessoire);
  }


  /**
  * Retourne un jumbotron du titre, résumé et prix
  */
  public function showItem(){
        return "
        <div class=\"jumbotron\">
            <h2>{$this->titre}</h2>
            <p>{$this->summary}</p>
            <p>{$this->prix}€</p>
        </div>
        ";
    }

    public function ajoutAccessoire(array $newAccessoire){
        $this->accessoire = 
        array_merge($this->accessoire, $newAccessoire);
    }  
 }