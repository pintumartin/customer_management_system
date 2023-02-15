
<?php
    
    require "connect.php";
    
    $subd = $_GET['id'];
    $query = "DELETE FROM user  WHERE `id` = '$subd'";
    if (mysqli_query($con, $query)) {
        header("location: index.php?mess=deletion succesful");
    } else {
         echo "Something went wrong. Please try again later.";
    }
?>