<?php
function trierFichiersJSONParScore($dossier) {
    if (!is_dir($dossier)) {
        return "Le dossier spécifié n'existe pas.";
    }

    $fichiersScores = array();
    $handle = opendir($dossier);

    while (($fichier = readdir($handle)) !== false) {
        if (pathinfo($fichier, PATHINFO_EXTENSION) == 'json') {
            $contenu = file_get_contents($dossier . '/' . $fichier);
            $donnees = json_decode($contenu, true);
            if (is_array($donnees) && isset($donnees['score'])) {
                $fichiersScores[$fichier] = intval($donnees['score']);
            }
        }
    }

    closedir($handle);
    arsort($fichiersScores);
    $fichiersTries = array_keys($fichiersScores);
    return $fichiersTries;
}