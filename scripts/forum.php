<?php

$titre = "Les commentaires de nos fanzouzes";

$bd = new mysql();

$nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$commentaire = filter_input(INPUT_POST,'commentaire',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$produit = filter_input(INPUT_POST,'produit',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$note = filter_input(INPUT_POST,'note',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$classe="";
$inputSelect="";
$inputNom = "";
$textArea ="";
$ratingError = "";

if($nom && $commentaire && $produit && $note){
    $alreadyExist = $bd->sameAs($nom, $produit, $commentaire, $note);
    if(!$alreadyExist)
    {
        $bd->insertion($nom,$produit,$commentaire, $note);
        $classe = "success";         
    }
    else {
        $classe="error";
        }
}else if($nom !== null){
    if($nom === "") $inputNom = "errorInput";
    if($commentaire === "") $textArea = "errorInput";
    if($produit === "") $inputSelect = "errorInput";
    if($note === "") $ratingError = "errorInput";
    $classe="errorB";

}

$contenu .=<<<FORMULAIRE
<div class='form $classe'>
<h1>Merci de laisser un avis</h1>
<form action="" method="post">
    <div class="headerForm">
    <span class='$inputNom'><input type="text" name="nom" id="nom" placeholder="Votre nom prénom" value="$nom" required></span>
    <span class='$inputSelect'><select name="produit" id="select" data-value="$produit" required>
    <option value="">Produit</option>
    <option value="iphone">Iphone</option>
    <option value="ipad">Ipad</option>
    <option value="watch">Watch</option>
    <option value="imac">Imac</option>
    </select>
    </span>
    </div>
    <input type='hidden' id='rating' name="note">
    <div class='star $ratingError'>
    
    <span data-rating="5">★</span>
      <span data-rating="4">★</span>
      <span data-rating="3">★</span>
      <span data-rating="2">★</span>
      <span data-rating="1">★</span>
    <p>Note :&nbsp; </p>
      
    </div>

    <span class='$textArea'>
    <textarea rows="8" cols="50" name="commentaire" id="message" placeholder="Votre avis" required>$commentaire</textarea></span>
    <button type="submit">Envoyer</button>
</form>
</div>
FORMULAIRE;

$resultats = $bd->cherche();

$contenu .= "<div class='messages'>
                <h1>Tous les avis</h1>";
foreach($resultats as $resultat):

$resultat['produit'] == "watch" ? $adj = 'la ' : $adj ='l\'';   
$date = date('j/m/Y à G:i', strtotime($resultat['date']));

$contenu .= 
"<div class='commentaire'>
    <div class='displayNote'>
    <p class='produit'>A propos de $adj".ucfirst($resultat['produit'])."</p>
    <div class='noteStar' data-note='{$resultat['note']}'>
    <span data-rate='5'>★</span>
    <span data-rate='4'>★</span>
    <span data-rate='3'>★</span>
    <span data-rate='2'>★</span>
    <span data-rate='1'>★</span>
    </div>
    </div>
    <p class='message'>".$resultat['commentaire']."</p>
    <p class='date'>Envoyé le ". $date ." par ".$resultat['nom']."</p>
</div>";
endforeach;
$contenu .="</div>";

?>

