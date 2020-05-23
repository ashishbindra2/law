<?php include('admin/db.php'); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Legal Initiative">
  <meta name="generator" content="Legal Initiative">
  <title>Legal Initiative</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="canonical" href="images/logo/justice_logo.png">

  <link rel="apple-touch-icon" href="images/logo/justice_logo.png" sizes="180x180">
  <link rel="icon" href="images/logo/justice_logo.png" sizes="32x32" type="image/png">
  <link rel="icon" href="images/logo/justice_logo.png" sizes="16x16" type="image/png">
  <link rel="icon" href="images/logo/justice_logo.png">
  <meta name="theme-color" content="#563d7c">
  <link href="css/cover.css" rel="stylesheet">
  <script type="text/javascript" src="css/main.js"></script>
</head>
<?php
$stmt = $conn->prepare("SELECT path FROM bg WHere page ='1' ORDER BY path  DESC  
  LIMIT 1");
$result = $stmt->execute();
$bg = $stmt->fetch(PDO::FETCH_OBJ);
?> 
<body class="text-center " id="bgg" style=" background-image: url(<?php  foreach ($bg as $key => $value) {
  echo "admin/".$value;
}  ?>);">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
 <?php include('nav.php');   ?>

 <main role="main" class="inner cover"><?php 
    $sql = "SELECT * FROM index_page  ORDER BY topic  DESC  
    LIMIT 1";
    foreach ($conn->query($sql) as $key ) {

      ?>
  <h1 class="cover-heading"><?php  echo $key['heading']; ?></h1>
  <p class="lead"> Join Us</p>
  <p class="lead" >
    
      <h3 class="pt-2 pb-2" style="background-color:red; width:100%"> <?php echo $key['Date'];?>
    </h3>
  </p>
  <p class="lead"> <h1> <?php echo $key['topic'];?></h1>  </p>
  <hr>
  <p class="lead">
    <h2>Do's and Don'ts</h2>  </p>
    <hr>
    <p class="lead"> Speaker</p>
    <p class="lead" >
      <h3 class="pt-2 pb-2" style="background-color:red; width:100%"><?php echo $key['speaker'];?></h3>
    </p>
    <div class="card mb-3 text-dark" >
      <div class="row no-gutters">
       <?php 
       $sql = "SELECT * FROM avatar where pages = 2";
       foreach ($conn->query($sql) as $ke ) {?>

        <div class="col-md-4">
          <img src="<?php echo $ke['path'];?>" height="200px" class="card-img" alt="Avatar">
        </div>
      <?php }?>
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title"><?php echo $key['name'];?></h3>
          <p class="card-header"><?php echo $key['rank'];?></p> 
          <p class="card-text"><span class="text-muted"><?php echo $key['dezignation'];?></span></p>
        </div>
      </div>
    </div>
  </div>
  <div class="card text-center text-dark">
    <div class="card-header">
      Details
    </div>
    <div class="card-body">
      <h5 class="card-title"><?php echo $key['organiztion'];?></h5>
      <p class="card-text"><?php echo $key['details'];?></p>details
    </div>
    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>
<?php }?>
</main>
<?php include('footer.php');
