<?php

    require_once __DIR__.'/functions.php';
    require_once __DIR__.'/../../vendor/autoload.php';

    $serverData = json_decode(file_get_contents('./data/serverConfig.json'), true);

?>