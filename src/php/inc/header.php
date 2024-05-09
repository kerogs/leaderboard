<?php

$currentFile = basename($_SERVER['PHP_SELF']);

?>

<div class="left">
    <img src="./src/img/logo.png" alt="">

    <ul>
        <a href="./">
            <li class="<?= $currentFile == 'index.php' ? 'active' : ''; ?>"">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 16H5V5h14v14z">
                </path>
                <path d="M11 7h2v2h-2zm0 4h2v6h-2z"></path>
                </svg>
                Information
            </li>
        </a>

        <a href="./leaderboard.php">
            <li class="<?= $currentFile == 'leaderboard.php' ? 'active' : ''; ?>"">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M4 7h16v2H4zm0-4h16v2H4zm0 8h16v2H4zm0 4h16v2H4zm2 4h12v2H6z"></path>
                </svg>
                Tableau des scores
            </li>
        </a>
    </ul>

    <div class="bottom">
        <p class="github">
            <a href="https://github.com/kerogs/leaderboard" target="_blank">
                By Kerogs
            </a>
            <br>
            <span>Version <?= $serverData['version'] ?></span>
        </p>
    </div>
</div>