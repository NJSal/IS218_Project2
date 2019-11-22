<?php


$firstname = filter_input(INPUT_GET, 'fname');
$lastname = filter_input(INPUT_GET, 'lname');
$birthday = filter_input(INPUT_GET, 'birthday');
$email = filter_input(INPUT_GET, 'email');
$password = filter_input(INPUT_GET, 'password');

$idselect = filter_input(INPUT_GET, 'ownerid');

echo "User Name: $firstname <br>";
echo "Email: $email<br>";

$query = 'SELECT ownerid FROM questions WHERE ownerid = :idselect';




?>

<!DOCTYPE html>
<html>
<a href = questionform.html><button>Add another question</button></a>

</html>
