<?php
   session_start();
 if(empty($_SESSION['user']))
 {
 	header('location:index.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	body{
		 	background-repeat: no-repeat;
  			background-image: url('../images/gavel.jpg');
  			background-color: #cccccc; 
  			/*background-position: center; */
  			background-size: cover; 
    		text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
  			box-shadow: inset 0 0 5rem 2 rgba(0, 0, 0, .5);
	}
</style>
   <link rel="icon" href="../images/logo/justice_logo.png" sizes="32x32" type="image/png">
  <link rel="icon" href="../images/logo/justice_logo.png" sizes="16x16" type="image/png">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Legal Initiative</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="Sign_out.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
       <?php include 'nav.php';?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Welcome Gagan predeep Sigh Bal</h1>           
          </div>
          <div class="text-center text-nowrap">
      <p>    <h2 class=" badge-primary " style="color: transparent; background: transparent;" >To change  Page, go to index,  on side menu</h2> </p>  
        <p> <h2 class="" style="color: transparent;" >To change  Page, go to organization,  on side menu</h2>  </p>
          <h2 style="color: transparent;" >To change  Page, go to content,  on side menu</h2>  
           </div> 
        </main>
      </div>
    </div>


  </body>
</html>
