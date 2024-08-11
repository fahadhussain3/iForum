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

    <title>iForum-Home</title>
</head>


<!-- sliging images -->

<body>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/Slide-1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/Slide-2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/Slide-4.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
        echo'<div class="conatainer" style="text-align: center;">
            <div class="jumbotron jumbotron-fluid" style="background-color: #e2e6ea;">
                    <div class="container">
                        <p class="display-6">iForum-Categories</p>
                        <p class="lead">Welcome @'. $_SESSION['username'].'</p>
                    </div>
                </div>
        </div>';
    }
    else {
        echo'<div class="conatainer" style="text-align: center;">
            <div class="jumbotron jumbotron-fluid" style="background-color: #e2e6ea;">
                    <div class="container">
                        <p class="display-6">iForum-Categories</p>
                    </div>
                </div>
        </div>';
        
    }
    ?>
    <!-- cards -->
    <div class="container my-5">
        <div class="row">
            <?php
                $sql="SELECT * FROM `categories`";
                $result=mysqli_query($connection,$sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $name=$row['name'];
                    $dsc=$row['description'];
                    static $img = 1;
                    echo'
                        

                            <div class="col-md-4 mb-4 mx-auto">
                                <div class="card" style="width: 18rem;">
                                    <img src="images/img' . $img . '.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="threadslist.php?cat_id=' . $img . '">'.$name.'</a></h5>
                                        <p class="card-text">'.substr($dsc,0,90).'...</p>
                                        <a href="threadslist.php?cat_id=' . $img . '" class="btn btn-primary">Explore</a>
                                    </div>
                                </div>
                            </div>';
                            $img+=1;
                }
            ?>
        </div>
    </div>


    <footer>
        <?php
        include 'footer.php';
    ?>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
</body>

</html>