function caFilterCurrent(){
    var input, table, tr, td, i, j=0, sum = 0, txtValue;
    var x = document.getElementById("caNameID").value;    
        input = x;
        filter = input.toUpperCase();
        table = document.getElementById("tCurrent");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
}
function filterC(){
    var input, table, tr, td, i, txtValue, sum = 0;
    var x = document.getElementById("caNameID").value;    
    if(x==0){
        input = "";
        filter = input.toUpperCase();
        table = document.getElementById("tCurrent");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;

                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";      
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }   else{
        caFilterCurrent();
    }

}
function caFilterCurrent2(){
    var input, table, tr, td, i, j=0, sum = 0, txtValue;
    var x = document.getElementById("caNameID").value;    
        input = x;
        filter = input.toUpperCase();
        table = document.getElementById("print-table");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
}
function filterC2(){
    var input, table, tr, td, i, txtValue, sum = 0;
    var x = document.getElementById("caNameID").value;    
    if(x==0){
        input = "";
        filter = input.toUpperCase();
        table = document.getElementById("print-table");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;

                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";      
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }
        }
    }   else{
        caFilterCurrent2();
    }
}
function caFilter(){
    filterC();
    filterC2();
}


