<?php
//constante vers la racine du projet
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
require_once(ROOT . 'Core/DataBase.php');
require_once(ROOT . 'Core/Controller.php');
//tableau contenant les paramètres de l'url en lien avec la règle de réecriture
$params = explode('/', $_GET['param']);
define ('ROOT_DIRECTORY', Dirname($_SERVER['PHP_SELF']). '/');
$controller = ucfirst($params[0]);
//constante vers les controllers
define('ROUTE_CONTROLLER', ROOT . 'App/controllers/' . $controller . 'Controller.php');
if ($controller != NULL) {
    if (file_exists(ROUTE_CONTROLLER)) {
        //on recupère la methode de l'url si elle est pas défini on la mets par défaut à index

        if (isset($params[1]) && $params[1] != NULL) {
            $method = $params[1];
        } else {
            $method = 'index';
        }

        //on appelle le contrôleur
        require_once(ROUTE_CONTROLLER);
        $controller = $controller . 'Controller';
        $controller = new $controller();
        if (method_exists($controller, $method)) {
            $controller->$method();

        } else {

            http_response_code(404);
        }
    } else {

        http_response_code(404);
    }

} else {
    require_once(ROOT . 'App/controllers/AccueilController.php');
    $controller = 'AccueilController';
    $controller = new $controller();
    $controller->index();
}


?>