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

        $q = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('$username','$email','$pass')";

        if(mysqli_query($this->dbconn,$q)){
            echo "Signup Succussfull";
        }

    }

    public function login($data){
        $lemail = $data['lemail'];
        $lpass = $data['lpass'];

        $q = "SELECT * FROM user WHERE email='$lemail' AND password='$lpass'";
        

        if(!empty($lemail) && !empty($lpass)){
            if(mysqli_query($this->dbconn,$q)){
                $row = mysqli_query($this->dbconn,$q);
                $rows = mysqli_fetch_assoc($row);
                if($rows['email']==$lemail && $rows['password']==$lpass){
                    session_start();
                    $_SESSION['username'] = $rows['username'];
                    $_SESSION['user_id'] = $rows['id'];
                    
                    header('location:deshboard.php');

                }else{
                    echo '<span style="color:red;">Something Worng</span>';
                }
            }
        }
        
    }


    public function todolistitems($data,$user_id){
        
        $textlist = $data['todotext'];

        $q = "INSERT INTO `task`(`textsms`,`user_id`) VALUES ('$textlist',$user_id)";

        if(mysqli_query($this->dbconn,$q)){
            echo "Succussfull";
        }else{
            echo"error";
        }
    }   

    public function todolistitemsshow($user_id){
        $q = "SELECT * FROM  task WHERE user_id=$user_id";

        if(mysqli_query($this->dbconn,$q)){
            $row = mysqli_query($this->dbconn,$q);
            return $row;
        }
    }

}
