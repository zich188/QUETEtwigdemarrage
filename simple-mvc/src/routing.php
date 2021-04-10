<?php

/**
 * This file dispatch routes.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

//Je parse mon URL en découpant via le delimiteur /, si aucun delimiteur alors tu m'affiches la route par défaut home/index
$routeParts = explode('/', ltrim($_SERVER['REQUEST_URI'], '/') ?: HOME_PAGE);

//Je construis ma route et verifie si un controleur existe en fonction du premier terme (exemple home)
//Je check si APP\\Controller\\HomeController
$controller = 'App\Controller\\' . ucfirst($routeParts[0] ?? '') . 'Controller';
//Je verifie si la methode existe exemple : index
$method = $routeParts[1] ?? '';
//Je verifie si il y a des variables
$vars = array_slice($routeParts, 2);


//JE teste avec class_exist si le controle exsite avec le nom de la classe
//Je teste avec la method_exist si le methode dans le controlle existe
// Je transmet si il y a des variables .... $vars
if (class_exists($controller) && method_exists(new $controller(), $method)) {
    echo (new $controller())->$method(...$vars);
    //Sinon j'afiche une erreur 404
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 - Page not found';
    exit();
}
