<?php include('admin/db.php');?>
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


  <style>
    hr { display: block; height: 1px;
      border: 0; border-top: 1px solid #ccc;
      margin: 1em 0; padding: 0; }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        }.mod{
          opacity: 0.5;
        }
        .he{
          height: 242px;
          width: 233px;
        }
        figure {
          background-color: rgb(3,4,8);
          font-size: 16px;
          }.mm{
            color: black;
            /*background: transparent;*/
          }
        </style>
        <link href="css/org.css" rel="stylesheet">
      </head>
      <?php
      $stmt = $conn->prepare("SELECT path FROM bg WHere page ='2' ORDER BY path  DESC  
        LIMIT 1");
      $result = $stmt->execute();
      $bg = $stmt->fetch(PDO::FETCH_OBJ);
      ?> 
      <body class="text-center " style=" background-image: url(<?php  foreach ($bg as $key => $value) {
        echo "admin/".$value;
      }  ?>);">
      <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
       <?php include('nav.php');

       $sql = "SELECT * FROM org  ORDER BY topic  DESC  
       LIMIT 1";
       foreach ($conn->query($sql) as $key ) {

        ?> 
        <main role="main" class="inner cover">
          <h1 class="cover-heading"><?php  echo $key['heading']; ?></h1>
          <h5>Invites for a webinar</h5>
          <hr class="my-4">
          
          <figure class="figurep-3 mb-2 text-white" >
           <?php  $sql = "SELECT * FROM avatar where pages = 2";
           foreach ($conn->query($sql) as $ke ) {?>

            <img src="<?php echo $ke['path'];?>" class="figure-img img-fluid rounded he"  alt="Organizer">
          <?php }?>
          <figcaption class="figure-caption pt-2 pb-2 px-2 bolder bg-light"><u><span class="bold text-bold">Sh</samp>. <?php echo $key['name'];?>,</u>
            <b> <?php echo $key['desi'];?></b></figcaption>
          </figure>

          <div class="card text-center ">
            <div class="card-header bg-danger">
              <strong>Will Deliver Lecture On   <?php echo $key['date'];?></strong> 
            </div>
            <div class="card-body  text-dark">
              <h5 class="card-title">"<?php echo $key['topic'];?>"</h5>
              <p class="card-text"> </p>
            </div>
            <div class="card-footer text-muted">
              At <?php echo $key['time'];?>
            </div>
          </div>
          <div class="card mm mt-2">
            <div class="card-body mod text-dark">
              <h5 class="card-title"> Moderator:- Dr <?php echo $key['Moderator'];?> </h5>
              <p class="card-text">Head , <?php echo $key['details'];?> </p>
            </div>
          </div>
        </main>
      <?php } ?>
      <?php include('footer.php');?>