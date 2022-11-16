<?php
include 'header.php';
include "database.php";
?>

<div class="container">

  <div class="jumbotron other-color">
    <a href="user_add.php" role="button" class="btn btn-success">Add restaurant review</a>

    <h2>Hi <?php echo $_SESSION['u_name']; ?></h2>


    <?php $user_id = $_SESSION['u_id']; ?>
    <?php $sql_rest = "SELECT r_id, r_name, r_address from restaurant WHERE `r_by` ='$user_id'"; ?>
    <?php $result = $conn->query($sql_rest); ?>

    <?php if ($result->num_rows > 0) {
      // output data of each row

    ?>


      <div class="list-group">
        <div class="list-group-item">
          <div class="row">
            <div class="col-sm-4">
              <h3>Restaurant </h3>
            </div>
            <div class="col-sm-4">
              <h3>Address</h3>
            </div>
            <div class="col-sm-4">

            </div>
          </div>
        </div>

        <?php
        while ($row = $result->fetch_assoc()) {


        ?>

          <div class="list-group-item">
            <div class="row">
              <div class="col-sm-4"> <?php echo $row['r_name']; ?></div>
              <div class="col-sm-4"> <?php echo $row['r_address']; ?></div>
              <div class="col-sm-2">
               

                <a href="view_review.php?r_id=<?php print $row['r_id']; ?>&r_name=<?php print $row['r_name']; ?>&r_address=<?php print $row['r_address']; ?>" role="button" class="btn btn-success btn-sm">View Review</a>
                



              </div>
              <div class="col-sm-2">

                <a href="add_review.php?r_id=<?php print $row['r_id']; ?>&r_name=<?php print $row['r_name']; ?>&r_address=<?php print $row['r_address']; ?>" role="button" class="btn btn-primary btn-sm">Add Review</a>

              </div>
            </div>
          </div>

        <?php
        }
      } else {
        ?>

        <div class="alert alert-info">
          <strong>Alert!</strong> No restaurants found!. Click above to add a restaurant and review.
        </div>

      <?php
      }
      ?>
      </div>





  </div>

</div>

<?php include 'footer.html'; ?>