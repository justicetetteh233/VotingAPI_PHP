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

    public function createPositions($id, $name, $admin_id) {
        $conn = new DbConn();
        $conn = $conn->provideCon();
        $message = [];
        $sql = "INSERT INTO `Position`(`id`, `name`, `admin_id`) VALUES ($id, '$name', $admin_id);";
    
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

    public function createCandidate($id, $name,$position, $admin_id) {
        $conn = new DbConn();
        $conn = $conn->provideCon();
        $message = [];
        $sql = "INSERT INTO `Candidates`(`id`, `name`, `position`, `admin`) VALUES ($id,'$name',$position,$admin_id)";
    
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


    public function createVerificationCodes($v_code,$admin_id){
        $conn = new DbConn();
        $conn = $conn->provideCon();
        $message = [];
        $sql = "INSERT INTO `VerificationCodes`(`v_code`, `admin`) VALUES ('$v_code','$admin_id')";   

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

    public function createVoteCast($voters_name,$vcode,$position,$candidate){
        $conn = new DbConn();
        $conn = $conn->provideCon();
        $message = [];
        $sql = "INSERT INTO `BalotBox`(`voters_name`, `vcode`, `position`, `candidate`) VALUES ('$voters_name','$vcode','$position','$candidate')";

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