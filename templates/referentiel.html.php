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
				<img src="<?= $referent['image'] ?>" alt="">
				<div class="ref">
					<div style="    position: absolute;bottom: 69%;left: -16%;"><?= $referent['nom_referentiel'] ?></div> <br>
					<div class="active"><?= $referent['statut'] ?></div>

				</div>
			</div>

		<?php endforeach; ?>

	</div>

	<div class="formRef">
		<h4>Noueau Référentiel</h4>
		<span>Libelle</span> <br>

		<i class="fa-regular fa-user" class="first-user"></i>
		<input type="text" class="libelle" placeholder=" entrer le Libelle"> <br>
		<i class="fa-regular fa-user" class="twon-user"></i>
		<textarea name="text" id="desc" cols="10" rows="5" placeholder="entrer la  descrition"></textarea>
		<button class="btn">Enregistrer</button>
	</div>
</div>