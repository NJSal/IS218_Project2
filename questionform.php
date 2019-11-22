<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

//include("questionform.html");

$name = filter_input(INPUT_POST, 'name');
$about = filter_input(INPUT_POST, 'about');
$skills = filter_input(INPUT_POST, 'skills');

$name = (isset($name)) ? $name : '';
$about = (isset($about)) ? $about : '';
$skills = (isset($skills)) ? $skills : '';

$namelength = strlen($name);
if($namelength < 3) {echo "<br>Error in Name Field: invalid name length: ".$name." is not at least 3 characters long<br>";}
if(empty($name)) {print "<br>Error in Name Field: you must enter your name<br>";}

$aboutlength = strlen($about);
if($aboutlength > 500) {print "<br>Error in About Field: the number of words you entered is > 500<br>"; /*exit();*/}
if(empty($about)) {print "<br>Error in About Field: you the the second field empty<br>";}

$skillset = explode(',' , $skills);
$skillselected = count($skillset);
if($skillselected < 2) {print "<br>Error in Skills Field: please write down at least two skills<br>";}

/*
print "<br><br>";
print "Name: $name";
print "<br><br>";
print "About: $about";
*/


/*
$skillset = explode(',' , $skills);
print "<br><br>";
print "Skills: ";
for($i = 0; $i < count($skillset); $i++){
    echo "$skillset[$i]";
    if($i < (count($skillset) -1)){
        echo ", ";
    }
}
*/


?>


<!DOCTYPE html>
<html>
<head>
    <title> Question Form </title>
    <link rel = "stylesheet" type = "text/css" href = "form.css">
</head>

<body>
<main>
    <h1> Question Form </h1>

    <label> Question 1. Name:</label>
    <span><?php echo htmlspecialchars($name);?></span>
    <br>

    <label> Question 2. About You:</label>
    <span><?php echo htmlspecialchars($about);?></span>
    <br>

    <label> Skills (comma separated):</label>
    <span><?php echo htmlspecialchars($skills);?></span>
    <br>

</main>
</body>
</html>
