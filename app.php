<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <style>
        body {
           padding : 50px;
        }
        </style>
    </head>
    <body>
<div class="container">
<?php

/**
* Fichier d'execxution de notre application
* Fichier de test pour l'Orienté Objet
*/

// inclusion de ma Classe Humain (fichier)
include "src/App/class/CMS.class.php";
include "src/App/trait/EvolQuantite.trait.php";
include "src/App/class/Humain.class.php";
include "src/App/interface/Enabled.interface.php";
include "src/App/class/Produit.class.php";
include "src/App/class/Smartphone.class.php";
include "src/App/class/Commentaire.class.php";
include "src/App/class/Manager.class.php";
include "src/App/class/Etudiant.class.php";
include "src/App/class/CheapProduit.class.php";
include "src/App/class/ProduitTTC.class.php";
include "src/App/class/Tablette.class.php";

// création d'un objet (ou instance de classe)
$alexandre = new Humain();
$alexandre->setNom('Black');
$alexandre->setPrenom('Alexandre');

$francois = new Humain();
$francois->setNom('Simitchiev');
$francois->setPrenom('François');

/*
echo "<pre>";
var_dump($alexandre);
echo "</pre>";

$joel = new Humain();
$joel->setNom("Hanson");
$joel->setPrenom("Joel");
var_dump($joel);

$francois = new Humain();
$francois->setNom('Simitchiev');
$francois->setPrenom('François');
var_dump($francois);



$alexandre->setCouleursYeux("Bleus");

echo "<h1>La nouvelle couleur des yeux d'Alexandre est " . 
$alexandre->getCouleursYeux(). "</h1>";


// Exercice 
// Modifier la couleur des cheveux de Joel en Noir
// et afficher sa couleur des cheveux
$joel->setCouleursCheveux("Noir");
echo "<h1>La nouvelle  des cheveux de Joël est " . 
$joel->getCouleursCheveux(). "</h1>";



// Mofifier la couleur des yeux et la taille de françois
// puis afficher sa couleur des yeux et sa taille

$francois->setCouleursYeux("Verts");

echo "<h1>La nouvelle couleur des yeux de François est " . 
$francois->getCouleursYeux(). "</h1>";


$francois->setTaille(220);
echo "<h1>La nouvelle taille de François est " . 
$francois->getTaille(). "cm.</h1>";

$joel->setTaille(180);

echo "<p>".$joel->seDecrire()."</p>";
echo "<p>".$francois->seDecrire()."</p>";
echo "<p>".$alexandre->seDecrire()."</p>";


/**
* Partie 2
*/
/*
echo "<p>".$francois->parler()."</p>";
$joel->setLangue('Russe');

echo "<p>".$joel->parler(true, $francois)."</p>";

echo "<p>".$alexandre->parler()."</p>";


$langues = ['Français', 'Anglais', 'Italien', 'Esapgnol'];
for ($i=0; $i < 4 ; $i++) { 
    $alexandre->setLangue($langues[$i]);
}
$alexandre->setLangue('Français');
$alexandre->setLangue('Anglais');
$alexandre->setLangue('Italien');

echo "<p>Alexandre a un niveau de langue égale à ".$alexandre->getNiveauLangue()."</p>";


$joel->ecrire([
    'Coucou jeune fille', 
    'tu as quelle age?', 
    'je te ramenes chez toi'
]);

$alexandre->ecrire([
    'Hello World!', 
    'Comment vas-tu ?'
]);

$joel->eraseSms([
    'Coucou jeune fille',
    'tu as quelle age?',
]);
$joel->eraseSms(
    'je te ramenes chez toi'
);

echo "<pre>";
var_dump($joel, $alexandre);
echo "</pre>";

$joel->recupererSms($alexandre);

echo "<pre>";
var_dump($joel);
echo "</pre>";
*/


$produit = new Produit();
$produit->setTitre('Mon JOlie Produit');
$produit->setSummary('Descriptiion du Jolie Produit..');
$produit->setQuantite(5);
$produit->setPrix(500);
$produit->setTaxe(20);
$produit->setColors(['bleus','blanc']);

$produitTwo = new Produit();
$produitTwo->setTitre('Mon autre Produit');
$produitTwo->setSummary("L'autre produit..");
$produitTwo->setQuantite(2);
$produitTwo->setPrix(350);
$produitTwo->setTaxe(10);
$produitTwo->setColors(['rouge','vert', 'noir']);

$produit->ajoutAccessoire(['Ecouteurs', $produitTwo]);
$produitTwo->ajoutAccessoire(['Etuis', 'Bandouliere']);


$alexandre->modifierProduit($produit, 10, 750);
$alexandre->gestionPanier($produit);
$alexandre->gestionPanier($produitTwo);

$alexandre->modifyQuantity($produitTwo, 20);
echo $alexandre->showPanier();

echo $alexandre->countCouleurs() . " couleurs";
echo "<p>". $alexandre->moyennePrixPanier(). " €</p>";

