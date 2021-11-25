<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of Skills
 *
 * @author mmoha
 */
class Skills {

    //put your code here
    private $primaryKey;
    private $personId;
    private $skillName;
    private $skillCatagory;
    private $skillDescription;
    private $toolsUsed;

    //Getters
    public function getPrimaryKey(): int {
        return $this->primaryKey;
    }
    
    public function getPersonId(): string {
        return $this->personId;
    }

    public function getSkillName(): string {
        return $this->skillName;
    }

    public function getSkillCatagory(): string {
        return $this->skillCatagory;
    }

    public function getSkillDescription(): string {
        return $this->skillDescription;
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

    public function setSkillName($skillName) {
        $this->skillName = $skillName;
    }

    public function setSkillCatagory($skillCatagory) {
        $this->skillCatagory = $skillCatagory;
    }

    public function setSkillDescription($skillDescription) {
        $this->skillDescription = $skillDescription;
    }

    public function setToolsUsed($toolsUsed) {
        $this->toolsUsed = $toolsUsed;
    }

    public function constructSkills($personId, $skillName, $skillCatagory, $skillDescription, $toolsUsed): Skills {
        $this->setPersonId($personId);
        $this->setSkillName($skillName);
        $this->setSkillCatagory($skillCatagory);
        $this->setSkillDescription($skillDescription);
        $this->setToolsUsed($toolsUsed);
        return $this;
    }

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

}
