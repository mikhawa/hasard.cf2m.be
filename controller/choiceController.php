<?php
/*
 * Choice controller
 */

// if you want to disconnect
if(isset($_GET['disconnect'])){
    if(UserManager::disconnect()) header("Location: ./");
}

//

// View
require_once "../view/choiceView.php";

