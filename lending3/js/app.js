function insertCInfo() {
    var cIncome = document.getElementById("addSecond");
    var cProfile = document.getElementById("addFirst");
    var cDot = document.getElementById("stepNo2");

    if (cIncome.style.display === "none") {
        cIncome.style.display = "block";
        cProfile.style.display = "none";
        cDot.style.background = "navy";
    } else{
        cIncome.style.display = "none"
        cProfile.style.display = "block";
        cDot.style.background = "none";
    }
}
function BdayAge(){
    var ageInput = document.getElementById('age');
    var bdate = document.getElementById('birthday').value;
    var age_dt = new Date(month_diff); 
    var dob = new Date(bdate);
    var month_diff = Date.now() - dob.getTime();
    var age_dt = new Date(month_diff); 
    var year = age_dt.getUTCFullYear();
    var age = Math.abs(year - 1970);
    ageInput.value = age;
}
function CMBdayAge(){
    var ageInput = document.getElementById('cmAge');
    var bdate = document.getElementById('cmBday').value;
    var age_dt = new Date(month_diff); 
    var dob = new Date(bdate);
    var month_diff = Date.now() - dob.getTime();
    var age_dt = new Date(month_diff); 
    var year = age_dt.getUTCFullYear();
    var age = Math.abs(year - 1970);
    ageInput.value = age;
}
function insertCValid() {
    var cIncome = document.getElementById("addSecond");
    var cValid = document.getElementById("addThird");
    var cDot = document.getElementById("stepNo3");

    if (cValid.style.display === "none") {
        cValid.style.display = "block";
        cIncome.style.display = "none";
        cDot.style.background = "navy";
    } else{
        cValid.style.display = "none"
        cIncome.style.display = "block";
        cDot.style.background = "none";
    }
}
function insertCComaker() {
    var cComaker = document.getElementById("addForth");
    var cValid = document.getElementById("addThird");
    var cDot = document.getElementById("stepNo4");

    if (cComaker.style.display === "none") {
        cComaker.style.display = "block";
        cValid.style.display = "none";
        cDot.style.background = "navy";
    } else{
        cComaker.style.display = "none"
        cValid.style.display = "block";
        cDot.style.background = "none";
    }
}



















function ucHistory() {
    var ucHis = document.getElementsByClassName("ucdHistory");
    var uhOpen = document.getElementsByClassName("ucVHistory");
    var uhClose = document.getElementsByClassName("ucHHistory");
    for(let u = 0; u<ucHis.length; u++){ 
        if (ucHis[u].style.display === "none") {
            ucHis[u].style.display = "block";
            uhOpen[u].style.display = "none";
            uhClose[u].style.display = "block";

        } else{
            ucHis[u].style.display = "none";
            uhOpen[u].style.display = "block";
            uhClose[u].style.display = "none";
        }
    }
}
function ucbCredential() {
    var ucCre = document.getElementsByClassName("ucCredentials");
    var ucOpen = document.getElementsByClassName("ucView");
    var ucClose = document.getElementsByClassName("ucHide");

    for(let u = 0; u<ucCre.length; u++){    
        if (ucCre[u].style.display === "none") {
            ucCre[u].style.display = "block";
            ucOpen[u].style.display = "none";
            ucClose[u].style.display = "block";
        } else{
            ucCre[u].style.display = "none";
            ucOpen[u].style.display = "block";
            ucClose[u].style.display = "none";
        }

    }    
}
function cmViewComaker() {
    var cmDiv = document.getElementById("clCoMakerInfo");
    var cmOpen = document.getElementById("cmButtonOp");
    var cmClose = document.getElementById("cmButtonCl");


    if (cmDiv.style.display === "none") {
        cmDiv.style.display = "block";
        cmOpen.style.display = "none";
        cmClose.style.display = "block";
        
    } else{
        cmDiv.style.display = "none";
        cmOpen.style.display = "block";
        cmClose.style.display = "none";
    }
}

function crtViewTransaction() {
    var crtDiv = document.getElementById("crRecentlyAdded");
    var crtDef = document.getElementById("crDefaultView");
    var crtOpen = document.getElementById("crtRecent");
    var crtClose = document.getElementById("crtAll");


    if (crtDiv.style.display === "none") {
        crtDiv.style.display = "block";
        crtDef.style.display = "none";
        crtOpen.style.display = "none";
        crtClose.style.display = "block";
    } else{
        crtDiv.style.display = "none";
        crtDef.style.display = "block";
        crtOpen.style.display = "block";
        crtClose.style.display = "none";
    }
}























