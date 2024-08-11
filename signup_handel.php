<?php
$showerror="no";
if ($_SERVER['REQUEST_METHOD']=='POST') {
  include 'dbconnect.php';
  $username=$_POST['username'];
  $email=$_POST['Email'];
  $password=$_POST['Password1'];
  $cpassword=$_POST['Password2'];
  if ($username && $email && $password && $cpassword) {
    $sql="SELECT * FROM `users` WHERE `username` = '$username'";
    $result=mysqli_query($connection,$sql);
          $num = mysqli_num_rows($result);
          if ($num>0) {
            $showerror="username_exist";
          }
          else {
            if ($password==$cpassword) {
              $sql="INSERT INTO `users` (`Sr. No`, `username`, `email`, `password`, `date`) VALUES (NULL, '$username', '$email', '$password', current_timestamp())";
              $result=mysqli_query($connection,$sql);
              // $showerror="created";
              // $showalert= true;
              header("Location: /iForum/iForum/home.php?signup_success=true");
              session_start();
              $_SESSION['signedup']=true;
              $_SESSION['useranme']=$username;
              exit();
            }
              else {
                $showerror="Password_donot_match";
              }
          }
          
        }
        else {
          $showerror="nodtl";
        }
   
  
  header("Location: /iForum/iForum/home.php?signup_success=$showerror");

}
?>