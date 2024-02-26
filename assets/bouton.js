// récupération des éléments
let tarifReduit = document.querySelector("#tarifReduit");
let pass1jour = document.querySelector("#pass1jour");
let pass2jours = document.querySelector("#pass2jours");
let pass3jours = document.querySelector("#pass3jours");

let camping = document.querySelector("#camping");
let nuitVan = document.querySelector("#nuitVan");

tarifReduit.addEventListener("change", function () {
  let passTarifReduit = document.getElementById("passTarifReduit");
  if (this.checked) {
    passTarifReduit.style.display = "block";
  } else {
    passTarifReduit.style.display = "none";
  }
});

pass1jour.addEventListener("change", function () {
  let pass1jourDate = document.getElementById("pass1jourDate");
  if (this.checked) {
    pass1jourDate.style.display = "block";
  } else {
    pass1jourDate.style.display = "none";
  }
});

pass2jours.addEventListener("change", function () {
  let pass2joursDate = document.getElementById("pass2joursDate");
  if (this.checked) {
    pass2joursDate.style.display = "block";
  } else {
    pass2joursDate.style.display = "none";
  }
});

camping.addEventListener("change", function () {
    let nuitCamping = document.getElementById("nuitCamping");
    if (this.checked) {
        nuitCamping.style.display = "block";
    } else {
        nuitCamping.style.display = "none";
    }
  });

  nuitVan.addEventListener("change", function () {
    let nuitCamion = document.getElementById("nuitCamion");
    if (this.checked) {
        nuitCamion.style.display = "block";
    } else {
        nuitCamion.style.display = "none";
    }
  });