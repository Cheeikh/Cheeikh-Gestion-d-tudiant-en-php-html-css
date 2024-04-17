<?php

function findAllStudents()
{
    $students = loadFile(PATHAPRENANT);

// Vérifie s'il y a une promotion active
if (isset($_SESSION['active_promotion'])) {
    $activePromotion = $_SESSION['active_promotion'];

    // Si un filtre de référence est également défini
    if (isset($_POST['referenciel'])) {
        $referenciel_filtre = $_POST['referenciel'];
        $filteredStudents = array_filter($students, function ($student) use ($activePromotion, $referenciel_filtre) {
            return $student['id_promotion'] == $activePromotion && $student['referenciel'] == $referenciel_filtre;
        });
        return $filteredStudents;
    } else {
        // Récupérer la valeur sélectionnée du filtre de référence depuis la session
        $selectedRef = isset($_SESSION['selectedRef']) ? $_SESSION['selectedRef'] : '';

        // Filtrer les étudiants en fonction de la valeur sélectionnée du filtre de référence
        if (!empty($selectedRef)) {
            $filteredStudents = array_filter($students, function ($student) use ($activePromotion, $selectedRef) {
                return $student['id_promotion'] == $activePromotion && $student['referenciel'] == $selectedRef;
            });
        } else {
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

    // Retourne un tableau vide contenant un étudiant avec des valeurs vides
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

// Appliquer le filtrage
$totalStudents = findAllStudents(); // Récupère tous les étudiants

// Calculer les informations de pagination
$eleByPage = 1;
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
