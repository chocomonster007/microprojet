<?php

//valoriser la balise title

$titre = "Les peintres espagnoles - Peintures d'Espagne - Art ibérique";

//valoriser la variable contenu
$noms=['La Watch','L\'Imac','L\'Ipad', 'L\'Iphone 15 pro'];
$img=['watch.png','imac.png','ipad.png','iphone.png'];
$tableau=['diego-velasquez-menines.jpg','francisco-goya-dos-de-mayo.jpg','bartolome-murillo-fille-aux-fleurs.jpg','pablo-picasso-le-reve.jpg','joaquin-sorolla-promenade-bord-de-mer.jpg'];
$description=["<h2>Fonctionnalités de santé</h2><p>Recevez des alertes en cas de fréquence cardiaque élevée ou faible et en cas d’arythmie</p><h2>Garder le contact</h2><p>Avec les modèles GPS + Cellular, vous pouvez passer des appels et envoyer des SMS même quand votre iPhone n’est pas à proximité</p><h2>Vues d’exercices</h2><p>Avec les vues d’exercices, vous pourrez accéder à davantage de données avancées d’un coup d’œil comme les Zones de fréquence cardiaque et les intervalles personnalisés pour ne pas perdre votre motivation.</p><h2>Fonctionnalités de sécurité avancées</h2><p>Obtenez de l’aide en cas d’urgence avec Détection des chutes, Appel d’urgence et Détection des accidents</p>","<h2>Puce Apple M3</h2><p>La M3 offre encore plus de performances et de possibilités pour vous permettre d’avancer à la vitesse de l’éclair dans vos activités quotidiennes, d’utiliser plusieurs apps à la fois, de donner libre cours à votre créativité et de jouer à vos jeux préférés</p><h2>Mémoire unifiée</h2><p>Plus rapide et plus performante que la RAM traditionnelle, la mémoire unifiée est intégrée à la puce M3, permettant aux apps de partager plus rapidement les données entre le processeur central, le processeur graphique et le Neural Engine</p><h2>Stockage</h2><p>Le stockage SSD (Solid-State Drive) est l’espace dont dispose votre iMac pour conserver vos documents, photos, musique, vidéos et autres fichiers</p><h2>Ports</h2><p>Les ports vous permettent de connecter à votre iMac des accessoires comme des imprimantes, des appareils photo, un écran supplémentaire et des disques durs externes pour le transfert de données, la charge et la synchronisation</p>","<p>Dessinez, peignez et écrivez avec l’Apple Pencil. Et profitez d’un clavier complet et d’un trackpad entièrement cliqua­­ble avec le Magic Keyboard Folio. Grâce à son design modulaire en deux parties, vous pouvez visionner vos contenus et utiliser les raccourcis que vous connaissez déjà, tout en bénéficiant d’un confort de frappe exceptionnel.

iPadOS est au cœur de l’expé­rience iPad. Grâce à lui, tout est simple et parfaitement fluide. Vous pouvez utiliser vos apps côte à côte, retoucher et partager vos photos, ou encore accéder à tous vos fichiers.

La puce A14 Bionic livre la puissance et les performances nécessaires pour faire tout ce que vous aimez. Montez une vidéo 4K dans iMovie, planifiez un road‑trip en famille ou profitez de jeux aux graphismes sophistiqués. Avec son autonomie d’une journée, votre iPad vous suit jusqu’au bout de la nuit.","<h2>Puce A17 Pro</h2><p>Une puissance phénoménale. Un bond colossal. Elle inaugure une toute nouvelle ère pour l’iPhone et livre de loin nos meilleures performances graphiques.</p><h2>Des photos incroyables</h2><p>vec l’iPhone 15 Pro, vous disposez d’une large palette de longueurs focales. C’est comme si vous aviez sept objectifs professionnels à portée de main, partout où vous allez.
Plus sophistiqué que jamais, l’appareil photo principal 48 Mpx prend des clichés en super haute résolution avec un niveau inédit de détail et de couleur.
Vos portraits s’en trouvent nettement améliorés. Et vous n’avez même plus besoin de choisir le mode Portrait. Si votre sujet est une personne, un chat ou un chien, l’iPhone intègre automa­tiquement les données de profondeur. Vous pouvez instan­tanément transformer votre photo en portrait avec un effet de flou élégant sur l’arrière-plan. Ou le faire plus tard dans l’app Photos.
</p>"
];

foreach($noms as $key=>$nom):

    if($key === 3){
        $svgColor = '#B6CFDA';
    } 
    else {
        $svgColor = '#133D7C';
    }


$contenu .= "<div class='produit'>
                <div class='visible'>
                    <img src='images/produits/{$img[$key]}' alt='".makeAlt($img[$key])."'>
                    <div class='detail'>
                        <h1 class='nom'>$nom</h1>
                        <button>Plus de détail<svg width='20px' height='20px' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path d='M10 7L15 12L10 17' stroke='$svgColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/>
                        </svg></button>
                    </div>
                </div>
                <div class='description'>{$description[$key]}
                </div>
            </div>";
                
endforeach;

function makeAlt($variable){
    $texte=str_replace('.jpg','',$variable);
    $texte = str_replace('-',' ',$texte);
    return $texte;
};