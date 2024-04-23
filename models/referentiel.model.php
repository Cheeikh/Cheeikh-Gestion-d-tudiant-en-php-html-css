<?php
function findPromotion()
{
    $promotion = loadFile(PATHPROMOTION);
    return $promotion;
}

function findAllReferentiels()
{
    $referentiels = loadFile(PATHREFERENTIEL);
    $matchingReferentiels = array();
    $id_promotion = $_SESSION['active_promotion']; // Récupère l'ID de la promotion active dans la session
    foreach ($referentiels as $referentiel) {
        if ($referentiel['id_promotion'] == $id_promotion) {
            $matchingReferentiels[] = $referentiel;
        }
    }
    return $matchingReferentiels;
}

function recherche($search)
{
    $recherches = findAllReferentiels();
    $result = [];
    foreach ($recherches as $recherche) {
        if ($recherche["nom"] == trim($search)) {
            $result[] = $recherche;
        }
    }
    return $result;
}

// Fonction pour insérer un nouveau référentiel avec une image
function insertNewReferentielWithImage($libelle, $description, $id_promotion, $statut, $imagePath)
{
    $referentiels = loadFile(PATHREFERENTIEL);
    
    // Génération d'un nouvel ID
    $newID = uniqid();
    
    // Création du nouvel enregistrement
    $newReferentiel = array(
        "id_referentiel" => $newID,
        "image" => $imagePath, // Utilisation du chemin de l'image fourni
        "referenciel" => $libelle,
        "statut" => $statut,
        "id_promotion" => $id_promotion
    );
    
    // Ajout du nouvel enregistrement à la liste existante
    $referentiels[] = $newReferentiel;
    
    // Sauvegarde des données dans le fichier CSV
    saveFile(PATHREFERENTIEL, $referentiels);
}

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["libelle"]) && isset($_POST["description"])) {
    // Récupération des données du formulaire
    $libelle = $_POST["libelle"];
    $description = $_POST["description"];
    $id_promotion = $_SESSION['active_promotion']; // Récupère l'ID de la promotion active dans la session
    $statut = "Active"; // Définition du statut par défaut
    
    // Traitement de l'image
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['image']['tmp_name'];
        // Utilisation directe du chemin temporaire de l'image
        $imagePath = $image_tmp_name;
        
        // Appel de la fonction pour insérer un nouveau référentiel avec l'image
        insertNewReferentielWithImage($libelle, $description, $id_promotion, $statut, $imagePath);
    } else {
        echo "Une erreur s'est produite lors du téléchargement de l'image.";
    }
}
?>
