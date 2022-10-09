<?php
     include_once 'header.php';
?>
<style>
    <?php include_once 'css/ledger.css'?>
    <?php include_once 'css/weeklyprint.css'?>
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
                    <td  style ="display:none" ><?php echo $row2['ccreditanalyst']?></td>
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
<button onclick="window.print(); return false;">Print Ledger</button>
</div>