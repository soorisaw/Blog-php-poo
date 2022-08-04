// la div 'myModal' contenant le formulaire
const modalBis = document.getElementById("myModalBis");
// le btn qui ouvre le modal
const btnBis = document.getElementById("myBtnBis");
// le 'retour' pour fermer
const closedBis = document.getElementsByClassName("closeBis");

// au click on ouvre
btnBis.onclick = function(event) {
  event.stopPropagation();
  modalBis.style.display = "block";
}

// au click sur 'retour' on ferme
closedBis.onclick = function() {
  modalBis.style.display = "none";
}