function enable(){
    if(document.getElementById('other').checked = true){
        document.getElementById('adOthers').removeAttribute('disabled');
        document.getElementById('rent').checked = false;
        document.getElementById('wParents').checked = false;
        document.getElementById('owned').checked = false;
        document.getElementById('mortgaged').checked = false;

    }
}
function disable(){
    if(document.getElementsByClassName('check').checked = true){
        document.getElementById('adOthers').setAttribute('disabled', 'true');
        document.getElementById('other').checked = false;
    }
}

function getImagePreview(event){
    var image = URL.createObjectURL(event.target.files[0]);
    var imagediv = document.getElementById('clientPic');
    var newimg = document.getElementById('image');
    var imagediv2 = document.getElementById('idprev');
    var newimg2 = document.getElementById('image2');
    newimg.src = image;
    newimg.height = "200";
    newimg.width = "200";

    newimg2.src = image;
    newimg.height = "100";
    newimg.width = "100";
    
    imagediv.appendChild(newimg);
    imagediv2.appendChild(newimg2);

}
function getIDPreview1(event){
    var idImage1 = URL.createObjectURL(event.target.files[0]);
    var idImagediv1 = document.getElementById('idValid01');
    var newImg1 = document.getElementById('idImg01');

    newImg1.src = idImage1;
    newImg1.height = "200";
    newImg1.width = "330";

    idImagediv1.appendChild(newImg1);

}
function getIDPreview2(event){
    var idImage2 = URL.createObjectURL(event.target.files[0]);
    var idImagediv2 = document.getElementById('idValid02');
    var newImg2 = document.getElementById('idImg02');

    newImg2.src = idImage2;
    newImg2.height = "200";
    newImg2.width = "330";

    idImagediv2.appendChild(newImg2);

}



// Profile Summary in Adding CLient

function clientProfileInfo() {
    var clFirstName = document.getElementById("firstName");
    var clFNamePrev = document.getElementById('clFNamePrev');
    var clFNamePrev2 = document.getElementById('clFNamePrev2');
    var clFNamePrev3 = document.getElementById('clFNamePrev3');
    var clMiddleName = document.getElementById("middleName");
    var clMNamePrev = document.getElementById('clMNamePrev');
    var clMNamePrev2 = document.getElementById('clMNamePrev2');
    var clLastName = document.getElementById("lastName");
    var clLNamePrev = document.getElementById('clLNamePrev');
    var clLNamePrev2 = document.getElementById('clLNamePrev2');
    var clSuffixName = document.getElementById("suffix");
    var clSNamePrev = document.getElementById('clSNamePrev');
    var clSNamePrev2 = document.getElementById('clSNamePrev2');
    // Age
    var clAge = document.getElementById("age");
    var clAgePrev = document.getElementById('clAgePrev');
    var clAgePrev2 = document.getElementById('clAgePrev2');
    // Gender
    var clGender = document.getElementById("gender").value;
    // Address
    var clHouseNo = document.getElementById("houseNo");
    var clHouseNoPrev = document.getElementById("clHMPrev");
    var clHouseNoPrev2 = document.getElementById("houseNo2");
    var clStreet = document.getElementById("street");
    var clStreetPrev = document.getElementById("clSPrev");
    var clStreetPrev2 = document.getElementById("street2");
    var clBarangay = document.getElementById("barangay");
    var clBarangayPrev = document.getElementById("clBPrev");
    var clBarangayPrev2 = document.getElementById("barangay2");
    var clCity = document.getElementById("city");
    var clCityPrev = document.getElementById("clCPrev");
    var clCityPrev2 = document.getElementById("city2");
    // Co-maker
    var clCoMaker = document.getElementById("coMaker");
    var clComakerPrev = document.getElementById('clComakerPrev');
    var clCMContact = document.getElementById("coContact");
    var clCMContactPrev = document.getElementById("cmContact");



    clFNamePrev.innerHTML = clFirstName.value;
    clFNamePrev2.innerHTML = clFirstName.value;
    clFNamePrev3.innerHTML = clFirstName.value;
    clMNamePrev.innerHTML = clMiddleName.value;
    clMNamePrev2.innerHTML = clMiddleName.value;
    clLNamePrev.innerHTML = clLastName.value;
    clLNamePrev2.innerHTML = clLastName.value;
    clSNamePrev.innerHTML = clSuffixName.value;
    clSNamePrev2.innerHTML = clSuffixName.value;



    clHouseNoPrev.innerHTML = clHouseNo.value;
    clHouseNoPrev2.value = clHouseNo.value;
    clStreetPrev.innerHTML = clStreet.value;
    clStreetPrev2.value = clStreet.value;
    clBarangayPrev.innerHTML = clBarangay.value;
    clBarangayPrev2.value = clBarangay.value;
    clCityPrev.innerHTML = clCity.value;
    clCityPrev2.value = clCity.value;


    clAgePrev.innerHTML = clAge.value;
    clAgePrev2.innerHTML = clAge.value;
    document.getElementById("clGenderPrev").innerHTML = "" + clGender;


    clComakerPrev.innerHTML = clCoMaker.value;
    clCMContactPrev.value = clCMContact.value;
}


























