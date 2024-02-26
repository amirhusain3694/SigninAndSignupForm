<?php
session_start();
// here checking session or not 
if(!isset($_SESSION['loggedin']) || $_SESSION['userid']!=true)
{
    header("location: signIn.php");
    exit;
}
include("navbar.php");
?>
       <div class="container my-4">
        <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">welcome !  <?php echo $_SESSION['userid'];?></h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to <a href="logout.php">log out</a></p>
</div>
        </div>
</body>
</html>