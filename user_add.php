<?php
include 'header.php';

?>


<?php
include "database.php"; // database connection


$r_name = $r_address = $r_by = $review = $rating = ""; // user registration variables
$r_by = $re_by = $_SESSION['u_id'];
$current_page = htmlspecialchars($_SERVER['PHP_SELF']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //First name validation
  if (!empty($_POST["r_name"]) && !empty($_POST["r_address"]) && ($_POST["add_review"] == false)) {
    $r_name = $_POST["r_name"];
    $r_address = $_POST["r_address"];
  } else if (!empty($_POST["review"]) && !empty($_POST["r_rating"]) && !empty($_POST["r_address"]) && !empty($_POST["r_name"])) {
    $review = $_POST["review"];
    $rating = $_POST["r_rating"];
    $r_name = $_POST["r_name"];
    $r_address = $_POST["r_address"];
    $sql_review = "INSERT INTO `review` (`r_name`, `r_address`, `review`, `r_by` , `rating` ) VALUES ('$r_name', '$r_address', '$review','$r_by', '$rating')";
  } else {

?>
    <div class="alert alert-danger">
      <strong>Attention !</strong> Tous les champs doivent être remplis.
    </div>
<?php

  }
}


$sql_restaurant = "INSERT INTO `restaurant` (`r_name`, `r_address`, `r_by`) VALUES ('$r_name','$r_address','$r_by')";




if (!empty($r_name) && !empty($r_address)) {
  if ($_POST["add_review"] == false) {
    if (($conn->query($sql_restaurant) === TRUE)) {
      header('Location:user-dash.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {

    if (($conn->query($sql_restaurant) === TRUE) && ($conn->query($sql_review) === TRUE)) {
      header('Location:user-dash.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

$conn->close();

?>


<div class="container">
  <div class="jumbotron  other-color">
    <a href="user-dash.php" role="button" class="btn btn-success glyphicon glyphicon-home">Accueil</a>
    <div class="row">

      <div class="col-sm-8" style="background-color:none;">
        <h2>Ajouter un restaurant</h2>
      </div>

    </div>


    <form class="form-horizontal" role="form" method="post" action="<?php echo $current_page; ?>" autocomplete="on">
      <div class="form-group">
        <label class="control-label col-sm-2" for="r_name">Nom :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="r_name" name="r_name" placeholder="Enter Restaurant name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="r_address">Adresse :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="r_address" name="r_address" placeholder="Enter Restaurant address">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="add_review">Ajouter un avis :</label>
        <div class="col-sm-10">
          <input type="checkbox" class="form-control" id="add_review" name="add_review">
        </div>
      </div>
      <script>
        $(document).ready(function() {
          $("#add_review").click(function() {
            if ($(this).is(":checked")) {
              $("#review").show();
              $("#rating").show();
              $("#review_label").show();
              $("#stars_label").show();
              $("#stars").show();


            } else {
              $("#review").hide();
              $("#rating").hide();
              $("#review_label").hide();
              $("#stars_label").hide();
              $("#stars").hide();
            }
          });
        });
      </script>
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
        <label for="r_rating" id="stars_label" class="control-label-first" style="display:none;">Note : </label>
        <div class="row" id="stars" style="display:none;" default="0">
          <div class="rate">

            <input type="radio" id="star5" name="r_rating" value="5" />
            <label for="star5" title="text">5 étoiles</label>
            <input type="radio" id="star4" name="r_rating" value="4" />
            <label for="star4" title="text">4 étoiles</label>
            <input type="radio" id="star3" name="r_rating" value="3" />
            <label for="star3" title="text">3 étoiles</label>
            <input type="radio" id="star2" name="r_rating" value="2" />
            <label for="star2" title="text">2 étoiles</label>
            <input type="radio" id="star1" name="r_rating" value="1" />
            <label for="star1" title="text">1 étoiles</label>

          </div>


        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" id="review_label" for="review" style="display:none;">Avis :</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="review" name="review" placeholder="Enter your review" style="display:none;"></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Proposer un restaurant</button>
          </div>
        </div>
      </div>
    </form>
  </div>


</div>


<?php include 'footer.html'; ?>