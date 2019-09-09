<html>
    <head>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <ul class="meni">
            <li><a href="login.php">Log in</a></li>
            <li><a href="registration.php">Register</a></li> 
        </ul>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <form action="results.php" method="POST" class ='search'>
                            <input type="text" name="search" value="" placeholder="Search...">
                            <button type="submit" name="submit-serach" class="buttonSearch"> Search </button>
                        </form>
                    </div>
                </div>
            </div>  
    </body>
</html>