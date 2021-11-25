<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace adapters;

use model\Skills;
use controller\ControllerSkills;

include '../../includes/includeAuto.php';

/**
 * Description of ControllerSkillsAdapter
 *
 * @author frontend
 */
class ControllerSkillsAdapter {

    //put your code here 
    private Skills $skills;
    private ControllerSkills $controllerSkills;

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

    public function getSkillsFormData(): Skills {
        if (isset($_POST["addNewSkill"])) {

            $this->skills = new skills();
            $this->skills->setPersonId($this->test_input($_POST["personId"]));
            $this->skills->setSkillName($this->test_input($_POST["skillName"]));
            $this->skills->setSkillCatagory($this->test_input($_POST["skillCategory"]));
            $this->skills->setToolsUsed($this->test_input($_POST["toolsUsed"]));
            $this->skills->setSkillDescription($this->test_input($_POST["description"]));
            
            $_SESSION["personId"] = $this->skills->getPersonId();

            printf("<br>" . $this->skills->getPersonId());
            printf("<br>" . $this->skills->getSkillName());
            printf("<br>" . $this->skills->getSkillCatagory());
            printf("<br>" . $this->skills->getToolsUsed());
            printf("<br>" . $this->skills->getSkillDescription());
            
            return $this->skills;
            
        } else if (isset($_POST["submitted"])) {

            $this->skills = new skills();
            $this->skills->setPersonId($this->test_input($_POST["personId"]));
            $this->skills->setSkillName($this->test_input($_POST["skillName"]));
            $this->skills->setSkillCatagory($this->test_input($_POST["skillCategory"]));
            $this->skills->setToolsUsed($this->test_input($_POST["toolsUsed"]));
            $this->skills->setSkillDescription($this->test_input($_POST["description"]));
            
            $_SESSION["personId"] = $this->skills->getPersonId();

            printf("<br>" . $this->skills->getPersonId());
            printf("<br>" . $this->skills->getSkillName());
            printf("<br>" . $this->skills->getSkillCatagory());
            printf("<br>" . $this->skills->getToolsUsed());
            printf("<br>" . $this->skills->getSkillDescription());
            
            return $this->skills;
            
        } else {
            $nextRedirectPageNameWithExtension = "skills.php";
            $this->redirectUrl($nextRedirectPageNameWithExtension);
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

    public function registerSkill() {
        $this->controllerSkills = new ControllerSkills();
        $this->skills = $this->getSkillsFormData();
        if ($this->skills != null) {
            if (isset($_POST["addNewSkill"])) {
                if ($this->controllerSkills->insertSkills($this->skills)) {
                    $nextRedirectPageNameWithExtension = "skills.php";
                    $this->redirectUrl($nextRedirectPageNameWithExtension);
                } else {
                    $errorRedirectPageNameWithExtension = "skills.php";
                    $this->redirectUrl($errorRedirectPageNameWithExtension);
                }
            } else if (isset($_POST["submitted"])) {
                if ($this->controllerSkills->insertSkills($this->skills)) {
                    $nextRedirectPageNameWithExtension = "projects.php";
                    $this->redirectUrl($nextRedirectPageNameWithExtension);
                } else {
                    $errorRedirectPageNameWithExtension = "skills.php";
                    $this->redirectUrl($errorRedirectPageNameWithExtension);
                }
            }
        } else {
            $errorRedirectPageNameWithExtension = "skills.php";
            $this->redirectUrl($errorRedirectPageNameWithExtension);
        }
    }

}

$controllerSkillsAdapter = new ControllerSkillsAdapter();
$controllerSkillsAdapter->registerSkill();
