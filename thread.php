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

    <title>Discussions</title>
</head>

<?php
$id=$_GET['ques_id'];
$sql="SELECT * FROM `questions` WHERE `Sr. No`='$id'";
$result=mysqli_query($connection,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    $title=$row['question title'];
    $detail=$row['question detail'];
    $answer_id=$row['Sr. No'];
    $date =$row['date_time'];
    $question_id=$row['question_id'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $comment=$_POST['comment'];
    //replacing < , > in comments otherwise it will be executed as a code if someone write it in the comments
    $comment=str_replace("<","&lt",$comment);
    $comment=str_replace(">","&gt",$comment);
    if ($comment) {
        $sqliii = "SELECT * FROM `users` WHERE `username`='{$_SESSION['username']}'";
        $reslttt=mysqli_query($connection,$sqliii);
        $row=mysqli_fetch_assoc($reslttt);
        $q_id=$row['Sr. No'];
        $sql2="INSERT INTO `comments` (`comment Sr. No`, `username`, `comment`, `comment_id`, `date_time`, `post_by_id`) VALUES (NULL, '', '$comment', '$id', current_timestamp(), '$q_id');";
        $result=mysqli_query($connection,$sql2);
        if ($result) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> You have added a comment. Thanks for paticiptaing.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
    else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Please type a comment before submitting. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    }
?>

<body>
    <div class="container">
        <div class="jumbotron jumbotron-fluid" style="background-color: #e2e6ea;">
            <div class="container">
                <p class="display-4"><?php echo $title;?></p>
                <p class="lead"><?php echo $detail; ?></p>
                <?php
                $newsql="SELECT * FROM `users` WHERE `Sr. No`= $question_id";
                $rslt=mysqli_query($connection,$newsql);
                $ro=mysqli_fetch_assoc($rslt);
                $finaluser=$ro['username'];
                ?>
                <p>Posted By: <b><?php echo $finaluser; ?></b> at <?php echo $date; ?></p>

            </div>
        </div>
        <hr>
        <div style="text-align: center;">
        <div class="text-center">
            <h2 style="color: #28a745;">Post a Comment</h2>
            <hr>
        </div>
        </div>
        <br>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
           echo '<div class="container">
            <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
                <div class="mb-3">
                    <label for="comment" class="form-label">Add your comment</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                            name="comment"></textarea>
                        <label for="floatingTextarea">Your Comment</label>
                    </div>
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>';
        }
        else {
            echo '<div class="jumbotron jumbotron-fluid" style="background-color: #e2e6ea;">
                <div class="container">
                    <p class="display-6">You are not logged in</p>
                    <p class="lead">Please login to comment</p>
                </div>
            </div>';
        }


        ?>
<hr>
        <div style="text-align: center;">
        <div class="text-center">
            <h2 style="color: #28a745;">Comments</h2>
            <hr>
        </div>
        </div>

        <br>
        <?php
        $nocomment=true;
          $sql="SELECT * FROM `comments` WHERE `comment_id`='$id'";
          $result=mysqli_query($connection,$sql);
          while ($row=mysqli_fetch_assoc($result)) {
            $nocomment=false;
              $comt=$row['comment'];
              $iddd=$row['post_by_id'];
              $time=$row['date_time'];
              $newsql2="SELECT * FROM `users` WHERE `Sr. No`= $iddd";
                $rslt2=mysqli_query($connection,$newsql2);
                $ro2=mysqli_fetch_assoc($rslt2);
                $finaluser2=$ro2['username'];
              echo '<div class="jumbotron jumbotron-fluid" style="background-color: #e2e6ea;">
              <div class="container">
              <p>Replied: <b>'.$finaluser2.'</b> at '.$time.'</p>
                  <p class="lead">'.($comt).'</p>
              </div>
          </div>';
          }

          if ($nocomment) {
            echo '<div class="jumbotron jumbotron-fluid" style="background-color: #e2e6ea;">
                <div class="container">
                    <p class="display-6">No one has replied yet.</p>
                    <p class="lead">Be the first person to reply</p>
                </div>
            </div>';
          }

?>
    </div>
    <br>
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