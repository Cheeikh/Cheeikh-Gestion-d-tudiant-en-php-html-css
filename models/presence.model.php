<?php
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
$presence = listPresence();
$presence = $etudiantsPage;

if (isset($_POST["search"])) {
    $presence = recherche($_POST["search"]);
}

