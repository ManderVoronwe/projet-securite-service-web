<?php
include 'header.php';
include "database.php";
?>

<div class="container">

  <div class="jumbotron other-color">
    <a href="user-dash.php" role="button" class="btn btn-success glyphicon glyphicon-home"> Home</a>

    <h2>Salut <?php echo $_SESSION['u_name']; ?> voici tous tes avis :</h2>


    <?php
    if (isset($_GET['r_id']) && isset($_GET['r_name']) && isset($_GET['r_address'])) {
      $r_id = $_GET['r_id'];
      $r_name = $_GET['r_name'];
      $r_address = $_GET['r_address'];

      //echo $place_id;

    
    ?>


    <?php $user_id = $_SESSION['u_id']; ?>
    <?php $sql_rest = "SELECT re_id, review, re_date from review WHERE `r_by` ='$user_id' and `r_name` = '$r_name' and `r_address` ='$r_address'"; ?>
    <?php $result = $conn->query($sql_rest); ?>

    <?php if ($result->num_rows > 0) {
      // output data of each row

    ?>


      <div class="list-group">
        <div class="list-group-item">
          <div class="row">
            <div class="col-sm-4">
              <h3><?php echo $r_name; ?></h3>
            </div>
            <div class="col-sm-4">
              <h3><?php echo $r_address; ?></h3>
            </div>
            <div class="col-sm-4">

            </div>
          </div>
        </div>

        <?php
        while ($row = $result->fetch_assoc()) {
        ?>

          <div class="list-group-item">
            <?php echo $r_name ?>
            <span class="label label-default">posté le : <?php echo $row['re_date']; ?></span>
            <div class="stars">
              <?php
              $sql_rating = "SELECT rating from review WHERE `re_id` ='" . $row['re_id'] . "'";
              $result_rating = $conn->query($sql_rating);
              $row_rating = $result_rating->fetch_assoc();
              $rating = $row_rating['rating'];
              for ($i = 1; $i <= 5; $i++) {
                if ($i <= $rating) {
                  echo '<span style="color: #FFD700" class="fa-solid fa-star"></span>';
                } else {
                  echo '<span class="fa-regular fa-star"></span>';
                }
              }
              ?>
            </div>
            <br>
            <?php echo $row['review']; ?>
            
          </div>

      <?php
        }
      } else {
        echo "0 results";
      }
      ?>
      </div>


    <?php } else {
      echo "No resources available";
    }
    ?>


  </div>

</div>

<?php include 'footer.html'; ?>