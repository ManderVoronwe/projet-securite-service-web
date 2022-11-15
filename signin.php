<?php
//header html file for bootstrap

include 'header.php';
?>



<?php
include "database.php"; // database connection

$u_password = $u_email = ""; // user registration variables
$current_page = htmlspecialchars($_SERVER['PHP_SELF']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (!empty($_POST["u_email"]) && !empty($_POST["u_password"])) {
    $u_email = $_POST["u_email"];
    $u_password = $_POST["u_password"];
  } else {
?>
    <div class="alert alert-danger">
      <strong>Alert!</strong> Please Complete all fields.
    </div>
  <?php

  }
}





//$sql = "INSERT INTO `users` (`u_password`, `u_email`) VALUES ('$u_password','$u_email')";

$sql = "SELECT u_id, u_name from users WHERE u_email='$u_email' and u_password='$u_password'";


if (!empty($u_email) && !empty($u_password)) {
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // output data of each row
    $row = $result->fetch_array();
    //  echo "id: " . $row["u_id"]. " - Name: " . $row["u_name"]. "<br>";
    $_SESSION['login'] = true;
    $_SESSION['u_id'] = $row['u_id'];
    $_SESSION['u_name'] = $row['u_name'];

    header('Location:user-dash.php');
  } else {
  ?>
    <div class="alert alert-danger">
      <strong>Alert!</strong> Invalid email and password combination!.
    </div>
<?php

  }
}



$conn->close();
?>




<!-- Sign In page body starts from here -->

<body>

  <div class="container">
    <div class="jumbotron  other-color">
      <div class="row">
        <div class="col-sm-4" style="background-color:none;">
          <img src="user.png" class="img-rounded" alt="Cinque Terre" width="100" height="100">
        </div>
        <div class="col-sm-8" style="background-color:none;">
          <h1>User Sign In </h1>
        </div>

      </div>



      <form class="form-horizontal" role="form" method="post" action="<?php echo $current_page; ?>" autocomplete="on">
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="u_email" id="email" placeholder="Enter email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Password:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="u_password" id="pwd" placeholder="Enter password">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </form>
    </div>

  </div>

</body>

<!-- Sign In page body ends here -->