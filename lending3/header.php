<?php ob_start() ?>
<?php
    session_start();

    if(!isset($_SESSION['UNAME'])){
        header('location:login.php');
        die();
    }
?>

<style>
    <?php include 'css/style.css;' ?>
</style>

<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/app.js"></script>
    <title>Goyo Lending</title>
    <link rel = "icon" href ="img/gl.jpg" type = "image/x-icon">
</head>
<header>
    <div class="fullContent">
        <nav>

            <?php
                $username1 = $_SESSION['UNAME'];
                $branch1 = mysqli_query($connection,"select branch from insert_cssaccount where username = '$username1'");
                    while($rb1= mysqli_fetch_assoc($branch1)){
                        $bnm = $rb1['branch'];
                        // if($bnm == "Bulacan"){
                        //     $bname = 'Bulacan' ;
                        // }
                        // elseif($bnm == "meycauayan"){
                        //     $bname = 'Quezon City'  ;
                        // }
                        //else
                        if($bnm == "All"){
                            $bname = "All Branches";
                        }else{
                            $bname = $bnm;
                        }
                    }
            ?>
            <i style="display: inline-flex; color:blue;"><h1><?php echo $bname?></h1></i>
            <ul id="navSelection" class="navSelection">
                <li class="navSel"><a class="a" href="dashboard.php"><i class="fa fa-chart-line"></i><p>Dashboard</p></a></li>
                <?php if($bnm != 'All'){
                echo " <li class='navSel'><a class='a' href='addclient.php'><i class='fa fa-plus-circle'></i><p>Add Client</p></a></li>";
                    }?>
                <li class="navSel"><a class="a" href="records.php"><i class="fa fa-folder"></i><p>Records</p></a></li>
                <li class="navSel"><a class="a" href="ca.php"><i class="fa-solid fa-peso-sign"></i><p>Weekly Collection</p></a></li>
                <!-- <li class="navSel"><a class="a" href="data.php"><i class="fa fa-database"></i><p>Client Data</p></a></li> --> 
                <li class="navSel"><a class="a" href="ledger.php"><i class="fa fa-print"></i><p>Ledger</p></a></li>         
                <?php if($bnm == 'All'){
                echo "<li class='navSel'><a class='a' href='settings.php'><i class='fa fa-gears'></i><p>Settings</p></a></li>";
                    }?>  
	    </ul>

<div id="dcanvas" style="    position: absolute;
    display: inline-flex;
    z-index: 1;
    right: 15%;
    top: 2%;
    margin: 0;">
<div id='date' style="display:flex; margin-left: 10%; margin-top: 3%;"></div>
<canvas id="canvas" width="150" height="150">
</canvas>
</div>            <div class="accountOpen" style="margin-top: -15px;">
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
            if($bnm == "All"){
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


                
                if($row['cloantype']=='mbl'){
                    if(($dif*($cla/100))-$cap<0){
                        $rod = 0;
                    }
                    else{
                        $rod = abs(($dif*($cla/100))-$cap);
                    }

                    if($status=="Finished"||$status=="Pending"){
                        $update = "UPDATE insert_client set camountpaid = 0, cbalance = 0, coverdue = 0 where clientid ='$crid'";
                    }
                    elseif($status=="OnGoing"||$status=="Released"){
                        $update = "UPDATE insert_client set camountpaid = $camtpdresult, csecdep = $secdepresult, cbalance = $cbal, coverdue = $rod where clientid ='$crid'";
                    }
                }
                elseif($row['cloantype']=='sbl'){
                    if(($dif*($cla/60))-$cap<0){
                        $rod = 0;
                    }
                    else{
                        $rod = abs(($dif*($cla/60))-$cap);
                    }

                    if($status=="Finished"||$status=="Pending"){
                        $update = "UPDATE insert_client set camountpaid = 0, cbalance = 0, coverdue = 0 where clientid ='$crid'";
                    }
                    elseif($status=="OnGoing"||$status=="Released"){
                        $update = "UPDATE insert_client set camountpaid = $camtpdresult, csecdep = $secdepresult, cbalance = $cbal, coverdue = $rod where clientid ='$crid'";
                    }
                }
                elseif($row['cloantype']=='il'){
                    if(($dif*($cla/20))-$cap<=0){
                        $rod = 0;
                    }
                    else{
                        $rod = abs(($dif*($cla/20))-$cap);
                    }

                    if($status=="Finished"||$status=="Pending"){
                        $update = "UPDATE insert_client set camountpaid = 0, cbalance = 0, coverdue = 0 where clientid ='$crid'";
                    }elseif($status=="OnGoing"||$status=="Released"){
                        $update = "UPDATE insert_client set camountpaid = $camtpdresult, csecdep = $secdepresult, cbalance = $cbal, coverdue = $rod where clientid ='$crid'";
                    }

                }
                elseif($row['cloantype']=='sl'){
                   
                    $rod = abs((($dif+1)*($cla*.015))-$cap);

                    if($status=="Finished"||$status=="Pending"){
                        $update = "UPDATE insert_client set camountpaid = 0, cbalance = 0, coverdue = 0 where clientid ='$crid'";
                    }elseif($status=="OnGoing"||$status=="Released"){
                        $update = "UPDATE insert_client set camountpaid = $camtpdresult, csecdep = $secdepresult, cbalance = $cbal+$rod, coverdue = 0, cmaturitydate = now() where clientid ='$crid'";
                    }
                }



                mysqli_query($connection,$update);
            }
        ?>
<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>
                    <script>
                        function startDate() {
                            var d = new Date();
                            var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                            var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                            document.getElementById("date").innerHTML = months[d.getMonth()]+" "+d.getDate()+", "+d.getFullYear();
                        }
                        startDate();
                    </script>

<script>
   // Disable Inspect element
// document.addEventListener('contextmenu',(e)=>{
//     e.preventDefault();
//   }
//   );
//   document.onkeydown = function(e) {
//   if(event.keyCode == 123) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//      return false;
//   }
// }

// </script>