<?php
    include "db.php";
    if(isset($_POST['payment'])){
        $id = $_POST['checkid'];
        $bnm = $_POST['bnm'];
        $clientid = $_POST['clientid'];
        $area = $_POST['checkarea'];
        $payment = $_POST['amount'];
        $checkca = $_POST['creditanalyst'];
        $savings = $_POST['savings'];
        $checkdays = $_POST['checkdays'];
        $checkcycle = $_POST['checkcycle'];
        $checkbalance = $_POST['checkbalance'];
        $comment = $_POST['payComment'];
        $checkstatus = $_POST['checkstatus'];
        $finished = $checkbalance - $payment;


        //FROM RELEASED TO ONGOING
        if($checkstatus == "Released"){
            if($finished <= 0){
                echo "finished normal pay same day";
                $balance = "UPDATE insert_client SET 
                csecdep = csecdep + $savings, 
                paydate=now(), 
                cmaturitydate = NULL, 
                cloanstatus = 'Finished' 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm','$clientid', '$area', '$checkca', now(), $checkdays+1, $payment, $savings, '$comment', $checkcycle)";
            }else{
                echo "first payment after being released";
                $balance = "UPDATE insert_client SET 
                csecdep = csecdep + $savings, 
                paydate=now(), 
                cloanstatus = 'OnGoing' 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays+1, $payment, $savings, '$comment', $checkcycle)";
            }
        }
        //NORMAL PAYMENT
        if($checkstatus == 'OnGoing'){
            if($finished <= 0){
                echo "finished normal payment";
                $balance = "UPDATE insert_client SET 
                csecdep = csecdep+$savings,
                paydate=now(), 
                cmaturitydate = NULL, 
                cloanstatus = 'Finished' 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays, $payment, $savings, '$comment', $checkcycle)";
            }else{
                echo " normal payment";
                $balance = "UPDATE insert_client SET 
                csecdep = csecdep + $savings, 
                paydate=now() 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);

                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays, $payment, $savings, '$comment', $checkcycle)";
            }
            
        }
    mysqli_query($connection, $payment_history);
    header('location:records.php');
    }
?>