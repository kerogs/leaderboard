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
</head>

<body>

    <!-- customMenu -->
    <!-- <div class="custom-menu" id="custom-menu">
        <ul>

            <li id="retirer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M5 2c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3.5l3.5 4 3.5-4H19c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2H5zm11 9H8V9h8v2z">
                    </path>
                </svg>
                Retirer
            </li>

            <li id="modifier">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M9 22h1v-2h-.989C8.703 19.994 6 19.827 6 16c0-1.993-.665-3.246-1.502-4C5.335 11.246 6 9.993 6 8c0-3.827 2.703-3.994 3-4h1V2H8.998C7.269 2.004 4 3.264 4 8c0 2.8-1.678 2.99-2.014 3L2 13c.082 0 2 .034 2 3 0 4.736 3.269 5.996 5 6zm13-11c-.082 0-2-.034-2-3 0-4.736-3.269-5.996-5-6h-1v2h.989c.308.006 3.011.173 3.011 4 0 1.993.665 3.246 1.502 4-.837.754-1.502 2.007-1.502 4 0 3.827-2.703 3.994-3 4h-1v2h1.002C16.731 21.996 20 20.736 20 16c0-2.8 1.678-2.99 2.014-3L22 11z">
                    </path>
                </svg>
                Modifier
            </li>

            <hr>

            <li id="inverser">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M8 16H4l6 6V2H8zm6-11v17h2V8h4l-6-6z"></path>
                </svg>
                Inverser
            </li>

        </ul>
    </div> -->

    <!-- nav -->
    <div class="container">

        <?php require_once 'src/php/inc/header.php' ?>

        <!-- tableau des scores -->
        <div class="center">
            <div class="subcontainer">
                <h1>Tableau des scores</h1>
                <table id="content">
                    <thead>
                        <th>R.</th>
                        <th>Joueur</th>
                        <th>Score</th>
                    </thead>
                    <tbody>

                        <?php

                        $leaderboard = trierFichiersJSONParScore("./data/leaderboard");
                        // var_dump($leaderboard);
                        $i = 1;

                        foreach ($leaderboard as $leader) {
                            $leaderJSON = json_decode(file_get_contents("./data/leaderboard/$leader"), true);
                            echo '
                                <tr data-id="' . $leaderJSON['uniqid'] . '">
                                    <td><span>' . $i . '</span></td>
                                    <td>' . $leaderJSON['name'] . '</td>
                                    <td>' . $leaderJSON['score'] . ' pts</td>
                                </tr>
                                ';
                            $i++;
                        }

                        ?>
                        <!-- <tr data-id="294720fdj49">
                            <td><span>1</span></td>
                            <td>Kerogs</td>
                            <td>1920 pts</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>



        <!-- settings -->
        <div class="right">
            <section>
                <form action="leaderboard-send.php" id="add" method="POST">
                    <h3 for="">Ajouter un joueur</h3>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
                    <input type="text" name="score" id="score" placeholder="Score" required>
                    <input type="submit" value="Ajouter">
                </form>
            </section>

            <section>
                <form action="leaderboard-send.php" id="purge" method="POST">
                    <input type="hidden" name="purge" value="true">
                    <input class="red" type="submit" value="Purger">
                </form>
            </section>
        </div>
    </div>

</body>
<!-- script -->
<script src="./src/js/tbs.js"></script>

</html>