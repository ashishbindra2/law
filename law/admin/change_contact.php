<?php
include('db.php');
session_start();
if(empty($_SESSION['user']))
{
  header('location:index.php');
}

if (isset($_POST['submit'])) {
  $name =  $_POST['name'];
   $jname =  $_POST['jname'];
  $desi = $_POST['desi'];
  $mod = $_POST['Moderator'];
  $detail = $_POST['Details'];
  $time = $_POST['time'];
  $topic = trim($_POST['topic']);
  $date = $_POST['date'];
    $uni = $_POST['uni'];
  try{
    $sql = "UPDATE contact  SET heading = '$uni', name='$name', judge='$jname',
    topic = '$topic', Date = '$date', time = '$time' ,designation = '$desi', 
    Modrator = '$mod', details ='$detail'";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    
  }
  catch(PDOException $e)
  {
    echo $sql . "<br>" . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Index</title>
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
  label{
    font-weight: bold;
    color: rgb(252,179,69);
    font-size: 20px;
  }
  a{
   font-weight: bold;
   color: rgb(252,179,69);
 }
</style>
 <link rel="icon" href="images/logo/justice_logo.png" sizes="32x32" type="image/png">
  <link rel="icon" href="images/logo/justice_logo.png" sizes="16x16" type="image/png">
<link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../css/dashboard.css" rel="stylesheet">
<style type="text/css">.vl {
  border-left: 6px solid #9aa;
  height: 740px;
}</style>

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
      <h2 class="text-center text-shadow text-info">Change Contact Page</h2>    
      <hr>
      <div class="row  mb-2">
        <div class="col-md-5 mx-auto">
          <h3> Upload Image to change background</h3>
          <hr>
          <form action="upload.php?id=3" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
          </form>
          
          <hr>
          <?php
          $sql = "SELECT * FROM avatar where pages = 3";
          foreach ($conn->query($sql) as $ke ) {?>

            <h2 > Uploads Avatar Here:--</h2>
            <div class="col-md-12">
              <img src="<?php echo '../'.$ke['path'];?>" height="400px" class="card-img" alt="Avatar">

              <form action="upload_avatar.php?id=3" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
              </form> 
            </div>
          <?php }?>
          <hr>
          <?php
          $sql = "SELECT * FROM avatar where pages = 4";
          foreach ($conn->query($sql) as $ke ) {?>

            <h2 > Uploads Hon'ble Mr. Justice pic:--</h2>
            <div class="col-md-12">
              <img src="<?php echo '../'.$ke['path'];?>" height="300px" class="card-img" alt="Avatar">

              <form action="upload_avatar.php?id=4" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
              </form> 
            </div>
          <?php }?>

        </div>

        <div class="vl col-md-1"></div>
        

        <div class="col-md-6 mx-auto">
          <h1 class="text-center h1 hea mt-2"> 
            <a style="color: rgb(252,179,69);"> To Change Content  </a>
          </h1>
          <?php 
          $sql = "SELECT * FROM contact  ORDER BY topic  DESC  LIMIT 1";
          foreach ($conn->query($sql) as $key ) {?>
            <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group" >
            <label>collage or University Name</label>
            <input type="text" name="uni" value="<?php echo($key['heading']); ?>" class="form-control" required>
          </div>
             <div class="form-group" >
              <label>Name of Hon'ble Mr. Justice</label>
              <input type="text" name="name" value="<?php echo($key['name']); ?>" class="form-control"  required>
            </div>Former judge
            <div class="form-group" >
              <label>Name of Former judge</label>
              <input type="text" name="jname" value="<?php echo($key['judge']); ?>" class="form-control"  required>
            </div>
            <div class="form-group">
              <label>Topic</label>
              <input type="text" name="topic" class="form-control" value = <?php echo $key['topic']; ?> required>
            </div>
            <div class="form-group">
              <label> Change Date</label>
              <input type="date" name="date" class="form-control" value="<?php echo($key['date']); ?>" required>
            </div>
            <div class="form-group">
              <label>time</label>
              <input type="time" name="time" value="<?php echo($key['time']); ?>" class="form-control" required>
            </div>
            
            <div class="form-group" >
              <label>Designation</label>
              <input type="text" name="desi" value="<?php echo($key['designation']); ?>" class="form-control" required>
            </div>

            <div class="form-group">  
              <label>Moderator</label>
              <input type="text" name="Moderator" value="<?php echo($key['Modrator']); ?>"  class="form-control" required>
            </div>
            <div class="form-group">
              <label> Details</label>
              <input type="text" name="Details" value="<?php echo($key['details']); ?>" class="form-control" required>
            </div>

            <input type="submit" class="btn btn-dark" name="submit">
          </form>
        <?php }?>
      </div>
    </div>


  </main>
</div>
</div>



</body>
</html>
