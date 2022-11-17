<?php
include 'header.php';

?>


<?php
include "database.php"; // database connection

$u_name = $u_password = $u_email = ""; // user registration variables
$current_page = htmlspecialchars($_SERVER['PHP_SELF']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //First name validation
  if (!empty($_POST["u_name"]) && !empty($_POST["u_email"]) && !empty($_POST["u_password"])) {
    $u_name = $_POST["u_name"];
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



$sql = "INSERT INTO `users` (`u_name`, `u_password`, `u_email`) VALUES ('$u_name','$u_password','$u_email')";


if (!empty($u_name) && !empty($u_email) && !empty($u_password)) {
  if ($conn->query($sql) === TRUE) {
    header('Location:signin.php');
  } else {
  ?>
    <div class="alert alert-danger">
      <strong>Alert!</strong> Email Id already registered.
    </div>
<?php
  }
}

$conn->close();

?>


<body>

  <div class="container">
    <div class="jumbotron  other-color">
      <div class="row">
        <div class="col-sm-4" style="background-color:none;">
          <img src="user.png" class="img-rounded" alt="Cinque Terre" width="100" height="100">
        </div>
        <div class="col-sm-8" style="background-color:none;">
          <h1>Création de compte</h1>
        </div>

      </div>


      <form class="form-horizontal" role="form" method="post" action="<?php echo $current_page; ?>" autocomplete="on">
        <div class="form-group">
          <label class="control-label col-sm-2" for="name">Un pseudo :</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="u_name" placeholder="Enter Full name">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email :</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="u_email" placeholder="Enter email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Mot de passe :</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="pwd" name="u_password" placeholder="Enter password">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Créer</button>
          </div>
        </div>
      </form>
    </div>

  </div>

</body>