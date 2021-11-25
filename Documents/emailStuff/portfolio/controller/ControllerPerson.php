<?php

/**
 * Class1 short summary.
 *
 * Class1 description.
 *
 * @version 1.0
 * @author fawad
 */

namespace controller;

use PDO;
use model\Person;
use controller\PDO_Utility;

include '../includes/includeAuto.php';

class ControllerPerson {

    private PDO_Utility $pdoUtility;
    private Person $person;
    private array $personArray;

    public function __construct() {
        $this->pdoUtility = new PDO_Utility();
        $this->pdoUtility->databaseConnect();
        //$this->createPersonTable();
    }

    public function createPersonTable() {
        $ddlSql = "CREATE TABLE IF NOT EXISTS `Persons` (
                    `personId` varchar(50) NOT NULL,
                    `personName` varchar(50) NOT NULL,
                    `dateOfBirth` varchar(15) NOT NULL,
                    `address` varchar(255) NOT NULL,
                    `landlineNumber` varchar(15) NOT NULL,
                    `cellNumber` varchar(15) NOT NULL,
                    `email` varchar(50) NOT NULL,
                    `youtubeLink` varchar(255) NOT NULL,
                    `facebookLink` varchar(255) NOT NULL,
                    `linkedinLink` varchar(255) NOT NULL,
                    `githubLink` varchar(255) NOT NULL,
                    `twitterlink` varchar(255) NOT NULL,
                    `websiteLink` varchar(255) NOT NULL,
                    `profilelink` varchar(255) NOT NULL,
                    `nationality` varchar(20) NOT NULL,
                    `gender` varchar(10) NOT NULL,
                    `password` varchar(50) NOT NULL,
                    `registerationDate` TIMESTAMP NOT NULL DEFAULT CURRENT_DATE(),
                    PRIMARY KEY (`personId`)
                    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;
                    ";
        $personTable = $this->pdoUtility->anyQuery($ddlSql);
        if ($personTable) {
            printf("Persons Table Created Sucessfull = " . $ddlSql);
        } else {
            printf("Persons Table Created UnSucessfull = " . $ddlSql);
        }
    }

    public function getPerson(string $personId): Person {
       
        $userQuery = "SELECT `personId`, `personName`, `dateOfBirth`, `address`, `landlineNumber`, `cellNumber`, `email`, `youtubeLink`, `facebookLink`, `linkedinLink`, `githubLink`, `twitterlink`, `websiteLink`, `profilelink`, `nationality`, `gender`, `password`, `registerationDate` FROM Persons WHERE Persons.personId = :id;";
        $query = $this->pdoUtility->getPdo()->prepare($userQuery);
        $fetch = $this->pdoUtility->selectWhereQuery($query, array(':id' => $personId));//echo '...DATA >>>>>'; print_r($fetch);
        $dataSet = $fetch->fetch(PDO::FETCH_ASSOC);        //print_r($dataSet);
        if ($this->pdoUtility->getSqlQuery()->rowCount() > 0) {            //echo '...DATA >>>>>';
            $this->person = new Person();//echo $dataSet->personId;
            $this->person->setExistingPerson($dataSet["personId"]);
            $this->person->set_personName($dataSet["personName"]);
            $this->person->set_dateOfBirth($dataSet["dateOfBirth"]);
            $this->person->set_address($dataSet["address"]);
            $this->person->set_landlineNumber($dataSet["landlineNumber"]);
            $this->person->set_cellNumber($dataSet["cellNumber"]);
            $this->person->set_email($dataSet["email"]);
            $this->person->set_youtubeLink($dataSet["youtubeLink"]);
            $this->person->set_facebookLink($dataSet["facebookLink"]);
            $this->person->set_linkedinLink($dataSet["linkedinLink"]);
            $this->person->set_githubLink($dataSet["githubLink"]);
            $this->person->set_twitterlink($dataSet["twitterlink"]);
            $this->person->set_websiteLink($dataSet["websiteLink"]);
            $this->person->set_profilelink($dataSet["profilelink"]);
            $this->person->set_nationality($dataSet["nationality"]);
            $this->person->setGender($dataSet["gender"]);
            $this->person->setPassword($dataSet["password"]);
            $this->person->setRegisterationDate($dataSet["registerationDate"]);
            
             //print_r($this->person);
        return $this->person;
        }else{
            print("Record Not found!!");
        }
       
    }

