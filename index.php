<?php

require("getFunctions.php");
require("postFunctions.php");

$functions = new Functions();
$postFunctions = new PostFunctions();


$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = strtok($_SERVER['REQUEST_URI'], '?');
$id = isset($_GET['id']) ? $_GET['id'] : null;


switch ($request_method) {
    case 'GET':
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

            default:
                http_response_code(404);
                echo "404 Not Found";
                break;
        }
        break;



    case 'POST':
        switch ($request_uri) {
            case '/customer_php_api/createadmin':

                $json_data = file_get_contents('php://input');
                $data = json_decode($json_data, true);
                 
                if ($data === null) {
                    http_response_code(400);
                    echo "Invalid JSON data";
                } else {
                    $id = isset($data['id']) ? $data['id'] : null;
                    $name = isset($data['name']) ? $data['name'] : null;
                    $description = isset($data['description']) ? $data['description'] : null;
                    
                    echo $postFunctions->createAdmin($id, $name, $description);
                }
                break;

            default:
                http_response_code(404);
                echo "404 Not Found";
                break;
        }
        break;

    default:
        // Handle unsupported request methods
        http_response_code(405);
        echo "405 Method Not Allowed";
        break;
}
?>
