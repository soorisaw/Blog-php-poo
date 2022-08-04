//------------------------------------------MODAL RECORD USER------------------------------------------------//
// la div 'myModal' contenant le formulaire
const modal = document.getElementById("myModal");
// le btn qui ouvre le modal
const btn = document.getElementById("myBtn");
// le 'retour' pour fermer
const closed = document.getElementsByClassName("close");

// au click on ouvre
btn.onclick = function(event) {
  event.stopPropagation();
  modal.style.display = "block";
}

// au click sur 'retour' on ferme
closed.onclick = function() {
  modal.style.display = "none";
}

//------------------------------------------MODAL RECORD USER------------------------------------------------//

