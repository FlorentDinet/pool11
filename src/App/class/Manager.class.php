<?php

  class Manager {
      private $db; // Instance de PDO
      
      public function __construct($db)
      {
          var_dump($db);
          $this->setDb($db);
      }

      public function add(Humain $humain)
      {
          $q = $this->db->prepare('INSERT INTO humains(couleursYeux, couleursCheveux, taille, poid, langue, niveauLangue, nom, prenom) VALUES (:couleursYeux, :couleursCheveux, :taille, :poid, :langue, :niveauLangue, :nom, :prenom)');

          $q->bindValue(':couleursYeux' , $humain->getCouleursYeux());
          $q->bindValue(':couleursCheveux' , $humain->getCouleursCheveux());
          $q->bindValue(':taille' , $humain->getTaille());
          $q->bindValue(':poid' , $humain->getPoid());
          $q->bindValue(':langue' , $humain->getLangue());
          $q->bindValue(':niveauLangue' , $humain->getNiveauLangue());
          $q->bindValue(':nom' , $humain->getNom());
          $q->bindValue(':prenom' , $humain->getPrenom());
/*        $q->bindValue(':sms' , $humain->getSms());
          $q->bindValue(':panier' , $humain->getPanier());
*/          var_dump($this->db);

//var_dump($q);
          $q->execute();
      }
      
      public function delete(Humain $humain)
      {
          $this->db->exec('DELETE FROM humains WHERE id = '.$humain->getId());
      }
      
      // Requete de type SELECT avec une clause WHERE , et retourne un objet Humain
      public function get($id)
      {
          $id = (int) $id;

          $q = $this->db->query('SELECT id, couleursYeux, couleursCheveux, taille, poid, langue, niveauLangue, nom, prenom, sms, panier FROM humains WHERE id = '.$id);
          $donnees = $q->fetch(PDO::FETCH_ASSOC);

          return new Humain($donnees);
      }
      
      // Retourne la liste de tous les humains
      public function getList()
      {
          $humains = [];

          $q = $this->db->query('SELECT id, couleursYeux, couleursCheveux, taille, poid, langue, niveauLangue, nom, prenom, sms, panier FROM humains ORDER BY nom');

          while($donnees = $q->fetch(PDO::FETCH_ASSOC))
          {
              $humains[] = new Humain($donnees);
          }

          return $humains;
      }
      
      // Prépare la requete de type UPDATE
      public function update(Humain $humain)
      {
          $q = $this->db->prepare('UPDATE humains SET couleursYeux = :couleursYeux, couleursCheveux = :couleursCheveux, taille = :taille, poid = :poid, langue = :langue, niveauLangue = :niveauLangue, nom = :nom, prenom = :prenom, sms = :sms, panier = :panier WHERE id = :id');

          $q->bindValue(':couleursYeux' , $humain->getCouleursYeux());
          $q->bindValue(':couleursCheveux' , $humain->getCouleursCheveux());
          $q->bindValue(':taille' , $humain->getTaille());
          $q->bindValue(':poid' , $humain->getPoid());
          $q->bindValue(':langue' , $humain->getLangue());
          $q->bindValue(':niveauLangue' , $humain->getNiveauLangue());
          $q->bindValue(':nom' , $humain->getNom());
          $q->bindValue(':prenom' , $humain->getPrenom());
          $q->bindValue(':sms' , $humain->getSms());
          $q->bindValue(':panier' , $humain->getPanier());

          $q->execute();
      }
      
      public function setDb(PDO $db)
      {
          $this->db = $db;
      }

  }
  ?>