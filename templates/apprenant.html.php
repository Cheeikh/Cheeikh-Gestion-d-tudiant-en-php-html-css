<?php
if (isset($_POST['referenciel'])) {
    // Stocker la nouvelle sélection dans la session
    $_SESSION['selectedRef'] = $_POST['referenciel'];
}
// Vérifier si une valeur de filtre est stockée dans la session
$selectedRef = isset($_SESSION['selectedRef']) ? $_SESSION['selectedRef'] : '';
?>

<div class="title">
        <div class="left">Promotions</div>
        <div class="right">Promos - Création</div>
    </div>
    <div class="conteneur">
        <div class="contain1">
            <span>Promotion :</span>
            <span>promotion 6</span>
        </div>
        <div class="contain2">
            <span>Referentiel :</span>
            <span>
            <form id="filterForm" action="" method="post">
    <select name="referenciel" id="select-ref" onchange="this.form.submit()">
        <option value="">Reférenciel</option>
        <option value="dev_web" <?= isset($_POST['referenciel']) && $_POST['referenciel'] == 'dev_web' ? 'selected' : '' ?>>dev_web</option>
        <option value="data" <?= isset($_POST['referenciel']) && $_POST['referenciel'] == 'data' ? 'selected' : '' ?>>data</option>
        <option value="ref_dig" <?= isset($_POST['referenciel']) && $_POST['referenciel'] == 'ref_dig' ? 'selected' : '' ?>>ref_dig</option>
        <option value="aws" <?= isset($_POST['referenciel']) && $_POST['referenciel'] == 'aws' ? 'selected' : '' ?>>aws</option>
        <option value="hackeuse" <?= isset($_POST['referenciel']) && $_POST['referenciel'] == 'hackeuse' ? 'selected' : '' ?>>hackeuse</option>
    </select>
</form>
            </span>
        </div>
    </div>
    <div class="content">
            <div class="flex-col-left">
            </div>
            <div class="flex-col-right">
                <div class="line2">
                    <div class="div1"> Liste Des Apprenants <span>(50)</span> </div>
                    <div class="div2">
                        <button class="new btn" onclick="window.location.href='#popup'">+ Nouveau</button>
                        <button class="insert btn" onclick="window.location.href='#popupFILE'">Insertion en masse</button>
                        <button class="file btn"><span><i class="fa-solid fa-download"> </i> Fichier modèle</span></button>
                        <button class="list btn">Liste des Exclus</button>
                    </div>
                </div>
                <form class="line3" action="" method="post">
                    <span><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" name="search" placeholder="Filtrer">
                </form>
                <div class="line4"><img src="public/images/img.png" width="5%" height="10%"></div>
                <div class="container-table">
                    <table class="line5">            
                            <tr>
                                <th class="titre" data-label="Image">Image</th>
                                <th class="titre" data-label="Nom">Nom</th>
                                <th class="titre prenom" data-label="Prenom">Prenom</th>
                                <th class="titre email1" data-label="Email">Email</th>
                                <th class="titre" data-label="Genre">Genre</th>
                                <th class="titre" data-label="Telephones">Telephones</th>
                                <th class="titre" data-label="Actions">Actions</th>
                            </tr>            
                        <tbody>
                            <?php
                            foreach ($apprenants as $student) :  ?>
                                <tr class="line">
                                    <td class="bloc">
                                        <div class="col-haut"></div>
                                        <div class="col-bas"><img src="public/images/icon.png" width="30px"></div>
                                    </td>
                                    <td class="bloc">
                                        <div class="col-haut"></div>
                                        <div class="col-bas" style="color:rgb(29, 109, 29);"><?= $student['nom'] ?></div>
                                    </td>
                                    <td class="bloc">
                                        <div class="col-haut"></div>
                                        <div class="col-bas" style="color:rgb(29, 109, 29);"><?= $student['prenom'] ?></div>
                                    </td>
                                    <td class="bloc">
                                        <div class="col-haut"></div>
                                        <div class="col-bas email"><?= $student['email'] ?></div>
                                    </td>
                                    <td class="bloc">
                                        <div class="col-haut"></div>
                                        <div class="col-bas"><?= $student['genre'] ?></div>
                                    </td>
                                    <td class="bloc">
                                        <div class="col-haut"></div>
                                        <div class="col-bas"><?= $student['telephone'] ?></div>
                                    </td>
                                    <td class="bloc">
                                        <div class="col-haut"></div>
                                        <input type="checkbox" id="my-checkbox-0" <?php if ($student['action']) : ?> checked <?php endif; ?> >
                                        <label for="my-checkbox-0"></label>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                   <!-- Pagination -->
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



                </div>
            </div>
    </div>





















