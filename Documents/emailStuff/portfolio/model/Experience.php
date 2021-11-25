<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of Experience
 *
 * @author mmoha
 */
class Experience {

    //put your code here
    private $primaryKey;
    private $personId;
    private $companyName;
    private $companyAddress;
    private $startDate;
    private $endDate;
    private $jobTitle;
    private $jobDescription;
    private $majorResponsibilities;
    private $toolsUsed;

    //Getters
    public function getPrimaryKey(): int {
        return $this->primaryKey;
    }
    
    public function getPersonId(): string {
        return $this->personId;
    }

    public function getCompanyName(): string {
        return $this->companyName;
    }

    public function getCompanyAddress(): string {
        return $this->companyAddress;
    }

    public function getStartDate(): string {
        return $this->startDate;
    }

    public function getEndDate(): string {
        return $this->endDate;
    }

    public function getJobTitle(): string {
        return $this->jobTitle;
    }

    public function getJobDescription(): string {
        return $this->jobDescription;
    }

    public function getMajorResponsibilities(): string {
        return $this->majorResponsibilities;
    }

    public function getToolsUsed(): string {
        return $this->toolsUsed;
    }

    //Setters
    public function setPrimaryKey($primaryKey): void {
        $this->primaryKey = $primaryKey;
    }

    public function setPersonId($personId) {
        $this->personId = $personId;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }

    public function setCompanyAddress($companyAddress) {
        $this->companyAddress = $companyAddress;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    public function setJobTitle($jobtitle) {
        $this->jobTitle = $jobtitle;
    }

    public function setJobDescription($jobDescription) {
        $this->jobDescription = $jobDescription;
    }

    public function setMajorResponsibilities($majorResponsibilities) {
        $this->majorResponsibilities = $majorResponsibilities;
    }

    public function setToolsUsed($toolsUsed) {
        $this->toolsUsed = $toolsUsed;
    }

    public function constructExperience($personId, $companyName, $companyAddress, $startDate, $endDate, $jobtitle, $jobDescription, $majorResponsibilities, $toolsUsed): Experience {
        $this->setPersonId($personId);
        $this->setCompanyName($companyName);
        $this->setCompanyAddress($companyAddress);
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);
        $this->setJobtitle($jobtitle);
        $this->setJobDescription($jobDescription);
        $this->setMajorResponsibilities($majorResponsibilities);
        $this->setToolsUsed($toolsUsed);
        return $this;
    }

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

}
