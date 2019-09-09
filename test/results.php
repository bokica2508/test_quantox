<html>
    <head>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
<body> 
<?php
require_once ("connection.php");
session_start();
if(!isset($_SESSION['id']))
{
    echo "Please log in. <a href='login.php'>Log in</a>";
     //header("Location:login.php");
}
else
{
    if(isset($_POST['submit-serach']) && isset($_SESSION))
{
	$search = mysqli_real_escape_string($conn, $_POST['search']);
	$sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
	$result= mysqli_query($conn,$sql);
	$queryResults= mysqli_num_rows($result);
	
	
	
	if($queryResults > 0){
        echo "<ul class='results'>";
        echo "There are " . $queryResults . " result/s<br><br>";
	while($row=mysqli_fetch_assoc($result)){
        echo "<li>Name of user: " .  $row['name'] .
             " email of user: " . $row['email']. "</li>";
        
        
    }
    echo "</ul>";
		
	}
	else 
	{
        echo "<p style ='color:red; text-align:center; margin-top:30px'>There are not results.</p>";
	}


}
}
?>
</body>
</html>
