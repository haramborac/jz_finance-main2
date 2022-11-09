<?php
    include_once 'header.php';
?>
<style>
    <?php include_once 'css/data.css'; ?>
    <?php include_once 'css/printdata.css'; ?>
</style>

<script>
    document.addEventListener('DOMContentLoaded',function (e){
        caFilter();
    });
</script>
<div class="dataRecords">
    <h1>Credit Analyst Record</h1>
    <div class="caDataReport">
        <div>
            <label for="caNameID">Credit Analyst</label>
            <select name="caName" id="caNameID" onchange = "caFilter()">
                <option value="0">All Credit Analyst</option>
                <?php 
                    if($bnm == "all"){
                        $caquery = "SELECT * FROM insert_creditanalyst ORDER BY area asc, name asc";
                    }else{
                        $caquery = "SELECT * FROM insert_creditanalyst where cabranch = '$bnm' ORDER BY area asc, name asc";
                    }
                    $cacon = mysqli_query($connection,$caquery);

                    while($ca = mysqli_fetch_assoc($cacon)){               
                ?>   
                    <option value="<?php echo $ca['area']?>">Area <?php echo $ca['area'] ?> : <?php echo $ca['name'] ?></option>
                <?php }?>
            </select>
        </div>
        <div>
        <?php 
                if($bnm == "all"){
                    $qPending = "SELECT COUNT(cloanstatus) AS Pending FROM insert_client WHERE cloanstatus = 'Pending'";        
                }else{
                    $qPending = "SELECT COUNT(cloanstatus) AS Pending FROM insert_client WHERE cbranch = '$bnm' and cloanstatus = 'Pending'"; 
                }
                $queery1 = mysqli_query($connection,$qPending);     
                    if(mysqli_num_rows($queery1)>0){
                        while($rowData1 = mysqli_fetch_array($queery1)){
                           $rPending = $rowData1['Pending']; 
                        }
                    }
            ?> 
                <p>Pending Client:</p>
                <?php echo " <span id='pendingID'>".$rPending." Clients </span>"?>    
        </div>
        <div>
        <?php 
                if($bnm == "all"){
                    $qCurrent = "SELECT COUNT(cloanstatus) AS Current FROM insert_client WHERE cloanstatus = 'OnGoing' "; 

                }else{
                    $qCurrent = "SELECT COUNT(cloanstatus) AS Current FROM insert_client WHERE cbranch = '$bnm' and cloanstatus = 'OnGoing' "; 
                }
                $queery2 = mysqli_query($connection,$qCurrent);       
                    if(mysqli_num_rows($queery2)>0){
                        while($rowData2 = mysqli_fetch_array($queery2)){
                        $rCurrent = $rowData2['Current']; 
                        }
                    }
            ?> 
            <p>Current Client:</p>
            <?php echo " <span id='currentID'>".$rCurrent." Clients </span>"?> 
        </div>
        <div>
            <p>Daily Collection:</p>
            <span id="dailyCollection"></span>
        </div>
        <div>     
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <p>Today's Collection:</p>
            <span id="todayCollection"></span>
        </div>
        <div>
            <p>Overdue:</p>
            <span id="overDue"></span>
        </div>
    </div>
    <div class="dataContent">
        <div class="cadrCont first">
            <h4>Pending Client</h4>
            <table>
                <tr>
                    <th width="10%">Area</th>
                    <th width="50%">Client Name</th>
                    <th width="20%">Contact No.</th>
                    <th width="20%">Listed Date</th>
                </tr>
            </table>
            <div class="cadrFPC">
                <table id = "tPending">
                <?php
                        if($bnm == "all"){
                            $query = "SELECT * FROM insert_client WHERE cloanstatus = 'Pending' ORDER BY ccarea ASC, clastname ASC";
                        }else{
                            $query = "SELECT * FROM insert_client WHERE cbranch = '$bnm' and cloanstatus = 'Pending' ORDER BY ccarea ASC, clastname ASC";
                        }
                        $result = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($result)){                           
                ?>
                    <tr>
                        <td style ="display:none"><?php echo $row['ccreditanalyst']?></td>
                        <td width="10%"><p><span><?php echo $row['ccarea']?></span></p></td>
                        <td width="50%"><span><?php echo $row['clastname'].", ".$row['cfirstname']?></span></td>
                        <td width="20%"><span><?php echo $row['ccontact']?></span></td>
                        <td width="20%"><p><span><?php echo date('M d, Y',strtotime($row['clisteddate'])); ?></span></p></td>             
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="cadrCont second">
            <h4>Current Client</h4>
            <table>
                <tr>
                    <th width="10%">Area</th>
                    <th width="40%">Client Name</th>
                    <th width="15%">Loan</th>
                    <th width="15%">Days</th>
                    <th width="20%">Maturity Date</th>
                </tr>
            </table>
            <div class="cadrSCC">
                <table id="tCurrent">
                <?php 
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
                            $approvedloan = $row2['cloanamount'];
                ?>
                    <tr>
                        <td style ="display:none" class="canal"><?php echo $row2['ccreditanalyst']?></td>
                        <td style ="display:none" width="10%"><?php echo $row2['ccarea']?></td>
                        <td width="40%"><span><?php echo $row2['clastname'].", ".$row2['cfirstname']?></span></td>
                        <td width="15%"><span>₱ </span><span><?php echo number_format($approvedloan)?></span></td>
                        <td width="15%" id="tdDaysRemaining<?php echo $drIndex2?>" class="tdDaysRemaining2" data-date="<?php echo $row2['cmaturitydate']?>"><span class="days"></span>                        

                        <script>
                            document.addEventListener('readystatechange', event => {
                                if (event.target.readyState === "complete") {
                                    var clockdiv = document.getElementsByClassName("tdDaysRemaining2");
                                    var countDownDate = new Array();
                                    for (var i = 0; i < clockdiv.length; i++) {
                                        countDownDate[i] = new Array();
                                        countDownDate[i]['el'] = clockdiv[i];
                                        countDownDate[i]['time'] = new Date(clockdiv[i].getAttribute('data-date')).getTime();
                                        countDownDate[i]['days'] = 0;
                  
                                    }

                                    var countdownfunction = setInterval(function() {
                                    for (var i = 0; i < countDownDate.length; i++) {
                                        var now = new Date().getTime();
                                        var distance = countDownDate[i]['time'] - now;
                                        countDownDate[i]['days'] = Math.floor(distance / (1000 * 60 * 60 * 24));
                         
                                        if (distance < 0) {
                                        countDownDate[i]['el'].querySelector('.days').innerHTML = 0;
                                        
                                        }else{
                                        countDownDate[i]['el'].querySelector('.days').innerHTML = countDownDate[i]['days'];
                                        }
                                    }
                                        }, 1);
                                }
                            });
                        </script></td>
                        <td width="20%"><p><span><?php echo date('m-d-Y',strtotime($row2['creleaseddate'].'+ 100 days'));?></span></p></td>
                        <td style ="display:none"><?php echo $row2['ccreditanalyst'] ?></td>
                        <td style ="display:none"><?php echo date('n/d/Y', strtotime($row2['paydate']))?></td>
                        <?php 
                            $payment_today = "SELECT sum(payment) as pymnt FROM insert_payment WHERE clientid = '$acctid' GROUP BY clientid DESC  ";
                            $payment_today_query = mysqli_query($connection, $payment_today);
                            while($today = mysqli_fetch_assoc($payment_today_query)){
                        ?>
                        <td style ="display:none"><?php echo $today['pymnt'] ?></td>
                        <?php
                        
                            $show_amount_released = "SELECT * FROM insert_deduction WHERE loan_amount = $approvedloan ";
                            $show_amount_released_query = mysqli_query($connection, $show_amount_released);
                            while($deductions = mysqli_fetch_assoc($show_amount_released_query)){
                                $procfee = $deductions['processing_fee'];
                                $ins_premium = $deductions['ins_premium'];
                                $sec_deposit = $deductions['sec_deposit'];
                                $int_deduc = ($int/100)*$approvedloan;
                                $amount_received = $approvedloan - $int_deduc - $procfee - $ins_premium - $sec_deposit ;
                        ?>
                        <td style ="display:none" id="asdasd"><?php echo $amount_received ?></td>
                        <?php 
                            $amtpd = mysqli_query($connection,"SELECT sum(payment) as smpymnt from insert_payment where clientid = '$acctid' and date_paid = CURRENT_DATE()");
                            
                                while($amtpdrow = mysqli_fetch_assoc($amtpd)){
                                    if(is_null($amtpdrow['smpymnt'])){
                                        $sumpay = 0;
                                    }else{
                                        $sumpay = $amtpdrow['smpymnt'];
                                    }
                                }
                        ?>
                        <td style ="display:none"><?php echo $row2['camountpaid'] ?></td>
                        <td style ="display:"><?php echo $row2['cbalance'] ?></td>
                        <td style ="display:none"><?php echo $sumpay?></td>
                        <td style ="display:none"><?php echo $approvedloan?></td>
                    </tr>                    
                    <?php }}} ?>
                </table>
            </div>
        </div>
        <div class="cadrCont third">
            <h4>Overdue Client</h4>
            <table>
                <tr>
                    <th width="10%">Area</th>
                    <th width="40%">Client Name</th>
                    <th width="20%">Contact No.</th>
                    <th width="15%">Loan</th>
                    <th width="15%">Overdue</th>
                </tr>
            </table>
            <div class="cadrTOR">
            <table id = "tOverDue">
                <?php 
                    if($bnm == "all"){
                        $query3 = "SELECT * FROM insert_client WHERE coverdue > 0 AND cloanstatus in('OnGoing','Released') ORDER BY ccarea ASC, clastname ASC";
                    }else{
                        $query3 = "SELECT * FROM insert_client WHERE cbranch = '$bnm' and coverdue > 0 AND cloanstatus in('OnGoing','Released') ORDER BY ccarea ASC, clastname ASC";
                    }
                    $result3 = mysqli_query($connection,$query3);

                        while($row3 = mysqli_fetch_assoc($result3)){           
                
                ?>
                    <tr>
                        <td style ="display:none" class="canal"><?php echo $row3['ccreditanalyst']?></td>
                        <td width="10%"><p><span><?php echo $row3['ccarea'] ?></span></p></td>
                        <td width="40%"><span><?php echo $row3['clastname'].", ".$row3['cfirstname']?></span></td>
                        <td width="20%"><span><?php echo $row3['ccontact']?></span></td>
                        <td width="15%"><span>₱ </span><span><?php echo $row3['cloanamount'] ?></span></td>
                        <td width="15%"><span>₱ </span><span><?php echo $row3['coverdue'] ?></span></td>
                        
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="doAllSale">
        <div>
            <p>Total Sales</p>
            <span id="ttlSales"></span>
        </div>
        <div>
            <p>Total Money Collected</p>
            <span id="ttmCol"></span>
        </div>
        <div>
            <p>Total Money Uncollected</p>
            <span id="tmUCol"></span>
        </div>
        <div>
            <button id="btnPrintData" onclick="window.print(); return false;" media = "print">Print <i class="fa fa-print"></i></button>
        </div>
    </div>
</div>
<script><?php include_once 'js/data.js'; ?></script>