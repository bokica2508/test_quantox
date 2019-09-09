<?php require_once ("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    if($email == "" AND $password == "")
    {
        $empty ="Error logging you in.You must enter email and password.";
    }
    elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
    {
        $infoEmail = "It is not good format of email";
    }
    else
    {
    $passwordHash = MD5($password);
    //var_dump($email,$password);
    $sql ="SELECT * FROM users WHERE email='$email';";
    $result=$conn->query($sql);
    if(!$result)
    {
        echo "The sql query is not good";
    }
    else
    {
        if($result->num_rows == 0)
            {
                $info = "There are not user with that email.";
            }
        else
        {
            $row = $result->fetch_assoc(); 
                if($passwordHash !== $row['pass'])
                {
                    $info1 = "Password is not correct.";
                }
                else
                {
                    $_SESSION['id'] = $row['id'];
                    header("Location:index.php");
                }
        }
       
    }
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
<div class= "container">
    <h2>Log in</h2>
    <?php if (isset($empty)) :?>
    <div class="alert alert-warning" role="alert">
    <?php echo $empty ;?>
    </div>
    <?php endif;?>
    <form action="login.php" method='POST' class='form'>
        <div class="row">
            <div class="col-3">
                <label for="user">Email:</label>
            </div>
            <div class="col-9">
                <input type="text" name="email" valu="">
                <?php if(isset($info)) :?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $info ?>
                </div>
                <?php endif; ?>
                <?php if(isset($infoEmail)) :?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $infoEmail ?>
                </div>
                <?php endif; ?>
            </div>

        </div>
        <div class="row">
            <div class="col-3">
                <label for="pass">Password:</label>
            </div>
            <div class="col-9">
                <input type="password" name="password">
                <?php if(isset($info1)) :?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $info1 ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <input type="submit" class="buttonSubmit" value="Log in" >
        </div>
    </form>
</div>
</body>
</html>