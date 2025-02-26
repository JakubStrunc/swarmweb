<?php

namespace web\Models;

class MyDatabase {

    /** @var \PDO $pdo */
    private $pdo;

    private $mySession;

    public function __construct(){
        //$this->pdo = new \PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $this->pdo->exec("set names utf8");

        //require_once("MySessions.class.php");
        $this->mySession = new MySession();

        // Automaticky vytvoří tabulky, pokud neexistují
        $this->createTables();
    }

    private function executequery(string $dotaz){
        $res = $this->pdo->query($dotaz);

        if($res){
            return $res;
        }
        else{
            $error = $this->pdo->errorInfo();
            echo $error[2];
            return null;
        }
    }
    public function selectFromTable(string $tableName, string $whereStatement = "", string $orderStatement = ""){
        $q = "SELECT * FROM ".$tableName
            .(($whereStatement == "") ? "" : " WHERE ".$whereStatement)
            .(($orderStatement == "") ? "" : " ORDER BY ".$orderStatement);

        $obj = $this->executequery($q);

        if($obj == null) {
            return [];
        }
        return $obj->fetchAll();

    }

    public function deleteFromTable(string $tableName, string $whereStatement)
    {
        $q = "DELETE FROM $tableName WHERE $whereStatement";
        $obj = $this->executequery($q);
        if($obj == null) {
            return false;
        }
        return true;
    }

    public function insertIntoTable(string $tableName, string $insertStatement, string $insertValues)
    {
        $q = "INSERT INTO $tableName($insertStatement) VALUES ($insertValues)";
        $obj = $this->executequery($q);
        if($obj == null) {
            return false;
        }
        return true;
    }

    public function updateInTable(string $tableName, string $updateStatement, string $whereStatement)
    {
        $q = "Update $tableName SET $updateStatement WHERE $whereStatement";
        $obj = $this->executequery($q);
        if($obj == null) {
            return false;
        }
        return true;
    }

    public function getAllAbout() {
        return $this->selectFromTable("ABOUT", "", "id DESC");
    }

    public function updateAbout($id, $text, $photo) {
        return $this->updateInTable("ABOUT", "text = '$text', photo = '$photo'", "id = $id");
    }

     public function saveEvent($name, $date, $description, $photo) {
        return $this->insertIntoTable("EVENTS", "name, date, description, photo", "'$name', '$date', '$description', '$photo'");
    }

    public function getAllEvents() {
        return $this->selectFromTable("EVENTS", "", "date DESC");
    }

    public function deleteEvent($id) {
        return $this->deleteFromTable("EVENTS", "id = $id");
    }





}

?>


