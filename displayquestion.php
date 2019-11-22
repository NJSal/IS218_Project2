<?php
require('pdo.php');
/*
$firstname = filter_input(INPUT_GET, 'fname');
//$lastname = filter_input(INPUT_GET, 'lname');
//$birthday = filter_input(INPUT_GET, 'birthday');
$email = filter_input(INPUT_GET, 'email');
*/
/*$password = filter_input(INPUT_GET, 'password');*/


/*
$idselect = filter_input(INPUT_GET, 'ownerid');
*/

$query = 'SELECT fname, lname from accountsIS218 WHERE email = :email';
$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->bindValue(':fname', $firstname);
$statement->bindValue(':lname', $lastname);
$statement->execute();

echo "First Name: $firstname <br>";
echo "Last Name: $lastname <br>";
echo "Email: $email<br>";

$query = 'SELECT title, body from questions WHERE email = :email and password = :password';

$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $password);
$statement->execute();
$values= $statement->fetchAll();



$statement->closeCursor();


foreach($values as $question){
    echo $question['body'];
    echo $question['title'];
}

?>


<html>
<a href = questionform.html><button>Add another question</button></a>

</html>
