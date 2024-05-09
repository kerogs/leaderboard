<?php

require_once './src/php/core.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leaderboard | Five'sTv </title>
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="shortcut icon" href="./src/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./src/css/markdown.css">
</head>

<body>

    <!-- nav -->
    <div class="container">

        <?php require_once 'src/php/inc/header.php' ?>

        <!-- tableau des scores -->
        <div class="center">
            <div class="subcontainer">
                <h1 style="text-align:center;">Bienvenue, sur le Leaderboard</h1>
                <div class="md-ksm md-ksm-bck md-ksm-spc md-ksm-mh">
                    <?php

                    echo (new Parsedown())->text(file_get_contents("./data/update.md"));

                    ?>
                </div>
            </div>
        </div>

</body>
<!-- script -->
<script src="./src/js/tbs.js"></script>

</html>