<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author mmoha
 */

namespace model;

class Person
{

    //put your code here
    private $personId;
    private $personName;
    private $dateOfBirth;
    private $Age;
    private $address;
    private $landlineNumber;
    private $cellNumber;
    private $email;
    private $youtubeLink;
    private $facebookLink;
    private $linkedinLink;
    private $githubLink;
    private $twitterlink;
    private $websiteLink;
    private $profilelink;
    private $nationality;
    private $gender;
    private $password;
    private $registerationDate;

    //setters
    public function setExistingPerson($peronId){
        if($peronId != ""){
            $this->personId = $peronId;
        }
    }
    
    public function set_personId(): void
    {
        $this->personId = md5($this->get_email());
    }

    public function set_personName($personName): void
    {
        $this->personName = $personName;
    }

    public function set_dateOfBirth($dateOFBirth) : void
    {
        $this->dateOfBirth = date('Y-m-d', strtotime($dateOFBirth));
        $this->set_age();
    }

    public function set_address($address) : void
    {
        $this->address = $address;
    }

    public function set_landlineNumber($landlineNumber) : void
    {
        $this->landlineNumber = $landlineNumber;
    }

    public function set_cellNumber($cellNumber) : void
    {
        $this->cellNumber = $cellNumber;
    }

    public function set_email($email) : void
    {
        $this->email = $email;
    }

    public function set_youtubeLink($youtubeLink) : void
    {
        $this->youtubeLink = $youtubeLink;
    }

    public function set_facebookLink($facebookLink) : void
    {
        $this->facebookLink = $facebookLink;
    }

    public function set_linkedinLink($linkedinLink) : void
    {
        $this->linkedinLink = $linkedinLink;
    }

    public function set_githubLink($githubLink) : void
    {
        $this->githubLink = $githubLink;
    }

    public function set_twitterlink($twitterlink) : void
    {
        $this->twitterlink = $twitterlink;
    }

    public function set_websiteLink($websiteLink) : void
    {
        $this->websiteLink = $websiteLink;
    }

    public function set_profilelink($profilelink) : void
    {
        $this->profilelink = $profilelink;
    }

    public function set_nationality($nationality) : void
    {
        $this->nationality = $nationality;
    }

    public function setGender($gender) : void
    {
        $this->gender = $gender;
    }
    
    public function setPassword($password): void {
        $this->password = md5($password);
    }

    public function setRegisterationDate($registerationDate): void {
        $this->registerationDate = strval( date('Y-m-d H:i:s', strtotime($registerationDate)));
    }

    
    private function set_age()
    {

        // Declare and define two dates
        // $date1 = strtotime("2016-06-01 22:45:00");
        // $date2 = strtotime("2018-09-21 10:44:01");
        $dob = strtotime($this->get_dateOfBirth());         //printf("   DOB = ".$dob);
        $today = strtotime(date("Y-m-d"));                  //printf("    TODAY = ".$today);
        // Formulate the Difference between two dates
        $diff = abs($today - $dob);

        // To get the year divide the resultant date into total seconds in a year (365*60*60*24)
        $years = floor($diff / (365 * 60 * 60 * 24));

        // To get the month, subtract it with years and divide the resultant date into total seconds in a month (30*60*60*24)
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));

        // To get the day, subtract it with years and months and divide the resultant date into total seconds in a days (60*60*24)
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        // To get the hour, subtract it with years, months & seconds and divide the resultant date into total seconds in a hours (60*60)
        $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));

        // To get the minutes, subtract it with years, months, seconds and hours and divide the resultant date into total seconds i.e. 60
        $minutes = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);

        // To get the minutes, subtract it with years, months, seconds, hours and minutes
        $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60));

        // Print the result
        //printf("%d years, %d months, %d days, %d hours, " . "%d minutes, %d seconds", $years, $months, $days, $hours, $minutes, $seconds);
        $this->Age = " Years = " . $years . " Months = " . $months . " Days = " . $days . " Hours = " . $hours . " Minutes = " . $minutes . " Seconds = " . $seconds;
        //printf($this->Age);
    }

    //getters

    public function get_personId(): string
    {
        return $this->personId;
    }

    public function get_personName(): string
    {
        return $this->personName;
    }

    public function get_dateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    public function get_age(): string
    {
        return $this->Age;
    }

    public function get_address(): string
    {
        return $this->address;
    }

    public function get_landlineNumber(): string
    {
        return $this->landlineNumber;
    }

    public function get_cellNumber(): string
    {
        return $this->cellNumber;
    }

    public function get_email(): string
    {
        return $this->email;
    }

    public function get_youtubeLink(): string
    {
        return $this->youtubeLink;
    }

    public function get_facebookLink(): string
    {
        return $this->facebookLink;
    }

    public function get_linkedinLink(): string
    {
        return $this->linkedinLink;
    }

    public function get_githubLink(): string
    {
        return $this->githubLink;
    }

    public function get_twitterlink(): string
    {
        return $this->twitterlink;
    }

    public function get_websiteLink(): string
    {
        return $this->websiteLink;
    }

    public function get_profilelink(): string
    {
        return $this->profilelink;
    }

    public function get_nationality(): string
    {
        return $this->nationality;
    }

    /**
     *
     * @return string
     */
    public function getGender():string
    {
        return $this->gender;
    }
    public function getPassword() : string {
        return $this->password;
    }

    public function getRegisterationDate(): string {
        return $this->registerationDate;
    }

    
    public function constructPerson($personName, $dateOfBirth, $address, $landlineNumber, $cellNumber, $email, $youtubeLink, $facebookLink, $linkedinLink, $githubLink, $twitterlink, $websiteLink, $profilelink, $nationality, $gender, $password, $registerationDate): Person
    {
        $this->set_personId();
        $this->set_personName($personName);
        $this->set_dateOfBirth($dateOfBirth);
        $this->set_address($address);
        $this->set_landlineNumber($landlineNumber);
        $this->set_cellNumber($cellNumber);
        $this->set_email($email);
        $this->set_youtubeLink($youtubeLink);
        $this->set_facebookLink($facebookLink);
        $this->set_linkedinLink($linkedinLink);
        $this->set_githubLink($githubLink);
        $this->set_twitterlink($twitterlink);
        $this->set_websiteLink($websiteLink);
        $this->set_profilelink($profilelink);
        $this->set_nationality($nationality);
        $this->setGender($gender);
        $this->setPassword($password);
        $this->setRegisterationDate($registerationDate);
        return $this;
    }

    public function __construct()
    {
    }

    public function __destruct()
    {
    }
}