//CLIENT INCOME STATEMENT MATHEMATICAL CALCULATIONS CB - CHIE - ONI - CIS
//CLIENT BUSINESS FORM CALCULATION
function CB(){
    var expense1 = parseFloat(clBExpense1.value);
    var expense2 = parseFloat(clBExpense2.value);
    var expense3 = parseFloat(clBExpense3.value);
    var gross1 = parseFloat(clBIncome1.value);
    var gross2 = parseFloat(clBIncome2.value);
    var gross3 = parseFloat(clBIncome3.value);
    var totalexpense = parseFloat(eval(expense1+expense2+expense3)).toFixed(2);  
    var totalgross = parseFloat(eval(gross1+gross2+gross3)).toFixed(2);
    var totalbni = parseFloat(eval(totalgross-totalexpense)).toFixed(2);    
    document.getElementById('ctBusTotal').innerHTML="₱ "+totalbni;    
    document.getElementById('ctBusTotal2').innerHTML="₱ "+totalbni; 
    return totalbni;
}
//CLIENT HOUSEHOLD INCOME & EXPENSES FORM CALCULATION
function CHIE(){
    var totalhi = parseFloat(ctHouseholdIn.value);
    var totalhe = parseFloat(ctHouseholdEx.value);
    var totalhihe = parseFloat(eval(totalhi-(totalhe+(totalhe*.10))).toFixed(2));
    
    document.getElementById('ctHITotal').innerHTML="₱ "+eval(totalhi-(totalhe+(totalhe*.10))).toFixed(2);
    document.getElementById('ctHITotal2').innerHTML="₱ "+eval(totalhi-(totalhe+(totalhe*.10))).toFixed(2);
    return totalhihe;
}
//TOTAL HH NET INCOME & OVERALL NET INCOME OF CLIENT HOUSEHOLD INCOME & EXPENSES
function ONI(){  
    var CBF = parseFloat(CB());
    var CHIEF = parseFloat(CHIE());
    var total = parseFloat(eval(CBF+CHIEF)).toFixed(2);

    var debtCap = (total*0.35).toFixed(2);
    var maxLoan = eval(debtCap*100).toFixed(2);

    document.getElementById('oaTotal').innerHTML="₱ "+total;
    document.getElementById('oaTotal2').innerHTML="₱ "+total;

    document.getElementById('dcAvailable').innerHTML="= ₱ "+total;
    document.getElementById('dcAdjusted').innerHTML="= ₱ "+debtCap;
    document.getElementById('dcMaxloan').innerHTML="= ₱ "+maxLoan;
    return total;
}
//ALL FUNCTIONS OF THE CLIENT INCOME STATEMENT ARE CALLED HERE
function CIS(){
    CB();
    CHIE();
    ONI();
}
//GENERATE RANDOM ACCOUNT ID NUMBER
function generate(){
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var lChar = characters.length;
    var numbers = '0123456789';
    var lNum = numbers.length;
    var rChar = '';
    var rNum = '';
    var rChar2 = '';
    var rNum2 = ''; 
    var result;
    for (var i=0;i<2;i++){
        rChar += characters.charAt(Math.floor(Math.random()*lChar));
    }

    for (var j=0;j<2;j++){
        rNum += numbers.charAt(Math.floor(Math.random()*lNum));
    }
    for (var k=0;k<3;k++){
        rChar2 += characters.charAt(Math.floor(Math.random()*lChar));
    }
    for (var l=0;l<2;l++){
        rNum2 += numbers.charAt(Math.floor(Math.random()*lNum));
    }
    result = rChar.concat(rNum).concat(rChar2).concat(rNum2);
    document.getElementById('randAccNo').value = result;
    document.getElementById('randAccNo2').innerHTML = result;
}
//SET VALUE TO 0 IF CLIENT INCOME STATEMENT INPUT FORM IS EMPTY
function removeNan(){

    var expense1 = document.getElementById('clBExpense1');
    var expense2 = document.getElementById('clBExpense2');
    var expense3 = document.getElementById('clBExpense3');
    var gross1 = document.getElementById('clBIncome1');
    var gross2 = document.getElementById('clBIncome2');
    var gross3 = document.getElementById('clBIncome3');

    var totalhi = document.getElementById('ctHouseholdIn');
    var totalhe = document.getElementById('ctHouseholdEx');


    if(expense1.value==""||expense1.value=="0"){
        expense1.value = "0.00";
    }
    else{
        expense1.value = parseFloat(expense1.value).toFixed(2); 
    }
    if(expense2.value==""||expense2.value=="0"){
        expense2.value = "0.00";
    }
    else{
        expense2.value = parseFloat(expense2.value).toFixed(2); 
    }
    if(expense3.value==""||expense3.value=="0"){
        expense3.value = "0.00";
    } 
    else{
        expense3.value = parseFloat(expense3.value).toFixed(2); 
    }
    if(gross1.value==""||gross1.value=="0"){
        gross1.value = "0.00";
    }
    else{
        gross1.value = parseFloat(gross1.value).toFixed(2); 
    }
    if(gross2.value==""||gross2.value=="0"){
        gross2.value = "0.00";
    }
    else{
        gross2.value = parseFloat(gross2.value).toFixed(2); 
    }
    if(gross3.value==""||gross3.value=="0"){
        gross3.value = "0.00";
    }
    else{
        gross3.value = parseFloat(gross3.value).toFixed(2); 
    }
    if(totalhi.value==""||totalhi.value=="0"){
        totalhi.value ="0.00";
    }
    else{
        totalhi.value = parseFloat(totalhi.value).toFixed(2); 
    }
    if(totalhe.value==""||totalhe.value=="0"){
        totalhe.value ="0.00";
    }
    else{
        totalhe.value = parseFloat(totalhe.value).toFixed(2); 
    }
    CIS();
} 

