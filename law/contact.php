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
  <!-- Favicons -->
  <link rel="apple-touch-icon" href="images/logo/justice_logo.png" sizes="180x180">
  <link rel="icon" href="images/logo/justice_logo.png" sizes="32x32" type="image/png">
  <link rel="icon" href="images/logo/justice_logo.png" sizes="16x16" type="image/png">
  <link rel="icon" href="images/logo/justice_logo.png">
  <meta name="theme-color" content="#563d7c">
  <style>
    hr { display: block; height: 1px;
      border: 0; border-top: 1px solid #ccc;
      margin: 1em 0; padding: 0; }
      .mod{
        opacity: 0.5;
      }
      .he{
        height: 200px;
        width: 100%  ;
        background: transparent;
        opacity: 0.9;
      }
      figure {
        background:transparent;
        font-size: 16px;
        }.mm{
          color: black;
          /*background: transparent;*/
        }
        .ga{
          height: 150px;
          width: 180px;
        }
      </style>
      <link href="css/style.css" rel="stylesheet">
    </head>
    <?php
    $stmt = $conn->prepare("SELECT path FROM bg WHere page ='3' ORDER BY path  DESC  
      LIMIT 1");
    $result = $stmt->execute();
    $bg = $stmt->fetch(PDO::FETCH_OBJ);
    ?> 
    <body class="text-center " style=" background-image: url(<?php  foreach ($bg as $key => $value) {
      echo "admin/".$value;
    }  ?>);">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
     <?php include('nav.php'); 

     $sql = "SELECT * FROM contact  ORDER BY topic  DESC  
     LIMIT 1";
     foreach ($conn->query($sql) as $key ) {

      ?>
      <main role="main" class="">
        <h1 class="cover-heading"><u><?php  echo $key['heading']; ?></u></h1>
        <figure class="figurep-3 mb-2 text-white" >
         <?php  $sql = "SELECT * FROM avatar where pages = 4";
         foreach ($conn->query($sql) as $ke ) {?>

          <img src="<?php echo $ke['path'];?>" class="img-fluid rounded he"  height="200px" alt="Organizer">
        <?php }?>
        <figcaption class="figure-caption pt-2 pb-2 px-2 bolder bg-light" >
          <a>Hon'ble Mr. Justice  <?php echo $key['name']; ?>, Former judge <?php echo $key['judge']; ?>,</a>
        </figcaption>
      </figure>
      <div class="card text-center ">
        <div class="card-header bg-success">
          Will deliver lecture on "<?php echo $key['topic']; ?>"
        </div>
        <div class="card-body  text-dark">
          <h5 class="card-title"> on <?php echo $key['date']; ?> </h5>
        </div>
        <div class="card-footer text-muted">
          At <?php echo $key['time']; ?>
        </div>
      </div> 

      <div class="card mb-2 mt-2" >
        <div class="row no-gutters ">
         <?php  $sql = "SELECT * FROM avatar where pages = 3";
         foreach ($conn->query($sql) as $ke ) {?>

          <div class="col-md-2">
            <img src="<?php echo $ke['path'];?>" class="card-img ga" alt="avatar">
          </div>
        <?php } ?>
        <div class="col-md-10">
          <div class="card-body  text-dark">
            <h3 class="card-title">  , </h3>
            <p class="card-text">  <?php echo $key['designation']; ?>
          </p>
          <p class="card-text"><small class="text-muted">.</small></p>
        </div>
      </div>
    </div>
  </div>

  <div class="card text-dark" >
    <div class="card-header">
     1) Go to "zoom.us" 2) Click "join a meeting"  3) Enter meeting id 4) Enter password 
   </div>

 </div>

 <p class="lead"></p>
 <div class="card mm mt-2">
  <div class="card-body mod text-dark">
    <h5 class="card-title"> Modrator:- Dr  <?php echo $key['Modrator']; ?></h5>
    <p class="card-text"> <?php echo $key['details']; ?></p>

  </div>
</div>

</main>
<?php }  include('footer.php');?>