
<?php
    require "connect.php";

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $email = $_POST['email'];
        $old_password = $_POST['password1'];
        $old_password = md5($old_password);
        $new_password = $_POST['password2'];
        $new_password = md5($new_password);
        $confirm_password = $_POST['password3'];
        $confirm_password = md5($confirm_password);
        $sql1="SELECT * FROM  `user` WHERE `email`='$email'AND `password`='$old_password'";
        $result1 = mysqli_query($con,$sql1);
        if (mysqli_num_rows( $result1) > 0 ) {
            //header("location: index.php?message=Email is already exists.");
            if($new_password==$old_password)
            {
                header("location: editpsd.php?id=$id&message=oldpassword and newpassword are same  please update new password.");
            }
            else if($new_password!=$confirm_password)
            {
                header("location: editpsd.php?id=$id&message=mismatch password");        
            }
            else {
                
                $sql2="UPDATE `user` SET `password`= '$new_password' WHERE  `email`='$email' ";
                if (mysqli_query($con, $sql2)) {
                    header("location: index.php?message=password changed successfully");
                 }
            }       
            
        }
        else{
               header("location: editpsd.php?id=$id&message=Incorrect old password");
              
        }
     }
    
?>




   


  
   




