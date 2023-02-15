<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
  header('Location: index.php');
  exit(); // don't execute any code after it!
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- edit any credentials  -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
<?php 
  require "connect.php";
  //retrive the id from url
  $subd = $_GET['id'];

  $sql_query = "SELECT * FROM user WHERE `id`='$subd'";
  
  //$result=mysqli_query($con,$sql_query); 
  if ($result = $con->query($sql_query)) {
        while ($row = $result->fetch_assoc()) {
   
          $username = $row['username'];
          $email = $row['email'];
          //$password = $row['password'];
          //$profile_pic = "<img src='images/" . $row['profile_pic'] . "'width='50px'>";
          $profile_pic = $row['profile_pic'];
          $mobile = $row['mobile'];
          $city = $row['city'];
          $gender = $row['gender'];
          $language = $row['languages'];
          $id = $row['id'];
  }
  }
?>
  <form class="container"  action="updatedata.php" method="post" enctype="multipart/form-data" style="width:500px; height:250px;">
  <h1 style="text-align: center;margin: 50px;">Edit your credentials</h1>
    <div class="container">       
      <fieldset>
        <div class="form-group">
          <label for="name" class="form-label mt-4">Name</label>
          <input type="text" class="form-control" id="nm" name="name" value="<?php echo $username ?>" >
        </div>
      </fieldset>
      <fieldset>
        <div class="form-group">
          <label for="email" class="form-label mt-4">Email</label>
          <input type="email" class="form-control" id="eml" name="email" value="<?php echo $email ?>" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
      </fieldset>
      <fieldset>
       
      <div class="form-group">
        <label for="mobile" class="form-label mt-4">Mobile</label>
        <input type="text" class="first-phone" id="mobiles" name="mobile" value="<?php echo $mobile ?>"  required>
    </div>  
      <fieldset class="form-group">
        <legend class="mt-4">Gender</legend>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="gm" name="gender"  value="male" <?php  if($gender == 'male') echo "checked";  ?> >
          <label class="form-check-label" for="">male</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio"  id="gm" name="gender" value="female" <?php  if($gender == 'female') echo "checked";  ?> >
          <label class="form-check-label" for="">female</label>
        </div>
      </fieldset>
      <div class="form-group">
       <label for="city"  class="form-label mt-4">City:</label>
        <select name="city" id="citys" >
          <option><?php if(isset($city)) echo $city; ?></option>
	        <option value="ahmedabad">Ahmedabad</option>
	        <option value="gandhinagar">Gandhinagar</option>
	        <option value="vodadra">Vodadra</option>
          <option value="Anand">Anand</option>
          <option value="Surat">Surat</option>
          <option value="Bardoli">Bardoli</option>
          <option value="Nadia">Nadiad</option>
        </select>
    </div> 
    <fieldset class="form-group">
      <legend>Languages</legend>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="lang[]" value="english" <?php if (str_contains($language, 'english'))
          echo "checked";?>>
        <label class="form-check-label" for="flexCheckChecked" aria-autocomplete="none">
          English
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="lang[]"value="hindi" <?php if (str_contains($language, 'hindi'))
          echo "checked";?> >
        <label class="form-check-label" for="flexCheckDefault" aria-autocomplete="none">
          Hindi
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="lang[]" value="gujarati" <?php if (str_contains($language, 'gujarati'))
          echo "checked";?>>
        <label class="form-check-label" for="flexCheckChecked"  aria-autocomplete="none">
          Gujarati
        </label>
      </div>
    </fieldset> 
      <div class="form-group">
        <label for="image" class="form-label mt-4">Change Image</label>
        <input type="file"  class="form-control"  name="filetoupload" value="<?php echo $profile_pic?>">
        <img src="images/<?php echo $profile_pic?>" width ="50px" height="100px"> 
      </div>  
      <div class="form-group mt-3" >
        <input type="hidden" name="id" value="<?php echo $subd;?>">
        <center>
        <input type="submit" style="text-align: center;" name="update" value="update" class="btn btn-primary" >
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