<?php  
 session_start();  
$message='';
 if(isset($_SESSION["user"]))  
 {  
      header("location:home.php");  
 }  
 
 ?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <meta name='Description' content='Enter your description here' />
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
  <link rel='stylesheet' href='assets/css/style.css'> -->
  <title>Title</title>
</head>






<body>
<!-- Navbar  -->
<div class='' style='margin:auto; background-color:#00243e; position:fixed ; top: 0px; width:100%'>
  <nav class='navbar'>
    <a class='navbar-brand text-center'  style=' color:aliceblue' href='#'><br>HNP Admin Login</a>
  </nav>
</div>

  <!-- Navbar  -->
<br><br><br><br>
 <div id='1' class='container' style='height: 40px'></div>

 <center>  <img class='card-img-top' src='assets/img/logo.png' height='170px' alt='HNP'></center>
<!-- Form  --><br><br>
    <div style='width:300px; margin: auto; border:solid #333; padding:30px;border-radius:10px;'>

  
      <div class='card border-dark'>
        <div class='card-body'>
          <h4 class='card-title'>Login</h4>
          <br>
<form action="login.php" method="post" name="adminlogin">
          <div class='form-group'>
            <label for=''>Username</label>
            <input type='text' class='form-control' name='username' id='' aria-describedby='helpId' placeholder='' required>
          </div>
          <div class='form-group'>
            <label for=''>Password</label>
            <input type='password' class='form-control' name='password' id='' placeholder='' required>
          </div>
          <center> <input type='submit' class='btn btn-primary' value='Submit'></center>

        </div>

      </div>
    </div>
  </div>
  <br><br>

<?php



if($_SERVER["REQUEST_METHOD"] == "POST") {

$username = $_POST['username'];
$password = $_POST['password'];
   
include ('db.php');
$sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
if ($result = mysqli_query($con, $sql)) {
  
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
mysqli_free_result($result);
mysqli_close($con);

if($count == 1){

   $_SESSION['user'] = $username;
         
         header("location:home.php");
}
else {
        // echo '<script>document.getElementById(\'1\').innerHTML=\'<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Invalid Credentials</strong> Username or password is incorrect</div>\';
        // </script>';
        echo "<script>alert('Invalid Username/Password')</script>";
      }
}}
 



?>




  <!-- Form  -->



<!-- Footer  -->
  <footer class='text-center text-lg-start' style='background-color:#00243e; position:fixed ; bottom: 0px; width:100%; padding:20px;'>
    <!-- Copyright -->
    <div class='text-center text-white p-3' style='color:white;'>
      © 2023 Copyright &nbsp
      <a class='text-white' href='#'>municipality.tk</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->




  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js'></script> -->
</body>

</html>