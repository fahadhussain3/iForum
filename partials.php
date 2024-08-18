<?php
include 'dbconnect.php';
echo '<nav class="navbar navbar-expand-lg bg-dark border border-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php" style="color: white;">iForum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php" style="color: white;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php" style="color: white;">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
           Top Categories
          </a>
          <ul class="dropdown-menu">';
          $sql="SELECT * FROM `categories` LIMIT 3";
          $result=mysqli_query($connection,$sql);
          while ($row=mysqli_fetch_assoc($result)) {
            $cat=$row['name'];
            $id_of_cat=$row['cat_id'];
            echo '<li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="threadslist.php?cat_id='.$id_of_cat.'">'.$cat.'</a></li>
            ';

          }
            echo '
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" style="color: white;">Contact Us</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="search.php" method="GET">
        <input class="form-control me-2 mx-1" type="search" name="query" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      ';
      
        session_start();
        echo'';
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
          echo '
          <a href="logout.php"><button type="button" class="btn btn-outline-success mx-1">Logout</button></a>
          <button type="button" class="btn btn-outline-success mx-1" data-bs-toggle="modal" data-bs-target="#LoginModal">LogIn</button>
          <button type="button" class="btn btn-outline-success mx-1" data-bs-toggle="modal" data-bs-target="#SignupModal">SignUp</button>';
        }
        else {
          echo '<button type="button" class="btn btn-outline-success mx-1" data-bs-toggle="modal" data-bs-target="#LoginModal">LogIn</button>
        <button type="button" class="btn btn-outline-success mx-1" data-bs-toggle="modal" data-bs-target="#SignupModal">SignUp</button>';
        }
        echo '
      </form>
    </div>
  </div>
</nav>';
include 'login.php';
include 'signup.php';
if (isset($_GET['signup_success']) && $_GET['signup_success']=="true") {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Success!</strong> Your account created Successfully. Now you can login.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}

elseif (isset($_GET['signup_success']) && $_GET['signup_success'] == "username_exist") {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Failed!</strong> Username already exist.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}

elseif (isset($_GET['signup_success']) && $_GET['signup_success'] == "Password_donot_match") {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Failed!</strong> Password do not match.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}
elseif (isset($_GET['signup_success']) && $_GET['signup_success'] == "nodtl") {

  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Failed!</strong> Please enter details.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}


elseif (isset($_GET['login_success']) && $_GET['login_success'] == "true") {

  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Success!</strong> You loggedin successfully.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}

elseif (isset($_GET['login_success']) && $_GET['login_success'] == "no_dtl") {

  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Failed!</strong> Please enter details.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}

elseif (isset($_GET['login_success']) && $_GET['login_success'] == "password_nt_match") {

  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Failed!</strong> Wrong Password.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}


elseif (isset($_GET['login_success']) && $_GET['login_success'] == "account_nt_exist") {

  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Failed!</strong> You do not have any account. Please Signup
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}

elseif (isset($_GET['logout']) && $_GET['logout'] == "true") {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>!</strong> You logged out.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}
?>