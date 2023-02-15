<!DOCTYPE html>
<?php
       session_start();
       $_SESSION["id"] = "1";
       $_SESSION["name"] = "martin";
       setcookie("Auction_Item", "Luxury Car", time() + 2 * 24 * 60 * 60/*  2 days */ );
       setcookie("Auction_Item", "Cars", time() + 2 * 24 * 60 * 60/*  2 days */ );
       echo "cookie is created.<br> ";
       print_r($_COOKIE);       
       unset($_SESSION);
?>
<html>
<body>
    <?php
    // setcookie("Auction_Item", " ", time() - 60);
    // echo "cookie is deleted";
    // print_r($_COOKIE);      
    ?>
    <p>
        <strong>Note:</strong> 
        You might have to reload the 
        page to see the value of the cookie.
    </p>
  
</body>
</html>