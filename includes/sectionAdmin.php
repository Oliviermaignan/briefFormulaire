<?php
// Vérification du mot de passe
if (isset($_POST['password'])) {
    $password = $_POST['password'];

    // Hachage du mot de passe
    $passwordAttendu = password_hash("1234", PASSWORD_DEFAULT);

    // Comparaison avec le mot de passe haché attendu
    if (password_verify($password, $passwordAttendu)) {
        header("Location: sectionAdminLogin.php");
        exit;
    } else {
        echo "Mot de passe incorrect. Veuillez ressayer.";
    }
}
?>

<h1>Connexion administrateur</h1>

<form method="post" action="">
    <div>
        <label for="pass">Mot de passe:</label>
        <input type="password" id="password" name="password" minlength="4" required />
    </div>
    <button type="submit">Se connecter</button>
</form>