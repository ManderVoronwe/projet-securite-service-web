<?php
include 'header.php';
include "database.php";
$review = "";
$r_rating = "";
?>



<?php
if (isset($_GET['r_id']) && isset($_GET['r_name']) && isset($_GET['r_address'])) {
  $r_id = $_GET['r_id'];
  $r_name = $_GET['r_name'];
  $r_address = $_GET['r_address'];
  $_SESSION['r_id'] = $r_id;
  $_SESSION['r_name'] = $r_name;
  $_SESSION['r_address'] = $r_address;
}

$r_by = $_SESSION['u_id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {



  if (!empty($_POST["review"]) && !empty($_POST["r_rating"])) {
    $r_rating = $_POST["r_rating"];
    $review = $_POST["review"];
  } else {
?>
    <div class="alert alert-danger">
      <strong>Attention !</strong> Il faut remplir tout les champ.
    </div>
<?php

  }
  $r_id = $_SESSION['r_id'];
  $r_name = $_SESSION['r_name'];
  $r_address = $_SESSION['r_address'];
  $_SESSION['r_address'] = $_SESSION['r_name'] = $_SESSION['r_id'] = "";
}


$sql_review = "INSERT INTO `review` (`r_name`, `r_address`, `review`, `r_by`, `rating`) VALUES ('$r_name', '$r_address', '$review','$r_by', '$r_rating')";


if (!empty($r_name) && !empty($r_address) && !empty($review) && !empty($r_by)) {
  if ($conn->query($sql_review) === TRUE) {
    header('Location:user-dash.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

?>


















<div class="container">

  <div class="jumbotron other-color">
    <a href="user-dash.php" role="button" class="btn btn-success glyphicon glyphicon-home"> Accueille</a>

    <h2>Salut <?php echo $_SESSION['u_name']; ?> qu'est ce que tu pense de <?php echo $r_name; ?> ?</h2>



    <form class="form-horizontal" role="form" method="post" action="<?php echo $current_page; ?>" autocomplete="on">

      <div class="form-group">
        <style>
          .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
          }

          .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
          }

          .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
          }

          .rate:not(:checked)>label:before {
            content: '★ ';
          }

          .rate>input:checked~label {
            color: #ffc700;
          }

          .rate:not(:checked)>label:hover,
          .rate:not(:checked)>label:hover~label {
            color: #deb217;
          }

          .rate>input:checked+label:hover,
          .rate>input:checked+label:hover~label,
          .rate>input:checked~label:hover,
          .rate>input:checked~label:hover~label,
          .rate>label:hover~input:checked~label {
            color: #c59b08;
          }
        </style>
        <label for="r_rating" class="control-label-first">Note : </label>
        <div class="row">              
              <div class="rate">
                
                <input type="radio" id="star5" name="r_rating" value="5" />
                <label for="star5" title="text">5 etoiles</label>
                <input type="radio" id="star4" name="r_rating" value="4" />
                <label for="star4" title="text">4 etoiles</label>
                <input type="radio" id="star3" name="r_rating" value="3" />
                <label for="star3" title="text">3 etoiles</label>
                <input type="radio" id="star2" name="r_rating" value="2" />
                <label for="star2" title="text">2 etoiles</label>
                <input type="radio" id="star1" name="r_rating" value="1" />
                <label for="star1" title="text">1 etoiles</label>
              </div>
              
          
        </div>
        <div class="row">
          <label class="control-label col-sm-2" for="review">Avis :</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="review" name="review" placeholder="Enter your review for <?php echo $r_name; ?>"></textarea>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Poster</button>
        </div>
      </div>
    </form>
  </div>

</div>

<?php include 'footer.html'; ?>


</div>

</div>

<?php include 'footer.html'; ?>