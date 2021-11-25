<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

use Exception;
use controller\DbProperties;

include '../includes/includeAuto.php';

/**
 * Description of DAL_Utility
 *
 * @author fawad
 */
class DAL_Utility extends DbProperties {

    // put your code here
    private $serverName;
    private $connectionInfo;
    private $databaseName;
    private $userName;
    private $password;
    private $dataSet;
    private $sqlQuery;
    private $connection;

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
    public function setConnection($connection) {
        $this->connection = $connection;
    }

    public function setDataSet($dataSet) {
        $this->dataSet = $dataSet;
    }

    public function setSqlQuery($sqlQuery) {
        $this->sqlQuery = $sqlQuery;
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
    public function getConnection() {
        return $this->connection;
    }

    public function getDataSet() {
        return $this->dataSet;
    }

    public function getSqlQuery(): string {
        return $this->sqlQuery;
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
        $dbProperties = null;
    }

    public function databaseConnect() {
        $this->setConnection(null);
        try {


            $this->setConnection(mysqli_connect($this->getServerName(), $this->getUserName(), $this->getPassword(), $this->getDatabaseName()));
        } catch (Exception $e) {
            die("Server Connection Error : " . mysqli_connect_error() . $e->getMessage());
        }
        return $this->getConnection();
    }

    public function databaseDisconnect() {
        $this->setConnectionInfo(null);
        $this->setSqlQuery(null);
        $this->setServerName(null);
        $this->setDatabaseName(null);
        $this->setUserName(null);
        $this->setPassword(null);
    }

    public function selectAll($tableName) {
        $this->setSqlQuery('SELECT * FROM ' . $this->getDatabaseName() . '.' . $tableName);
        $this->setDataSet(mysqli_query($this->getConnection(), $this->getSqlQuery()));
        return $this->getDataSet();
    }

    public function anySelectQuery($query) {
        $this->setDataSet(mysqli_query($this->getConnection(), $query));
        return $this->getDataSet();
    }

    public function anyQuery($query) {
        $this->setSqlQuery($query);
        $this->databaseConnect();
        return mysqli_query($this->getConnection(), $this->getSqlQuery());
    }

    public function selectWhereQuery($tableName, $columnName, $operator, $value, $valueType) {
        $query = 'SELECT * FROM ' . $tableName . ' WHERE ' . $columnName . ' ' . $operator . ' ';
        if ($valueType == 'int') {
            $query = $query .= $value;
        } else if ($valueType == 'char') {
            $query = $query .= "'" . $value . "'";
        }
        $this->setSqlQuery($query);
        $this->setDataSet(mysqli_query($this->getConnection(), $this->getSqlQuery()));
        $this->setSqlQuery(null);
        return $this->getDataSet();
    }

    public function insertIntoTable($tableName, $values) {

        $query = 'INSERT INTO ' . $tableName . ' VALUES(';

        for ($index = 0; $index < count($values); $index++) {

            if (gettype($values[$index]) != null) {
                if (gettype($values[$index]) == "string") {
                    $query .= "'";
                    $query .= $values[$index];
                    if ($index == count($values)-1) {
                        $query .= "'";
                    } else {
                        $query .= "',";
                    }
                } else if (gettype($values[$index]) == 'integer') {
                    $query .= $values[$index];
                     $query .= ",";
                }
                if ($values[$index] == null) {
                    $query .= ',';
                }
            }
        }
        $query .= ')';
        printf("<br><hr>" . $query);
        $this->setSqlQuery($query);
        printf("<br><hr>" . $this->getSqlQuery());
        try {
             $mysqli_query = mysqli_query($this->getConnection(), $this->getSqlQuery());
             printf("<br><hr> Execution Result = ". $mysqli_query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            
        }

       
        return $this->getSqlQuery();
    }

    public function __destruct() {
        $this->databaseDisconnect();
    }

}

//$dalUtility = new DAL_Utility();
//printf("Connect DataBase<br>");
//$databaseConnect = $dalUtility->databaseConnect();
//printf("Connected DataBaseAAAA<br>");
//print_r($dalUtility->getConnection());
