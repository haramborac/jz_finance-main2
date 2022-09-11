<?php ob_start() ?>
<?php
    session_start();

    if(!isset($_SESSION['UNAME'])){
        header('location:Login.php');
        die();
    }
?>

<style>
    <?php include 'CSS/style.css;' ?>
</style>
<script>
        <?php include_once 'JS/data.js'; ?>
    <?php include_once 'JS/app.js'; ?>
</script>
<?php include "db.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <!-- <link rel="shortcut icon" href="IMG/logo.png"> -->
    <script src="JS/app.js"></script>
    <title>Chatspeak Lending</title>
</head>
<header>
    <div class="fullContent">
        <nav>

            <?php
                $username1 = $_SESSION['UNAME'];
                $branch1 = mysqli_query($connection,"select branch from insert_cssaccount where username = '$username1'");

                    while($rb1= mysqli_fetch_assoc($branch1)){
                        $bnm = $rb1['branch'];
                        if($bnm == "tandangsora"){
                            $bname = 'Tandang Sora' ;
                        }
                        elseif($bnm == "meycauayan"){
                            $bname = 'Meycauayan'  ;
                        }
                        elseif($bnm == "stamaria"){
                            $bname = 'Sta. Maria' ;
                        }
                        elseif($bnm == "all"){
                            $bname = "All Branches";
                        }
                    }
            ?>
            <i style="display: inline-flex; color:blue;"><h1><?php echo $bname?></h1></i>
            <ul id="navSelection" class="navSelection">
                <li class="navSel"><a class="a" href="dashboard.php"><i class="fa fa-chart-line"></i><p>Dashboard</p></a></li>
                <?php if($bnm != 'all'){
                echo " <li class='navSel'><a class='a' href='addclient.php'><i class='fa fa-plus-circle'></i><p>Add Client</p></a></li>";
                    }?>
                <li class="navSel"><a class="a" href="records.php"><i class="fa fa-folder"></i><p>Records</p></a></li>
                <li class="navSel"><a class="a" href="ca.php"><i class="fa fa-print"></i><p>Weekly Collection</p></a></li>
                <li class="navSel"><a class="a" href="data.php"><i class="fa fa-database"></i><p>Client Data</p></a></li>
                <?php if($bnm == 'all'){
                echo "<li class='navSel'><a class='a' href='settings.php'><i class='fa fa-gears'></i><p>Settings</p></a></li>";
                    }?>

            </ul>
            <div class="accountOpen" style="margin-top: -15px;">
                <span id="accPosition" style="font-size: 12px; margin-right: 5px;"></span><span id="accountName" style="font-size: 12px; text-transform: capitalize;"><?php echo $_SESSION['UNAME'];?></span><br>
                <a href="cssLogout.php"><button id='btnLogOut'>Logout</button></a>
            </div>
        </nav>
    </div>
    <script type="text/javascript">
        const currentlocation = location.href;
        const menuitem = document.getElementsByClassName('a');
        const li = document.querySelectorAll('li');
        const menulength = menuitem.length;
        const navHome = document.getElementById("navHome");
        
        for(let i = 0; i < menuitem.length; i++){
            if(menuitem[i].href === currentlocation){
                li[i].className = "active";
            }
        }
    </script>
    <script>
        var adminAccount    = document.getElementById("accountName");
        var accPosition     = document.getElementById("accPosition");

        if(adminAccount.innerHTML == "Chatspeak Admin"){
            accPosition.style.display = "none";
        }

    </script>
</header>

        <?php 
            if($bnm == "all"){
                $show_table = "SELECT * FROM insert_client  ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
                $show_profile = "SELECT * FROM insert_client ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
            }else{
                $show_table = "SELECT * FROM insert_client WHERE cbranch = '$bnm' ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
                $show_profile = "SELECT * FROM insert_client where cbranch = '$bnm' ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
            }
            $show_table_query = mysqli_query($connection, $show_table);


            while($row = mysqli_fetch_assoc($show_table_query)){

                $maturity_date1 = $row['cmaturitydate'];
                $status = $row['cloanstatus'];
                $crid = $row['clientid'];
                $cycle = $row['ccycle'];
                // echo "<script>console.log('$crid $cycle')</script>";
                $crd = date_create($row['creleaseddate']);
                $cmd = date_create($row['cmaturitydate']);
                $cla = $row['cloanamount'];
                $cap = $row['camountpaid'];
                $date1 = date_format($crd,"Y-m-d");
                $date2 = date("Y-m-d");
                $m = date_format($cmd,"Y-m-d");
    
                $date1_1 = date_create($date1);
                $date2_2 = date_create($date2);
    
                $diff = date_diff($date1_1,$date2_2);
                $dif = $diff->format("%a");
    

                $camtpd = mysqli_query($connection,"select sum(payment) as spay, sum(secdep) ssav from insert_payment where clientid = '$crid' and ipcycle = $cycle group by ipcycle");
                while($camtpdr = mysqli_fetch_assoc($camtpd)){
                    $camtpdresult = $camtpdr['spay']; // CAMOUNTPAID
                    $secdepresult = $camtpdr['ssav']; // TOTAL ADDED SAVINGS + SECDEP FROM DEDUCTION 
                }
                $cbal = $row['cloanamount']-$camtpdresult; // CBALANCE

                if(($dif*($cla/100))-$cap<0){
                    $rod = 0;
                }else{
                    $rod = abs(($dif*($cla/100))-$cap);
                }
                if($status=="Finished"||$status=="Pending"){
                    $update = "UPDATE insert_client set cbalance = 0, coverdue = 0 where clientid ='$crid'";
                }elseif($status=="OnGoing"||$status=="Released"){
                    $update = "UPDATE insert_client set camountpaid = $camtpdresult, csecdep = $secdepresult, cbalance = $cbal, coverdue = $rod where clientid ='$crid'";
                }

                    mysqli_query($connection,$update);
                // echo '<script>console.log("'.$rod.'")</script>';
            }
        ?>