<?php
 require_once("dbConn.php");
class PostFunctions{

 
    public function createAdmin($id, $name, $password) {  
        $conn = new DbConn();
        $conn = $conn->provideCon();
        $message = [];
        
        $sql = "INSERT INTO Admin(id, name, password) VALUES ($id, '$name', '$password')";
    
        try {
            if ($conn->query($sql)) {
                $message = ['detail' => "Post successful"];

            } else {
                throw new Exception("Error creating the admin: ");
            }
        } catch (Exception $e) {
            http_response_code(500);
            error_log("Exception occurred: " . $e->getMessage());
            $message = ['detail' => "Error creating the admin" . $e->getMessage()];
        }
        return json_encode($message);
    }
    




}

?>