<?php
     include_once 'header.php';
?>
<style>
    <?php include_once 'css/ledger.css'?>
</style>

<div id="print">
    <div class="table-wrapper">
    <table class="print-table" id="print-table">
        <thead class="ccolspan">
            <tr>
                <th colspan="26">Date :</th>
            </tr>
            <tr>
                <th colspan="26">Weekly Collection Form</th>
            </tr>
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
        <tbody id="tbody">
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
                ?>
                <tr>
                    <td style ="display:none" ><?php echo $row2['ccarea'].$row2['ccreditanalyst']?></td>
                    <td><p><?php echo $row2['ccarea']?></p></td>
                    <td><?php echo $canalyst?></td>
                    <td><p><?php echo $row2['clastname'].", ".$row2['cfirstname']?></p></td>
                    <td><p><?php echo $approvedloan/100 ?></p></td>
                    <td>20</td>
                    <td></td>
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
</div>

<div id="no-print" class = "caContainer">
    <h1>Ledger of <?php echo $bname ?></h1>
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
            <h2>Clients</h2>
        <div class = "caContent">
        <table id="tCurrent">
        <tr id="theadtr">
                <th width="15%">Area</th>
                <th width="17%">Credit Analyst</t0h>
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
            <button id="button" onclick="window.print(); return false;">Print Ledger</button>
</div>
<script><?php include 'js/ledger.js'?></script>