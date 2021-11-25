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
    <body><h1>Test Page</h1>
        <?php
        /*
         * @TODO test task
         * 
         */

        namespace controller;

if (include('../model/Person.php')) {
            echo 'include ok';
        } else {

            echo 'file not found';
        }

        //require_once './model/Person.php';

        class test extends model\Person {

            public $bday = '02/09/1984';

            public function set_dateOfBirth($bday) {
                parent::set_dateOfBirth($bday);
            }

            public function age(): string {
                return $this->get_age();
            }

            public function getPersonById($personId): \model\Person {
                return $this;
            }

            public function getpersonId(): string {
                
            }

        }

        // printf("bday = ");
        $test = new test();

//        printf($test->bday);
//        printf("Set DOB is =");
        //$test->set_dateOfBirth($test->bday);
        //$life = $test->age();
        //printf($life);
        $test->constructPerson("fahad", "02/09/1984", "Village Jagal", "0092 995 675491", "0092 300 0874407", "m.mohammadfawad@gmail.com", "www.youtube.com", "www.facebook.com", "www.linkedin.com", "www.github.com", "www.twitter.com", "www.neomsolutions.com", "www.portfolio.com/mohammadfawadbhatti", "Pakistani");
        $peron = $test;
        printf($test->age());
        echo "<br>";
        printf("Person Constructed:::::");
        printf(substr($peron->age(), 0, 12));
        $time = time();
        echo md5($time);
        print_r(peron);
        ?>
    </body>
</html>
