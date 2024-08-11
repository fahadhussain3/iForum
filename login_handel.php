<?php
$showError="no";
include 'dbconnect.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $usrname=$_POST['username'];
    $pswrd=$_POST['Password'];
    if ($usrname && $pswrd) {
        
    
            $sql="SELECT * FROM `users` WHERE `username` = '$usrname'";
            $result=mysqli_query($connection,$sql);
            $num = mysqli_num_rows($result);
            if ($num==1) {
                        $user = mysqli_fetch_assoc($result);
                        if ($user['password']==$pswrd) {
                            header("Location: /iForum/home.php?login_success=true");
                            session_start();
                            $_SESSION['loggedin']=true;
                            $_SESSION['username']=$usrname;
                            exit();
                        }
                        else {
                            $showError="password_nt_match";     
                        }
            }

            else {
                $showError="account_nt_exist";
            }
}  
else {
    $showError="no_dtl";
}
    
    header("Location: /iForum/home.php?login_success=$showError");
}
?>