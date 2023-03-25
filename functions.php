<?php

error_reporting(0);

class todolist{

    private $dbconn;

    public function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "todolist";

        $this->dbconn= mysqli_connect($host,$user,$pass,$db);

        if(!$this->dbconn){
            die("database not found");
        }
    }
    

    public function signup($data){
        $username = $data['username'];
        $email = $data['email'];
        $pass = $data['pass'];

        $q = "INSERT INTO `signup`(`username`, `email`, `password`) VALUES ('$username','$email','$pass')";

        if(mysqli_query($this->dbconn,$q)){
            echo "Signup Succussfull";
        }

    }

    public function login($data){
        $lemail = $data['lemail'];
        $lpass = $data['lpass'];

        $q = "SELECT * FROM signup WHERE email='$lemail' AND password='$lpass'";
        if(!empty($lemail) && !empty($lpass)){
            if(mysqli_query($this->dbconn,$q)){
                $row = mysqli_query($this->dbconn,$q);
                $rows = mysqli_fetch_assoc($row);
                if($rows['email']==$lemail && $rows['password']==$lpass){
                    session_start();
                    $_SESSION['username'] = $rows['username'];
                    header('location:deshboard.php');
                }else{
                    echo '<span style="color:red;">Something Worng</span>';
                }
            }
        }
        
    }


    public function todolistitems($data){
        
        $textlist = $data['todotext'];
        $q = "INSERT INTO `todolist`(`textsms`) VALUES ('$textlist')";

        if(mysqli_query($this->dbconn,$q)){
            echo "Succussfull";
        }else{
            echo"error";
        }
    }   

    public function todolistitemsshow(){
        $q = "SELECT * FROM  todolist";

        if(mysqli_query($this->dbconn,$q)){
            $row = mysqli_query($this->dbconn,$q);
            return $row;
        }
    }

}