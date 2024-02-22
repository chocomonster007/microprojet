<?php

$titre = "Les commentaires de nos fanzouzes";

$bd = new mysql();
$resultats = $bd->cherche();

$nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_FULL_SPECIAL_CHARS);


$contenu =<<<FORMULAIRE
<div class='form'>
<h1>Merci de laisser un avis</h1>
<form action="index.php?page=2" method="post">
    <div class="headerForm">
    <input type="text" name="nom" id="nom" placeholder="Votre nom prénom" value="$nom">
    <select name="produit" id="select">
    <option value="">Produit</option>
    <option value="iphone">Iphone</option>
    <option value="ipad">Ipad</option>
    <option value="watch">Watch</option>
    <option value="imac">Imac</option>
    </select>
    </div>
    <textarea rows="8" cols="50" name="message" id="message" placeholder="Votre avis">$message</textarea>
    <button type="submit">Envoyer</button>
</form>
</div>
FORMULAIRE;

$contenu .= "<div class='messages'>
                <h1>Les avis sur nos produits</h1>";
foreach($resultats as $resultat):
    setlocale(LC_TIME, 'fr_FR','fra');
    $date = strtotime($resultat['date']);

$contenu .= 
"<div class='message'>
    <h2 class='nom'>".$resultat['nom']. " ". $resultat['prenom']."</h2>
    <p class='date'>Date de publication : ". strftime('%A %e %B %Y à %R', $date)."</p>
    <p class='message'>".$resultat['message']."</p>
</div>";
endforeach;
$contenu .="</div>";

?>

