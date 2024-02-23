<form action="../src/traitement.php" id="inscription" method="POST" onsubmit="return Validation()">
<fieldset id="reservation">
      <legend>Réservation</legend>
      <h3>Nombre de réservation(s) :</h3>
      <input type="number" name="nombrePlaces" id="NombrePlaces" required>
      <h3>Réservation(s) en tarif réduit</h3>
      <input type="checkbox" name="tarifReduit" id="tarifReduit">
      <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

      <h3>Choisissez votre formule :</h3>
      <input type="checkbox" name="passSelection" id="pass1jour" value="pass1jour">
      <label for="pass1jour">Pass 1 jour : 40€</label>

      <!-- Si case cochée, afficher le choix du jour -->
      <section id="pass1jourDate">
        <input type="checkbox" name="pass1jour" id="choixJour1" value="choixJour1">
        <label for="choixJour1">Pass pour la journée du 01/07</label>
        <input type="checkbox" name="pass1jour" id="choixJour2" value="choixJour2">
        <label for="choixJour2">Pass pour la journée du 02/07</label>
        <input type="checkbox" name="pass1jour" id="choixJour3" value="choixJour3">
        <label for="choixJour3">Pass pour la journée du 03/07</label>
      </section>

      <input type="checkbox" name="passSelection" id="pass2jours" value="pass2jours">
      <label for="pass2jours">Pass 2 jours : 70€</label>

      <!-- Si case cochée, afficher le choix des jours -->
      <section id="pass2joursDate">
        <input type="checkbox" name="pass2jours" id="choixJour12" value="choixJour12">
        <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
        <input type="checkbox" name="pass2jours" id="choixJour23" value="choixJour23">
        <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
      </section>

      <input type="checkbox" name="passSelection" id="pass3jours" value="pass3jours">
      <label for="pass3jours">Pass 3 jours : 100€</label>


      <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
      <input type="checkbox" name="passSelectionTarifReduit" id="pass1jourreduit" value="pass1jourreduit">
      <label for="pass1jourreduit">Pass 1 jour : 25€</label>
      <input type="checkbox" name="passSelectionTarifReduit" id="pass2joursreduit" value="pass2joursreduit">
      <label for="pass2joursreduit">Pass 2 jours : 50€</label>
      <input type="checkbox" name="passSelectionTarifReduit" id="pass3joursreduit" value="pass3joursreduit">
      <label for="pass3joursreduit">Pass 3 jours : 65€</label>

      <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

      <p class="bouton" onclick="displayForm(2)">Suivant</p>
    </fieldset>
    <fieldset id="options">
      <legend>Options</legend>
      <h3>Réserver un emplacement de tente : </h3>

      <input type="checkbox" name="camping" id="camping">
      <label for="camping">Reserver une ou plusieurs nuits de camping</label>

      <input type="checkbox" id="tenteNuit1" name="nuitTente" value="tenteNuit1">
      <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="tenteNuit2" name="nuitTente" value="tenteNuit2">
      <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="tenteNuit3" name="nuitTente" value="tenteNuit3">
      <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="tente3Nuits" name="nuitTente" value="tente3nuits">
      <label for="tente3Nuits">Pour les 3 nuits (12€)</label>


      <h3>Réserver un emplacement de camion aménagé : </h3>

      <input type="checkbox" name="camping" id="nuitVan">
      <label for="nuitVan">Reserver une ou plusieurs nuits pour camion aménagé</label>

      <input type="checkbox" id="vanNuit1" name="vanNuit" value="vanNuit1">
      <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="vanNuit2" name="vanNuit" value="vanNuit2">
      <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="vanNuit3" name="vanNuit" value="vanNuit3">
      <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="van3Nuits" name="vanNuit" value="van3Nuits">
      <label for="van3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Venez-vous avec des enfants ?</h3>
      <input type="checkbox" name="enfants" value="avecEnfant"><label for="enfantsOui" >Oui</label>
      <input type="checkbox" name="enfants" value="sansEnfant"><label for="enfantsNon" value="sansEnfant">Non</label>

      <!-- Si oui, afficher : -->
      <section>
        <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
        <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
        <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants">
        <p>*Dans la limite des stocks disponibles.</p>
      </section>

      <h3>Profitez de descentes en luge d'été à tarifs avantageux ! (5€)</h3>
      <label for="nombreLugesEte">Nombre de descentes en luge d'été :</label>
      <input type="number" name="nombreLugesEte" id="nombreLugesEte">

      <p class="bouton" onclick="displayForm(3)">Suivant</p>
    </fieldset>
    
    <fieldset id="coordonnees">
      <legend>Coordonnées</legend>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone" id="telephone" required>
        <label for="adressePostale">Adresse Postale :</label>
        <input type="text" name="adressePostale" id="adressePostale" required>

        <input type="submit" name="soumission" class="bouton" value="Réserver">
    </fieldset>
  </form>