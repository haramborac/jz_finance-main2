<style>
    <?php include_once 'CSS/login.css'; ?>
</style>

<div class="loginAccess">
    <div class="loginBgContainer">
        <h2>Welcome to<br><span>Chatspeak Lending</span></h2>
        <div class="loginError">
            <?php
                if(!isset($_GET['login'])){
                    echo '';
                }else{
                    $loginCSSCheck = $_GET['login'];

                    if($loginCSSCheck == "empty"){
                        echo "<div class='errorLogin required'><p>Please fill all fields</p></div>";
                    }elseif($loginCSSCheck == "usernotexist"){
                        echo "<div class='errorLogin contact'><p>Username not exist</p></div>";
                    }elseif($loginCSSCheck == "incorrectpassword"){
                        echo "<div class='errorLogin highfile'><p>Password Incorrect</p></div>";
                    }
                }
            ?>
        </div>
        <form action="loginFormCode.php" method="POST">
            <div class="loginContent">
                <!-- <label for="cssBranch">Branch</label>
                <select name="cssBranch" id="cssBranch">
                    <option value="all">All Branches</option>
                    <option value="stamaria">Sta. Maria</option>
                    <option value="marilao">Marilao</option>
                    <option value="tandangsora">Tandang Sora</option>
                </select><br> -->
                <label for="cssUserName">CSS Username</label>
                <input type="text" id="cssUserName" name="username"><br>
                <label for="cssPassword">Password</label>
                <input type="password" id="cssPassword" name="password">
            </div>
            <button type="submit" name="loginCSS">LOGIN</button>
        </form>
    </div>
</div>
