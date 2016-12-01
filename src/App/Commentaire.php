<?php

  class Commentaire {

    public static $compteurCom10 = 0; 
    public static $notesCom = []; 
    public static $nombreDeCom = 0;

    protected $id;
    protected $content;
    protected $countEditContent = 0;
    protected $note;
    protected $date;
    protected $visible;
    protected $humain;
    protected $createdByAlex;
    protected $produit;
    protected $trust;


  /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of Content
     *
     * @param mixed content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
        $this->countEditContent++;
        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param mixed date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of Humain
     *
     * @return mixed
     */
    public function getHumain()
    {
        return $this->humain;
    }

    /**
     * Set the value of Humain
     *
     * @param mixed humain
     *
     * @return self
     */
    public function setHumain($humain)
    {
        $this->humain = $humain;
        if($humain->getPrenom() === "Alexandre") {
            $this->createdByAlex = true;
        }
        return $this;
    }

    /**
     * Get the value of Produit
     *
     * @return mixed
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set the value of Produit
     *
     * @param mixed produit
     *
     * @return self
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }
    
    /**
     * Get the value of trust
     *
     * @return mixed
     */
    public function getTrust()
    {
        return $this->trust;
    }

    /**
     * Set the value of trust
     *
     * @param mixed trust
     *
     * @return self
     */
    public function setTrust(bool $trust)
    {
        $this->trust = $trust;

        return $this;
    }

    /**
    *   CONSTRUCTOR 
    */

    public function __construct($content, $note, Humain $humain, Produit $produit) {
            $this->content = $content;
            $this->note = $note;
            $this->humain = $humain;
            $this->produit = $produit;
            $this->visible = false;
            $this->date = date('d/m/Y');


            if($note>10) {
                self::$compteurCom10++;
            }

            if ($note<0 | $note>20) {
                throw new Exception('La note doit être comprise entre 0 et 20');
            }

            array_push(self::$notesCom,$note);
            echo "Moyenne des notes des commentaires : " . self::moyNoteCom() . "<br />";

            self::$nombreDeCom++;
            if (self::$nombreDeCom>7){
                throw new Exception("Erreur, nombre de commentaire maximal atteint", 1);
                
            }

    }

    // Static function

    public static function whosBestComment(Commentaire $commentaire1, Commentaire $commentaire2) {
        if($commentaire2->note>$commentaire1->note) {
            return '$commentaire2';
        } else if($commentaire1->note>$commentaire2->note) {
            return '$commentaire1';
        } else {
            return 'error';
        }
    }

    public static function moyNoteCom() {
        $moy = 0;
        $moy = array_sum(self::$notesCom)/count(self::$notesCom);
        return $moy;
    }

  }