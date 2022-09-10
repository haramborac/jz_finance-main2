<?php 

include "db.php";
if(isset($_POST['udpateclient'])){
    
    $editid = $_POST['editid'];
    $editclientid = $_POST['editclientid'];
    $editloan = $_POST['approvedloan'];
    $editca = $_POST['caName'];
    $editcycle = $_POST['editcycle'];
    $editinterest = $_POST['editinterest'];
    $editstatus = $_POST['userStatus'];
    $checkbalance = $_POST['checkbalance'];
    // $checksavings = $_POST['checksavings'];

    if($checkbalance >= 0){
        echo " edit info but no loan updates";
        $edit_client = "UPDATE insert_client SET ";
        $edit_client .= "ccreditanalyst = '$editca', ";
        $edit_client .= "ccycle = $editcycle, ";
        $edit_client .= "cloanstatus = '$editstatus' ";          
        $edit_client .= "WHERE id = '$editid' ";
        mysqli_query($connection, $edit_client);
        header('location:Records.php');

        }
        if($editstatus == 'Pending' && $editloan == 0){
            echo " new client/new cycle edit for approval";
            $edit_client = "UPDATE insert_client SET ";
            $edit_client .= "cloanamount = 0, ";
            $edit_client .= "ccreditanalyst = '$editca', ";
            $edit_client .= "ccycle = $editcycle, ";
            $edit_client .= "cloanstatus = '$editstatus', ";
            $edit_client .= "camountpaid = 0, ";
            $edit_client .= "cbalance = 0, ";
            $edit_client .= "cadvance = 0, ";
            $edit_client .= "coverdue = 0, ";
            $edit_client .= "csecdep = 0, ";
            $edit_client .= "cmaturitydate = NULL ";
            $edit_client .= "WHERE id = '$editid' ";
            mysqli_query($connection, $edit_client);
            header('location:Records.php');
            
        }
        if($editloan > 0 && $checkbalance == 0){
            echo " client approved/update approved loan";
            $edit_client = "UPDATE insert_client SET ";
            $edit_client .= "cloanamount = $editloan, ";
            $edit_client .= "ccreditanalyst = '$editca', ";
            $edit_client .= "ccycle = $editcycle, ";
            $edit_client .= "cloanstatus = 'Released', ";
            $edit_client .= "cloanamount = $editloan,";
            $edit_client .= "cbalance = $editloan, ";
            $edit_client .= "camountpaid = 0, ";
            $edit_client .= "coverdue = 0, ";
            $edit_client .= "csecdep = 0, ";
            $edit_client .= "cadvance = 0, ";
            $edit_client .= "creleaseddate = CURDATE(), ";
            $edit_client .= "cmaturitydate = CURDATE() + INTERVAL 101 DAY, ";
            $edit_client .= "cinterest = $editinterest ";
            $edit_client .= "WHERE id = '$editid' ";
            mysqli_query($connection, $edit_client);

            $payment_history = "INSERT INTO insert_payment 
            (clientid, creditanalyst, date_paid, payment, secdep, comment, ipcycle)
            VALUES ('$editclientid', '$editca', now(), 0, 0, 'NEW LOAN - CYCLE $editcycle',$editcycle)";
            mysqli_query($connection, $payment_history);
            header('location:Records.php');
        
            
        }
        if($editstatus == 'Cancelled' || $editstatus == 'Blacklisted' || $editstatus == 'Terminated'){
            echo " client approved/update approved loan";
            $edit_client = "UPDATE insert_client SET ";
            $edit_client .= "cmaturitydate = NULL ";
            $edit_client .= "WHERE id = '$editid' ";
            mysqli_query($connection, $edit_client);
            header('location:Records.php');  
        }
    }
    
?>