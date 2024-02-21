function Validation() {
  let nombrePlaces = document.getElementById("NombrePlaces").value;
  let nom = document.getElementById("nom").value;
  let prenom = document.getElementById("prenom").value;
  let email = document.getElementById("email").value;
  let telephone = document.getElementById("telephone").value;
  let adressePostale = document.getElementById("adressePostale").value;

  if (
    nombrePlaces.length === 0 || nom.length === 0 || prenom.length === 0 || email.length === 0 || telephone.length === 0 || adressePostale.length === 0
  ) {
    message.textContent = "Tous les champs doivent être remplis.";
    return false;
  } else {
    return true;
  }
}