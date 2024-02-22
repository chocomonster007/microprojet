<?php

$titre = "Les commentaires de nos fanzouzes";

$bd = new mysql();
$resultats = $bd->cherche();

$nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$commentaire = filter_input(INPUT_POST,'commentaire',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$produit = filter_input(INPUT_POST,'produit',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if($nom && $commentaire && $produit){
    $bd->insertion($nom,$produit,$commentaire);
    
}

$contenu .=<<<FORMULAIRE
<div class='form'>
<h1>Merci de laisser un avis</h1>
<form action="" method="post">
    <div class="headerForm">
    <input type="text" name="nom" id="nom" placeholder="Votre nom prénom" value="$nom">
    <select name="produit" id="select" value="$produit">
    <option value="">Produit</option>
    <option value="iphone">Iphone</option>
    <option value="ipad">Ipad</option>
    <option value="watch">Watch</option>
    <option value="imac">Imac</option>
    </select>
    </div>
    <textarea rows="8" cols="50" name="commentaire" id="message" placeholder="Votre avis">$commentaire</textarea>
    <button type="submit">Envoyer</button>
</form>
</div>
FORMULAIRE;

$contenu .= "<div class='messages'>
                <h1>Les avis sur nos produits</h1>";
foreach($resultats as $resultat):
    setlocale(LC_TIME, 'fr_FR','fra');
    $date = strtotime($resultat['date']);

$resultat['produit'] == "watch" ? $adj = 'la ' : $adj ='l\'';   

$contenu .= 
"<div class='commentaire'>
    <h2 class='nom'>".$resultat['nom']."</h2>
    <p class='date'>Date de l'avis : ". ucfirst(strftime('%A %e %B %Y à %R', $date))."</p>
    <p class='produit'>A propos de $adj".ucfirst($resultat['produit'])."</p>
    <p class='message'>".$resultat['commentaire']."</p>
</div>";
endforeach;
$contenu .="</div>";

?>

