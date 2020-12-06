<?php
include_once 'config.php';
class ride{
    public $arr=array();
    public $output;
    public $count;
    public $total=0;
   
    public function __construct(){
       
        $con=new con(); 
        $this->conn=$con->connect();
    }
    
    public function insertdata($from,$to,$distance,$luggage, $fare, $status,$cabtype, $id){
        $sql = "INSERT INTO tbl_ride(`ride_date`,`From`,`To`,`cabtype`,`total_distance`,`luggage`,`total_fare`,`status`,`customer_user_id`)
        VALUES(NOW(),'$from','$to','$cabtype','$distance','$luggage','$fare','$status','$id' )";
         
         if ($this->conn->query($sql) === TRUE) {
            echo '<script>alert("Your request is processing")</script>';
            $output = "Inserted";
          } else {
            $output =  "Error: " . $sql . "<br>" . $this->conn->error;
          }
          return $output;
        }

    public function showdata(){
                $sql="Select * from tbl_ride";
                $result = $this->conn->query($sql);
                // $output='<table>';
                // $output.= '<tr><th>Ride_Date</th><th>From</th><th>To</th><th>Total_distance</th><th>Fare</th></tr>';
                if($result->num_rows>0) {
                while($rows=$result->fetch_assoc()){
                    $date=$rows['ride_date'];
                    $from=$rows['From'];
                    $to=$rows['To'];
                    $distance=$rows['total_distance'];
                    $fare=$rows['total_fare'];
                // array_push($this->arr,$date,$from,$to,$distance,$fare);  
               $output.='<tr><td>'.$date.'</td><td>'.$from.'</td><td>'.$to.'</td>
                <td>'.$distance.'</td><td>'.$fare.'</td></tr>';
                }
                }
                $output.='</table>';
                return $output;
    }
     public function pending(){
    $sql="Select * from tbl_ride where status=1";
    $result = $this->conn->query($sql);
    if($result->num_rows>0) {
       while($rows=$result->fetch_assoc()){
           $this->count=$result->num_rows;
       }
    }
    return $this->count;
  }

  public function completed(){
    $sql="Select * from tbl_ride where status=2";
             $result = $this->conn->query($sql);
             if($result->num_rows>0) {
              while($rows=$result->fetch_assoc()){
                  $this->count=$result->num_rows;
              }
           }
           return $this->count;
         }

    
  public function cancelled(){
  $sql="Select * from tbl_ride where status=0";
            $result = $this->conn->query($sql);
            if($result->num_rows>0) {
            while($rows=$result->fetch_assoc()){
                $this->count=$result->num_rows;
            }
          }
          return $this->count;
        }

      public function AllRide(){
        $sql="Select * from tbl_ride";
                  $result = $this->conn->query($sql);
                 if($result->num_rows>0) {
            while($rows=$result->fetch_assoc()){
                $this->count=$result->num_rows;
            }
          }
          return $this->count;
        }
        
      public function cost(){
        $sql="Select * from tbl_ride where status=2";
          $result = $this->conn->query($sql);
          if($result->num_rows>0) {
             while($rows=$result->fetch_assoc()){
               $this->total=$this->total+$rows['total_fare'];
             }
          }
          return $this->total;
       }  

}

?>