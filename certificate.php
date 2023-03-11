<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <script>
        function printIframe() {

var form = document.getElementById('myForm');
// get reference to iframe
var iframe = document.getElementById('myIframe');
form.submit();
// wait for iframe to finish loading
form.onload = function() {
    // create a new window for printing
    var iframeWindow = iframe.contentWindow;

    // print the iframe
    iframeWindow.print();
}
}
    </script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator </title>
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
                <a class="navbar-brand" href="home.php">
                    <?php echo $_SESSION["user"]; ?>
                </a>
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
                        <a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="addnew.php"><i class="fa fa-desktop"></i>Add User</a>
                    </li>

                    <li>
                        <a class="active-menu" href="certificate.php"><i class="fa fa-qrcode"></i>Certificate</a>
                    </li>
                    <li>
                        <a href="completed.php"><i class="fa fa-qrcode"></i>Completed</a>
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
                            Send Certificate
                        </h1>
                    </div>


                    <div class="col-md-8 col-sm-8" style='width:550px;'>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Complaint conformation
                            </div>
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Email ID</th>
                                            <th>
                                                <form name='myform' id="myForm" method='POST'>
                                                <select name="email" type="email" class="form-control" required>
                                                    <option value='1'>Select Email ID to send Certificate</option>
                                                    <?php

                                                    include('db.php');
                                                    $query = "SELECT email, COUNT(*) as count FROM complaints GROUP BY email";
                                                    $result = mysqli_query($con, $query);
                                                    
                                                    // Store unique email values and count in an array
                                                    $emails = array();
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $emails[$row['email']] = $row['count'];
                                                    }

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $emails[] = $row['email'];
                                                    }
                                                             ?>


<?php foreach ($emails as $email => $count){ ?>
        <option value="<?php echo $email; ?>"><?php echo $email; ?> (<?php echo $count; ?>)</option>
    <?php } ?>

                                                </select>
                                            </th>
                                            
                                            
                                        </tr>
                                        
                                        
                                    </table>
                                    <small style='float:right;'>The numbers in brackets represents the number of complaints registered by citizen.</small><br>
                                </div>
                                
                                
                            </div>
                            
                            
                        </div>
                        <input type='submit'  class='btn-success btn' name='submit' value='Generate'>&nbsp
                        
                        
                        <script>
		function printIframe() {

			// get reference to iframe
			var iframe = document.getElementById('myIframe');
        
			// wait for iframe to finish loading
				// create a new window for printing
				var iframeWindow = iframe.contentWindow || iframe;

				// print the iframe
				iframeWindow.print();
		}
        </script>
                           
                           
                        </form>
                        <button onclick="printIframe()" class='btn btn-primary'>Print</button>
                        <a class='btn-danger btn' name='submit' href='mailto:admin@rohan.tk'>Send</a>
                    </div>

                    <?php 
                    
                    if(isset($_POST['submit'])){

                     if($_POST['email']=='1')  {
                        echo "<script>alert('Please select Email Address')</script>";
                     } else{
                    $email=$_POST['email'];
                    $sql = 'SELECT fname FROM complaints where email="'.$_POST['email'].'"';
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $name=$row['fname'];
                    $count=$emails[$email];
                    $cid=uniqid();
                    mysqli_query($con,'INSERT into certs values("","'.$name.'","'.$cid.'")');

                    echo "<iframe id='myIframe' src='cert.php?n=".urlencode($name)."&c=".$count."&cid=".$cid."' width='630px' height='390px'></iframe>
                    <style>
                        iframe {
                    
                      border: none;
                      box-shadow: 0px 0px 5px #ccc;
                    }
                    
                        </style>
                    ";
                

                    }
                    }
                    ?>












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


</body>

</html>