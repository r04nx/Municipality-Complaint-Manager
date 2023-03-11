<!DOCTYPE html>
<html>
  <head>
    <title>Certificate</title>
    <style>
     	@media print {
			/* hide date and time */
			:after {
				content: none !important;
			}
			
			/* hide page numbers */
			@page {
				size: auto;
				margin: 0;
			}

			/* hide URLs */
			a:after {
				content: none !important;
			}

      /* set custom print scale */
			@page {
				size: 8.5in 11in; /* letter size paper */
        		size: landscape; /* landscape orientation */
				margin: none; 
				transform: scale(0.8); /* 80% scale */
				transform-origin: 0 0; /* top-left corner */
			}
		}
    </style>
  </head>
  <body style='background:#ecf7ff;'>

  <?php
$protocol = $_SERVER['REQUEST_SCHEME'];
$hostname = $_SERVER['HTTP_HOST'];
$url = $protocol . "://" . $hostname.'/certs';
$id= $_GET['cid'];

?>
  
  <div style='border:1px solid;height: 370px;'>
  <div style='margin:10px;'>
    <h1>Certificate of Appreciation</h1><img src='assets/img/logo.png' style='float:right;margin-right:20px' alt="HNP" height='150px'>
    <p style='padding:10px;text-align:start;width:400px;'>This certificate is awarded to <br><br><i style='font-size:larger;vertical-align: super;text-transform:capitalize;'><?php echo $_GET['n']?><br> </i>for their valuable contribution towards the development of Hingoli. As a responsible citizen by registering <b><?php echo $_GET['c']?></b> complaints on portal, which has helped in improving the living conditions and infrastructure of the city.</p>
    <!-- <p>We commend s efforts towards making our city a better place to live in. We hope that he/she will continue to support our mission of creating a inclusive community.</p> -->
   <small> <p>Issued on: <?php echo date('F j, Y'); ?></p></small>
 <p style='font-size:10px; position:fixed;top:340px;width:400px'>To verify the authenticity of this certificate, please visit <u style='color:blue;'><?php echo $url ?></u> , and enter the unique certificate ID number <?php echo $id; ?></p>
   <label style='position: absolute;
    top: 300px;
    right: 40px;'> Director head HNP</label>
  <img style='    position: absolute;
    top: 240px;
    right: 40px;' src='assets/img/sign.png' height='80px'>
</div>
</div>
  </body>
</html>
