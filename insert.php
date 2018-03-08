<?php
require('conn.php');

//displays information if the values are passed through without sending to the database
echo $_POST['contactName'];
echo "<br>";
echo $_POST['contactTitle'];
echo "<br>";
echo $_POST['contactPhone'];
echo "<br>";
echo $_POST['contactEmail'];
echo "<br>";
echo $_POST['contactId'];
echo "<br>";

echo "<br>";


$query ="INSERT INTO contacts (ContactName, ContactTitle, ContactPhone, ContactEmail, ReferenceId, UpdateType, LastUpdate)
	VALUES ('$_POST[contactName]' ,'$_POST[contactTitle]' , '$_POST[contactPhone]' , '$_POST[contactEmail]', '$_POST[contactId]', 2 , now())";

//The msql_query should look like this...
//mysqli_query( $conn, $queryContact ) or die('Did not enter');
//$conn has been left out for testing

header("location:Index.php");
?>




