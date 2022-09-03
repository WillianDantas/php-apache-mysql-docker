<h1>Hello Cloudreach!</h1>
<h4>Attempting MySQL connection from php...</h4>
<?php 
$host = 'mysql';
$user = 'apache';
$pass = 'root';
$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo connection_status(); 
echo '<br />';
echo "Connected to MySQL successfully!";
?>