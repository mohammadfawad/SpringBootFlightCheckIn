<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

use PDO;
use model\Projects;
use controller\PDO_Utility;

include '../includes/includeAuto.php';

/**
 * Description of ControllerProjects
 *
 * @author frontend
 */
class ControllerProjects {

    //put your code here
    private PDO_Utility $pdoUtility;
    private Projects $projects;
    private array $projectsArray;

    public function __construct() {
        $this->pdoUtility = new PDO_Utility();
        $this->pdoUtility->databaseConnect();
        //$this->createPojectsTable();
    }

    public function createPojectsTable() {
        $ddlSql = "CREATE TABLE IF NOT EXISTS `Projects` (
                    `autoId` int NOT NULL AUTO_INCREMENT,
                    `personId` varchar(50) NOT NULL,
                    `projectName` varchar(50) NOT NULL,
                    `projectDescription` varchar(99) NOT NULL,
                    `projectDetails` varchar(250) NOT NULL,
                    `projectLink` varchar(255) NOT NULL,
                    PRIMARY KEY (`autoId`),
                    FOREIGN KEY (`personId`) REFERENCES Persons(`personId`) ON DELETE CASCADE ON UPDATE CASCADE 
                    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
                    ";
        $projectsTable = $this->pdoUtility->anyQuery($ddlSql);
        if ($projectsTable) {
            printf("Projects Table Created Sucessfull = " . $ddlSql);
        } else {
            printf("Projects Table Created UnSucessfull = " . $ddlSql);
        }
    }

    public function getProject(string $personId, string $key): Projects {
        $this->projects = null;
        $query = "SELECT * FROM `Projects` WHERE personId = " . "'" . $personId . "'" . " AND autoId = " . $key . " ;";
        $dataSet = $this->pdoUtility->anySelectQuery($query);
        $dataSet->fetchAll(PDO::FETCH_OBJ);
        if ($dataSet->rowCount() > 0) {
            $this->projects = new Projects();
            $this->projects->setPrimaryKey($dataSet["autoId"]);
            $this->projects->setPersonId($dataSet["personId"]);
            $this->projects->setProjectName($dataSet["projectName"]);
            $this->projects->setProjectDescription($dataSet["projectDescription"]);
            $this->projects->setProjectDetails($dataSet["projectDetails"]);
            $this->projects->setProjectLink($dataSet["projectLink"]);
        }
        return $this->projects;
    }

    public function getAllProjects(string $personId): array {
        $userQuery = "SELECT `autoId`, `personId`, `projectName`, `projectDescription`, `projectDetails`, `projectLink` FROM `Projects` WHERE Projects.personId = :id;";
        $query = $this->pdoUtility->getPdo()->prepare($userQuery);
        $fetch = $this->pdoUtility->selectWhereQuery($query, array(':id' => $personId));
        $dataSet = $fetch->fetchAll(PDO::FETCH_OBJ);
        if ($this->pdoUtility->getSqlQuery()->rowCount() > 0){
            $this->projectsArray = array();
            foreach ($dataSet as $tableCol) {
                $this->projects = new Projects();
                $this->projects->setPrimaryKey($tableCol->autoId);
                $this->projects->setPersonId($tableCol->personId);
                $this->projects->setProjectName($tableCol->projectName);
                $this->projects->setProjectDescription($tableCol->projectDescription);
                $this->projects->setProjectDetails($tableCol->projectDetails);
                $this->projects->setProjectLink($tableCol->projectLink);

                array_push($this->projectsArray, $this->projects);
            }
        } //print_r($this->projectsArray);
        return $this->projectsArray;
    }

    public function insertProject(Projects $projects): bool {
        $this->projects = $projects;

        if ($this->projects != null) {
            //printf("<br><hr>Skills Object is NOT NULL!<hr><br>");
            //User Exists Query
            $userQuery = "SELECT `personId` FROM `Persons` WHERE `personId` = :id";
            $userExists = $this->pdoUtility->getPdo()->prepare($userQuery);
            $ids = $this->projects->getPersonId();
            $userExists->bindValue(':id', $ids, PDO::PARAM_STR);
            // Query for Insertion
            $insertProjects = "INSERT INTO `Projects` ( `personId`, `projectName`, `projectDescription`, `projectDetails`, `projectLink`) "
                    . "VALUES(:pid, :projectNam, :projectDes, :projectDetail,:projectLnk)";
            //Prepare Query for Execution
            $query = $this->pdoUtility->getPdo()->prepare($insertProjects);
            // Bind the parameters
            $query->bindParam(':pid', $this->projects->getPersonId(), PDO::PARAM_STR);
            $query->bindParam(':projectNam', $this->projects->getProjectName(), PDO::PARAM_STR);
            $query->bindParam(':projectDes', $this->projects->getProjectDescription(), PDO::PARAM_STR);
            $query->bindParam(':projectDetail', $this->projects->getProjectDetails(), PDO::PARAM_STR);
            $query->bindParam(':projectLnk', $this->projects->getProjectLink(), PDO::PARAM_STR);

            //print_r($query);
            return $this->pdoUtility->insertIntoTable($query);
        } else {
            return false;
        }
    }

    public function updateProject(Projects $projects): bool {
        $this->projects = $projects;
        //Query for Update
        $updateQuery = "UPDATE `Projects` SET projectName = :projectNam, projectDescription = :projectDes, projectDetails = :projectDetail, projectLink = :projectLnk WHERE `Projects`.`personId` = :pid AND `Projects`.`autoId` = :key ; ";
        //Prepare Query for Execution
        $query = $this->pdoUtility->getPdo()->prepare($updateQuery);
        // Bind the parameters
        $query->bindParam(':key', $this->projects->getPrimaryKey(), PDO::PARAM_INT);
        $query->bindParam(':pid', $this->projects->getPersonId(), PDO::PARAM_STR);
        $query->bindParam(':projectNam', $this->projects->getProjectName(), PDO::PARAM_STR);
        $query->bindParam(':projectDes', $this->projects->getProjectDescription(), PDO::PARAM_STR);
        $query->bindParam(':projectDetail', $this->projects->getProjectDetails(), PDO::PARAM_STR);
        $query->bindParam(':projectLnk', $this->projects->getProjectLink(), PDO::PARAM_STR);

        if ($this->pdoUtility->anyQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProject(string $key): bool {
        $deleteQuery = "DELETE FROM Projects WHERE `Projects`.`autoId` = :key";
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

//$controllerProjects = new ControllerProjects();
