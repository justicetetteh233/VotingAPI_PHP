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
                if ($id !== null) {
                    echo $functions->getPositionById($id);
                } else {
                echo $functions->getPostions();
                }
                break;

            case '/customer_php_api/vericationCodes':
                echo $functions->getVerificationCodes();
                break;

            case '/customer_php_api/allvoteCasts':
                echo $functions->getVerificationCodes();
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

            case "/customer_php_api/createposition":
                $json_data = file_get_contents("php://input");
                $data = json_decode($json_data, true);
                if ($data === null) {
                    http_response_code(400);
                    echo "Invalid JSON data";
                } else {
                    $id = isset($data["id"]) ? $data["id"] : null;
                    $name = isset($data["name"]) ? $data["name"] : null;
                    $admin_id = isset($data["adminId"]) ? $data["adminId"] : null;
                    echo $postFunctions->createPositions($id, $name, $admin_id);
                }
                    
            break;

            case "/customer_php_api/createCandidates":
                $json_data = file_get_contents("php://input");
                $data = json_decode($json_data, true);
                if ($data === null) {
                    http_response_code(400);
                    echo "Invalid JSON data";
                } else {
                    $id = isset($data["id"]) ? $data["id"] : null;
                    $name = isset($data["name"]) ? $data["name"] : null;
                    $position = isset($data["positionId"]) ? $data["positionId"] : null;
                    $admin_id = isset($data["adminId"]) ? $data["adminId"] : null;
                    echo $postFunctions->createCandidate($id, $name,$position, $admin_id);
                }      
            break;

            case "/customer_php_api/createVerificationCodes":
                $json_data = file_get_contents("php://input");
                $data = json_decode($json_data, true);
                if ($data === null) {
                    http_response_code(400);
                    echo "Invalid JSON data";
                } else {
                    $v_code = isset($data["v_code"]) ? $data["v_code"] : null;
                    $admin_id = isset($data["adminId"]) ? $data["adminId"] : null;
                    echo $postFunctions->createVerificationCodes($v_code,$admin_id);
                }      
            break;

            case "/customer_php_api/createVoteCast":
                $json_data = file_get_contents("php://input");
                $data = json_decode($json_data, true);
                if ($data === null) {
                    http_response_code(400);
                    echo "Invalid JSON data";
                } else {
                    $voters_name = isset($data["voters_name"]) ? $data["voters_name"] : null;
                    $vcode = isset($data["vcode"]) ? $data["vcode"] : null;
                    $position = isset($data["position"]) ? $data["position"] : null;
                    $candidate = isset($data["candidate"]) ? $data["candidate"] : null;
                    echo $postFunctions->createVoteCast($voters_name,$vcode,$position,$candidate);
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
