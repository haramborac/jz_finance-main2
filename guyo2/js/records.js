function setIndex(){
    setIndex1();
    setIndex2();
}
function setIndex1(){

    var bar = document.getElementById("searchName");

    if(bar.value<1){

        document.getElementById("sArea").selectedIndex = "0";
        document.getElementById("cfilter").selectedIndex = "0";
        document.getElementById("cStatus").selectedIndex = "0";
    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = '';
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("recordTable");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[2];
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
}
function setIndex2(){

    var bar = document.getElementById("searchName");

    if(bar.value<1){

        document.getElementById("sArea").selectedIndex = "0";
        document.getElementById("cfilter").selectedIndex = "0";
        document.getElementById("cStatus").selectedIndex = "0";
    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = '';
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("crrTable2");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[2];
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
}
function searchorindex1(){
    let searchName = document.getElementById('searchName');
        if(searchName.value.length==0){
            setIndex();
        }else{
            searchBar();
        }


}
// CALLING SORTED SEARCH BAR VALUE
function searchBar(){


        searchFilter();
        searchFilter2();
}
// SEARCH BAR FILTER 1 ON CLIENT RECORDS
function searchFilter() {  
    var input, filter, table, tr, td, i, txtValue, alert;
    input = document.getElementById("searchName");
    filter = input.value.toUpperCase();

    table = document.getElementById("recordTable");
    tr = table.getElementsByTagName("tr");
    if(input.value===''){
    }
    else{
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                alert = 0;
            }
            }       
        }
    }
}

// SEARCH BAR FILTER 2 ON CLIENT RECORDS
function searchFilter2() {  
    var input, filter, table, tr, td, i, txtValue, alert;
    input = document.getElementById("searchName");
    filter = input.value.toUpperCase();

    table = document.getElementById("crrTable2");
    tr = table.getElementsByTagName("tr");
    if(input.value===''){
    }
    else{
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                alert = 0;
            }
            }       
        }
    }
}






function setIndex3(){

    var bar = document.getElementById("searchCID");

    if(bar.value<1){

        document.getElementById("sArea").selectedIndex = "0";
        document.getElementById("cfilter").selectedIndex = "0";
        document.getElementById("cStatus").selectedIndex = "0";
    var statC = document.getElementById("cStatus").value;
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    inputC = '';
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("recordTable");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[3];
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
}
function searchFilter3() {  
    var input, filter, table, tr, td, i, txtValue, alert;
    input = document.getElementById("searchCID");
    filter = input.value.toUpperCase();

    table = document.getElementById("recordTable");
    tr = table.getElementsByTagName("tr");
    if(input.value===''){
    }
    else{
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                alert = 0;
            }
            }       
        }
    }
}
function searchorindex2(){
    let searchName = document.getElementById('searchCID');
        if(searchName.value.length==0){
            setIndex3();
        }else{
            searchFilter3();
        }
}
let sc1 = document.getElementById('searchCID');
let sn1 = document.getElementById('searchName');

