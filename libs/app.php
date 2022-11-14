<?php
require_once 'controllers/errores.php';
class App
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        if (empty($url[0])) {
            $archivoController = 'controllers/main.php';
            require $archivoController;
            $controller = new Main();
            $controller->render();
            $controller->loadModel('index');
            return false;
        } else {
            $archivoController = 'controllers/' . $url[0] . '.php';
        }
        if (file_exists($archivoController)) {
            require $archivoController;
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            // Se obtienen el número de param
            $nparam = [];
            array_push($nparam, $_POST);
            array_push($nparam, $_GET);
            // si se llama a un método
            if ((count($nparam[0]) + count($nparam[1])) >= 2) {
                // hay parámetros
                if ($nparam > 2) {
                    $param = [];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $cantParametrosPost = count($_POST);
                        $tagsPost = array_keys($_POST); // obtiene los nombres de las varibles
                        $valoresPost = array_values($_POST); // obtiene los valores de las varibles
                        // crea las variables y les asigna el valor
                        for ($i = 0; $i < $cantParametrosPost; $i++) {
                            $param[$tagsPost[$i]] = $valoresPost[$i];
                        }
                    } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                        $cantParametrosGet = count($_GET);
                        $tagsGet = array_keys($_GET); // obtiene los nombres de las varibles
                        $valoresGet = array_values($_GET); // obtiene los valores de las varibles
                        // crea las variables y les asigna el valor
                        for ($i = 1; $i < $cantParametrosGet; $i++) {
                            $param[$tagsGet[$i]] = $valoresGet[$i];
                        }
                    }
                    $controller->{$url[1]}($param);
                } else {
                    // solo se llama al método
                    $controller->{$url[1]}();
                }
            } else {
                // si se llama a un controlador
                $controller->render();
            }
        } else {
            $controller = new Errores();
        }
    }
}
