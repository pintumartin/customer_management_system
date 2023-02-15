<?php
    require "connect.php";
    if(!empty($_POST['submit']))
    {   
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $password = md5($password);
        $profile_pic = $_FILES['filetoupload']['name']; 
        $mobile = $_POST['mob'];
        $city = $_POST['city'];  
        $gender= $_POST['gend']; 
        if(!isset($_POST['lang']))
        {
             $chk = ',';
        } else {
             $chk = implode(',', $_POST['lang']);
        }
        if($username != "" && $email != "" && $password != ""  && $profile_pic != "" && $mobile != "" && $city != "" && $gender !=""&&filter_var($email, FILTER_VALIDATE_EMAIL)&&$chk!=","){
          $sql = "SELECT * FROM user WHERE `email`='$email'" ;
          $result = mysqli_query($con,$sql);
            if (mysqli_num_rows( $result) > 0) {
             header("location: regis.php?message=Email is already exists.");
            }
            else{
              move_uploaded_file($_FILES["filetoupload"]["tmp_name"],"images/".$profile_pic);
              $sql = "INSERT INTO `user`(`username`, `email`, `password`, `profile_pic`, `mobile`, `city`, `gender`,`languages`) VALUES ('$username','$email','$password','$profile_pic','$mobile','$city','$gender','$chk')";
     
                  mysqli_query($con, $sql);
                  //echo "Registration Complete";
                  header("location:index.php?message=registration completed");
            }
        }
        else {
           header("location:regis.php?message=Required fields are missing");
          }

    }   
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration system</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css" integrity="sha384-3fdgwJw17Bi87e1QQ4fsLn4rUFqWw//KU0g8TvV6quvahISRewev6/EocKNuJmEw" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
      .contactForm{
        background-image: ('a.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;  
        background-size: cover;

      }
    </style>


</head>
<body>
  
<form class="container" name="contactForm" id="form" method="post" enctype="multipart/form-data" style="width:500px; height:250px;">
  <h1 style="text-align: center;margin: 50px;">Registration Form</h1>
    <?php
      if (isset($_GET['message'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_GET['message']; ?>
        </div>
      <?php } ?>
      

	<fieldset>
    <div class="form-group">
      <label for="name" class="form-label mt-4">Username</label>
      <input type="text" class="form-control" id="names" name="name" placeholder="Enter Name" required>
    </div>   
    
    <div class="form-group">
      <label for="email" class="form-label mt-4">Email</label>
      <input type="email" class="form-control" id="emails" name="email" autocomplete="off" placeholder="Enter email" required>
    </div>

    <div class="form-group">
      <label for="password" class="form-label mt-4">Password</label>
      <input type="password" class="form-control" id="passwords" name="password" placeholder="Password" autocomplete="new-password" required>
    </div>

    <div class="form-group">
        <label for="mobile" class="form-label mt-4">Mobile</label>
        <input type="text" class="first-phone" id="mobiles" name="mob"  required>
    </div>  

    <div class="form-group">
    <label for="city"  class="form-label mt-4">City:</label>
        <select name="city" id="citys">
	        <option value="ahmedabad">Ahmedabad</option>
	        <option value="gandhinagar">Gandhinagar</option>
	        <option value="vodadra">Vodadra</option>
          <option value="Anand">Anand</option>
          <option value="Surat">Surat</option>
          <option value="Bardoli">Bardoli</option>
          <option value="Nadia">Nadiad</option>
        </select>
    </div>
    <div class="form-group">
      <div class="mt-4">Gender</div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gend" value="male" id="flexCheckDefault"    autocomplete="off" checked>
          male
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gend" value="female" id="flexCheckChecked" >
          female
      </div>
      <fieldset class="form-group">
      <legend>Languages</legend>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="lang[]" value="english" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckChecked" aria-autocomplete="none">
          English
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="lang[]"value="hindi" id="flexCheckDefault" checked="">
        <label class="form-check-label" for="flexCheckDefault" aria-autocomplete="none">
          Hindi
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="lang[]" value="gujarati" id="flexCheckChecked" checked="">
        <label class="form-check-label" for="flexCheckChecked"  aria-autocomplete="none">
          Gujarati
        </label>
      </div>
    </fieldset>  
    <div class="form-group">
      <label for="file" class="form-label mt-4">Choose a Profile picture</label>
      <input type="file" class="form-control" id="files" name="filetoupload" placeholder="Uplode" required>
    </div>
  </fieldset>
    <div class="form-group mt-3" >
      <center>
        <input type="submit" id="submitt" style="text-align: center;" name="submit" class="btn btn-primary" value="Register" >
      </center>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>  
  $(document).ready(function() {
    $('#form').validate({
      rules:{
        name:{
          required:true
        },
        email:{
          required:true,
          email:true
        },
        password:{
          required:true,
          password:true
        },
        mobile:{
          required:true,
          minlength:9,
          maxlength:10,
          number:true
        },
        city:{
          required:true,
        },
        
        
        
      },
      messages:{
        name:"Please enter your username..!",
        email:"Please enter your email..!",
        password:"Please enter your password",
        mobile:"Enter your mobile no",
        city:"Please enter your city",
        gender:"Please enter your language",
        profile_pic:"please upload your passport size photo"
      },
    });
  });
</script>
</body>
</html>


