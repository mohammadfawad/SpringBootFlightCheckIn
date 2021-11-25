<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

use model\Person;
use model\Education;
use model\Skills;
use model\Experience;
use model\Projects;

class Portfolio{
    private Person $person;
    private Education $education;
    private Skills $skills;
    private Experience $experience;
    private Projects $projects;
    
    private array $arrayEducation;
    private array $arraySkills;
    private array $ArrayExperience;
    private array $arrayProjects;
    
    public function __construct(Person $person, array $arrayEducation, array $arraySkills, array $ArrayExperience, array $arrayProjects) {
        $this->setPerson($person);
        $this->setArrayEducation($arrayEducation);
        $this->setArraySkills($arraySkills);
        $this->setArrayExperience($ArrayExperience);
        $this->setArrayProjects($arrayProjects);
    }

    
    public function getPerson(): Person {
        return $this->person;
    }

    public function getEducation(): Education {
        return $this->education;
    }

    public function getSkills(): Skills {
        return $this->skills;
    }

    public function getExperience(): Experience {
        return $this->experience;
    }

    public function getProjects(): Projects {
        return $this->projects;
    }

    public function setPerson(Person $person): void {
        $this->person = $person;
    }

    public function setEducation(Education $education): void {
        $this->education = $education;
    }

    public function setSkills(Skills $skills): void {
        $this->skills = $skills;
    }

    public function setExperience(Experience $experience): void {
        $this->experience = $experience;
    }

    public function setProjects(Projects $projects): void {
        $this->projects = $projects;
    }
    
    public function getArrayEducation(): array {
        return $this->arrayEducation;
    }

    public function getArraySkills(): array {
        return $this->arraySkills;
    }

    public function getArrayExperience(): array {
        return $this->ArrayExperience;
    }

    public function getArrayProjects(): array {
        return $this->arrayProjects;
    }

    public function setArrayEducation(array $arrayEducation): void {
        $this->arrayEducation = $arrayEducation;
    }

    public function setArraySkills(array $arraySkills): void {
        $this->arraySkills = $arraySkills;
    }

    public function setArrayExperience(array $ArrayExperience): void {
        $this->ArrayExperience = $ArrayExperience;
    }

    public function setArrayProjects(array $arrayProjects): void {
        $this->arrayProjects = $arrayProjects;
    }

}