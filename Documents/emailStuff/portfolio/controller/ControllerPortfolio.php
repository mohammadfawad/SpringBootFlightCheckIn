<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;
use PDO;
use model\Portfolio;
use model\Person;
use model\Education;
use model\Skills;
use model\Experience;
use model\Projects;

use controller\ControllerPerson;
use controller\ControllerEducation;
use controller\ControllerSkills;
use controller\ControllerExperience;
use controller\ControllerProjects;

use controller\PDO_Utility;
/**
 * Description of ControllerPortfolio
 *
 * @author frontend
 */
class ControllerPortfolio {
    //put your code here
    //private PDO_Utility $pdoUtility;
    private Person $person;
    //private Education $education;
    //private Skills $skills;
    //private Experience $experience;
    //private Projects $projects;
    //private Portfolio $portfolio;
    
    private ControllerPerson $controllerPerson;
    private ControllerEducation $controllerEducation;
    private ControllerSkills $controllerSkills;
    private ControllerExperience $controllerExperience;
    private ControllerProjects $controllerProjects;

    
    private array $EducationArray;
    private array $SkillsArray;
    private array $ExperienceArray;
    private array $ProjectsArray;

    public function __construct(string $personId) {
        $this->setPerson($personId);
        $this->setEducation($personId);
        $this->setExperience($personId);
        $this->setProjects($personId);
        $this->setSkills($personId);
    }
    //Getters
    public function getPerson(): Person {
        return $this->person;
    }

    public function getEducation(): array {
        return $this->EducationArray;
    }

    public function getSkills(): array {
        return $this->SkillsArray;
    }

    public function getExperience(): array {
        return $this->ExperienceArray;
    }

    public function getProjects(): array {
        return $this->ProjectsArray;
    }
    //Setters
    public function setPerson(string $personId): void {
        $this->controllerPerson = new ControllerPerson();
        $this->person = $this->controllerPerson->getPerson($personId);
    }

    public function setEducation(string $personId): void {
        $this->controllerEducation = new ControllerEducation();
        $this->EducationArray = $this->controllerEducation->getAllEducation($personId);
    }

    public function setSkills(string $personId): void {
        $this->controllerSkills = new ControllerSkills();
        $this->SkillsArray = $this->controllerSkills->getAllSkills($personId);
        
    }

    public function setExperience(string $personId): void {
        $this->controllerExperience = new ControllerExperience();
        $this->ExperienceArray = $this->controllerExperience->getAllExperience($personId);
    }

    public function setProjects(string $personId): void {
        $this->controllerProjects = new ControllerProjects();
        $this->ProjectsArray = $this->controllerProjects->getAllProjects($personId);
    }

}