//CO-MAKER INFORMATION CALCULATION
function cmCal(){
    var gross1 = parseFloat(cmGross1.value);
    var gross2 = parseFloat(cmGross2.value);
    var expense1 = parseFloat(cmExpenses1.value);
    var expense2 = parseFloat(cmExpenses2.value);

    var tni = parseFloat(eval((gross1+gross2)-(expense1+expense2))).toFixed(2);

    document.getElementById('cmTNI').innerHTML="= ₱ "+tni;
}

//SET VALUE TO 0 IF CO-MAKER INPUT FORM IS EMPTY
function removeNan2(){

    var cmG1= document.getElementById('cmGross1');
    var cmG2= document.getElementById('cmGross2');
    var cmE1= document.getElementById('cmExpenses1');
    var cmE2= document.getElementById('cmExpenses2');
    if(cmG1.value==""||cmG1.value=="0"){
        cmG1.value = "0.00";
    }
    else{
        cmG1.value = parseFloat(cmG1.value).toFixed(2); 
    }
    if(cmG2.value==""||cmG2.value=="0"){
        cmG2.value = "0.00";
    }
    else{
        cmG2.value = parseFloat(cmG2.value).toFixed(2); 
    }
    if(cmE1.value==""||cmE1.value=="0"){
        cmE1.value = "0.00";
    }
    else{
        cmE1.value = parseFloat(cmE1.value).toFixed(2); 
    }
    if(cmE2.value==""||cmE2.value=="0"){
        cmE2.value = "0.00";
    }
    else{
        cmE2.value = parseFloat(cmE2.value).toFixed(2); 
    }
    cmCal();
}

//SET VALUE TO 0 IF LOANABLE AMOUNT IS EMPTY
function removeNan3(){
    var ccLoan = document.getElementById("ccLoan");

    if(ccLoan.value==""||ccLoan.value=="0"){
        ccLoan.value = "0.00";
    }
    else{
        ccLoan.value = parseFloat(ccLoan.value).toFixed(2);
    }
}

