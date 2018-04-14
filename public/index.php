<?php
require __DIR__.'/../app/conf/settings.php';
require ROOT_DIR.'/vendor/autoload.php';

function setView($viewPath) {
    include APP_DIR."/views/$viewPath.php";
}

function redirect($route) {
    header("Location: $route");
}

function notice($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function stop($data) {
    notice($data);
    die;
}

function checkSession() {

    if (true) {
        //Todo: if sesison doesnot exisst then redirect to login
        redirect(APP_URL.'/login');
    }

}

$router = new \Bramus\Router\Router();

$router->get('/', function () {
    checkSession();
});

$router->get('/login', function () {
    setView('login/login');
});

$router->post('/login', function () {
    $data = $_POST;
    $errors = [];

    if (!isset($data['email'])) {

    }

    // setView('login/login');
});

$router->run();
