<?php include "db.php";

if (isset($_POST['addClientBtn'])){
    $acbranch               =   $_POST['acbranch'];
    $clientImage            =   $_FILES['clientDP']['name'];
    $clAccountID            =   $_POST['AccountID'];
    $clFirstName            =   $_POST['firstName'];
    $clMidName              =   $_POST['middleName'];
    $clLastName             =   $_POST['lastName'];
    $clSuffix               =   $_POST['suffix'];
    $clcHousenum            =   $_POST['houseNo'];
    $clcStreet              =   $_POST['street'];
    $clcBarangay            =   $_POST['barangay'];
    $clcCity                =   $_POST['city'];
    $clContact              =   $_POST['contact'];
    $clEmail                =   $_POST['email'];
    $clAge                  =   $_POST['age'];
    $clGender               =   $_POST['gender'];
    $clBday                 =   $_POST['birthday'];
    $clHousenum             =   $_POST['houseNo2'];
    $clStreet               =   $_POST['street2'];
    $clBarangay             =   $_POST['barangay2'];
    $clCity                 =   $_POST['city2'];
    $clHome                 =   $_POST['clientHomeInfo'];
    $clOther                =   $_POST['adOthers'];
    $clNationality          =   $_POST['nationality'];
    $clCivilStatus          =   $_POST['clientCivil'];
    $clSpouse               =   $_POST['ifMarried'];
    $clChildren             =   $_POST['child'];
    $clCoMaker              =   $_POST['coMaker'];
    $clCMContact            =   $_POST['coContact'];
    $clInterest             =   $_POST['int'];
    $clAgree                =   $_POST['cdAgreeTerms'];
    $fileSize   = 10000000;
    $fileAllowed = array('image/jpg', 'image/jpeg', 'image/png', 'image/webp');

    $cmContact              =   $_POST['coContact'];
    $cmAddress              =   $_POST['cmAddress'];
    $cmGender               =   $_POST['cmGender'];
    $cmAge                  =   $_POST['cmAge'];
    $cmBday                 =   $_POST['cmBday'];
    $cmProfession           =   $_POST['cmProfession'];
    $cmNationality          =   $_POST['cmNationality'];
    $cmCivilStatus          =   $_POST['cmCivilStatus'];
    $cmBusiness             =   $_POST['cmBusiness'];

    $clValid01          = $_FILES['idValid01']['name'];
    $clIdType01         = $_POST['ValidID01'];
    $clIdNo01           = $_POST['idNos1'];
    $clValid02          = $_FILES['idValid02']['name'];
    $clIdType02         = $_POST['ValidID02'];
    $clIdNo02           = $_POST['idNos2'];
    $IDFolder01         = 'clientid/' . $clValid01;
    $IDFolder02         = 'clientid/' . $clValid02;

    // if (empty($clFirstName) || empty($clLastName) || empty($clContact) || 
    //     empty($clcHousenum)  ||  empty($clcStreet)  ||   empty($clcBarangay)   ||  empty($clcCity)  ||
    //     empty($clAge) || empty($clGender) || empty($clCoMaker) || empty($clCMContact) ||
    //     empty($cmAddress) || empty($cmBusiness)) 
    //     {
    //     header ("location:addclient.php?add=filloutemptyspace");
    //     exit ();
    // }else
    // if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM insert_client WHERE ccontact = '$clContact'"))>0){
    //     header ("location:addclient.php?add=contactexist");
    //     exit ();
    // }elseif (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM insert_client WHERE ccomaker = '$clCoMaker'"))>0){
    //     header ("location:addclient.php?add=comakerexist");
    //     exit ();
    // }else{
        // if ($_FILES['clientDP']['size']>=$fileSize){
        //     header ("location:.addclient.php?add=highfile");
        //     exit ();
        // }
        // elseif ($_FILES['clientDP']['size']==0){
        //     header ("location:addclient.php?add=emptyimage");
        //     exit ();
        // }
        // elseif (!in_array($_FILES['clientDP']['type'], $fileAllowed)){
        //     header ("location:addclient.php?add=imagefileonly");
        //     exit ();
        // }
        // else{
            // $target01     =   '2x2pics/' . $clientImage;
            // $target02     =   'clientid/' . $clValid01;
            // $target03     =   'clientid/' . $clValid02;
            // if(move_uploaded_file($_FILES['clientDP']['tmp_name'], $target01)){
                $sql01 = "INSERT INTO insert_client 
                (cbranch, clientid, cfirstname, cmidname, clastname, csuffix, 
                cchnumber, ccstreet, ccbarangay, cccity, ccontact, cemail, cage, 
                cgender, cbirthday, chnumber, cstreet, cbarangay, ccity, chome, cother,
                cnationality, ccivilstatus, cspouse, cchildren, ccomaker, cccontact, cinterest, clisteddate) 
                VALUES ('$acbranch', '$clAccountID', '$clFirstName', '$clMidName', '$clLastName', '$clSuffix',              
                '$clcHousenum', '$clcStreet', '$clcBarangay', '$clcCity', '$clContact', '$clEmail',               
                '$clAge', '$clGender', '$clBday', '$clHousenum', '$clStreet', '$clBarangay', '$clCity', '$clHome', '$clOther',               
                '$clNationality', '$clCivilStatus', '$clSpouse', '$clChildren', '$clCoMaker', '$clCMContact', $clInterest, now())";
                
                $sql02 = "INSERT INTO  insert_comaker 
                (clientid, cmcontact, cmaddress, cmgender, cmage, cmbday, cmprofession, cmnationality, cmcivil, cmbusiness) 
                VALUES ('$clAccountID', '$cmContact','$cmAddress','$cmGender','$cmAge','$cmBday','$cmProfession','$cmNationality','$cmCivilStatus','$cmBusiness')";

                // if(move_uploaded_file($_FILES['idValid01']['tmp_name'], $target02) || move_uploaded_file($_FILES['idValid02']['tmp_name'], $target03)){
                    $sql03 = "INSERT INTO insert_id (clientid, clidtype1, clidcode1, clidtype2, clidcode2) 
                    VALUES ('$clAccountID', '$clIdType01', '$clIdNo01', '$clIdType02', '$clIdNo02')";
                
                    if(isset($_POST['cdAgreeTerms'])) {
                        mysqli_query($connection, $sql01);
                        mysqli_query($connection, $sql02);
                        mysqli_query($connection, $sql03);
                        header ("location:addclient.php?add=success");
                        exit ();
                    }else{
                        header ("location:addclient.php?add=notagree");
                        exit ();
                    }
                // }else{
                //     header ("location:addclient.php?add=failedtocompile");
                //     exit ();
                // }    
            // }else{
            //     header ("location:addclient.php?add=failedtoupload");
            //     exit ();
            // }
        // }
    // }
}
?>