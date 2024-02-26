<?php
// here alert massage varialble
error_reporting(0);
$loginalert=false;
$erralert=false;

if($_SERVER['REQUEST_METHOD']=='POST'){
            include "dbconnect.php";
       
            $userid =$_POST ['userid'];
            $password =$_POST ['password'];
// here matching pasword from data base 
        // $query = "select * from signin where userid='$userid' && password='$password'";
        $query = "select * from signin where userid='$userid'";
        $result =mysqli_query($conn,$query);
       $row = mysqli_num_rows($result);
       if($row == 1){

            while($rows = mysqli_fetch_assoc($result)){
                if(password_verify($password,$rows['password'])){

                    $signIn=true;
                    // here start session 
                    $loginalert="You have loged in";
           //    after matching password session will start from here 
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION ['userid']=$userid;
                    header("location: welcome.php");
                }
                else{
                    $erralert="Password or userid worng";
                   }

            }
           
       }
       else{
        $erralert="Password or userid worng";
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


<main>
    <div class="container login-form my-5">
        
                <form action="" method="POST">
                    <h2>Sign In</h2>
                    <div class="my-3">
                      
                        <label for="userid" class="form-label">Enter Userid</label>
                        <input type="text" class="form-control" id="name" name="userid" required>

                        <label for="password" class="form-label my-3">Password</label>
                        <input type="text" class="form-control" id="email" name="password"Required>

                    
                    <button type="submit" class="btn btn-primary my-3">Sign In</button>
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