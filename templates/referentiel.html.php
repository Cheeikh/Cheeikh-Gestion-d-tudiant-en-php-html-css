<div class="promotions">
	<h2>Référentiels</h2>
	<span>Référentiels * Création</span>
</div>

<div class="referent">

<div class="main">
    <?php
    $refDig = findAllReferentiels();
    if (isset($_POST["search"])) {
        $refDig = recherche($_POST["search"]);
    }

    $referentiels = findAllReferentiels();
    foreach ($referentiels as $referent): ?>
        <div class="img">
            <span class="points">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </span>
            <!-- Ajouter l'attribut "selected" si la valeur correspond à $selectedRef -->
            <a href="/apprenant" onclick="updateSelect('<?= $referent['referenciel'] ?>')">
                <?php
                $imageURL = isset($referent['image']) ? $referent['image'] : 'https://st4.depositphotos.com/16959514/20210/v/450/depositphotos_202100364-stock-illustration-classroom-with-kids-teacher-or.jpg';
                ?>
                <img src="<?= $imageURL ?>" alt="">
            </a>
            <div class="ref">
                <div style="position: absolute;bottom: 69%;left: -16%;"><?= $referent['referenciel'] ?></div> <br>
                <div class="active"><?= $referent['statut'] ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


	<div class="formRef">
    <h4>Nouveau Référentiel</h4>
    <form id="referentielForm" method="post" enctype="multipart/form-data">
        <span>Libellé</span><br>
        <input type="text" name="libelle" placeholder="Entrer le Libellé" required><br>
        
        <span>Description</span><br>
        <textarea name="description" cols="10" rows="5" placeholder="Entrer la description" required></textarea><br>
        
        <span>Image</span><br>
        <input type="file" id="imageInput" name="image" accept="image/*"><br>
        <span id="imageError" style="color: red; display: none;">Veuillez choisir un fichier image.</span><br>
        
        <div id="imagePreview" style="display: none;color:red;">
            <img id="previewImage" src="#" alt="Aperçu de l'image" style="max-width: 100px; max-height: 100px;">
        </div>
        
        <div class="toggle">
            <input type="checkbox" id="switch" /><label for="switch">Toggle</label>
        </div>
        
        <button type="submit" class="btn">Enregistrer</button>
    </form>
</div>

<script>
document.getElementById("imageInput").addEventListener("change", function(event) {
    var fileInput = event.target;
    var preview = document.getElementById("imagePreview");
    var errorMessage = document.getElementById("imageError");
    
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.style.display = "block";
            document.getElementById("previewImage").setAttribute("src", e.target.result);
        }

        reader.readAsDataURL(fileInput.files[0]);
        errorMessage.style.display = "none";
    } else {
        preview.style.display = "none";
        errorMessage.style.display = "block";
    }
});
</script>



<style>
.toggle	input[type=checkbox]{
	height: 0;
	width: 0;
	visibility: hidden;
}

.toggle label {
	cursor: pointer;
    text-indent: -9999px;
    width: 22%;
    height: 3vh;
    background: grey;
    display: block;
    border-radius: 100px;
    position: relative;
	overflow: hidden;
}

.toggle label:after {
	content: '';
    position: absolute;
    /* top: 5px; */
    left: 5px;
    width: 3VH;
    height: 3vh;
    background: #fff;
    border-radius: 90px;
    transition: 0.3s;
}

.toggle input:checked + label {
	background: #bada55;
}

.toggle input:checked + label:after {
	left: calc(100% - 5px);
	transform: translateX(-100%);
}

.toggle label:active:after {
	width: 130px;
}
</style>

<script>
    function updateSelect(selectedRef) {
    // Sélectionner l'élément select par son ID
    var selectRef = document.getElementById("select-ref");
    
    // Mettre à jour la valeur sélectionnée du select
    selectRef.value = selectedRef;
    
    // Soumettre le formulaire pour mettre à jour la page avec le nouveau filtre sélectionné
    selectRef.form.submit();
}
</script>