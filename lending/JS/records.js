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
        // sortingArea(sortCycle(mainFilter()))
        // sortingArea2(sortCycle2(mainFilter()))
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
