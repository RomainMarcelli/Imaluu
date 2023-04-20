<?php

// Fonctions pour savoir si un utilisateur est connecté 
function user_is_connected() {
    if(! empty($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

// Fonction pour savoir si l'utilisateur a le statut admin
function user_is_admin() {
    if(user_is_connected() && $_SESSION['user']['statut'] == 2) {
        return true;
    } return false;
}