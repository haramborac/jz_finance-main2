<?php
    include_once 'header.php';
?>
<style>
    <?php include_once 'CSS/settings.css'; ?>
</style>

<div class="systemSetting">
    <div class="settingContent">
        <div class="settingsFC ssContent">
            <h4>Deduction Settings</h4>
            <div class="loanPlanSetup interest">
                <div class="loanPlanInfo">
                    <h4>Edit Interest Rate</h4>
                    <div class="editIntTool"><i class="fa fa-info-circle"></i>
                        <span class="editIntText">
                            <p>Here you can edit the current interest rate given to the clients.
                                Future interest will be edited here and will automatically deducted to future
                                clients. 
                            </p>
                        </span>
                    </div>
                </div>
                <div class="addInterest">
                    <div>
                        <h1>%</h1>
                        <h4>Set New Interest</h4>
                        <p>Changing the current interest will not affect the past interest given to old clients</p>
                    </div>
                    <div>
                        <?php
                            $interest = "SELECT * FROM insert_interest ORDER BY id DESC LIMIT 1 ";
                            $interest_query = mysqli_query($connection, $interest);
                            $lastest_interest = mysqli_fetch_assoc($interest_query);
                        
                        ?>
                        <form action="" method="post">
                            <span><input type="number" name="int" value="<?php echo $lastest_interest['interest'] ?>"><h3>%</h3></span>
                            <button type="submit" name="newinterest">Change Interest</button>
                        </form>   
                    </div>
                </div>
            </div>
            <div class="loanDeducInfo">
                <h4>Add New Deductions</h4>
                <div class="editDeducTool"><i class="fa fa-info-circle"></i>
                    <span class="editDeducText">
                        <p>Here you can add and edit deductions base on the approved settings by the management.
                            Editing current dedudctions will affect all deductions given to clients.
                        </p>
                    </span>
                </div>
            </div>
            <div class="deductTitles">
                <ul>
                    <li>DC <p>Daily Collection</p></li>
                    <li>PF <p>Processing Fee</p></li>
                    <li>IP <p>Insurance Premium</p></li>
                    <li>SD <p>Security Deposit</p></li>
                </ul>
            </div>
            <!-- ADD LOAN -->
            <form action="" method="post">
                <table>
                    <tr>
                        <th width="20%">Loan Amount</th>
                        <th width="10%">DC</th>
                        <th width="10%">PF</th>
                        <th width="10%">IP</th>
                        <th width="10%">SD</th>
                        <th width="30%">Tools</th>
                    </tr>
                    </tr>
                        <td id="customSetLoan"><p><span>₱</span> <input type="number" id="inputla" name="loanAmount" value="0"></p></td>
                        <td><p><span>₱</span> <input type="number" name="dailyCollection" value="0" id='dcol'></p></td>
                        <td><p><span>₱</span> <input type="number" name="processingFee" value="0"></p></td>
                        <td><p><span>₱</span> <input type="number" name="insPremium" value="0"></p></td>
                        <td><p><span>₱</span> <input type="number" name="secDeposit" value="0"></p></td>
                        <td id="addLoanPlan"><p><span><button type="submit" name="addloan">Add Loan Plan</button></span></p></td>
                    </tr>
                    <script defer>
                        let inputla = document.getElementById('inputla');
                        let dcol = document.getElementById('dcol');

                        inputla.onkeyup = function(){
                            let la = inputla.value;
                            let val = la / 100;

                            dcol.value = val;
                        }

                    </script>
                </table>
                <div class="cdeducTitle">
                    <p>Current Deductions</p>
                </div>
                <div class="currentDeductions">
                    <table id="curDeducTable">
                        <?php 
                            $show_loans = "SELECT * FROM insert_deduction ORDER BY loan_amount ASC";
                            $show_loans_query = mysqli_query($connection, $show_loans);
                            while($loans = mysqli_fetch_assoc($show_loans_query)){
                        
                        ?>
                        <tr>
                            <td width="20%"><p><span>₱ <?php echo $loans['loan_amount'] ?></span></p></td>
                            <td width="15%"><p><span>₱ <?php echo $loans['daily_collection'] ?></span></p></td>
                            <td width="11%"><p><span>₱ <?php echo $loans['processing_fee'] ?></span></p></td>
                            <td width="11%"><p><span>₱ <?php echo $loans['ins_premium'] ?></span></p></td>
                            <td width="11%"><p><span>₱ <?php echo $loans['sec_deposit'] ?></span></p></td>
                            <!-- <td><p><span>₱</span> <input type="number" value="<?php //echo $loans['others'] ?>"></p></td> -->
                            <td width="30%" id="deductTools">
                                <a type="button" id="editDeduct" class="editDeduct">Edit</a>
                                <a href="Settings.php?delete_loan=<?php echo $loans['id'] ?>" id="deleteDeduct" class="deleteDeduct">Delete</a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
            </form>
            <?php 
                $show_loans = "SELECT * FROM insert_deduction";
                $show_loans_query = mysqli_query($connection, $show_loans);
                while($loans = mysqli_fetch_assoc($show_loans_query)){
            
            ?>
            <form action="" method="post">
                <div class="editDeductModal" id="editDeductModal">
                    <div class="editDeductContent">
                        <span class="deductClose">&times;</span>
                        <h4>Edit Deduction Values</h4>
                        <div class="deductionValues">
                            <div>
                                <input type="hidden" name="editloan_id" value="<?php echo $loans['id'] ?>">
                                <p>₱ <?php echo $loans['loan_amount'] ?></p>
                            </div>
                            <div>
                                <label for="">DC</label>
                                <p>₱ <?php echo $loans['daily_collection'] ?></p>
                            </div>
                            <div>
                                <label for="deductPF">PF</label>
                                <input type="number" name="deductPF" value="<?php echo $loans['processing_fee'] ?>">
                            </div>
                            <div>
                                <label for="">IP</label>
                                <input type="number" name="deductIP" value="<?php echo $loans['ins_premium'] ?>">
                            </div>
                            <div>
                                <label for="">SD</label>
                                <input type="number" name="deductSD" value="<?php echo $loans['sec_deposit'] ?>">
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="editDe">Save</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php } ?>
            <script>
                var editDeductModal = document.getElementsByClassName("editDeductModal");
                var deductBtn = document.getElementsByClassName("editDeduct");
                var deductSpan = document.getElementsByClassName("deductClose");
                for(let settings=0; settings<editDeductModal.length; settings++){
                        deductBtn[settings].onclick = function() {
                        editDeductModal[settings].style.display = "block";
                    }
                }
                for(let settings1=0; settings1<editDeductModal.length; settings1++){
                        deductSpan[settings1].onclick = function() {
                        editDeductModal[settings1].style.display = "none";
                    }
                }
                    window.onclick = function(event) {
                        if (event.target == editDeductModal) {
                            editDeductModal.style.display = "none";
                        }
                    }
            </script>
        </div>
        <div class="settingsFC scAccount">
            <h4>Account Setup</h4>
            <div class="adminBlockSetup" id="adminBlockSetup">
                <div class="restrictedBlock">
                    <h4>For <br><span>JZFinance Admin</span><br> Setup Only</h4>
                </div>
            </div>
            <div class="employeeSetup">
                <div class="addEmpInfo">
                    <h4>Add Credit Analyst</h4>
                    <div class="addEmpTool"><i class="fa fa-info-circle"></i>
                        <span class="addEmpText">
                            <p>Here you can add new Credit Analyst and his/her assigned area.
                            Also, you can edit CA Name and Area on the Tool column.
                            </p>
                        </span>
                    </div>
                </div>
                <div class="addEmployee addCreditAnalyst">
                    <?php

                        if(isset($_POST['addCA'])){
                            $CAName = $_POST['CA'];
                            $CAArea = $_POST['caArea'];
                            $CABranch = $_POST['acbranch'];
                            $query = "INSERT INTO insert_creditanalyst (cabranch, name, area) VALUES ('$CABranch','$CAName', '$CAArea')";
                            mysqli_query($connection, $query);
                            header('location:settings.php');
                        }
                    
                    ?>
                    <form action="" method="post">
                        <div class="ssCAAdd">
                            <div>
                                <label for="cArea">CA Area:</label>
                                <select name="caArea" id="caArea">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div>
                            <?php 
                                        echo " 
                                        <label for='acbranch'>Branch :</label>
                                        <select name='acbranch'>
                                            <option value='tandangsora'>Tandang Sora</option>
                                            <option value='stamaria'>Sta. Maria</option>
                                            <option value='meycauayan'>Meycauayan</option>
                                        </select>";
                                    
                                    ?>
                            </div>
                            <div>
                                <label for="CA">CA Name:</label>
                                <input type="text" name="CA" placeholder="Ex. Juan Dela Crus">
                            </div>
                            <button id="ssCAAddButton" name="addCA" type="submit">Add Credit Analyst</button>
                        </div>
                    </form>
                </div>
                <div class="scTable">
                    <table id="caTableTitle">
                        <tr>
                            <th width="10%">Area</th>
                            <th width="20">Branch</th>
                            <th width="30%">Credit Analyst Name</th>
                            <th width="40%">Tool</th>
                        </tr>
                    </table>
                    <div class="sctContent">
                        <table id="caTableContent">
                            <?php

                                $show_ca = "SELECT * FROM insert_creditanalyst ORDER BY area ASC, name ASC";
                                $show_ca_query = mysqli_query($connection, $show_ca);
                                while($row = mysqli_fetch_assoc($show_ca_query)){
                                    $creditanalyst = $row['name'];
                                    $bnm = $row['cabranch'];
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
                                <td width="10%"><?php echo $row['area'] ?></td>
                                <td width="20"><?php echo $bname ?></td>
                                <td width="30%"><?php echo $creditanalyst ?></td>
                                <td width="40%" id="scTabButton">
                                    <button id="editCA" class="editCA" type="button">Edit</button>
                                    <button id="deleteCA" type="button"><a href="Settings.php?delete_ca=<?php echo $row['id'] ?>">Delete</a></button>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="employeeSetup">
                <div class="addEmpInfo">
                    <h4>Add Customer Service Specialist</h4>
                    <div class="addEmpTool"><i class="fa fa-info-circle"></i>
                        <span class="addCSSText">
                            <p>Here you can add and register new Customer Service Specialist 
                                for them to access and control the system.
                            </p>
                        </span>
                    </div>
                </div>
                <div class="addEmployee addCSS">
                    <div class="registeredCSS register">
                        <form action="loginFormCode.php" method="POST">
                            <div>
                                <select name="csBranch" id="csBranch" name="csBranch">
                                    <option value="tandangsora" name="tandangsora">Tandang Sora</option>
                                    <option value="stamaria" name="stamaria">Sta. Maria</option>
                                    <option value="meycauayan" name="meycauayan">Meycauayan</option>
                                    <option value="all">All Branches</option>
                                </select>
                            </div>
                            <div>
                                <label for="cssName">Fullname</label>
                                <input type="text" name="fullname" placeholder="Ex. Juan Dela Crus" autocomplete="off">
                            </div>
                            <div>
                                <label for="cssUsername">Username</label>
                                <input type="text" name="username" placeholder="Ex. Juan" autocomplete="off">
                            </div>
                            <div>
                                <label for="cssPassword">Password</label>
                                <input type="password" name="password" autocomplete="off">
                            </div>
                            <button type="submit" name="cssCreate">Register</button>
                        </form>
                    </div>
                    <div class="registeredCSS registered">
                        <p>Registered CSS</p>
                        <table id = "registeredt">
                            <thead>
                                <th width="33%">Branch</th>
                                <th width="33%">Username</th>
                                <th width="33%">Tool</th>
                            </thead>
                            <tbody >
                            <?php 
                                $cssQ = "SELECT * FROM insert_cssaccount limit 7";
                                $ccsCQ = mysqli_query($connection,$cssQ);
                                while($cssRow = mysqli_fetch_assoc($ccsCQ)){
                                    $name = $cssRow['username'];
                                    $ibrnch = $cssRow['branch'];

                                    if($ibrnch == "tandangsora"){
                                        $brnch = 'Tandang Sora' ;
                                    }
                                    elseif($ibrnch == "meycauayan"){
                                        $brnch = 'Meycauayan' ;
                                    }
                                    elseif($ibrnch == "stamaria"){
                                        $brnch = 'Sta. Maria' ;
                                    }
                                    elseif($ibrnch == "all"){
                                        $brnch = "All Branches";
                                    }
                            ?>
                                <tr >
                                    <td id="disCssBranch" width="33%"><?php echo $brnch?></td>
                                    <td id="disCssUser" width="33%"><span id="cssAccessAcc"><?php echo $name ?></span></td>
                                    <td id="delCSS" width="33%">
                                        <a href="Settings.php?delete_css=<?php echo $cssRow['id'] ?>"><button id="delAccCSS" type="button">Delete</button></a>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <script>
                                var accessAccount   = document.getElementById("cssAccessAcc");
                                var mainBranch     = document.getElementById("disCssBranch");
                                var mainAdmin       = document.getElementById("disCssUser");
                                var mainDelfunc     = document.getElementById("delCSS");

                                if(accessAccount.innerHTML = "Chatspeak Admin"){
                                    mainAdmin.style.display     = "none";
                                    mainBranch.style.display     = "none";
                                    mainDelfunc.style.display     = "none";
                                }
                            </script>
                    </div>
                </div>
            </div>
            <?php 
                $showca = "SELECT * FROM insert_creditanalyst ORDER BY area ASC, name ASC";
                $showcaq = mysqli_query($connection, $showca);
                while($row = mysqli_fetch_assoc($showcaq)){
                    $idrow = $row['id'];
                    $namerow = $row['name'];
            ?>
            <form action="" method="post">
                <div class="editCAModal" id="editCAModal" class="editCAModal">
                    <div class="editModalContent">
                        <span class="close">&times;</span>
                        <h4>Edit Credit Analyst</h4>
                        <div class="editCreditAnalyst">
                            <div>
                                <label for="editArea">Area:</label>
                                <select name="editArea" class="editArea">
                                <option value="<?php echo $row['area'] ?>"><?php echo $row['area'] ?></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div>
                            <?php 
                                        echo " 
                                        <label for='acbranch2'>Branch :</label>
                                        <select name='acbranch2'>
                                            <option value='tandangsora'>Tandang Sora</option>
                                            <option value='stamaria'>Sta. Maria</option>
                                            <option value='meycauayan'>Meycauayan</option>
                                        </select>";
                                    
                                    ?>
                            </div>
                            <div>
                                <input type="hidden" name="editcaid" value="<?php echo $idrow ?>">
                                <label for="editCAName">CA Name</label>
                                <input type="text" name="editCAName" value="<?php echo $namerow ?>">
                            </div>
                        </div>
                              
                        <div>
                            <button type="submit" name="editCa">Save</button>
                        </div>
                        <script>
                            var editCAModal = document.getElementsByClassName("editCAModal");
                            var ecaBtn = document.getElementsByClassName("editCA");
                            var span = document.getElementsByClassName("close");
                            
                        for(let eca=0;eca<editCAModal.length;eca++){
                            ecaBtn[eca].onclick = function() {
                                editCAModal[eca].style.display = "block";
                            }
                        }
                        for(let span2=0;span2<span.length;span2++){
                            span[span2].onclick = function() {
                                editCAModal[span2].style.display = "none";
                            }
                        }
                            window.onclick = function(event) {
                                if (event.target == editCAModal) {
                                    editCAModal.style.display = "none";
                                }
                            }
                        </script>
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    var adminAccount    = document.getElementById("accountName");
    var restricted      = document.getElementById("adminBlockSetup");
    var deductions      = document.getElementsByClassName("deleteDeduct");

    if(adminAccount.innerHTML === "Chatspeak Admin"){
        restricted.style.display = "none";
        
        for(let delD = 0; delD<deductions.length; delD++){
            deductions[delD].style.display = "block";
        }
    }

</script>
<?php

    //INTEREST                            
    if(isset($_POST['newinterest'])){
        $newinterest = $_POST['int'];
        $interest_query = "INSERT INTO insert_interest (interest) VALUES ($newinterest)";
        mysqli_query($connection, $interest_query);
        header('location:Settings.php');
    }
    //ADD NEW LOAN
    if(isset($_POST['addloan'])){
        $addloan = $_POST['loanAmount'];
        $daily = $_POST['dailyCollection'];
        $procfee = $_POST['processingFee'];
        $insprem = $_POST['insPremium'];
        $secdep = $_POST['secDeposit'];
        $add_loan = "INSERT INTO insert_deduction (loan_amount, daily_collection, processing_fee, ins_premium, sec_deposit) VALUES ($addloan, $daily, $procfee, $insprem, $secdep)";
        mysqli_query($connection, $add_loan);
        header('location:Settings.php');

    }
    //EDIT LOAN
    if(isset($_POST['editDe'])){
        echo $editloan_id = $_POST['editloan_id'];
        $editprocfee = $_POST['deductPF'];
        $editinsprem = $_POST['deductIP'];
        $editsecdep = $_POST['deductSD'];
        $editloan = "UPDATE insert_deduction SET processing_fee = $editprocfee, ins_premium = $editinsprem, sec_deposit = $editsecdep WHERE id = $editloan_id";
        mysqli_query($connection, $editloan);
        header('location:Settings.php');
    }
    //DELETE LOAN
    if(isset($_GET['delete_loan'])){
        $del_loan_id = $_GET['delete_loan'];
        $delete_loan = "DELETE FROM insert_deduction WHERE id = $del_loan_id ";
        mysqli_query($connection, $delete_loan);
        header('location:Settings.php');
 
    }
    //EDIT CA
    if(isset($_POST['editCa'])){
        $edit_ca_id = $_POST['editcaid'];
        $editca = $_POST['editCAName'];
        $editcaarea = $_POST['editArea'];
        $editcabranch = $_POST['acbranch2'];
        $editcaquery = "UPDATE insert_creditanalyst SET cabranch = '$editcabranch', name = '$editca', area = '$editcaarea' WHERE id = $edit_ca_id ";
        mysqli_query($connection, $editcaquery);
        header('location:Settings.php');
    }
    //DELETE CA
    if(isset($_GET['delete_ca'])){ 
        $del_ca_id = $_GET['delete_ca'];
        $delete_ca = "DELETE FROM insert_creditanalyst WHERE id = $del_ca_id ";
        mysqli_query($connection, $delete_ca);
        header('location:Settings.php');
    }
    //DELETE CSS
    if(isset($_GET['delete_css'])){
        $del_css_id = $_GET['delete_css'];
        $del_css = "DELETE FROM insert_cssaccount WHERE id = $del_css_id ";
        mysqli_query($connection, $del_css);
        header('location:Settings.php');
    }
?>
