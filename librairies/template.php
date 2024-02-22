<?php
class template {

    public string $html; //contient le code html du template

    public function __construct() { // Chargement du fichier template.html dans l’attribut $this->html
        $this->html = file_get_contents('views/template.html'); // On lit le contenu de template.html
    }

    public function remplace($const, $newValue) { // Méthode permettant de modifier une constante dans un fichier
        if (!empty($this->html)) { // Simple vérification : le html a-t-il bien été chargé
            $this->html = str_replace("{#$const#}", $newValue, $this->html); // Modifie la constante par sa nouvelle valeur
        } else {
            print 'Aucun template n\'a été défini.';
        }
    }

    public function affiche() { // Affichage de l'HTML
        echo($this->html);
    }
}
