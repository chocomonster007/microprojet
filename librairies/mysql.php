<?php

class mysql {
    public function open() {//connection base de données, constantes de connexion dans include.php
        try {
            $this->open = new PDO('mysql:host=' . HOTE . ';dbname=' . BASE.';charset=utf8', USER, PASSWD);
        } catch (PDOException $e) {
            print("Erreur : " . $e->getMessage());
        }
    }

    public function insertion(string $nom, string $prenom,string $message):void {
        $this->open();

        $requete = "INSERT INTO messages (nom,prenom, message) VALUES (:nom,:prenom,:message)";
        $insert = $this->open->prepare($requete);

        $insert->execute(['nom'=>$nom, 'prenom'=>$prenom, 'message'=>$message]);

        $this->open = NULL;

    }

    public function cherche(){
        //écriture de la requete
        $requete = "SELECT nom, prenom, message, date FROM messages ORDER BY date DESC";
        
        $this->open();

        $search = $this->open->prepare($requete);

        $search->execute();

        $resultat = $search->fetchAll(PDO::FETCH_ASSOC);

        $this->open = NULL;
        return $resultat;

    }
}