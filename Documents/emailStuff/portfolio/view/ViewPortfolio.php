<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
//        $array = array();
//        $array1 = array();
//        for ($x = 0; $x <= 10; $x++) {
//            $array[$x] = $x;
//            array_push($array1, $x);
//        }
//        print_r($array);
//        print_r($array1);
        $array = array();
        $array1 = array();
        for ($x = 0; $x <= 10; $x++) {
            $md = md5("m.mohammadfawad@gmail.com");
            $array[$x] = $md;
            $md1 = md5("m.mohammadfawad@gmail.com");
            array_push($array1, $md1);
            print(strcmp($array[$x], $array1[$x])." = ");
            print($md ."     ". $md1. "<br>");
        }
        ?>
    </body>
</html>
