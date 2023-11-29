<?php
// include '../database/connection.php';


class YourClass {
    private $db;

    function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
                                
        try {
            $this->db = new PDO("mysql:host=$servername;dbname=dbtask", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo("connected succesfully");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function deletestate($id) {
        try {
            $query = "DELETE FROM `state` WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            header("Location: state.php");
        } catch (PDOException $e) {
            echo "Failed to delete: " . $e->getMessage();
        }
    }
}

// Create an instance of the class
$yourObject = new YourClass();
$id = $_GET['deleteid'];
// Call the method on the instance
$yourObject->deletestate($id); // Replace $yourCountryId with the actual country ID you want to delete

?>