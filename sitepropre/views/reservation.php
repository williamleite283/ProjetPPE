<div class="container-accueil">
    <h1>Réservez votre véhicule de prestige</h1>
    <form action="index.php?page=reservation" method="post">
        <label for="vehicule">Sélectionnez un véhicule:</label>
        <select id="vehicule" name="vehicule" required>
            <option value="">Choisissez un véhicule</option>
            <?php foreach ($vehicles as $veh): ?>
                <option value="<?= $veh['idvehicule'] ?>">
                    <?= htmlspecialchars($veh['marque']) . ' ' . htmlspecialchars($veh['modele']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label for="start-date">Date de départ:</label>
        <input type="date" id="start-date" name="start-date" required>
        <label for="end-date">Date de retour:</label>
        <input type="date" id="end-date" name="end-date" required>
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <input type="submit" value="Réserver" name="reserver">
    </form>
</div>