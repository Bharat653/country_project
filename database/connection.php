<?php
class Database
{
    private $db;
    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $this->db = new PDO("mysql:host=$servername;dbname=dbtask", $username, $password);
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo("connected succesfully");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function getDb()
    {
        return $this->db;
    }

    function userLogin($data){
        // Prepare and execute the SELECT statement
        $query = $this->db->prepare(" select * from user1 where name = ? AND password = ? ");
        $query->execute([$data['name'], $data['password']]);

        // Fetch the result as an associative array
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return 1;
        } 
        return 0;
    }
    function addcountry(){

        $country_code = $_POST['country_name'];
        $country_name = $_POST['country_code']; // Fix the index here
        $query = $this->db->prepare("INSERT INTO country1 (country_name, country_code) VALUES (?, ?)");
        $result = $query->execute([$country_name,$country_code]);
        if($result){
            return true;
        }
        return false;

    }
    function getCountries()
    {
        // Retrieve countries from the database
        $query = $this->db->query("SELECT * FROM country1");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function addstate(){
        // print_r($_POST);
        // exit();
        $country_id = $_POST['country_id'];
        $state_name = $_POST['state_name'];
        $state_code = $_POST['state_code'];
        // $country_name = $_POST['country_name'];
        $query = $this->db->prepare("INSERT INTO `state` (country_id,state_name,state_code) VALUES  (?,?,?)");
        $result = $query->execute([$country_id,$state_name,$state_code]);
        if($result){
            return true;
        }
        return false;
    }
    function getstates()
    {
        $query = $this->db->query("SELECT * FROM state");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getallstatesbycountry($country_id){
        // print_r("$country_id");
        // exit();
        $query = $this->db->prepare("select * from state inner join country1 on state.country_id = country1.country_id where state.
        country_id = :country_id");
        $query->execute($country_id);
        return $query->fetchAll(PDO::FETCH_ASSOC);
     
    }
    

    function addcity()
    {
        $city_name = $_POST['city_name'];
        $city_currency = $_POST['city_currency'];
        $query = $this->db->prepare("INSERT INTO `city` (city_name,city_currency) VALUES  (?,?)");
        $result = $query->execute([$city_name,$city_currency]);
        if($result){
            return true;
        }
        return false;
    }
    function getcitys(){
        $query = $this->db->query("SELECT * FROM city");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

// $database = new Database();


$database = new Database();

?>