    public function getAllPersons(): array {
        $this->person = null;
        $this->personArray = null;
        $tableName = "Persons";
        $dataSet = $this->pdoUtility->selectAll($tableName);
        $dataSet->fetchAll(PDO::FETCH_OBJ);
        if ($dataSet->rowCount() > 0) {
            $this->personArray = array();
            foreach ($dataSet as $tableCol) {
                $this->person = new Person();
                $this->person->set_personName($tableCol["personName"]);
                $this->person->set_dateOfBirth($tableCol["dateOfBirth"]);
                $this->person->set_address($tableCol["address"]);
                $this->person->set_landlineNumber($tableCol["landlineNumber"]);
                $this->person->set_cellNumber($tableCol["cellNumber"]);
                $this->person->set_email($tableCol["email"]);
                $this->person->set_youtubeLink($tableCol["youtubeLink"]);
                $this->person->set_facebookLink($tableCol["facebookLink"]);
                $this->person->set_linkedinLink($tableCol["linkedinLink"]);
                $this->person->set_githubLink($tableCol["githubLink"]);
                $this->person->set_twitterlink($tableCol["twitterlink"]);
                $this->person->set_websiteLink($tableCol["websiteLink"]);
                $this->person->set_profilelink($tableCol["profilelink"]);
                $this->person->set_nationality($tableCol["nationality"]);
                $this->person->setGender($tableCol["gender"]);
                $this->person->setPassword($tableCol["password"]);
                $this->person->setRegisterationDate($tableCol["registerationDate"]);
                $this->person->set_personId();

                array_push($this->personArray, $this->person);
            }
        }
        return $this->personArray;
    }

    public function insertPerson(Person $person): bool {
        $this->person = $person;
        //printf("<br><hr>Got your Person Object<hr><br>");

        if ($this->person != null) {
            //printf("<br><hr>Person Object is NOT NULL!<hr><br>");
            //User Exists Query
            $userQuery = "SELECT `personId` FROM `Persons` WHERE `personId` = :id";
            $userExists = $this->pdoUtility->getPdo()->prepare($userQuery);
            $ids = $this->person->get_personId();
            $userExists->bindValue(':id', $ids, PDO::PARAM_STR);
            // Query for Insertion
            $insertPerson = "INSERT INTO `Persons` (`personId`, `personName`, `dateOfBirth`, `address`, `landlineNumber`, `cellNumber`, `email`, `youtubeLink`, `facebookLink`, `linkedinLink`, `githubLink`, `twitterlink`, `websiteLink`, `profilelink`, `nationality`, `gender`, `password`, `registerationDate`)"
                    . " VALUES(:pid, :name, :dob, :add, :lnumber, :celnumber, :eml, :utube, :fb, :linkedin, :github, :twitter, :web, :profile, :nationality, :gender, :pass, :regdate)";
            //Prepare Query for Execution
            $query = $this->pdoUtility->getPdo()->prepare($insertPerson);
            // Bind the parameters
            $query->bindParam(':pid', $this->person->get_personId(), PDO::PARAM_STR);
            $query->bindParam(':name', $this->person->get_personName(), PDO::PARAM_STR);
            $query->bindParam(':dob', $this->person->get_dateOfBirth(), PDO::PARAM_STR);
            $query->bindParam(':add', $this->person->get_address(), PDO::PARAM_STR);
            $query->bindParam(':lnumber', $this->person->get_landlineNumber(), PDO::PARAM_STR);
            $query->bindParam(':celnumber', $this->person->get_cellNumber(), PDO::PARAM_STR);
            $query->bindParam(':eml', $this->person->get_email(), PDO::PARAM_STR);
            $query->bindParam(':utube', $this->person->get_youtubeLink(), PDO::PARAM_STR);
            $query->bindParam(':fb', $this->person->get_facebookLink(), PDO::PARAM_STR);
            $query->bindParam(':linkedin', $this->person->get_linkedinLink(), PDO::PARAM_STR);
            $query->bindParam(':github', $this->person->get_githubLink(), PDO::PARAM_STR);
            $query->bindParam(':twitter', $this->person->get_twitterlink(), PDO::PARAM_STR);
            $query->bindParam(':web', $this->person->get_websiteLink(), PDO::PARAM_STR);
            $query->bindParam(':profile', $this->person->get_profilelink(), PDO::PARAM_STR);
            $query->bindParam(':nationality', $this->person->get_nationality(), PDO::PARAM_STR);
            $query->bindParam(':gender', $this->person->getGender(), PDO::PARAM_STR);
            $query->bindParam(':pass', $this->person->getPassword(), PDO::PARAM_STR);
            $query->bindParam(':regdate', $this->person->getRegisterationDate(), PDO::PARAM_STR);
            //print_r($query);
            if (!$this->pdoUtility->recordExists($userExists)) {
                return $this->pdoUtility->insertIntoTable($query);
            } else {
                // Message for unsuccessfull insertion
                echo "<script>alert('User Already Registered');</script>";
                //echo "<script>window.location.href='index.php'</script>";
                return false;
            }
        } else {
            return false;
        }
    }

