<?php
// Connexion a la bdd 
$host = 'mysql:host=localhost;dbname=Imaluu'; // serveur et nom bdd
$login = 'root'; // login de connexion au serveur de bdd
$password = ''; // le mdp, rien sur xampp et wamp, sur mamp il faut mettre root
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // pour la gestion des erreurs (pour voir les erreurs mysql)
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // pour forcer l'utf-8 
);

$pdo = new PDO($host, $login, $password, $options);
// Variable permettant d'afficher les messages utilisateur 
$msg = '';

// On crée ou on ouvre la session
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}