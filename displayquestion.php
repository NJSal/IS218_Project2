<?php
require('pdo.php');

$firstname = filter_input(INPUT_GET, 'fname');
//$lastname = filter_input(INPUT_GET, 'lname');
//$birthday = filter_input(INPUT_GET, 'birthday');
$email = filter_input(INPUT_GET, 'email');
/*$password = filter_input(INPUT_GET, 'password');*/

$idselect = filter_input(INPUT_GET, 'ownerid');

echo "User Name: $firstname <br>";
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
