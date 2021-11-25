<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

use PDO;
use model\Experience;
use controller\PDO_Utility;

include '../includes/includeAuto.php';

/**
 * Description of ControllerExperience
 *
 * @author frontend
 */
class ControllerExperience {

    //put your code here
    private PDO_Utility $pdoUtility;
    private Experience $experience;
    private array $experienceArray;

    public function __construct() {
        $this->pdoUtility = new PDO_Utility();
        $this->pdoUtility->databaseConnect();
        //$this->createExperienceTable();
    }

    public function createExperienceTable() {
        $ddlSql = "CREATE TABLE IF NOT EXISTS `Experience` (
                    `autoId` int NOT NULL AUTO_INCREMENT,
                    `personId` varchar(50) NOT NULL,
                    `companyName` varchar(50) NOT NULL,
                    `companyAddress` varchar(150) NOT NULL,
                    `jobTitle` varchar(50) NOT NULL,
                    `startDate` varchar(15) NOT NULL,
                    `endDate` varchar(15) NOT NULL,
                    `jobDescription` varchar(150) NOT NULL,
                    `toolsUsed` varchar(150) NOT NULL,
                    `majorResponsibilities` varchar(250) NOT NULL,
                    PRIMARY KEY (`autoId`),
                    FOREIGN KEY (`personId`) REFERENCES Persons(`personId`) ON DELETE CASCADE ON UPDATE CASCADE 
                    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
                    ";
        $experienceTable = $this->pdoUtility->anyQuery($ddlSql);
        if ($experienceTable) {
            printf("Experience Table Created Sucessfull = " . $ddlSql);
        } else {
            printf("Experience Table Created UnSucessfull = " . $ddlSql);
        }
    }

    public function getExperience(string $personId, string $key): Experience {
        $this->experience = null;
        $query = "SELECT * FROM `Experience` WHERE personId = " . "'" . $personId . "'" . " AND autoId = " . $key . " ;";
        $dataSet = $this->pdoUtility->anySelectQuery($query);
        $dataSet->fetchAll(PDO::FETCH_OBJ);
        if ($dataSet->rowCount() > 0) {
            $this->experience = new Experience();
            $this->experience->setPrimaryKey($dataSet["autoId"]);
            $this->experience->setPersonId($dataSet["personId"]);
            $this->experience->setCompanyName($dataSet["companyName"]);
            $this->experience->setCompanyAddress($dataSet["companyAddress"]);
            $this->experience->setJobTitle($dataSet["jobTitle"]);
            $this->experience->setStartDate($dataSet["startDate"]);
            $this->experience->setEndDate($dataSet["endDate"]);
            $this->experience->setJobDescription($dataSet["jobDescription"]);
            $this->experience->setToolsUsed($dataSet["toolsUsed"]);
            $this->experience->setMajorResponsibilities($dataSet["majorResponsibilities"]);
        }
        return $this->experience;
    }

    public function getAllExperience(string $personId): array {
        $userQuery = "SELECT `autoId`, `personId`, `companyName`, `companyAddress`, `jobTitle`, `startDate`, `endDate`, `jobDescription`, `toolsUsed`, `majorResponsibilities` FROM `Experience` WHERE Experience.personId =  :id;";
        $query = $this->pdoUtility->getPdo()->prepare($userQuery);
        $fetch = $this->pdoUtility->selectWhereQuery($query, array(':id' => $personId));
        $dataSet = $fetch->fetchAll(PDO::FETCH_OBJ);
        if ($this->pdoUtility->getSqlQuery()->rowCount() > 0) {
            $this->experienceArray = array();
            foreach ($dataSet as $tableCol) {
                $this->experience = new Experience();
                $this->experience->setPrimaryKey($tableCol->autoId);
                $this->experience->setPersonId($tableCol->personId);
                $this->experience->setCompanyName($tableCol->companyName);
                $this->experience->setCompanyAddress($tableCol->companyAddress);
                $this->experience->setJobTitle($tableCol->jobTitle);
                $this->experience->setStartDate($tableCol->startDate);
                $this->experience->setEndDate($tableCol->endDate);
                $this->experience->setJobDescription($tableCol->jobDescription);
                $this->experience->setToolsUsed($tableCol->toolsUsed);
                $this->experience->setMajorResponsibilities($tableCol->majorResponsibilities);

                array_push($this->experienceArray, $this->experience);
            }
        }//print_r($this->experienceArray);
        return $this->experienceArray;
    }

