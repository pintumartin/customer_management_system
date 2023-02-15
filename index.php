
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    table, th, td {
    border-collapse: collapse;
    border: 2px solid black;
    width:20px;
    height:5px;
    font-size: 20px;
    align-items: center;
    border-radius: 5px;
    border-color: black;
    padding: 10px;
    align-items: center;
    margin: 20px auto;
    text-align: center;
    padding: 8px;
    }
    form.container {
    margin-left: auto; 
    margin-right: auto;
   }
</style>
</head>
<section>
        <div class="container">
        <a href="regis.php" <h1 style="color:blue; text-align:center;"></h1><h1 style="text-align:center;">Add New User Details</h1></a><br/><br/>
        <a href="login.php" <h1 style="color:blue; text-align:center;"></h1><h1 style="text-align:center;">Login</h1></a><br/><br/>
            <table class="table table-dark" >
                <thead>
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
                    <th scope="col" style="background-color: #D6EEEE">Updation</th>
                    <th scope="col" style="background-color: #D6EEEE">deletion</th>
                    <th scope="col" style="background-color: #D6EEEE">Update Password</th>
                  </tr>
                </head>
                <body>
                    <?php
                    if (isset($_GET['message'])) { ?>
                           <div class="alert alert-dismissible alert-success" role="alert">
                                <?php echo $_GET['message']; ?>
                           </div>
                           <?php } ?>
                    <?php
                    if (isset($_GET['mess'])) { ?>
                           <div class="alert alert-dismissible alert-success" role="alert">
                                <?php echo $_GET['mess']; ?>
                           </div>
                           <?php } ?>         
                    <?php 
                        require "connect.php";
                        $sql_query = "SELECT * FROM user";

                        if ($result = $con ->query($sql_query)) {
                            
                            while ($row = $result -> fetch_assoc()) { 
                                

                                $Id = $row['id'];
                                //$_SESSION['subid'] = "$Id";
                                $username = $row['username'];
                                $email = $row['email'];
                                $password = $row['password'];
                                $profile_pic= "<img src='images/".$row['profile_pic']."'width='50px'>";
                                $mobile = $row['mobile'];
                                $city = $row['city'];
                                $gender= $row['gender'];
                                $language = $row['languages'];          
                    ?>
                    <tr class="trow">
                        <td><?php echo $Id; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $password; ?></td>
                        <td><?php echo $profile_pic; ?></td>
                        <td><?php echo $mobile; ?></td>
                        <td><?php echo $city; ?></td>
                        <td><?php echo $gender; ?></td>
                        <td><?php echo $language; ?></td>
                        <td><input class="favorite styled" type="button"  onclick="location.href = 'edit.php?id=<?php echo $Id ?>'"     value="edit"></td>
                        <td><input class="favorite styled" type="button"  onclick="location.href = 'delete.php?id=<?php echo $Id ?>'"   value="delete"></td>
                        <td><input class="favorite styled" type="button"  onclick="location.href = 'editpsd.php?id=<?php echo $Id ?>'"   value="changepassword"></td>
                        <!-- using session -->
                        <!-- <td><input class="favorite styled" type="button"  onclick="location.href = 'edit.php'"     value="edit"></td>
                        <td><input class="favorite styled" type="button"  onclick="location.href = 'delete.php'"   value="delete"></td>
                        <td><input class="favorite styled" type="button"  onclick="location.href = 'editpsd.php'"   value="changepassword"></td> -->
                        <td></td>
                    </tr>
                    <?php } }  
                    ?>
                </body>
              </table>
        </div>
        <html>
  </section>
</html>