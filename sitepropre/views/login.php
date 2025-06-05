<div class="container-accueil">
    <h1>Connexion</h1>
    <?php if (!empty($error)) echo '<p class="error-message">' . htmlspecialchars($error) . '</p>'; ?>
    <form action="index.php?page=login" method="post">
        <label for="email">Email :</label>
        <input type="text" id="email" name="email" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Se connecter">
    </form>

    <p style="margin-top:10px;">Pas encore de compte ? <a href="index.php?page=register">Créer un compte</a></p>

</div>