<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<?php
		if(!isset($_GET["rid"]))
		{
				
			 header("location:index.php");
		}
		else {
				
				include ('db.php');
				$id = $_GET['rid'];
				
				
				$sql ="Select * from complaints where id = '$id'";
				$re = mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($re))
				{
                    $latitude= $row['latitude'];
                    $longitude = $row['longitude'];
					$subject = $row['subject'];
					$fname = $row['fname'];
					$phone = $row['phone'];
					$email = $row['email'];
					$indate = $row['indate'];
					$outdate = $row['outdate'];
					$subject = $row['subject'];
					$description = $row['description'];
					$imageid = $row['imageid'];
					$expenses = $row['expenses'];
					$status = $row['status'];
					
				}
					
					
				
		
	}
		
		
		
			?> 

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="addnew.php"><i class="fa fa-desktop"></i>Add User</a>
                    </li>
					
                    <li>
                        <a href="certificate.php"><i class="fa fa-qrcode"></i>Certificate</a>
                    </li>
                    <li>
                        <a  href="completed.php"><i class="fa fa-qrcode"></i>Expenses</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                    </li>
                   


                    
					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->


		
		

        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Complaint Details
                        </h1>
                    </div>
					
					
					<div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Complaint conformation
                        </div>
                        <div class="panel-body" id='cmp'>
							
							<div class="table-responsive">
                                <table class="table">
                                    <tr>
                                            <th>Complaint ID</th>
                                            <th><?php echo $id; ?></th>
                                            
                                        </tr>
                                        <tr>
                                            <th>Name </th>
                                            <th><?php echo $fname; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Phone no.</th>
                                            <th><?php echo $phone; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Email </th>
                                            <th><?php echo $email; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Date of submission </th>
                                            <th><?php echo $indate;  ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Date of completion  </th>
                                            <th><?php if ($outdate == "0000-00-00" || $outdate == "") {
												echo 'Not applicable';
											} else {
												echo $outdate;}  ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Subject </th>
                                            <th><?php echo $subject; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Description</th>
                                            <th><?php echo $description; ?></th>
                                            
                                        </tr>
										
										<?php
										echo " <script>
										function myFunction() {
  												var myWindow = window.open(\"./uploads/$imageid\", \"Complaint Image\", \"width=500,height=500\");
																}
											 </script>";
                                             
                                        echo " <script>
                                             function yourFunction() {
                                                       var myWindow = window.open(\"https://www.google.com/maps/search/?api=1&query=$latitude,$longitude\", \"Complaint Image\", \"width=500,height=500\");
                                                                     }
                                                  </script>";
                                             
                                             
										?>


										<tr>
                                            <th>Image </th>
                                            <th><?php echo "<button onclick='myFunction()'>Click to view image</button>"; ?></th>
                                            
                                        </tr>
                                        <tr>
                                            <th>
                                                Location
                                            </th>
                                            <th>
                                                <button onclick='yourFunction()'>Click to view Location</button>
                                            </th>
                                        </tr>
										<tr>
                                            <th>Expenses </th>
                                            <th><?php echo $expenses; ?> Rs\-</th>
                                            
                                        </tr>
										<tr>
                                            <th>Status </th>
                                            <th id=1><script>
											function checkStatus(){
												var s = document.getElementsByName('status')[0];
												var text = s.options[s.selectedIndex].text;

												document.getElementById(1).innerHTML=text;



											}

											</script> <?php echo ucfirst($status);  ?></th>
                                            
                                        </tr>
						
                                   
                                  
                                        
                                        
                                    
                                </table>
                            </div>
                        
					
							
                        </div>
                        <div class="panel-footer">
                            <form method="post">
										<div class="form-group">
														<label>Update Status</label>
														<select name="newstatus"class="form-control">
															<option value='new' <?php if ($status == 'new') {
																echo 'selected';
															} ?>>New</option>
														
															<option value="inprogress" <?php if ($status == 'inprogress') {
																echo 'selected';
															} ?>>In-Progress</option>
															<option value="rejected" <?php if ($status == 'rejected') {
																echo 'selected';
															} ?>>Rejected</option>
															<option value="completed" <?php if ($status == 'completed') {
																echo 'selected';
															} ?>>Completed</option>
															
															
														</select><br>
										 
														<label>Update Expenses</label>
													<input class='form-control' type='number' placeholder='<?php echo $expenses.' Rs '; ?> ' name='expensesinc' required>	<br>
                                                    <?php
                                                    
                                                    if($status=="inprogress"){
                                                        echo "<label>Date of Completion</label>";
                                                        echo "<input class='form-control' type='date' value='N/A' name='outdate' required ><br>";
                                                    }
                                                    
                                                    ?>
													</div>

							<input type="submit" name="co" value="Confirm" class="btn btn-success">
							<button class='btn btn-danger' onclick='A()'>Print</button>
                            <script>
                                function A(){
                                    document.body.style.display='none';
                                    document.getElementById('cmp').style.display='unset';
                                    window.print();
                                }
                            </script>
							
							</form>
                        </div>
                    <?php
						if(isset($_POST['co']))
						{	
                            $ns = $_POST['newstatus'];
                            $ne = $_POST['expensesinc'];
                            $ud = $_POST['outdate'] ?? null;

                           
				
                            include('db.php');
							$urb = "UPDATE `complaints` SET `status`='$ns' WHERE id = '$id'";
							$urc = "UPDATE `complaints` SET `expenses`='$ne' WHERE id = '$id'";
                            $udc = "UPDATE `complaints` SET `outdate`='$ud' WHERE id = '$id'";

                            if(mysqli_query($con,$urb) && mysqli_query($con,$urc) && mysqli_query($con,$udc)){
                                echo '<script>window.location.href="home.php"</script>';
                        
                            }

							echo $expenses;
						}



							
							// 
							// $flag = 0;

							// if($ne>0){
							// 	$urc = "UPDATE `complaints` SET `expenses`='$ne' WHERE id = '$id'";
							// }
									
							// if( mysqli_query($con,$urb))
							// 				{	
												
									
									
							
						?>
                    </div>
                    
					<br><br>
						
						
						
                        <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-header">
                                Location
                            </h1>
                        </div>      
                    
                        <iframe
      width="400"
      height="400"
      frameborder="0" style="border:0"
      src="https://www.google.com/"
      allowfullscreen>
    </iframe>		
                    

					</div>
				
         </div>
         

            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


</body>

</html>