    public function insertExperience(Experience $experience): bool {
        $this->experience = $experience;

        if ($this->experience != null) {
            //printf("<br><hr>Experience Object is NOT NULL!<hr><br>");
            //User Exists Query
            $userQuery = "SELECT `personId` FROM `Experience` WHERE `personId` = :id";
            $userExists = $this->pdoUtility->getPdo()->prepare($userQuery);
            $ids = $this->experience->getPersonId();
            $userExists->bindValue(':id', $ids, PDO::PARAM_STR);


            // Query for Insertion
            $insertExperience = "INSERT INTO `Experience` (`personId`, `companyName`, `companyAddress`, `jobTitle`, `startDate`, `endDate`, `jobDescription`, `toolsUsed`, `majorResponsibilities`) "
                    . "VALUES(:pid, :company, :address, :job, :sDate, :eDate, :jobDes ,:tools ,:responsibilities)";
            //Prepare Query for Execution
            $query = $this->pdoUtility->getPdo()->prepare($insertExperience);
            // Bind the parameters
            $query->bindParam(':pid', $this->experience->getPersonId(), PDO::PARAM_STR);
            $query->bindParam(':company', $this->experience->getCompanyName(), PDO::PARAM_STR);
            $query->bindParam(':address', $this->experience->getCompanyAddress(), PDO::PARAM_STR);
            $query->bindParam(':job', $this->experience->getJobTitle(), PDO::PARAM_STR);
            $query->bindParam(':sDate', $this->experience->getStartDate(), PDO::PARAM_STR);
            $query->bindParam(':eDate', $this->experience->getEndDate(), PDO::PARAM_STR);
            $query->bindParam(':jobDes', $this->experience->getJobDescription(), PDO::PARAM_STR);
            $query->bindParam(':tools', $this->experience->getToolsUsed(), PDO::PARAM_STR);
            $query->bindParam(':responsibilities', $this->experience->getMajorResponsibilities(), PDO::PARAM_STR);

            //print_r($query);
            return $this->pdoUtility->insertIntoTable($query);
        } else {
            return false;
        }
    }

    public function updateExperience(Experience $experience): bool {
        $this->experience = $experience;
        //Query for Update
        $updateQuery = "UPDATE `Experience` SET companyName = :compName, companyAddress = :compAdd, jobTitle = :jTitle, startDate = :sdate, endDate = :edate, jobDescription = :jobDes, toolsUsed = :tools, majorResponsibilities = :majorRes WHERE `Experience`.`personId` = :pid AND `Experience`.`autoId` = :key ; ";
        //Prepare Query for Execution
        $query = $this->pdoUtility->getPdo()->prepare($updateQuery);
        // Bind the parameters
        $query->bindParam(':key', $this->experience->getPrimaryKey(), PDO::PARAM_INT);
        $query->bindParam(':pid', $this->experience->getPersonId(), PDO::PARAM_STR);
        $query->bindParam(':compName', $this->experience->getCompanyName(), PDO::PARAM_STR);
        $query->bindParam(':compAdd', $this->experience->getCompanyAddress(), PDO::PARAM_STR);
        $query->bindParam(':jTitle', $this->experience->getJobTitle(), PDO::PARAM_STR);
        $query->bindParam(':sdate', $this->experience->getStartDate(), PDO::PARAM_STR);
        $query->bindParam(':edate', $this->experience->getEndDate(), PDO::PARAM_STR);
        $query->bindParam(':jobDes', $this->experience->getJobDescription(), PDO::PARAM_STR);
        $query->bindParam(':tools', $this->experience->getToolsUsed(), PDO::PARAM_STR);
        $query->bindParam(':majorRes', $this->experience->getMajorResponsibilities(), PDO::PARAM_STR);

        if ($this->pdoUtility->anyQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteExperience(string $key): bool {
        $deleteQuery = "DELETE FROM Experience WHERE `Experience`.`autoId` = :key";
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

//$controllerExperience = new ControllerExperience();
