<?php

require_once "DB.php";
class Volunteer {
    private $EventID;
    private $Description;
    private $Name;    
    private $Semester;
    private $Department;
    
    
    public function __construct($a){
        if (gettype($a)=="array"){
            $this->EventID = $a[0];
            $this->Name = $a[1];
            $this->Description = $a[4];
            $this->Semester = $a[3];
            $this->Department = $a[2];
        
        }
        else{
            $con=DB::getConnection();
            $query = "select * from volunteerlist where EventID=" . $a;
            $res = mysqli_fetch_row(mysqli_query($con,$query));
            $this->EventID = $res[0];
            $this->Description = $res[4];
            $this->Name = $res[1];
            $this->Semester = $res[3];
            $this->Department = $res[2];
            
        }
    }
    
    public function getDeptName(){
        $con=DB::getConnection();
        $query="select Dept_Name from Department where Dept_ID='".$this->Department."'";
        $res=mysqli_fetch_row(mysqli_query($con,$query))[0];
        return $res;
    }

    public function getEventID() { return $this->EventID; }
    public function getName() { return $this->Name; }
    public function getSemester() { return $this->Semester; }
    public function getDepartment() { return $this->Department; }
    public function getDescription() { return $this->Description; }

}
?>