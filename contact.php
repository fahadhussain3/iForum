<?php
include 'dbconnect.php';
include 'partials.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>Contact Us</title>
</head>

<body>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $us = $_POST['username'];
        $help = $_POST['help'];
        $detail = $_POST['detail'];

        if ($us && $help && $detail) {
            $query = "INSERT INTO `contact` (`Sr. No`, `username`, `help`, `detail`, `date_time`) VALUES (NULL, '$us', '$help', '$detail', current_timestamp())";
            $result = mysqli_query($connection, $query);
            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success!</strong> Your question has been placed. We will help you ASAP.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Failed!</strong> Something went wrong.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Failed!</strong> Please enter details.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }

    echo '<form action="contact.php" method="POST">
        <div class="container my-3">
            <div class="jumbotron jumbotron-fluid" style="background-color: #e2e6ea;">
                <div class="container">
                    <p class="display-3">Contact Us</p>
                    <p class="lead">Contact the Help Team</p>
                </div>
            </div>

            <div class="mb-3 my-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We\'ll never share your email with anyone else.</div>
            </div>

            <div class="mb-3 my-3">
                <label for="help" class="form-label">What we can help you with?</label>
                <input type="text" class="form-control" id="help" name="help" aria-describedby="emailHelp">
            </div>

            <label for="detail" class="form-label">Detail</label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="" id="detail" name="detail"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>';}

    else {
    echo '<div class="container my-3">
            <div class="jumbotron jumbotron-fluid" style="background-color: #e2e6ea;">
                <div class="container">
                    <p class="display-3">You are not logged in</p>
                    <p class="lead">Please login for help</p>
                </div>
            </div>
            </div>';
}
?>
    <footer>
        <?php
        include 'footer.php';
        ?>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>