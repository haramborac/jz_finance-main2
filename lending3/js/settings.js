
function cdTable(){
    let dlt = document.getElementById('dlt');
    var inputC, filterC, tableC, trC, tdC, iC, txtValueC;

    if(dlt.value =='0'){
  
        document.getElementById('spancd').innerHTML = 'Micro Business Loan';
        localStorage.setItem('showlad','0');
    
        inputC = 'MBL';
        filterC = inputC.toUpperCase();
        tableC = document.getElementById("curDeducTable1");
        trC = tableC.getElementsByTagName("tr");
        for (iC = 0; iC < trC.length; iC++) {
            tdC = trC[iC].getElementsByTagName("td")[0];
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
    if(dlt.value == '1'){
      
        document.getElementById('spancd').innerHTML = 'Small Business Loan';
        localStorage.setItem('showlad','1');

        inputC = 'SBL';
        filterC = inputC.toUpperCase();
        tableC = document.getElementById("curDeducTable1");
        trC = tableC.getElementsByTagName("tr");
        for (iC = 0; iC < trC.length; iC++) {
            tdC = trC[iC].getElementsByTagName("td")[0];
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
    if(dlt.value == '2'){
   
        document.getElementById('spancd').innerHTML = 'Item Loan';
        localStorage.setItem('showlad','2');

        inputC = 'IL';
        filterC = inputC.toUpperCase();
        tableC = document.getElementById("curDeducTable1");
        trC = tableC.getElementsByTagName("tr");
        for (iC = 0; iC < trC.length; iC++) {
            tdC = trC[iC].getElementsByTagName("td")[0];
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
    if(dlt.value == '3'){

        document.getElementById('spancd').innerHTML = 'Salary Loan';
        localStorage.setItem('showlad','3');

        inputC = 'SL';
        filterC = inputC.toUpperCase();
        tableC = document.getElementById("curDeducTable1");
        trC = tableC.getElementsByTagName("tr");
        for (iC = 0; iC < trC.length; iC++) {
            tdC = trC[iC].getElementsByTagName("td")[0];
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

window.onload = function(){
    let lssl = localStorage.getItem('showlad');
    dlt.value = lssl;
    cdTable();
}