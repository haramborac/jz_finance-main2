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
            <div>
                <a id="jzlogo" href="Home.php"></a>
            </div>
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
                <li class="navSel"><a class="a" href="Dashboard.php"><i class="fa fa-chart-line"></i><p>Dashboard</p></a></li>
                <li class="navSel"><a class="a" href="AddClient.php"><i class="fa fa-plus-circle"></i><p>Add Client</p></a></li>
                <li class="navSel"><a class="a" href="Records.php"><i class="fa fa-folder"></i><p>Records</p></a></li>
                <li class="navSel"><a class="a" href="Data.php"><i class="fa fa-database"></i><p>Data</p></a></li>
                <li class="navSel"><a class="a" href="Settings.php"><i class="fa fa-gears"></i><p>Settings</p></a></li>
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