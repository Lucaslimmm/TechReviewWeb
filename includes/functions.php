<?php
class Contact{
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="contactus";
    public $mysqli;

    public function __construct(){
        return $this->mysqli=new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    public function contact_us($data){
        $fname=$data['uname'];
        $email=$data['uemail'];
        $phone=$data['uphone'];
        $message=$data['umessage'];
        $q="insert into contact_us set name='$fname', email='$email' phone='$phone message='$message'";
        return $this->mysqli->query($q);
    }
}
