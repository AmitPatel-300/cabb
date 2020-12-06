<?php
include_once 'config.php';
class location{
    public $conn;
    public $count=0;
    public $total=0;
    public $rows=array();
    public $arr=array();
    public function __construct(){
        $con=new con();
        $this->conn=$con->connect();
    }

    public function location() {
        $sql="Select * from tbl_location where is_available=1";
		$result = $this->conn->query($sql);
		if($result->num_rows>0) {
			while($rows=$result->fetch_assoc()){
                 $this->arr[$rows['name']]=$rows['distance'];  
            }
        }
       return $this->arr;
     }

    public function showlocation(){
        $sql="Select * from tbl_location";
                $result = $this->conn->query($sql);
                if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);

                }
    }

    public function deletelocation($id){
        $sql="Delete  from `tbl_location` where id='$id'";
                if ($this->conn->query($sql) === TRUE) {
                    return 1;
                } else {
                    echo "Error: " . $sql . "<br>" . $this->conn->error;
                }
    }

    public function editlocation($id){
        $sql="Select * from tbl_location where id='$id'";
                $result = $this->conn->query($sql);
                if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);

                }
    }

    public function updatelocation($id,$loc,$dis,$isa){
               $sql= "UPDATE `tbl_location` SET `name`='$loc' ,`distance`='$dis',`is_available`='$isa' WHERE `id` ='$id'"; ;
               if ($this->conn->query($sql) === true) {
                               return 1;
                           } else {
                               return "Error updating record: " . $this->conn->error;
                           }
            // return;
           }

            public function cancelride($id){
            $sql= "UPDATE `tbl_ride` SET `status`=0 WHERE `ride_id` ='$id'"; ;
            if ($this->conn->query($sql) === true) {
                    return 1;
                } else {
                    return "Error updating record: " . $this->conn->error;
                }
            }


    public function addlocation($loc,$dis,$isa){
        $sql = "INSERT INTO tbl_location(`name`, `distance`,`is_available`)
        VALUES ('$loc', '$dis', '$isa')";
        if ($this->conn->query($sql) === TRUE) {
            return 1;// return "New record created successfully";
          } else {
            return 0;//echo "Error: " . $sql . "<br>" . $this->conn->error;
          }
    }

    public function pending(){
        $sql="Select * from tbl_ride where status=1";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

     public function completed(){
        $sql="Select * from tbl_ride where status=2";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

       
     public function cancelled(){
        $sql="Select * from tbl_ride where status=0";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

     public function pendingRideUser($id){
        $sql="Select * from tbl_ride where status=1 and customer_user_id='$id'";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->count=$result->num_rows;
                    }
                 }
                 return $this->count;
     }

     public function completedRideUSER($id){
        $sql="Select * from tbl_ride where status=2 and customer_user_id='$id'";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->count=$result->num_rows;
                    }
                 }
                 return $this->count;
     }

     public function ALLRideUser($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and `status`!=0";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->count=$result->num_rows;
                    }
                 }
                 return $this->count;
     }

     public function AllRide(){
        $sql="Select * from tbl_ride where `status`!=0";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

      public function pendingUserRide($id){
        $sql="Select * from tbl_ride where status=1 and customer_user_id='$id'";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }



     public function completedUserRide($id){
        $sql="Select * from tbl_ride where status=2 and customer_user_id='$id'";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

       
     public function AllUserRide($id){
        $sql="Select * from tbl_ride where  customer_user_id='$id'";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }


     public function PenReq(){
        $sql="Select * from tbl_user where isblock=0 and is_admin=0";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

     public function AppReq(){
        $sql="Select * from tbl_user where isblock=1 and is_admin=0 ";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

     public function AllReq(){
        $sql="Select * from tbl_user";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

     public function CP($adminid,$newpass,$oldpass){
         $sql = "SELECT `password` FROM tbl_user WHERE user_id ='$adminid'";
         $result = $this->conn->query($sql);
         if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
             $old_table_pass = $row['password']; 
            if($old_table_pass == $oldpass) {
                $sql= "UPDATE tbl_user SET `password`='$newpass'";
                if ($this->conn->query($sql) === TRUE) {
                                return 1;
                            } else {
                                return 0;
                            }
            }
        }
        } else {
        echo "0 results";
        }
     }

     public function RideStatus($id){
        $sql = "SELECT `status` FROM tbl_ride WHERE ride_id ='$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rs= $row['status']; 
           if($rs == 1) {
               $sql= "UPDATE tbl_ride SET `status`=2  WHERE ride_id ='$id'" ;
               if ($this->conn->query($sql) === TRUE) {
                               return 1;
                           } else {
                               return 0;
                           }
           }
       }
       } else {
       echo "0 results";
       }
    }

    public function RejectStatus($id){
               $sql= "UPDATE tbl_ride SET `status`=0  WHERE ride_id ='$id'" ;
               if ($this->conn->query($sql) === TRUE) {
                               return 1;
                           } else {
                               return 0;
                           }
           }

     

    public function RequestStatus($id){
        $sql = "SELECT `isblock` FROM tbl_user WHERE user_id ='$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rs= $row['isblock']; 
           if($rs == 0) {
               $sql= "UPDATE tbl_user SET `isblock`=1  WHERE user_id ='$id'"; ;
               if ($this->conn->query($sql) === TRUE) {
                               return 1;
                           } else {
                               return 0;
                           }
           }
       }
       } else {
       echo "0 results";
       }
    }

    public function RejectRequestStatus($id){
            $sql= "UPDATE tbl_user SET `isblock`=0  WHERE user_id ='$id'"; ;
            if ($this->conn->query($sql) === TRUE) {
                return 1;
            } else {
                return 0;
            }
}

        public function UpdateInfo($id){
                 $sql="Select * from tbl_user where user_id='$id'";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
             }

         public function update($id,$mob,$name){
            $sql= "UPDATE `tbl_user` SET `name`='$name' ,`mobile`='$mob' WHERE `user_id` ='$id'"; ;
               if ($this->conn->query($sql) === true) {
                               return 1;
                           } else {
                               return "Error updating record: " . $this->conn->error;
                           }
         }

         public function CPass($id,$newpass,$oldpass){
            $sql = "SELECT `password` FROM tbl_user WHERE user_id ='$id'";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
           // output data of each row
            while($row = $result->fetch_assoc()) {
                $old_table_pass = $row['password']; 
               if($old_table_pass == $oldpass) {
                   $sql= "UPDATE tbl_user SET `password`='$newpass'";
                   if ($this->conn->query($sql) === TRUE) {
                                   return 1;
                               } else {
                                   return 0;
                               }
               }
           }
           } else {
           echo "0 results";
           }
        }

   public function sbl(){
     $sql="Select * from tbl_location ORDER BY name";
                $result = $this->conn->query($sql);
                if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);

                }

   }

    public function sbd(){
     $sql="Select * from tbl_location ORDER BY distance";
                $result = $this->conn->query($sql);
                if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);

                }

   }

   public function sbn(){
    $sql="Select * from tbl_user  ORDER BY name";
             $result = $this->conn->query($sql);
             if($result->num_rows>0) {
                while($rows=$result->fetch_assoc()){
                    $this->rows[]=$rows;
                }
               return json_encode($this->rows);

             }
 }

    public function sbdos(){
          $sql="Select * from tbl_user   ORDER BY dateofsignup DESC";
             $result = $this->conn->query($sql);
             if($result->num_rows>0) {
                while($rows=$result->fetch_assoc()){
                    $this->rows[]=$rows;
                }
               return json_encode($this->rows);

             }
       }



       public function sbdatedesc(){
        $sql="Select * from tbl_ride ORDER BY ride_date DESC";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }
    
       public function sbctype(){
        $sql="Select * from tbl_ride ORDER BY cabtype";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }
     public function sbtd(){
        $sql="Select * from tbl_ride ORDER BY total_distance";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

     public function sbfare(){
        $sql="Select * from tbl_ride ORDER BY total_fare";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }




     public function sbdatedesc2($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status!=0 ORDER BY ride_date DESC ";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }
     
     public function sbtd2($id){
        $sql="Select * from tbl_ride  where customer_user_id='$id' and status!=0 ORDER BY total_distance";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }



     public function sbctype2($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status!=0 ORDER BY cabtype ";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

     public function sbfare2($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status!=0 ORDER BY total_fare";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }



      public function sbfare3($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status!=0 ORDER BY total_fare DESC";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }


     public function psbdatedesc2($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status=1 ORDER BY ride_date DESC ";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }
     
     public function psbtd2($id){
        $sql="Select * from tbl_ride  where customer_user_id='$id' and status=1 ORDER BY total_distance";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }



     public function psbctype2($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status=1 ORDER BY cabtype ";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

     public function psbfare2($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status=1 ORDER BY total_fare";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

      public function psbfare3($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status=1 ORDER BY total_fare DESC";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }


     public function ppsbdatedesc(){
        $sql="Select * from tbl_ride where status=1 ORDER BY ride_date DESC ";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }
     
     public function ppsbtd(){
        $sql="Select * from tbl_ride  where  ORDER BY total_distance";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }



     public function ppsbctype(){
        $sql="Select * from tbl_ride  ORDER BY cabtype ";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

     public function ppsbfare($id){
        $sql="Select * from tbl_ride  ORDER BY total_fare";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }


     public function csbdatedesc2($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status=2 ORDER BY ride_date DESC ";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }
     
     public function csbtd2($id){
        $sql="Select * from tbl_ride  where customer_user_id='$id' and status=2 ORDER BY total_distance";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }



     public function csbctype2($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status=2 ORDER BY cabtype ";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

     public function csbfare2($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status=2 ORDER BY total_fare";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }

      public function csbfare3($id){
        $sql="Select * from tbl_ride where customer_user_id='$id' and status=2 ORDER BY total_fare DESC";
                 $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
                    while($rows=$result->fetch_assoc()){
                        $this->rows[]=$rows;
                    }
                   return json_encode($this->rows);
   
                 }
     }


     public function week($id){
        $sql="select * from tbl_ride where `ride_date`>DATE_SUB(NOW(),INTERVAL 7 DAY) ORDER BY  `ride_date` and  customer_user_id='$id' and  `status`=1";
        $result = $this->conn->query($sql);
        if($result->num_rows>0) {
           while($rows=$result->fetch_assoc()){
               $this->rows[]=$rows;
           }
          return json_encode($this->rows);
        }
     }


     public function month($id){
        $sql="select * from tbl_ride where `ride_date`>DATE_SUB(NOW(),INTERVAL 30 DAY) ORDER BY  `ride_date` and  customer_user_id='$id' and  `status`=1";
        $result = $this->conn->query($sql);
        if($result->num_rows>0) {
           while($rows=$result->fetch_assoc()){
               $this->rows[]=$rows;
           }
          return json_encode($this->rows);

        }
     }


     public function allweek(){
        $sql="select * from tbl_ride where `ride_date`>DATE_SUB(NOW(),INTERVAL 7 DAY) ORDER BY  `ride_date`";
        $result = $this->conn->query($sql);
        if($result->num_rows>0) {
           while($rows=$result->fetch_assoc()){
               $this->rows[]=$rows;
           }
          return json_encode($this->rows);
        }
     }


     public function allmonth(){
        $sql="select * from tbl_ride where `ride_date`>DATE_SUB(NOW(),INTERVAL 30 DAY) ORDER BY  `ride_date`";
        $result = $this->conn->query($sql);
        if($result->num_rows>0) {
           while($rows=$result->fetch_assoc()){
               $this->rows[]=$rows;
           }
          return json_encode($this->rows);

        }
     }
     
     public function cost2($id){
        $sql="Select `total_fare` from tbl_ride where status=2 and customer_user_id='$id'";
        $result = $this->conn->query($sql);
        if($result->num_rows>0) {
           while($rows=$result->fetch_assoc()){
            $this->total=$this->total+$rows['total_fare'];
           }
        }
        return $this->total;
     }  
     public function receipt($id){
            $sql="Select * from tbl_ride where ride_id='$id' and status=2";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
        }

        public function deluser($id){
            $sql="Delete  from `tbl_user` where user_id='$id' and is_admin=0";
            if ($this->conn->query($sql) === TRUE) {
                return 1;
            } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }
        }

        public function psbdatedesc(){
            $sql="Select * from tbl_ride  ORDER BY ride_date DESC where `status`=1";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }
        
           public function psbctype(){
            $sql="Select * from tbl_ride where `status`=1 ORDER BY cabtype";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }
         public function psbtd(){
            $sql="SELECT * FROM tbl_ride where status=1 ORDER BY total_distance DESC ";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }
    
         public function psbfare(){
            $sql="Select * from tbl_ride where `status`=1 ORDER BY total_fare DESC";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }

         public function csbdatedesc(){
            $sql="Select * from tbl_ride where `status`=2 ORDER BY ride_date DESC";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }
        
           public function csbctype(){
            $sql="Select * from tbl_ride where `status`=2 ORDER BY cabtype";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }
         public function csbtd(){
            $sql="Select * from tbl_ride where `status`=2 ORDER BY total_distance";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }
    
         public function csbfare(){
            $sql="Select * from tbl_ride where `status`=2 ORDER BY total_fare";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }

         public function cansbdatedesc(){
            $sql="Select * from tbl_ride where `status`=0 ORDER BY ride_date DESC";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }
        
           public function cansbctype(){
            $sql="Select * from tbl_ride where `status`=0 ORDER BY cabtype";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }
         public function cansbtd(){
            $sql="Select * from tbl_ride where `status`=0 ORDER BY total_distance";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }
    
         public function cansbfare(){
            $sql="Select * from tbl_ride where `status`=0 ORDER BY total_fare";
                     $result = $this->conn->query($sql);
                     if($result->num_rows>0) {
                        while($rows=$result->fetch_assoc()){
                            $this->rows[]=$rows;
                        }
                       return json_encode($this->rows);
       
                     }
         }



   }
?>  
