<?php
require_once("dbConn.php");
class Functions{

    public function getAdmins(){
        $conn = new DbConn();
        $conn = $conn->provideCon();
        $sql = 'SELECT * FROM  Admin';
        $result = $conn->query($sql);

        $details  = [];
        if ($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $detail = new stdClass();
                $detail->id = $row["id"];
                $detail->Name = $row["name"];
                $details[] = $detail;
            }
        }
        $json_data = json_encode($details);
        return $json_data;
    }

    public function getAdminById( $id){
        $conn = new DbConn();
        $conn = $conn->provideCon();
        $sql = "SELECT * FROM  Admin WHERE id= '$id' ";
        $result = $conn->query($sql);

        $details  = [];
        if ($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $detail = new stdClass();
                $detail->id = $row["id"];
                $detail->Name = $row["name"];
                $details[] = $detail;
            }
        }
        $json_data = json_encode($details);
        return $json_data;
    }


    public function getPostions(){
        $conn = new DbConn();
        $conn = $conn->provideCon();
        $sql = 'SELECT * FROM  Position';
        $result = $conn->query($sql);

        $details  = [];
        if ($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $detail = new stdClass();
                $detail->id = $row["id"];
                $detail->Name = $row["name"];
                $detail->Admin_id = $row["admin_id"];
                $details[] = $detail;
            }
        }
        $json_data = json_encode($details);
        return $json_data;

    }

    public function getCandidates(){
        $conn = new DbConn();
        $conn = $conn->provideCon();
        $sql = 'SELECT * FROM  Candidates';
        $result = $conn->query($sql);

        $details  = [];
        if ($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $detail = new stdClass();
                $detail->id = $row["id"];
                $detail->Name = $row["name"];
                $detail->Admin_id = $row["admin"];
                $detail->position = $row["position"];
                $details[] = $detail;
            }
        }
        $json_data = json_encode($details);
        return $json_data;
    }

    public function getVerificationCodes(){
        $conn = new DbConn();
        $conn = $conn->provideCon();
        $sql = 'SELECT * FROM  VerificationCodes';
        $result = $conn->query($sql);

        $details  = [];
        if ($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $detail = new stdClass();
                $detail->admin = $row["admin"];
                $detail->v_code = $row["v_code"];
                $details[] = $detail;
            }
        }
        $json_data = json_encode($details);
        return $json_data;
    }

    public function voteCasts(){
        $conn = new DbConn();
        $conn = $conn->provideCon();
        $sql = 'SELECT * FROM  BalotBox';
        $result = $conn->query($sql);

        $details  = [];
        if ($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $detail = new stdClass();
                $detail->admin = $row["position"];
                $detail->v_code = $row["vcode"];
                $detail->v_code = $row["candidate"];
                $detail->v_code = $row["voters_name"];
              
                $details[] = $detail;
            }
        }
        $json_data = json_encode($details);
        return $json_data;
    }  

}