$francois->stealCart($alexandre);
echo $alexandre->showPanier();

$alexandre->gestionPanier($produit);
echo $alexandre->showPanier();

$iPhone = new Smartphone();
$iPhone->setPrix(699);
$iPhone->setQuantite(100);

$iPhone->setPoid(100);
$iPhone->setCapacite(32);


/*
echo $alexandre
        ->gestionPanier($produit)
        ->gestionPanier($produitTwo, "ajouter", $francois);


echo '<p>Total : ' . $alexandre->calculPanier() . '€</p>';
*/
// echo "<pre>";
// var_dump($produit);
// echo "</pre>";
// echo "<pre>";
// var_dump($alexandre);
// echo "</pre>";

//echo "<p>" .$alexandre->countAccessories(). " accessoires</p>";


/**

* Reference
* Egalité
* Parcours : foreach()
* clonage...

*/


/*
* Constructeur: initialisation des objets
* Methode statique: prix2 > prix 1
* Constantes Vs Propriété statiques
*
* Exception (meme en JS)
* 
*/


$comment1 = new Commentaire("Contenu du commentaire 1", 6, $alexandre,$produit);
$comment2 = new Commentaire("Contenu du commentaire 2", 1, $francois,$produitTwo);

echo "<pre>";
echo Commentaire::whosBestComment($comment1,$comment2);
echo "</pre>";

try{
$comment3 = new Commentaire("Contenu du commentaire 3", -1, $francois,$produitTwo);
} catch(Exception $e) {
    echo "<p>".$e->getMessage()."</p>";
    $comment3 = new Commentaire("Contenu du commentaire 3", 1, $francois,$produitTwo);
}


try{
$chaineHiFI = new Produit("chaine HiFi","Fugiat et aute aute velit elit.",-1,23,20,["gris","metal"],["enceintes","cables"]);
} catch (Exception $e){
    echo "<p>".$e->getMessage()."</p>";
   try{
       $chaineHiFI = new Produit("chaine HiFi","Fugiat et aute aute velit elit.",1,-1,20,["gris","metal"],["enceintes","cables"]);
   } catch (Exception $e){
    echo "<p>".$e->getMessage()."</p>";
   } finally {
    $chaineHiFI = new Produit("chaine HiFi","Fugiat et aute aute velit elit.",1,54,20,["gris","metal"],["enceintes","cables"]);
   }
}

$florent = new Humain();
$florent->setNom('Dinet');
$florent->setPrenom('Florent');

// $florent->setEmail('adolf@hitl.er');

$regis = new Etudiant("Regis","Favrichon");
$regis->setPanier([$produit,$produitTwo,$produitTwo]);
echo $regis->showPanier();
echo "<pre>";
var_dump($regis);
echo "</pre>";
echo "total panier de Régis : ".$regis->calculPanier() . "<br />";
$regis->reduction();
echo "total panier de Régis : ".$regis->calculPanier() . "<br />";

$regis->resumePanier();


echo $regis->showPaniers();

try {
    $racletteAGlace = new CheapProduit("chaine HiFi","Fugiat et aute aute velit elit.",1,501,20,["gris","metal"],["enceintes","cables"]);
} catch (Exception $e) {
    echo "<p>".$e->getMessage()."</p>";
}

$produitRelou = new ProduitTTC(23,500);
echo $produitRelou->showItem();


$iPhone= new Smartphone("iPhone5","16Go",150,[980,768]);

$tablette1= new Tablette("aiePadePrau","horizontal",100,"32Go",2,[1920,1080],["Wifi"],"Vert");

$tablette2= new Tablette("universPhablet7","vertical",200,"64Go",6,[1900,1600],["Wifi"],"Vert");

echo '<pre>';
echo(Humain::comparerPoid($tablette1,$tablette2));
echo '</pre>';

echo '<pre>';
echo(Humain::comparerResolution($tablette1,$iPhone));
echo '</pre>';

echo '<pre>';
echo(Humain::comparerPrix($tablette1,$iPhone));
echo '</pre>';

var_dump($iPhone->getEnabled());

$regis->desactivation($iPhone);

var_dump($iPhone->getEnabled());

echo '<pre>';
var_dump ($comment1->getDate());
echo '</pre>';
echo "<br />";
echo "La date au format Anglais : " . $comment1->formatterDate($comment1->getDate(),"en");
echo "<br />";
echo "La date au format Français : " . $comment1->formatterDate($comment1->getDate(),"fr");
echo "<br />";



$tablette1->setQuantite(10);

echo $tablette1->getQuantite();
echo "<br />";
$tablette1->plusUnQuantite();
echo $tablette1->getQuantite();
$tablette1->moinsUnQuantite();
echo "<br />";
echo $tablette1->getQuantite();




// BDD OO avec PDO

/*$db = new PDO('mysql:host=localhost;dbname=php4', 'root', 'root');
$manager = new Manager($db);

$manager->add($florent);*/



?>
</div>
    </body>
</html>