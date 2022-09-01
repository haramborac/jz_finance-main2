<?php include_once 'header.php' ?>
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

    });
</script>
<section id="Add" class="navContent">
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
            if(isset($_GET['edit'])){
                $id = $_GET['edit'];
                $showclientinfo = "SELECT * FROM insert_client WHERE id = $id ";
                $showclientinfo_query = mysqli_query($connection, $showclientinfo);

                while($row = mysqli_fetch_assoc($showclientinfo_query)){
                    $editid = $row['id'];
                    $clientid = $row['clientid'];
        ?>
        <form id="addClientForm" action="" method="POST" enctype="multipart/form-data">
            <div class="addSetup">
                <div class="addFirst"  id="addFirst">
                    <div id="clientForm1" class="clientForm1">
                        <div id="clientPic" class="clientPic">
                            <label for="image" id="labelForImg"><span class="errorSign">*</span></label>
                            <img id="image" src="2x2Pics/<?php echo $row['cphoto'] ?>" alt="" onerror="this.src='IMG/defaultpic.jpg';">
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
                            <p>Account ID: <input id="randAccNo" name="AccountID" type="text" value="<?php echo $clientid ?>"></p>
                        </div>
                        <div class="clientName data">
                            <label for="clientName"><span class="errorSign">*</span> Name:</label>
                            <input id="firstName" type="text" name="firstName" value="<?php echo $row['cfirstname'] ?>" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                            <input id="middleName" type="text" name="middleName" value="<?php echo $row['cmidname'] ?>" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                            <input id="lastName" type="text" name="lastName" value="<?php echo $row['clastname'] ?>" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                            <input id="suffix" type="text" name="suffix" value="<?php echo $row['csuffix'] ?>" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                        </div>
                        <div class="clientAddress data">
                            <label for="clientName"><span class="errorSign">*</span> Address</label>
                            <Select id="clientArea" name="clientArea" value="Area" onchange="clientProfileInfo()">
                                <option value="<?php echo $row['ccarea'] ?>" hidden><?php echo $row['ccarea'] ?></option>
                                <?php
                                    $show_ca = "SELECT area FROM insert_creditanalyst group by area order by area ASC ";
                                    $show_ca_query = mysqli_query($connection, $show_ca);
                                    while($row1 = mysqli_fetch_assoc($show_ca_query)){
                                        $caarea = $row1['area'];
                                ?>
                                    <option value="<?php echo $caarea ?>"><?php echo $caarea ?></option>
                                <?php } ?>              
                            </Select>
                            <input id="houseNo" type="number" name="houseNo" value="<?php echo $row['cchnumber'] ?>"  onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                            <input id="street" type="text" name="street" value="<?php echo $row['ccstreet'] ?>"  onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                            <input id="barangay" type="text" name="barangay" value="<?php echo $row['ccbarangay'] ?>"  onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                            <input id="city" type="text" name="city" value="<?php echo $row['cccity'] ?>"  onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                        </div>
                        <div class="clientOthers">
                        <p>Personal Information</p>
                            <div class="clientInfo basics">
                                <label for="contact"><span class="errorSign">*</span></label>
                                <input id="contact" type="number" name="contact" value="<?php echo $row['ccontact'] ?>" onkeyup="clientProfile(this)">
                                <input id="email" type="text" name="email" value="<?php echo $row['cemail'] ?>" style="text-transform: lowercase;" onkeyup="clientProfile(this)">
                                <label for="age"><span class="errorSign">*</span></label>
                                <input id="age" type="number" name="age" value="<?php echo $row['cage'] ?>" onchange="clientProfileInfo()" onkeyup="clientProfile(this)">
                                <label for="gender"><span class="errorSign">*</span></label>
                                <select name="gender" id="gender" onchange="clientProfileInfo()">
                                    <option value="<?php echo $row['cgender'] ?>" selected hidden><?php echo $row['cgender'] ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <input id="birthday" name="birthday" type="text" value="<?php echo date('m/d/Y',strtotime($row['cbirthday'])) ?>" onclick="this.type='date'" onkeyup="clientProfile(this)"+ onchange="BdayAge()">
                            </div>
                            <div class="clientInfo address">
                                <label for="clientName">Current Address</label>
                                <input id="houseNo2" type="number" name="houseNo2" value="<?php echo $row['chnumber'] ?>">
                                <input id="street2" type="text" name="street2" value="<?php echo $row['cstreet'] ?>">
                                <input id="barangay2" type="text" name="barangay2" value="<?php echo $row['cbarangay'] ?>">
                                <input id="city2" type="text" name="city2" value="<?php echo $row['ccity'] ?>">
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
                                <input id="other" type="radio" class="check" value="others" name="clientHomeInfo" onclick="enable()">
                                <label for="other">Other</label>
                                <input id="adOthers" type="text" name="adOthers" placeholder="others" value="<?php echo $row['cother'] ?>">
                                <script src="JS/app.js"></script>
                            </div>
                            <script defer>
                                const homestatus = "<?php echo $row['chome'] ?>";
                                const radio = document.getElementsByClassName('check');
                                for(let i = 0; i < radio.length; i++){
                                    if(radio[i].value == homestatus){
                                        radio[i].checked = true;
                                    }
                                }
                            </script>
                            <div class="clientInfo status">
                                <input id="nationality" type="text" name="nationality" value="<?php echo $row['cnationality'] ?>" onkeyup="clientProfile(this)">
                                <select name="clientCivil" id="civil" onchange="clientProfileInfo()">
                                    <option value="<?php echo $row['ccivilstatus'] ?>" selected hidden><?php echo $row['ccivilstatus'] ?></option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                                <label for="ifMarried">If Married</label>
                                <input id="ifMarried" type="text" name="ifMarried" placeholder="Name of Spouse" value="<?php echo $row['cspouse'] ?>" onkeyup="clientProfile(this)">
                                <input id="child" type="number" name="child" placeholder="No. of Children" value="<?php echo $row['cchildren'] ?>" onkeyup="clientProfile(this)">
                            </div>
                        </div>
                        <div class="clientPartner">
                            <label for="coMaker"><span class="errorSign">*</span>Co Maker:</label>
                            <input id="coMaker" type="text" name="coMaker" value="<?php echo $row['ccomaker'] ?>" onkeyup="clientProfile(this)">
                            <input id="coContact" type="number" name="coContact" value="<?php echo $row['cccontact'] ?>" onkeyup="clientProfile(this)">
                            <label id="labelForRL" for="loanAmount">Request Loan Amount:</label>
                            ₱ <input id="loanAmount" type="number" name="loanAmount" placeholder="00000.00" onkeyup="clientProfile(this)">
                        </div>
                        <div class="piViewButton pageOne">
                            <div class="cancel"><a href="Records.php"><button type="button">Cancel</button></a></div>
                            <button type="submit" class="piButton" id="piOpen" name="editClientBtn" onclick="insertCInfo()">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php }} ?>
    </div>
