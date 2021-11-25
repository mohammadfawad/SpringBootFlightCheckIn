<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

use PDO;
use model\Skills;
use controller\PDO_Utility;

include '../includes/includeAuto.php';

/**
 * Description of ControllerSkills
 *
 * @author frontend
 */
class ControllerSkills {

    //put your code here
    private PDO_Utility $pdoUtility;
    private Skills $skills;
    private array $skillsArray;

    public function __construct() {
        $this->pdoUtility = new PDO_Utility();
        $this->pdoUtility->databaseConnect();
        //$this->createEducationTable();
    }

    public function createSkillsTable() {
        $ddlSql = "CREATE TABLE IF NOT EXISTS `Skills` (
                    `autoId` int NOT NULL AUTO_INCREMENT,
                    `personId` varchar(50) NOT NULL,
                    `skillName` varchar(50) NOT NULL,
                    `skillCategory` varchar(99) NOT NULL,
                    `toolsUsed` varchar(99) NOT NULL,
                    `description` varchar(255) NOT NULL,
                    PRIMARY KEY (`autoId`),
                    FOREIGN KEY (`personId`) REFERENCES Persons(`personId`) ON DELETE CASCADE ON UPDATE CASCADE 
                    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
                    ";
        $skillTable = $this->pdoUtility->anyQuery($ddlSql);
        if ($skillTable) {
            printf("Skills Table Created Sucessfull = " . $ddlSql);
        } else {
            printf("Skills Table Created UnSucessfull = " . $ddlSql);
        }
    }

    public function getSkill(string $personId, string $key): Skills {
        $this->education = null;
        $query = "SELECT * FROM `Skills` WHERE personId = " . "'" . $personId . "'" . " AND autoId = " . $key . " ;";
        $dataSet = $this->pdoUtility->anySelectQuery($query);
        $dataSet->fetchAll(PDO::FETCH_OBJ);
        if ($dataSet->rowCount() > 0) {
            $this->skills = new Skills();
            $this->skills->setPrimaryKey($dataSet["autoId"]);
            $this->skills->setPersonId($dataSet["personId"]);
            $this->skills->setSkillName($dataSet["skillName"]);
            $this->skills->setSkillCatagory($dataSet["skillCategory"]);
            $this->skills->setToolsUsed($dataSet["toolsUsed"]);
            $this->skills->setSkillDescription($dataSet["description"]);
        }
        return $this->skills;
    }

    public function getAllSkills(string $personId): array {
        $userQuery = "SELECT `autoId`, `personId`, `skillName`, `skillCategory`, `toolsUsed`, `description` FROM `Skills` WHERE Skills.personId = :id;";
        $query = $this->pdoUtility->getPdo()->prepare($userQuery);
        $fetch = $this->pdoUtility->selectWhereQuery($query, array(':id' => $personId));
        $dataSet = $fetch->fetchAll(PDO::FETCH_OBJ);
        if ($this->pdoUtility->getSqlQuery()->rowCount() > 0) {
            $this->skillsArray = array();
            foreach ($dataSet as $tableCol) {
                $this->skills = new Skills();
                $this->skills->setPrimaryKey($tableCol->autoId);
                $this->skills->setPersonId($tableCol->personId);
                $this->skills->setSkillName($tableCol->skillName);
                $this->skills->setSkillCatagory($tableCol->skillCategory);
                $this->skills->setToolsUsed($tableCol->toolsUsed);
                $this->skills->setSkillDescription($tableCol->description);

                array_push($this->skillsArray, $this->skills);
            }
        }
        return $this->skillsArray;
    }

    public function insertSkills(Skills $skills): bool {
        $this->skills = $skills;

        if ($this->skills != null) {
            //printf("<br><hr>Skills Object is NOT NULL!<hr><br>");
            //User Exists Query
            $userQuery = "SELECT `personId` FROM `Persons` WHERE `personId` = :id";
            $userExists = $this->pdoUtility->getPdo()->prepare($userQuery);
            $ids = $this->skills->getPersonId();
            $userExists->bindValue(':id', $ids, PDO::PARAM_STR);
            // Query for Insertion
            $insertSkills = "INSERT INTO `Skills` ( `personId`, `skillName`, `skillCategory`, `toolsUsed`, `description`) "
                    . "VALUES(:pid, :skillNam, :skillCat, :tools,:description)";
            //Prepare Query for Execution
            $query = $this->pdoUtility->getPdo()->prepare($insertSkills);
            // Bind the parameters
            $query->bindParam(':pid', $this->skills->getPersonId(), PDO::PARAM_STR);
            $query->bindParam(':skillNam', $this->skills->getSkillName(), PDO::PARAM_STR);
            $query->bindParam(':skillCat', $this->skills->getSkillCatagory(), PDO::PARAM_STR);
            $query->bindParam(':tools', $this->skills->getToolsUsed(), PDO::PARAM_STR);
            $query->bindParam(':description', $this->skills->getSkillDescription(), PDO::PARAM_STR);

            //print_r($query);
            return $this->pdoUtility->insertIntoTable($query);
        } else {
            return false;
        }
    }

    public function updateSkills(Skills $skills): bool {
        $this->skills = $skills;
        //Query for Update
        $updateQuery = "UPDATE `Skills` SET skillName = :skillNam, skillCategory = :skillCat, toolsUsed = :tools, description = :description WHERE `Skills`.`personId` = :pid AND `Skills`.`autoId` = :key ; ";
        //Prepare Query for Execution
        $query = $this->pdoUtility->getPdo()->prepare($updateQuery);
        // Bind the parameters
        $query->bindParam(':key', $this->skills->getPrimaryKey(), PDO::PARAM_INT);
        $query->bindParam(':pid', $this->skills->getPersonId(), PDO::PARAM_STR);
        $query->bindParam(':skillNam', $this->skills->getSkillName(), PDO::PARAM_STR);
        $query->bindParam(':skillCat', $this->skills->getSkillCatagory(), PDO::PARAM_STR);
        $query->bindParam(':tools', $this->skills->getToolsUsed(), PDO::PARAM_STR);
        $query->bindParam(':description', $this->skills->getSkillDescription(), PDO::PARAM_STR);

        if ($this->pdoUtility->anyQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteSkills(string $key): bool {
        $deleteQuery = "DELETE FROM Skills WHERE `Skills`.`autoId` = :key";
        $query->bindParam(':key', $key, PDO::PARAM_INT);
        if ($this->pdoUtility->anyQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function __destruct() {
       
    }

}

//$controllerSkills = new ControllerSkills();