<?php

session_start(); // Démarrer la session

function findAllActiveReferentiels()
{
    $referentiels = loadFile(PATHREFERENTIEL);
    $activeReferentiels = array();
    $id_promotion = $_SESSION['active_promotion']; // Récupère l'ID de la promotion active dans la session

    foreach ($referentiels as $referentiel) {
        if ($referentiel['id_promotion'] == $id_promotion) {
            $activeReferentiels[] = $referentiel['referenciel'];
        }
    }
    return $activeReferentiels;
}

function findAllStudents()
{
    $students = loadFile(PATHAPRENANT);

    // Vérifie s'il y a une promotion active
    if (isset($_SESSION['active_promotion'])) {
        $activePromotion = $_SESSION['active_promotion'];

        // Si des référentiels sont sélectionnés
        if (isset($_POST['referentiels']) && !empty($_POST['referentiels'])) {
            $selectedRefs = $_POST['referentiels'];
            $filteredStudents = array_filter($students, function ($student) use ($activePromotion, $selectedRefs) {
                return $student['id_promotion'] == $activePromotion && in_array($student['referenciel'], $selectedRefs);
            });
            $_SESSION['selectedRefs'] = $selectedRefs; // Enregistrer les référentiels sélectionnés dans la session
            return $filteredStudents;
        } else {
            // Récupérer les référentiels sélectionnés depuis la session
            $selectedRefs = isset($_SESSION['selectedRefs']) ? $_SESSION['selectedRefs'] : [];

            // Filtrer les étudiants en fonction des référentiels sélectionnés
            if (!empty($selectedRefs)) {
                $filteredStudents = array_filter($students, function ($student) use ($activePromotion, $selectedRefs) {
                    return $student['id_promotion'] == $activePromotion && in_array($student['referenciel'], $selectedRefs);
                });
            } else {
                // Si aucun référentiel n'est sélectionné, afficher tous les étudiants de la promotion active
                $filteredStudents = array_filter($students, function ($student) use ($activePromotion) {
                    return $student['id_promotion'] == $activePromotion;
                });
            }
            
            return $filteredStudents;
        }
    } else {
        // Créer un tableau vide avec les clés attendues
        $emptyStudent = [
            'image' => '',
            'nom' => '',
            'prenom' => '',
            'email' => '',
            'genre' => '',
            'telephone' => '',
            'action' => '',
            'id_promotion' => '',
            'referenciel' => ''
        ];

        // Retourner un tableau vide contenant un étudiant avec des valeurs vides
        return array($emptyStudent);
    }
}

// Assurez-vous que $apprenants est toujours défini
if (!isset($apprenants)) {
    // Récupérer les apprenants du modèle
    $apprenants = findAllStudents();
}

// La fonction de filtrage
function filtrerApprenants($apprenant)
{
    if (isset($_POST['referenciel'])) {
        $referenciel_filtre = $_POST['referenciel'];
        return $apprenant["referenciel"] == $referenciel_filtre;
    } else {
        return true;
    }
}

// Fonction de recherche par email
function recherche($filtrer)
{
    $recherches = findAllStudents();
    $result = [];
    foreach ($recherches as $recherche) {
        if ($recherche["email"] == trim($filtrer)) {
            $result[] = $recherche;
        }
    }
    return $result;
}

if (isset($_POST["search"])) {
    $apprenants = recherche($_POST["search"]);
}

// Sauvegarder l'état du checkbox dans la session
if (isset($_POST['cacherlr'])) {
    $_SESSION['cacherlr'] = $_POST['cacherlr'];
}

// Récupérer l'état du checkbox à partir de la session
$cacherlr = isset($_SESSION['cacherlr']) ? $_SESSION['cacherlr'] : '';

// Appliquer le filtrage en fonction de l'état du checkbox
if ($cacherlr == 'on') {
    // Afficher tous les étudiants sans filtrage
    $totalStudents = findAllStudents();
} else {
    // Filtrer les étudiants en fonction des référentiels sélectionnés
    $totalStudents = array_filter(findAllStudents(), 'filtrerApprenants');
}


// Calculer les informations de pagination
$eleByPage = 4;
$totalPage = ceil(count($totalStudents) / $eleByPage);

// Stocker les informations de pagination dans la session
$_SESSION['paginationInfo'] = array(
    'totalStudents' => $totalStudents,
    'eleByPage' => $eleByPage,
    'totalPage' => $totalPage
);

// Récupérer la page actuelle à afficher
$pageEtu = isset($_GET['pageAff']) ? $_GET['pageAff'] : 1;

// Redirection si la page demandée est invalide
if ($pageEtu < 1 || $pageEtu > $totalPage)
    $pageEtu = 1;

// Calculer les indices de début et de fin pour la pagination
$eleDeb = ($pageEtu - 1) * $eleByPage;
$eleFin = $eleDeb + $eleByPage;

// Extraire les étudiants à afficher sur la page actuelle
$apprenants = array_slice($totalStudents, $eleDeb, $eleByPage);
?>
