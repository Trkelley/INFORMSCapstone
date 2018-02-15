<?php 
require('conn.php');
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $id = $_POST['InstitutionId'];
    $collegeName = $_POST['CollegeName'];
    $institutionName = $_POST['InstitutionName'];
    $conn->query("UPDATE `details` SET `CollegeName` = '$collegeName', `InstitutionName` = '$institutionName', WHERE `InstitutionId`='$id'");
    header("location:Index.php");
}

$result = $conn->query("SELECT InstitutionId, CollegeName FROM colleges WHERE InstitutionId = $id ;");
$sqlRes = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program Info</title>
 
    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form method="post" action="Index.php" role="form">
	<div class="modal-body">
		<div class="form-group">
		    <label for="id">ID</label>
		    <input type="text" class="form-control" id="id" name="id" value="<?php echo $sqlRes['InstitutionId'];?>"/>
		</div>
		<div class="form-group">
		    <label for="phone">College Name</label>
	            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $sqlRes['CollegeName'];?>" />
		</div>
		</div>
		<div class="modal-footer">
		     <input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
		     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
</body>
</html>