<?php


function findPromotion()
{
    $promotion = loadFile(PATHPROMOTION);
    return $promotion;
}

function modifierStatut($id_promotion, $nouveau_statut)
{
    $promotions = findPromotion();
    foreach ($promotions as &$promo) {
        if ($promo['id_promotion'] == $id_promotion) {
            $promo['status'] = $nouveau_statut;
        } elseif ($promo['status'] == 1) {
            // Ne désactiver que les promotions actuellement actives, sauf celle cochée
            $promo['status'] = 0;
        }
    }
    saveFile(PATHPROMOTION, $promotions);
}

$promotions = findPromotion();
if (isset($_POST['checkbox'])) {
    // Récupérer la valeur de la case cochée
    $selected_checkbox = $_POST['checkbox']; 
    
    // Activer la promotion cochée
    modifierStatut($selected_checkbox, 1); 

    // Désactiver les autres promotions
    foreach ($promotions as $promo) {
        if ($promo['id_promotion'] != $selected_checkbox && $promo['status'] == 1) {
            modifierStatut($promo['id_promotion'], 0);
        }
    }

    // Stocker l'ID de la promotion active dans la session
    $_SESSION['active_promotion'] = $selected_checkbox;
} else {
    // Si aucune case cochée, vérifiez s'il y a une promotion active dans la session
    if (isset($_SESSION['active_promotion'])) {
        // S'il y a une promotion active dans la session, utilisez-la
        modifierStatut($_SESSION['active_promotion'], 1);
    } else {
        // Sinon, cochez la dernière promotion
        $last_promotion = end($promotions); // Récupérer la dernière promotion du tableau
        $last_promotion_id = $last_promotion['id_promotion'];
        modifierStatut($last_promotion_id, 1);

        // Stocker l'ID de la dernière promotion dans la session
        $_SESSION['active_promotion'] = $last_promotion_id;
    }
}

