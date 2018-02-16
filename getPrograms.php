<?php 
require('conn.php');
$id = $_GET['id'];

/* if (isset($_POST['submit'])) {
    $id = $_POST['InstitutionId'];
    $collegeName = $_POST['CollegeName'];
    $institutionName = $_POST['InstitutionName'];
    $conn->query("UPDATE `details` SET `CollegeName` = '$collegeName', `InstitutionName` = '$institutionName', WHERE `InstitutionId`='$id'");
    header("location:Index.php");
} */

$result = $conn->query("SELECT  i.InstitutionName, p.ProgramName, p.ProgramType, p.DeliveryMethod, p.ProgramObjectives, p.FullTimeDuration, p.PartTimeDuration, 
	p.TestingRequirement, p.OtherRequirement, p.EstimatedResidentTuition, p.EstimatedNonresidentTuition, p.CostPerCredit,
	c.ContactName, c.ContactTitle, c.ContactPhone, c.ContactEmail, co.CollegeName, co.CollegeType
    FROM programs p
	JOIN institutions i 
	ON p.InstitutionId = i.InstitutionId
	JOIN colleges co
	ON p.InstitutionId = co.InstitutionId
	JOIN contacts c
	ON p.ContactId = c.ContactId WHERE p.InstitutionId = $id ;");
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
	<label for="i.InstitutionName">Program Info for <?php echo $sqlRes['InstitutionName'];?></label>
		<div class="form-group">
		    <label for="p.ProgramName">Program Name</label>
		    <input type="text" class="form-control" id="programName" name="programName" value="<?php echo $sqlRes['ProgramName'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.ProgramType">Program Type</label>
		    <input type="text" class="form-control" id="programType" name="programType" value="<?php echo $sqlRes['ProgramType'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.DeliveryMethod">Delivery Method</label>
		    <input type="text" class="form-control" id="deliveryMethod" name="deliveryMethod" value="<?php echo $sqlRes['DeliveryMethod'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.ProgramObjectives">Program Objectives</label>
		    <input type="text" class="form-control" id="programObjectives" name="programObjectives" value="<?php echo $sqlRes['ProgramObjectives'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.FullTimeDuration">Full Time Duration</label>
		    <input type="text" class="form-control" id="fullTimeDuration" name="fullTimeDuration" value="<?php echo $sqlRes['FullTimeDuration'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.PartTimeDuration">Part Time Duration</label>
		    <input type="text" class="form-control" id="partTimeDuration" name="partTimeDuration" value="<?php echo $sqlRes['PartTimeDuration'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.TestingRequirement">Testing Requirement</label>
		    <input type="text" class="form-control" id="testingRequirement" name="testingRequirement" value="<?php echo $sqlRes['TestingRequirement'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.OtherRequirement">Other Requirement</label>
		    <input type="text" class="form-control" id="otherRequirement" name="otherRequirement" value="<?php echo $sqlRes['OtherRequirement'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.EstimatedResidentTuition">Estimated Resident Tuition</label>
		    <input type="text" class="form-control" id="estimatedResidentTuition" name="estimatedResidentTuition" value="<?php echo $sqlRes['EstimatedResidentTuition'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.EstimatedNonresidentTuition">Estimated Nonresident Tuition</label>
		    <input type="text" class="form-control" id="estimatedNonresidentTuition" name="estimatedNonresidentTuition" value="<?php echo $sqlRes['EstimatedNonresidentTuition'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.CostPerCredit">Cost Per Credit</label>
		    <input type="text" class="form-control" id="costPerCredit" name="costPerCredit" value="<?php echo $sqlRes['CostPerCredit'];?>"/>
		</div>
		<div class="form-group">
		    <label for="c.ContactName">Contact Name</label>
		    <input type="text" class="form-control" id="contactName" name="contactName" value="<?php echo $sqlRes['ContactName'];?>"/>
		</div>
		<div class="form-group">
		    <label for="c.ContactTitle">Contact Title</label>
		    <input type="text" class="form-control" id="contactTitle" name="contactTitle" value="<?php echo $sqlRes['ContactTitle'];?>"/>
		</div>
		<div class="form-group">
		    <label for="c.ContactPhone">Contact Phone</label>
		    <input type="text" class="form-control" id="contactPhone" name="contactPhone" value="<?php echo $sqlRes['ContactPhone'];?>"/>
		</div>
		<div class="form-group">
		    <label for="c.ContactEmail">Contact Email</label>
		    <input type="text" class="form-control" id="contactEmail" name="contactEmail" value="<?php echo $sqlRes['ContactEmail'];?>"/>
		</div>
		<div class="form-group">
		    <label for="co.CollegeName">College Name</label>
		    <input type="text" class="form-control" id="collegeName" name="collegeName" value="<?php echo $sqlRes['CollegeName'];?>"/>
		</div>
		<div class="form-group">
		    <label for="co.CollegeType">College Type</label>
		    <input type="text" class="form-control" id="collegeType" name="collegeType" value="<?php echo $sqlRes['CollegeType'];?>"/>
		</div>
		</div>
		<div class="modal-footer">
		     <input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
		     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
</body>
</html>