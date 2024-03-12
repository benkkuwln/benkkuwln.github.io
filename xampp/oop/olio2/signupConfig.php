<?php

require_once("database.php");

class signupConfig{
    private $id;
    private $firstName;
    private $lastName;
    private $address;
    protected $dbCnx;

    public function __construct($id=0, $firstName="", $lastName="", $address=""){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER,DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    public function setfirstName($firstName){
        $this->firstName = $firstName;
    }
    public function getfirstName(){
        return $this->firstName;
    }

    public function setlastName($lastName){
        $this->lastName = $lastName;
    }
    public function getlastName(){
        return $this->lastName;
    }

    public function setAddress($address){
        $this->address = $address;
    }
    public function getAddress(){
        return $this->address;
    }
    
    public function insertData(){
        try{
            $stm = $this->dbCnx->prepare("INSERT INTO users(firstName, lastName, address) values(?, ?, ?)");
            $stm->execute([$this->firstName,$this->lastName,$this->address]);
            echo "<script>alert('data saved successfully');document.location='allData.php'</script>";
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function fetchAll(){
        try{
            $stm = $this->dbCnx->prepare("SELECT * FROM users");
            $stm->execute();
            return $stm->fetchAll();
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function fetchOne(){
        try{
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function update(){
        try{
            $stm = $this->dbCnx->prepare("UPDATE users SET firstName = ?, lastName = ?, address = ? WHERE id = ?");
            $stm->execute([$this->firstName,$this->lastName,$this->address,$this->id]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function delete(){
        try{
            $stm = $this->dbCnx->prepare("DELETE FROM users WHERE id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
            echo "<script>alert('data deleted successfully');document.location='allData.php'</script>";
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}

?>