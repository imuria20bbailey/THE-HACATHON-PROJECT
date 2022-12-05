<?php

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'moh_ebola');

$db = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    
class DB_con
{

    function __construct()
    {
        
    $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    $this->dbh=$con;
    
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "ERROR : " . mysqli_connect_error();
    }

    }
    
// for username availblty
    public function usernameavailblty($uname) {
    $result =mysqli_query($this->dbh,"SELECT username FROM users WHERE username='$uname'");
    return $result;
    
    }

// Function for registration
public function registration($name,$email,$uname,$pasword)
{
$ret=mysqli_query($this->dbh,"INSERT INTO users (name,email,username,Password,createdon, createdby) VALUES ('$name', '$email', '$uname','$pasword', NOW(), 1)");
return $ret;
}


// Function for New case
public function newcase($name, $gender, $birthdate, $telephone, $patient_type_id, $region_district_id)
{
$ret=mysqli_query($this->dbh,"INSERT INTO patients (name, gender, birthdate, telephone, patient_type_id, region_district_id, createdon, createdby) 
VALUES ('$name', '$gender', '$birthdate', '$telephone', '$patient_type_id', '$region_district_id', NOW(), 1)");
return $ret;
}



// Function for signin
public function signin($username,$password)
	{
	$result=mysqli_query($this->dbh,"SELECT * from users where Username ='$username' and Password='$password'");
	return $result;
	}
}



?>