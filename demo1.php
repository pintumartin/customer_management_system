
<?php
// Start the session
session_unset();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
//$_SESSION["id"] = "101";
echo "Session variables are set.";
$a = 0;
while($a<4)
{
    $_SESSION["id"] = "$a";
    if($a==1) {
        header("location: demo2.php");
        break;
    }
    $a = $a + 1;
}

?>

</body>
</html>
