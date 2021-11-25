<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of Projects
 *
 * @author mmoha
 */
class Projects {

    //put your code here
    private $primaryKey;
    private $personId;
    private $projectName;
    private $projectDescription;
    private $projectDetails;
    private $projectLink;

    //Getters
    public function getPrimaryKey(): int {
        return $this->primaryKey;
    }
    
    public function getPersonId(): string {
        return $this->personId;
    }

    public function getProjectName(): string {
        return $this->projectName;
    }

    public function getProjectDescription(): string {
        return $this->projectDescription;
    }

    public function getProjectDetails(): string {
        return $this->projectDetails;
    }

    public function getProjectLink(): string {
        return $this->projectLink;
    }

    //Setters
    public function setPrimaryKey($primaryKey): void {
        $this->primaryKey = $primaryKey;
    }
    
    public function setPersonId($personId) {
        $this->personId = $personId;
    }

    public function setProjectName($projectName) {
        $this->projectName = $projectName;
    }

    public function setProjectDescription($projectDescription) {
        $this->projectDescription = $projectDescription;
    }

    public function setProjectDetails($projectDetails) {
        $this->projectDetails = $projectDetails;
    }

    public function setProjectLink($projectLink) {
        $this->projectLink = $projectLink;
    }

    public function constructProject($personId, $projectName, $projectDescription, $projectDetails, $projectLink): Projects {
        $this->setPersonId($personId);
        $this->setProjectName($projectName);
        $this->setProjectDescription($projectDescription);
        $this->setProjectDetails($projectDetails);
        $this->setProjectLink($projectLink);
        return $this;
    }

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

}
