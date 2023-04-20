<?php
include '../inc/fonctions.inc.php'; // des fonctions utiles
    // Restriction d'accès


    // Traitements PHP


// début des affichages
include '../inc/header.inc.php';
include '../inc/nav.inc.php';
// echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>


        <div>
            <h1>Profil</h1>
            <p>Votre profil</p>
        </div>


            <div>
                <ul>
                    <li>N° utilisateur : <?php echo $_SESSION['user']['id_user']; ?></li>
                    <li>Pseudo : <?php echo $_SESSION['user']['pseudo']; ?></li>
                    <li>Email : <?php echo $_SESSION['user']['email']; ?></li>
                    <li>Statut : <?php echo $_SESSION['user']['statut']; ?></li>
                </ul>
            </div>
<?php
if (user_is_admin()) {
    ?> 
    <a href="gestion_hotel.php">GESTION DES HOTELS</a>
    <a href="gestion_destination.php">GESTIONS DES DESTINATIONS</a>
<?php 
}

include '../inc/footer.inc.php';