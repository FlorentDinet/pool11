<?php

/**
*
*/
class CheapProduit extends Produit
{

    public function __construct(
      string $titre = "titre",
      string $summary = "resume",
      int $quantite = 0,
      int $prix = 0,
      int $taxe = 20,
      array $colors = [],
      array $accessoire = []
    )
    {
      $this->setTitre($titre);
      $this->setSummary($summary);
      $this->setQuantite($quantite);
      $this->setPrix($prix);
      $this->setTaxe($taxe);
      $this->setColors($colors);
      $this->setAccessoire($accessoire);

      if($prix>500) {
          throw new Exception("Le prix ne peut excéder 500", 1);
      }

    }
    
}
?>
