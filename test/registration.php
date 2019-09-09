<?php
require_once ("connection.php");

function insert($name,$passHash,$email)
        {
            global $conn;
            $sql ="INSERT INTO users(name,pass,email)
            VALUES('$name','$passHash', '$email')";
            $result =$conn->query($sql);
            if(!$result)
            {
                return FALSE;
            }
            else
            {
                header("Location:login.php");
            }
        }
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST))
{
    $name = $conn->real_escape_string($_POST['name']);
    $password = $conn->real_escape_string($_POST['password']);
    $passwordRepeat = $conn->real_escape_string($_POST['passwordRepeat']);
    $passHash=MD5($password);
    $email = $conn->real_escape_string($_POST['email']);
    //var_dump($name, $password,$passwordRepeat,$email);
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
    {
        $emailO = "It is not a good format of e mail.";
    }
    elseif(strlen($name) <3 || strlen($name) >20)
    {
        $userO="Name must be beetween 3 and 20 carachters";
    }
    elseif(strlen($password) < 6 || strlen($password)>20)
    {
        $passO="Password must be beetween 6 and 20 carachters";
    }
    elseif(strlen($passwordRepeat) < 6 || strlen($passwordRepeat)>20)
    {
        $passCO ="Password which ypu repeat is not good.";
    }
    elseif($password !== $passwordRepeat )
    {
        $notEqual= "Passwor and repeat password is not the same.";
    }
    else
    {
        insert($name,$passHash,$email);
       
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
    <h1>Registration Form</h1>
    <p id="confirm">Please complete the form below</p>
  
        <div class= "container">
            <form action="registration.php" method="POST" class="form">
            <div class="row">
                    <div class="col-3">
                        <label for="">Email:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="email" value="">
                        <?php if(isset($emailO)) :?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $emailO ?>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for="">Name:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="name" value="">
                        <?php if(isset($userO)) :?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $userO ?>
                        </div>
                        <?php endif;?>
                      
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for=""> Password:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="password" value="">
                        <?php if(isset($passO)) :?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $passO; ?>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for=""> Repeat password:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="passwordRepeat" value="">
                        <?php if(isset($notEqual)) :?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $notEqual; ?>
                        </div>
                        <?php endif;?>
                       
                    </div>
                </div>
                <div class='row'>
                    <div class='col-3'></div>
                    <div class='col-9'>
                        <input type="submit" value="Confirm" class="buttonSubmit" >
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>