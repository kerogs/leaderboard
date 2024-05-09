<?php

// var_dump($_POST);
// var_dump($_GET);

if(isset($_POST['pseudo']) && isset($_POST['score'])) {

    $name = $_POST['pseudo'];
    $score = $_POST['score'];
    $uniqid = uniqid();

    $json = array();
    $json = [
        "name" => $name,
        "score" => $score,
        "uniqid" => $uniqid
    ];

    file_put_contents("./data/leaderboard/$uniqid.json", json_encode($json, JSON_PRETTY_PRINT));

    header("Location: ./leaderboard.php?s=Utilisateur ajouté");
}

if(isset($_POST['purge'])) {
    
    foreach(scandir("./data/leaderboard") as $file) {
        unlink("./data/leaderboard/$file");
    }

    header("Location: ./leaderboard.php?s=Leaderboard vidé");
}
