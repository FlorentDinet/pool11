<?php

/**
*
*/
class ProduitTTC extends Produit
{
    protected $Ttc = 0;

    public function __construct(
      int $quantite = 0,
      int $prix = 0
    )
    {
      $this->setQuantite($quantite);
      $this->setPrix($prix);
      $this->Ttc = $this->getTtc();
    }

    public function showItem(){
        return "
        <div class=\"jumbotron\">
            <span class='badge'>{$this->quantite}</span>
            <p>{$this->prix}€</p>
        </div>
        ";
    }
}
?>