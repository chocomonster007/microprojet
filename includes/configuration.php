<?php

define('HOTE', "localhost");
const BASE = "microprojet";
const USER = "root";
const PASSWD = "root";

//chargement automatique de classes
//plus d'infos : http://php.net/manual/fr/function.spl-autoload-register.php
//normalement, pour pouvoir utiliser une classe, il est nécessaire de faire un include avant
//la fonction ci-dessous permet de s'en passer
spl_autoload_register(function ($class) {
    include 'librairies/' . $class . '.php';
    });  

?>