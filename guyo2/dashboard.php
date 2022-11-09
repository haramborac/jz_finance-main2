<?php include_once 'header.php'; ?>

<style>
    <?php include_once 'css/dashboard.css'; ?>
    <?php include_once 'css/printdashboard.css'; ?>
</style>

<section id="Dashboard" class="navContent">
    <div class="dbDashboard">
        <div class="dbSummary">
            <h1>Dashboard</h1>
            <div class="dbData">
                <div class="dbBalance">
                    <div class="card totalBorrowed">
                        <?php 
                            if($bnm == "All"){
                                $qHighestA = "SELECT SUM(cloanamount) AS HighestAll, ccarea from insert_client  WHERE  cloanstatus in ('Ongoing','Released') group by ccarea ORDER BY HighestAll DESC LIMIT 1"; 
                            }else{
                                $qHighestA = "SELECT SUM(cloanamount) AS HighestAll, ccarea from insert_client  WHERE cbranch='$bnm' AND cloanstatus in ('Ongoing','Released') group by ccarea ORDER BY HighestAll DESC LIMIT 1"; 
                            }
                            $qryHighestA = mysqli_query($connection,$qHighestA);
                            $text = "None";
                                if(mysqli_num_rows($qryHighestA)>0){
                                    while($rdqryHighestA = mysqli_fetch_array($qryHighestA)){
                                        if($rdqryHighestA['HighestAll']==0){
                                            $rqryHighestA = 'Area : '.$text;
                                        } else{
                                            $rqryHighestA = 'Area : '.$rdqryHighestA['ccarea'];   
                                        }
                                    }
                                } else{
                                    $rqryHighestA = 'Area : '.$text;
                                }
                        ?> 
                        <div class="cardTooltip"><i id="sy" class="fa fa-info-circle"></i>
                            <span class="cardTipText">
                                <p>Area with the highest Sales</p>
                                <h4><?php echo $rqryHighestA?></h4>
                            </span>
                        </div>
                        <?php 
                            if($bnm == "All"){
                                $qApp = "SELECT SUM(cloanamount) AS Approved FROM insert_client WHERE cloanstatus in ('Ongoing','Released')"; 
                            }else{
                                $qApp = "SELECT SUM(cloanamount) AS Approved FROM insert_client WHERE cbranch = '$bnm' and cloanstatus in ('Ongoing','Released')"; 
                            }
                            $qryApp = mysqli_query($connection,$qApp);       
                                if(mysqli_num_rows($qryApp)>0){
                                    while($rdApp = mysqli_fetch_array($qryApp)){
                                    $rApp = $rdApp['Approved']; 
                                    }
                                }
                        ?> 
                        <i class="fa fa-money-bill" style="color: green;"></i>
                        <p>Running Sales</p>
                        <span>Overall total of money to be collected by Credit Analysts</span>
                        <h2>₱<?php echo number_format($rApp)?></h2>
                    </div>
                    <div class="card totalOverdue">
                        <?php 
                            if($bnm == "All"){
                                $qHighestO = "SELECT SUM(coverdue) AS HighestOverDue, sum(cloanamount) as SumLoanAmount, ccarea from insert_client  WHERE  cloanstatus in ('Ongoing','Released') group by ccarea ORDER BY HighestOverDue DESC, sum(cloanamount) DESC LIMIT 1"; 
                            }else{
                                $qHighestO = "SELECT SUM(coverdue) AS HighestOverDue, sum(cloanamount) as SumLoanAmount, ccarea from insert_client  WHERE cbranch = '$bnm' and cloanstatus in ('Ongoing','Released') group by ccarea ORDER BY HighestOverDue DESC, sum(cloanamount) DESC LIMIT 1"; 
                            }
                            $qryHighestO = mysqli_query($connection,$qHighestO);
                                
                                if(mysqli_num_rows($qryHighestO)>0){
                                    while($rdqryHighestO = mysqli_fetch_array($qryHighestO)){                           
                                        if($rdqryHighestO['HighestOverDue']==0){
                                            $rqryHighestO = 'Area : '.$text;
                                        } else{
                                            $rqryHighestO = 'Area : '.$rdqryHighestO['ccarea']; 
                                        }
                                    }
                                } else{
                                    $rqryHighestO = 'Area : '.$text;
                                }
                        ?> 
                        <div class="cardTooltip"><i id="sy" class="fa fa-info-circle"></i>
                            <span class="cardTipText">
                                <p>Area with the highest Overdue</p>
                                <h4><?php echo $rqryHighestO?></h4>
                            </span>
                        </div>
                        <?php                                          
                            if($bnm == "All"){
                                $qO = "SELECT SUM(coverdue) AS TOTALO FROM insert_client WHERE cloanstatus in ('Ongoing','Released')";
                            }else{
                                $qO = "SELECT SUM(coverdue) AS TOTALO FROM insert_client WHERE cbranch = '$bnm' and cloanstatus in ('Ongoing','Released')";
                            }
                            $qryO = mysqli_query($connection,$qO);                                
                                if(mysqli_num_rows($qryO)>0){
                                    while($rdO = mysqli_fetch_array($qryO)){
                                    $rAO = $rdO['TOTALO']; 
                                    }
                                }
                        ?> 
                        <i class="fa fa-bullhorn" style="color: purple;"></i>
                        <p>Total Overdue</p>
                        <span>Overall overdue payment to be collected, area to be focused. </span>
                        <h2>₱<?php echo number_format($rAO)?></h2>
                    </div> 
                    <?php        
                        if($bnm == "All"){
                            $hoverHC = "SELECT SUM(camountpaid) AS amntpaid, ccarea  FROM insert_client WHERE cloanstatus in ('Ongoing','Released') group by ccarea order by amntpaid desc limit 1"; 
                        }else{
                            $hoverHC = "SELECT SUM(camountpaid) AS amntpaid, ccarea  FROM insert_client WHERE cbranch = '$bnm' and cloanstatus in ('Ongoing','Released') group by ccarea order by amntpaid desc limit 1"; 
                        }    
                        $qryhoverHC = mysqli_query($connection,$hoverHC);
                            if(mysqli_num_rows($qryhoverHC)>0){
                                while($hoverHC = mysqli_fetch_array($qryhoverHC)){
                                    if($hoverHC['amntpaid']==0){
                                        $hoverrsHC = $text;
                                    } else{
                                        $hoverrsHC = $hoverHC['ccarea']; 
                                    }
                                }
                            }else{
                                $hoverrsHC = $text;
                            }
                    ?> 
                    <?php       
                        if($bnm == "All"){
                            $qHC = "SELECT SUM(camountpaid) AS amntpaid FROM insert_client WHERE cloanstatus in ('Ongoing','Released') "; 
                        }else{
                            $qHC = "SELECT SUM(camountpaid) AS amntpaid FROM insert_client WHERE cbranch = '$bnm' and cloanstatus in ('Ongoing','Released')";                                                                         
                        }      
                        $qryHC = mysqli_query($connection,$qHC);
                            if(mysqli_num_rows($qryHC)>0){
                                while($rHC = mysqli_fetch_array($qryHC)){
                                $rsHC = $rHC['amntpaid'];
                                }
                            }
                    ?> 
                    <div class="card pendingClient">
                        <div class="cardTooltip"><i id="sy" class="fa fa-info-circle"></i>
                            <span class="cardTipText">
                                <p>Area with the highest Collection</p>
                                <h4>Area : <?php echo $hoverrsHC?></h4>
                            </span>
                        </div>
                        <i class="fa fa fa-thumbs-up" style="color: blue;"></i>
                        <p>Running Collection</p>
                        <span>Overall running collection of money from the clients</span>
                        <h2>₱<?php echo number_format($rsHC) ?></h2>
                    </div>
                    <?php    
                        if($bnm == "All"){
                            $qT = "SELECT COUNT(*) AS TOTALC FROM insert_client WHERE cloanstatus in ('Ongoing','Released')";                                         
                        }else{
                            $qT = "SELECT COUNT(*) AS TOTALC FROM insert_client WHERE cbranch = '$bnm' and cloanstatus in ('Ongoing','Released')"; 
                        }         
                        $qryT = mysqli_query($connection,$qT);
                            if(mysqli_num_rows($qryT)>0){
                                while($rdT = mysqli_fetch_array($qryT)){
                                $rAT = $rdT['TOTALC'];
                                    if($rAT <= 1){
                                        $rAT1 = "$rAT Client";
                                    }else{
                                        $rAT1 = "$rAT Clients";
                                    }
                                }
                            }
                    ?> 
                    <div class="card currentClient">
                        <i class="fa fa-users" style="color: salmon;"></i>
                        <p>Active Clients</p>
                        <span>Overall total of clients in all the area around the city</span>
                        <h2><?php echo $rAT1 ?></h2>
                        <div>
                            <span id="viewcaModal">View Summary <i class="fa fa-info-circle"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dbReport creditAnalyst">
                <h2>Credit Analyst Report <span>(Summary)</span></h2>
                <table id="dbreportTitle">
                    <tr>
                        <th width="10%">Branch</th>
                        <th width="20%">Credit Analyst</th>
                        <th width="10%">Current Clients</th>
                        <th width="20%">Account Value</th>
                        <th width="20%">Daily Collection</th>
                        <th width="20%">Total Overdue</th>
                    </tr>
                </table>
                <div class="dvRContent">
                    <table id="dbreportContent">
                        <?php 
                            //CREDIT ANALYST
                            if($bnm == "All"){
                                $qReport = "SELECT * FROM insert_creditanalyst ORDER BY AREA ASC, NAME ASC";          
                            }else{
                                $qReport = "SELECT * FROM insert_creditanalyst  where cabranch='$bnm' ORDER BY AREA ASC, NAME ASC";          
                            }
                            $qryReport = mysqli_query($connection,$qReport);                                       
                                while($rowReport = mysqli_fetch_assoc($qryReport)){
                                $caName = $rowReport['name'];  
                                $caArea = $rowReport['cabranch'];
                                
                            //CLIENTS PER CREDIT ANALYST  
                            $qClientNo = "SELECT COUNT(id) AS CNO, clientid  from insert_client WHERE ccreditanalyst='$caName' and cloanstatus in ('Ongoing','Released')";
                            $qryClientNo = mysqli_query($connection,$qClientNo);                                               
                                while($rowClientNo = mysqli_fetch_assoc($qryClientNo)){
                                    $caClientId = $rowClientNo['clientid'];
                                    $caClientNo = $rowClientNo['CNO'];  
                                    }
                            //TOTAL LOAN AMOUNT PER CREDIT ANALYST
                            $qLoanAmount ="SELECT SUM(cloanamount) AS SLA from insert_client WHERE ccreditanalyst='$caName' and cloanstatus in ('Ongoing','Released')";
                            $qryLoanAmount = mysqli_query($connection,$qLoanAmount);
                                while($rowLoanAmount = mysqli_fetch_assoc($qryLoanAmount)){
                                    $caLoanAmount = $rowLoanAmount['SLA'];
                                }
                            //DAILY COLLECTION PER CREDIT ANALYST
                            $qdaily = "SELECT SUM(payment) as daily, SUM(secdep) as sumdep, creditanalyst from insert_payment WHERE date_paid = curdate() and creditanalyst = '$caName'";
                            $qrydaily = mysqli_query($connection,$qdaily);                                                 
                                        while($rowdaily = mysqli_fetch_assoc($qrydaily)){
                                            $caPayment = $rowdaily['daily'];
                                            $caSecDep = $rowdaily['sumdep'];
                                            $caTPay = $caPayment + $caSecDep;
                                        }
                            //TOTAL OVERDUE PER CREDIT ANALYST
                            $qOverDue = "SELECT SUM(coverdue) as SOD from insert_client WHERE ccreditanalyst='$caName' and cloanstatus in ('Ongoing','Released')"; 
                            $qryOverDue = mysqli_query($connection,$qOverDue);
                                        while($rowOverDue  = mysqli_fetch_assoc($qryOverDue)){
                                            $caOverDue = $rowOverDue['SOD'];
                                        }                          
                        ?>    
                            <tr>
                                <td width="10%"><?php echo $caArea ?></td> 
                                <td width="20%"><?php echo $caName ?></td> 
                                <td width="10%"><?php echo $caClientNo." Clients" ?></td> 
                                <td width="20%">₱ <?php echo number_format($caLoanAmount)?></td> 
                                <td width="20%">₱ <?php echo number_format($caTPay)?></td> 
                                <td width="20%">₱ <?php echo number_format($caOverDue)?></td>
                            </tr>    
                        <?php }?>
                    </table>
                </div>
            </div>
            <div class="dbReport caClients" id="dbcaModal" style="display: none;">
                <span class="close"><i class="fa fa-times-circle"></i></span>
                <div class="clientSum">
                    <div class="clSum">
                        <div>
                            <i class="fa fa-users"></i>
                            <h3><?php echo $rAT ?> Clients</h3>
                            <p>Overall Total Clients</p>
                        </div>
                    </div>
                    <hr>
                    <?php 
                        if($bnm == "All"){
                            $qA = "SELECT COUNT(ccarea) AS A FROM insert_client where ccarea like 'Sta. Maria%' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }else{
                            $qA = "SELECT COUNT(ccarea) AS A FROM insert_client where cbranch ='$bnm' AND ccarea like 'Sta. Maria%' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }  
                        $qry1 = mysqli_query($connection,$qA);   
                            if(mysqli_num_rows($qry1)>0){
                                while($rd1 = mysqli_fetch_array($qry1)){
                                $rA = $rd1['A']; 
                                }
                            }
                    ?> 
                    <?php 
                        if($bnm == "All"){
                            $qB = "SELECT COUNT(ccarea) AS B FROM insert_client where ccarea = 'Angat' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }else{
                            $qB = "SELECT COUNT(ccarea) AS B FROM insert_client where cbranch ='$bnm' AND ccarea = 'Angat' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }  
                        $qry2 = mysqli_query($connection,$qB);    
                            if(mysqli_num_rows($qry2)>0){
                                while($rd2 = mysqli_fetch_array($qry2)){
                                $rB = $rd2['B']; 
                                }
                            }
                    ?> 
                    <?php 
                        if($bnm == "All"){
                            $qC = "SELECT COUNT(ccarea) AS C FROM insert_client where ccarea = 'Bocaue' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }else{
                            $qC = "SELECT COUNT(ccarea) AS C FROM insert_client where cbranch ='$bnm' AND ccarea = 'Bocaue' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }  
                        $qry3 = mysqli_query($connection,$qC);       
                            if(mysqli_num_rows($qry3)>0){
                                while($rd3 = mysqli_fetch_array($qry3)){
                                $rC = $rd3['C']; 
                                }
                            }
                    ?> 
                    <?php
                        if($bnm == "All"){
                            $qD = "SELECT COUNT(ccarea) AS D FROM insert_client where ccarea = 'Guiguinto' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }else{
                            $qD = "SELECT COUNT(ccarea) AS D FROM insert_client where cbranch ='$bnm' AND ccarea = 'Guiguinto' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }  
                        $qry4 = mysqli_query($connection,$qD);
                            if(mysqli_num_rows($qry4)>0){
                                while($rd4 = mysqli_fetch_array($qry4)){
                                $rD = $rd4['D']; 
                                }
                            }
                    ?> 
                    <?php 
                        if($bnm == "All"){
                            $qE = "SELECT COUNT(ccarea) AS E FROM insert_client where ccarea = 'Marilao' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }else{
                            $qE = "SELECT COUNT(ccarea) AS E FROM insert_client where cbranch ='$bnm' AND ccarea = 'Marilao' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }  
                        $qry5 = mysqli_query($connection,$qE);
                            if(mysqli_num_rows($qry5)>0){
                                while($rd5 = mysqli_fetch_array($qry5)){
                                $rE = $rd5['E']; 
                                }
                            }
                    ?> 
                    <?php 
                        if($bnm == "All"){
                            $qF = "SELECT COUNT(ccarea) AS F FROM insert_client where ccarea = 'Meycauayan' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }else{
                            $qF = "SELECT COUNT(ccarea) AS F FROM insert_client where cbranch ='$bnm' AND ccarea = 'Meycauayan' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }  
                        $qry6 = mysqli_query($connection,$qF);
                            if(mysqli_num_rows($qry6)>0){
                                while($rd6 = mysqli_fetch_array($qry6)){
                                $rF = $rd6['F']; 
                                }
                            }
                    ?> 
                    <?php 
                        if($bnm == "All"){
                            $qG = "SELECT COUNT(ccarea) AS G FROM insert_client where ccarea = 'Norzagaray' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }else{
                            $qG = "SELECT COUNT(ccarea) AS G FROM insert_client where cbranch ='$bnm' AND ccarea = 'Norzagaray' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }  
                        $qry7 = mysqli_query($connection,$qG);  
                            if(mysqli_num_rows($qry7)>0){
                                while($rd7 = mysqli_fetch_array($qry7)){
                                $rG = $rd7['G']; 
                                }
                            }
                    ?> 
                    <?php 
                        if($bnm == "All"){
                            $qH = "SELECT COUNT(ccarea) AS H FROM insert_client where ccarea = 'Pandi' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }else{
                            $qH = "SELECT COUNT(ccarea) AS H FROM insert_client where cbranch ='$bnm' AND ccarea = 'Pandi' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }  
                        $qry8 = mysqli_query($connection,$qH); 
                            if(mysqli_num_rows($qry8)>0){
                                while($rd8 = mysqli_fetch_array($qry8)){
                                $rH = $rd8['H']; 
                                }
                            }
                    ?> 
                    <?php 
                        if($bnm == "All"){
                            $qI = "SELECT COUNT(ccarea) AS I FROM insert_client where ccarea = 'San Jose Del Monte' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }else{
                            $qI = "SELECT COUNT(ccarea) AS I FROM insert_client where cbranch ='$bnm' AND ccarea = 'San Jose Del Monte' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        }                                  
                        $qry9 = mysqli_query($connection,$qI);
                            if(mysqli_num_rows($qry9)>0){
                                while($rd9 = mysqli_fetch_array($qry9)){
                                $rI = $rd9['I']; 
                                }
                            }
                    ?> 
                    <?php 
                        // if($bnm == "All"){
                        //     $qJ = "SELECT COUNT(ccarea) AS J FROM insert_client where ccarea = '10' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        // }else{
                        //     $qJ = "SELECT COUNT(ccarea) AS J FROM insert_client where cbranch ='$bnm' AND ccarea = '10' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        // }   
                        // $qry10 = mysqli_query($connection,$qJ);         
                        //     if(mysqli_num_rows($qry10)>0){
                        //         while($rd10 = mysqli_fetch_array($qry10)){
                        //         $rJ = $rd10['J']; 
                        //         }
                        //     }
                    ?> 
                    <?php 
                        // if($bnm == "All"){
                        //     $qK = "SELECT COUNT(ccarea) AS K FROM insert_client where ccarea = '11' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        // }else{
                        //     $qK = "SELECT COUNT(ccarea) AS K FROM insert_client where cbranch ='$bnm' AND ccarea = '11' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        // }   
                        // $qry11 = mysqli_query($connection,$qK);  
                        //     if(mysqli_num_rows($qry11)>0){
                        //         while($rd11 = mysqli_fetch_array($qry11)){
                        //         $rK = $rd11['K']; 
                        //         }
                        //     }
                    ?> 
                    <?php 
                        // if($bnm == "All"){
                        //     $qL = "SELECT COUNT(ccarea) AS L FROM insert_client where ccarea = '12' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        // }else{
                        //     $qL = "SELECT COUNT(ccarea) AS L FROM insert_client where cbranch ='$bnm' AND ccarea = '12' AND cloanstatus IN ('Released', 'OnGoing') "; 
                        // }   
                        // $qry12 = mysqli_query($connection,$qL);
                        //     if(mysqli_num_rows($qry12)>0){
                        //         while($rd12 = mysqli_fetch_array($qry12)){
                        //         $rL = $rd12['L']; 
                        //         }
                        //     }
                    ?> 
                    <div class="clArea">
                        <div class="clientArea">
                            <h3><?php echo $rA?> Clients</h3>
                            <p>Sta. Maria</p>
                        </div>
                        <div class="clientArea">
                            <h3><?php echo $rB?> Clients</h3>
                            <p>Angat</p>
                        </div>
                        <div class="clientArea">
                            <h3><?php echo $rC?> Clients</h3>
                            <p>Bocaue</p>
                        </div>
                        <div class="clientArea">
                            <h3><?php echo $rD?> Clients</h3>
                            <p>Guiguinto</p>
                        </div>
                        <div class="clientArea">
                            <h3><?php echo $rE?> Clients</h3>
                            <p>Marilao</p>
                        </div>
                        <div class="clientArea">
                            <h3><?php echo $rF?> Clients</h3>
                            <p>Meycauayan</p>
                        </div>
                        <div class="clientArea">
                            <h3><?php echo $rG?> Clients</h3>
                            <p>Norzagaray</p>
                        </div>
                        <div class="clientArea">
                            <h3><?php echo $rH?> Clients</h3>
                            <p>Pandi</p>
                        </div>
                        <div class="clientArea">
                            <h3><?php echo $rI ?> Clients</h3>
                            <p>San Jose Del Monte</p>
                        </div>
                        <!-- <div class="clientArea">
                            <h3><?php // echo $rJ?> Clients</h3>
                            <p>Area 10</p>
                        </div>
                        <div class="clientArea">
                            <h3><?php //echo $rK?> Clients</h3>
                            <p>Area 11</p>
                        </div>
                        <div class="clientArea">
                            <h3><?php //echo $rL?> Clients</h3>
                            <p>Area 12</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="dbProfile">
            <div class="dbExtras">
                <h1>Monthly Sales Update</h1>
            <div class="dbTopCA">
                <?php 
                    $ncq = mysqli_query($connection,"SELECT count(*) as nc FROM `insert_client` WHERE month(clisteddate) = month(CURRENT_DATE()) and year(clisteddate) = year(CURRENT_DATE()) and ccycle = 1");
                        while($ncrow =mysqli_fetch_assoc($ncq)){
                            $nc = $ncrow['nc'];
                        }
                ?>
                <div class="topCA">
                        <h3>New Clients</h3>
                        <?php echo $nc ?>
                </div>
                <div class="topCA">
                        <h3>Renewal Clients</h3>
                        To be followed
                </div>
                <?php 
                    $trncq = mysqli_query($connection,"SELECT sum(cloanamount) as nc FROM `insert_client` WHERE month(clisteddate) = month(CURRENT_DATE()) and year(clisteddate) = year(CURRENT_DATE()) and ccycle = 1");
                        while($trncrow =mysqli_fetch_assoc($trncq)){
                            $trnc = $trncrow['nc'];
                        }
                ?>
                <div class="topCA">
                        <h3>Total Release for New Clients</h3>
                        ₱ <?php echo number_format($trnc) ?>
                </div>
                <div class="topCA">
                        <h3>Total Release for Renewal Clients</h3>
                        To be followed
                </div>
                <?php 
                    $tcoq = mysqli_query($connection,"SELECT count(id) as nc from insert_client where coverdue>0");
                        while($tcorow =mysqli_fetch_assoc($tcoq)){
                            $tco = $tcorow['nc'];
                        }
                ?>
                <div class="topCA">
                        <h3>Total Clients with Overdue</h3>
                        <?php echo number_format($tco)?>
                </div>
                <?php 
                    $otcq = mysqli_query($connection,"SELECT count(*) as nc FROM `insert_client`");
                        while($otcrow =mysqli_fetch_assoc($otcq)){
                            $otc = $otcrow['nc'];
                        }
                ?>
                <div class="topCA">
                        <h3>Overall Total Clients</h3>
                        <?php echo number_format($otc)?>
                </div>
            </div>
            <div class="dashBtn">
                <button onclick="window.print(); return false;" media="print">Print Data <i class="fa fa-print"></i></button>
            </div> 
        </div>
    </div>
    
    <script>
    // Get the modal
        var modal = document.getElementById("dbcaModal");
        var btn = document.getElementById("viewcaModal");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
            }
            span.onclick = function() {
            modal.style.display = "none";
            }
            window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</section>
