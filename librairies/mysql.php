<?php

class mysql {
    public function open() {//connection base de données, constantes de connexion dans include.php
        try {
            $this->open = new PDO('mysql:host=' . HOTE . ';dbname=' . BASE.';charset=utf8', USER, PASSWD);
        } catch (PDOException $e) {
            print("Erreur : " . $e->getMessage());
        }
    }

    public function insertion(string $nom, string $produit,string $commentaire, string $note):void {
        $this->open();

        $requete = "INSERT INTO avis (nom, produit, commentaire, note) VALUES (:nom,:produit,:commentaire,:note)";
        $insert = $this->open->prepare($requete);

        $insert->execute(['nom'=>$nom, 'produit'=>$produit, 'commentaire'=>$commentaire, 'note'=>$note]);

        $this->open = NULL;

    }

    public function cherche(){
        //écriture de la requete
        $requete = "SELECT nom, produit, commentaire, date, note FROM avis ORDER BY date DESC";
        
        $this->open();

        $search = $this->open->prepare($requete);

        $search->execute();

        $resultat = $search->fetchAll(PDO::FETCH_ASSOC);

        $this->open = NULL;
        return $resultat;

    }

    public function sameAs(string $nom,string $produit, string $commentaire, string $note){
            $requete = "SELECT nom, produit, commentaire, note FROM avis WHERE ((nom = :nom AND produit = :produit) AND commentaire = :commentaire) AND note = :note";
            $this->open();
            $search = $this->open->prepare($requete);
            $fetch = $search->execute(["nom"=>$nom, "produit"=>$produit, "commentaire"=>$commentaire, "note"=>$note]);
            $resultat = $search->fetch();
            $this->open = NULL;
            return $resultat;
    }
}