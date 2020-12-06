<?php
session_start();
include_once 'config.php';
class user{
    public $conn;
    public $count;
    public $total=0;

    public function __construct(){
        $con=new con(); 
        $this->conn=$con->connect();
    }
public function insert($uname,$name,$mob,$pass){
       $sql="Select * from tbl_user where `user_name`='$uname'";
       $result=$this->conn->query($sql);
       $this->count=$result->num_rows;
       if($this->count>0){
        echo '<script>alert("Username already exists")</script>';
       }
       else{
        $sql = "INSERT INTO tbl_user(`user_name`, `name`,`dateofsignup`,`mobile`, `isblock`,`password`,`is_admin`)
              VALUES ('$uname', '$name', NOW(),'$mob','0','$pass','0')";
           
            if ($this->conn->query($sql) === true) {
                echo '<script>alert("Registration Successful")</script>';  
              } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
              }
        }

        }
               

     public function login($uname,$pass) {
        $sql="Select * from tbl_user";
		$result = $this->conn->query($sql);
		if($result->num_rows>0) {
			while($rows=$result->fetch_assoc()){
                $user_name=strtolower($rows['user_name']);
                $name=$rows['name'];
                $password=$rows['password'];
                $isadmin=$rows['is_admin'];  
                $isblock=$rows['isblock'];
                $id=$rows['user_id'];
                if($user_name== strtolower($uname) && $password==$pass && $isblock==1) {
                    $cookie_name = "UN";
                    $cookie_value =$user_name;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                        echo "Login successful"; 
                        $_SESSION['UN']=array('username'=>$uname,'user_id'=>$id,'name'=>$name);
                        header('location:User/User_dashboard.php');
                    }
                    if($user_name== $uname && $password==$pass && $isblock==0) {
                        echo '<script>alert("Wait for admin approval")</script>';
                    }

                    if ($user_name== $uname && $password==$pass && $isadmin==1) {
                        echo "Login successful"; 
                        $_SESSION['Admin']=array('Adminname'=>$uname,'admin_id'=>$id,'name'=>$name);
                        header('location:Admin/index.php');
                    }

                }
                if($user_name!= $uname || $password!=$pass )
                echo '<script>alert("Username or password not match")</script>';     
            } 
                 
           
        }
    
    public function PenReq(){
        $sql="Select * from tbl_user where isblock=0 and is_admin=0";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->count=$result->num_rows;
                    }
                 }
                 return $this->count;
     }

     public function AppReq(){
        $sql="Select * from tbl_user where isblock=1 and is_admin=0 ";
        $result = $this->conn->query($sql);
        if($result->num_rows>0) {
           while($rows=$result->fetch_assoc()){
               $this->count=$result->num_rows;
           }
        }
        return $this->count;
     }

     public function AllReq(){
        $sql="Select * from tbl_user where is_admin=0";
        $result = $this->conn->query($sql);
        if($result->num_rows>0) {
           while($rows=$result->fetch_assoc()){
               $this->count=$result->num_rows;
           }
        }
        return $this->count;
     }

}   
?>