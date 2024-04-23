<?php
$etudiants = [
    ['matricule' => 'ETU001', 'email' => 'etu001@example.com', 'nom' => 'Dupont', 'prenom' => 'Jean', 'statut' => 'etudiant', 'etat' => '1'],
    ['matricule' => 'ETU002', 'email' => 'etu002@example.com', 'nom' => 'Durand', 'prenom' => 'Pierre', 'statut' => 'etudiant', 'etat' => '1'],
    ['matricule' => 'ETU003', 'email' => 'etu003@example.com', 'nom' => 'Martin', 'prenom' => 'Paul', 'statut' => 'etudiant', 'etat' => '0']
];

$admins = [
    ['matricule' => 'ADM001', 'email' => 'admin1@example.com', 'nom' => 'Admin', 'prenom' => 'John', 'statut' => 'admin', 'etat' => 'actif'],
    ['matricule' => 'ADM002', 'email' => 'admin2@example.com', 'nom' => 'Admin', 'prenom' => 'Jane', 'statut' => 'admin', 'etat' => 'actif']
];


function genererFileUtilisateurs($etudiants, $admins) {
    

    $cles = ['matricule','email', 'nom', 'prenom', 'statut', 'etat', 'mot_de_passe'];
  
    
    // Générer le fichier CSV des utilisateurs
    $chemin = 'data/users.csv';
    fputcsv(fopen($chemin, 'a+'), $cles);

    // Ajouter les admins au fichier CSV
    foreach ($admins as $admin) {
        $motDePasse = password_hash('sonatel@academyAD', PASSWORD_DEFAULT);
        $utilisateur = [
            'matricule' => '-',
            'email' => $admin['email'],
            'nom' => $admin['nom'],
            'prenom' => $admin['prenom'],
            'statut' => 'admin',
            'etat' => '1',
            'mot_de_passe' => $motDePasse
        ];

        fputcsv(fopen($chemin, 'a+'), $utilisateur);s
    }

    // Ajouter les étudiants au fichier CSV
    foreach ($etudiants as $etudiant) {
        $motDePasse = password_hash('sonatel@academyET', PASSWORD_DEFAULT); // Le mot de passe de l'étudiant est son adresse e-mail cryptée
        $utilisateur = [
            'matricule' => $etudiant['matricule'],
            'email' => $etudiant['email'],
            'nom' => $etudiant['nom'],
            'prenom' => $etudiant['prenom'],
            'statut' => 'etudiant',
            'etat' => '1',
            'mot_de_passe' => $motDePasse
        ];
        fputcsv(fopen($chemin, 'a+'), $utilisateur);
    }
}


genererFileUtilisateurs($etudiants, $admins);