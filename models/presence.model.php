<?php

function findAllActiveReferentiels()
{
    $referentiels = loadFile(PATHREFERENTIEL);
    $activeReferentiels = array();
    $id_promotion = $_SESSION['active_promotion']; // Récupère l'ID de la promotion active dans la session

    foreach ($referentiels as $referentiel) {
        if ($referentiel['id_promotion'] == $id_promotion) {
            $activeReferentiels[] = $referentiel['nom_referentiel'];
        }
    }
    return $activeReferentiels;
}

function listPresence()
{
    $presences = loadFile(PATHPRESENCE);
    $matchingPresences = array();
    $id_promotion = $_SESSION['active_promotion']; // Récupère l'ID de la promotion active dans la session

    foreach ($presences as $presence) {
        if ($presence['id_promotion'] == $id_promotion) {
            $matchingPresences[] = $presence;
        }
    }
    return $matchingPresences;
}

function recherche($search)
{
    $recherches = listPresence();
    $result = [];
    foreach ($recherches as $recherche) {
        if ($recherche["matricule"] == trim($search)) {
            $result[] = $recherche;
        }
    }
    return $result;
}
function filtrerPresences($presences)
{

    $sess = $_SESSION["affichePresence"];
    @$statut_filtre = $sess['status'];
    @$referentiel_filtre = $sess['referenciel'];


    return ($statut_filtre == "" || $presences["status"] == $statut_filtre) &&
        ($referentiel_filtre == "" || $presences["referenciel"] == $referentiel_filtre);

}

// Récupérer les filtres de la session
$selectedStatus = $_SESSION['affichePresence']['status'] ?? '';
$selectedRef = $_SESSION['affichePresence']['referenciel'] ?? '';

$presences = listPresence();
$_SESSION['affichePresence'] = $_REQUEST;

$eleByPage = 1;
$pageEtu = $_GET['pageAff'] ?? 1;
$listeFiltre = array_filter($presences, 'filtrerPresences');
$totalPage = ceil(count($listeFiltre) / $eleByPage);
if ($pageEtu < 1 || $pageEtu > $totalPage)
    $pageEtu = 0;
$eleDeb = ($pageEtu - 1) * $eleByPage;
$etudiantsPage = array_slice($listeFiltre, $eleDeb, $eleByPage);
$presence = $etudiantsPage;

if (isset($_POST["search"])) {
    $presence = recherche($_POST["search"]);
}

// Calculer les informations de pagination
$_SESSION['paginationInfo'] = array(
    'totalPresences' => $presences,
    'eleByPage' => $eleByPage,
    'totalPage' => $totalPage
);

// Stocker les informations de pagination dans la session
$pageEtu = isset($_GET['pageAff']) ? $_GET['pageAff'] : 1;

// Redirection si la page demandée est invalide
if ($pageEtu < 1 || $pageEtu > $totalPage)
    $pageEtu = 0;

// Calculer les indices de début et de fin pour la pagination
$eleDeb = ($pageEtu - 1) * $eleByPage;
$etudiantsPage = array_slice($listeFiltre, $eleDeb, $eleByPage);
$presence = $etudiantsPage;
?>
