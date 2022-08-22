<?php
    include_once 'header.php';
?>
<style>
    <?php include_once 'CSS/home.css'; ?>
</style>
<body>
    <div class="mainContainer">
        <section id="Home" class="navContent">
            <div class="hLeft">
                <div class="welcome">
                    <h3>Welcome to</h3>
                    <h2>CS<span>Lending</span></h2>
                    <p>Chatspeak Lending provides loans for micro-entrepreneurs to fund their business growth. <br> 
                    Borrowers enjoy the customized credit with friendlier terms, efficient risk-handling insurance, <br>
                    and other value-added services needed by small businesses.</p>
                    </p>
                    <div class="hApplySheet">
                        <div class="applyCode">
                            <h3>Apply Now!</h3>
                            <div class="qrTooltip">
                                <span>Scan the Code Here
                                    <span class="qrToolText"><i class="fa fa-qrcode"></i>Google Forms</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hImg">
                    <img src="./IMG/stock.png" alt="">
                    <div onload='startDate()'>
                        <div id='date'></div>
                    </div>
                    <script>
                        function startDate() {
                            var d = new Date();
                            var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                            var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                            document.getElementById("date").innerHTML = days[d.getDay()]+" <br> "+d.getDate()+" "+months[d.getMonth()]+" "+d.getFullYear();
                        }
                        startDate();
                    </script>
                </div>
            </div>
        </section>

          