<?php
require_once ("connection.php");

$sql="CREATE TABLE IF NOT EXISTS users
(
    id INT UNSIGNED AUTO_INCREMENT,
    name VARCHAR(60) NOT NULL UNIQUE COLLATE utf16_unicode_ci,
    pass VARCHAR (255) NOT NULL COLLATE utf16_unicode_ci,
    email VARCHAR (60) NOT NULL UNIQUE COLLATE utf16_unicode_ci,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;";
if($conn->query($sql))
{
    echo "<p>Uspesno zavrsen upit kreiranja tabele.</p><br>";
}
else
{
    echo "Greska u sql upitu. Razlog: ";
    echo $conn->error;
}
$sql1 = "INSERT INTO users(name,pass,email) 
        VALUES
        ('ana', MD5('ana'), 'ana@live.com'),
        ('ivana', MD5('ivana'), 'ivana@gmail.com'),
        ('bojana', MD5('bojana'), 'bojana@gmail.com'),
        ('predrad', MD5('predrag'), 'predrag@gmail.com'),
        ('ivanaIka', MD5('ivana'), 'ika@gmail.com');";
if($conn->query($sql1))
{
    echo "<p>Uspesno dodavanje korisnika u tabeli.</p><br>";
}
else
{
    echo "Greska u sql upitu. Razlog: ";
    echo $conn->error;
}
?>