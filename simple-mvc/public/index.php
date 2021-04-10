<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 14:01
 */

//Autoload qui permet de faire des requires automqtiquement
require_once __DIR__ . '/../vendor/autoload.php';

//Environnement de DEV
if (getenv('ENV') === false) {
    require_once __DIR__ . '/../config/debug.php';
    require_once __DIR__ . '/../config/db.php';
}

//Page de configuration de mon application web
require_once __DIR__ . '/../config/config.php';
//Page de routing qui gere les route de mon application
require_once __DIR__ . '/../src/routing.php';
