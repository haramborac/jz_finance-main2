<?php  include_once 'header.php';?>

<style>
    <?php include_once 'css/ca.css'; ?>
    <?php include_once 'css/caprint.css'; ?>
</style>

<div id="no-print" class = "caContainer">
    <h1>Credit Analyst of <?php echo $bname ?></h1>
            <select name="caName" id="caNameID" onchange = "caFilter()">
                <?php 
                    if($bnm == "All"){
                        $caquery = "SELECT * FROM insert_creditanalyst group by cabranch, name ORDER BY area asc, name asc";
                    echo "
            <option value='0'>All Branch CA</option>
            ";
                    }else{
                        $caquery = "SELECT * FROM insert_creditanalyst where cabranch = '$bnm' ORDER BY area asc, name asc";
                        echo "
            <option value='0'>All $bname CA</option>
            ";
                    }
                    $cacon = mysqli_query($connection,$caquery);
                    if(mysqli_num_rows($cacon)>0){
                    
                    while($ca = mysqli_fetch_assoc($cacon)){  
                       $cab = $ca['cabranch'];
                ?>   
                    <option value="<?php echo $ca['area'].$ca['name']?>"> <?php echo $ca['area'].', '.$cab ?> : <?php echo $ca['name'] ?></option>
                <?php }}else{
                    echo "<option value=''>No Credit Analyst</option>";
                    }?>
            </select>
            <h2>Current Clients</h2>
        <div class = "caContent">
        <table id="tCurrent">
        <tr id="theadtr">
                <th width="15%">Area</th>
                <th width="17%">Credit Analyst</th>
                <th width="30%">Client Name</th>
                <th width="13%">Loan</th>
                <th width="8%">DC</th>
                <th width="8%">SecDep</th>
                <th width="15%">Days</th>
        </tr>
    <?php 
            if($bnm == "All"){
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

                $crd2 = date_create($row2['creleaseddate']);
                $date11 = date_format($crd2,"Y-m-d");
                $date22 = date("Y-m-d");

                $date11_1 = date_create($date11);
                $date22_2 = date_create($date22);

                $diff2 = date_diff($date11_1,$date22_2);
                $dif2 = $diff2->format("%a");

                if($row2['cloantype'] == 'mbl'){
                    $lt2 = 100;
                }
                if($row2['cloantype']  == 'sbl'){
                    $lt2 = 60;
                }
                if($row2['cloantype']  == 'il'){
                    $lt2 = 20;
                }
                if($row2['cloantype']  == 'sl'){
                    $lt2 = 0;
                }  
                if($row2['cloanstatus']=="Pending" || $row2['cloanstatus']=="Finished"){
                    $ddf2 = 0;

                }else{
                    if($row2['cloantype']!='sl'){
                        $ddf2 = $lt2-$dif2;
                    }else{
                        $ddf2 = $dif2;
                    }
                }
    ?>
        <tr>
            <td style ="display:none" ><?php echo $row2['ccarea'].$row2['ccreditanalyst']?></td>
            <td ><p><?php echo $row2['ccarea']?></p></td>
            <td ><?php echo $canalyst?></td>
            <td><p><?php echo $row2['clastname'].", ".$row2['cfirstname']?></p></td>
            <td ><p>₱ <?php echo number_format($approvedloan)?></p></td>
            <td ><p><?php echo $approvedloan/100 ?></p></td>
            <td >20</td>
            <td  id="tdDaysRemaining<?php echo $drIndex2?>" class="tdDaysRemaining2" data-date="<?php echo $row2['cmaturitydate']?>"><p class="days">
            <?php 
                if($ddf2 == 1 || $ddf2 == -1){
                    echo $ddf2." Day";
                }
                if($ddf2>1 || $ddf2 == 0 || $ddf2 < -1){
                    echo $ddf2." Days";
                }
           ?>
            </p>
        </td>
        </tr>                    
        <?php } ?>
    </table>  
            </div>
            <button id="button" onclick="window.print(); return false;">Print</button>
