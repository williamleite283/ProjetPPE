<h1 class="title">Nos véhicules</h1>
<div class="container">
    <div class="container-voitures">
        <?php $i = 1; ?>
        <?php if (!empty($vehicles)): foreach ($vehicles as $row): ?>
                <div class="card-voiture" id="card-voiture<?= $i ?>" value="<?= $row["idvehicule"] ?>">
                    <div class="closed">
                        <div class="img">
                            <img class="img-v" src="assets/img/Vehicule/<?= htmlspecialchars($row["image"]) ?>" alt="<?= htmlspecialchars($row["marque"] . " " . $row["modele"]) ?>">
                        </div>
                        <div class="nom">
                            <h2><?= htmlspecialchars($row["marque"] . " " . $row["modele"]) ?></h2>
                        </div>
                        <button class="btn-voir-plus" value="<?= $i ?>">
                            Voir plus
                        </button>
                    </div>
                    <div class="details" id="details<?= $i ?>">
                        <p>Année : <?= htmlspecialchars($row["annee"]) ?></p>
                        <p>Caractéristiques : <?= htmlspecialchars($row["caracteristiques"]) ?></p>
                        <p>Prix journalier : <?= htmlspecialchars($row["prix_journalier"]) ?>€</p>
                        <p>Caution : <?= htmlspecialchars($row["caution"]) ?>€</p>
                        <p>Puissance : <?= htmlspecialchars($row["puissance"]) ?> chevaux</p>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach;
        else: ?>
            <p>Aucun véhicule disponible.</p>
        <?php endif; ?>
    </div>
</div>
<script>
    var btnCards = document.querySelectorAll('.btn-voir-plus')
    btnCards.forEach(elem => {
        elem.addEventListener('click', (e) => {
            var id = e.target.value;
            if (e.target.innerText == 'Voir plus') {
                document.getElementById('details' + id).classList.add('open');
                e.target.innerText = 'Voir moins'
            } else {
                document.getElementById('details' + id).classList.remove('open');
                e.target.innerText = 'Voir plus'
            }
        })
    });
</script>