<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REGISTER COMPLAINT</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <script>
      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else {
          alert("Geolocation is not supported by this browser.");
        }
      }

      function showPosition(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        document.getElementById("latitude").value = latitude;
        document.getElementById("longitude").value = longitude;
      }
    </script>
</head>




<body onload="getLocation()">

    <?php
    if (isset($_POST['submit']) && isset($_FILES['fileToUpload'])) {
        $code1 = $_POST['code1'];
        $code = $_POST['code'];
        if ($code1 != $code) {

            $msg = "Invalide code";
            echo "<script>alert('Invalid Human Verification code, try again!')</script> ";
        } else {

            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];

            $fname = $_POST['fname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $indate = date("Y-m-d");
            $subject = $_POST['subject'];
            $description = $_POST['description'];
            $imageid = uniqid('', true) . '.jpg';
            $expenses = '0';
            $status = 'new';

            // echo $fname . "<br>";
            // echo $phone . "<br>";
            // echo $email . "<br>";
            // echo $indate . "<br>";
            // echo $description . "<br>";
            // echo $imageid . "<br>";
    
            $target_dir = '../../uploads/';
            $id = $imageid;
            $target_file = $target_dir . $id ;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $con = mysqli_connect("localhost", "pma", "1234", "cmp");
            $newcmp = "INSERT INTO `complaints`(`fname`, `phone`, `email`, `indate`,`subject`,`description`,`imageid`,`expenses`, `status`, `latitude`, `longitude`) VALUES ('$fname','$phone','$email','$indate','$subject','$description','$imageid','$expenses','$status','$latitude','$longitude');";




            // Check file size
            if ($_FILES['fileToUpload']['size'] > 50000000) {
                echo "<script>alert('Sorry, your file is too large.')</script>";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
                echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Try again!";
                // if everything is ok, try to upload file
            } 
            


            else {
                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
                    if (mysqli_query($con, $newcmp)) {

                        $last_id = $con->insert_id;

                        echo "<script>alert('Your Complaint has been registered successfully. We Thank you for being a responsible citizen')</script>";
                    }

                    // echo "The file ' . $imageid. ' has been uploaded.";
                    // // echo var_dump($_FILES);
                }
            }






        }
    } else{
        
    }
    ?>

    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="../../index.php"><i class="fa fa-home"></i> Homepage</a>
                    </li>

                </ul>

            </div>

        </nav>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            REGISTER COMPLAINTS <br>
                        </h1>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-5 col-sm-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                PERSONAL DETAILS
                            </div>
                            <div class="panel-body">
                                <form name="form" method="post" enctype='multipart/form-data'>

                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input name="fname" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input name="phone" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" required>

                                        <input type="hidden" id="latitude" name="latitude">
                                        <input type="hidden" id="longitude" name="longitude">

                                    </div>

                                    <!-- <div class="form-group">
                                        <label>Description</label> 
                                    <div class="form-outline">
                                            <textarea class="form-control" id="textAreaExample2" rows="8"></textarea>
                                        </div> -->


                            </div>

                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    COMPLAINT DETAILS




                                </div>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input name="subject" class="form-control">
                                    </div>

                                    <div class="form-outline">
                                        <label class="form-label" for="textAreaExample3">Description</label>
                                        <textarea class="form-control" name="description" id="textAreaExample3"
                                            rows="2" required></textarea>

                                    </div><br>

                                    <label class="form-label" for="customFile">Upload image</label>
                                    <input type='file' name='fileToUpload' id='fileToUpload' class="form-control" required>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12">
                            <div class="well">
                                <h4>HUMAN VERIFICATION</h4>
                                <p>Type Below this code
                                    <?php $Random_code = rand();
                                    echo $Random_code; ?>
                                </p><br />
                                <p>Enter the random code<br /></p>
                                <input type="text" name="code1" title="random code" />
                                <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
                                <input type="submit" name="submit" class="btn btn-primary">

                                </form>

                            </div>
                        </div>
                    </div>


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
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->



</body>



</html>