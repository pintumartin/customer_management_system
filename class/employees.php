<?php
class Employee
{
    // Connection
    private $conn;
    // Table
    private $db_table = "user";
    // Columns
    public $id;
    public $username;
    public $email;
    public $password;
    public $profile_pic;

    public $mobile;
    public $city;
    public $gender;
    public $languages;
    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // GET ALL
    public function getEmployees()
    {
        $sqlQuery = "SELECT id,username,email,password,profile_pic,mobile,city,gender,languages FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    // CREATE
    public function createEmployee()
    {
        $sqlQuery = "INSERT INTO
                        " . $this->db_table . "
                    SET
                        username = :username, 
                        email = :email, 
                        password = :password, 
                        profile_pic=:profile_pic,
                        mobile=:mobile,
                        city=:city,
                        gender= :gender,
                        languages=:languages";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->profile_pic = htmlspecialchars(strip_tags($this->profile_pic));
        $this->mobile = htmlspecialchars(strip_tags($this->mobile));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->gender= htmlspecialchars(strip_tags($this->gender));
        $this->languages = htmlspecialchars(strip_tags($this->languages));
        
        // bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":profile_pic", $this->profile_pic);
        $stmt->bindParam(":mobile", $this->mobile);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":languages", $this->languages);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    // READ single
    public function getSingleEmployee()
    {
        $sqlQuery = "SELECT
                        id, 
                        username, 
                        email, 
                        password,
                        profile_pic,
                        mobile,
                        city,
                        gender, 
                        languages
                      FROM
                        " . $this->db_table . "
                    WHERE 
                       id = ?
                    LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->username = $dataRow['username'];
        $this->email = $dataRow['email'];
        $this->password = $dataRow['password'];
        $this->profile_pic = $dataRow['profile_pic'];
        $this->mobile= $dataRow['mobile'];
        $this->city= $dataRow['city'];
        $this->gender = $dataRow['gender'];
        $this->languages= $dataRow['languages'];
    }
    // UPDATE
    public function updateEmployee()
    {


        $sqlQuery = "UPDATE
                        " . $this->db_table . "
                    SET
                        username = :username, 
                        email = :email, 
                        password = :password, 
                        profile_pic = :profile_pic, 
                        mobile = :mobile, 
                        city=:city,
                        gender = :gender,
                        languages=:languages
                      
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->profile_pic = htmlspecialchars(strip_tags($this->profile_pic));
        $this->mobile = htmlspecialchars(strip_tags($this->mobile));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->languages = htmlspecialchars(strip_tags($this->languages));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":profile_pic", $this->profile_pic);
        $stmt->bindParam(":mobile", $this->mobile);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":languages", $this->languages);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    // DELETE
    function deleteEmployee()
    {   
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>