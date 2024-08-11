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

    <title>iForum-Search</title>
    <style>
        #main{
            min-height: 100vh;
        }
    </style>
</head>

<div class="container text-center my-3">
<h1>Search Result for <em>"<?php echo $_GET['query'];?>"</em></h1>
</div>
<?php
$no_result=true;
$search_item=$_GET['query'];
$sql="SELECT * FROM `questions` WHERE MATCH (`question title`, `question detail`) AGAINST ('$search_item');";
$result=mysqli_query($connection,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    $no_result=false;
    $name=$row['question title'];
    $dsc=$row['question detail'];
    $question_id=$row['question_id'];

    echo '<div class="jumbotron jumbotron-fluid my-3" style="background-color: #e2e6ea; ">
                <div class="container">
                    <a href="thread.php?ques_id='.$question_id.'" class="text-dark"><p><b>'.$name.'</b></p></a>
                    <p>'.$dsc.'</p>
                </div>
            </div>';
}

if ($no_result) {
    echo '<div class="jumbotron jumbotron-fluid my-3" style="background-color: #e2e6ea;">
                <div class="container">
                    <p class="display-6">No Results Found</p>
                    <p class="lead">
                        <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                            <br>
                        </ul>
                    </p>
                </div>
            </div>';
}
?>

<body>
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