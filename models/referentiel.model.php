<?php
session_start(); // Démarre la session si elle n'est pas déjà démarrée

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

