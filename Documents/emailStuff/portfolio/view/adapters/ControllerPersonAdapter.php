<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace adapters;

use DateTime;
use model\Person;
use controller\ControllerPerson;

include '../../includes/includeAuto.php';

/**
 * Description of ControllerPersonAdapter
 *
 * @author frontend
 */
class ControllerPersonAdapter {

//put your code here 
    private Person $person;
    private ControllerPerson $controllerPerson;

    public function __construct() {
        session_start();
        //echo 'Session ID = ' . session_id();
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getSignupFormData(): Person {
        if (isset($_POST["submitted"])) {

            $this->person = new Person();
            $this->person->set_personName($this->test_input($_POST["fullName"]));
            $this->person->set_dateOfBirth($this->test_input($_POST["dob"]));
            $this->person->set_address($this->test_input($_POST["address"]));
            $this->person->set_landlineNumber($this->test_input($_POST["landlineNumber"]));
            $this->person->set_cellNumber($this->test_input($_POST["cellNumber"]));
            $this->person->set_email($this->test_input($_POST["email"]));
            $this->person->set_youtubeLink($this->test_input($_POST["youtubeLink"]));
            $this->person->set_facebookLink($this->test_input($_POST["facebookLink"]));
            $this->person->set_linkedinLink($this->test_input($_POST["linkedinLink"]));
            $this->person->set_githubLink($this->test_input($_POST["githubLink"]));
            $this->person->set_twitterlink($this->test_input($_POST["twitterLink"]));
            $this->person->set_websiteLink($this->test_input($_POST["websiteLink"]));
            $this->person->set_profilelink($this->test_input($_POST["profileLink"]));
            $this->person->set_nationality($this->test_input($_POST["country"]));
            $this->person->setGender($this->test_input($_POST["gender"]));
            $this->person->setPassword($this->test_input($_POST["password"]));
            $this->person->setRegisterationDate((new DateTime('now'))->format('Y-m-d H:i:s'));
            $this->person->set_personId();

            $_SESSION["personId"] = $this->person->get_personId();
            
            

            printf("<br>" . $this->person->get_personId());
            printf("<br>" . $this->person->get_personName());
            printf("<br>" . $this->person->get_nationality());
            printf("<br>" . $this->person->getGender());
            printf("<br>" . $this->person->get_youtubeLink());
            printf("<br>" . $this->person->getPassword());

            //$saltString = "1234Fawad@@";
            //$pass = $_POST["password"];
            //$salt = md5(uniqid(mt_rand(), true), true);
            //$hashed_pass = md5($pass . $saltString, false);
            //printf("<br>" . $hashed_pass);

            return $this->person;
        }
    }

    public function redirectUrl($nextRedirectPageNameWithExtension) {

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $urlArray = explode("/", $actual_link);
        $length = sizeof($urlArray);
        $currentPageName = $urlArray[sizeof($urlArray) - 2] . "/" . $urlArray[sizeof($urlArray) - 1];
        $substring = $currentPageName;
        $start_index = strpos($actual_link, $currentPageName);
        $newUrl = substr_replace($actual_link, $nextRedirectPageNameWithExtension, $start_index);
        $redirect = "<html><body><p>You will be redirected in 3 seconds</p>
                    <script>
                        var timer = setTimeout(function() {window.location='" . $newUrl . "'}, 3000);
                    </script>
                    </body>
                    </html>";
        echo $redirect;
    }

    public function registerNewUser() {
        $this->controllerPerson = new ControllerPerson();
        $this->person = $this->getSignupFormData();
        if ($this->person != null) {
            if ($this->controllerPerson->insertPerson($this->person)) {
                $nextRedirectPageNameWithExtension = "education.php";
                $this->redirectUrl($nextRedirectPageNameWithExtension);
            } else {
                $errorRedirectPageNameWithExtension = "signup.php";
                $this->redirectUrl($errorRedirectPageNameWithExtension);
            }
        } else {
            $errorRedirectPageNameWithExtension = "signup.php";
            $this->redirectUrl($errorRedirectPageNameWithExtension);
        }
    }

}

$controllerPersonAdapter = new ControllerPersonAdapter();
$controllerPersonAdapter->registerNewUser();
