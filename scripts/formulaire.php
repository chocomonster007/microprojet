<?php 

$titre = "Peintres espagnols : laissez votre message";

$nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$prenom = filter_input(INPUT_POST,'prenom',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_FULL_SPECIAL_CHARS);


if(!$nom || !$prenom || !$message){
    if($nom || $prenom || $message){
        $contenu = "<h2>Vous avez oublié de remplir un ou des champs</h2>";
    }
    $contenu .=<<<FORMULAIRE
    <div class='form'>
    <h1>Merci de laisser un message</h1>
    <form action="index.php?page=2" method="post">
        <label for="nom">Votre nom</label>
        <input type="text" name="nom" id="nom" value="$nom">
        <label for="prenom">Votre prénom</label>
        <input type="text" name="prenom" id="prenom" value="$prenom">
        <label for="message">Votre message</label>
        <textarea name="message" id="message">$message</textarea>
        <button type="submit">Envoyer</button>
    </form>
    </div>
    FORMULAIRE;

}
else{
    $bd = new mysql();
    $bd->insertion($nom,$prenom,$message);

    header('Location: index.php?page=3');

}

//On va mettre les champs des formulaires en base de données, mais à condition que les trois champs soient remplis
