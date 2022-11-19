<?php include_once 'db.php'?>
<script>

const mbll = [
        <?php
        $query = "select * from insert_client ";
        $myQuery = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($myQuery)){      
        ?>
        {id: '<?php echo $row['id'] ?>', area:'<?php echo $row['ccarea'] ?>'},
        <?php 
            } echo "{id:'', area:''}";
            ?>
    ];
<?php
    $count = mysqli_query($connection, "SELECT COUNT(id) as cid from insert_client");
?>
    // let ealselect = document.getElementsByClassName('eAmountLoaned1');
    for(let i = 0; i<; i++){
        // window.onload = function(){
            // document.getElementById("eApprovedLoan"+i).innerHTML = "₱ "+ mbll[parseInt(ealselect[i].selectedIndex)-1].loan;
            //     document.getElementById("eProcFee"+i).innerHTML = "₱ "+ mbll[parseInt(ealselect[i].selectedIndex)-1].procfee;
            //     document.getElementById("eInsPremium"+i).innerHTML = "₱ "+mbll[parseInt(ealselect[i].selectedIndex)-1].insurance;
            //     document.getElementById("eSecDep"+i).innerHTML = "₱ "+ mbll[parseInt(ealselect[i].selectedIndex)-1].secdep;
            //     document.getElementById("eAmountReceived"+i).innerHTML = "₱ "+ mbll[parseInt(ealselect[i].selectedIndex)-1].received;
            //     document.getElementById("eDailyCollection"+i).innerHTML = "₱ "+ mbll[parseInt(ealselect[i].selectedIndex)-1].daily;
            //     document.getElementsByClassName("eDaysRem")[i].innerHTML = "100 Days";
        // }
        console.log(mbll[i].area+"\n");
        // console.log('')
    }


</script>