<?php
require('pdo.php');

$firstname = filter_input(INPUT_GET, 'fname');
$lastname = filter_input(INPUT_GET, 'lname');
$email = filter_input(INPUT_GET, 'email');
$ownerid = filter_input(INPUT_GET, 'id');

$firstname= (isset($firstname)) ? $firstname : '';
$lastname = (isset($lastname)) ? $lastname : '';
$email = (isset($email)) ? $email : '';


echo "First Name: $firstname <br>";
echo "Last Name: $lastname <br>";
echo "Email: $email<br>";

/*
$idselect = filter_input(INPUT_GET, 'ownerid');
*/

$query = 'SELECT body,title FROM questions WHERE email = :ownermail AND id = :ownerid';
$statement = $db->prepare($query);
$statement->bindValue(':onwnermail', $email);
$statement->execute();
/*
echo "First Name: $firstname <br>";
echo "Last Name: $lastname <br>";
echo "Email: $email<br>";
*/
$values= $statement->fetchAll();
$statement->closeCursor();
/*
$query = 'SELECT title, body from questions WHERE email = :email and password = :password';
$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $password);
$statement->execute();
$values= $statement->fetchAll();
$statement->closeCursor();
*/
?>

<?php foreach ($values as $question) : ?>
    <tr>
        <td><?php echo $question['body']; ?></td>
        <td><?php echo $question['title']; ?></td>
    </tr>
<?php endforeach;?>







<html>
<a href = questionform.html><button>Add another question</button></a>

</html>
