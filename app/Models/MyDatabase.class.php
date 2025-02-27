<?php

namespace web\Models;

class MyDatabase {

    /** @var \PDO $pdo */
    private $pdo;

    private $mySession;

    public function __construct(){
        $this->pdo = new \PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $this->pdo->exec("set names utf8");

        require_once("MySessions.class.php");
        $this->mySession = new MySession();

        // Automaticky vytvoří tabulky, pokud neexistují
        $this->initializeDatabase();
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

    private function initializeDatabase() {
        // Vytvoření tabulek, pokud neexistují
        $this->executequery("
            CREATE TABLE IF NOT EXISTS ABOUT (
                id INT AUTO_INCREMENT PRIMARY KEY,
                text TEXT NOT NULL,
                photo VARCHAR(255) NOT NULL
            )
        ");

        $this->executequery("
            CREATE TABLE IF NOT EXISTS EVENTS (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                date DATE NOT NULL,
                description TEXT NOT NULL,
                photo VARCHAR(255) NOT NULL
            )
        ");

        $this->executequery("
            CREATE TABLE IF NOT EXISTS PHOTOS (
                id INT AUTO_INCREMENT PRIMARY KEY,
                path VARCHAR(255) NOT NULL
            )
        ");

        $this->executequery("
            CREATE TABLE IF NOT EXISTS USERS (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL
            )
        ");

        // ✅ Vložení výchozích dat pouze pokud nejsou v tabulkách žádná data
        $this->insertDefaultData();
    }


    private function insertDefaultData() {
        // Pokud tabulka ABOUT neobsahuje žádná data, vloží výchozí záznam
        if (empty($this->selectFromTable("ABOUT"))) {
            $this->insertIntoTable("ABOUT", "text, photo", "'Toto je výchozí text About.', 'default.jpg'");
            $this->insertIntoTable("ABOUT", "text, photo", "'Toto je výchozí text About.', 'default.jpg'");
        }

        // Pokud tabulka EVENTS neobsahuje žádná data, vloží výchozí událost
        if (empty($this->selectFromTable("EVENTS"))) {
            $this->insertIntoTable("EVENTS", "name, date, description, photo", "'První událost', '2025-06-15', 'Popis první události.', 'event.jpg'");
        }

        // Pokud tabulka USERS neobsahuje uživatele, vloží výchozího uživatele
        if (empty($this->selectFromTable("USERS"))) {
            $hashedPassword = password_hash("youjustgotswarmed!", PASSWORD_BCRYPT);
            $this->insertIntoTable("USERS", "email, password", "'502xtheswarm@gmail.com', '$hashedPassword'");
        }
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


