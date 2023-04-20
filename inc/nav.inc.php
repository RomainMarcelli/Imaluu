<?php
include '../inc/init.inc.php'; // initialisation du site

// Traitement PHP
    // connexion utilisateur
    if ( isset($_POST['pseudo']) && isset($_POST['mdp'])) {
      $pseudo = trim($_POST['pseudo']);
      $mdp = trim($_POST['mdp']);

      $connexion = $pdo->prepare("SELECT id_user, pseudo, mdp, email, statut FROM user WHERE pseudo = :pseudo");
      $connexion->bindParam(':pseudo', $pseudo,PDO::PARAM_STR);
      $connexion->execute();

      if($connexion->rowCount() > 0) {
          // on a récupéré une ligne donc le pseudo est ok
              $infos = $connexion->fetch(PDO::FETCH_ASSOC);
              if(password_verify($mdp, $infos['mdp'])) {
                  // on enregistre les informations uitilisateurs dans la session
                  $_SESSION['user'] = array();
                  $_SESSION['user']['pseudo'] = $infos['pseudo'];
                  $_SESSION['user']['email'] = $infos['email'];
                  $_SESSION['user']['statut'] = $infos['statut'];
                  $_SESSION['user']['id_user'] = $infos['id_user'];
  
                  /*$_SESSION['user'] = array();
                  foreach($infos AS $indice => $valeur) {
                      if($indice != 'mdp') {
                          $_SESSION['user'][$indice] = $valeur;
                      }
                  }*/

                  // redirection vers la page profil.php
                  header('location: profil.php');
              } else {
              // erreur sur le mdp
              $msg .= '<div class="incorrect">Attention, <br>Erreur sur le pseudo et/ou le mot de passe.</div>';
          }
  
      } else {
          $msg .= '<div class="incorrect">Attention : le pseudo/mot de passe n\'est pas correct</div>';
      }
  }


  ////////////////////////////////



  // Traitements PHP
  // Inscription utilisateur :
  if( isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp']) ) {
      $pseudo = trim($_POST['pseudo']);
      $email = trim($_POST['email']);
      $mdp = trim($_POST['mdp']);
      // variable de controle 
      $erreur = false;

      // Contrôles :


      // taille du pseudo : entre 4 et 16
      $taille_pseudo = iconv_strlen($pseudo);
      if($taille_pseudo < 4 || $taille_pseudo > 16) {
          $msg .= '<div class="incorrect">Attention : le pseudo doit avoir entre 3 et 20 caractères</div>';
          $erreur = true;
      } 

      // caractere dans le pseudo
      // On test la taille du pseudo avec une expression réguliere
      $verif_caracteres = preg_match('#^[A-Za-z0-9]+$#', $pseudo);
      /*  Expression régulière :
          ----------------------
          - dans les [] tous les caractères autorisés (les lettres majuscules et minuscules et les chiffres)
          - les # permettent de préciser le début et la fin de l'expression (sinon il est possible d'utiliser les slashs /)
          - le + permet de dire que l'on peut avoir plusieurs fois le même caractères dans la chaine
          - le ^ permet de dire la chaine doit obligatoirement commencer par les caractères proposés
          - le $ permet de dire la chaine doit obligatoirement finir par les caractères proposés
          - lorsque l'on bloque le début et la fin, toutes la chaine ne peut contenir que ces caractères
      */
      if($verif_caracteres != true) {
          $msg .= '<div class="incorrect">Attention : le pseudo ne peut contenir ques des caracteres alphanumériques</div>';
          $erreur = true;
      }


      // disponibilité du pseudo (pseudo en index unique dans la BDD)
      $verif_pseudo = $pdo->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
      $verif_pseudo->bindParam(':pseudo', $pseudo,PDO::PARAM_STR);
      $verif_pseudo->execute();
      if($verif_pseudo->rowCount() > 0) /* si on a plus de 0 lignes qui correspondent*/ {
          $msg .= '<div class="incorrect">Attention : le pseudo est indisponible</div>';
          $erreur = true;
      }


      // format du mail 
      if( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $msg .= '<div class="incorrect">Attention : le format du mail ne correspond pas</div>';
          $erreur = true;
      }


      // disponibilité du mail (mail en index unique dans la BDD)
      $verif_mail = $pdo->prepare("SELECT * FROM user WHERE email = :email");
      $verif_mail->bindParam(':email', $email,PDO::PARAM_STR);
      $verif_mail->execute();
      if($verif_mail->rowCount() > 0) /* si on a plus de 0 lignes qui correspondent*/ {
          $msg .= '<div class="incorrect">Attention : le mail est indisponible</div>';
          $erreur = true;
      }

      // taille du mdp : minimum 4
      if(iconv_strlen($mdp) < 5) {
          $msg .= '<div class="incorrect">Attention : le mot de passe doit avoir 5 caracteres minimum</div>';
          $erreur = true;
      } 



      /*Pour le statut :
      1 = membre
      2 = admin */

      // enregistrement 
      if($erreur == false) {
          // cryptage du mdp : bonne pratique : password_hash($mdp, PASSWORD_DEFAULT)
          $mdp = password_hash($mdp, PASSWORD_DEFAULT);
          $enregistrement = $pdo->prepare("INSERT INTO user (pseudo, mdp, email, statut) VALUES (:pseudo, :mdp, :email, 1)");
          $enregistrement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
          $enregistrement->bindParam(':mdp', $mdp, PDO::PARAM_STR);
          $enregistrement->bindParam(':email', $email, PDO::PARAM_STR);
          $enregistrement->execute();
      }

  }


// début des affichages
?>



<nav>
    <div class="logo">
    <img id="logo" src="../assets/img/logo.png" alt="zdzd">
    <a href="accueil.php"><p class="accueil">Accueil</p></a>
    </div>
    <div id="float">
        <a class="link" href="destination.php">Destination</a>
        <a class="link" href="">Hotels</a>
        <a class="link" href="">Devis</a>
        <a class="link" href="">Nos experiences</a>
        <a class="link" href="">Les avis</a>
        <svg class="profil-button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
    </div>
</nav>

<ul class="profil">
  <li><p>Mon Profil</p></li>
  <li id="seconnecter">Se connecter</li>
  <div class="connexion">
    <form method="post">
      <label for="pseudo">Pseudo :</label><br>
      <input type="text" name="pseudo" id="pseudo"><br>
      <label for="mdp">Mot de passe :</label><br>
      <input type="password" name="mdp" id="mdp"><br>
      <button type="submit">Connexion</button>
    </form>
  </div>
  <li id="sInscrire">Créer un compte</li>
  <div class="inscription">
    <form method="post">
      <label for="pseudo">Pseudo :</label><br>
      <input type="text" name="pseudo" id="pseudo"><br>
      <label for="email">Email :</label><br>
      <input type="text" name="email" id="email"><br>
      <label for="mdp">Mot de passe :</label><br>
      <input type="password" name="mdp" id="mdp"><br>
      <button type="submit">Inscription</button>
    </form>
  </div>
  <hr>
  <li><a href="#">Mes favoris</a></li>
  <li><a href="#">Mes avis</a></li>
  <li><a id="rouge" href="#">Supprimer mon compte</a></li>
</ul>

<body>
