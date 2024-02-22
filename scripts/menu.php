<?php 

//creation du code html du menu
$items = ["Accueil", 'Produits', 'Avis'];
$url_menu = ['0-apple.html','1-apple-produits.html','2-apple-tous-les-avis.html'];
$menu = "<ul>";

foreach($items as $key=>$item):
    $classe="";
    if($page==$key):
        $classe="class='active'";
    endif;
   $menu.= "<li><a $classe href='{$url_menu[$key]}'>".$item."</a></li>";
endforeach;
    $menu.= "</ul>";