<div class="promotions">
    <h2>promotions</h2>
    <span>Promos * Liste</span>
</div>
<div class="containe">

    <div class="dev">
        <div class="promo">
            <span>List Des Promotions <span class="un">(1)</span></span>
        </div>
        <form action="" class="input">
            <input type="text" placeholder="Recherche ici ..." class="text" name="search">
            <a href="#"> <button><i class="fa-solid fa-plus"></i>nouvel</button></a>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>Libelle</th>
                <th>DateDebut</th>
                <th>DateFin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <form action="" method="post" class="check">
                <?php
                $promos = findPromotion();
                foreach ($promos as $promo):
                    $id_promo = $promo['id_promotion'];
                    $checked = ($promo['status'] == 1) ? "checked" : ""; // Vérifie si le statut est 1
                    ?>
                    <tr>
                        <td><?= $promo['libelle'] ?> </td>
                        <td><?= $promo['dateDebut'] ?></td>
                        <td><?= $promo['dateFin'] ?></td>
                        <td>
                            <input type="checkbox" class="check" <?= $checked ?>>
                            <input type="submit" name="checkbox" value="<?= $id_promo ?>" style="position: absolute;right: 8%;width: 3%;opacity:0;">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </form>

        </tbody>
    </table>
</div>