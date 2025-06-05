<div class="container-accueil" style="max-width: 400px; margin: 40px auto;">
    <h1>Créer un compte</h1>
    <?php if (!empty($error)): ?>
        <p class="error-message" style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <?php if ($success): ?>
        <p style="color: green;">Compte créé avec succès ! <a href="index.php?page=login">Se connecter</a></p>
    <?php else: ?>
        <form method="post">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" required>
            <label for="mdp2">Confirmer le mot de passe</label>
            <input type="password" name="mdp2" id="mdp2" required>
            <input type="submit" value="Créer mon compte">
        </form>
        <p style="margin-top:15px;">Déjà inscrit ? <a href="index.php?page=login">Se connecter</a></p>
    <?php endif; ?>
</div>