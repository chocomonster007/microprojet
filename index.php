<?php
//chargement du fichier include.php
include('includes/configuration.php');
//initialisation des variables : conseillé depuis php 7
$titre=$menu=$contenu='' ;
//réception de la variable 'page' passée en GET, cette variable contient le numéro de la page demandée
$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT); //on vérifie qu'il s'agit bien d'un entier (protection antihacker)
switch($page) {
case(0)://page d'accueil
//action
    include('scripts/accueil.php');
    

break;
case(1)://page 1, page statique
    include('scripts/produits.php');

//action
break;
case(2)://page2, formulaire de dépôt de données
    include('scripts/forum.php');

//action    
break;
case(3)://page 3, affichage des données déposées par les utilisateurs
    include('scripts/forum.php');

//action
break;
default://le numéro de page est diffèrent de 0, 1, 2 ou 3, ce n'est pas normal.
echo ('Alerte : mauvais numéro de page'); die;
}

//création du menu 

include_once('scripts/menu.php');
//génération de l'affichage final

//ouverture de la classe template
$template=new template();

// //remplissage du template
$template->remplace('titre',$titre);
$template->remplace('page',$page);
$template->remplace('menu',$menu);
$template->remplace('contenu',$contenu);

// //affichage du template
$template->affiche();


