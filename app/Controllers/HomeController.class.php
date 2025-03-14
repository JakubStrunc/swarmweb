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

        $tplData['userlogged'] = $this->db->isUserLogged();


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

            if(isset($data['action']) && $data['action'] == 'signout') {
                $this->db->userLogout();
                echo json_encode(['success' => true]);
                exit();
            }
        }

        //dostan data o produktu z db
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');

            $jsonData = file_get_contents('php://input');
            $data = json_decode($jsonData, true);


            if (isset($data['action']) && $data['action'] === 'get-paragraph') {


                $paragraph = $this->db->getAbout(); // Metoda pro načtení produktu

                //vrat data
                if ($paragraph) {
                    echo json_encode(['success' => true, 'data' => $paragraph]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Paragraph is not found.']);
                }
                exit();
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            $jsonData = file_get_contents('php://input');
            $data = json_decode($jsonData, true);

            // Check for update-paragraph action
            if (isset($data['action']) && $data['action'] === 'update-paragraph') {

                $errors = [];
                $paragraph1 = $data['paragraph1'] ?? '';
                $paragraph2 = $data['paragraph2'] ?? '';

                // Validate the paragraphs
                if (empty($paragraph1)) {
                    $errors['paragraph1'] = 'Paragraph 1 is required.';
                }
                if (empty($paragraph2)) {
                    $errors['paragraph2'] = 'Paragraph 2 is required.';
                }

                // Handle the photo upload (if present)
                $photo1 = null;
                $photo2 = null;
                if (isset($_FILES['fileToUpload1']) && $_FILES['fileToUpload1']['error'] === 0) {
                    $file1 = $_FILES['fileToUpload1'];
                    if (!in_array($file1['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
                        $errors['fileToUpload1'] = 'Invalid file type for the first image. Allowed types: jpg, png, gif.';
                    } else {
                        $photo1 = 'app/Views/images/' . basename($file1['name']);
                        move_uploaded_file($file1['tmp_name'], $photo1);
                    }
                }

                if (isset($_FILES['fileToUpload2']) && $_FILES['fileToUpload2']['error'] === 0) {
                    $file2 = $_FILES['fileToUpload2'];
                    if (!in_array($file2['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
                        $errors['fileToUpload2'] = 'Invalid file type for the second image. Allowed types: jpg, png, gif.';
                    } else {
                        $photo2 = 'app/Views/images/' . basename($file2['name']);
                        move_uploaded_file($file2['tmp_name'], $photo2);
                    }
                }

                // If there are no errors, update the database
                if (empty($errors)) {
                    // If no new photos, keep the old ones
                    $currentAbout = $this->db->getAbout(); // Get current photo paths
                    if (empty($photo1)) {
                        $photo1 = $currentAbout[0]['photo']; // Use the old photo if no new one
                    }
                    if (empty($photo2)) {
                        $photo2 = $currentAbout[1]['photo']; // Use the old photo if no new one
                    }

                    // Call the updateAbout method to update the database
                    $updateSuccess1 = $this->db->updateAbout(1, $paragraph1, $photo1);
                    $updateSuccess2 = $this->db->updateAbout(2, $paragraph2, $photo2);

                    if ($updateSuccess1 && $updateSuccess2) {
                        echo json_encode(['success' => true]);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Failed to update the paragraph.']);
                    }
                } else {
                    // Return validation errors
                    echo json_encode(['success' => false, 'errors' => $errors]);
                }

                exit();
            }
        }

        return $tplData;
    }
}