<?php
class FacUser {
    private $uname;
    private $password;
    private $Name;
    private $Dept;
    private $Description;
    private $Contact;
    private $Profile;

    public function __construct($a) {
        if (gettype($a) == "array") {
            $this->uname = $a[0];
            $this->password = $a[1];
            $this->Name = $a[2];
            $this->Dept = $a[3];
            $this->Description = $a[4];
            $this->Contact = $a[5];
            $this->Profile = $a[6];
        }
        else{
            $con = DB::getConnection();
            $res = mysqli_fetch_row(mysqli_query($con, "select * from Fac_user where uname='" . $a . "'"));
            $this->uname = $res[0];
            $this->password = $res[1];
            $this->Name = $res[2];
            $this->Dept = $res[3];
            $this->Description = $res[4];
            $this->Contact = $res[5];
            $this->Profile = $res[6];
        }
    }

    public function getEventCount(){
        $con=DB::getConnection();
        $query="select count(*) from events where Faculty_Coordinator='".$this->Name."'";
        $res=mysqli_fetch_row(mysqli_query($con,$query))[0];
        return $res;
    }

    public function getActiveEventCount(){
        $con=DB::getConnection();
        $query="select count(*) from events where Faculty_Coordinator='".$this->Name."' and status=1";
        $res=mysqli_fetch_row(mysqli_query($con,$query))[0];
        return $res;
    }

    public function getuname () { return $this->uname;}
    public function getpassword () { return $this->password;}
    public function getName () { return $this->Name;}
    public function getDept () { return $this->Dept;}
    public function getDescription () { return $this->Description;}
    public function getContact () { return $this->Contact;}
    public function getProfile () { return $this->Profile;}

    public function setuname ($i) { $this->uname=$i;}
    public function setpassword ($i) { $this->password=$i;}
    public function setName ($i) { $this->Name=$i;}
    public function setDept ($i) { $this->Dept=$i;}
    public function setDescription ($i) { $this->Description=$i;}
    public function setContact ($i) { $this->Contact=$i;}
    public function setProfile ($i) { $this->Profile=$i;}
}
?>
