<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

use PDO;
use PDOException;
use controller\DbProperties;

include '../includes/includeAuto.php';

/**
 * Description of PDO_Utility
 *
 * @author fawad
 */
class PDO_Utility extends DbProperties {

    // put your code here
    private $serverName;
    private $connectionInfo;
    private $databaseName;
    private $userName;
    private $password;
    private $dataSet;
    private $sqlQuery;
    private $pdo;
    private $charSet;

    // setters
    public function setServerName($serverName) {
        $this->serverName = $serverName;
    }

    public function setConnectionInfo($connectionInfo) {
        $this->connectionInfo = $connectionInfo;
    }

    public function setDatabaseName($databaseName) {
        $this->databaseName = $databaseName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     *
     * @param mixed $connection
     */
    public function setPdo($pdo) {
        $this->pdo = $pdo;
    }

    public function setDataSet($dataSet): bool {
        if ($dataSet != null) {
            $this->dataSet = $dataSet;
            return true;
        } else {
            return false;
        }
    }

    public function setSqlQuery($sqlQuery): bool {
        if ($sqlQuery != null && $sqlQuery != "") {
            $this->sqlQuery = $sqlQuery;
            return true;
        } else {
            return false;
        }
    }

    public function setCharSet($charSet) {
        $this->charSet = $charSet;
    }

    // getters
    public function getServerName(): string {
        return $this->serverName;
    }

    public function getConnectionInfo(): array {
        return $this->connectionInfo;
    }

    public function getDatabaseName(): string {
        return $this->databaseName;
    }

    public function getUserName(): string {
        return $this->userName;
    }

    public function getPassword(): string {
        return $this->password;
    }

    /**
     *
     * @return mixed
     */
    public function getPdo() {
        return $this->pdo;
    }

    public function getDataSet() {
        return $this->dataSet;
    }

    public function getSqlQuery() {
        return $this->sqlQuery;
    }

    public function getCharSet() {
        return $this->charSet;
    }

    public function __construct() {
        $this->setConnectionInfo(null);
        $this->setSqlQuery(null);
        $this->setDataSet(null);

        $dbProperties = new DbProperties();
        $this->setDatabaseName($dbProperties->getDatabaseName());
        $this->setServerName($dbProperties->getServerUrl());
        $this->setUserName($dbProperties->getUserName());
        $this->setPassword($dbProperties->getPassword());
        $this->setCharSet($dbProperties->getCharset());
        //printf("<br><hr>Constructor PDO_Utility<hr><br>");
        $dbProperties = null;
    }

    public function databaseConnect() {
        $pdoConn = null;
        try {
            $dns = "mysql:host=" . $this->getServerName() . ";dbname=" . $this->getDatabaseName() . ";charset=" . $this->getCharSet();
            $pdoConn = new PDO($dns, $this->getUserName(), $this->getPassword());
            $pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setPdo($pdoConn);
            //printf("Connected");
        } catch (PDOException $e) {
            die("Server Connection Error : " . $e->getMessage());
        }
        return $pdoConn;
    }

    public function databaseDisconnect() {
        $this->setConnectionInfo(null);
        $this->setSqlQuery(null);
        $this->setServerName(null);
        $this->setDatabaseName(null);
        $this->setUserName(null);
        $this->setPassword(null);
    }

    public function recordExists($recordExists): bool {
        $result = null;
        if ($this->setSqlQuery($recordExists)) {
            try {
                // Query Execution
                if ($this->setDataSet($this->getSqlQuery()->execute())) {
                    if ($this->getSqlQuery()->rowCount() > 0) {
                        //echo "exists!";
                        return true;
                    } else {
                        //echo "non existant";
                        return false;
                    }
                }
            } catch (PDOException $ex) {
                echo '<br><hr>Runtime Exception :: ' . $ex->getMessage() . '<hr><br>';
            }
        }
    }

    public function selectAll(string $tableName) {
        try {
            $this->setSqlQuery('SELECT * FROM ' . $this->getDatabaseName() . '.' . $tableName . ';');
            $this->setDataSet($this->getSqlQuery()->execute());
            return $this->getDataSet();
        } catch (PDOException $ex) {
            echo '<br><hr>Runtime Exception :: ' . $ex->getMessage() . '<hr><br>';
        }
    }

    public function anySelectQuery($query) {
        try {                  
            $this->setSqlQuery($query);
            if($this->setDataSet($this->getSqlQuery()->execute())){
                return $this->getDataSet();
            }else{ 
                return false;
                //print 'DATA Not Forund...';              echo 'DATA Not Forund';}
            }
            
        } catch (PDOException $ex) {
            echo '<br><hr>Runtime Exception :: ' . $ex->getMessage() . '<hr><br>';
        }
    }

    public function anyQuery($query) {
        try {
            $this->setSqlQuery($query);
            
            return $this->getSqlQuery()->execute();
        } catch (PDOException $ex) {
            echo '<br><hr>Runtime Exception :: ' . $ex->getMessage() . '<hr><br>';
        }
    }

    public function selectWhereQuery($query, array $parameters) {
        try {
            
            $this->setSqlQuery($query);
            $this->setDataSet($this->getSqlQuery()->execute($parameters));
            //$this->setSqlQuery(""); $this->getDataSet();
            return  $this->getSqlQuery();
        } catch (PDOException $ex) {
            echo '<br><hr>Runtime Exception :: ' . $ex->getMessage() . '<hr><br>';
        }
    }

    public function insertIntoTable($insertQuery): bool {

        if ($this->setSqlQuery($insertQuery)) {
            //echo 'Going To EXECUTE Query!';
            try {
                // Query Execution
                if ($this->getSqlQuery()->execute()) {
                    //$this->getPdo()->commit();
                    //$lastInsertId = $this->getPdo()->lastInsertId();
                    //printf($lastInsertId);
                    echo "<script>alert('Record inserted successfully');</script>";
                    return true;
                } else {
                    //$this->getPdo()->rollback();
                    echo "<script>alert('Record insertion unsuccessfull. Please try again');</script>";
                    return false;
                }
            } catch (PDOException $ex) {
                echo '<br><hr>Runtime Exception :: ' . $ex->getMessage() . '<hr><br>';
            }
        } else {
            return false;
        }
    }

}

//$pdoUtility = new PDO_Utility();
//$pdoUtility->databaseConnect();