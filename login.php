<?php
require "connect.php";

if(!isset($_SESSION))
    session_start();
    
$message="";
if(count($_SESSION)>0&&isset($_COOKIE["email"]))
{
    header('Location:home.php');
}
if (count($_POST) > 0) {
  
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = md5($password);
  $sql = "SELECT * FROM `user` WHERE email = '" . $email . "' and password = '" . $password . "'";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["Id "] = $row['id'];
    $_SESSION["Name"] = $row['username'];
    $_SESSION["Email"] = $row['email'];
    $_SESSION["Password"] = $row['password'];
    $_SESSION["profile_pic"] = "<img src='images/" . $row['profile_pic'] . "'width='50px'>";
    $_SESSION["Mobile"] = $row['mobile'];
    $_SESSION["City"] = $row['city'];
    $_SESSION["gender"] = $row['gender'];
    $_SESSION["language"] = $row['languages'];
    setcookie("email", $email, time() + (10 * 365 * 24 * 60 * 60));
    setcookie("password", $password, time() + (10 * 365 * 24 * 60 * 60));                                
    header("Location:home.php");
    
  } else {
    $message = "Invalid email or Password!";
  }
 
}

    ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN SYSTEM</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css" integrity="sha384-3fdgwJw17Bi87e1QQ4fsLn4rUFqWw//KU0g8TvV6quvahISRewev6/EocKNuJmEw" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

</head>
<body>
<?php
  if ($message!="") { ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $message; ?>
    </div>
<?php } 
?>


<form 
  class="container" name="contactForm" id="forms" action="" method="post" enctype="multipart/form-data" style="width:500px; height:250px;">
    <h1 style="text-align: center;margin: 50px;">LOGIN</h1>
    <div class="container">
    <div class="form-group">
      <label for="email" class="form-label mt-4">Email</label>
      <input type="email" class="form-control" id="emails" name="email" placeholder="Enter email" autocomplete="off" required>
    </div>

    <div class="form-group">
      <label for="password" class="form-label mt-4">Password</label>
      <input type="password" class="form-control" id="passwords" name="password" placeholder="Password"autocomplete="new-password">
    </div>

    </fieldset>
    <div class="form-group mt-3" >
      <center>
        <input type="submit" id="submitt" style="text-align: center;" name="submit" class="btn btn-primary" value="Login" >
      </center>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function() {
    $('#forms').validate({
      rules:{
        email:{
          required:true,
          email:true
        },
        password:{
          required:true,
        },
      },
      messages:{
        email:"Please enter your email..!",
        password:"Pleas enter your password"
      },
    });
  });
</script>
</body>
</html>
 

