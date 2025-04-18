<?php
/*
 * index.php
 *
 * This is the main entry point of the application.
 * It handles session management, database connection, and routing to the appropriate controller based on user authentication and permissions.
 */

use App\UserManager;

// start of session
session_start([
    // session.cookie_lifetime specifies the lifetime of the cookie in seconds
    'cookie_lifetime' => 86400,
]);

// sets the default timezone used by all date/time functions in a script
date_default_timezone_set('Europe/Brussels');

// load dependencies
require_once "../config.php";


// composer autoload
require '../vendor/autoload.php';

/* personal autoload to 'model' folder
spl_autoload_register(function ($class) {

    // include with namespace and name of class
    include_once '../model/' . str_replace('\\', '/', $class) . '.php';
});
*/

// try to connect with PDO
try {

    // connect with PDO
    $connect = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=' . DB_CHARSET . ';port=' . DB_PORT, DB_LOGIN, DB_PWD);

// exception handling
} catch (Exception $e) {

    // stop with message
    die($e->getMessage());

}

// if you are logged in validly
if (isset($_SESSION['myidsession']) && $_SESSION['myidsession'] == session_id()) {

    // timeslot choice
    include_once "../controller/timeslotController.php";

    // if we are a student
    if($_SESSION['perm']==0){

        $_SESSION['classe'] = $_SESSION['idannee'][0];
        // go to student controller
        require "../controller/stagController.php";

        // stop the script
        exit();
    }

    // if we are a teacher, we choose a valide class into session
    if($_SESSION['perm']==1){
        // if we have no class in session
        if(!isset($_SESSION['classe'])){
            // go to the choice controller
            require "../controller/choiceController.php";
            // stop the script
            exit();
        }
    }


    // if you are an administrator, manage ajax requests
    if (isset($_GET['myfile'])) {

        // ajax request
        switch ($_GET['myfile']):
            case "update":
                require "../controller/update.php";
                break;
            case "load":
                require "../controller/load.php";
        endswitch;
    } else {
        // go to admin controller
        require "../controller/privateController.php";
    }

// if you are not correctly connected
} else {

    // disconnect and redirect
    if (isset($_GET['myfile'])) {
        if (UserManager::disconnect()) header("Location: ./");
        exit();
    } else {

        // go to public controller
        require "../controller/publicController.php";
    }

}