<?php
     include_once 'header.php';
?>
<style>
    <?php include_once 'CSS/weekly.css'?>
</style>
<div id="print">
<div class="table-wrapper">
    <table class="print-table" id="print-table">
        <thead class="ccolspan">
            <tr>
                <th colspan="26">Date :</th>
            </tr>
            <!-- <tr>
                <th colspan="15">Area 1 - CA Shieanne</th>
            </tr> -->
            <tr>
                <th colspan="26">Weekly Collection Form</th>
            </tr>
        </thead>
        <thead class="ccol">
        <tr>
                <th>Area</th>
                <th>Credit <br> Analyst</th>
                <th>Client Name</th>
                <th>Minimum <br> Daily <br> Collection</th>
                <th>Daily <br> Savings</th>
                <th>Date</th>
                <th>Sign</th>

                <th>Date</th>
                <th>Sign</th>

                <th>Date</th>
                <th>Sign</th>

                <th>Date</th>
                <th>Sign</th>

                <th>Date</th>
                <th>Sign</th>
   
        </tr>
        </thead>
        <tbody><?php
        if($bnm == "all"){
                $query2 = "SELECT * FROM insert_client WHERE cloanstatus in('OnGoing','Released')  ORDER BY ccarea ASC, clastname ASC"; 
            }else{
                $query2 = "SELECT * FROM insert_client WHERE cbranch = '$bnm' and cloanstatus in('OnGoing','Released') ORDER BY ccarea ASC, clastname ASC"; 
            }
            $result2 = mysqli_query($connection,$query2);
            $drIndex2 = -1;
            while($row2  = mysqli_fetch_assoc($result2)){
                $acctid = $row2['clientid'];
                $drIndex2 ++;
                $int = $row2['cinterest'];
                $canalyst = $row2['ccreditanalyst'];
                $approvedloan = $row2['cloanamount'];
    ?>
        <tr>
            <td  style ="display:none" ><?php echo $row2['ccreditanalyst']?></td>
            <td ><p><?php echo $row2['ccarea']?></p></td>
            <td ><?php echo $canalyst?></td>
            <td><p><?php echo $row2['clastname'].", ".$row2['cfirstname']?></p></td>
            <td ><p><?php echo $approvedloan/100 ?></p></td>
            <td >20</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>                    
        <?php } ?>
        <tbody>
    </table>
</div>
<div>
  <?php 

            $allq = mysqli_query($connection,"SELECT * FROM INSERT_CLIENT ORDER BY ccarea ASC, ccycle ASC, clastname ASC");
            while($allqrow = mysqli_fetch_assoc($allq)){
            $crd = date_create($allqrow['creleaseddate']);
            $cmd = date_create($allqrow['cmaturitydate']);
            $cla = $allqrow['cloanamount'];
            $cap = $allqrow['camountpaid'];
            $date1 = date_format($crd,"Y-m-d");
            $date2 = date("Y-m-d");
            $m = date_format($cmd,"Y-m-d");

            $date1_1 = date_create($date1);
            $date2_2 = date_create($date2);
            

            //DAYS REMAINING

            echo "<br> ".strtoupper($allqrow['clastname']);
            echo "<br> <b>Released Date</b> - ".$date1;
            echo "<br> <b>Maturity Date</b> - ".$m;
            echo "<br> <b>Current Date</b> - ".date("Y-m-d");


            $diff = date_diff($date1_1,$date2_2);
            $dif = $diff->format("%a");
            echo "<br> <b>Days Remaining</b> - ";
            echo 100-$dif." Days";
                
            //OVERDUE
            echo "<br> <b>Loan Amount</b> - ₱".number_format($cla);
            echo "<br> <b>Amount Paid</b>- ₱".number_format($cap);
            echo "<br> <b>Total Over Due</b> - ₱".number_format($dif*($cla/100));
            if(($dif*($cla/100))-$cap<0){
                $rod = 0;
            }else{
                $rod = abs(($dif*($cla/100))-$cap);
            }
            echo "<br> <b>Remaining Over Due</b> - ₱".$rod;
            echo "<br>  ____________________________________";
            }


  ?>
</div>