<!-- Le Modal (popup) -->
<div class="container-popup">
    <div id="popup2" class="modal">
        <!-- Contenu du Modal -->
        <form action="" method="post" class="modal-content">
            <div class="head">
                <a href="#" class="close">×</a>
                <h2>Nouvel Apprenant</h2>
            </div>
            <div class="section informations-perso">
                <div class="line flex">
                    <span><i class="fa-solid fa-pen"></i></span>
                    <span>Informations Perso.</span>
                    <span></span>
                    <span><i class="fa-solid fa-2"></i></span>
                    <span>Informations Supplémentaires</span>
                </div>
                <div class="input-group">
                    <div>
                        <label for="nom_tuteur">Nom et Prénom tuteur</label>
                        <input type="text" id="nom_tuteur" placeholder="Nom & Prénom tuteur" required>
                    </div>
                    <div>
                        <label for="contact_tuteur">Contact Tuteur</label>
                        <input type="text" id="contact_tuteur" placeholder="Contact Tuteur" required>
                    </div>
                    <div>
                        <label for="photocopie_cni">Photocopie CNI</label>
                        <input type="file" id="photocopie_cni" placeholder="Photocopie CNI" required>
                    </div>
                    <div>
                        <label for="extrait_naissance">Extrait de naissance</label>
                        <input type="file" id="extrait_naissance" placeholder="Extrait de naissance" required>
                    </div>
                    <div>
                        <label for="diplome">Diplôme</label>
                        <input type="file" id="diplome" placeholder="Diplôme">
                    </div>
                    <div>
                        <label for="casier_judiciaire">Casier Judiciaire</label>
                        <input type="file" id="casier_judiciaire" placeholder="Casier Judiciaire" required>
                    </div>
                    <div>
                        <label for="visite_medicale">Visite Médicale</label>
                        <input type="file" id="visite_medicale" placeholder="Visite Médicale" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="section">
                <div class="btn-container">
                    <a href="#" class="btn underline-none cancel-btn "> X Annuler</a>
                    <a href="#" type="submit" class="btn underline">+ Créer nouvel apprenant</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container-popup2">

    <div id="popup" class="modal">

        <!-- Contenu du Modal -->
        <form action="" method="post" class="modal-content">
            <div class="head">
                <a href="#" class="close">×</a>
                <h2>Nouvel Apprenant</h2>
            </div>
            <div class="section informations-perso">
                <div class="line flex">
                    <span><i class="fa-solid fa-1"></i></span>
                    <span>Informations Perso.</span>
                    <span></span>
                    <span><i class="fa-solid fa-2" style="color: #038e89;background: #f2f1ff"></i></span>
                    <span>Informations Supplémentaires</span>
                </div>
                <div class="input-group">
                    <div>
                        <label for="nom_tuteur">Nom et Prénom tuteur</label>
                        <input type="text" id="nom_tuteur" placeholder="Nom & Prénom tuteur" required>
                    </div>
                    <div>
                        <label for="contact_tuteur">Contact Tuteur</label>
                        <input type="text" id="contact_tuteur" placeholder="Contact Tuteur" required>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Entrer l'email" required class="input-group input[type='email']">
                    </div>
                    <div>
                        <label for="telephone">Telephone</label>
                        <input type="text" id="telephone" placeholder="Entrer le telephone" required>
                    </div>
                    <div>
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="sexe" class="input-group select">
                            <option value="masculin">Masculin</option>
                            <option value="feminin">Feminin</option>
                        </select>
                    </div>
                    <div class="date-input-container">
                        <label for="casier_judiciaire">Date de Naissance</label>
                        <input type="date" id="date_naissance" placeholder="MM/DD/YYYY" required>
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <div>
                        <label for="visite_medicale">Lieu de Naissance</label>
                        <input type="text" id="lieu_naissance" placeholder="Entrer le lieu de naissance" required>
                    </div>
                    <div>
                        <label for="visite_medicale">Ṇ̣° CNI</label>
                        <input type="text" id="lieu_naissance" placeholder="Entrer le numero de votre carte d'identité" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="section">
                <div class="btn-container">
                    <a href="#popup2" class="btn" class="btn underline">Suivant</a>
                </div>
            </div>
        </form>

    </div>
</div>





<div class="excel" id="popupFILE">
    <div class="popup">
        <div class="popup-header">Choisir un Fichier Excel</div>
        <div class="upload">
            <div class="chose-file"><input type="file" class="hidden-input" id="fileInput" accept=".xlsx, .xls, .ods" hidden>
                <label for="fileInput" class="drop-zone">
                    <span class="drop-zone-text">Drop file here or click to upload</span>
                </label>
            </div>
        </div>
        <div class="footer-btns">
            <a href="#" class="btn btn-red">Fermer</a>
            <button type="submit" form="formExcel" class="btn btn-green">Enregistrer</button>
        </div>
    </div>
</div>