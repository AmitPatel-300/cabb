<?php
session_start();
include_once '../location.php';
$locate=new location();
$action= $_POST['name'];  
$id =  $_SESSION['UN']['user_id'];	

switch($action) {
    case 'PenRide':
        $data=$locate->pendingUserRide($id);
        print_r($data);
        break; 
    
    case 'ComRide':
        $data=$locate->completedUserRide($id);
        print_r($data);
        break;

    case 'AllRide':
        $data=$locate->AllUserRide($id);
        print_r($data);
        break;

    case 'cancelride':
    $ID=$_POST['RId'];
    $data=$locate->cancelride($ID);
    echo $data;
    break;


    case 'UpdateInfo':
        $data=$locate->UpdateInfo($id);
        print_r($data);
         break;

    case 'update':
        $name=$_POST['Name'];
        $mob=$_POST['MOB'];
        $data=$locate->update($id,$mob,$name);
        print_r($data);
            break;

    case 'CPass':
        $newpass=md5($_POST['NEWPASS']);
        $oldpass=md5($_POST['OLDPASS']);
        $data=$locate->CPass($id,$newpass,$oldpass);
        echo $data;
        break;

    case 'sbdatedesc2':
        $data=$locate->sbdatedesc2($id);
        echo $data;
        break;

    case 'sbctype2':
        $data=$locate->sbctype2($id);
        echo $data;
         break;


    case 'sbtd2':
        $data=$locate->sbtd2($id);
        echo $data;
        break;

    case 'sbfare2':
        $data=$locate->sbfare2($id);
        echo $data;
        break;

     case 'sbfare3':
    $data=$locate->sbfare3($id);
    echo $data;
    break;
        
    case 'psbdatedesc2':
        $data=$locate->psbdatedesc2($id);
        echo $data;
        break;

    case 'psbctype2':
        $data=$locate->psbctype2($id);
        echo $data;
        break;


    case 'psbtd2':
        $data=$locate->psbtd2($id);
        echo $data;
        break;

    case 'psbfare2':
        $data=$locate->psbfare2($id);
        echo $data;
        break;

    case 'psbfare3':
        $data=$locate->psbfare3($id);
        echo $data;
        break;
        
    case 'csbdatedesc2':
        $data=$locate->csbdatedesc2($id);
        echo $data;
        break;

    case 'csbctype2':
        $data=$locate->csbctype2($id);
        echo $data;
        break;


    case 'csbtd2':
        $data=$locate->csbtd2($id);
        echo $data;
        break;

    case 'csbfare2':
        $data=$locate->csbfare2($id);
        echo $data;
        break;

    case 'csbfare3':
       $data=$locate->csbfare3($id);
       echo $data;
       break;   
        
    case 'week':
        $data=$locate->week($id);
        echo $data;
        break;
        
    case 'month':
        $data=$locate->month($id);
        echo $data;
        break;    
    
    case 'pweek':
        $data=$locate->pweek($id);
        echo $data;
        break;
        
    case 'pmonth':
        $data=$locate->pmonth($id);
        echo $data;
        break;    
    
    

}
?>