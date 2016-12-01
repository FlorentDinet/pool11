<?php

// Notre classe Magicien hérite des attributs et méthodes de Personnage.*/
class Etudiant extends Humain
{
    protected $promotion,
              $niveau,
              $ecole,
              $backupPanier;

    public function reduction(){
        foreach ($this->getPanier() as $produit) {
            $prix = $produit->getPrix();
            $prix = $prix - ($prix * 0.10);
            $produit->setPrix($prix);
        }
    }

    public function modifyQuantity(Produit $produit, $quantity){
        if($quantity == $this->panier[array_search($produit, $this->panier)]->getQuantite() ){
            throw new Exception("Erreur la quantité est la même", 1);           
        }
        if($produit->getPrix()>200){
            $this->panier[array_search($produit, $this->panier)]->setQuantite($quantity); 
        }
    }

    public function resumePanier()
    {
        echo $this->showPanier();
        echo"<br />";
        echo "total panier : " . $this->calculPanier();
        echo"<br />";
        echo "Moyenne prix panier : " . $this->moyennePrixPanier();   
    }

    public function backupPanier()
    {
        $this->backupPanier = $this->getPanier();
    }

    public function stealCart($cible){
        $this->setPanier($cible->getPanier());
        if ($cible instanceof Etudiant) {
            $cible->backupPanier();
        }
        $cible->setPanier(null);
    }

    public function restorePanier()
    {
        if($this->getPanier() == null){
            $this->setPanier($backupPanier);
        }
        return $this->getPanier();
    }
}