<?php

require("getFunctions.php");
$functions = new Functions();


$request_uri = strtok($_SERVER['REQUEST_URI'], '?');
$id = isset($_GET['id']) ? $_GET['id'] : null; 

switch ($request_uri) {
    case '/customer_php_api/getAdmins':
        if ($id !== null) {
            echo $functions->getAdminById($id);
        } else {
            echo $functions->getAdmins();
        }
        break;

    case '/customer_php_api/getPositions':
        echo $functions->getPostions();
        break;

    case '/customer_php_api/getCandidates':
        echo $functions->getCandidates();
        break;

    case '/customer_php_api/voteCasts':
        echo $functions->voteCasts();
        break;

    default:
        // Handle unknown routes
        http_response_code(404);
        echo "404 Not Found";
        break;

    
}