sc1.onclick = function(){
    sn1.value = "";
    localStorage.removeItem('setvalue');
}
sn1.onclick = function(){
    sc1.value = "";
    localStorage.removeItem('setvalue2');
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//CALLING SORT FUNCTIONS 1 & 2 FOR CLIENT RECORDS 
function mainFilter(){
    var n = document.getElementById("cfilter").value;

    if(n==="byName"){
        sortName();
        sortName2();
    }
    if(n==="byCycle"){
        sortCycle();
        sortCycle2();
    }
    if(n==="byODue"){
        sortODue();
        sortODue2();
    }
    if(n==="byLoan"){
        sortLoan();
        sortLoan2();
    }
}
//SORTING FUNCTIONS 1 (FOR ALL TRANSACTIONS)
//ASCENDING
function sortName(){
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("recordTable");
    switching = true;

    while(switching){

        switching = false;
        rows = table.rows;

        for(i=0;i<(rows.length -1);i++){
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("td")[4];
            y = rows[i+1].getElementsByTagName("td")[4];

            if(x.innerHTML.toLowerCase()> y.innerHTML.toLowerCase()){
                shouldSwitch = true;
                break;
            }
        }
        if(shouldSwitch){
            rows[i].parentNode.insertBefore(rows[i+1],rows[i]);
            switching = true;
        }
    }

}
//ASCENDING
function sortCycle(){
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("recordTable");
    switching = true;

    while(switching){

        switching = false;
        rows = table.rows;

        for(i=0;i<(rows.length -1);i++){
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("td")[2];
            y = rows[i+1].getElementsByTagName("td")[2];

            if(parseInt(x.innerHTML.match(/\d+/))> parseInt(y.innerHTML.match(/\d+/))){
                shouldSwitch = true;
                break;
            }
        }
        if(shouldSwitch){
            rows[i].parentNode.insertBefore(rows[i+1],rows[i]);
            switching = true;
        }
    }
}
//DESCENDING
function sortODue(){
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("recordTable");
    switching = true;

    while(switching){

        switching = false;
        rows = table.rows;

        for(i=0;i<(rows.length -1);i++){
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("td")[13];
            y = rows[i+1].getElementsByTagName("td")[13];

            if(parseInt(x.innerHTML.match(/\d+/))< parseInt(y.innerHTML.match(/\d+/))){
                shouldSwitch = true;
                break;
            }
        }
        if(shouldSwitch){
            rows[i].parentNode.insertBefore(rows[i+1],rows[i]);
            switching = true;
        }
    }
}
//DESCENDING
function sortLoan(){
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("recordTable");
    switching = true;

    while(switching){

        switching = false;
        rows = table.rows;

        for(i=0;i<(rows.length -1);i++){
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("td")[12];
            y = rows[i+1].getElementsByTagName("td")[12];

            if(parseInt(x.innerHTML.match(/\d+/))< parseInt(y.innerHTML.match(/\d+/))){
                shouldSwitch = true;
                break;
            }
        }
        if(shouldSwitch){
            rows[i].parentNode.insertBefore(rows[i+1],rows[i]);
            switching = true;
        }
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////



//SORTING FUNCTIONS 2 (FOR TODAY'S TRANSACTION)
//ASCENDING
function sortName2(){
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("crrTable2");
    switching = true;

    while(switching){

        switching = false;
        rows = table.rows;

        for(i=0;i<(rows.length -1);i++){
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("td")[2];
            y = rows[i+1].getElementsByTagName("td")[2];

            if(x.innerHTML.toLowerCase()> y.innerHTML.toLowerCase()){
                shouldSwitch = true;
                break;
            }
        }
        if(shouldSwitch){
            rows[i].parentNode.insertBefore(rows[i+1],rows[i]);
            switching = true;
        }
    }

}
//ASCENDING
function sortCycle2(){
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("crrTable2");
    switching = true;

    while(switching){

        switching = false;
        rows = table.rows;

        for(i=0;i<(rows.length -1);i++){
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("td")[1];
            y = rows[i+1].getElementsByTagName("td")[1];

            if(parseInt(x.innerHTML.match(/\d+/))< parseInt(y.innerHTML.match(/\d+/))){
                shouldSwitch = true;
                break;
            }
        }
        if(shouldSwitch){
            rows[i].parentNode.insertBefore(rows[i+1],rows[i]);
            switching = true;
        }
    }
}
//DESCENDING
function sortODue2(){
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("crrTable2");
    switching = true;

    while(switching){

        switching = false;
        rows = table.rows;

        for(i=0;i<(rows.length -1);i++){
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("td")[13];
            y = rows[i+1].getElementsByTagName("td")[13];

            if(parseInt(x.innerHTML.match(/\d+/))< parseInt(y.innerHTML.match(/\d+/))){
                shouldSwitch = true;
                break;
            }
        }
        if(shouldSwitch){
            rows[i].parentNode.insertBefore(rows[i+1],rows[i]);
            switching = true;
        }
    }
}
//DESCENDING
function sortLoan2(){
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("crrTable2");
    switching = true;

    while(switching){

        switching = false;
        rows = table.rows;

        for(i=0;i<(rows.length -1);i++){
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("td")[12];
            y = rows[i+1].getElementsByTagName("td")[12];

            if(parseInt(x.innerHTML.match(/\d+/))< parseInt(y.innerHTML.match(/\d+/))){
                shouldSwitch = true;
                break;
            }
        }
        if(shouldSwitch){
            rows[i].parentNode.insertBefore(rows[i+1],rows[i]);
            switching = true;
        }
    }
}
//APPLY LOAN BUTTONS
//////////////////////////////////////////////////////////////////////////////////////////////////////

let mbl = document.getElementsByClassName("mbl");
let sbl = document.getElementsByClassName("sbl");
let il = document.getElementsByClassName("il");
let sl = document.getElementsByClassName("sl");

for(let lm = 0; lm < mbl.length; lm++){
    mbl[lm].onclick = function(){
   
        mbl[lm].style.backgroundColor = "blue";
        mbl[lm].style.color = "white";

        sbl[lm].style.backgroundColor = "white";
        sbl[lm].style.color = "black";
        il[lm].style.backgroundColor = "white";
        il[lm].style.color = "black";
        sl[lm].style.backgroundColor = "white";
        sl[lm].style.color = "black";  

        document.getElementsByClassName("editinterest")[lm].value = 17;
        document.getElementsByClassName("editinterestspan")[lm].innerHTML = "17%";
         
        document.getElementsByClassName("userNCycle2")[lm].style.display = "none"; 

        document.getElementsByClassName("loantype")[lm].value = "mbl";

        document.getElementsByClassName('eAmountLoaned1')[lm].setAttribute("name","approvedloan");
        document.getElementsByClassName('eAmountLoaned1')[lm].style.display = "block";

        document.getElementsByClassName('eAmountLoaned0')[lm].style.display = "none";
        document.getElementsByClassName('eAmountLoaned2')[lm].style.display = "none";
        document.getElementsByClassName('eAmountLoaned3')[lm].style.display = "none";
        document.getElementsByClassName('eAmountLoaned4')[lm].style.display = "none";

        document.getElementsByClassName('eAmountLoaned0')[lm].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned2')[lm].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned3')[lm].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned4')[lm].removeAttribute("name");
    }
}
for(let lsb = 0; lsb < sbl.length; lsb++){
    sbl[lsb].onclick = function(){

        sbl[lsb].style.backgroundColor = "blue";
        sbl[lsb].style.color = "white";

        mbl[lsb].style.backgroundColor = "white";
        mbl[lsb].style.color = "black";
        il[lsb].style.backgroundColor = "white";
        il[lsb].style.color = "black";
        sl[lsb].style.backgroundColor = "white";
        sl[lsb].style.color = "black";

        document.getElementsByClassName("editinterest")[lsb].value = 20;
        document.getElementsByClassName("editinterestspan")[lsb].innerHTML = "20%";
         
        document.getElementsByClassName("userNCycle2")[lsb].style.display = "none"; 

        document.getElementsByClassName("loantype")[lsb].value = "sbl";

        document.getElementsByClassName('eAmountLoaned2')[lsb].setAttribute("name","approvedloan");
        document.getElementsByClassName('eAmountLoaned2')[lsb].style.display = "block";

        document.getElementsByClassName('eAmountLoaned0')[lsb].style.display = "none";
        document.getElementsByClassName('eAmountLoaned1')[lsb].style.display = "none";
        document.getElementsByClassName('eAmountLoaned3')[lsb].style.display = "none";
        document.getElementsByClassName('eAmountLoaned4')[lsb].style.display = "none";

        document.getElementsByClassName('eAmountLoaned0')[lsb].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned1')[lsb].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned3')[lsb].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned4')[lsb].removeAttribute("name");
    }
}
for(let li = 0; li < il.length; li++){
    il[li].onclick = function(){

        il[li].style.backgroundColor = "blue";
        il[li].style.color = "white";

        mbl[li].style.backgroundColor = "white";
        mbl[li].style.color = "black";
        sbl[li].style.backgroundColor = "white";
        sbl[li].style.color = "black";
        sl[li].style.backgroundColor = "white";
        sl[li].style.color = "black";

        document.getElementsByClassName("editinterest")[li].value = 10;
        document.getElementsByClassName("editinterestspan")[li].innerHTML = "10%";
         
        document.getElementsByClassName("userNCycle2")[li].style.display = "none"; 

        document.getElementsByClassName("loantype")[li].value = "il";

        document.getElementsByClassName('eAmountLoaned3')[li].setAttribute("name","approvedloan");
        document.getElementsByClassName('eAmountLoaned3')[li].style.display = "block";

        document.getElementsByClassName('eAmountLoaned0')[li].style.display = "none";
        document.getElementsByClassName('eAmountLoaned1')[li].style.display = "none";
        document.getElementsByClassName('eAmountLoaned2')[li].style.display = "none";
        document.getElementsByClassName('eAmountLoaned4')[li].style.display = "none";

        document.getElementsByClassName('eAmountLoaned0')[li].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned1')[li].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned2')[li].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned4')[li].removeAttribute("name");
    }
}
for(let ls = 0; ls < sl.length; ls++){
    sl[ls].onclick = function(){

        sl[ls].style.backgroundColor = "blue";
        sl[ls].style.color = "white";

        mbl[ls].style.backgroundColor = "white";
        mbl[ls].style.color = "black";
        sbl[ls].style.backgroundColor = "white";
        sbl[ls].style.color = "black";
        il[ls].style.backgroundColor = "white";
        il[ls].style.color = "black";

        document.getElementsByClassName("editinterest")[ls].value = 1.5;
        document.getElementsByClassName("editinterestspan")[ls].innerHTML = "1.5%";
         
        document.getElementsByClassName("userNCycle2")[ls].style.display = "none"; 

        document.getElementsByClassName("loantype")[ls].value = "sl";

        document.getElementsByClassName('eAmountLoaned4')[ls].setAttribute("name","approvedloan");
        document.getElementsByClassName('eAmountLoaned4')[ls].style.display = "block";

        document.getElementsByClassName('eAmountLoaned0')[ls].style.display = "none";
        document.getElementsByClassName('eAmountLoaned1')[ls].style.display = "none";
        document.getElementsByClassName('eAmountLoaned3')[ls].style.display = "none";
        document.getElementsByClassName('eAmountLoaned2')[ls].style.display = "none";
    
        document.getElementsByClassName('eAmountLoaned0')[ls].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned1')[ls].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned3')[ls].removeAttribute("name");
        document.getElementsByClassName('eAmountLoaned2')[ls].removeAttribute("name");
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
        tdC = trC[iC].getElementsByTagName("td")[6];
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
        tdC = trC[iC].getElementsByTagName("td")[6];
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

    inputC = "On Going";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("recordTable");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[6];
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
        tdC = trC[iC].getElementsByTagName("td")[6];
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
        tdC = trC[iC].getElementsByTagName("td")[6];
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
        tdC = trC[iC].getElementsByTagName("td")[6];
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
        tdC = trC[iC].getElementsByTagName("td")[6];
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
        tdC = trC[iC].getElementsByTagName("td")[6];
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

    inputC = "Pending";
    filterC = inputC.toUpperCase();
    tableC = document.getElementById("crrTable2");
    trC = tableC.getElementsByTagName("tr");
    for (iC = 0; iC < trC.length; iC++) {
        tdC = trC[iC].getElementsByTagName("td")[3];
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
        tdC = trC[iC].getElementsByTagName("td")[3];
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
        tdC = trC[iC].getElementsByTagName("td")[3];
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
        tdC = trC[iC].getElementsByTagName("td")[3];
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
        tdC = trC[iC].getElementsByTagName("td")[3];
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
        tdC = trC[iC].getElementsByTagName("td")[3];
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
        tdC = trC[iC].getElementsByTagName("td")[3];
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
        tdC = trC[iC].getElementsByTagName("td")[3];
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

//AREA FILTER CALLS BOTH AREAFILTER 1 & 2 SELECT ON CLIENT RECORDS
function areaFilter(){
    areaFilter1();
    areaFilter2();
}
//AREA FILTER 1 (FOR ALL TRANSACTIONS)
function areaFilter1(){
    var input, table, tr, td, i, txtValue;
    var x = document.getElementById("sArea").value;   
    
    if(x==="All"){
        input = '';
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
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
    }else{
        input = x;
        filterC = input.toUpperCase();
        table = document.getElementById("recordTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filterC) > -1) {
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
  


    
    if(x==="All"){
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
    }else{
        input = x;
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

function branchFilter(){
    var input, table, tr, td, i, txtValue;
    var x = document.getElementById("cBranch").value;    
    
    if(x==="All"){
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
    }else{
        input = x.toUpperCase();
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