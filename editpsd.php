<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: index.php');
  exit(); // don't execute any code after it!
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE PASSWORD SYSTEM</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css" integrity="sha384-3fdgwJw17Bi87e1QQ4fsLn4rUFqWw//KU0g8TvV6quvahISRewev6/EocKNuJmEw" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
</head>
<body>
<?php

  require "connect.php";
  //retrive the id from url
  $subd = $_GET['id'];
  //$subd = $_SESSION["subid"];
  $sql_query = "SELECT * FROM user WHERE `id`='$subd'";
  //$result=mysqli_query($con,$sql_query); 
  if ($result = $con->query($sql_query)) {
        while ($row = $result->fetch_assoc()) {
          $email = $row['email'];
          $id = $row['id'];
  }
  }
?> 
 
<form 
  class="container" name="contactForm" id="forms" action="updatepsd.php" method="post" enctype="multipart/form-data" style="width:500px; height:250px;">
    <h1 style="text-align: center;margin: 50px;">Update Password</h1>
    
    <?php
      if (isset($_GET['message'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_GET['message']; ?>
        </div>
      <?php } ?>
    
    <div class="container">
    <div class="form-group">
  <fieldset>
    <label class="form-label mt-4" for="readOnlyInput">Email</label>
    <input class="form-control" id="readOnlyInput" name="email" value="<?php echo $email ?>" type="text" readonly>
  </fieldset>
</div>
</div>
    <div class="form-group">
      <label for="password" class="form-label mt-4">Old Password:</label>
      <input type="password" class="form-control" id="passwords" name="password1" placeholder="Password"  autocomplete="new-password" required>
    </div>
    <div class="form-group">
      <label for="password" class="form-label mt-4">New Password:</label>
      <input type="password" class="form-control" id="passwords" name="password2" placeholder="Password" autocomplete="new-password" required>
    </div>
    <div class="form-group">
      <label for="password" class="form-label mt-4">Confirm Password:</label>
      <input type="password" class="form-control" id="passwords" name="password3" placeholder="Password" autocomplete="new-password" required>
    </div>
    </fieldset>
    <div class="form-group mt-3" >
             <input type="hidden" name="id" value="<?php echo $subd;?>">
      <center>
        <input type="submit" id="submitt" style="text-align: center;" name="submit" class="btn btn-primary" value="Change Password" >
      </center>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function() {
    $('#forms').validate({
      rules:{
        password:{
          required:true,
          password:true
        },
      },
      messages:{
        password1:"Please enter your old password",
        password2:"Please enter your new password"
      },
    });
  });
</script>
</body>
</html>


