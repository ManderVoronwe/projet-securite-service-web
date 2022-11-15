<?php
include'header.php';

?>


<?php
include "database.php"; // database connection

$r_name = $r_address = $r_by = $review = ""; // user registration variables
$r_by = $re_by = $_SESSION['u_id']; 
$current_page = htmlspecialchars($_SERVER['PHP_SELF']);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

  //First name validation
  if(!empty($_POST["r_name"]) && !empty($_POST["r_address"]) && !empty($_POST["review"])) 
  
  { $r_name = $_POST["r_name"];
   $r_address = $_POST["r_address"];  
   $review = $_POST["review"];
  }
    
    else{
    ?>
<div class="alert alert-danger">
  <strong>Alert!</strong> Please Complete all fields.
</div>
<?php
    
}
      
}


$sql_restaurant = "INSERT INTO `restaurant` (`r_name`, `r_address`, `r_by`) VALUES ('$r_name','$r_address','$r_by')";

$sql_review = "INSERT INTO `review` (`r_name`, `r_address`, `review`, `r_by`) VALUES ('$r_name', '$r_address', '$review','$r_by')";


if(!empty($r_name) && !empty($r_address) && !empty($review))
  {
if (($conn->query($sql_restaurant) === TRUE) && ($conn->query($sql_review) === TRUE))
{
   header('Location:user-dash.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();

?>


<div class="container">
  <div class="jumbotron  other-color">
      <a href="user-dash.php" role="button" class="btn btn-success glyphicon glyphicon-home"> Home</a>
 <div class="row">
   
    <div class="col-sm-8" style="background-color:none;">
         <h2>Add new Restaurant </h2>
       </div>
   
  </div>
      
   
<form class="form-horizontal" role="form" method="post" action="<?php echo $current_page;?>" autocomplete="on">
    <div class="form-group">
      <label class="control-label col-sm-2" for="r_name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="r_name" name="r_name" placeholder="Enter Restaurant name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="r_address">Address:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="r_address" name="r_address" placeholder="Enter Restaurant address">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="review">Review:</label>
      <div class="col-sm-10">          
          <textarea class="form-control" id="review" name="review" placeholder="Enter your review"></textarea>
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

<?php include'footer.html';?>
