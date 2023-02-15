
<?php
    require "connect.php";

    if(isset($_POST['update'])){
        $username = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $profile_pic= $_FILES['filetoupload']['name'];
        $city = $_POST['city'];
        $mobile = $_POST['mobile'];
        $id = $_POST['id'];
        if(!isset($_POST['lang']))
        {
             $chk=',';
        } 
        else 
        {
             $chk=implode(',', $_POST['lang']);
        }
        $sql1="SELECT * FROM user WHERE `email`='$email'AND `id`!='$id'";
        $result1 = mysqli_query($con,$sql1);
        if (mysqli_num_rows( $result1) > 0 ) {
            header("location: index.php?message=Email is already exists.");
        }
        else if ($profile_pic != "") {
        move_uploaded_file($_FILES["filetoupload"]["tmp_name"], "images/" . $profile_pic);
        $sql = "UPDATE `user` SET `username`= '$username', `email`= '$email', `gender`= '$gender',`profile_pic`='$profile_pic',`mobile`='$mobile',`city`='$city',`languages`='$chk' WHERE `id`='$id';"; 
          if (mysqli_query($con, $sql)) {
                 header("location: index.php?mess=updated successfully");
           }
      } 
      else if($profile_pic=="")
      {     $sql2="UPDATE `user` SET `username`= '$username', `email`= '$email',`gender`= '$gender',`mobile`='$mobile',`city`='$city',`languages`='$chk' WHERE `id`='$id';";
            if (mysqli_query($con, $sql2)) {
                header("location: index.php?mess=updated successfully");
             }
      }
      else
      {
             header("location:edit.php?$id");
      }
    }
?>




   


  
   




