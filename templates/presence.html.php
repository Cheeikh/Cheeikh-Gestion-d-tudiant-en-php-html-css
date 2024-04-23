<?php
// Vérifiez si les filtres ont été soumis via POST, sinon utilisez les valeurs de la session
$selectedStatus = isset($_POST['status']) ? $_POST['status'] : $_SESSION['selectedStatus'] ?? '';
$selectedRef = isset($_POST['referenciel']) ? $_POST['referenciel'] : $_SESSION['selectedRef'] ?? '';

// Stockez les filtres sélectionnés dans la session
$_SESSION['selectedStatus'] = $selectedStatus;
$_SESSION['selectedRef'] = $selectedRef;
?>

<div class="title">
    <div class="left">Presence</div>
    <div class="right">Presence - Liste</div>
</div>
<form id="container-presence" action="" method="post">
    <div class="presence">

    <div class="boite status flex-cc">
    <select name="status" id="select-status">
        <option value="">Status</option>
        <option value="present" <?= $selectedStatus == 'present' ? 'selected' : '' ?>>présent</option>
        <option value="absent" <?= $selectedStatus == 'absent' ? 'selected' : '' ?>>absent</option>
    </select>
</div>

<div class="boite reference flex-cc">
    <select name="referenciel" id="select-ref" onchange="this.form.submit()">
        <option value="">Référenciel</option>
        <?php 
        $activeReferentiels = findAllActiveReferentiels();
        foreach ($activeReferentiels as $ref) {
            echo "<option value=\"$ref\" " . ($selectedRef == $ref ? 'selected' : '') . ">$ref</option>";
        }
        ?>
    </select>
</div>

        <div class="boite clandrier flex-cc">
            <input type="text" name="date" id="date" value="<?= date('Y-m-d'); ?>">
        </div>
        <div class="boite boutton flex-cc" style="background: #029386;">
            <button type="submit">rafraichir</button>
        </div>
    </div>
    <style>
        .present {
            background-color: green;
            width: 20px;
            border: 10px solid white;
            font-size: 20px;
            font-weight: bold;
            color: black;
        }

        .absent {
            background-color: red;
            width: 20px;
            border: 10px solid white;
            font-size: 20px;
            font-weight: bold;
            color: black;

        }
    </style>
    <table class="table">

        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Référentiel</th>
                <th>Durée</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($presence as $student) {
                ?>
                <tr>
                    <td><?= $student["matricule"]; ?></td>
                    <td><?= $student["nom"]; ?></td>
                    <td><?= $student["prenom"]; ?></td>
                    <td><?= $student["telephone"]; ?></td>
                    <td><?= $student["referenciel"]; ?></td>
                    <td><?= $student["duree"]; ?></td>
                    <td class="<?= $student["status"] == 'present' ? 'present' : 'absent' ?>"><?= $student["status"]; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div class="pagination">
    <a href="?pageAff=<?php echo max(1, $pageEtu - 1); ?>" class="page-link prev"><i class="fas fa-angle-left"></i></a>
    <?php 
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($i == $pageEtu) {
            echo "<a href='?pageAff=$i' class='page-link active'>$i</a>";
        } else {
            echo "<a href='?pageAff=$i' class='page-link'>$i</a>";
        }
    }
    ?>
    <a href="?pageAff=<?php echo min($totalPage, $pageEtu + 1); ?>" class="page-link next"><i class="fas fa-angle-right"></i></a>
</div>
</form>