//AREA FILTER CALLS BOTH AREAFILTER 1 & 2 SELECT ON CLIENT RECORDS
function areaFilter(){
    areaFilter1();
    areaFilter2();
}
//AREA FILTER 1 (FOR ALL TRANSACTIONS)
function areaFilter1(){
    var input, table, tr, td, i, txtValue;
    var x = document.getElementById("sArea").value;   
  
    if(x==="AreaA"){
        input = '1';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";             
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaB"){
        input = '2';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    } 
    if(x==="AreaC"){
        input = '3';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }   
        }
    } 
    if(x==="AreaD"){
        input = '4';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    } 
    if(x==="AreaE"){
        input = '5';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    } 
    if(x==="AreaF"){
        input = '6';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaG"){
        input = '7';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaH"){
        input = '8';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaI"){
        input = '9';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaJ"){
        input = '10';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaK"){
        input = '11';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaL"){
        input = '12';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaAll"){
        input = '';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }     
}
//AREA FILTER 2 (FOR TODAY'S TRANSACTION)
function areaFilter2(){
    var input, table, tr, td, i, txtValue;
    var x = document.getElementById("sArea").value;    
  
    if(x==="AreaA"){
        input = '1';
        table = document.getElementById("crrTable2");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";             
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaB"){
        input = '2';
        table = document.getElementById("crrTable2");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    } 
    if(x==="AreaC"){
        input = '3';
        table = document.getElementById("crrTable2");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }   
        }
    } 
    if(x==="AreaD"){
        input = '4';
        table = document.getElementById("crrTable2");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    } 
    if(x==="AreaE"){
        input = '5';
        table = document.getElementById("crrTable2");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    } 
    if(x==="AreaF"){
        input = '6';
        table = document.getElementById("crrTable2");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaG"){
        input = '7';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaH"){
        input = '8';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaI"){
        input = '9';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaJ"){
        input = '10';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaK"){
        input = '11';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaL"){
        input = '12';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }
    if(x==="AreaAll"){
        input = '';
        table = document.getElementById("crrTable2");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }     
}



//CALLING FILTER BY STATUS FUNCTIONS 1 & 2 ON CLIENT RECORDS
function statusFilter(){

    var statC = document.getElementById("cStatus").value;
    if(statC==="Pending"){
        statusPending();
        statusPending2();
    }
    if(statC==="Released"){
        statusReleased();
        statusReleased2(); 
    } 
    if(statC==="OnGoing"){
        statusOnGoing();
        statusOnGoing2();     
    } 
    if(statC==="Finished"){
        statusFinished();  
        statusFinished2();   
    }
    if(statC==="Cancelled"){
        statusCancelled();
        statusCancelled2();  
    } 
    if(statC==="Terminated"){
        statusTerminated();  
        statusTerminated2();  
    }
    if(statC==="Blacklisted"){
        statusBlackListed();
        statusBlackListed2();
    }
    if(statC==="All"){
        statusAll();
        statusAll2();
    }
}
//FILTER BY STATUS FUNCTIONS 1 (FOR ALL TRANSACTIONS)
//PENDING
function statusPending(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;
    var dispTable = document.getElementById("crDefaultView");

    inputC = "Pending";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("recordTable");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";           
                } 
                else {
                    trC[iC].style.display = "none";                   
                }
            }
    }
}
//RELEASED
function statusReleased(){
    
    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "Released";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("recordTable");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//ONGOING
function statusOnGoing(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "On going";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("recordTable");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//FINISHED
function statusFinished(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "Finished";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("recordTable");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//CANCELLED
function statusCancelled(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "Cancelled";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("recordTable");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//TERMINATED
function statusTerminated(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "Terminated";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("recordTable");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//BLACKLISTED
function statusBlackListed(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "Blacklisted";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("recordTable");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//ALL STATUS
function statusAll(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = '';
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("recordTable");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                }
            }
    }
}

//FILTER BY STATUS FUNCTIONS 2 (FOR TODAY'S TRANSACTION)
//PENDING
function statusPending2(){


    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;
    var dispTable = document.getElementById("crDefaultView");



    // if(dispTable.style.display==="block"){
    inputC = "Pending";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("crrTable2");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";           
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//RELEASED
function statusReleased2(){
    
    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "Released";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("crrTable2");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//ONGOING
function statusOnGoing2(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "On going";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("crrTable2");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//FINISHED
function statusFinished2(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "Finished";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("crrTable2");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//CANCELLED
function statusCancelled2(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "Cancelled";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("crrTable2");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//TERMINATED
function statusTerminated2(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "Terminated";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("crrTable2");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//BLACKLISTED
function statusBlackListed2(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = "Blacklisted";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("crrTable2");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                    
                }
            }
    }
}
//ALL STATUS
function statusAll2(){

    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = '';
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("crrTable2");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[4];
            if (tdC) {
            txtValueC = tdC.textContent || tdC.innerText;
                if (txtValueC.toUpperCase().indexOf(filterC) > -1) {
                    trC[iC].style.display = "";     
                } 
                else {
                    trC[iC].style.display = "none";
                }
            }
    }
}


window.onload = function(){
    let usercontent = document.getElementsByClassName('userPModal');
    let paymentmodal = document.getElementsByClassName('userPayModal');
    let showProfile = localStorage.getItem('showProfile');
    let showAdd = localStorage.getItem('showAdd');
    if(showProfile != undefined){
        usercontent[showProfile].style.display = "block";
    }

    if(showAdd != undefined){
        paymentmodal[showAdd].style.display = "block";
    }
}

