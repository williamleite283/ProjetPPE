<div class="container-accueil">
    <h1>Mon compte</h1>
    <p>Bienvenue <?= htmlspecialchars($_SESSION['User']['prenom'] ?? '') . " " . htmlspecialchars($_SESSION['User']['nom'] ?? '') ?> !</p>
</div>
<div class="container-reservations">
    <table class="table-reservations">
        <tr>
            <th>Nom du véhicule</th>
            <th>Date de début</th>
            <th>Date de fin</th>
        </tr>
        <?php
        if (!empty($reservations)):
            foreach ($reservations as $res):
                echo "<tr>
                    <td>" . htmlspecialchars($res['vehicule_marque']) . " " . htmlspecialchars($res['vehicule_modele']) . "</td>
                    <td>" . htmlspecialchars($res['start_date']) . "</td>
                    <td>" . htmlspecialchars($res['end_date']) . "</td>
                </tr>";
            endforeach;
        else: ?>
            <tr>
                <td colspan='3'>Vous n'avez aucune réservation</td>
            </tr>
        <?php endif; ?>
    </table>
</div>