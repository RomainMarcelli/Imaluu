//Navbar ----------------------------
function changeNavbarOpacityOnScroll() {
  // Récupère la position actuelle de défilement de la page
  var currentScrollPosition = window.pageYOffset;

  // Récupère l'élément de la barre de navigation
  var navbarElement = document.querySelector('nav');
  var logoElement = document.querySelector('#logo');
  var accueilElement = document.querySelector('.accueil');
  var lienElement = document.querySelector('.link');
  var svgElement = document.querySelector('svg');
  const menu = document.querySelector('.menu');
  const profil = document.querySelector('.profil');



  // Vérifie si la position de défilement est supérieure à la hauteur de la barre de navigation
  if (currentScrollPosition > navbarElement.offsetHeight) {
    // Si c'est le cas, réduit l'opacité de la barre de navigation
    navbarElement.style.backgroundImage = "url('../assets/img/6.png')";
    navbarElement.style.height = "85px";
    logoElement.style.width = "80px";
    accueilElement.style.paddingTop ="40px";
    accueilElement.style.fontSize ="35px";
    lienElement.style.padding ="10px";
    svgElement.style.width ="45px";
    menu.style.marginTop ="88px";
    profil.style.marginTop ="88px";
  } else {
    // Sinon, remet l'opacité de la barre de navigation à 1
    navbarElement.style.backgroundImage = "url('../assets/img/png.png')";
    navbarElement.style.height = "115px";
    logoElement.style.width = "100px";
    accueilElement.style.paddingTop ="45px";
    accueilElement.style.fontSize ="40px";
    lienElement.style.padding ="15px";
    svgElement.style.width ="50px";
    menu.style.marginTop ="118px";
    profil.style.marginTop ="118px";
  }
}

// Ajoute un écouteur d'événement pour détecter le défilement de la page
window.addEventListener('scroll', changeNavbarOpacityOnScroll);



// Menu burger ---------------------

function toggleProfil() {
  const profil = document.querySelector('.profil');
  profil.classList.toggle('profil-visible'); // ajoute ou retire la classe 'menu-visible' au menu
}

const bouton = document.querySelector('.profil-button');
bouton.addEventListener('click', toggleProfil); // ajoute un gestionnaire d'événements au clic sur le bouton qui appelle la fonction toggleMenu


function toggleConnexion() {
  const connexion = document.querySelector('.connexion');
  connexion.classList.toggle('connexion-visible');
}

const seconnecter = document.querySelector('#seconnecter');
seconnecter.addEventListener('click', toggleConnexion);

function toggleInscription() {
  const inscription = document.querySelector('.inscription');
  inscription.classList.toggle('inscription-visible');
}

const sInscrire = document.querySelector('#sInscrire');
sInscrire.addEventListener('click', toggleInscription);

function supprimerAlert() {
  alert('Voulez-vous vraiment supprimer votre compte ?');
}

const supprimer = document.querySelector('#rouge');
supprimer.addEventListener('click', supprimerAlert);

///////////////////////////////

// Changer avec les boutons et les cases les images 

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("diapo");
  var rond = document.getElementsByClassName("rond");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < rond.length; i++) {
    rond[i].className = rond[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  rond[slideIndex - 1].className += " active";
}

// DÃ©ilement auto du diapo 

// var slideIndex = 0;
// showSlides();

// function showSlides() {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   slideIndex++;
//   if (slideIndex > slides.length) {
//     slideIndex = 1;
//   }
//   slides[slideIndex - 1].style.display = "block";
//   setTimeout(showSlides, 10000); // Change image every 2 seconds
// }


//////////////////////////
// Voir plus de suggestions 

function showCards() {
  const hideCard = document.querySelector('#hide-card'); 
  const btnText = document.querySelector('.changeText'); 
  if (hideCard.style.display === 'flex') {
    hideCard.style.display = 'none'; 
    btnText.innerHTML = 'Plus +';
    hideCard.style.maxHeight = null;

  }
  else {
    hideCard.style.display = 'flex'; 
    btnText.innerHTML = 'Moins -';
    hideCard.style.maxHeight = hideCard.scrollHeight + "px";
  }
}
console.log(showCards)
const savoirplus = document.querySelector('.savoirplus'); 
savoirplus.addEventListener('click', showCards); // ajoute un gestionnaire d'événements au clic sur le bouton qui appelle la fonction toggleMenu

//////////////////////////////////////////////////////////////////////////////////////