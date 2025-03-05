<?php

namespace web\Controllers;


use web\Models\MyDatabase;

class HomeController implements IController
{

    private MyDatabase $db;

    public function __construct() {
        $this->db = new MyDatabase();
    }
    public function show(string $pageTitle):array
    {

        $tplData['title'] = "Home";


        $tplData['about'] = $this->db->getAbout();
        $tplData['events'] = $this->db->getAllEvents();
        $tplData['photos'] = $this->db->getAllPhotos();
        $tplData['sponsors'] = $this->db->getAllSponsors();

        //$tplData['userlogged'] = $this->db->isUserLogged();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');

            $jsonData = file_get_contents('php://input');
            $data = json_decode($jsonData, true);
//            var_dump($data["email"]);
//            var_dump($data['heslo']);

            if(isset($data['action']) && $data['action'] == 'signin') {
//                echo $data["email"];
//                echo $data['heslo'];
                //chybovnik
                $errors = ['email' => null, 'password' => null];

                // validace emailu
                if (empty($data["email"])) {
                    $errors['email'] = "Missing email";
                }

                // validace hesla
                if (empty($data['heslo'])) {
                    $errors['heslo'] = "Missing password";
                }

                // vratime chyby
                if (!empty(array_filter($errors))) {
                    echo json_encode(['success' => false, 'error' => $errors]);
                    exit();
                }

                //prihlas uzivatele
                $user = $this->db->userLoginEmail($data["email"]);
                if($user){
                    //var_dump($user);
                    if($this->db->userLoginPass($data['heslo'], $user)) {
                        //var_dump($userData);
                        echo json_encode(['success' => true]);
                    }else{
                        //var_dump($user);
                        echo json_encode(['success' => false, 'error' => ['email' => null, 'heslo' => "Wrong password"]]);
                    }
                }else{
                    echo json_encode(['success' => false, 'error' => ['email' => "Wrong email", 'heslo' => null]]);
                }
                exit();
            }
        }

        return $tplData;
    }
}