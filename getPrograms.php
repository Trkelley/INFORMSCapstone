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
$result = $conn->query("SELECT  i.InstitutionName, i.InstitutionCity, i.InstitutionState, i.InstitutionZip, i.InstitutionRegion,
    p.ProgramName, p.ProgramType, p.DeliveryMethod, p.ProgramObjectives, p.FullTimeDuration, p.PartTimeDuration, p.YearEstablished,
	p.TestingRequirement, p.OtherRequirement, p.EstimatedResidentTuition, p.EstimatedNonresidentTuition, p.CostPerCredit, p.ProgramObjectives, p.OtherRequirement,
	c.ContactName, c.ContactTitle, c.ContactPhone, c.ContactEmail, co.CollegeName, co.CollegeType, courses.CourseTitle
    FROM programs p
	JOIN institutions i
	ON p.InstitutionId = i.InstitutionId
	JOIN colleges co
	ON p.InstitutionId = co.InstitutionId
	JOIN contacts c
	ON p.ContactId = c.ContactId
    JOIN program_courses pc
    ON p.ProgramId = pc.ProgramId
    JOIN courses
    ON pc.CourseId = courses.CourseId WHERE p.InstitutionId = $id;");
$sqlRes = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program Information</title>
 
    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<form method="post" action="Index.php" role="form">
	<div class="modal-body">
	
<!-- Contact Information -->
	<p>
  <button class="btn btn-primary" style="width:550px; height:40px;" type="button" data-toggle="collapse" data-target="#ContactInfoCollapse" aria-expanded="false" aria-controls="ContactInfoCollapse">
    Contact Information
  </button>
</p>
<div class="collapse" id="ContactInfoCollapse">
  <div class="card card-body">
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
  </div>
</div>

<!-- Progam General Information -->
<p>
<button class="btn btn-primary" style="width:550px; height:40px;" type="button" data-toggle="collapse" data-target="#ProgramGeneralInfoCollapse" aria-expanded="false" aria-controls="ProgramGeneralInfoCollapse">
    Program General Information
  </button>
  </p>
<div class="collapse" id="ProgramGeneralInfoCollapse">
  <div class="card card-body">
	
		<div class="form-group">
		    <label for="i.InstitutionCity">Program City</label>
		    <input type="text" class="form-control" id="InstitutionCity" name="InstitutionCity" value="<?php echo $sqlRes['InstitutionCity'];?>"/>
		</div>
		<div class="form-group">
		    <label for="i.InstitutionState">Program State</label>
		    <select class="form-control" id="InstitutionState" name="InstitutionState" >
		    	<option value="<?php echo $sqlRes['InstitutionState'];?>"><?php echo $sqlRes['InstitutionState'];?></option>
		    	<option>Alabama</option>
		    	<option>Alaska</option>
		    	<option>Arizona</option>
		    	<option>Arkansas</option>
		    	<option>California</option>
		    	<option>Colorado</option>
		    	<option>Connecticut</option>
		    	<option>Delaware</option>
		    	<option>Florida</option>
		    	<option>Georgia</option>
		    	<option>Hawaii</option>
		    	<option>Idaho</option>
		    	<option>Illinois</option>
		    	<option>Indiana</option>
		    	<option>Iowa</option>
		    	<option>Kansas</option>
		    	<option>Kentucky</option>
		    	<option>Louisiana</option>
		    	<option>Maine</option>
		    	<option>Maryland</option>
		    	<option>Massachusetts</option>
		    	<option>Michigan</option>
		    	<option>Minnesota</option>
		    	<option>Mississippi</option>
		    	<option>Missouri</option>
		    	<option>Montana</option>
		    	<option>Nebraska</option>
		    	<option>Nevada</option>
		    	<option>New Hampshire</option>
		    	<option>New Jersey</option>
		    	<option>New Mexico</option>
		    	<option>New York</option>
		    	<option>North Carolina</option>
		    	<option>North Dakota</option>
		    	<option>Ohio</option>
		    	<option>Oklahoma</option>
		    	<option>Oregon</option>
		    	<option>Pennsylvania</option>
		    	<option>Rhode Island</option>
		    	<option>South Carolina</option>
		    	<option>South Dakota</option>
		    	<option>Tennessee</option>
		    	<option>Texas</option>
		    	<option>Utah</option>
		    	<option>Vermont</option>
		    	<option>Virginia</option>
		    	<option>Washington</option>
		    	<option>West Virginia</option>
		    	<option>Wisconsin</option>
		    	<option>Wyoming</option>
		    </select>
		</div>
		<div class="form-group">
		<label for="i.InstitutionRegion">Program Region</label>
		<select class="form-control" id="InstitutionRegion" name="InstitutionRegion"  >
    		<option value="<?php echo $sqlRes['InstitutionRegion'];?>"><?php echo $sqlRes['InstitutionRegion'];?></option>
    		<option>South</option>
    		<option>Midwest</option>
    		<option>Northeast</option>
    		<option>West</option>
    		<option>Other</option>
		</select>
		    
		</div>
		<div class="form-group">
		    <label for="p.ProgramName">Program Name</label>
		    <input type="text" class="form-control" id="programName" name="programName" value="<?php echo $sqlRes['ProgramName'];?>"/>
		</div>
		<div class="form-group">
		    <label for="co.CollegeType">College Type</label>
		    <select class="form-control" id="CollegeType" name="CollegeType" >
		    	<option value="<?php echo $sqlRes['CollegeType'];?>"><?php echo $sqlRes['CollegeType'];?></option>
		    	<option>Arts and Sciences</option>
		    	<option>Business</option>
		    	<option>Center or Institute</option>
		    	<option>Engineering</option>
		    	<option>Informatics</option>
		    	<option>Multiple Schools</option>
		    	<option>Professional Studies</option>
		    	<option>Information Systems &amp; Management</option>
		    </select>
		    
		</div>
		<div class="form-group">
		    <label for="p.YearEstablished">Year Established</label>
		    <input type="text" class="form-control" id="YearEstablished" name="YearEstablished" value="<?php echo $sqlRes['YearEstablished'];?>"/>
		</div>
  </div>
</div>

<!-- Program Details -->
<p>
<button class="btn btn-primary" style="width:550px; height:40px;" type="button" data-toggle="collapse" data-target="#ProgramDetailsCollapse" aria-expanded="false" aria-controls="ProgramDetailsCollapse">
    Program Details
  </button>
  </p>
<div class="collapse" id="ProgramDetailsCollapse">
  <div class="card card-body">
  <div class="form-group">
		    <label for="p.ProgramObjectives">Program Objectives</label>
		    <textarea  class="form-control" rows="6" id="ProgramObjectives" name="ProgramObjectives"><?php echo $sqlRes['ProgramObjectives'];?></textarea>
		</div>
		<div class="form-group">
		    <label for="c.ContactTitle">Program URL</label>
		    <input type="text" class="form-control" id="contactTitle" name="contactTitle" value=""/>
		</div>
		<div class="form-group">
		    <label for="p.ProgramType">Program Type</label>
		    <input type="text" class="form-control" id="ProgramType" name="ProgramType" value="<?php echo $sqlRes['ProgramType'];?>"/>
		</div>
		<div class="form-group">
		<label for="p.DeliveryMethod">Program Delivery</label>
		<select class="form-control" id="DeliveryMethod" name="DeliveryMethod"  >
    		<option value="<?php echo $sqlRes['DeliveryMethod'];?>"><?php echo $sqlRes['DeliveryMethod'];?></option>
    		<option>On Campus: Full-Time</option>
    		<option>On Campus: Part-Time</option>
    		<option>On Campus: Full-Time and Part-Time</option>
    		<option>Online: Full-Time</option>
    		<option>Online: Part-Time</option>
    		<option>Online: Full-Time and Part-Time</option>
		</select>
		</div>
		<div class="form-group">
		    <label for="p.DeliveryMethod">Program Duration</label>
		    <input type="text" class="form-control" id="DeliveryMethod" name="DeliveryMethod" value=""/>
		</div>
		<div class="form-group">
		    <label for="p.FullTimeDuration">Full-Time Duration</label>
		    <input type="text" class="form-control" id="FullTimeDuration" name="FullTimeDuration" value="<?php echo $sqlRes['FullTimeDuration'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.PartTimeDuration">Part-Time Duration</label>
		    <input type="text" class="form-control" id="PartTimeDuration" name="PartTimeDuration" value="<?php echo $sqlRes['PartTimeDuration'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.OtherRequirement">Other Requirements</label>
		    <textarea  class="form-control" rows="6" id="OtherRequirement" name="OtherRequirement"><?php echo $sqlRes['OtherRequirement'];?></textarea>
		</div>
  </div>
</div>

<!-- Curriculum Information -->
<p>
<button class="btn btn-primary" style="width:550px; height:40px;" type="button" data-toggle="collapse" data-target="#CurriculumInfoCollapse" aria-expanded="false" aria-controls="CurriculumInfoCollapse">
    Curriculum Information
  </button>
  </p>


       <div class="card card-body">
        <div id="CurriculumInfoCollapse" class="collapse"> 
        <div class="form-group">
        </div>                           
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Course Title</th>
                    <th>Course Type</th>
                    <th>Course Department</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
<?php
// Output data of each row
while($row = mysqli_fetch_assoc($result)) :
        echo '<tr>';
        echo '<td>' .$row['CourseTitle']. '</td>';
        echo '<td>' .$row['CollegeType']. '</td>';
        echo '<td>' .$row['ProgramName']. '</td>';
        echo '<tr>';
        endwhile;
        $result->close();
 
?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



<!-- Submission -->
  <p>
<button onclick="SubmissionFunction()" class="btn btn-primary" style="width:550px; height:40px;" type="submit" value="Update" data-toggle="collapse" data-target="#SubmissionCollapse" aria-expanded="false" aria-controls="SubmissionCollapse">
</button>
  </p>
</div>
<script>
function SubmissionFunction() {
	alert("Your data has been submitted for approval.");
}
</script>
 
	</form>
</body>
</html>
