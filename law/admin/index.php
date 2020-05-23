<?php include('db.php'); ?>

<?php 
if(isset($_POST['submit']))
{ 
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $query = $conn->prepare("SELECT count(id) FROM admin Where email= '$email' and password = '$pass'");
  $query->execute();
  $count = $query->fetchColumn();
  if($count == "1")
  {
    session_start();
    $_SESSION['user'] = $email;
    header('location: welcome.php');
  }
  else{
echo "Wrong email and password";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>Admin Login</title>
    <style media="screen">
    body{
      font-family: 'verdana';
      font-size: 16px;
      font-weight: bold;
      background-image: url('../images/login.jpg');
        background-color: #cccccc; /* Used if the image is unavailable */
  height: 500px; /* You must set a specified height */
  background-position: center; /* Center the image */
   background-repeat: no-repeat, repeat; /* Do not repeat the image */
  background-size: cover;
    }
    .panel{
      border:0;
      background: transparent;
    }
    form{
      padding: 0 10px;
    }
    .addon-diff-color{
      background-color: #f0ad4e;
      color: white;
    }
    .panel-title{
      color: #f0ad4e;
      font-weight: bolder;
    }
      .alert{
        display: none;
      }
    </style>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#emails').keyup(function(){
          var regexp = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/;
          if(regexp.test($('#emails').val())){
            $('#emails').closest('.form-group').removeClass('has-error');
            $('#emails').closest('.form-group').addClass('has-success');
          }else{
            $('#emails').closest('.form-group').addClass('has-error');
          }
        })

        $('#pass').keyup(function(){
          var regexp = /^[a-zA-Z0-9]{6,50}$/;
          if (regexp.test($('#pass').val())) {
            $('#pass').closest('.form-group').removeClass('has-error');
            $('#pass').closest('.form-group').addClass('has-success');
          }else{
              $('#pass').closest('.form-group').addClass('has-error');
          }
        })

        // $('#login').click(function(event){
        //   event.preventDefault();
        //   var formData = $('#signIn').serialize();
        //   $.ajax({
        //     url:'action.php',
        //     method:'post',
        //     data:formData + '&action = login'
        //   }).done(function(result))
        // })
      })
    </script>
  </head>
  <body>
<div class="container">
<h2 class="text-center">Admin Login</h2>
<hr>
<div class="row">
<div class="col-md-6 col-md-offset-3">
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismissible="alert" aria-lable="close" name="button">x</button>
    <div class="result">
      Error
    </div>
  </div>
</div>
  <div class="col-md-6 col-md-offset-3 sign-up">
  <div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title text-center"> Sign In Form</h3>
    </div>
<div class="panel-body">
 <form class="form-horizontal" role="form" id="signIn" action="index.php" method="post">
<div class="form-group">
  <div class="input-group">
    <div class="input-group-addon addon-diff-color">
      <span class="glyphicon glyphicon-user"></span>
    </div>
    <input type="email" name="email" id="emails" class="form-control" required placeholder="Enter user name">
  </div>
</div>
<div class="form-group">
  <div class="input-group">
    <div class="input-group-addon addon-diff-color">
      <span class="glyphicon glyphicon-lock"></span>
    </div>
    <input type="password" name="pass" id="pass" class="form-control" value="" required autocomplete placeholder="Enter password here">
  </div>
</div>
<div class="form-group">
  <div class="input-group">
<input type="checkbox" name="remember" id="remember"  value="">
Remember me
  </div>
</div>
<div class="form-group">
  <input type="submit" name="submit" id="login" value="registration" class="btn btn-warning btn-block">
</div>
 </form>
</div>
  </div>
</div>
</div>
</div>


  </body>
</html>
