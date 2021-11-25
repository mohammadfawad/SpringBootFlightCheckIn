<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace includes;

spl_autoload_register(function($className) {

	$className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
        $fullPath = $_SERVER['DOCUMENT_ROOT'].'/' . $className . '.php';
        if (!file_exists($fullPath)) {
            //printf("<br><hr>Include file does not Exists<hr><br>");
            return false;
        }
        //printf("<br><hr>".$fullPath."<br>Include file Exists<hr><br>");
        include_once $fullPath;

});
