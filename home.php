<?php

if (!isset($_SESSION)) 
    session_start();
if(count($_SESSION)==0)
{
    header("Location:login.php");
}
 
?>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<table class="table table-dark" >
<tr>
    <th scope="col" style="background-color: #D6EEEE" >Id</th>
    <th scope="col" style="background-color: #D6EEEE">Name</th>
    <th scope="col" style="background-color: #D6EEEE">Email</th>
    <th scope="col" style="background-color: #D6EEEE">Password</th>
    <th scope="col" style="background-color: #D6EEEE">Image</th>
    <th scope="col" style="background-color: #D6EEEE">Mobile</th>
    <th scope="col" style="background-color: #D6EEEE">City</th>
    <th scope="col" style="background-color: #D6EEEE">Gender</th>
    <th scope="col" style="background-color: #D6EEEE">Languages</th>
</tr>
<body>
    <div class="alert alert-dismissible alert-success">
         <strong>Login Successful</strong>
     </div>
<tr class="trow">
    <td><?php echo $_SESSION["Id "]; ?></td>
    <td><?php echo $_SESSION["Name"] ?></td>
    <td><?php echo $_SESSION["Email"] ?></td>
    <td><?php echo $_SESSION["Password"] ?></td>
    <td><?php echo $_SESSION["profile_pic"] ?></td>
    <td><?php echo $_SESSION["Mobile"]; ?></td>
    <td><?php echo $_SESSION["City"] ?></td>
    <td><?php echo $_SESSION["gender"] ?></td>
    <td><?php echo $_SESSION["language"] ?></td>
</tr>                        
</body>  

</table>
<div class="center" style="  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
">
<input class="btn btn-success" type="button"  onclick="location.href = 'logout.php?mess=Logged out successfully'"     value="logout "  style="height:90px ,width:90px"> 
</div>

            


