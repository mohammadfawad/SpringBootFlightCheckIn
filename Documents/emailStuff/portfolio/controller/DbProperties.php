<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

/**
 * Description of DbProperties
 *
 * @author mmoha
 */
class DbProperties {

    //put your code here
    private $serverUrl;
    private $userName;
    private $password;
    private $databaseName;
    private $charset;

    //getters
    
    protected function getServerUrl():string {
        return $this->serverUrl;
    }

    protected function getUserName():string  {
        return $this->userName;
    }

    protected function getPassword():string  {
        return $this->password;
    }

    protected function getDatabaseName():string  {
        return $this->databaseName;
    }
    protected function getCharset() {
        return $this->charset;
    }


    //setters
    private function setServerUrl($serverUrl) {
        $this->serverUrl = $serverUrl;
    }

    private function setUserName($userName) {
        $this->userName = $userName;
    }

    private function setPassword($password) {
        $this->password = $password;
    }

    private function setDatabaseName($databaseName) {
        $this->databaseName = $databaseName;
    }
    private function setCharset($charset) {
        $this->charset = $charset;
    }

    
    public function __construct() {
        $this->setServerUrl("localhost:3306");
        $this->setDatabaseName("portfolio");
        $this->setUserName("root");
        $this->setPassword("");
        $this->setCharset("utf8mb4");
    }

}
//$dbProperties = new DbProperties();
//print_r($dbProperties);
//jdbc:mysql://localhost:3306/mysql?zeroDateTimeBehavior=CONVERT_TO_NULL [root on Default schema]