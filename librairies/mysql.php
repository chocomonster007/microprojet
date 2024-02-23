<?php

class mysql {
    public function open() {//connection base de données, constantes de connexion dans include.php
        try {
            $this->open = new PDO('mysql:host=' . HOTE . ';dbname=' . BASE.';charset=utf8', USER, PASSWD);
        } catch (PDOException $e) {
            print("Erreur : " . $e->getMessage());
        }
    }

    public function insertion(string $nom, string $produit,string $commentaire):void {
        $this->open();

        $requete = "INSERT INTO avis (nom, produit, commentaire) VALUES (:nom,:produit,:commentaire)";
        $insert = $this->open->prepare($requete);

        $insert->execute(['nom'=>$nom, 'produit'=>$produit, 'commentaire'=>$commentaire]);

        $this->open = NULL;

    }

    public function cherche(){
        //écriture de la requete
        $requete = "SELECT nom, produit, commentaire, date FROM avis ORDER BY date DESC";
        
        $this->open();

        $search = $this->open->prepare($requete);

        $search->execute();

        $resultat = $search->fetchAll(PDO::FETCH_ASSOC);

        $this->open = NULL;
        return $resultat;

    }

    public function sameAs(string $nom,string $produit, string $commentaire){
            $requete = "SELECT nom, produit, commentaire FROM avis WHERE (nom = :nom AND produit = :produit) AND commentaire = :commentaire";
            $this->open();
            $search = $this->open->prepare($requete);
            $fetch = $search->execute(["nom"=>$nom, "produit"=>$produit, "commentaire"=>$commentaire]);
            $resultat = $search->fetch();
            $this->open = NULL;
            return $resultat;
    }
}