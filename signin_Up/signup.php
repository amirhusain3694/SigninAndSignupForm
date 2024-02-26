<?php
$showalert=false;
$erralert=false;

if($_SERVER['REQUEST_METHOD']=='POST'){
            include "dbconnect.php";

            $name =$_POST ['name'];
            $userid =$_POST ['userid'];
            $password =$_POST ['password'];
            $cpassword =$_POST ['cpassword'];
            
            // here cheching acount alrady exist or not in data base 
            $exist = "select * from signin where userid='$userid'";
            $run =mysqli_query($conn,$exist);
            $numberExistRow = mysqli_num_rows($run);
            if($numberExistRow >0){
                $erralert ="Userid alrady exist"; 
                
            }
            
            // oher wise acount will be create aferter password match 
            else
            {
                // here chcking pasword is matching or not
                if($password == $cpassword){
                    // here usig hash funtion for password incrption
                    $hash=password_hash($password,PASSWORD_DEFAULT);

                    // here inserted data in data base 
                    $insert = "INSERT INTO `signin` (`name`, `userid`, `password`) VALUES ('$name', '$userid', '$hash')";
                    $run =mysqli_query($conn,$insert);
                    if($run){
                        
                        $showalert="You account have been successfully created";
                    }
                }
                else{
                    $erralert="Password do not match";
                }
            }
    }
include("navbar.php");

if($showalert){
   echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Successfull ! </strong>'. $showalert.'
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
}
else{
    echo' <div class="alert alert-danger  alert-dismissible fade show" role="alert">
    <strong>UnSuccessfull ! </strong>'. $erralert.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

</div>

<main>
    <div class="container login-form my-5">
        
                <form action="" method="POST">
                    <h2>Sign Un</h2>
                    <div class="my-3">
                        
                        <label for="name" class="form-label">Enter Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        
                        <label for="userid" class="form-label">Enter Userid</label>
                        <input type="text" class="form-control" id="name" name="userid" required>

                        <label for="password" class="form-label my-3">Password</label>
                        <input type="text" class="form-control" id="email" name="password"Required>

                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" id="title" name="cpassword"required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary my-3">Sign Up</button>
                </form>
                </div>
        
    </main>
 </class>
</body>
 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
 crossorigin="anonymous"></script>
</html>