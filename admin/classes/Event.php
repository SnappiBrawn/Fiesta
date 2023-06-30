<?php

require_once "DB.php";
class Event {
    private $EventID;
    private $Type;    
    private $Title;
    private $Department;
    private $Faculty_Coordinator;
    private $Student_Coordinator;
    private $Description;
    private $Date;
    private $Venue;
    private $Registration;
    private $Status;
    private $Image;
    
    public function __construct($a){
        if (gettype($a)=="array"){
            $this->EventID = $a[0];
            $this->Type = $a[1];
            $this->Title = $a[2];
            $this->Department = $a[3];
            $this->Faculty_Coordinator = $a[4];
            $this->Student_Coordinator = $a[5];
            $this->Description = $a[6];
            $this->Date = $a[7];
            $this->Venue = $a[8];
            $this->Registration = $a[9];
            $this->Status = $a[10];
            $this->Image = $a[11];
        }
        else{
            $con=DB::getConnection();
            $query = "select * from events where EventID=" . $a;
            $res = mysqli_fetch_row(mysqli_query($con,$query));
            $this->EventID = $res[0];
            $this->Type = $res[1];
            $this->Title = $res[2];
            $this->Department = $res[3];
            $this->Faculty_Coordinator = $res[4];
            $this->Student_Coordinator = $res[5];
            $this->Description = $res[6];
            $this->Date = $res[7];
            $this->Venue = $res[8];
            $this->Registration = $res[9];
            $this->Status = $res[10];
            $this->Image = $res[11];
        }
    }
    public function addEvent(){
        $con=DB::getConnection();
        $q="insert into events values(".$this->EventID.",'".$this->Type."','".$this->Title."','".$this->Department."','".$this->Faculty_Coordinator."','".$this->Student_Coordinator."','". $this->Description."','".$this->Date."','".$this->Venue."','".$this->Registration."',1,'".$this->Image."')";
        mysqli_query($con, $q);
    }

    public function getTypeName(){
        $con = DB::getConnection();
        $query = "select type_Name from event_type where Etype_id='" . $this->Type . "'";
        return mysqli_fetch_row(mysqli_query($con, $query))[0];
    }
    public function MarkDone(){
        $con = DB::getConnection();
        $query = "update events set Status=0 where EventID='" . $this->EventID . "'";
        mysqli_query($con, $query);
    }
    public function getDeptName(){
        $con=DB::getConnection();
        $query="select Dept_Name from Department where Dept_ID='".$this->Department."'";
        $res=mysqli_fetch_row(mysqli_query($con,$query))[0];
        return $res;
    }

    public function getDeptFName(){
        $con=DB::getConnection();
        $query="select Dept_FullName from Department where Dept_ID='".$this->Department."'";
        $res=mysqli_fetch_row(mysqli_query($con,$query))[0];
        return $res;
    }

    public function getEventID() { return $this->EventID; }
    public function getType() { return $this->Type; }
    public function getTitle() { return $this->Title; }
    public function getDepartment() { return $this->Department; }
    public function getFaculty_Coordinator() { return $this->Faculty_Coordinator; }
    public function getStudent_Coordinator() { return $this->Student_Coordinator; }
    public function getDescription() { return $this->Description; }
    public function getDate() { return $this->Date; }
    public function getVenue() { return $this->Venue; }
    public function getRegistration() { return $this->Registration; }
    public function getStatus() { return $this->Status; }
    public function getImage() { return $this->Image; }

    public function setEventID($i) { $this->EventID=$i; }
    public function setType($i) { $this->Type=$i; }
    public function setTitle($i) { $this->Title=$i; }
    public function setDepartment($i) { $this->Department=$i; }
    public function setFaculty_Coordinator($i) { $this->Faculty_Coordinator=$i; }
    public function setStudent_Coordinator($i) { $this->Student_Coordinator=$i; }
    public function setDescription($i) { $this->Description=$i; }
    public function setDate($i) { $this->Date=$i; }
    public function setVenue($i) { $this->Venue=$i; }
    public function setRegistration($i) { $this->Registration=$i; }
    public function setStatus($i) { $this->Status=$i; }
    public function setImage($i) { $this->Image=$i; }
}
?>