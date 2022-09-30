let clearButton = document.getElementById('clearButton');
clearButton.onclick = function(){
     document.getElementById('firstName').value = "";
     document.getElementById('middleName').value = "";
     document.getElementById('lastName').value = "";
     document.getElementById('suffix').value = "";

     document.getElementById('houseNo').value = "";
     document.getElementById('street').value = "";
     document.getElementById('barangay').value = "";
     document.getElementById('city').value = "";
     
     document.getElementById('contact').value = "";
     document.getElementById('email').value = "";
     document.getElementById('age').value = "";

     document.getElementById('gender').selectedIndex = "0";
     document.getElementById('birthday').value = "";

     document.getElementById('houseNo2').value = "";
     document.getElementById('street2').value = "";
     document.getElementById('barangay2').value = "";
     document.getElementById('city2').value = "";

     document.getElementById('rent').checked = false;
     document.getElementById('wParents').checked = false;
     document.getElementById('owned').checked = false;
     document.getElementById('mortgaged').checked = false;
     document.getElementById('other').checked = false;
     document.getElementById('adOthers').value = "";

     document.getElementById('nationality').value = "";
     document.getElementById('civil').selectedIndex = "0";
     document.getElementById('ifMarried').value = "";
     document.getElementById('child').value = "";

     document.getElementById('coMaker').value = "";
     document.getElementById('coContact').value = "";

     document.getElementById('ValidID01').selectedIndex = "0";
     document.getElementById('ValidID02').selectedIndex = "0";
     document.getElementById('idNos1').value = "";
     document.getElementById('idNos2').value = "";

     document.getElementById('cmContact').value = "";
     document.getElementById('cmAddress').value = "";
     document.getElementById('cmGender').selectedIndex = "0";
     document.getElementById('cmAge').value = "";
     document.getElementById('cmProfession').value = "";
     document.getElementById('cmNationality').value = "";
     document.getElementById('cmCivilStatus').selectedIndex = "0";
     document.getElementById('cmBusiness').value = "";

}