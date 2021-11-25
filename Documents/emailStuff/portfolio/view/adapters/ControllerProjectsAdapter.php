<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace adapters;

use model\Projects;
use controller\ControllerProjects;

include '../../includes/includeAuto.php';

/**
 * Description of ControllerProjectsAdapter
 *
 * @author frontend
 */
class ControllerProjectsAdapter {

    //put your code here 
    private Projects $projects;
    private ControllerProjects $controllerProjects;

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

    public function getProjectsFormData(): Projects {
        if (isset($_POST["addNewProject"])) {

            $this->projects = new Projects();
            $this->projects->setPersonId($this->test_input($_POST["personId"]));
            $this->projects->setProjectName($this->test_input($_POST["projectName"]));
            $this->projects->setProjectDescription($this->test_input($_POST["projectDescription"]));
            $this->projects->setProjectDetails($this->test_input($_POST["projectDetails"]));
            $this->projects->setProjectLink($this->test_input($_POST["projectLink"]));

            $_SESSION["personId"] = $this->projects->getPersonId();

            printf("<br>" . $this->projects->getPersonId());
            printf("<br>" . $this->projects->getProjectName());
            printf("<br>" . $this->projects->getProjectDescription());
            printf("<br>" . $this->projects->getProjectDetails());
            printf("<br>" . $this->projects->getProjectLink());

            return $this->projects;
        } else if (isset($_POST["submitted"])) {

            $this->projects = new Projects();
            $this->projects->setPersonId($this->test_input($_POST["personId"]));
            $this->projects->setProjectName($this->test_input($_POST["projectName"]));
            $this->projects->setProjectDescription($this->test_input($_POST["projectDescription"]));
            $this->projects->setProjectDetails($this->test_input($_POST["projectDetails"]));
            $this->projects->setProjectLink($this->test_input($_POST["projectLink"]));

            $_SESSION["personId"] = $this->projects->getPersonId();

            printf("<br>" . $this->projects->getPersonId());
            printf("<br>" . $this->projects->getProjectName());
            printf("<br>" . $this->projects->getProjectDescription());
            printf("<br>" . $this->projects->getProjectDetails());
            printf("<br>" . $this->projects->getProjectLink());

            return $this->projects;
        } else {
            $nextRedirectPageNameWithExtension = "projects.php";
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

    public function registerProject() {
        $this->controllerProjects = new ControllerProjects();
        $this->projects = $this->getProjectsFormData();
        if ($this->projects != null) {
            if (isset($_POST["addNewProject"])) {
                if ($this->controllerProjects->insertProject($this->projects)) {
                    $nextRedirectPageNameWithExtension = "projects.php";
                    $this->redirectUrl($nextRedirectPageNameWithExtension);
                } else {
                    $errorRedirectPageNameWithExtension = "projects.php";
                    $this->redirectUrl($errorRedirectPageNameWithExtension);
                }
            } else if (isset($_POST["submitted"])) {
                if ($this->controllerProjects->insertProject($this->projects)) {
                    $nextRedirectPageNameWithExtension = "experience.php";
                    $this->redirectUrl($nextRedirectPageNameWithExtension);
                } else {
                    $errorRedirectPageNameWithExtension = "projects.php";
                    $this->redirectUrl($errorRedirectPageNameWithExtension);
                }
            }
        } else {
            $errorRedirectPageNameWithExtension = "projects.php";
            $this->redirectUrl($errorRedirectPageNameWithExtension);
        }
    }

}

$controllerProjectsAdapter = new ControllerProjectsAdapter();
$controllerProjectsAdapter->registerProject();
