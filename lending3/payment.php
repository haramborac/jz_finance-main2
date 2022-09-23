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
        $checkdate = $_POST['checkdate'];
        $checkdays = $_POST['checkdays'];
        $checkcycle = $_POST['checkcycle'];
        $checkbalance = $_POST['checkbalance'];
        date_default_timezone_set('Asia/Manila');
        $now = date('y-m-d');
        $overdue = $_POST['overdue'];
        $comment = $_POST['payComment'];
        $checkstatus = $_POST['checkstatus'];
        $new_overdue = $overdue - $payment;
        $finished = $checkbalance - $payment;


        //FROM RELEASED TO ONGOING
        if($checkstatus == "Released"){
            if($finished <= 0){
                //echo "finished normal pay same day";
                $balance = "UPDATE insert_client SET 
                cbalance = 0, 
                camountpaid = camountpaid+$payment, 
                cadvance = cadvance + $payment, 
                csecdep = csecdep + $savings, 
                paydate=now(), 
                cmaturitydate = NULL, 
                cloanstatus = 'Finished' 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm','$clientid', '$area', '$checkca', now(), $checkdays+1, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }else{
                //echo "first payment after being released";
                $balance = "UPDATE insert_client SET 
                cbalance = cbalance - $payment, 
                camountpaid = camountpaid + $payment, 
                cadvance = cadvance + $payment, 
                csecdep = csecdep + $savings, 
                paydate=now(), 
                cloanstatus = 'OnGoing' 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays+1, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }
            
        }
        //NORMAL PAYMENT SAME DAY
        if($checkstatus == 'OnGoing' && $checkdate == $now && $overdue == 0){
            if($finished <= 0){
                //echo "finished normal pay same day";
                $balance = "UPDATE insert_client SET 
                cbalance = 0, 
                camountpaid = camountpaid + $payment, 
                cadvance = cadvance+$payment, 
                csecdep = csecdep+$savings,
                paydate=now(), 
                cmaturitydate = NULL, 
                cloanstatus = 'Finished' 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }else{
                //echo " normal payment but same day";
                $balance = "UPDATE insert_client SET 
                cbalance = cbalance - $payment, 
                camountpaid = camountpaid + $payment, 
                cadvance = cadvance + $payment,
                csecdep = csecdep + $savings, 
                paydate=now() 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);

                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }
            
        }
        //NORMAL PAY NOT SAME DAY
        if($checkstatus == 'OnGoing' && $checkdate !== $now && $overdue == 0){
            if($finished <= 0){
                //echo "finished normal pay not same day";
                $balance = "UPDATE insert_client SET 
                cbalance = 0, 
                camountpaid = camountpaid + $payment, 
                cadvance = cadvance + $payment, 
                csecdep = csecdep + $savings, 
                paydate=now(), 
                cmaturitydate = NULL, 
                cloanstatus = 'Finished' 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays+1, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }else{
                //echo " normal payment but not same day";
                $balance = "UPDATE insert_client SET 
                cbalance = cbalance - $payment, 
                camountpaid = camountpaid + $payment, 
                cadvance = cadvance + $payment, 
                csecdep = csecdep + $savings, 
                paydate=now() 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
    
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays+1, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }
            
        }
        //OVERDUE PAY SAME DAY
        if($overdue > 0 && $checkdate == $now){
            if($finished <= 0){
                //echo "finished with overdue and same day";
                $balance = "UPDATE insert_client SET 
                cbalance = 0, 
                camountpaid = camountpaid + $payment, 
                coverdue = 0, 
                cadvance = cadvance + $payment, 
                csecdep = csecdep + $savings, 
                paydate=now(), 
                cloanstatus = 'Finished' 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }
            if($new_overdue <= 0){
                //echo "WORKING SAME DAY";
                $balance = "UPDATE insert_client SET 
                cbalance = cbalance - $payment, 
                camountpaid = camountpaid + $payment, 
                coverdue = 0, 
                cadvance = cadvance + $payment, 
                csecdep = csecdep + $savings, 
                paydate=now() 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }else{
                //echo "overdue same day";
                $balance = "UPDATE insert_client SET 
                cbalance = cbalance - $payment, 
                camountpaid = camountpaid + $payment, 
                coverdue = coverdue - $payment, 
                cadvance = cadvance + $payment, 
                csecdep = csecdep + $savings, 
                paydate=now() 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }
            
        }
        //OVERDUE PAY NOT SAME DAY
        if($overdue > 0 && $checkdate !== $now){
            if($finished <= 0){
                //echo "finished with overdue but not same day";
                $balance = "UPDATE insert_client SET 
                cbalance = 0, 
                camountpaid = camountpaid + $payment, 
                coverdue = 0, 
                cadvance = cadvance + $payment, 
                csecdep = csecdep + $savings, 
                paydate= now(), 
                cloanstatus = 'Finished'
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays+1, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }
            if($new_overdue <= 0){
                //echo "WORKING NOT SAME DAY";
                $balance = "UPDATE insert_client SET 
                cbalance = cbalance - $payment, 
                camountpaid = camountpaid + $payment, 
                coverdue = 0, 
                cadvance = cadvance + $payment, 
                csecdep = csecdep + $savings, 
                paydate=now() 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays+1, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }else{
                //echo "overdue but not same day";
                $balance = "UPDATE insert_client SET 
                cbalance = cbalance - $payment, 
                camountpaid = camountpaid + $payment, 
                coverdue = coverdue - $payment, 
                cadvance = cadvance + $payment, 
                csecdep = csecdep + $savings, 
                paydate=now() 
                WHERE id = '$id' ";
                mysqli_query($connection, $balance);
                
                $payment_history = "INSERT INTO insert_payment (ipbranch, clientid, area, creditanalyst, date_paid, days, payment, secdep, comment, ipcycle) 
                VALUES ('$bnm', '$clientid', '$area', '$checkca', now(), $checkdays+1, $payment, $savings, '$comment', $checkcycle)";
                mysqli_query($connection, $payment_history);
                //header('location:records.php');
            }
            
        }
header('location:records.php');
    }
?>