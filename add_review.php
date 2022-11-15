
    
    <?php	
include 'header.php';
    include "database.php";
$review = "";
?>
    

     
   	 <?php
     if(isset($_GET['r_id']) && isset($_GET['r_name']) && isset($_GET['r_address']))
        {
            $r_id = $_GET['r_id'];
            $r_name = $_GET['r_name'];
            $r_address = $_GET['r_address'];
			$_SESSION['r_id'] = $r_id;
         	$_SESSION['r_name'] = $r_name;
         	$_SESSION['r_address'] = $r_address;
     
        }
  
  $r_by = $_SESSION['u_id'];
     
     
     if ($_SERVER["REQUEST_METHOD"] == "POST")
{


  
  if(!empty($_POST["review"]))
  {
      $review = $_POST["review"];    
  }
         
    else{
    ?>
    <div class="alert alert-danger">
     <strong>Alert!</strong> Please Complete all fields.
     </div>
     <?php
    
     }
   	$r_id = $_SESSION['r_id'];
    $r_name = $_SESSION['r_name'];
    $r_address = $_SESSION['r_address'];
 $_SESSION['r_address'] = $_SESSION['r_name'] = $_SESSION['r_id'] = "";    
}

     
   $sql_review = "INSERT INTO `review` (`r_name`, `r_address`, `review`, `r_by`) VALUES ('$r_name', '$r_address', '$review','$r_by')";


if(!empty($r_name) && !empty($r_address) && !empty($review) && !empty($r_by))
  {
if ($conn->query($sql_review) === TRUE)
{
   header('Location:user-dash.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();

       ?>



















 <div class="container"> 
    
 <div class="jumbotron other-color">
<a href="user-dash.php" role="button" class="btn btn-success glyphicon glyphicon-home"> Home</a>
      
<h2>Hi <?php echo $_SESSION['u_name']; ?></h2>    
     

     
     <form class="form-horizontal" role="form" method="post" action="<?php echo $current_page;?>" autocomplete="on">

    <div class="form-group">
      <label class="control-label col-sm-2" for="review">Review:</label>
      <div class="col-sm-10">          
          <textarea class="form-control" id="review" name="review" placeholder="Enter your review for <?php echo $r_name; ?>"></textarea>
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

      
    </div>
      
  </div>

<?php include 'footer.html';?>