<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

use PDO;
use model\Education;
use controller\PDO_Utility;

include '../includes/includeAuto.php';

/**
 * Description of ControllerEducation
 *
 * @author frontend
 */
class ControllerEducation {

    //put your code here
    private PDO_Utility $pdoUtility;
    private Education $education;
    private array $educationArray;

    public function __construct() {
        $this->pdoUtility = new PDO_Utility();
        $this->pdoUtility->databaseConnect();
        //$this->createEducationTable();
    }

    public function createEducationTable() {
        $ddlSql = "CREATE TABLE IF NOT EXISTS `Education` (
                    `autoId` int NOT NULL AUTO_INCREMENT,
                    `personId` varchar(50) NOT NULL,
                    `programTitle` varchar(50) NOT NULL,
                    `startDate` varchar(15) NOT NULL,
                    `endDate` varchar(15) NOT NULL,
                    `institute` varchar(15) NOT NULL,
                    `majorSubjects` varchar(150) NOT NULL,
                    `grades` varchar(10) NOT NULL,
                    `description` varchar(255) NOT NULL,
                    PRIMARY KEY (`autoId`),
                    FOREIGN KEY (`personId`) REFERENCES Persons(`personId`) ON DELETE CASCADE ON UPDATE CASCADE
                    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
                    ";
        $educationTable = $this->pdoUtility->anyQuery($ddlSql);
        if ($educationTable) {
            printf("Education Table Created Sucessfull = " . $ddlSql);
        } else {
            printf("Education Table Created UnSucessfull = " . $ddlSql);
        }
    }

    public function getEducation(string $personId, string $key): Education {
        $this->education = null;
        $query = "SELECT * FROM `Education` WHERE personId = " . "'" . $personId . "'" . " AND autoId = " . $key . " ;";
        $dataSet = $this->pdoUtility->anySelectQuery($query);
        $dataSet->fetchAll(PDO::FETCH_OBJ);
        if ($dataSet->rowCount() > 0) {
            $this->education = new Education();
            $this->education->setPrimaryKey($dataSet["autoId"]);
            $this->education->setPersonId($dataSet["personId"]);
            $this->education->setProgramTitle($dataSet["programTitle"]);
            $this->education->setStartDate($dataSet["startDate"]);
            $this->education->setEndDate($dataSet["endDate"]);
            $this->education->setInstitute($dataSet["institute"]);
            $this->education->setMajorSubjects($dataSet["majorSubjects"]);
            $this->education->setGrade($dataSet["grade"]);
            $this->education->setDescription($dataSet["description"]);
        }
        return $this->education;
    }

    public function getAllEducation(string $personId): array {
        $userQuery = "SELECT `autoId`, `personId`, `programTitle`, `startDate`, `endDate`, `institute`, `majorSubjects`, `grades`, `description` FROM Education WHERE Education.personId = :id;";
        $query = $this->pdoUtility->getPdo()->prepare($userQuery);
        $fetch = $this->pdoUtility->selectWhereQuery($query, array(':id' => $personId));   
        $dataSet = $fetch->fetchAll(PDO::FETCH_OBJ);
        if ($this->pdoUtility->getSqlQuery()->rowCount() > 0) {
            $this->educationArray = array();
            foreach ($dataSet as $tableCol) {
                $this->education = new Education();
                $this->education->setPrimaryKey($tableCol->autoId);
                $this->education->setPersonId($tableCol->personId);
                $this->education->setProgramTitle($tableCol->programTitle);
                $this->education->setStartDate($tableCol->startDate);
                $this->education->setEndDate($tableCol->endDate);
                $this->education->setInstitute($tableCol->institute);
                $this->education->setMajorSubjects($tableCol->majorSubjects);
                $this->education->setGrade($tableCol->grades);
                $this->education->setDescription($tableCol->description);

                array_push($this->educationArray, $this->education);
            }
        }//print_r($this->educationArray);
        return $this->educationArray;
    }

    public function insertEducation(Education $education): bool {
        $this->education = $education;

        if ($this->education != null) {
            //printf("<br><hr>Education Object is NOT NULL!<hr><br>");
            //User Exists Query
            $userQuery = "SELECT `personId` FROM `Education` WHERE `personId` = :id";
            $userExists = $this->pdoUtility->getPdo()->prepare($userQuery);
            $ids = $this->education->getPersonId();
            $userExists->bindValue(':id', $ids, PDO::PARAM_STR);


            // Query for Insertion
            $insertEducation = "INSERT INTO `Education` (`personId`, `programTitle`, `startDate`, `endDate`, `institute`, `majorSubjects`, `grades`,`description`) "
                    . "VALUES(:pid, :prog, :sdate, :edate, :institute, :majorsubjects, :grade ,:description)";
            //Prepare Query for Execution
            $query = $this->pdoUtility->getPdo()->prepare($insertEducation);
            // Bind the parameters
            $query->bindParam(':pid', $this->education->getPersonId(), PDO::PARAM_STR);
            $query->bindParam(':prog', $this->education->getProgramTitle(), PDO::PARAM_STR);
            $query->bindParam(':sdate', $this->education->getStartDate(), PDO::PARAM_STR);
            $query->bindParam(':edate', $this->education->getEndDate(), PDO::PARAM_STR);
            $query->bindParam(':institute', $this->education->getInstitute(), PDO::PARAM_STR);
            $query->bindParam(':majorsubjects', $this->education->getMajorSubjects(), PDO::PARAM_STR);
            $query->bindParam(':grade', $this->education->getGrade(), PDO::PARAM_STR);
            $query->bindParam(':description', $this->education->getDescription(), PDO::PARAM_STR);

            return $this->pdoUtility->insertIntoTable($query);
        } else {
            //echo 'Failed';
            return false;
        }
    }

    public function updateEducation(Education $education): bool {
        $this->education = $education;
        //Query for Update
        $updateQuery = "UPDATE `Education` SET programTitle = :prog, startDate = :sdate, endDate = :edate, institute = :institute, majorSubjects = :majorsubjects, grades = :grade, description = :description WHERE `Education`.`personId` = :pid AND `Education`.`autoId` = :key ; ";
        //Prepare Query for Execution
        $query = $this->pdoUtility->getPdo()->prepare($updateQuery);
        // Bind the parameters
        $query->bindParam(':key', $this->education->getPrimaryKey(), PDO::PARAM_INT);
        $query->bindParam(':pid', $this->education->getPersonId(), PDO::PARAM_STR);
        $query->bindParam(':prog', $this->education->getProgramTitle(), PDO::PARAM_STR);
        $query->bindParam(':sdate', $this->education->getStartDate(), PDO::PARAM_STR);
        $query->bindParam(':edate', $this->education->getEndDate(), PDO::PARAM_STR);
        $query->bindParam(':institute', $this->education->getInstitute(), PDO::PARAM_STR);
        $query->bindParam(':majorsubjects', $this->education->getMajorSubjects(), PDO::PARAM_STR);
        $query->bindParam(':grade', $this->education->getGrade(), PDO::PARAM_STR);
        $query->bindParam(':description', $this->education->getDescription(), PDO::PARAM_STR);

        if ($this->pdoUtility->anyQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteEducation(string $key): bool {
        $deleteQuery = "DELETE FROM Education WHERE `Education`.`autoId` = :key";
        $query = $this->pdoUtility->getPdo()->prepare($deleteQuery);
        $query->bindParam(':key', $key, PDO::PARAM_INT);
        if ($this->pdoUtility->anyQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function __destruct() {
        //$pdoUtility->databaseDisconnect();
    }

}

//$controllerEducation = new ControllerEducation();