</div>
<div id="print">
<div class="table-wrapper">
    <table class="print-table" id="print-table">
        <thead class="ccolspan">
            <tr>
                <th colspan="15">Date :</th>
            </tr>
            <tr>
                <th colspan="15">Cash Collections & Savings</th>
            </tr>
        </thead>
        <thead class="ccol">
            <tr>
                <th>No.</th>
                <th width="7%">Area</th>
                <th width="20%">Credit Analyst</th>
                <th width="30%">Client Name</th>
                <th width="15%">Total <br> Loan Amount</th>
                <th>Amount Paid</th>
                <th>Remaining <br> Balance</th>
                <th>Total Savings</th>
                <th width="8%">Minimum <br> Daily Collection</th>
                <th width="10%">Daily <br> Savings</th>
                <th width="15%">Remaining <br> Days</th>
                <th>Overdue</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 0;
            if($bnm == "All"){
                    $query2 = "SELECT * FROM insert_client WHERE cloanstatus in('OnGoing','Released')  ORDER BY ccarea ASC, clastname ASC"; 
                }else{
                    $query2 = "SELECT * FROM insert_client WHERE cbranch = '$bnm' and cloanstatus in('OnGoing','Released') ORDER BY ccarea ASC, clastname ASC"; 
                }
                $result2 = mysqli_query($connection,$query2);
                $drIndex2 = -1;
                while($row2  = mysqli_fetch_assoc($result2)){
                    $i++;
                    $acctid = $row2['clientid'];
                    $drIndex2 ++;
                    $int = $row2['cinterest'];
                    $canalyst = $row2['ccreditanalyst'];
                    $approvedloan = $row2['cloanamount'];

                    $crd2 = date_create($row2['creleaseddate']);
                    $date11 = date_format($crd2,"Y-m-d");
                    $date22 = date("Y-m-d");
    
                    $date11_1 = date_create($date11);
                    $date22_2 = date_create($date22);
    
                    $diff2 = date_diff($date11_1,$date22_2);
                    $dif2 = $diff2->format("%a");
    
                    if($row2['cloantype'] == 'mbl'){
                        $lt2 = 100;
                    }
                    if($row2['cloantype']  == 'sbl'){
                        $lt2 = 60;
                    }
                    if($row2['cloantype']  == 'il'){
                        $lt2 = 20;
                    }
                    if($row2['cloantype']  == 'sl'){
                        $lt2 = 0;
                    }  
                    if($row2['cloanstatus']=="Pending" || $row2['cloanstatus']=="Finished"){
                        $ddf2 = 0;
    
                    }else{
                        if($row2['cloantype']!='sl'){
                            $ddf3 = $lt2-$dif2;
                        }else{
                            $ddf3 = $dif2;
                        }
                    }
        ?>
        <tr>
            <td><?php echo $i?></td>
            <td  style ="display:none" ><?php echo $row2['ccarea'].$row2['ccreditanalyst']?></td>
            <td ><p><?php echo $row2['ccarea']?></p></td>
            <td ><?php echo $canalyst?></td>
            <td><p><?php echo $row2['clastname'].", ".$row2['cfirstname']?></p></td>
            <td ><p>₱ <?php echo number_format($approvedloan)?></p></td>
            <td><p>₱ <?php echo number_format($row2['camountpaid'])?></p></td>
            <td><p>₱ <?php echo number_format($row2['cbalance'])?></p></td>
            <td><p>₱ <?php echo number_format($row2['csecdep'])?></p></td>
            <td ><p><?php echo $approvedloan/100 ?></p></td>
            <td >20</td>
            <td id="tdDaysRemaining<?php echo $drIndex2?>" class="tdDaysRemaining2" data-date="<?php echo $row2['cmaturitydate']?>"><p class="days"></p>                        
            <?php 
                    if($ddf3 == 1 || $ddf3 == -1){
                        echo $ddf3." Day";
                    }
                    if($ddf3>1 || $ddf3 == 0 || $ddf3 < -1){
                        echo $ddf3." Days";
                    }
                   ?>
            </td>
            <td>₱ <?php echo number_format($row2['coverdue'])?></td>
        </tr>                    
        <?php } ?>
        <tbody>
    </table>
</div>
</div>
<script><?php include 'js/ca.js'?></script>