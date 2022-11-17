<?php 
include_once 'db.php';
if($bnm == "All"){
    $showtable = "SELECT * FROM insert_client  ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
}else{
    $showtable = "SELECT * FROM insert_client WHERE cbranch = '$bnm' ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
}
$showtable_query = mysqli_query($connection, $showtable);
while($rowh = mysqli_fetch_assoc($showtable_query)){

    $maturity_date1h = $rowh['cmaturitydate'];
    $statush = $rowh['cloanstatus'];
    $cridh = $rowh['clientid'];
    $cycleh = $rowh['ccycle'];
    $crdh = date_create($rowh['creleaseddate']);
    $cmdh = date_create($rowh['cmaturitydate']);
    $clah = $rowh['cloanamount'];
    $caph = $rowh['camountpaid'];
    $date1h = date_format($crdh,"Y-m-d");
    $date2h = date("Y-m-d");
    $mh = date_format($cmdh,"Y-m-d");

    $date1_1h = date_create($date1h);
    $date2_2h = date_create($date2h);

    $diffh = date_diff($date1_1h,$date2_2h);
    $difh = $diffh->format("%a");

    $camtpd = mysqli_query($connection,"select sum(payment) as spay, sum(secdep) ssav from insert_payment where clientid = '$cridh' and ipcycle = $cycleh ");
    while($camtpdr = mysqli_fetch_assoc($camtpd)){
        if(is_null($camtpdr['spay'])||is_null($camtpdr['ssav'])){
            $camtpdresult = 0;
            $secdepresult = 0;
        } else{
            $camtpdresult = $camtpdr['spay'];// CAMOUNTPAID
        $secdepresult = $camtpdr['ssav']; // TOTAL ADDED SAVINGS + SECDEP FROM DEDUCTION 
        }
    }
    $cbal = $rowh['cloanamount']-$camtpdresult; // CBALANCE
    
    if($rowh['cloantype']=='mbl'){
        if(($difh*($clah/100))-$caph<0){
            $rod = 0;
        }
        else{
            $rod = abs(($difh*($clah/100))-$caph);
        }

        if($statush=="Finished"||$statush=="Pending"){
            $update = "UPDATE insert_client set camountpaid = 0, cbalance = 0, coverdue = 0 where clientid ='$cridh'";
        }
        elseif($statush=="OnGoing"||$statush=="Released"){
            $update = "UPDATE insert_client set camountpaid = $camtpdresult, csecdep = $secdepresult, cbalance = $cbal, coverdue = $rod where clientid ='$cridh'";
        }
    }
    elseif($rowh['cloantype']=='sbl'){
        if(($difh*($clah/60))-$caph<0){
            $rod = 0;
        }
        else{
            $rod = abs(($difh*($clah/60))-$caph);
        }

        if($statush=="Finished"||$statush=="Pending"){
            $update = "UPDATE insert_client set camountpaid = 0, cbalance = 0, coverdue = 0 where clientid ='$cridh'";
        }
        elseif($statush=="OnGoing"||$statush=="Released"){
            $update = "UPDATE insert_client set camountpaid = $camtpdresult, csecdep = $secdepresult, cbalance = $cbal, coverdue = $rod where clientid ='$cridh'";
        }
    }
    elseif($rowh['cloantype']=='il'){
        if(($difh*($clah/20))-$caph<=0){
            $rod = 0;
        }
        else{
            $rod = abs(($difh*($clah/20))-$caph);
        }

        if($statush=="Finished"||$statush=="Pending"){
            $update = "UPDATE insert_client set camountpaid = 0, cbalance = 0, coverdue = 0 where clientid ='$cridh'";
        }elseif($statush=="OnGoing"||$statush=="Released"){
            $update = "UPDATE insert_client set camountpaid = $camtpdresult, csecdep = $secdepresult, cbalance = $cbal, coverdue = $rod where clientid ='$cridh'";
        }
    }
    elseif($rowh['cloantype']=='sl'){
       
        $rod = abs((($difh+1)*($clah*.015))-$caph);

        if($statush=="Finished"||$statush=="Pending"){
            $update = "UPDATE insert_client set camountpaid = 0, cbalance = 0, coverdue = 0 where clientid ='$cridh'";
        }elseif($statush=="OnGoing"||$statush=="Released"){
            $update = "UPDATE insert_client set camountpaid = $camtpdresult, csecdep = $secdepresult, cbalance = $cbal+$rod, coverdue = 0 where clientid ='$cridh'";
        }
    }
    mysqli_query($connection,$update);
}
?>