<?php 
    include_once 'header.php';
    
?>
<style>
    <?php include_once 'CSS/records.css'; ?>
    <?php include_once 'JS/app.js'; ?>
    <?php include_once 'CSS/printRecords.css'; ?>
    <?php include_once 'CSS/printModal.css'; ?>
</style>
<script>
    document.addEventListener('DOMContentLoaded',function (e){
        let setvalue = localStorage.getItem('setvalue');
        document.getElementById('searchName').value = setvalue;
        searchorindex();
    });
</script>
<div class="clientRecords">
    <h1>Client Records</h1>
    <div class="crTop">
        <div class="crtSearch">
            <select name="Area" value ="AreaAll" class="sArea" id="sArea" onchange="areaFilter()">
                <option value="AreaAll">All Area</option>
                <option value="AreaA">Area 1</option>
                <option value="AreaB">Area 2</option>
                <option value="AreaC">Area 3</option>
                <option value="AreaD">Area 4</option>
                <option value="AreaE">Area 5</option>
                <option value="AreaF">Area 6</option>
                <option value="AreaG">Area 7</option>
                <option value="AreaH">Area 8</option>
                <option value="AreaI">Area 9</option>
                <option value="AreaJ">Area 10</option>
                <option value="AreaK">Area 11</option>
                <option value="AreaL">Area 12</option>
            </select>
            <input type="text" id="searchName" onkeyup="searchorindex()" placeholder="Search Name">
            <button id="searchNameBtn" onclick="searchBar()"><i class="fa fa-search"></i></button>
        </div>
        <div class="crtFilter">
            <label for="cfilter">Filter By:</label>
            <select name="Filter" id="cfilter">
                <option value="byName">Name</option>
                <option value="byCycle">Cycle</option>
                <option value="byODue">Overdue</option>
                <option value="byLoan">Loan</option>
                <option value="byLDate">Listed Date</option>
                <option value="byRDate">Release Date</option>
                <option value="byMDate">Maturity Date</option>
            </select>
            <button onclick="mainFilter()"><i class="fa fa-filter"></i></button>
        </div>
        <div class="crtStatus">
            <label for="cStatus">Status:</label>
            <select name="Status" id="cStatus"  onchange="statusFilter()">
                <option value="All">All Status</option>
                <option value="Pending">Pending</option>
                <option value="Released">Released</option>
                <option value="OnGoing">On Going</option>
                <option value="Finished">Finished</option>
                <option value="Cancelled">Cancelled</option>
                <option value="Terminated">Terminated</option>
                <option value="Blacklisted">Blacklisted</option>
            </select>
        </div>
        <div class="crtButtons">
            <button type="button" id="crtAll" onclick="crtViewTransaction()">All Transaction</button>
            <button type="button" id="crtRecent" onclick="crtViewTransaction()">Today's Transaction</button>
            <button type="button" id=btnPrintRec onclick="window.print()" media="print">Print Record</button>
        </div>
    </div>
    <div id="crDefaultView" class="crDefaultView">
        <div class="crMiddle default">
            <table id="crtTabCont">
                <tr class="header">
                    <th width="13%">Area</th>
                    <th width="3%">Cycle</th>
                    <!-- <th width="10%">Branch</th> -->
                    <th width="15%">Client Name</th>
                    <th width="15%" id="thPayment">Payment</th>
                    <th width="5.3%">Status</th>
                    <th width="10%">Loan Amount</th>
                    <th>Days Remaining</th>
                    <th width="10%">Over Due</th>
                    <th width="10%">Amount Paid</th>
                    <th width="10%">Balance</th>
                </tr>
            </table>
            <div class="crtTableContent">
                <table id="recordTable">
                    <?php 
                        if($bnm == "all"){
                            $show_table = "SELECT * FROM insert_client  ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
                            $show_profile = "SELECT * FROM insert_client ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
                        }else{
                            $show_table = "SELECT * FROM insert_client WHERE cbranch = '$bnm' ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
                            $show_profile = "SELECT * FROM insert_client where cbranch = '$bnm' ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
                        }
                        $show_table_query = mysqli_query($connection, $show_table);
                        $drIndex = -1;

                        while($row = mysqli_fetch_assoc($show_table_query)){
                            $drIndex ++;
                            $maturity_date1 = $row['cmaturitydate'];
                            $status = $row['cloanstatus'];

                            if($status == "Pending"){
                                $stats = "<td width='6%' id='crmStatus' class='crmStatus' ><div style='background-color:Orange'><p id='crmStatusP'></p><p>Pending</p></div> </td>";
                            }
                            if($status == "Released"){
                                $stats = "<td width='6%' id='crmStatus' class='crmStatus'><div style='background-color:Yellow'><p id='crmStatusP'></p><p>Released</p></div> </td>";
                            }
                            if($status == "OnGoing"){
                                $stats = "<td width='6%' id='crmStatus' class='crmStatus'><div style='background-color:#90ee90 '><p id='crmStatusP'></p><p>On Going</p></div> </td>";
                            }
                            if($status == "Finished"){
                                $stats = "<td width='6%' id='crmStatus' class='crmStatus'><div style='background-color:#87cefa'><p id='crmStatusP'></p><p>Finished</p></div> </td>";
                            }
                            if($status == "Cancelled"){
                                $stats = "<td width='6%' id='crmStatus' class='crmStatus'><div style='background-color:Red; color:white'><p id='crmStatusP'></p><p>Cancelled</p></div> </td>";
                            }
                            if($status == "Terminated"){
                                $stats = "<td width='6%' id='crmStatus' class='crmStatus'><div style='background-color:Purple; color:white'><p id='crmStatusP'></p><p>Terminated</p></div> </td>";
                            }
                            if($status == "Blacklisted"){
                                $stats = "<td width='6%' id='crmStatus' class='crmStatus'><div style='background-color:black; color:white'><p id='crmStatusP'></p><p>Blacklisted</p></div> </td>";
                            }

                            $bnm = $row['cbranch'];
                            if($bnm == "tandangsora"){
                                $bname = 'Tandang Sora' ;
                            }
                            elseif($bnm == "meycauayan"){
                                $bname = 'Meycauayan'  ;
                            }
                            elseif($bnm == "stamaria"){
                                $bname = 'Sta. Maria' ;
                            }
                    ?>
                    <tr>
                        <td width="13%"><?php echo $row['ccarea'].' - '.$bname ?></td>
                        <td width="3%"><?php echo $row['ccycle'] ?></td>
                        <td width="15%"><?php echo $row['clastname'].', '.$row['cfirstname'].' '.substr($row['cmidname'],0,1).'.' ?></td>
                        <td width="15%" id="crmUser">
                            <button id="userButton" class="userButtonProfile"><i class="fa fa-user"></i></button>
                            <button id="userPayment" class="userButtonAdd">Add Payment <i class="fa fa-money-bill"></i></button>
                        </td>
                        <?php echo $stats?>
                        <td width="10%">₱ <input type="hidden" class="hiddenstatus" value="<?php echo $status ?>"><?php echo number_format($row['cloanamount'])?></td>
                        <td><div id="tdDaysRemaining<?php echo $drIndex?>" class="tdDaysRemaining" data-date="<?php echo $row['cmaturitydate']?>">
                                <span class="days"></span>
                            </div>
                            <script>
                                document.addEventListener('readystatechange', event => {
                                    if (event.target.readyState === "complete") {
                                        var clockdiv = document.getElementsByClassName("tdDaysRemaining");
                                        var countDownDate = new Array();
                                        for (var i = 0; i < clockdiv.length; i++) {
                                            countDownDate[i] = new Array();
                                            countDownDate[i]['el'] = clockdiv[i];
                                            countDownDate[i]['time'] = new Date(clockdiv[i].getAttribute('data-date')).getTime();
                                            countDownDate[i]['days'] = 0;
                                            countDownDate[i]['hours'] = 0;
                                            countDownDate[i]['seconds'] = 0;
                                            countDownDate[i]['minutes'] = 0;
                                        }

                                        var countdownfunction = setInterval(function() {
                                        for (var i = 0; i < countDownDate.length; i++) {
                                            var now = new Date().getTime();
                                            var distance = countDownDate[i]['time'] - now;
                                            countDownDate[i]['days'] = Math.floor(distance / (1000 * 60 * 60 * 24));
                                            // countDownDate[i]['hours'] = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            // countDownDate[i]['minutes'] = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                            // countDownDate[i]['seconds'] = Math.floor((distance % (1000 * 60)) / 1000);

                                            if (distance < 0) {
                                            countDownDate[i]['el'].querySelector('.days').innerHTML = 0;
                                            // countDownDate[i]['el'].querySelector('.eDaysRemaining').innerHTML = 0;
                                            // countDownDate[i]['el'].querySelector('.hours').innerHTML = 0;
                                            // countDownDate[i]['el'].querySelector('.minutes').innerHTML = 0;
                                            // countDownDate[i]['el'].querySelector('.seconds').innerHTML = 0;
                                            }else{
                                                if(isNaN(countDownDate[i]['days'])){
                                                    countDownDate[i]['el'].querySelector('.days').innerHTML = "0 Days";
                                            }
                                                else{
                                                    countDownDate[i]['el'].querySelector('.days').innerHTML = countDownDate[i]['days']+" Days";

                                                }
                                            // countDownDate[i]['el'].querySelector('.eDaysRemaining').innerHTML = countDownDate[i]['days'];
                                            // countDownDate[i]['el'].querySelector('.hours').innerHTML = countDownDate[i]['hours'];
                                            // countDownDate[i]['el'].querySelector('.minutes').innerHTML = countDownDate[i]['minutes'];
                                            // countDownDate[i]['el'].querySelector('.seconds').innerHTML = countDownDate[i]['seconds'];

                                        }

                                            // console.log(countDownDate[i])

                                        }
                                            }, 1);
                                    }
                                });

                            </script></td>
                        <td  width="10%" id="crmOverdue"><p>₱ <?php echo ($row['coverdue'])?></p></td>
                        <td width="10%" id="crmDays"><p>₱ <?php echo number_format($row['camountpaid'])?></p></td>
                        <td width="10%">₱ <?php echo number_format($row['cbalance'])?></td>
                        <!-- <td><?php //echo $row['clientid']?></td> -->
                    
                    </tr>            
                    <?php } ?>
                </table>
            </div>
            <?php 
            // if($bnm ='all'){
                // $show_profile = "SELECT * FROM insert_client ORDER BY ccarea ASC, ccycle ASC, clastname ASC";

            // }else{
                // $show_profile = "SELECT * FROM insert_client where cbranch = '$bnm' ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
            // }
                $show_profile_query = mysqli_query($connection, $show_profile);
                $loop = -1;
                while($row2 = mysqli_fetch_assoc($show_profile_query)){
                    $loop++;
                    $clientid = $row2['clientid'];
                    $loan = $row2['cloanamount'];
                    $interest = $row2['cinterest'];
                    $dp = $row2['cphoto'];
            
            ?>
            <div id="userPModal" class="userPModal">
                <form id="editClient" action="editrecords.php" method="post">
                    <div class="userModal">
                        <span id="userClose" class="userClose">&times;</span>
                        <div class="userContent">
                            <div class="ucProfile">
                                <img src="./2x2Pics/<?php echo $dp ;?>" alt="" onerror="this.src='IMG/defaultpic.jpg';">
                                <div class="ucpDetails">
                                    <p id="ucpID<?php echo $loop?>"> Account ID: <?php echo $clientid ?></p>
                                    <input type="hidden" name="editclientid" value="<?php echo $clientid ?>">
                                    <br>
                                    <p  id="pclientName" name="editname"  id="ucpName<?php echo $loop?>"><?php echo $row2['cfirstname'].' '.$row2['clastname'] ?><br></p>
                                    <p  id="pclientAddress" name="editaddress" id="ucpAddress<?php echo $loop?>"><?php echo $row2['cchnumber'].' '.$row2['cstreet'].' '.$row2['ccbarangay'].' '.$row2['ccity'] ?><br></p>
                                    <p  id="pclientNumber" name="editcontactno" id="ucpContact<?php echo $loop?>"><?php echo $row2['ccontact']?><br></p>
                                    <p  id="pclientSubdet" name="editage" id="ucpGenderAge<?php echo $loop?>"><?php echo $row2['cgender'] ?> | <?php echo $row2['cage'] ?></p>
                                </div>
                            </div>
                            <div class="ucDetails">
                                <div class="ucAmount">
                                    <div id="ucdHistory" class="ucdHistory" style="display: none;">
                                        <p>Amount Loaned:</p>
                                        <h3>₱ <?php echo $loan ?></h3>
                                        <div class="uctHistory">
                                            <table id="ucttTable">
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Day</th>
                                                    <th>Payment</th>
                                                    <th>Savings</th>
                                                    
                                                </tr>
                                            </table>
                                            <div class="uctcContent">
                                                <table id="uctcTable">
                                                <?php 
                                                    // if($bnm == "all"){
                                                    $show_payment_history = "SELECT * FROM insert_payment WHERE clientid = '$clientid' and payment>0";

                                                    // }else{
                                                    //     $show_payment_history = "SELECT * FROM insert_payment WHERE clientid = '$clientid' and ipbranch = '$bnm' and payment>0";
                            
                                                    // }
                                                    $show_payment_history_query = mysqli_query($connection, $show_payment_history);
                                                    while($pay = mysqli_fetch_assoc($show_payment_history_query)){
                                                        $pey = $pay['comment'];
                                                ?>
                                                    <tr>
                                                        <td id="uphComment">
                                                            <div class="upcComment">
                                                                <i class="fa fa-info-circle">
                                                                <span class="commContent">
                                                                <?php echo $pey?>
                                                            </span></i>
                                                                
                                                                <p><?php echo $pay['date_paid'] ?></p>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $pay['days'] ?></td>
                                                        <td>₱ <?php echo number_format($pay['payment'], 2) ?></td>
                                                        <td>₱ <?php echo number_format($pay['secdep'], 2) ?></td>
                                                        
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="ucrHistory">
                                            <p>Remaining Balance:</p>
                                            <span>₱ <?php echo $row2['cbalance'] ?></span>
                                        </div>
                                    </div>
                                    <div id="ucCredentials" class="ucCredentials" style="display: none;">
                                        <h4>Personal Info</h4>
                                        <div class="ucPersonal">
                                            <h4><span><?php echo $row2['cfirstname'].' '.$row2['cmidname'].' '.$row2['clastname'] ?></span><p><?php echo $row2['clientid'] ?></p></h4>
                                            <p>Contact No.: <span><?php echo $row2['ccontact'] ?></span></p>
                                            <p>Email: <span><?php echo $row2['cemail'] ?></span></p>
                                            <p>Address: <span><?php echo $row2['cchnumber'].' '.$row2['cstreet'].' '.$row2['ccbarangay'].' '.$row2['ccity'] ?></span></p>
                                        </div>
                                        <h4>Co-Maker</h4>
                                        <div class="ucComaker">
                                            <p>Co-maker : <span><?php echo $row2['ccomaker'] ?></span></p>
                                            <p>Contact No. : <span><?php echo $row2['cccontact'] ?></span></p>
                                        </div>
                                        <h4>Valid IDs</h4>
                                        <?php
                                        
                                            $show_ids = "SELECT * FROM insert_id WHERE clientid = '$clientid' ";
                                            $show_ids_query = mysqli_query($connection, $show_ids);
                                            while($id = mysqli_fetch_assoc($show_ids_query)){
                                        
                                        ?>
                                        <div class="ucValidID">
                                            <div>
                                                <p>Primary ID: <span><?php echo $id['clidtype1'] ?></span></p>
                                                <p>ID Number: <span><?php echo $id['clidcode1'] ?></span></p>
                                            </div>
                                            <div>
                                                <p>Secondary ID: <span><?php echo $id['clidtype2'] ?></span></p>
                                                <p>ID Number: <span><?php echo $id['clidcode2'] ?></span></p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>


                                    
                                    <p>Amount Loaned:</p>
                                    <input type="hidden" name="editid" id="" value="<?php echo $row2['id'] ?>">
                                    <input type="hidden" name="checkbalance" id="checkbalance<?php echo $loop ?>" value="<?php echo $row2['cbalance'] ?>">
                                    <h3>₱
                                        <select name="approvedloan" id="eAmountLoaned<?php echo $loop ?>" disabled>
                                            <option value="<?php echo $loan ?>" hidden><?php echo $loan ?></option>
                                            <?php

                                                $show_loans = "SELECT * FROM insert_deduction";
                                                $show_loans_query = mysqli_query($connection, $show_loans);
                                                while($loans = mysqli_fetch_assoc($show_loans_query)){
                                                    
                                            
                                            ?>
                                            <option value="<?php echo $loans['loan_amount']; ?>"><?php echo $loans['loan_amount']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </h3>
                                    <div class="ucaAcc">
                                        <div class="caAssignment">
                                            <h4>CA: <select name="caName" id="caName<?php echo $loop ?>" disabled>
                                                        <option value="<?php echo $row2['ccreditanalyst'] ?>"><?php echo $row2['ccreditanalyst'] ?></option>
                                                        <?php

                                                            $show_ca = "SELECT * FROM insert_creditanalyst";
                                                            $show_ca_query = mysqli_query($connection, $show_ca);
                                                            while($ca = mysqli_fetch_assoc($show_ca_query)){
                                                                
                                                        
                                                        ?>
                                                        <option value="<?php echo $ca['name']; ?>"><?php echo $ca['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                            </h4>
                                            <p>Area <?php echo $row2['ccarea'] ?></p>
                                        </div>
                                        <div class="ucCycle">
                                            <div>
                                                <span id="eCycle<?php echo $loop ?>"><?php echo $row2['ccycle'] ?></span>
                                                <input type="hidden" name="editcycle" id="ecycleinput<?php echo $loop ?>" value="<?php echo $row2['ccycle'] ?>">
                                                <p>Cycle</p>
                                            </div>
                                            <div>
                                                <span><input type="text" name="editinterest" id="editinterest<?php echo $loop ?>" value="<?php echo $interest ?>">%</span>
                                                <p>Interest</p>
                                            </div>
                                            <div>
                                                <select name="userStatus" id="ucaStatus<?php echo $loop ?>" disabled>
                                                    <option value="<?php echo $row2['cloanstatus'] ?>"><?php echo $row2['cloanstatus'] ?></option>
                                                    <option value="Pending">Pending</option>
                                                    <!-- <option value="OnGoing">OnGoing</option>
                                                    <option value="Finished">Finished</option> -->
                                                    <option value="Cancelled">Cancelled</option>
                                                    <option value="Terminated">Terminated</option>
                                                    <option value="Blacklisted">Blacklisted</option>
                                                </select>
                                                <p>Status</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br><hr><br>
                                    <?php 
                                    
                                        $show_deductions = "SELECT * FROM insert_deduction WHERE loan_amount = $loan ";
                                        $show_deductions_query = mysqli_query($connection, $show_deductions);
                                        if(mysqli_num_rows($show_deductions_query)>0){

                                        while($deduction = mysqli_fetch_assoc($show_deductions_query)){
                                            $loan_amount = $deduction['loan_amount'];
                                            $procfee = $deduction['processing_fee'];
                                            $insprem = $deduction['ins_premium'];
                                            $secdep = $deduction['sec_deposit'];
                                            $ddc =$deduction['daily_collection'];
                                            $interest_deduc = ($interest/100) * $loan_amount;
                                            $amount_received = $loan_amount - $interest_deduc - $procfee - $insprem - $secdep;
                                            
                                    ?>

                                    <?php } ?>
                                        
                                    <?php } else{
                                        $loan_amount = 0;
                                        $procfee = 0;
                                        $insprem = 0;
                                        $secdep = 0;
                                        $ddc = 0;
                                        $interest_deduc = 0;
                                        $amount_received = 0;
                                        
                                    }
                                    
                                    ?>
                                    <div class="ucaLoan">
                                        <h4>Loan Record</h4>
                                        <div class="ucalRecord">
                                            <div>
                                                <p>Approved Loan</p>
                                                <span id="eApprovedLoan<?php echo $loop ?>">₱ <?php echo $loan_amount ?></span>
                                            </div>
                                            <div>
                                                <p>ProcFee</p>
                                                <span id="eProcFee<?php echo $loop ?>">₱ <?php echo $procfee ?></span>
                                            </div>
                                            <div>
                                                <p>InsPremium</p>
                                                <span id="eInsPremium<?php echo $loop ?>">₱ <?php echo $insprem ?></span>
                                            </div>
                                            <div>
                                                <p>Savings</p>
                                                <span id="eSecDep<?php echo $loop ?>">₱ <?php echo $row2['csecdep']+$secdep ?></span>
                                            </div>
                                            <div>
                                                <p>Amount Received</p>
                                                <span id="eAmountReceived<?php echo $loop ?>">₱ <?php echo $amount_received ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ucaTransaction">
                                        <h4>Transaction Record</h4>
                                        <div class="ucaDaily">
                                            <div>
                                                <p>Daily Collection</p>
                                                <span id="eDailyCollection<?php echo $loop ?>">₱ <?php echo $ddc ?></span>
                                            </div>
                                            <div  id="eDaysRemaining<?php echo $loop ?>" class = "eDR" data-date="<?php echo $row2['cmaturitydate']?>">
                                                <p>Days Remaining</p>
                                                <span class="days"></span>
                                            </div>
                                            <div>
                                                <p>Overdue</p>
                                                <span id="eOverDue<?php echo $loop ?>">₱ <?php echo $row2['coverdue'] ?></span>
                                            </div>
                                            <div>
                                                <p>Amount Paid</p>
                                                <span id="eAmountPaid<?php echo $loop ?>">₱ <?php echo $row2['camountpaid'] ?></span>
                                            </div>
                                            <div>
                                                <p>Balance</p>
                                                <span id="eBalance<?php echo $loop ?>">₱ <?php echo $row2['cbalance'] ?></span>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="ucaButtons">
                                        <button id="ucVHistory" type="button" class ="ucVHistory" onclick="ucHistory()">View History</button>
                                        <button id="ucHHistory" type="button" class ="ucHHistory" onclick="ucHistory()">Hide History</button>
                                        <button id="ucView" type="button" class ="ucView" onclick="ucbCredential()">View Credentials</button>
                                        <button id="ucHide" type="button" class ="ucHide" onclick="ucbCredential()">Hide Credentials</button>
                                        <button id="delButton1" type="button" class="delButton1" style="display: none;">Delete Account</button>
                                        <button type="button" onclick="window.print(); return false;" >Print Record</button>
                                        <script>
                                            var adminAccount       = document.getElementById("accountName");
                                            var deleteAccount      = document.getElementsByClassName("delButton1");

                                            if(adminAccount.innerHTML === "Chatspeak Admin"){
                                                for(let counter = 0; counter<deleteAccount.length; counter++){
                                                    deleteAccount[counter].style.display = 'block';
                                                }
                                                
                                            }
                                        </script>
                                    </div>
                                    </div>
                                    <div class="ucDates">
                                        <p>Listed Date : <?php echo date('M d, Y', strtotime($row2['clisteddate'])) ?></p>
                                        <p>Release Date : <?php echo date('M d, Y', strtotime($row2['creleaseddate'])) ?></p>
                                        <p>Maturity Date : <?php echo date('M d, Y', strtotime($row2['cmaturitydate'])) ?></p>
                                        <div class="ucNew">
                                            <button id="cycButton" class="cycButton" type="button">New Cycle</button><br>
                                            <button type="button" class="editButton">Apply Loan</button><br>
                                            <a href="EditClient.php?edit=<?php echo $row2['id'] ?>"><button type="button" class="ceditinfo">Edit Info</button></a><br>
                                            <button type="submit" name="udpateclient" class="saveButton" disabled>Save</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script>
                            document.addEventListener('readystatechange', event => {
                                if (event.target.readyState === "complete") {
                                    var clockdiv = document.getElementsByClassName("eDR");
                                    var countDownDate2 = new Array();
                                    for (var i = 0; i < clockdiv.length; i++) {
                                        countDownDate2[i] = new Array();
                                        countDownDate2[i]['el'] = clockdiv[i];
                                        countDownDate2[i]['time'] = new Date(clockdiv[i].getAttribute('data-date')).getTime();
                                        countDownDate2[i]['days'] = 0;
                                        countDownDate2[i]['hours'] = 0;
                                        countDownDate2[i]['seconds'] = 0;
                                        countDownDate2[i]['minutes'] = 0;
                                    }

                                    var countdownfunction = setInterval(function() {
                                    for (var i = 0; i < countDownDate2.length; i++) {
                                        var now = new Date().getTime();
                                        var distance = countDownDate2[i]['time'] - now;
                                        countDownDate2[i]['days'] = Math.floor(distance / (1000 * 60 * 60 * 24));

                                        if (distance < 0) {
                                            countDownDate2[i]['el'].querySelector('.days').innerHTML = 0+" Days";

                                        }else{
                                            if(isNaN(countDownDate2[i]['days'])){
                                                    countDownDate2[i]['el'].querySelector('.days').innerHTML = "0 Days";
                                            }
                                                else{
                                                    countDownDate2[i]['el'].querySelector('.days').innerHTML = countDownDate2[i]['days']+" Days";

                                                }
                                            // countDownDate2[i]['el'].querySelector('.days').innerHTML = countDownDate2[i]['days']+" Days";
                                        }
                                    }
                                        }, 1);
                                }
                            });

                        </script>
            <div id="userPayModal" class="userPayModal">
                <div class="paymentModal">
                    <button id="upayClose" class="upayClose">&times;</button>
                    <div class="paymentContent">
                        <form action="payment.php" method="post">
                            <h2>Add Client Payment</h2>
                            <p>*Add and edit payment on the given input. Please note any changes on the Comments for records.</p>
                            <div class="paymentAmount">
                                <div>
                                    <label for="payment">Payments</label>
                                    <p>₱
                                        <input type="hidden" name="checkdate" value="<?php echo date('y-m-d', strtotime($row2['paydate'])) ?>">
                                        <?php
                                        
                                            $checkday = "SELECT * FROM insert_payment WHERE clientid = '$clientid' ORDER BY id DESC LIMIT 1 ";
                                            $checkday_query = mysqli_query($connection, $checkday);
                                            while($checkdy = mysqli_fetch_assoc($checkday_query)){
                                        ?>
                                        <input type="hidden" name="checkid" value="<?php echo $row2['id'] ?>">
                                        <input type="hidden" name="checkarea" value="<?php echo $row2['ccarea'] ?>">
                                        <input type="hidden" name="checkdays" value="<?php echo $checkdy['days']; ?>">
                                        <?php } ?>
                                        <input type="hidden" name="bnm" value="<?php echo $row2['cbranch']?>">
                                        <input type="hidden" name="creditanalyst" value="<?php echo $row2['ccreditanalyst'] ?>">
                                        <input type="hidden" name="clientid" value="<?php echo $row2['clientid'] ?>">
                                        <input type="hidden" name="overdue" value="<?php echo $row2['coverdue'] ?>">
                                        <input type="hidden" name="checkstatus" value="<?php echo $row2['cloanstatus'] ?>">
                                        <input type="hidden" name="checkbalance" id="checkbalance<?php echo $loop ?>" value="<?php echo $row2['cbalance'] ?>">
                                        <input id="payment" class="payment" type="number" name="amount" value="0">
                                    </p>
                                </div>
                                <div>
                                    <label for="savings">Savings</label>
                                    <p>
                                        ₱ <input type="number" name="savings" id="savings" class="savings" value="0"> 
                                    </p>
                                </div>
                            </div>
                            <textarea name="payComment" id="payComment" cols="70" rows="8" placeholder="Type comment here..."></textarea>
                            <div>
                            <h3>Client ID: <?php echo $row2['clientid']?></h3>
                            </div>
                            <h3>Client Name: <?php echo $row2['cfirstname'].' '.$row2['clastname'] ?>
                            <p></h3> Credit Analyst: <?php echo $row2['ccreditanalyst'] ?></p>
                            <button type="submit" name="payment" class="btnAddPayment" disabled>Add Payment <i class="fa fa-money-bill"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <?php } ?>


        </div>
    </div>
    <div id="crRecentlyAdded" class="crRecentlyAdded" style="display: none;">
        <div class="crMiddle recent">
            <table id="crrTable1">
                <tr>
                    <th width="3%">Area</th>
                    <th width="3%">Cycle</th>
                    <th width="20%">Client Name</th>
                    <th width="6%">Status</th>
                    <th width="10%">Loan Amount</th>
                    <th width="10%">Amount Released</th>
                    <th width="18%">Credit Analyst</th>
                    <th width="10%">Listed Date</th>
                    <th width="10%">Released Date</th>
                    <th width="10%">Maturity Date</th>
                </tr>
            </table>
            <div class="crmRContent">
                <table id="crrTable2">
                <?php 
                                 if($bnm == "all"){
                                    $query = "SELECT * FROM insert_client WHERE DATE(clisteddate) = CURDATE() OR DATE(creleaseddate) = CURDATE() ORDER BY ccarea ASC, ccycle ASC, clastname ASC ";
        
                                }else{
                                    $query = "SELECT * FROM insert_client WHERE cbranch ='$bnm' and DATE(clisteddate) = CURDATE() OR DATE(creleaseddate) = CURDATE() ORDER BY ccarea ASC, ccycle ASC, clastname ASC ";
        
                                }
                    // $query = "SELECT * FROM insert_client WHERE DATE(clisteddate) = CURDATE() OR DATE(creleaseddate) = CURDATE() ORDER BY ccarea ASC, ccycle ASC, clastname ASC ";
                    $client_query = mysqli_query($connection,$query);
                    while($row =mysqli_fetch_assoc($client_query)){

                        $id2 = $row['clientid'];
                        $area2 = $row['ccarea'];
                        $cycle2 = $row['ccycle'];
                        $name2 = $row['clastname'].' ,'.$row['cfirstname'].' '.$row['cmidname'];
                        $status2 = $row['cloanstatus'];
                        $loan_amount2 = $row['cloanamount'];
                        // $amount_released2 = $row['cloanamount'];
                        $credit_analyst2 = $row['ccreditanalyst'];

                        $listed_date2 = $row['clisteddate'];
                        $ld2 = date('M-d-Y',strtotime($listed_date2));

                        $released_date2 = $row['creleaseddate'];
                        $rd2 = date('M-d-Y',strtotime($released_date2));
                        $maturity_date2 = date('M-d-Y',strtotime($row['cmaturitydate']));
                        // $md2 = date('m-d-Y',strtotime($released_date2.'+ 100 days'));
                        
                        if($status2 == "Pending"){
                            $stats2 = "<td width='6' id='crmStatus' class='crmStatus'><div style='background-color:Orange'><p id='crmStatusP'></p><p>Pending</p></div> </td>";
                        }
                        if($status2 == "Released"){
                            $stats2 = "<td width='6' id='crmStatus' class='crmStatus'><div style='background-color:Yellow'><p id='crmStatusP'></p><p>Released</p></div> </td>";
   
                        }
                        if($status2 == "OnGoing"){
                            $stats2 = "<td width='6' id='crmStatus' class='crmStatus'><div style='background-color:#90ee90 '><p id='crmStatusP'></p><p>On Going</p></div> </td>";
 
                        }
                        if($status2 == "Finished"){
                            $stats2 = "<td width='6' id='crmStatus' class='crmStatus'><div style='background-color:#87cefa'><p id='crmStatusP'></p><p>Finished</p></div> </td>";

                        }
                        if($status2 == "Cancelled"){
                            $stats2 = "<td width='6' id='crmStatus' class='crmStatus'><div style='background-color:Red; color:white'><p id='crmStatusP'></p><p>Cancelled</p></div> </td>";
    
                        }
                        if($status2 == "Terminated"){
                            $stats2 = "<td width='6' id='crmStatus' class='crmStatus'><div style='background-color:Purple; color:white'><p id='crmStatusP'></p><p>Terminated</p></div> </td>";

                        }
                        if($status2 == "Blacklisted"){
                            $stats2 = "<td width='6' id='crmStatus' class='crmStatus'><div style='background-color:black; color:white'><p id='crmStatusP'></p><p>Blacklisted</p></div> </td>";

                        }

                                    
                        $show_deductions = "SELECT * FROM insert_deduction WHERE loan_amount = $loan_amount2 ";
                        $show_deductions_query = mysqli_query($connection, $show_deductions);
                        
                        while($deduction = mysqli_fetch_assoc($show_deductions_query)){
                            $loan_amount = $deduction['loan_amount'];
                            $procfee = $deduction['processing_fee'];
                            $insprem = $deduction['ins_premium'];
                            $secdep = $deduction['sec_deposit'];
                            
                            $interest_deduc = ($interest/100) * $loan_amount;
                            $amount_received = $loan_amount - $interest_deduc - $procfee - $insprem - $secdep;

                ?>
                    <tr>
                        
                        <td width="3%"><?php echo $area2 ?></td>
                        <td width="3%"><?php echo $cycle2 ?></td>
                        <td width="20%"><?php echo $name2 ?></td>
                        <?php echo $stats2?>
                        <td width="10%">₱ <?php echo number_format($loan_amount2,2) ?></td>
                        <td width="10%">₱ <?php echo number_format($amount_received,2) ?></td>
                        <td width="18%"><?php echo $credit_analyst2 ?></td>
                        <td width="10%"><?php echo $ld2 ?></td>
                        <td width="10%"><?php echo $rd2 ?></td>
                        <td width="10%"><?php echo $maturity_date2 ?></td>
                    </tr>
                    <?php }} ?>
                </table>
            </div>
        </div>
    </div>
</div>
                <?php                     
                $show_table2 = "SELECT * FROM insert_client ORDER BY ccarea ASC, ccycle ASC, clastname ASC";
                $show_table_query2 = mysqli_query($connection, $show_table2);
                    while($row2 = mysqli_fetch_assoc($show_table_query2)){
                ?>

            <div id="userPDel" class="userPDel">
                <div class="userDel">
                    <span class="delClose">&times;</span>
                    <div class="delConfirmation">
                        <p>Delete <span><?php echo $row2['cfirstname'] ?></span> as Client ?</p>
                        <p id="delTerms">Deleting data will not retrive the account, Proceed?</p>
                        <button type="button"><a href="Records.php?delete_client=<?php echo $row2['id'] ?>">Yes</a></button>
                    </div>
                </div>
            </div>

            <div id="userNCycle" class="userNCycle">
                <div class="userCycle">
                    <span class="cycClose">&times;</span>
                    <div class="cycleConfirmation">
                        <p>Add <span><?php echo $row2['cfirstname'] ?></span> to New Cycle ?</p>
                        <p id="cycTerms">Adding account to New Cycle will restart all of its Records, Proceed?</p>
                        <button type="submit" class="resetadv" >Yes</button>
                    </div>
                </div>
            </div>
            <?php }
                if(isset($_GET['delete_client'])){
                    $delete_id = $_GET['delete_client'];
                    $delete_client = "DELETE FROM insert_client WHERE id = $delete_id ";
                    mysqli_query($connection, $delete_client);
                    header('location:Records.php');
                }
            ?>

<script>
    <?php include 'JS/records.js' ?>
</script>
<script> //SCRIPT FOR VIEW PROFILE BUTTON 
    var cuserModal = document.getElementsByClassName("userPModal");
    var cuserBtn = document.getElementsByClassName("userButtonProfile");
    var userSpan = document.getElementsByClassName("userClose");
    var btnSave1 = document.getElementsByClassName("saveButton");

    for(let b = 0 ; b<cuserBtn.length; b++){
        cuserBtn[b].onclick = function() {
            cuserModal[b].style.display = "block";
            document.getElementById("editinterest"+b).setAttribute("disabled",true);
            localStorage.setItem('showProfile',b);
        }
    }

    for(let b = 0 ; b<userSpan.length; b++){
        userSpan[b].onclick = function() {
            cuserModal[b].style.display = "none";
            localStorage.removeItem('showProfile');
            document.getElementById("editinterest"+b).setAttribute("disabled",true);
            document.getElementById("caName"+b).setAttribute("disabled",true);
            document.getElementById("eAmountLoaned"+b).setAttribute("disabled",true);
            document.getElementById("ucaStatus"+b).setAttribute("disabled",true);

            // document.getElementById("ucpID"+b).setAttribute("disabled",true);
            // document.getElementById("pclientName"+b).setAttribute("disabled",true);
            // document.getElementById("pclientAddress"+b).setAttribute("disabled",true);
            // document.getElementById("pclientSubdet"+b).setAttribute("disabled",true);
            // document.getElementById("pclientNumber"+b).setAttribute("disabled",true);
            btnSave1[b].setAttribute("disabled",true);
        }
    }

    //      window[b].onclick = function(event) {
    //         if (event.target == cuserModal[b]) {
    //             cuserModal[b].style.display = "none";
    //         }
    //     }
    
</script>
<script> //SCRIPT FOR ADD PAYMENT BUTTON
    var cpayModal = document.getElementsByClassName("userPayModal");
    var caddPay = document.getElementsByClassName("userButtonAdd");
    var paySpan = document.getElementsByClassName("upayClose");

    for(let c = 0 ; c<caddPay.length; c++){
        let id = document.getElementsByClassName('')
        caddPay[c].onclick = function() {
            cpayModal[c].style.display = "block";
            localStorage.setItem('showAdd',c);
        }
    }

    for(let c = 0 ; c<paySpan.length; c++){
        paySpan[c].onclick = function() {
            cpayModal[c].style.display = "none";
            localStorage.removeItem('showAdd');
        }
    }

    // window.onclick = function(event) {
    //     if (event.target == cpayModal) {
    //         cpayModal.style.display = "none";
    //     }
    // }

</script>
<script> //SCRIPT FOR DELETE RECORD 
    var cuserDel = document.getElementsByClassName("userPDel");
    var delBtn1 = document.getElementsByClassName("delButton1");
    var delSpan = document.getElementsByClassName("delClose");

    for(let d = 0 ; d<delBtn1.length ; d++){
        delBtn1[d].onclick = function() {
            cuserDel[d].style.display = "block";
        }
    }
    for(let d = 0; d<delSpan.length ; d++){
        delSpan[d].onclick = function() {
            cuserDel[d].style.display = "none";
        }
    }
    // window.onclick = function(event) {
    //     if (event.target == cuserDel) {
    //         cuserDel.style.display = "none";
    //     }
    // }
</script>
<script> //SCRIPT FOR SHOWING NEW CYCLE MODAL CONFIRMATION
    var userCycle = document.getElementsByClassName("userNCycle");
    var cycBtn1 = document.getElementsByClassName("cycButton");
    var cycSpan = document.getElementsByClassName("cycClose");

    for(let e = 0 ; e<cycBtn1.length ; e++){
        cycBtn1[e].onclick = function() {
            userCycle[e].style.display = "block";
        }
        cycSpan[e].onclick = function() {
            userCycle[e].style.display = "none";
        }
    }

    // window.onclick = function(event) {
    //     if (event.target == userCycle) {
    //         userCycle.style.display = "none";
    //     }
    // }
</script>
<script> //SCRIPT FOR NEW CYCLE BUTTON
    var resetAdv = document.getElementsByClassName("resetadv");
    var confirmation = document.getElementsByClassName("userNCycle");
    for(let i=0; i<resetAdv.length;i++){
        resetAdv[i].onclick = function(){

            localStorage.removeItem('showProfile');
            // document.getElementById("editinterest"+i).removeAttribute("disabled");
            document.getElementById("eAmountLoaned"+i).value = 0;
            let cycle = document.getElementById("eCycle"+i).innerHTML;
            let cycleinput = document.getElementById("ecycleinput"+i).value;
            cycle = parseInt(cycle) +1;
            cycleinput = parseInt(cycleinput) +1;
            document.getElementById("checkbalance"+i).value = 0;
            document.getElementById("ecycleinput"+i).value = cycleinput;
            document.getElementById("ucaStatus"+i).value = "Pending";
            document.getElementById("eCycle"+i).innerHTML = cycle;
            document.getElementById("eApprovedLoan"+i).innerHTML = "₱ "+ 0;
            document.getElementById("eProcFee"+i).innerHTML = "₱ "+ 0;
            document.getElementById("eInsPremium"+i).innerHTML = "₱ "+ 0;
            document.getElementById("eSecDep"+i).innerHTML = "₱ "+ 0;
            document.getElementById("eAmountReceived"+i).innerHTML = "₱ "+ 0;
            document.getElementById("eDailyCollection"+i).innerHTML = "₱ "+ 0;
            // document.getElementById("eDaysRemaining"+i).innerHTML = 0;
            document.getElementById("eOverDue"+i).innerHTML = "₱ "+ 0;
            document.getElementById("eAmountPaid"+i).innerHTML = "₱ "+ 0;
            document.getElementById("eBalance"+i).innerHTML = "₱ "+ 0;
            btnSave2[i].removeAttribute("disabled");
            confirmation[i].style.display = "none";
            document.getElementById("caName"+i).removeAttribute("disabled");
            // document.getElementById("eAmountLoaned"+i).removeAttribute("disabled");
            document.getElementById("ucaStatus"+i).removeAttribute("disabled");
            btnSave2[i].removeAttribute("disabled");
        }
    }
</script>

<!-- <script>//SCRIPT FOR ADD PAYMENT BUTTON
    let bAddPay = document.getElementsByClassName("btnAddPayment");
    for (let f = 0; f < bAddPay.length; f++){
        bAddPay[f].onclick = function(){
            console.log(f);
            alert("Payment Added Successfully!");
        }
    }
</script> -->

<script>
    //SCRIPT FOR ENABLING EDIT WHEN EDIT BUTTON IS CLICKED
    var btnEdit = document.getElementsByClassName("editbutton");
    var btnSave2 = document.getElementsByClassName("saveButton");

    var userBAdd = document.getElementsByClassName('userButtonAdd');
    var userStatus = document.getElementsByClassName('hiddenstatus');
    var cycleButton = document.getElementsByClassName("cycButton");
    var ceditinfo = document.getElementsByClassName('ceditinfo');
    for(let g = 0 ; g<btnEdit.length ; g++){
        btnEdit[g].onclick = function(){
            if(userStatus[g].value == 'Pending' || userStatus[g].value == 'Finished'){

                document.getElementById("caName"+g).removeAttribute("disabled");
                document.getElementById("eAmountLoaned"+g).removeAttribute("disabled");
                document.getElementById("ucaStatus"+g).removeAttribute("disabled");
                document.getElementById("editinterest"+g).removeAttribute("disabled");
                btnSave2[g].removeAttribute("disabled");

            } else{
                document.getElementById("caName"+g).removeAttribute("disabled");
                document.getElementById("ucaStatus"+g).removeAttribute("disabled");
                btnSave2[g].removeAttribute("disabled");

            }


            // document.getElementById("ucpID"+g).removeAttribute("disabled");
            // document.getElementById("ucpName"+g).removeAttribute("disabled");
            // document.getElementById("ucpAddress"+g).removeAttribute("disabled");
            // document.getElementById("ucpGenderAge"+g).removeAttribute("disabled");
            // document.getElementById("ucpContact"+g).removeAttribute("disabled");
        }
    }
    //disable add payment based on status


    for (let ie=0; ie<userStatus.length;ie++){
        if(userStatus[ie].value =='Pending' || userStatus[ie].value =='Finished' || userStatus[ie].value == 'Cancelled' || userStatus[ie].value == 'Terminated' || userStatus[ie].value == 'Blacklisted'){
            userBAdd[ie].setAttribute('disabled',true);
            
        } else{
            userBAdd[ie].removeAttribute('disabled');
        }
    }

    for (let ig=0; ig<userStatus.length;ig++){
        if(userStatus[ig].value =='Finished'|| userStatus[ig].value == 'Cancelled' || userStatus[ig].value == 'Terminated' || userStatus[ig].value == 'Blacklisted'){
            btnEdit[ig].setAttribute('disabled',true);
            if(userStatus[ig].value == 'Terminated'){
                cycleButton[ig].setAttribute('disabled',true);
            }
            if( userStatus[ig].value == 'Blacklisted'){
                cycleButton[ig].setAttribute('disabled',true);
                ceditinfo[ig].setAttribute('disabled',true);
            }
        } else{
            btnEdit[ig].removeAttribute('disabled');
        }
    }
</script>
<!-- <script>
    var enter = document.getElementById('searchName');

        enter.addEventListener('keydown', (e)=>{
            if(e.key ==="Enter"){
                document.getElementById('searchNameBtn').click();
            }
        });
</script> -->
<script>
    let payments = document.getElementsByClassName("payment");
    let butotn =  document.getElementsByClassName('btnAddPayment')
        for(let i = 0; i< payments.length; i++){
            payments[i].addEventListener('keyup',function(){
                if(payments[i].value>0){
                   butotn[i].disabled = false;
                }else{
                   butotn[i].disabled = true;

                }
            });
        }

</script>
<script>
    let srchnme = document.getElementById('searchName');
        srchnme.addEventListener('keyup',function(){
            localStorage.setItem('setvalue',srchnme.value);
        })

</script>