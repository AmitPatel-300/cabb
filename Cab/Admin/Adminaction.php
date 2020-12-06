<?php
session_start();
include_once '../location.php';
$locate=new location();
$action= $_POST['name'];  
$adminid=$_SESSION['Admin']['admin_id'];
switch($action) {
    case 'showlocation':
    $data=$locate->showlocation();
    print_r($data);
    break;

    case 'deletelocation':
    $id=$_POST['Id'];
    $data=$locate->deletelocation($id);
    echo $data;
    break;    
    
    case 'addlocation':
        $loc=$_POST['loc'];
        $dis=$_POST['dis'];
        $isa=$_POST['Isa'];
        $data=$locate->addlocation($loc,$dis,$isa);
        echo $data;
        break;

    case 'editlocation':
         $id=$_POST['Id'];
         $data=$locate->editlocation($id);
         print_r($data);
        break;

    
    case 'updatelocation':
        $id=$_POST['Id'];
        $loc=$_POST['uloc'];
        $dis=$_POST['udis'];
        $isa=$_POST['uIsa'];
        $data=$locate->updatelocation($id,$loc,$dis,$isa);
        echo $data;
        break;
        
    case 'PenRide':
        $data=$locate->pending();
        print_r($data);
        break; 
    
    case 'ComRide':
        $data=$locate->completed();
        print_r($data);
        break;
    
    case 'CanRide':
        $data=$locate->cancelled();
        print_r($data);
        break;


    case 'AllRide':
        $data=$locate->AllRide();
        print_r($data);
        break;
    
    case 'PenReq':
        $data=$locate->PenReq();
        print_r($data);
        break;

    case 'AppReq':
        $data=$locate->AppReq();
        print_r($data);
        break;
     
    case 'AllReq':
        $data=$locate->AllReq();
        print_r($data);
        break;   

    case 'deluser':
        $id=$_POST['ID'];
        $data=$locate->deluser($id);
        echo $data;
        break;
        
    case 'ChangePass':
        $newpass=md5($_POST['NEWPASS']);
        $oldpass=md5($_POST['OLDPASS']);
        $data=$locate->CP($adminid,$newpass,$oldpass);
        echo $data;
        break;

    case 'RideStatus':
        $id=$_POST['Id'];
        $data=$locate->RideStatus($id);
        echo $data;
        break;

    case 'RejectStatus':
        $id=$_POST['Id'];
        $data=$locate->RejectStatus($id);
        echo $data;
        break;

    case 'RequestStatus':
        $id=$_POST['Id'];
        $data=$locate->RequestStatus($id);
        echo $data;
        break;

    case 'RejectRequestStatus':
        $id=$_POST['Id'];
        $data=$locate->RejectRequestStatus($id);
        echo $data;
        break;

    case 'sbl':
        $data=$locate->sbl();
        echo $data;
        break;

    case 'sbd':
    $data=$locate->sbd();
    echo $data;
    break;

    case 'sbn':
        $data=$locate->sbn();
        echo $data;
        break;

    case 'sbdos':
        $data=$locate->sbdos();
        echo $data;
        break;

    case 'sbdatedesc':
        $data=$locate->sbdatedesc();
        echo $data;
        break;

    case 'sbctype':
        $data=$locate->sbctype();
        echo $data;
        break;

    case 'sbtd':
        $data=$locate->sbtd();
        echo $data;
        break;

    case 'sbfare':
        $data=$locate->sbfare();
        echo $data;
        break;

    case 'psbdatedesc':
        $data=$locate->psbdatedesc();
        echo $data;
        break;

    case 'psbctype':
        $data=$locate->psbctype();
        echo $data;
        break;

    case 'psbtd':
        $data=$locate->psbtd();
        echo $data;
        break;

    case 'psbfare':
        $data=$locate->psbfare();
        echo $data;
        break;
    

    case 'ppsbdatedesc':
        $data=$locate->ppsbdatedesc();
        echo $data;
        break;

    case 'ppsbctype':
        $data=$locate->ppsbctype();
        echo $data;
        break;

    case 'ppsbtd':
        $data=$locate->ppsbtd();
        echo $data;
        break;

    case 'ppsbfare':
        $data=$locate->ppsbfare();
        echo $data;
        break;

    case 'csbdatedesc':
        $data=$locate->csbdatedesc();
        echo $data;
        break;

    case 'csbctype':
        $data=$locate->csbctype();
        echo $data;
        break;

    case 'csbtd':
        $data=$locate->csbtd();
        echo $data;
        break;

    case 'csbfare':
        $data=$locate->csbfare();
        echo $data;
        break;

    case 'cansbdatedesc':
        $data=$locate->cansbdatedesc();
        echo $data;
        break;

    case 'cansbctype':
        $data=$locate->cansbctype();
        echo $data;
        break;

    case 'cansbtd':
        $data=$locate->cansbtd();
        echo $data;
        break;

    case 'cansbfare':
        $data=$locate->cansbfare();
        echo $data;
        break;
    
    case 'receipt':
        $id=$_POST['ID'];
        $data=$locate->receipt($id);
        echo $data;
        break;   

    case 'allweek':
        $data=$locate->allweek();
        echo $data;
        break;

    case 'allmonth':
        $data=$locate->allmonth();
        echo $data;
        break;   
        
}
?>