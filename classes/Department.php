<?php

//filename was location.php
//converted location object to Department
//python class creation and argument fetching methods
//kept variable names same as method names, exception getFCoo and getSCoo
//

class Department{ 
    private $Dname; 
    private $Dcode;     
    private $HOD; 
    private $FCoordinator; 
    private $SCoordinator; 
    private $ActiveEvents; 
    private $Events; 
    
    public function __construct($id, $name, $code, $hod, $fcoo, $scoo, $activeE, $E){
        $this->Dcode = $code; 
        $this->HOD = $hod; 
        $this->FCoordinator = $fcoo; 
        $this->SCoordinator = $scoo; 
        $this->ActiveEvents = $activeE; 
        $this->Events = $E; 
    }
    
    public function getDname() { return $this->Dname; }
    public function getDcode() { return $this->Dcode; }
    public function getFCoo() { return $this->FCoordinator; }
    public function getSCoo() { return $this->SCoordinator; }
    public function getHOD() { return $this->HOD; }
    public function getActiveEvents() { return $this->ActiveEvents; }
    public function getEvents() { return $this->Events; }
}
?>