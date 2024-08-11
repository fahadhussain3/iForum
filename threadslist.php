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

    <title>Questions</title>
</head>

<?php
$id=$_GET['cat_id'];
$sql="SELECT * FROM `categories` WHERE `cat_id`=$id";
$result=mysqli_query($connection,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    $name=$row['name'];
    $dsc=$row['description'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
$tlt=$_POST['title'];
//replacing < , > in title otherwise it will be executed as a code if someone write it in the title
$tlt=str_replace("<","&lt",$tlt);
$tlt=str_replace(">","&gt",$tlt);
$desc=$_POST['dsc'];
//replacing < , > in description otherwise it will be executed as a code if someone write it in the description
$desc=str_replace("<","&lt",$desc);
$desc=str_replace(">","&gt",$desc);
if ($tlt && $desc) {
  $sqliii = "SELECT * FROM `users` WHERE `username`='{$_SESSION['username']}'";
  $reslttt=mysqli_query($connection,$sqliii);
  $row=mysqli_fetch_assoc($reslttt);
  $q_id=$row['Sr. No'];
  
      $sql2="INSERT INTO `questions` (`Sr. No`, `question title`, `question detail`, `category`,`question_id`) VALUES (NULL, '$tlt', '$desc', '$name', '$q_id')";
      $result=mysqli_query($connection,$sql2);
      if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Your question has been placed. Wait for the community to reply
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';}  
}
else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Failed!</strong> Please enter question title and the question description before submitting.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
}
}
?>


<body>
    <div class="container my-3 py-4">
        <div class="jumbotron jumbotron-fluid" style="background-color: #e2e6ea;">
            <div class="container">
                <p class="display-4"><?php echo $name;?></p>
                <p class="lead"><?php echo $dsc; ?></p>
                <hr>
                <p class="lead">Always communicate respectfully with other members. No personal attacks, harassment, or
                    hate speech.
                    Use clear and descriptive titles for new threads to help others understand the topic. Do not post
                    advertisements, promotional content, or repetitive messages.</p>
                <br>
            </div>
        </div>
        <hr>

        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
              echo '<div class="text-center">
                      <h2 style="color: #28a745;">Ask a Question</h2>
                    </div>';
            }
        ?>
        <hr>
        
        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
              echo '<div class="container">
                <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Question Title</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                    </div>

                    <label for="question dsc" class="form-label">Describe your problem</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="dsc" name="dsc"></textarea>
                    </div>
                    <br>
                    <button class="btn btn-success">Submit</button>
                    <hr>
                </form>
              </div>';
            }
            else {
              echo '<div class="jumbotron jumbotron-fluid" style="background-color: #e2e6ea;">
                <div class="container">
                    <p class="display-6">You are not logged in</p>
                    <p class="lead">Please login to ask a question</p>
                </div>
              </div>';
            }
        ?>
        
        <div class="text-center">
            <h2 style="color: #28a745;">Asked Questions</h2>
        </div>
        <br>

        <?php
        $noques=true;
          $sql="SELECT * FROM `questions` WHERE `category`='$name'";
          $result=mysqli_query($connection,$sql);
          while ($row=mysqli_fetch_assoc($result)) {
            $noques=false;
              $title=$row['question title'];
              $dtl=$row['question detail'];
              $id=$row['Sr. No'];
            echo '<div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      '.($title).'
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <a href="thread.php?ques_id='. $id .'" target="_blank" ><strong>'.($dtl).'</strong></a>
                    </div>
                  </div>
                </div>';
          }
          
          if ($noques) {
            echo '<div class="jumbotron jumbotron-fluid" style="background-color: #e2e6ea;">
                <div class="container">
                    <p class="display-4">No Question Found</p>
                    <p class="lead">Be the first person to ask a Question</p>
                </div>
            </div>';
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