</section>
<script>
    var civil_status = document.getElementById('civil');
    var ifmarried = document.getElementById('ifMarried');
    var child = document.getElementById('child');
    civil_status.onchange = function(){
        if(civil_status.value == "married"){
            ifmarried.removeAttribute('disabled');
            child.removeAttribute('disabled');
        }else if(civil_status.value !== "married"){
            ifmarried.setAttribute('disabled', 'true');
            child.setAttribute('disabled', 'true');
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
<?php 

    if(isset($_POST['editClientBtn'])){
        $updateclientImage        =   $_FILES['clientDP']['name'];
        $updateclFirstName        =   $_POST['firstName'];
        $updateclMidName          =   $_POST['middleName'];
        $updateclLastName         =   $_POST['lastName'];
        $updateclSuffix           =   $_POST['suffix'];
        $updateclcArea            =   $_POST['clientArea'];
        $updateclcHousenum        =   $_POST['houseNo'];
        $updateclcStreet          =   $_POST['street'];
        $updateclcBarangay        =   $_POST['barangay'];
        $updateclcCity            =   $_POST['city'];
        $updateclContact          =   $_POST['contact'];
        $updateclEmail            =   $_POST['email'];
        $updateclAge              =   $_POST['age'];
        $updateclGender           =   $_POST['gender'];
        $updateupdateclBday       =   $_POST['birthday'];
        $updateupdateclBday       =   date('Y-m-d', strtotime($updateupdateclBday));
        $updateclHousenum         =   $_POST['houseNo2'];
        $updateclStreet           =   $_POST['street2'];
        $updateclBarangay         =   $_POST['barangay2'];
        $updateclCity             =   $_POST['city2'];
        $updateclHome             =   $_POST['clientHomeInfo'];
        $updateclOther            =   $_POST['adOthers'];
        $updateclNationality      =   $_POST['nationality'];
        $updateclCivilStatus      =   $_POST['clientCivil'];
        $updateclSpouse           =   $_POST['ifMarried'];
        $updateclChildren         =   $_POST['child'];
        $updateclCoMaker          =   $_POST['coMaker'];
        $updateclCMContact        =   $_POST['coContact'];

        move_uploaded_file($_FILES['clientDP']['tmp_name'], "2x2Pics/$updateclientImage");

        if(empty($updateclientImage)){
            $query = "SELECT * FROM insert_client WHERE id = $editid ";
            $select_image_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($select_image_query)){
                $updateclientImage = $row['cphoto'];
            }
        }

        $updateclient = "UPDATE insert_client SET cphoto = '$updateclientImage', cfirstname = '$updateclFirstName', cmidname = '$updateclMidName', clastname = '$updateclLastName', 
        csuffix = '$updateclSuffix', ccarea = '$updateclcArea', cchnumber = '$updateclcHousenum', ccstreet = '$updateclcStreet', 
        ccbarangay = '$updateclcBarangay', cccity = '$updateclcCity', ccontact = '$updateclContact', cemail = '$updateclEmail', 
        cage = '$updateclAge', cgender = '$updateclGender', cbirthday = '$updateupdateclBday', chnumber = '$updateclHousenum', 
        cstreet = '$updateclStreet', cbarangay = '$updateclBarangay', ccity = '$updateclCity', chome = '$updateclHome', cother = '$updateclOther',
        cnationality = '$updateclNationality', ccivilstatus = '$updateclCivilStatus', cspouse = '$updateclSpouse', 
        cchildren = '$updateclChildren', ccomaker = '$updateclCoMaker', cccontact = '$updateclCMContact' WHERE id = $editid ";
        mysqli_query($connection, $updateclient);
        header('location:Records.php');
    }

?>