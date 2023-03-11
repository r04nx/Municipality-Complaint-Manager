

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <meta name='Description' content='Enter your description here' />
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'> -->
  <link rel='stylesheet' href='assets/css/style.css'>
  <title>Verify Certificate</title>
</head>



	<style type="text/css">
		/* Styles for the verification message element */
		#verification-message {
			margin-top: 20px;
			padding: 10px;
			background-color: #d4edda;
			border: 1px solid #c3e6cb;
			border-radius: 4px;
			color: #155724;
			font-weight: bold;
			display: none;
		}

    #fake-message {
      margin-top: 20px;
  padding: 10px;
  background-color: #f8d7da;
  border: 1px solid #f5c6cb;
  border-radius: 4px;
  color: #721c24;
  font-weight: bold;
  display: none;
		}
	</style>
	



<body>
<!-- Navbar  -->
<div class='' style='margin:auto; background-color:#00243e; position:fixed ; top: 0px; width:100%'>
  <nav class='navbar'>
    <a class='navbar-brand text-center'  style=' color:aliceblue' href='#'><br>HNP Certification Verification</a>
  </nav>
</div>

  <!-- Navbar  -->
<br><br><br><br>
 <div id='1' class='container' style='height: 40px'></div>

 <center>  <img class='card-img-top' src='../assets/img/logo.png' height='200px'alt='HNP'></center>
<!-- Form  --><br><br>
    <div style='width:400px; margin: auto; border:solid #333; padding:30px;border-radius:10px;'>

  
      <div class='card border-dark'>
        <div class='card-body'>
          <h4 class='card-title'>Verify authenticity of your Certificate</h4>
          <br>
<form method="post" name="">
          <div class='form-group'>
            <label for=''>Certificate ID</label>
            <input type='text' class='form-control' name='cid' id='' aria-describedby='helpId' placeholder='' required>
          </div>
      
                            <div class="well">
                                <h4>HUMAN VERIFICATION</h4>
                                <p>Type Below this code
                                    <?php $Random_code = rand();
                                    echo $Random_code; ?>
                                </p><br />
                                <p>Enter the random code<br /></p>
                                <input type="text" name="code1" title="random code" required/>
                                <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
                                <input type="submit" name="submit" class="btn btn-primary">

                        



        </div>

      </div>
    </div>
    <div id="verification-message" style="display: none;"></div>
    <div id="fake-message" style="display: none;"></div>
  </div>
  <br>

  <br><br><br>
 

<?php



if($_SERVER["REQUEST_METHOD"] == "POST") {

$cid = $_POST['cid'];
$id= $_POST['code1'];
$rid=$_POST['code'];

if($rid==$id){

   
include ('../db.php');
$sql = "SELECT id FROM certs WHERE cid = '$cid'";
if ($result = mysqli_query($con, $sql)) {
  
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
mysqli_free_result($result);
mysqli_close($con);

if($count == 1){
    $fname= $row['fname'];

    
    echo "<script>

			var recipientName ='".$fname."';

			document.getElementById('verification-message').innerHTML = 'Congratulations ' + recipientName + '! This certificate is authentic and valid.';
			document.getElementById('verification-message').style.display = 'block';
		
	</script>";

 
         
        
}
else {

  echo "Fake";
  echo "<script>
  alert('Fake');`

  document.getElementById('fake-message').innerHTML = 'We're sorry, but the certificate ID you entered does not match any of our records. Please check your ID and try again.';
  document.getElementById('fake-message').style.display = 'block';

</script>";
 }
}}else{

  echo "<script>
  document.getElementById('fake-message').innerHTML = 'We're sorry, but the certificate ID you entered does not match any of our records. Please check your ID and try again.';
  document.getElementById('fake-message').style.display = 'block';

</script>";

}
}

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