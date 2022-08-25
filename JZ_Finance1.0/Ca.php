<?php
     include_once 'header.php';
?>
<style>
    <?php include_once 'CSS/ca.css'; ?>
    <?php include_once 'CSS/caPrint.css'; ?>
</style>


<div id="no-print" class = "caContainer">
    <h1>Credit Analyst of <?php echo $bname ?></h1>
            <select name="caName" id="caNameID" onchange = "caFilter()">
                <?php 
                    if($bnm == "all"){
                        $caquery = "SELECT * FROM insert_creditanalyst ORDER BY area asc, name asc";
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
                        if($ca['cabranch'] == 'tandangsora'){
                            $cab = 'Tandang Sora';
                        }
                        if($ca['cabranch'] == 'meycauayan'){
                            $cab = 'Meycauayan';
                        }
                        if($ca['cabranch'] == 'stamaria'){
                            $cab = 'Sta. Maria';
                        }
                ?>   
                    <option value="<?php echo $ca['area']?>">Area <?php echo $ca['area'] ?> : <?php echo $ca['name'].' ('.$cab.')' ?></option>
                <?php }}else{
                    echo "<option value=''>No Credit Analyst</option>";
                    }?>
            </select>
            <h2>Current Clients</h2>

            
        <div class = "caContent">
        <!-- <table>
 
        </table> -->
        <table id="tCurrent">
        <tr id="theadtr">
                <th width="7%">Area</th>
                <th width="20%">Credit Analyst</th>
                <th width="30%">Client Name</th>
                <th width="15%">Loan</th>
                <th width="8%">DC</th>
                <th width="10%">SecDep</th>
                <th width="15%">Days</th>

        </tr>
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
                $canalyst = $row2['ccreditanalyst'];
                $approvedloan = $row2['cloanamount'];
    ?>
        <tr>
            <td  style ="display:none" ><?php echo $row2['ccreditanalyst']?></td>
            <td ><p><?php echo $row2['ccarea']?></p></td>
            <td ><?php echo $canalyst?></td>
            <td><p><?php echo $row2['clastname'].", ".$row2['cfirstname']?></p></td>
            <td ><p>₱ <?php echo number_format($approvedloan,2)?></p></td>
            <td ><p><?php echo $approvedloan/100 ?></p></td>
            <td >20</td>
            <td  id="tdDaysRemaining<?php echo $drIndex2?>" class="tdDaysRemaining2" data-date="<?php echo $row2['cmaturitydate']?>"><p class="days"></p>                        

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
                            countDownDate[i]['el'].querySelector('.days').innerHTML = countDownDate[i]['days']+" days";
                            }
                        }
                            }, 1);
                    }
                });

            </script></td>

        </tr>                    
        <?php } ?>
    </table>  
            

            </div>
            <button onclick="window.print(); return false;">Print</button>
</div>
<div id="print">
    
</div>
<script>
    <?php include 'JS/ca.js'?>
</script>
