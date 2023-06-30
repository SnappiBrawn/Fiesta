<?php
require_once "DB.php";
class StuUser {
    private $uname;
    private $password;
    private $Name;
    private $Dept;
    private $Description;
    private $Contact;
    private $Profile;
    private $Semester;


    public function __construct($a) {
        if (gettype($a) == "array") {
            $this->uname = $a[0];
            $this->password = $a[1];
            $this->Name = $a[2];
            $this->Dept = $a[3];
            $this->Description = $a[4];
            $this->Contact = $a[5];
            $this->Profile = $a[6];
            $this->Semester = $a[7];
        }
        else{
            $con = DB::getConnection();
            $res = mysqli_fetch_row(mysqli_query($con, "select * from Stu_user where uname='" . $a . "'"));
            $this->uname = $res[0];
            $this->password = $res[1];
            $this->Name = $res[2];
            $this->Dept = $res[3];
            $this->Description = $res[4];
            $this->Contact = $res[5];
            $this->Profile = $res[6];
            $this->Semester = $res[7];
        }
    }

    public function addStudent(){
        $con=DB::getConnection();
        $dept = $this->Dept;
        $query="select Dept_ID from Department where Dept_name='".$dept."'";
        $deptcode = mysqli_fetch_row(mysqli_query($con, $query))[0];
        $query="insert into stu_user values('".$this->uname."','".$this->password."','".$this->Name."','".$deptcode."','".$this->Description."','".$this->Contact."','".$this->Profile."','".$this->Semester."')";
        mysqli_query($con, $query);
    }

    public function updateStudent($actual_uname){
        $con = DB::getConnection();
        $query="UPDATE stu_user SET Uname='".$this->uname."', password='".$this->password."', Name='".$this->Name."',Description='".$this->Description."',Contact='".$this->Contact."',Profile='".$this->Profile."',Semester='".$this->Semester."' WHERE uname='".$actual_uname."'";
        mysqli_query($con, $query);
        echo $query;
    }
    public function getEventCount(){
        $con=DB::getConnection();
        $query="select count(*) from events where Student_Coordinator='".$this->Name."'";
        $res=mysqli_fetch_row(mysqli_query($con,$query))[0];
        return $res;
    }

    public function getActiveEventCount(){
        $con=DB::getConnection();
        $query="select count(*) from events where Student_Coordinator='".$this->Name."' and status=1";
        $res=mysqli_fetch_row(mysqli_query($con,$query))[0];
        return $res;
    }

    public function getDeptName(){
        $con=DB::getConnection();
        $query="select Dept_Name from Department where Dept_ID='".$this->Dept."'";
        $res=mysqli_fetch_row(mysqli_query($con,$query))[0];
        return $res;
    }

    public function removeUser(){
        $con=DB::getConnection();
        $query="delete from stu_user where where uname='".$this->uname."'";
        $res=mysqli_fetch_row(mysqli_query($con,$query))[0];
    }

    public function getuname () { return $this->uname;}
    public function getpassword () { return $this->password;}
    public function getName () { return $this->Name;}
    public function getDept () { return $this->Dept;}
    public function getDescription () { return $this->Description;}
    public function getContact () { return $this->Contact;}
    public function getProfile () { return $this->Profile;}
    public function getSemester () { return $this->Semester;}
    
    public function setuname ($i) { $this->uname=$i;}
    public function setpassword ($i) { $this->password=$i;}
    public function setName ($i) { $this->Name=$i;}
    public function setDept ($i) { $this->Dept=$i;}
    public function setDescription ($i) { $this->Description=$i;}
    public function setContact ($i) { $this->Contact=$i;}
    public function setProfile ($i) { $this->Profile=$i;}
    public function setSemester ($i) { $this->Semester=$i;}
}
?>
