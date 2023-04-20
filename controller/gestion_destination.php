<?php
// Le controller : les traitements PHP
// on récupère le model (le chemin part depuis le fichier d'où est appelé celui ci)
include '../model/gestion_destination.php';

if(!empty($_SESSION['message'])) {
    $msg .= $_SESSION['message'];
    unset($_SESSION['message']);
}

// Traitements PHP
// restriction d'accès : si l'utilisateur n'est pas admin, on redirige vers connexion.php



// Récupération des catégorie et préparation des options du select
// $categories = get_categories();
// $options = '';
// foreach($categories AS $sous_tableau) {
//     $options .= '<option value="' . $sous_tableau['id_categorie'] . '">' . $sous_tableau['nom_categorie'] . '</option>';
// }


// Enregistrement des destinations
if( isset($_POST['titre']) && isset($_POST['img1']) && isset($_POST['img2']) && isset($_POST['img3']) && isset($_POST['description1']) && isset($_POST['description2']) && isset($_POST['map']) ) {
    $titre = trim($_POST['titre']);
    $img1 = trim($_POST['img1']);
    $img2 = trim($_POST['img2']);
    $img3 = trim($_POST['img3']);
    $description1 = trim($_POST['description1']);
    $description2 = trim($_POST['description2']);
    $map = trim($_POST['map']);
    

    create_post($titre, $img1, $img2, $img3, $description1, $description2, $map);
    header('location: ../view/gestion_destination.php'); // on recharge la page afin de ne pas faire un double enregistrement en  rafraichissant la page
}

// Suppression d'une destination
if(isset($_GET['action']) && $_GET['action'] == 'supprimer' && !empty($_GET['id_destination'])) {
    delete_post($_GET['id_destination']);
    $_SESSION['message'] = '<div class="alert alert-success">L\'destination n°' . $_GET['id_destination'] . ' a bien été supprimé.</div>';
    header('location: gestion_destination.php');
}



// Affichage du tableau html
$liste_destinations = get_destinations();
$tableau = '';
foreach($liste_destinations AS $sous_tableau) {
    $tableau .= '<tr>';

    $tableau .= '<td>' . $sous_tableau['titre'] . '</td>';
    $tableau .= '<td>' . $sous_tableau['description1'] . '</td>';
    $tableau .= '<td>' . $sous_tableau['description2'] . '</td>';
    $tableau .= '<td><img src="' . $sous_tableau['img1'] . '" style="width: 100px;"></td>';
    $tableau .= '<td><img src="' . $sous_tableau['img2'] . '" style="width: 100px;"></td>';
    $tableau .= '<td><img src="' . $sous_tableau['img3'] . '" style="width: 100px;"></td>';
    $tableau .= '<td>' . $sous_tableau['map'] . '</td>';
    $tableau .= '<td><a href="?action=supprimer&id_destination=' . $sous_tableau['id_destination'] . '" class="btn btn-danger" onclick="return(confirm(\' êtes vous sûr ?\'))" >Supprimer</a></td>';

    $tableau .= '</tr>';
}