    public function updatePerson(Person $person): bool {
        $this->person = $person;
        //Query for Update
        $updateQuery = "UPDATE `Persons` SET personName = :name, dateOfBirth = :dob, address = :add, landlineNumber = :lnumber, celnumber = :celnumber"
                . ", youtubeLink = :utube, facebookLink = :fb, linkedinLink = :linkedin, githubLink = :github, twitterlink = :twitter"
                . ", websiteLink = :web, profilelink = :profile, nationality = :nationality, gender = :gender, password = :pass WHERE `Persons`.`personId` = :pid ; ";
        //Prepare Query for Execution
        $query = $this->pdoUtility->getPdo()->prepare($updateQuery);
        // Bind the parameters
        $query->bindParam(':pid', $this->person->get_personId(), PDO::PARAM_STR);
        $query->bindParam(':name', $this->person->get_personName(), PDO::PARAM_STR);
        $query->bindParam(':dob', $this->person->get_dateOfBirth(), PDO::PARAM_STR);
        $query->bindParam(':add', $this->person->get_address(), PDO::PARAM_STR);
        $query->bindParam(':lnumber', $this->person->get_landlineNumber(), PDO::PARAM_STR);
        $query->bindParam(':celnumber', $this->person->get_cellNumber(), PDO::PARAM_STR);
        $query->bindParam(':utube', $this->person->get_youtubeLink(), PDO::PARAM_STR);
        $query->bindParam(':fb', $this->person->get_facebookLink(), PDO::PARAM_STR);
        $query->bindParam(':linkedin', $this->person->get_linkedinLink(), PDO::PARAM_STR);
        $query->bindParam(':github', $this->person->get_githubLink(), PDO::PARAM_STR);
        $query->bindParam(':twitter', $this->person->get_twitterlink(), PDO::PARAM_STR);
        $query->bindParam(':web', $this->person->get_websiteLink(), PDO::PARAM_STR);
        $query->bindParam(':profile', $this->person->get_profilelink(), PDO::PARAM_STR);
        $query->bindParam(':nationality', $this->person->get_nationality(), PDO::PARAM_STR);
        $query->bindParam(':gender', $this->person->getGender(), PDO::PARAM_STR);
        $query->bindParam(':pass', $this->person->getPassword(), PDO::PARAM_STR);

        if ($this->pdoUtility->anyQuery($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePerson(string $personId): bool {
        $deleteQuery = "DELETE FROM Persons WHERE `Persons`.`personId` = :pid";
        $query->bindParam(':pid', $personId, PDO::PARAM_INT);
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

//$controllerPerson = new ControllerPerson();
