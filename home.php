<?php  
session_start();  

if(!isset($_SESSION["user"]))
{
 header("location:index.php");
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
                        <a  href="completed.php"><i class="fa fa-qrcode"></i>Completed</a>
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
                            Complaints <small>New </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <?php
                        include ('db.php');
                        $sql = "select * from complaints";
                        $re = mysqli_query($con,$sql);
                        $c =0;
                        while($row=mysqli_fetch_array($re) )
                        {
                                $new = $row['status'];
                                $id = $row['id'];
                                if($new=="new")
                                {
                                    $c = $c + 1;
                                    
                                
                                }
                        
                        }
                        
                ?>

                    <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body" >
                            <div class="panel-group" id="accordion">
                            
                            <div class="panel panel-primary" >
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            <button class="btn btn-default" type="button">
                                                 New Complaints <span class="badge"><?php echo $c ; ?></span>
                                            </button>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse" style="height:auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default" >
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                              <th>#</th>
                                       
                                            <th>Subjet</th>
                                            <th>Description</th>
                                            <th>Status</th>    
                                            <th>Date</th>
                                            <th>More</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                   <?php
                                    $tsql = "select * from complaints";
                                    $tre = mysqli_query($con,$tsql);
                                    while($trow=mysqli_fetch_array($tre) )
                                    {   
                                        $co =$trow['status']; 
                                        if($co=="new")
                                        {
                                            echo"<tr>
                                                <th>".$trow['id']."</th>
                                                <th>".$trow['subject']."</th>
                                                <th class='colwid'>".$trow['description']."</th>
                                                <th>New</th>
                                                <th>".$trow['indate']."</th>
                                                
                                                
                                                <th><a href='status_update.php?rid=".$trow['id']." ' class='btn btn-primary'>Action</a></th>
                                                </tr>";
                                        }   
                                    
                                    }
                                    ?>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  --> 
                                        </div>
                                    </div>
                                </div>
                                <?php
                                
                                $rsql = "SELECT * FROM `complaints`";
                                $rre = mysqli_query($con,$rsql);
                                $r =0;
                                while($row=mysqli_fetch_array($rre) )
                                {       
                                        $br = $row['status'];
                                        if($br=="inprogress")
                                        {
                                            $r = $r + 1;
                                            
                                            
                                            
                                        }
                                        
                                
                                }
                        
                                ?>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                            <button class="btn btn-primary" type="button">
                                                 In-Progress  <span class="badge"><?php echo $r ; ?></span>
                                            </button>
                                            
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse in" style="height:auto;">
                                        <div class="panel-body">
                                <div class="table-responsive">

                                        <table class="table">
                                    <thead>
                                        <tr>
                                              <th>#</th>
                                       
                                            <th>Subjet</th>
                                            <th class='container-7'>Description</th>
                                            <th>Status</th>    
                                            <th>Date</th>
                                            <th>More</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                   <?php
                                    $tsql = "select * from complaints";
                                    $tre = mysqli_query($con,$tsql);
                                    while($trow=mysqli_fetch_array($tre) )
                                    {   
                                        $co =$trow['status']; 
                                        if($co=="inprogress")
                                        {
                                            echo"<tr>
                                                <th>".$trow['id']."</th>
                                                <th>".$trow['subject']."</th>
                                                <th>".$trow['description']."</th>
                                                <th>In-Progress</th>
                                                <th>".$trow['indate']."</th>
                                                
                                                
                                                <th><a href='status_update.php?rid=".$trow['id']." ' class='btn btn-primary'>Action</a></th>
                                                </tr>";
                                        }   
                                    
                                    }
                                    ?>
                                        
                                    </tbody>
                                </table>
                                           </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <?php
                                
                                $fsql = "SELECT * FROM `complaints` where status='rejected'";
                                $fre = mysqli_query($con,$fsql);
                                $f =0;
                                while($row=mysqli_fetch_array($fre) )
                                {
                                        $f = $f + 1;
                                
                                }
                        
                                ?>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="">
                                            <button class="btn btn-primary" type="button">
                                                 Rejected <span class="badge"><?php echo $f ; ?></span>
                                            </button>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse ">
                                        <div class="panel-body">
                                        <div class='table-responsive'>
                                        

                                                    <table class="table">
                                    <thead>
                                        <tr>
                                              <th>#</th>
                                       
                                            <th>Subjet</th>
                                            <th>Description</th>
                                            <th>Status</th>    
                                            <th>Date</th>
                                            <th>More</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                   <?php
                                    $tsql = "select * from complaints";
                                    $tre = mysqli_query($con,$tsql);
                                    while($trow=mysqli_fetch_array($tre) )
                                    {   
                                        $co =$trow['status']; 
                                        if($co=="rejected")
                                        {
                                            echo"<tr>
                                                <th>".$trow['id']."</th>
                                                <th>".$trow['subject']."</th>
                                                <th>".$trow['description']."</th>
                                                <th>Rejected</th>
                                                <th>".$trow['indate']."</th>
                                                
                                                
                                                <th><a href='status_update.php?rid=".$trow['id']." ' class='btn btn-primary'>Action</a></th>
                                                </tr>";
                                        }   
                                    
                                    }
                                    ?>
                                        
                                    </tbody>
                                </table>


                                </div>
                            </div>
                        </div>
                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            


				<!-- DEOMO-->
				
				
				
										
                    

                <!-- /. ROW  -->
				
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