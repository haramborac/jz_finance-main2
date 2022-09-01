<?php 

session_start();


include 'db.php';

if(isset($_POST['cssCreate'])){
    $branch       =   $connection->real_escape_string($_POST['csBranch']);
    $fullname       = $connection->real_escape_string($_POST['fullname']);
    $username       = $connection->real_escape_string($_POST['username']);
    $password       = $connection->real_escape_string($_POST['password']);
    

    if(empty($fullname) || empty($username) || empty($password)){
        header ("location:Settings.php?signup=empty");
        exit ();   
    }elseif(mysqli_num_rows(mysqli_query($connection, "SELECT * FROM insert_cssaccount WHERE username = '$username' and branch = '$branch'"))>0){
        header ("location:Settings.php?signup=userexist");
        exit ();
    }else{
        $password   = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($connection, "INSERT INTO insert_cssaccount (branch, fullname, username, password) VALUES ('$branch','$fullname', '$username', '$password')");
    
        header ("location:Settings.php?signup=success");
        exit ();
    }
}


if(isset($_POST['loginCSS'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $result = mysqli_query($connection, "SELECT * FROM insert_cssaccount where username = '$username'");

    if(empty($username) || empty($password)) {
        header ("location:Login.php?login=empty");
        exit ();
    }else {
        if(mysqli_num_rows($result)>0) {
            $row       = mysqli_fetch_assoc($result);
            $verify    = password_verify($password,$row['password']);
            if($verify==1){
                $_0SESSION['IS_LOGIN']=true;
                $_SESSION['UNAME']=$row['username'];
                
                header("location:Home.php?$username");
            }else{
                header ("location:Login.php?login=incorrectpassword");
                exit ();
            }
        }else{
            header ("location:Login.php?login=usernotexist");
            exit ();
        }
    }

}
