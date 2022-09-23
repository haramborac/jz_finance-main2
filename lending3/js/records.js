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
function searchorindex(){
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
function sortingArea(){
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("recordTable");
    switching = true;

    while(switching){

        switching = false;
        rows = table.rows;

        for(i=0;i<(rows.length -1);i++){
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("td")[0];
            y = rows[i+1].getElementsByTagName("td")[0];

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

            x = rows[i].getElementsByTagName("td")[1];
            y = rows[i+1].getElementsByTagName("td")[1];

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
function sortingArea2(){
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("crrTable2");
    switching = true;

    while(switching){

        switching = false;
        rows = table.rows;

        for(i=0;i<(rows.length -1);i++){
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("td")[0];
            y = rows[i+1].getElementsByTagName("td")[0];

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
   
        mbl[lm].setAttribute("disabled",true);
        mbl[lm].style.backgroundColor = "blue";
        mbl[lm].style.color = "white";

        sbl[lm].style.backgroundColor = "white";
        sbl[lm].style.color = "black";
        il[lm].style.backgroundColor = "white";
        il[lm].style.color = "black";
        sl[lm].style.backgroundColor = "white";
        sl[lm].style.color = "black";  

        sbl[lm].removeAttribute("disabled");
        il[lm].removeAttribute("disabled");
        sl[lm].removeAttribute("disabled");

        document.getElementById("eAmountLoaned"+lm).removeAttribute("disabled");

        document.getElementsByClassName("editinterest")[lm].value = 17;
        document.getElementsByClassName("editinterestspan")[lm].innerHTML = "17%";
         
        document.getElementsByClassName("userNCycle2")[lm].style.display = "none"; 

        document.getElementsByClassName("loantype")[lm].value = "mbl";
    }
}
for(let lsb = 0; lsb < sbl.length; lsb++){
    sbl[lsb].onclick = function(){

        sbl[lsb].setAttribute("disabled",true);
        sbl[lsb].style.backgroundColor = "blue";
        sbl[lsb].style.color = "white";

        mbl[lsb].style.backgroundColor = "white";
        mbl[lsb].style.color = "black";
        il[lsb].style.backgroundColor = "white";
        il[lsb].style.color = "black";
        sl[lsb].style.backgroundColor = "white";
        sl[lsb].style.color = "black";

        mbl[lsb].removeAttribute("disabled");
        il[lsb].removeAttribute("disabled");
        sl[lsb].removeAttribute("disabled");

        document.getElementById("eAmountLoaned"+lsb).removeAttribute("disabled");

        document.getElementsByClassName("editinterest")[lsb].value = 10;
        document.getElementsByClassName("editinterestspan")[lsb].innerHTML = "10%";
         
        document.getElementsByClassName("userNCycle2")[lsb].style.display = "none"; 

        document.getElementsByClassName("loantype")[lsb].value = "sbl";

    }
}
for(let li = 0; li < il.length; li++){
    il[li].onclick = function(){

        il[li].setAttribute("disabled",true);
        il[li].style.backgroundColor = "blue";
        il[li].style.color = "white";

        mbl[li].style.backgroundColor = "white";
        mbl[li].style.color = "black";
        sbl[li].style.backgroundColor = "white";
        sbl[li].style.color = "black";
        sl[li].style.backgroundColor = "white";
        sl[li].style.color = "black";

        mbl[li].removeAttribute("disabled");
        sbl[li].removeAttribute("disabled");
        sl[li].removeAttribute("disabled");

        document.getElementById("eAmountLoaned"+li).removeAttribute("disabled");

        document.getElementsByClassName("editinterest")[li].value = 10;
        document.getElementsByClassName("editinterestspan")[li].innerHTML = "10%";
         
        document.getElementsByClassName("userNCycle2")[li].style.display = "none"; 

        document.getElementsByClassName("loantype")[li].value = "il";
    }
}
for(let ls = 0; ls < sl.length; ls++){
    sl[ls].onclick = function(){

        sl[ls].setAttribute("disabled",true);
        sl[ls].style.backgroundColor = "blue";
        sl[ls].style.color = "white";

        mbl[ls].style.backgroundColor = "white";
        mbl[ls].style.color = "black";
        sbl[ls].style.backgroundColor = "white";
        sbl[ls].style.color = "black";
        il[ls].style.backgroundColor = "white";
        il[ls].style.color = "black";

        mbl[ls].removeAttribute("disabled");
        sbl[ls].removeAttribute("disabled");
        il[ls].removeAttribute("disabled");

        document.getElementById("eAmountLoaned"+ls).removeAttribute("disabled");

        document.getElementsByClassName("editinterest")[ls].value = 10;
        document.getElementsByClassName("editinterestspan")[ls].innerHTML = "10%";
         
        document.getElementsByClassName("userNCycle2")[ls].style.display = "none"; 

        document.getElementsByClassName("loantype")[ls].value = "sl";
    }
}
