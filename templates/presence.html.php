<div class="title">
    <div class="left">Presence</div>
    <div class="right">Presence - Liste</div>
</div>
<form id="container-presence" action="" method="post">
    <div class="presence">

        <?php
        $selectedStatus = isset($_POST['status']) ? $_POST['status'] : '';
        $selectedRef = isset($_POST['referenciel']) ? $_POST['referenciel'] : '';
        ?>

        <div class="boite status flex-cc">
            <select name="status" id="select-status">
                <option value="">Status</option>
                <option value="present" <?= $selectedStatus == 'present' ? 'selected' : '' ?>><span>present</span></option>
                <option value="absent" <?= $selectedStatus == 'absent' ? 'selected' : '' ?>>absent</option>
            </select>
        </div>

        <div class="boite reference flex-cc">
            <select name="referenciel" id="select-ref">
                <option value="">Reférenciel</option>
                <option value="dev_web" <?= $selectedRef == 'dev_web' ? 'selected' : '' ?>>dev_web</option>
                <option value="data" <?= $selectedRef == 'data' ? 'selected' : '' ?>>data</option>
                <option value="ref_dig" <?= $selectedRef == 'ref_dig' ? 'selected' : '' ?>>ref_dig</option>
                <option value="aws" <?= $selectedRef == 'aws' ? 'selected' : '' ?>>aws</option>
                <option value="hackeuse" <?= $selectedRef == 'hackeuse' ? 'selected' : '' ?>>hackeuse</option>
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
        <?php if ($pageEtu > 1): ?>
            <a href="?pageAff=<?= ($pageEtu - 1) ?>" class="page-link prev"><i class="fas fa-angle-left"></i></a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPage; $i++): ?>
            <?php if ($i == $pageEtu): ?>
                <a href="#" class="page-link active"><?= $i ?></a>
            <?php else: ?>
                <a href="?pageAff=<?= $i ?>" class="page-link"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($pageEtu < $totalPage): ?>
            <a href="?pageAff=<?= ($pageEtu + 1) ?>" class="page-link next"><i class="fas fa-angle-right"></i></a>
        <?php endif; ?>
    </div>
</form>