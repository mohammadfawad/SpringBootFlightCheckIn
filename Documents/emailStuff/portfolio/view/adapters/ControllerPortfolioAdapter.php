<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace adapters;

use model\Portfolio;
use controller\ControllerPortfolio;

include '../../includes/includeAuto.php';
/**
 * Description of ControllerPortfolioAdapter
 *
 * @author frontend
 */
class ControllerPortfolioAdapter {
    //put your code here
    private Portfolio $portfolio;
    private ControllerPortfolio $controllerPortfolio;
    
    public function __construct(string $personId) {
        session_start();
        $this->setPortfolio($personId);
        //echo 'Session ID = ' . session_id();
    }

    public function setPortfolio(string $peronId){
        $this->controllerPortfolio = new ControllerPortfolio($peronId);
        $this->portfolio = new Portfolio($this->controllerPortfolio->getPerson(), $this->controllerPortfolio->getEducation(), $this->controllerPortfolio->getSkills(), $this->controllerPortfolio->getExperience(), $this->controllerPortfolio->getProjects());
               
    }
    
    public function getPortfolio(): Portfolio {
        return $this->portfolio;
    }

    public function displayPortfolio(){
         echo $this->portfolio->getPerson()->get_age(); 
    }
}
//$personId = "4c4bf2ecd9f3f236eb11a7cce436f2e5";
// $controllerPortfolioAdapter = new ControllerPortfolioAdapter($personId);
// 
// print_r($controllerPortfolioAdapter->getPortfolio());
// printf("+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");
//$controllerPortfolioAdapter->displayPortfolio();