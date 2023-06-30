<?php

require_once "DB.php";
class Proposal {
    private $Event_Name;
    private $Author;    
    private $Dept;
    private $Description;
    private $Media;
    private $Type;
    
    public function __construct($a){
        $this->Event_Name = $a[0];
        $this->Author = $a[1];
        $this->Dept = $a[2];
        $this->Description = $a[3];
        $this->Media = $a[4];
        $this->Type = $a[5];

    }

    public function getTypeName(){
        $con = DB::getConnection();
        $query = "select type_Name from event_type where Etype_id='" . $this->Type . "'";
        return mysqli_fetch_row(mysqli_query($con, $query))[0];
    }
    
    public function getDeptName(){
        $con=DB::getConnection();
        $query="select Dept_Name from Department where Dept_ID='".$this->Dept."'";
        return mysqli_fetch_row(mysqli_query($con,$query))[0];
    }

    public function getEvent_Name() { return $this->Event_Name; }
    public function getType() { return $this->Type; }
    public function getAuthor() { return $this->Author; }
    public function getDept() { return $this->Dept; }
    public function getDescription() { return $this->Description; }
    public function getMedia() { return $this->Media; }

    public function setEvent_Name($i) { $this->Event_Name=$i; }
    public function setType($i) { $this->Type=$i; }
    public function setAuthor($i) { $this->Author=$i; }
    public function setDept($i) { $this->Dept=$i; }
    public function setDescription($i) { $this->Description=$i; }
    public function setMedia($i) { $this->Media=$i; }
}
?>