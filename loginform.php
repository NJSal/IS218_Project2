<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require("pdo.php");
//include("loginform.html");

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

$email = (isset($email)) ? $email : '';

$password = (isset($password)) ? $password : '';


$s = "SELECT count(*) FROM 'accountsIS218' WHERE email = :email and password = :password";
$count = $db->prepare($s);
$count -> execute();
$num_rows = $count ->fetchColumn();
print "'$num_rows'";

echo "number of rows found with credentials: $num_rows<br>";
if($num_rows > 0) {print "the user already exists"; die();}



$j = strpos($email, '@');
if($j == false){print "<br> no @ characters found<br>";}
if(empty($email)) {print "<br>Error in Email Field: you must enter your email<br>";}


$plen = strlen($password);
if($plen < 8) {echo "<br>Error in Password Field: invalid password length: ".$password." is not at least 8 characters long<br>";}
if(empty($password)) {print "<br>Error in Password Field: you must enter your password<br>";}


$query = 'SELECT id from accountsIS218 WHERE email = :email and password = :password';

$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $password);
$statement->execute();
$idselect = $statement->fetch();

print"$idselect";
$statement->closeCursor();


if($idselect != null) {
    header("Location: displayquestion.php?ownerid=$idselect");
}

else{
    header("Location: registrationform.php?email=$email&password=$password");
}

?>


<!DOCTYPE html>
<html>
<label>Email: </label>
<span><?php echo htmlspecialchars($email); ?></span>
<br>
<label>Password: </label>
<span><?php echo htmlspecialchars($password); ?></span>
<br>

</html>
