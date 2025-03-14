<?php

namespace web\Models;

class MyDatabase {

    /** @var \PDO $pdo */
    private \PDO $pdo;

    /** @var MySession $mySession */
    protected MySession $mySession;


    /** @var string $userSessionKey */
    private string $userSessionKey = "current_user_id";

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
            ) ENGINE = InnoDB;
        ");

        $this->executequery("
            CREATE TABLE IF NOT EXISTS EVENTS (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                date DATE NOT NULL,
                description TEXT NOT NULL,
                photo VARCHAR(255) NOT NULL
            ) ENGINE = InnoDB;
        ");

        $this->executequery("
            CREATE TABLE IF NOT EXISTS PHOTOS (
                id INT AUTO_INCREMENT PRIMARY KEY,
                path VARCHAR(255) NOT NULL
            ) ENGINE = InnoDB;
        ");

        $this->executequery("
            CREATE TABLE IF NOT EXISTS USERS (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(45) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL
            ) ENGINE = InnoDB;
        ");

        $this->executequery("
        CREATE TABLE IF NOT EXISTS SPONSORS (
        id INT AUTO_INCREMENT PRIMARY KEY,
        path VARCHAR(255) NOT NULL
        ) ENGINE = InnoDB;
        ");

        // ✅ Vložení výchozích dat pouze pokud nejsou v tabulkách žádná data
        $this->insertDefaultData();
    }


    private function insertDefaultData() {
        // Pokud tabulka ABOUT neobsahuje žádná data, vloží výchozí záznam
        if (empty($this->selectFromTable("ABOUT"))) {
            $this->insertIntoTable("ABOUT", "text, photo", "'Based in Vancouver, The University Swarm Division was born from passionate members who loved the growth of competition and wanted to maintain the robotics community post secondary. Team members were invited into specific roles with members specialising in strategy, driving, notebook, and CAD. Prioritizing passion and commitment, we were more than willing to accept new members to build a community. Our goal is to enthusiastically approach problems with solutions that are uniquely our own. We prioritize dedication and acknowledge that skills grow with consistent effort. We also value teamwork and mentorship, setting up a mentorship program for Burnaby’s high school VEX program that now boasts over 70 students.', 'app/Views/images/teamphoto2.png'");
            $this->insertIntoTable("ABOUT", "text, photo", "'The Pacific Northwest has tried for years to create a university VEX team, with successful attempts few and far between. In forming our own team, our focus isn’t just on competing, but to establish ourselves geographically and inspire nearby universities while doing so. We want robotics to be more accessible and for the program to expand. Robotics is engaging, educational, and important to everyone’s futures, and simply fun! No atmosphere and community compares, and we hope we can encourage more people to do what they love.', 'app/Views/images/teamphoto2.png'");
        }

        // Pokud tabulka EVENTS neobsahuje žádná data, vloží výchozí událost
        if (empty($this->selectFromTable("EVENTS"))) {
            $this->insertIntoTable("EVENTS", "name, date, description, photo", "'First event', '2025-06-15', 'First event', 'app/Views/images/teamphoto2.png'");
            $this->insertIntoTable("EVENTS", "name, date, description, photo", "'Second event', '2025-06-15', 'Second event', 'app/Views/images/teamphoto2.png'");
        }

        // Pokud tabulka USERS neobsahuje uživatele, vloží výchozího uživatele
        if (empty($this->selectFromTable("USERS"))) {
            $hashedPassword = password_hash("youjustgotswarmed!", PASSWORD_BCRYPT);
            $this->insertIntoTable("USERS", "email, password", "'502xtheswarm@gmail.com', '$hashedPassword'");
        }
        if (empty($this->selectFromTable("PHOTOS"))) {
            $this->insertIntoTable("PHOTOS", "path", "'app/Views/images/teamphoto2.png'");
            $this->insertIntoTable("PHOTOS", "path", "'app/Views/images/teamphoto1.png'");
            $this->insertIntoTable("PHOTOS", "path", "'app/Views/images/teamphoto2.png'");
        }
        if (empty($this->selectFromTable("SPONSORS")))
        {
            $this->insertIntoTable("SPONSORS", "path", "'app/Views/images/sponsors/Nav_Canadalogo.png'");
            $this->insertIntoTable("SPONSORS", "path", "'app/Views/images/sponsors/Schneiderlogo.png'");
            $this->insertIntoTable("SPONSORS", "path", "'app/Views/images/sponsors/EnerSvslogo.png'");
            $this->insertIntoTable("SPONSORS", "path", "'app/Views/images/sponsors/Tri-ShoreYachtServiceslogo.png'");
        }
    }

    public function getAbout() {
        return $this->selectFromTable("ABOUT", "");
    }

    public function updateAbout($id, $text, $photo) {

        // Proceed with the update query, whether a new photo is provided or the old one is retained
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

    public function getAllPhotos() {
        return $this->selectFromTable("PHOTOS", "");
    }

    public function getAllSponsors()
    {
        return $this->selectFromTable("SPONSORS", "");
    }

    /**
     * uzivatel s emailem
     * @param string $email
     * @return array|false|null
     */
    public function userLoginEmail(string $email): false|array|null
    {

        return $this->selectFromTable("USERS", "email = '$email'");
    }

    /**
     * zkontroluj heslo
     * @param string $heslo
     * @param array $user
     * @return bool
     */
    public function userLoginPass(string $heslo, array $user): bool
    {

        if(password_verify($heslo, $user[0]['password'])){

            $_SESSION[$this->userSessionKey] = $user[0]["id"];
            return true;
        }else{
            return false;
        }
    }

    /**
     * odhalseni uzivatele
     * @return void
     */
    public function userLogout(): void
    {
        unset($_SESSION[$this->userSessionKey]);
    }

    public function isUserLogged(): bool
    {
        return isset($_SESSION[$this->userSessionKey]);
    }



}

?>


