
//CREDIT ANALYST FILTER BY PENDING FOR PENDING CLIENT TABLE
function caFilterPending(){
    var input, table, tr, td, i, j=0,txtValue;
    var x = document.getElementById("caNameID").value;    
  
        input = x;
        filter = input.toUpperCase();
        console.log("Credit Analyst "+input+" only PENDING");
        table = document.getElementById("tPending");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";   
                        j++;    
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }        
        } 
        document.getElementById("pendingID").innerHTML = j+" Clients";
}
//CREDIT ANALYST FILTER BY ONGOING/CURRENT FOR CURRENT CLIENT TABLE
function caFilterCurrent(){
    var input, table, tr, td, i, j=0, sum = 0, txtValue;
    var pVal, pValue;
    var x = document.getElementById("caNameID").value;    
    var date = new Date();
    var d = date.toLocaleDateString();
    var pD, pDate, pC, pCollect, collection = 0, released = 0, pR, pReleased, r1, r2, pY;

        input = x;
        filter = input.toUpperCase();
        console.log("Credit Analyst "+input+" only CURRENT");
        table = document.getElementById("tCurrent");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            pVal = tr[i].getElementsByTagName("td")[13];
            pD = tr[i].getElementsByTagName("td")[7];
            pC = tr[i].getElementsByTagName("td")[11];
            pR = tr[i].getElementsByTagName("td")[10];
            pY= tr[i].getElementsByTagName("td")[12];

                if (td) {
                txtValue = td.textContent || td.innerText;
                pValue = pVal.textContent || pVal.innerText;
                pDate = pD.textContent || pD.innerText;
                pCollect = pC.textContent || pC.innerText;
                pReleased = pR.textContent || pR.innerText;
                pYment = pY.textContent || pY.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        j++;     

                        dailyMatch = pValue.match(/(\d+)/);
                        dailyMatched = parseInt(dailyMatch);
                        sum += dailyMatched;

                        r1 = pReleased.match(/(\d+)/);
                        r2 = parseInt(r1);
                        released += r2;


                        collection += parseInt(pYment);    
             

                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
        document.getElementById("tmUCol").innerHTML = (sum-released).toLocaleString('en-US',{style: 'currency', currency:'PHP'})
        document.getElementById("ttlSales").innerHTML =  sum.toLocaleString('en-US',{style: 'currency', currency:'PHP'})
        document.getElementById("ttmCol").innerHTML = released.toLocaleString('en-US',{style: 'currency', currency:'PHP'})
        document.getElementById("todayCollection").innerHTML = collection.toLocaleString('en-US',{style: 'currency', currency:'PHP'})
        document.getElementById("dailyCollection").innerHTML = (sum/100).toLocaleString('en-US',{style: 'currency', currency:'PHP'})
        document.getElementById("currentID").innerHTML = j+" Clients";
}
//CREDIT ANALYST FILTER BY OVERDUE FOR OVERDUE CLIENT TABLE
function caFilterOverDue(){
    var input, table, tr, td, i, txtValue , sum = 0;
    var pVal, pValue, matches, matched;
    var x = document.getElementById("caNameID").value;    
  
 
        input = x;
        filter = input.toUpperCase();
        console.log("Credit Analyst "+input+" only OVER DUE");
        table = document.getElementById("tOverDue");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            pVal = tr[i].getElementsByTagName("td")[5];
                if (td) {
                txtValue = td.textContent || td.innerText;
                pValue = pVal.textContent || pVal.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";  
                        matches = pValue.match(/(\d+)/);
                        matched = parseInt(matches);
                        sum += matched; 
           
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
        document.getElementById("overDue").innerHTML = sum.toLocaleString('en-US',{style: 'currency', currency:'PHP'});
}
function filterP(){
    var input, table, tr, td, i, txtValue;
    var x = document.getElementById("caNameID").value;    
 
    if(x==0){
        input = "";
        filter = input.toUpperCase();
        table = document.getElementById("tPending");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";     
                        document.getElementById("pendingID").innerHTML = tr.length+" Clients" ;
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }   else{
       caFilterPending();
    }
}
function filterC(){
    var input, table, tr, td, i, txtValue, sum = 0;
    var pVal, pValue, pDaily, dailyMatch, dailyMatched;
    var x = document.getElementById("caNameID").value;    
    var date = new Date();
    var d = date.toLocaleDateString();
    var pD, pDate, pC, pCollect, collection = 0, released = 0, pR, pReleased, r1, r2, pY;

    if(x==0){
        input = "";
        filter = input.toUpperCase();
        table = document.getElementById("tCurrent");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            pVal = tr[i].getElementsByTagName("td")[13];
            pD = tr[i].getElementsByTagName("td")[7];
            pC = tr[i].getElementsByTagName("td")[11];
            pR = tr[i].getElementsByTagName("td")[10];
            pY = tr[i].getElementsByTagName("td")[12];
                if (td) {
                txtValue = td.textContent || td.innerText;
                pValue = pVal.textContent || pVal.innerText;
                pDate = pD.textContent || pD.innerText;
                pCollect = pC.textContent || pC.innerText;
                pReleased = pR.textContent || pR.innerText;
                pYment = pY.textContent || pY.innerText;

                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";      
                        document.getElementById("currentID").innerHTML = tr.length+" Clients" ;

                        dailyMatch = pValue.match(/(\d+)/);
                        dailyMatched = parseInt(dailyMatch);
                        sum += dailyMatched;

                        r1 = pReleased.match(/(\d+)/);
                        r2 = parseInt(r1);
                        released += r2;

                        collection += parseInt(pYment);

                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
        document.getElementById("tmUCol").innerHTML = (sum-released).toLocaleString('en-US',{style: 'currency', currency:'PHP'});
        document.getElementById("ttmCol").innerHTML = released.toLocaleString('en-US',{style: 'currency', currency:'PHP'});
        document.getElementById("todayCollection").innerHTML = collection.toLocaleString('en-US',{style: 'currency', currency:'PHP'});
        document.getElementById("ttlSales").innerHTML = sum.toLocaleString('en-US',{style: 'currency', currency:'PHP'});
        document.getElementById("dailyCollection").innerHTML =(sum/100).toLocaleString('en-US',{style: 'currency', currency:'PHP'})
    }   else{
        caFilterCurrent();
    }
}
function filterO(){
    var input, table, tr, td, i, txtValue , sum = 0;
    var pVal, pValue, matches, matched;
    var x = document.getElementById("caNameID").value;    
  
    if(x==0){
        input = "";
        filter = input.toUpperCase();
        table = document.getElementById("tOverDue");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            pVal = tr[i].getElementsByTagName("td")[5];
                if (td) {
                txtValue = td.textContent || td.innerText;
                pValue = pVal.textContent || pVal.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";  
                        matches = pValue.match(/(\d+)/);
                        matched = parseInt(matches);
                        sum += matched; 
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }  
        }
        document.getElementById("overDue").innerHTML = sum.toLocaleString('en-US',{style: 'currency', currency:'PHP'});
    } else{
        caFilterOverDue();
    }   
}

// Disable Inspect element
// document.addEventListener('contextmenu',(e)=>{
//     e.preventDefault();
//   }
//   );
//   document.onkeydown = function(e) {
//   if(event.keyCode == 123) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//      return false;
//   }
// }

//CREDIT ANALYST FILTER
function caFilter(){
    filterP();
    filterC();
    filterO();
  
}

