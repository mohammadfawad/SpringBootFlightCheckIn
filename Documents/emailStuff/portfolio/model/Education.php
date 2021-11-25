<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of Education
 *  ALT + INSERT
 * @author mmoha
 */
class Education {

    //put your code here
    private $primaryKey;
    private $personId;
    private $programTitle;
    private $startDate;
    Private $endDate;
    private $institute;
    private $majorSubjects;
    private $grade;
    private $description;
    

    //Getters
    public function getPrimaryKey(): int {
        return $this->primaryKey;
    }

    public function getPersonId(): string {
        return $this->personId;
    }

    public function getProgramTitle(): string {
        return $this->programTitle;
    }

    public function getStartDate(): string {
        return $this->startDate;
    }

    public function getEndDate(): string {
        return $this->endDate;
    }

    public function getInstitute(): string {
        return $this->institute;
    }

    public function getMajorSubjects(): string {
        return $this->majorSubjects;
    }

    public function getDescription(): string {
        return $this->description;
    }
    
    public function getGrade(): string {
        return $this->grade;
    }

    
    //Setters
    public function setPrimaryKey($primaryKey): void {
        $this->primaryKey = $primaryKey;
    }

    public function setPersonId($personId): bool {
        if(isset($personId) && $personId !== ""){
           $this->personId = $personId;
            return true;
        } else {
            echo ':: Person Id Not set ::';
            return false;
        }
        
    }

    public function setProgramTitle($programTitle) {
        $this->programTitle = $programTitle;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    public function setInstitute($institute) {
        $this->institute = $institute;
    }

    public function setMajorSubjects($majorSubjects) {
        $this->majorSubjects = $majorSubjects;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function setGrade($grade) {
        $this->grade = $grade;
    }

    
    public function constructEducation($personId, $programTitle, $startDate, $endDate, $institute, $majorSubjects, $description): Education {
        $this->setPersonId($personId);
        $this->setProgramTitle($programTitle);
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);
        $this->setInstitute($institute);
        $this->setMajorSubjects($majorSubjects);
        $this->setDescription($description);
        return $this;
    }

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

}
