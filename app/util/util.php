<?php
$view = [];
function setView($viewPath, $data = [], $errors = []) {
    $view['errors'] = $errors;
    $view['data'] = $data;
    extract($view);
    include APP_DIR."/views/$viewPath.php";
    die;
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

function requiresSession() {

    if (!getCurrentSession()) {
        redirect(APP_URL.'/login');
    }

}

function getViewData($data, $key) {
    return isset($data[$key]) ? $data[$key] : '';
}

function getViewError($errors, $key) {
    return isset($errors[$key]) ? $errors[$key] : '';
}

function getErrorClass($errors, $key) {
    return getViewError($errors, $key) ? 'has-error' : '';
}

function createAdminSession($adminDetails) {
    session_start();
    $_SESSION['sessionVars'] = [
        'admin' => $adminDetails,
    ];
}

function destroyAdminSession() {
    session_start();
    session_unset();
    session_destroy();
}

function getCurrentSession() {
    session_start();

    return isset($_SESSION['sessionVars']) ? $_SESSION['sessionVars'] : false;
}
