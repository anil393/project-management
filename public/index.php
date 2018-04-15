<?php
require __DIR__.'/../app/conf/settings.php';
require ROOT_DIR.'/vendor/autoload.php';
require APP_DIR.'/util/util.php';
require APP_DIR.'/util/db.php';
require APP_DIR.'/util/validator.php';

$router = new \Bramus\Router\Router();

$router->get('/', function () {
    requiresSession();
    setView('home');
});

$router->get('/project/add', function () {
    requiresSession();
    setView('project/manage');
});
$router->post('/project/add', function () {
    requiresSession();
    $data = $_POST;

//Validate

// stop($data);

    foreach ($data['institution'] as $key => $value) {
        //There are n institutions and n courses
        $courseInfo = [
            'institution' => $value,
            'course'      => $data['course'][$key],
        ];
        execute('INSERT INTO course_info (`course`, `institution`) VALUES (:course, :institution)', $courseInfo);
    }

    if ($data['add_again'] == 'yes') {
        setView('project/manage');
    } else {
        redirect(APP_URL);
    }

});

$router->get('/logout', function () {
    destroyAdminSession();
    redirect(APP_URL.'/login');
});

$router->get('/login', function () {

    if (getCurrentSession()) {
        redirect(APP_URL);
    }

    setView('login');
});

$router->post('/login', function () {

    if (getCurrentSession()) {
        redirect(APP_URL);
    }

    $data = $_POST;
    $validator = new Validator($data);
    $validator->required('email', 'Email is required');
    $validator->email('email', 'Invalid email');
    $validator->required('password', 'Password is required');

    if ($errors = $validator->getErrors()) {
        setView('login', $data, $errors);
    }

    $adminDetails = executeQuery("SELECT * FROM `admin` WHERE `email`=:email AND `password`=:password", [
        'email'    => $data['email'],
        'password' => $data['password'],
    ]);

    if (!$adminDetails) {
        $validator->setError('all', 'Invalid credentials');
    }

    if ($errors = $validator->getErrors()) {
        setView('login', $data, $errors);
    }

    createAdminSession($adminDetails);
    redirect(APP_URL);
});

$router->run();
