<?php
require_once ("connection.php");
session_start();
if(!isset($_SESSION['id']))
{
    header('Location:login.php');
}


    $id=$_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result=$conn->query($sql);
    if(!$result)
    {
        echo "The sql query is not good";
    }
    else
    {
        if($result->num_rows == 0)
            {
             echo "There are not user.";
            }
        else
        {
            $row = $result->fetch_assoc(); 
        }
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php  if(isset($_SESSION['id'])) :?>
                 <div class="col-12"> 
                     <?php echo  $row['name'];?> |
                    <a href="logout.php">Log out</a>
                   
                </div>
                <?php else :?>
                <div class="col-6">
                    <a href="login.php">Log in</a> 
                </div>
                <div class="col-6">
                <a href="registration.php">Register</a>
                </div>
                <?php endif;?>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 style='color:blue'>Welcome, <?php echo  $row['name'];?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12"><h3 style='color:blue' >To search for name or email of user</h3></div>
            </div>
            <div class="row">
                <div class="col-12" id="back">
                     <a href="home.php">Back to home page</a> 
                </div>
            </div>
        </div>
    </body>
</html>
