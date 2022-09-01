<?php
    include_once 'header.php';
?>
<style>
    <?php include_once 'CSS/addclient.css'; ?>
    <?php include_once 'CSS/PrintAddClient/printComputation.css';?>
    <?php include_once 'CSS/PrintAddClient/printId.css';?>
    <?php include_once 'CSS/PrintAddClient/printCoMaker.css'?>
</style>
<script>
    <?php include_once 'JS/app.js'; ?>
</script>
<script>
    document.addEventListener('DOMContentLoaded',function (e){
    //    generate();
    });
</script>
            <section id="Add" class="navContent">
                <div class="addSteps">
                    <div class="stepCircle">
                        <div class="stepTool" id="stepNo1" style="background: navy;">
                            <span class="stepText">Personal Infomation</span>
                        </div>
                        <p>Step 1</p>
                    </div>
                    <div class="stepCircle">
                        <div class="stepTool" id="stepNo2">
                            <span class="stepText">Income Statement</span>
                        </div>
                        <p>Step 2</p>
                    </div>
                    <div class="stepCircle">
                        <div class="stepTool" id="stepNo3">
                            <span class="stepText">IDs and Credentials</span>
                        </div>
                        <p>Step 3</p>
                    </div>
                    <div class="stepCircle">
                        <div class="stepTool" id="stepNo4">
                            <span class="stepText">Co-maker Information</span>
                        </div>
                        <p>Step 4</p>
                    </div>
                </div>
               <div class="addClient">
               <?php
                        if(!isset($_GET['add'])){
                            echo '';
                        }else{
                            $addClientCheck = $_GET['add'];

                            if($addClientCheck == "filloutemptyspace"){
                                echo "<div class='error required'><p>Error : Please fill required fields</p></div>";
                            }elseif($addClientCheck == "contactexist"){
                                echo "<div class='error contact'><p>Error : Contact number exist</p></div>";
                            }elseif($addClientCheck == "comakerexist"){
                                echo "<div class='error contact'><p>Error : Co-maker exist</p></div>";
                            }elseif($addClientCheck == "highfile"){
                                echo "<div class='error highfile'><p>Error : Photo size too heavy</p></div>";
                            }elseif($addClientCheck == "emptyimage"){
                                echo "<div class='error empty'><p>Error : Please insert 2x2 picture</p></div>";
                            }elseif($addClientCheck == "imagefileonly"){
                                echo "<div class='error imagefile'><p>Error : Please insert right file</p></div>";
                            }elseif($addClientCheck == "failedtoupload"){
                                echo "<div class='error failed'><p>Error : Client adding error</p></div>";
                            }elseif($addClientCheck == "failedtocompile"){
                                echo "<div class='error failed'><p>Error : Client compilation error</p></div>";
                            }elseif($addClientCheck == "notagree"){
                                echo "<div class='error notagree'><p>Error : Please agree to all terms and condition</p></div>";
                            }elseif($addClientCheck == "success"){
                                echo "<div class='success success'><p>Client Added Successfully</p></div>";
                            }
                        }
                    ?>
                    <form id="addClientForm" action="ClientAddDatabase.php" method="POST" enctype="multipart/form-data">
                        <div class="addSetup">
                            <div class="addFirst"  id="addFirst">
                                <div id="clientForm1" class="clientForm1">
                                    <div class="caddInfo"><i class="fa fa-info-circle"></i>
                                        <span class="caddInfoText">
                                            <h4>Client Personal Information</h4>
                                            <p>Here you can add all the client's personal information and data.
                                                All spaces are required and need to be filled up by the CSS.
                                                Please complete all spaces and avoid all mispelling,
                                                incorrect data, and indexes to avoid errors.
                                            </p>
                                        </span>
                                    </div>
                                    <div id="clientPic" class="clientPic">
                                        <label for="image" id="labelForImg"><span class="errorSign">*</span></label>
                                        <img id="image" src="" alt="" onerror="this.src='IMG/defaultpic.jpg';">
                                        <input id="clientDP" type="file" onchange="getImagePreview(event)" name="clientDP">
                                    </div>
                                    <label id="labelPic" for="clientPic">Insert 2x2 Picture</label>
                                    <script>
                                        var idDiv = document.querySelector('.clientPic');
                                        var upload = document.querySelector('#clientDP');

                                        idDiv.addEventListener('mouseenter', function(){
                                            upload.style.display = "block"
                                            upload.style.visibility = "visible"
                                        });
                                        idDiv.addEventListener('mouseleave', function(){
                                            upload.style.display = "none"
                                        });
                                    </script>
                                    <div class="clientNo">
                                        <?php
                                            $q = "SELECT * FROM insert_client order by id desc limit 1";
                                            $qq = mysqli_query($connection,$q);
                                            $JZ = "JZMB";

                                            if(mysqli_num_rows($qq)> 0){
                                                while($row = mysqli_fetch_assoc($qq)){
                                                $ID = $row['id'];

                                                $numID = str_pad($ID+1, 5, '0', STR_PAD_LEFT);
                                                $formatID = $JZ.$numID;
                                                }
                                            }else{
                                                    $formatID = $JZ."00001";
                                                }
                                            
                                        ?>
                                        <p>Account ID: <input id="randAccNo" name="AccountID" type="text" value="<?php echo $formatID ?>" disabled></p>
                                    </div>
                                    <div>
                                    <?php 
                                    if($bnm == 'all'){
                                        echo " 
                                        <label for='acbranch'>Branch :</label>
                                        <select name='acbranch'>
                                            <option value='tandangsora'>Tandang Sora</option>
                                            <option value='stamaria'>Sta. Maria</option>
                                            <option value='meycauayan'>Meycauayan</option>
                                        </select>";
                                    } else{
                                        echo " 
                                        <span>Branch : $bname</span>
                                        <input type='hidden' name='acbranch' value='$bnm'>";
                                    }
                                    ?>
                                    </div>
                                    <div class="clientName data">
                                        <label for="clientName"><span class="errorSign">*</span> Name:</label>
                                        <input id="firstName" type="text" name="firstName" placeholder="First Name" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                                        <input id="middleName" type="text" name="middleName" placeholder="Middle Name" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                                        <input id="lastName" type="text" name="lastName" placeholder="Last Name" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                                        <input id="suffix" type="text" name="suffix" placeholder="Suffix" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                                    </div>
                                    <div class="clientAddress data">
                                        <label for="clientName"><span class="errorSign">*</span> Address</label>
                                        <Select id="clientArea" name="clientArea" value="Area" onchange="clientProfileInfo()">
                                            <option selected disabled hidden>Area</option>
                                            <?php
                                                $show_ca = "SELECT area FROM insert_creditanalyst group by area order by area ASC ";
                                                $show_ca_query = mysqli_query($connection, $show_ca);
                                                while($row = mysqli_fetch_assoc($show_ca_query)){
                                                    $caarea = $row['area'];
                                            ?>
                                                <option value="<?php echo $caarea ?>"><?php echo $caarea ?></option>
                                            <?php } ?>              
                                        </Select>
                                        <input id="houseNo" type="number" name="houseNo" placeholder="House #" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                                        <input id="street" type="text" name="street" placeholder="Bldg/Lot/Street" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                                        <input id="barangay" type="text" name="barangay" placeholder="Barangay" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                                        <input id="city" type="text" name="city" placeholder="City" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                                    </div>
                                    <div class="clientOthers">
                                    <p>Personal Information</p>
                                        <div class="clientInfo basics">
                                            <label for="contact"><span class="errorSign">*</span></label>
                                            <input id="contact" type="number" name="contact" placeholder="Contact No." onkeyup="clientProfile(this)">
                                            <input id="email" type="text" name="email" placeholder="Email" style="text-transform: lowercase;" onkeyup="clientProfile(this)">
                                            <label for="age"><span class="errorSign">*</span></label>
                                            <input id="age" type="number" name="age" placeholder="Age" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                                            <label for="gender"><span class="errorSign">*</span></label>
                                            <select name="gender" id="gender" onchange="clientProfileInfo()">
                                                <option selected disabled hidden>Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <input id="birthday" name="birthday" type="text" placeholder="Birthday" onclick="this.type='date'" onkeyup="clientProfile(this)" onchange="BdayAge()">
                                        </div>
                                        <div class="clientInfo address">
                                            <label for="clientName">Current Address</label>
                                            <input id="houseNo2" type="number" name="houseNo2" placeholder="House #">
                                            <input id="street2" type="text" name="street2" placeholder="Bldg/Lot/Street">
                                            <input id="barangay2" type="text" name="barangay2" placeholder="Barangay">
                                            <input id="city2" type="text" name="city2" placeholder="City">
                                        </div>
                                        <div class="clientInfo home">
                                            <input id="rent" type="radio" class="check" value="rent" name="clientHomeInfo" onclick="disable()">
                                            <label for="rent">Rent</label>
                                            <input id="wParents" type="radio" class="check" value="wParents" name="clientHomeInfo" onclick="disable()">
                                            <label for="wParents">Living with Parents</label>
                                            <input id="owned" type="radio" class="check" value="owned" name="clientHomeInfo" onclick="disable()">
                                            <label for="owned">Owned</label>
                                            <input id="mortgaged" type="radio" class="check" value="mortgaged" name="clientHomeInfo" onclick="disable()">
                                            <label for="mortgaged">Mortgaged</label>
                                            <input id="other" type="radio" class="other" value="others" valname="clientHomeInfo" onclick="enable()">
                                            <label for="other">Other</label>
                                            <input id="adOthers" type="text" name="adOthers" placeholder="Others" disabled>
                                            <script src="JS/app.js"></script>
                                        </div>
                                        <div class="clientInfo status">
                                            <input id="nationality" type="text" name="nationality" placeholder="Nationality" onkeyup="clientProfile(this)">
                                            <select name="clientCivil" id="civil" onchange="clientProfileInfo()">
                                                <option value="civil status" selected hidden>Civil Status</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="devorced">Divorced</option>
                                                <option value="widowed">Widowed</option>
                                            </select>
                                            <label for="ifMarried">If Married</label>
                                            <input id="ifMarried" type="text" name="ifMarried" placeholder="Name of Spouse" onkeyup="clientProfile(this)" disabled>
                                            <input id="child" type="number" name="child" placeholder="No. of Children" onkeyup="clientProfile(this)" disabled>
                                        </div>
                                    </div>
                                    <div class="clientPartner">
                                        <label for="coMaker"><span class="errorSign">*</span>Co Maker:</label>
                                        <input id="coMaker" type="text" name="coMaker" placeholder="Fullname" onkeyup="clientProfile(this)">
                                        <input id="coContact" type="number" name="coContact" placeholder="Contact No." onkeyup="clientProfile(this)">
                                        <label id="labelForRL" for="loanAmount">Request Loan Amount:</label>
                                        ₱ <input id="loanAmount" type="number" name="loanAmount" placeholder="00000.00" onkeyup="clientProfile(this)">
                                    </div>
                                    <div class="piViewButton pageOne">
                                        <button type="button" id="clearButton">Clear Form</button>
                                        <button type="button" class="piButton" id="piOpen" onclick="insertCInfo()">Next</button>
                                    </div>
                                </div>
                            </div>
                            <div class="addSecond" id="addSecond" style="display: none;">
                                <div id="clientForm2" class="clientForm2">
                                    <div class="caddInfo"><i class="fa fa-info-circle"></i>
                                        <span class="caddInfoText">
                                            <h4>Client Income Statement</h4>
                                            <p>Here you can input the client's cash flow base on the required
                                                budget limit for them to avail the loan they applying for.
                                                Client must have at least one (1) business to support the 
                                                loan's daily payment.
                                            </p>
                                        </span>
                                    </div>
                                    <h2>Client Income Statement</h2>
                                    <div class="ccTitle">
                                        <h4>Client Business</h4>
                                    </div>
                                    <div class="ccBusiness">
                                        <table>
                                            <tr>
                                                <th>Businesses</th>
                                                <th>Business Type</th>
                                                <th>Expenses</th>
                                                <th>Gross Sales</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input class="clBus" id="clBusiness1" type="text" name="clBusiness1" placeholder="Business A">
                                                    <input class="clBus" id="clBusiness2" type="text" name="clBusiness2" placeholder="Business B">
                                                    <input class="clBus" id="clBusiness3" type="text" name="clBusiness3" placeholder="Business C">
                                                </td>
                                                <td>
                                                    <input class="clType" id="clBType1" type="text" name="clBType1" placeholder="Ex. Food">
                                                    <input class="clType" id="clBType2" type="text" name="clBType2">
                                                    <input class="clType" id="clBType3" type="text" name="clBType3">
                                                </td>
                                                <td>
                                                <span class="spun"></span><input class="clNet" id="clBExpense1" type="number" name="clBExpense1" onkeyup="CIS()" value="0.00">
                                                <span class="spun"></span><input class="clNet" id="clBExpense2" type="number" name="clBExpense2" onkeyup="CIS()" value="0.00">
                                                <span class="spun"></span><input class="clNet" id="clBExpense3" type="number" name="clBExpense3" onkeyup="CIS()" value="0.00">
                                                </td>
                                                <td>
                                                <span class="spun"></span><input class="clNet" id="clBIncome1" type="number" name="clBIncome1" onkeyup="CIS()" value="0.00">
                                                <span class="spun"></span><input class="clNet" id="clBIncome2" type="number" name="clBIncome2" onkeyup="CIS()" value="0.00">
                                                <span class="spun"></span><input class="clNet" id="clBIncome3" type="number" name="clBIncome3" onkeyup="CIS()" value="0.00">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="ccBusTotal">
                                        <p>Total BUSS Net Income <span>(Gross Sales - Expenses)</span></p>
                                        =<h4 id="ctBusTotal">₱ 0.00</h4>
                                    </div>
                                    <div class="ccTitle">
                                        <h4>Client Household Income and Expenses</h4>
                                    </div>
                                    <div class="ccHousehold">
                                        <div>
                                            <div class="ctHIncome">
                                                <label for="ctHouseholdIn">Total Household Income</label><br>
                                                ₱<input id="ctHouseholdIn" type="number" name="ctHousehold" onkeyup="CIS()" value="0.00">
                                            </div>
                                            <div class="cthiDes">
                                                <p>Household Income includes Salary/Wages, Pension, and Remittances</p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="ctHIncome">
                                                <label for="ctHouseholdEx">Total Household Expenses</label><br>
                                                ₱<input id="ctHouseholdEx" type="number" name="ctHousehold" onkeyup="CIS()" value="0.00">
                                            </div>
                                            <div class="cthiDes">
                                                <p>Household Expenses includes Food, Rent, Utility Bills, School Expenses, and Other Household Payables.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ccHITotal">
                                        <p>Total HH Net Income <span>(HH Income - (HH Expenses + (HH Expenses(10%))</span></p>
                                        =<h4 id="ctHITotal">₱ 0.00</h4>
                                    </div>
                                    <div class="ccOATotal">
                                        <p>Overall Net Income <span>(BUSS Net Income + HH Net Income)</span></p>
                                        =<h4 id="oaTotal">₱ 0.00</h4>
                                    </div>
                                    <div class="ccTitle">
                                        <h4>Debt Capacity Analysis</h4>
                                    </div>
                                    <div class="cdCapacity">
                                        <div>
                                            <ul>
                                                <li><p>Amount Available for Debt Service</p></li>
                                                <li><p>Adjusted Debt Capacity at 35%</p></li>
                                                <li>
                                                    <p>Max Loanable Amount for 100 days</p>
                                                    <p><span>(Adj. Debt Capacity x 100 days)</span></p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <ul>
                                                <li><p id="dcAvailable">= ₱ 0.00</p></li>
                                                <li><p id="dcAdjusted">= ₱ 0.00</p></li>
                                                <li><p id="dcMaxloan" >= ₱ 0.00</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="piViewButton pageTwo">
                                        <button type="button" onclick="insertCInfo()">Prev</button>
                                        <button type="button" onclick="insertCValid()">Next</button>
                                        <button type="button" onclick="window.print(); return false;" id="clPrint" media="print" >Print Computation</button>
                                    </div>
                                    <div class="sigmatura" id="sigmatura">
                                        <i> Signature over printed name</i>
                                    </div>
                                </div>
                            </div>
                            <div class="addThird" id="addThird" style="display: none;">
                                <div id="clientForm3" class="clientForm3">
                                    <div class="caddInfo"><i class="fa fa-info-circle"></i>
                                        <span class="caddInfoText">
                                            <h4>Client Credentials</h4>
                                            <p>Here you will input the client's valid IDs (Primary and Secondary ID are accepted).
                                                At least one (1) Valid ID is required. Also you can add here the partial available loan amount
                                                the client can loan. <br>*Loanable amount is Required.
                                            </p>
                                        </span>
                                    </div>
                                    <div class="clIDSummary">
                                        <div id="idprev" class="clIDPic">
                                            <img id="image2" src="" alt="" onerror="this.src='IMG/defaultpic.jpg';">
                                        </div>
                                        <div class="clIDInfo">
                                            <div class="clID Acc">
                                                <p>Account ID: <span id="randAccNo2"><?php echo $formatID ?></span></p>
                                                <hr>
                                                <p id="clGenderPrev"></p><p>-</p><p id="clAgePrev"></p>
                                            </div>
                                            <div class="clID Name">
                                                <p>Name: 
                                                    <span id="clFNamePrev"></span>
                                                    <span id="clMNamePrev"></span>
                                                    <span id="clLNamePrev"></span>
                                                    <span id="clSNamePrev"></span>
                                                </p>
                                            </div>
                                            <div class="clID Address">
                                                <p>Address: 
                                                    <span id="clHMPrev"></span>
                                                    <span id="clSPrev"></span>
                                                    <span id="clBPrev"></span>
                                                    <span id="clCPrev"></span>
                                                </p>
                                            </div>
                                            <div class="clID CAName">
                                                <label for="clientCA">Credit Analyst:</label>
                                                <select name="clientCA" id="clientCA" style="padding-left:5px;" onchange="clientProfileInfo()">
                                                    <option selected  >SELECT YOUR AREA AT STEP 1</option>
                                                <?php                                                            
                                                    $show_ca = "SELECT * FROM insert_creditanalyst ORDER BY area asc, name ASC";
                                                    $show_ca_query = mysqli_query($connection, $show_ca);
                                                    while($row = mysqli_fetch_assoc($show_ca_query)){
                                                        $credanalArea = $row['area'];
                                                        $creditanalyst = $row['name']; 
                                                        $credbranch = $row['cabranch'];                                            
                                                ?>
                                                    <option value="<?php echo $creditanalyst ?>"><?php echo $credanalArea.' : '.$creditanalyst.' ('.$credbranch.')'?></option>
                                                <?php } ?>  
                                           </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $interest = "SELECT * FROM insert_interest ORDER BY id DESC LIMIT 1 ";
                                        $interest_query = mysqli_query($connection, $interest);
                                        $lastest_interest = mysqli_fetch_assoc($interest_query);
                                
                                    ?>
                                    <input type="hidden" name="int" value="<?php echo $lastest_interest['interest'] ?>" >
                                    <div class="clValidID">
                                        <div id="id1" class="ccValidIDs id1">
                                            <div id="idValid01" class="idValid01">
                                                <label id="labelForIDs" for="idImg01"><span class="errorSign">*</span>Required</label>
                                                <img id="idImg01" src="" alt="">
                                                <input id="cFirstID" type="file" onchange="getIDPreview1(event)" name="idValid01">
                                            </div>
                                            <script>
                                                var idDiv1 = document.querySelector('.idValid01');
                                                var cidUpload1 = document.querySelector('#cFirstID');

                                                idDiv1.addEventListener('mouseenter', function(){
                                                    cidUpload1.style.display = "block"
                                                    cidUpload1.style.visibility = "visible"
                                                });
                                                idDiv1.addEventListener('mouseleave', function(){
                                                    cidUpload1.style.display = "none"
                                                });
                                            </script>
                                            <div class="ccIDInfo">
                                                <select name="ValidID01" id="ValidID01"  onchange="clientProfileInfo()">
                                                    <option selected disabled hidden>Primary ID</option>
                                                    <option value="Philhealth">Philhealth ID</option>
                                                    <option value="SSS">SSS ID</option>
                                                    <option value="Tin">Tin ID</option>
                                                    <option value="Voters">Voters ID</option>
                                                    <option value="National">National ID</option>
                                                    <option value="Postal">Postal ID</option>
                                                    <option value="Passport">Passport</option>
                                                    <option value="License">Drivers License</option>
                                                    <option value="UMID">UMID</option>

                                                </select>
                                                <p>ID No. <input id="idNos1" name="idNos1" type="text" onkeyup="clientProfile(this)"></p>
                                            </div>
                                        </div>
                                        <div id="id2" class="ccValidIDs id2">
                                            <div id="idValid02" class="idValid02">
                                                <label id="labelForIDs" for="idImg02"><span class="errorSign">*</span>Required</label>
                                                <img id="idImg02" src="" alt="">
                                                <input id="cSecondID" type="file" onchange="getIDPreview2(event)" name="idValid02">
                                            </div>
                                            <script>
                                                var idDiv2 = document.querySelector('.idValid02');
                                                var cidUpload2 = document.querySelector('#cSecondID');

                                                idDiv2.addEventListener('mouseenter', function(){
                                                    cidUpload2.style.display = "block"
                                                    cidUpload2.style.visibility = "visible"
                                                });
                                                idDiv1.addEventListener('mouseleave', function(){
                                                    cidUpload2.style.display = "none"
                                                });
                                            </script>
                                            <div class="ccIDInfo">
                                                <select name="ValidID02" id="ValidID02" onchange="clientProfileInfo()" >
                                                    <option value="">Secondary ID</option>
                                                    <option value="Barangay">Barangay ID</option>
                                                    <option value="Company">Company ID</option>
                                                    <option value="Org">Organization ID</option>
                                                    <option value="College">College ID</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <p>ID No. <input id="idNos2" name="idNos2" type="text" onkeyup="clientProfile(this)"></p>
                                            </div>
                                        </div>
                                        <script>
                                            //input hover
                                            var idDiv2 = document.querySelector('#id1');
                                            var upload2 = document.querySelector('#cFirstID');
                                            idDiv2.addEventListener('mouseenter', function(){
                                                upload2.style.display = "block";
                                                upload2.style.visibility = "visible";
                                            });
                                            idDiv2.addEventListener('mouseleave', function(){
                                                upload2.style.display = "none"
                                            });
                                            var idDiv3 = document.querySelector('#id2');
                                            var upload3 = document.querySelector('#cSecondID');

                                            idDiv3.addEventListener('mouseenter', function(){
                                                upload3.style.display = "block";
                                                upload3.style.visibility = "visible";
                                            });
                                            idDiv3.addEventListener('mouseleave', function(){
                                                upload3.style.display = "none"
                                            });
                                        </script>
                                    </div>
                                    <div class="ccAgreeTerms">
                                        <div class="ccAgreement">
                                            <p>"I <span id="clLNamePrev2"></span>, <span id="clFNamePrev2"></span> <span id="clMNamePrev2"></span> <span id="clSNamePrev2"></span>, <span id="clAgePrev2"></span> of age
                                            certifies that all of the above ID credentials are all true
                                            and mine. I agree to all Terms and Conditions that JZ Finance
                                            has given me to loan on the company."
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ccSummary">
                                        <div class="comSummary ccBusTotal">
                                            <p>Total BUSS Net Income <span>(Gross Sales - Expenses)</span></p>
                                            <h4 id="ctBusTotal2">₱ 0.00</h4>
                                        </div>
                                        <div class="comSummary ccHITotal">
                                            <p>Total HH Net Income <span>(HH Income - (HH Expenses + (HH Expenses(10%))</span></p>
                                            <h4 id="ctHITotal2">₱ 0.00</h4>
                                        </div>
                                        <div class="comSummary ccOATotal">
                                            <p>Overall Net Income <span>(BUSS Net Income + HH Net Income)</span></p>
                                            <h4 id="oaTotal2">₱ 0000.00</h4>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="ccAllowed">
                                        <p>Loanable Amount <span>(Including Deductions)</span></p>
                                        <div><span class="errorSign" style="color:red">*</span>₱ <input id="ccLoan" name="loanable" type="number" placeholder="0000.00" value="0.00"></div>
                                    </div>

                                    <div class="piViewButton pageThree">
                                        <button type="button" onclick="insertCValid()">Prev</button>
                                        <button type="button" onclick="insertCComaker()">Next</button>
                                        <button type="button" onclick="window.print(); return false;" id="clPrint" media="print" >Print <i class="fa fa-print"></i></button>
                                    </div>
                                    <div class="sigmatura2" id="sigmatura2">
                                        <i> Signature over printed name</i>
                                    </div>
                                    <div class="disclaimer" id="disclaimer">
                                        <i>This document contains confidential information and is intended only for the recipient and may not be reproduced or circulated without owner and JZ Finance's prior consent</i>
                                    </div>
                                </div>
                            </div>
                            <div class="addForth" id="addForth" style="display: none;">
                                <div class="clientForm4" id="clientForm4">
                                    <div class="caddInfo"><i class="fa fa-info-circle"></i>
                                        <span class="caddInfoText">
                                            <h4>Client's Co-Maker Information</h4>
                                            <p>Here you will add the client's Co-Maker Information so that client will be legible
                                                to loan and to help the client on repaying the current balance. 
                                                All space are required.
                                                <br> *Co-maker must have at least a Profession or Business.
                                            </p>
                                        </span>
                                    </div>
                                    <div id="clCoMakerInfo" class="clCoMakerInfo">
                                        <h2>Co-Maker Information</h2>
                                        <div class="cmName">
                                            <div class="comName">
                                                <h4 id="clComakerPrev"></h4>
                                            </div>
                                            <h4 id="clComakerPrev"></h4>
                                            <p>Co-Maker Fullname</p>
                                        </div>
                                        <div class="cmDetails">
                                            <div>
                                                <label for="cmContact">Contact No.</label>
                                                <input id="cmContact" type="number" placeholder="Contact No.">
                                                <label id="labelForAdr" for="cmAddress"><span class="errorSign">*</span>Address</label>
                                                <input id="cmAddress" name="cmAddress" type="text" placeholder="Full Address" onkeyup="clientProfile(this)">
                                                <br>
                                                <label for="cmGender">Gender</label>
                                                <select name="cmGender" id="cmGender" onchange="clientProfileInfo()">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <label for="cmAge">Age</label>
                                                <input id="cmAge" name="cmAge" type="number" onkeyup="clientProfile(this)">
                                                <label id="cmBdayLabel" for="cmBday">Birthday</label>
                                                <input id="cmBday" name="cmBday" type="date" onkeyup="clientProfile(this)" onchange="CMBdayAge()">
                                                <label for="cmProfession">Profession</label>
                                                <input id="cmProfession" name="cmProfession" type="text" placeholder="Ex. Teacher" onkeyup="clientProfile(this)">
                                                <br>
                                                <label for="cmNationality">Nationality</label>
                                                <input id="cmNationality" name="cmNationality" type="text" placeholder="Nationality" onkeyup="clientProfile(this)">
                                                <label for="cmCivilStatus">Civil Status</label>
                                                <select name="cmCivilStatus" id="cmCivilStatus" onchange="clientProfileInfo()">
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Devorced">Divorced</option>
                                                    <option value="Widowed">Widowed</option>
                                                </select>
                                                <label id="cmBusLabel" for="cmBusiness"><span class="errorSign">*</span>Business</label>
                                                <input id="cmBusiness" name="cmBusiness" type="text" placeholder="Ex. Carenderia" onkeyup="clientProfile(this)">
                                            </div>
                                        </div>
                                        <div class="cmNetIncome">
                                            <p>Co-Maker Net Income</p>
                                            <div class="cmNetComputation">
                                                <div>
                                                    <br>
                                                    <p>Business Net Income</p>
                                                    <br>
                                                    <p>Household Net Income</p>
                                                    <br>
                                                </div>
                                                <ul>
                                                    <li><label for="">Gross</label></li>
                                                    <li>₱<input id="cmGross1" onkeyup="cmCal()" type="number" placeholder="00.00" value="00.00"></li>
                                                    <li>₱<input id="cmGross2" onkeyup="cmCal()" type="number" placeholder="00.00" value="00.00"></li>
                                                </ul>
                                                <ul>
                                                    <li><label for="">Expenses</label></li>
                                                    <li>₱<input id="cmExpenses1" onkeyup="cmCal()" type="number" placeholder="00.00" value="00.00"></li>
                                                    <li>₱<input id="cmExpenses2" onkeyup="cmCal()" type="number" placeholder="00.00" value="00.00"></li>
                                                    <li><p>Total Net Income</p><h4 id="cmTNI">₱ 0000.00</h4></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cdAgree">
                                            <input id="cdAgreeTerms" type="checkbox" name="cdAgreeTerms">
                                            <label for="cdAgreeTerms">I agree to all Terms and Conditions</label>
                                        </div>
                                        <div class="piViewButton pageFour">
                                            <button type="button" onclick="insertCComaker()">Prev</button>
                                            <button type="button" id="addButton"  disabled>Add Client</button>
                                            <button type="button "onclick="window.print(); return false;" id="clPrint" media="print" >Print Co-Maker</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ccInsertModal" id="ccInsertModal">
                    <div class="ccModal">
                        <span class="close">&times;</span>
                        <div class="ccText">
                            <h3>Add <span id="clFNamePrev3"></span> as Client ?</h3>
                            <p>Adding new client will proceed on including him/her on Records, Proceed?</p>
                            <button form="addClientForm" id="addClientBtn" type="submit" name="addClientBtn">Yes</button>
                        </div>
                    </div>
                </div>
                <script>
                    var ccModal = document.getElementById("ccInsertModal");
                    var ccBtn = document.getElementById("addButton");
                    var span = document.getElementsByClassName("close")[0];
                    ccBtn.onclick = function() {
                        ccModal.style.display = "block";
                        document.getElementById('ifMarried').disabled = false;
                        document.getElementById('child').disabled = false;
                        document.getElementById('randAccNo').disabled = false;
                        
                    }
                    span.onclick = function() {
                        ccModal.style.display = "none";
                        document.getElementById('ifMarried').disabled = true;
                        document.getElementById('child').disabled = true;
                        document.getElementById('randAccNo').disabled = true;
                    }
                    window.onclick = function(event) {
                        if (event.target == ccModal) {
                            ccModal.style.display = "none";
                            document.getElementById('ifMarried').disabled = true;
                            document.getElementById('child').disabled = true;
                            document.getElementById('randAccNo').disabled = true;
                        }
                    }
                </script>
            </section>
    <script>
            <?php include 'JS/addclient.js'?>
    </script>
<script>
    document.getElementById('clBExpense1').addEventListener("focusout",removeNan);
    document.getElementById('clBExpense2').addEventListener("focusout",removeNan);
    document.getElementById('clBExpense3').addEventListener("focusout",removeNan);
    document.getElementById('clBIncome1').addEventListener("focusout",removeNan);
    document.getElementById('clBIncome2').addEventListener("focusout",removeNan);
    document.getElementById('clBIncome3').addEventListener("focusout",removeNan);
    document.getElementById('ctHouseholdIn').addEventListener("focusout",removeNan);
    document.getElementById('ctHouseholdEx').addEventListener("focusout",removeNan);
    document.getElementById('cmGross1').addEventListener("focusout",removeNan2);
    document.getElementById('cmGross2').addEventListener("focusout",removeNan2);
    document.getElementById('cmExpenses1').addEventListener("focusout",removeNan2);
    document.getElementById('cmExpenses2').addEventListener("focusout",removeNan2);
    document.getElementById('ccLoan').addEventListener("focusout",removeNan3);
</script>
<script>
    var civil_status = document.getElementById('civil');
    var ifmarried = document.getElementById('ifMarried');
    var child = document.getElementById('child');

    civil_status.onchange = function(){
        if(civil_status.value !== "single"){
            ifmarried.removeAttribute('disabled');
            child.removeAttribute('disabled');
        }else if(civil_status.value == "single"){
            ifmarried.setAttribute('disabled', 'true');
            child.setAttribute('disabled', 'true');
        }
    }  
</script>
<script>
    var cdTerms = document.getElementById("cdAgreeTerms");
    var addBtn = document.getElementById("addButton");
    cdTerms.onchange = function(){
        if(this.checked){
            addBtn.disabled = false;
        }else{
            addBtn.disabled = true;
        }
    }
</script>

<script >
var input;
let lcn = document.getElementById("clientArea");

    lcn.onchange = function(){

        let index = lcn.options[lcn.selectedIndex].index;

        let lca = document.getElementById("clientCA");
        let selected = lca.selectedIndex = index;
        if(selected<0){
         
        } else{
            lca.selectedIndex = index;
        }
        console.log(index);

}
</script>

<script>
    document.getElementById("firstName").value          = getSavedValue("firstName");
    document.getElementById("middleName").value         = getSavedValue("middleName");
    document.getElementById("lastName").value           = getSavedValue("lastName");
    document.getElementById("suffix").value             = getSavedValue("suffix");
    document.getElementById("houseNo").value            = getSavedValue("houseNo");
    document.getElementById("street").value             = getSavedValue("street");
    document.getElementById("barangay").value           = getSavedValue("barangay");
    document.getElementById("city").value               = getSavedValue("city");
    document.getElementById("contact").value            = getSavedValue("contact");
    document.getElementById("email").value              = getSavedValue("email");
    document.getElementById("age").value                = getSavedValue("age");
    document.getElementById("birthday").value           = getSavedValue("birthday");
    document.getElementById("nationality").value        = getSavedValue("nationality");
    document.getElementById("coMaker").value            = getSavedValue("coMaker");
    document.getElementById("coContact").value          = getSavedValue("coContact");
    document.getElementById("loanAmount").value         = getSavedValue("loanAmount");
    document.getElementById("clientCA").value           = getSavedValue("clientCA");
    document.getElementById("idNos1").value             = getSavedValue("idNos1");
    document.getElementById("idNos2").value             = getSavedValue("idNos2");
    document.getElementById("ccLoan").value             = getSavedValue("ccLoan");
    document.getElementById("cmAddress").value          = getSavedValue("cmAddress");
    document.getElementById("cmAge").value              = getSavedValue("cmAge");
    document.getElementById("cmBday").value             = getSavedValue("cmBday");
    document.getElementById("cmProfession").value       = getSavedValue("cmProfession");
    document.getElementById("cmNationality").value      = getSavedValue("cmNationality");
    document.getElementById("cmBusiness").value         = getSavedValue("cmBusiness");
    
    function clientProfile(e){
        var id   = e.id;
        var val  = e.value;
        localStorage.setItem(id, val);
    }
    function getSavedValue (v){
        if(!localStorage.getItem(v)){
            return "";
        }
        return localStorage.getItem(v);
    }



</script>
<script>
    const complete  = document.getElementById("addClientForm");

    if(window.location.href === "http://localhost/jz_finance/JZ_Finance1.0/AddClient.php?add=success"){
        complete.reset();

    }
</script>