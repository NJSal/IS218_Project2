<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require("pdo.php");
//include("loginform.html");

$userid = filter_input(INPUT_POST, 'userId');
$password = filter_input(INPUT_POST, 'password');

$userid = (isset($userid)) ? $userid : '';

$password = (isset($password)) ? $password : '';

/*
$j = strpos($email, '@');
if($j == false){print "<br> no @ characters found<br>";}
if(empty($email)) {print "<br>Error in Email Field: you must enter your email<br>";}
*/

if(empty($userid)) {print "<br>Error in UserId Field: you must enter your UserId<br>";}

$plen = strlen($password);
if($plen < 8) {echo "<br>Error in Password Field: invalid password length: ".$password." is not at least 8 characters long<br>";}
if(empty($password)) {print "<br>Error in Password Field: you must enter your password<br>";}

/*
print "<br><br>";
print "Email: $email";
print "<br><br>";
print "Password: $password";
*/

$query = 'SELECT id, password from accountsIS218 WHERE id = :id and password = :password';

$statement = $db->prepare($query);
$statement->bindValue(':id', $userid);
$statement->bindValue(':password', $password);
$statement->execute();
$idselect = $statement->fetch();
$statement->closeCursor();


if($query != null) {
    header("Location: displayquestion.php?id=$userid&password=$password");
}

else{
    header("Location: registrationform.php?");
}

?>


<!DOCTYPE html>
<html>
<label>Email: </label>
<span><?php echo htmlspecialchars($userid); ?></span>
<br>
<label>Password: </label>
<span><?php echo htmlspecialchars($password); ?></span>
<br>

</html>
