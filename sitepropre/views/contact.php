<div class="container-accueil">
    <h1>Contactez-nous</h1>
    <?php if (isset($success) && $success): ?>
        <p>Votre message a été envoyé ! Merci.</p>
    <?php endif; ?>
    <form action="index.php?page=contact" method="post">
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
        <br>
        <input type="submit" value="Envoyer">
    </form>
</div>