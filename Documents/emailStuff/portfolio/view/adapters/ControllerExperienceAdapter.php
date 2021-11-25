<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace adapters;

use model\Experience;
use controller\ControllerExperience;

include '../../includes/includeAuto.php';

/**
 * Description of ControllerExperienceAdapter
 *
 * @author frontend
 */
class ControllerExperienceAdapter {

    //put your code here
    private Experience $experience;
    private ControllerExperience $controllerExperience;

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

    public function getExperienceFormData(): Experience {
        if (isset($_POST["addNewExprience"])) {            
            if (strtotime($_POST["startDate"]) < strtotime($_POST["endDate"])) {
                $this->experience = new Experience();
                $this->experience->setPersonId($this->test_input($_POST["personId"]));
                $this->experience->setCompanyName($this->test_input($_POST["companyName"]));
                $this->experience->setCompanyAddress($this->test_input($_POST["companyAddress"]));
                $this->experience->setJobTitle($this->test_input($_POST["jobTitle"]));
                $this->experience->setStartDate($this->test_input($_POST["startDate"]));
                $this->experience->setEndDate($this->test_input($_POST["endDate"]));
                $this->experience->setJobDescription($this->test_input($_POST["jobDescription"]));
                $this->experience->setToolsUsed($this->test_input($_POST["toolsUsed"]));
                $this->experience->setMajorResponsibilities($this->test_input($_POST["majorResponsibilities"]));

                $_SESSION["personId"] = $this->experience->getPersonId();

                printf("<br>" . $this->experience->getPersonId());
                printf("<br>" . $this->experience->getCompanyName());
                printf("<br>" . $this->experience->getCompanyAddress());
                printf("<br>" . $this->experience->getJobTitle());
                printf("<br>" . $this->experience->getStartDate());
                printf("<br>" . $this->experience->getEndDate());
                printf("<br>" . $this->experience->getJobDescription());
                printf("<br>" . $this->experience->getToolsUsed());
                printf("<br>" . $this->experience->getMajorResponsibilities());

                return $this->experience;
            } else {
                $nextRedirectPageNameWithExtension = "experience.php";
                $this->redirectUrl($nextRedirectPageNameWithExtension);
            }
        } else if (isset($_POST["submitted"])) {
            if (strtotime($_POST["startDate"]) < strtotime($_POST["endDate"])) {
                $this->experience = new Experience();
                $this->experience->setPersonId($this->test_input($_POST["personId"]));
                $this->experience->setCompanyName($this->test_input($_POST["companyName"]));
                $this->experience->setCompanyAddress($this->test_input($_POST["companyAddress"]));
                $this->experience->setJobTitle($this->test_input($_POST["jobTitle"]));
                $this->experience->setStartDate($this->test_input($_POST["startDate"]));
                $this->experience->setEndDate($this->test_input($_POST["endDate"]));
                $this->experience->setJobDescription($this->test_input($_POST["jobDescription"]));
                $this->experience->setToolsUsed($this->test_input($_POST["toolsUsed"]));
                $this->experience->setMajorResponsibilities($this->test_input($_POST["majorResponsibilities"]));

                $_SESSION["personId"] = $this->experience->getPersonId();

                printf("<br>" . $this->experience->getPersonId());
                printf("<br>" . $this->experience->getCompanyName());
                printf("<br>" . $this->experience->getCompanyAddress());
                printf("<br>" . $this->experience->getJobTitle());
                printf("<br>" . $this->experience->getStartDate());
                printf("<br>" . $this->experience->getEndDate());
                printf("<br>" . $this->experience->getJobDescription());
                printf("<br>" . $this->experience->getToolsUsed());
                printf("<br>" . $this->experience->getMajorResponsibilities());

                return $this->experience;
            } else {
                $nextRedirectPageNameWithExtension = "experience.php";
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

    public function registerUserExperience() {
        $this->controllerExperience = new ControllerExperience();
        $this->experience = $this->getExperienceFormData();
        if ($this->experience != null) {
            if (isset($_POST["addNewExperience"])) {
                if ($this->controllerExperience->insertExperience($this->experience)) {
                    $nextRedirectPageNameWithExtension = "experience.php";
                    $this->redirectUrl($nextRedirectPageNameWithExtension);
                } else {
                    $errorRedirectPageNameWithExtension = "experience.php";
                    $this->redirectUrl($errorRedirectPageNameWithExtension);
                }
            } else if (isset($_POST["submitted"])) {
                if ($this->controllerExperience->insertExperience($this->experience)) {
                    $nextRedirectPageNameWithExtension = "portfolio.php";
                    $this->redirectUrl($nextRedirectPageNameWithExtension);
                } else {
                    $errorRedirectPageNameWithExtension = "experience.php";
                    $this->redirectUrl($errorRedirectPageNameWithExtension);
                }
            }
        } else {
            $errorRedirectPageNameWithExtension = "education.php";
            $this->redirectUrl($errorRedirectPageNameWithExtension);
        }
    }

}

$controllerExperienceAdapter = new ControllerExperienceAdapter();
$controllerExperienceAdapter->registerUserExperience();
