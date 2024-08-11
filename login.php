<?php
include 'dbconnect.php';
// if ($_SERVER['REQUEST_METHOD']=='POST') {
//     $usrname=$_POST['username'];
//     $pswrd=$_POST['Password'];
//     $sql="SELECT * FROM `users` WHERE `username` = '$usrname'";
//     $result=mysqli_query($connection,$sql);
//     $num = mysqli_num_rows($result);
//     if ($usrname && $pswrd) {
        
    
//             if ($num==1) {
//                 $user = mysqli_fetch_assoc($result);
//                 if ($user['password']==$pswrd) {
//                     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
//                             <strong>Success!</strong> You loggedin successfully.
//                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//                         </div>';
//                 }
//                 else {
//                     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//                             <strong>Failed!</strong> Wrong Password.
//                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//                         </div>';
//                 }
//             }

//             if ($num==0) {
//                 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//                             <strong>Failed!</strong> You do not have account.
//                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//                         </div>';
//             }
//             }
//     else {
//         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//         <strong>Failed!</strong> Please enter details.
//         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//     </div>';
//     }
// }
?>
<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="LoginModal">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="http://localhost/iForum/login_handel.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>