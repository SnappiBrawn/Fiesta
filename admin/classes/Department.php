<?php

//filename was location.php
//converted location object to Department
//python class creation and argument fetching methods
//kept variable names same as method names, exception getFCoo and getSCoo
//

class Department{ //Location {
    private $Dname; //$Name;
    private $Dcode; //$Address;    
    private $HOD; //$ManagerFName;
    private $FCoordinator; //$ManagerLName;
    private $SCoordinator; //$ManagerEmail;
    private $ActiveEvents; //$ManagerNumber;
    private $Events; //$MaxCapacity;
    
    public function __construct($id, $name, $code, $hod, $fcoo, $scoo, $activeE, $E){//$id, $name, $address, $manFName, $manLName, $manEmail, $manNumber, $maxCap) {
        $this->Dname = $name; //Name = $name;
        $this->Dcode = $code; //Address = $address;
        $this->HOD = $hod; //MaxCapacity = $maxCap;
        $this->FCoordinator = $fcoo; //ManagerFName = $manFName;
        $this->SCoordinator = $scoo; //ManagerLName = $manLName;
        $this->ActiveEvents = $activeE; //ManagerEmail = $manEmail;
        $this->Events = $E; //ManagerNumber = $manNumber;
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