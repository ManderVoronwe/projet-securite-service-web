<?php
include 'header.php';
include "database.php";
?>

<div class="container">

  <div class="jumbotron other-color">
    <a href="user-dash.php" role="button" class="btn btn-success glyphicon glyphicon-home"> Home</a>

    <h2>Hi <?php echo $_SESSION['u_name']; ?></h2>


    <?php
      if (isset($_GET['r_id']) && isset($_GET['r_name']) && isset($_GET['r_address'])) {
        $r_id = $_GET['r_id'];
        $r_name = $_GET['r_name'];
        $r_address = $_GET['r_address'];
        //echo $place_id;

      } else {
        echo "No resources available";
      }
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
            <?php echo $row['review']; ?>
            <span class="label label-default">Posted on: <?php echo $row['re_date']; ?></span>
          </div>

      <?php
        }
      } else {
        echo "0 results";
      }
      ?>
      </div>





  </div>

</div>

<?php include 'footer.html'; ?>