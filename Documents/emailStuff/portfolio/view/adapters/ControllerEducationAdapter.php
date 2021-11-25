<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace adapters;

use model\Education;
use controller\ControllerEducation;

include '../../includes/includeAuto.php';

/**
 * Description of ControllerEducationAdapter
 *
 * @author frontend
 */
class ControllerEducationAdapter {

    //put your code here 
    private Education $education;
    private ControllerEducation $controllerEducation;

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

    public function getEducationFormData(): Education {
        if (isset($_POST["addNewEducation"])) {
            if (strtotime($_POST["startDate"]) < strtotime($_POST["endDate"])) {
                $this->education = new Education();
                $this->education->setPersonId($this->test_input($_POST["personId"]));
                $this->education->setProgramTitle($this->test_input($_POST["programTitle"]));
                $this->education->setStartDate($this->test_input($_POST["startDate"]));
                $this->education->setEndDate($this->test_input($_POST["endDate"]));
                $this->education->setInstitute($this->test_input($_POST["institute"]));
                $this->education->setMajorSubjects($this->test_input($_POST["majorSubjects"]));
                $this->education->setGrade($this->test_input($_POST["grade"]));
                $this->education->setDescription($this->test_input($_POST["description"]));

                $_SESSION["personId"] = $this->education->getPersonId();



                printf("<br>" . $this->education->getPersonId());
                printf("<br>" . $this->education->getProgramTitle());
                printf("<br>" . $this->education->getStartDate());
                printf("<br>" . $this->education->getEndDate());
                printf("<br>" . $this->education->getInstitute());
                printf("<br>" . $this->education->getGrade());
                printf("<br>" . $this->education->getDescription());


                return $this->education;
            } else {
                $nextRedirectPageNameWithExtension = "education.php";
                $this->redirectUrl($nextRedirectPageNameWithExtension);
            }
        } else if (isset($_POST["submitted"])) {
            if (strtotime($_POST["startDate"]) < strtotime($_POST["endDate"])) {
                $this->education = new Education();
                $this->education->setPersonId($this->test_input($_POST["personId"]));
                $this->education->setProgramTitle($this->test_input($_POST["programTitle"]));
                $this->education->setStartDate($this->test_input($_POST["startDate"]));
                $this->education->setEndDate($this->test_input($_POST["endDate"]));
                $this->education->setInstitute($this->test_input($_POST["institute"]));
                $this->education->setMajorSubjects($this->test_input($_POST["majorSubjects"]));
                $this->education->setGrade($this->test_input($_POST["grade"]));
                $this->education->setDescription($this->test_input($_POST["description"]));

                $_SESSION["personId"] = $this->education->getPersonId();



                printf("<br>" . $this->education->getPersonId());
                printf("<br>" . $this->education->getProgramTitle());
                printf("<br>" . $this->education->getStartDate());
                printf("<br>" . $this->education->getEndDate());
                printf("<br>" . $this->education->getInstitute());
                printf("<br>" . $this->education->getGrade());
                printf("<br>" . $this->education->getDescription());


                return $this->education;
            } else {
                $nextRedirectPageNameWithExtension = "education.php";
                $this->redirectUrl($nextRedirectPageNameWithExtension);
            }
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

    public function registerUserEducation() {
        $this->controllerEducation = new ControllerEducation();
        $this->education = $this->getEducationFormData();
        if ($this->education != null) {
            if (isset($_POST["addNewEducation"])) {
                if ($this->controllerEducation->insertEducation($this->education)) {
                    $nextRedirectPageNameWithExtension = "education.php";
                    $this->redirectUrl($nextRedirectPageNameWithExtension);
                } else {
                    $errorRedirectPageNameWithExtension = "education.php";
                    $this->redirectUrl($errorRedirectPageNameWithExtension);
                }
            } else if (isset($_POST["submitted"])) {
                if ($this->controllerEducation->insertEducation($this->education)) {
                    $nextRedirectPageNameWithExtension = "skills.php";
                    $this->redirectUrl($nextRedirectPageNameWithExtension);
                } else {
                    $errorRedirectPageNameWithExtension = "education.php";
                    $this->redirectUrl($errorRedirectPageNameWithExtension);
                }
            }
        } else {
            $errorRedirectPageNameWithExtension = "education.php";
            $this->redirectUrl($errorRedirectPageNameWithExtension);
        }
    }

}

$controllerEducationAdapter = new ControllerEducationAdapter();
$controllerEducationAdapter->registerUserEducation();
