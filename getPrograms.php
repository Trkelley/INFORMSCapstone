<!-- GET PROGRAMS -->
<?php
require('conn.php');
$id = $_GET['id'];
$i = 0;
/*if (isset($_POST['submit'])) {
 $id = $_POST['InstitutionId'];
 $collegeName = $_POST['CollegeName'];
 $institutionName = $_POST['InstitutionName'];
 $programName = $_POST['ProgramName'];
 $programType = $_POST['ProgramType'];
 $deliveryMethod = $_POST['DeliveryMethod'];
 $programAccess = $_POST['ProgramAccess'];
 $programObjectives = $_POST['ProgramObjectives'];
 $fullTimeDuration = $_POST['FullTimeDuration'];
 $partTimeDuration = $_POST['PartTimeDuration'];
 $testingRequirement = $_POST['TestingRequirement'];
 $otherRequirement = $_POST['OtherRequirement'];
 $credits = $_POST['Credits'];
 $yearEstablished = $_POST['YearEstablished'];
 $referenceID = $_POST['ReferenceID'];
 $updateType = $_POST['UpdateType'];
 $lastUpdate = $_POST['LastUpdate'];
 $conn->query("INSERT INTO programs(ProgramName, ProgramType, DeliveryMethod, ProgramAccess, ProgramObjectives, FullTimeDuration, PartTimeDuration
 , TestingRequirement, OtherRequirement, Credits, YearEstablished, ReferenceID, UpdateType, LastUpdate) VALUES( '$programName', 
 '$programType', '$id')");
 header("location:Index.php");
 }*/
 $sql = ("SELECT  i.InstitutionName, i.InstitutionCity, i.InstitutionState, i.InstitutionZip, i.InstitutionRegion,
    p.ProgramName, p.ProgramType, p.DeliveryMethod, p.ProgramObjectives, p.FullTimeDuration, p.PartTimeDuration, p.YearEstablished,
	p.TestingRequirement, p.OtherRequirement, p.EstimatedResidentTuition, p.EstimatedNonresidentTuition, p.CostPerCredit, p.ProgramObjectives, p.OtherRequirement,
	c.ContactName, c.ContactTitle, c.ContactPhone, c.ContactEmail, co.CollegeName, co.CollegeType, courses.CourseTitle, courses.CourseType, pc.RequirementType
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
    ON pc.CourseId = courses.CourseId WHERE p.programId = $id;");
 $result = $conn->query($sql);
 $modalData = $conn->query($sql)->fetch_array()
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
    <style>
    .error {
        border:2px solid red;
    }
    </style>
</head>
<body>
<div class="text-center">
	<p class="h3 font-weight-bold"><?php echo $modalData['InstitutionName']?> </p>
	<p class="h4"><?php echo $modalData['CollegeName']?></p>
	<p class="h6 text-muted"><?php echo $modalData['ProgramName']?></p>
</div>
<form method="post" action="Index.php" role="form"id="programForm" onsubmit="return validateForm()">
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
		    <input type="text" class="form-control" id="contactName" name="contactName" value="<?php echo $modalData['ContactName'];?>"/>
		</div>
		<div class="form-group">
		    <label for="c.ContactTitle">Contact Title</label>
		    <input type="text" class="form-control" id="contactTitle" name="contactTitle" value="<?php echo $modalData['ContactTitle'];?>"/>
		</div>
		<div class="form-group">
		    <label for="c.ContactPhone">Contact Phone</label>
		    <input type="text" class="form-control" id="contactPhone" name="contactPhone" value="<?php echo $modalData['ContactPhone'];?>"/>
		</div>
		<div class="form-group">
		    <label for="c.ContactEmail">Contact Email</label>
		    <input type="text" class="form-control" id="contactEmail" name="contactEmail" value="<?php echo $modalData['ContactEmail'];?>"/>
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
		    <label for="co.CollegeName">College Name</label>
		    <input type="text" class="form-control" id="CollegeName" name="CollegeName" value="<?php echo $modalData['CollegeName'];?>"/>
		</div>
	<div class="form-group">
		    <label for="co.CollegeType">College Type</label>

		    <select class="form-control" id="CollegeType" name="CollegeType" >
		    	<option value="<?php echo $modalData['CollegeType'];?>"><?php echo $modalData['CollegeType'];?></option>
		    	<option>Arts and Sciences</option>
		    	<option>Business</option>
		    	<option>Center or Institute</option>
		    	<option>Engineering</option>
		    	<option>Other</option>
		    </select> 
		</div>
		<div class="form-group">
		    <label for="i.InstitutionCity">Program City</label>
		    <input type="text" class="form-control" id="InstitutionCity" name="InstitutionCity" value="<?php echo $modalData['InstitutionCity'];?>"/>
		</div>
		<div class="form-group">
		    <label for="i.InstitutionState">Program State</label>
		    <select class="form-control" id="InstitutionState" name="InstitutionState" >
		    	<option value="<?php echo $modalData['InstitutionState'];?>"><?php echo $modalData['InstitutionState'];?></option>
		    	<option>AL</option>
		    	<option>AK</option>
		    	<option>AZ</option>
		    	<option>AR</option>
		    	<option>CA</option>
		    	<option>CO</option>
		    	<option>CT</option>
		    	<option>DE</option>
		    	<option>FL</option>
		    	<option>GA</option>
		    	<option>HI</option>
		    	<option>ID</option>
		    	<option>IL</option>
		    	<option>IN</option>
		    	<option>IA</option>
		    	<option>KS</option>
		    	<option>KY</option>
		    	<option>LA</option>
		    	<option>ME</option>
		    	<option>MD</option>
		    	<option>MA</option>
		    	<option>MI</option>
		    	<option>MN</option>
		    	<option>MS</option>
		    	<option>MO</option>
		    	<option>MT</option>
		    	<option>NE</option>
		    	<option>NV</option>
		    	<option>NH</option>
		    	<option>NJ</option>
		    	<option>NM</option>
		    	<option>NY</option>
		    	<option>NC</option>
		    	<option>ND</option>
		    	<option>OH</option>
		    	<option>OK</option>
		    	<option>OR</option>
		    	<option>PA</option>
		    	<option>RI</option>
		    	<option>SC</option>
		    	<option>SD</option>
		    	<option>TN</option>
		    	<option>TX</option>
		    	<option>UT</option>
		    	<option>VT</option>
		    	<option>VA</option>
		    	<option>WA</option>
		    	<option>WV</option>
		    	<option>WI</option>
		    	<option>WY</option>
		    </select>
		</div>
		
		<fieldset disabled>
		<div class="form-group">
		<label for="i.InstitutionRegion">Program Region</label>
		<select class="form-control" id="InstitutionRegion" name="InstitutionRegion"  >
    		<option value="<?php echo $modalData['InstitutionRegion'];?>"><?php echo $modalData['InstitutionRegion'];?></option>
    		<option>South</option>
    		<option>Midwest</option>
    		<option>Northeast</option>
    		<option>West</option>
    		<option>Other</option>
		</select>
		</div>
		</fieldset>
		<div class="form-group">
		    <label for="p.ProgramName">Program Name</label>
		    <input type="text" class="form-control" id="programName" name="programName" value="<?php echo $modalData['ProgramName'];?>"/>
		</div>
		
		<div class="form-group">
		    <label for="p.YearEstablished">Year Established</label>
		    <input type="text" class="form-control" id="YearEstablished" name="YearEstablished" value="<?php echo $modalData['YearEstablished'];?>"/>
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
		    <label for="p.ProgramObjectives">Program Description</label>
		    <textarea  maxlength = "255" class="form-control" rows="6" id="ProgramObjectives" name="ProgramObjectives"><?php echo $modalData['ProgramObjectives'];?></textarea>
		</div>
		<div class="form-group">
		    <label for="">Program URL</label>
		    <input type="text" class="form-control" id="" name="" value=""/>
		</div>
		<div class="form-group">
		<label for="p.ProgramType">Program Type</label>
		<select class="form-control" id="ProgramType" name="ProgramType"  >
    		<option value="<?php echo $modalData['ProgramType'];?>"><?php echo $modalData['ProgramType'];?></option>
    		<option>B.B.A</option>
    		<option>B.S.</option>
    		<option>B.S. - Track Certificate</option>
    		<option>Graduate Certificate</option>
    		<option>M.B.A.</option>
    		<option>M.B.A. - Concentration</option>
    		<option>M.S.</option>
    		<option>M.S. - Concentration</option>
    		<option>M.S. and Graduate Certificate</option>
    		<option>M.S. Concentration - Professional Track</option>
    		<option>PhD</option>
    		<option>PhD - Concentration</option>
		</select>
		</div>
		<div class="form-group">
		<label for="p.DeliveryMethod">Program Delivery</label>
		<select class="form-control" id="DeliveryMethod" name="DeliveryMethod"  >
    		<option value="<?php echo $modalData['DeliveryMethod'];?>"><?php echo $modalData['DeliveryMethod'];?></option>
    		<option>On Campus: Full-Time</option>
    		<option>On Campus: Part-Time</option>
    		<option>On Campus: Full-Time and Part-Time</option>
    		<option>Online: Full-Time</option>
    		<option>Online: Part-Time</option>
    		<option>Online: Full-Time and Part-Time</option>
		</select>
		</div>
		<div class="form-group">
		    <label for="p.FullTimeDuration">Full-Time Duration</label>
		    <input type="text" class="form-control" id="FullTimeDuration" name="FullTimeDuration" value="<?php echo $modalData['FullTimeDuration'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.PartTimeDuration">Part-Time Duration</label>
		    <input type="text" class="form-control" id="PartTimeDuration" name="PartTimeDuration" value="<?php echo $modalData['PartTimeDuration'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.OtherRequirement">Other Requirements</label>
		    <textarea  maxlength = "255" class="form-control" rows="6" id="OtherRequirement" name="OtherRequirement"><?php echo $modalData['OtherRequirement'];?></textarea>
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
while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>' .$row['CourseTitle']. '</td>';
        echo '<td>' .$row['CourseType']. '</td>';
        echo '<td>' .$row['ProgramName']. '</td>';
        echo '<tr>';
};
        $result->close();

?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



<!-- Submission -->
  <p>
<button class = "btn btn-primary" style="width:550px; height:40px;" type="submit" value="Update" data-toggle="collapse" data-target="#SubmissionCollapse" aria-expanded="false" aria-controls="SubmissionCollapse">
Submit</button>
  </p>
</div>
<script>

//function validateForm() {
//var cn = document.forms["myForm"]["contactName"].value;

//   if (cn == "") {
//       alert("Contact Name must be filled out");
//       return false;
//}

function validateEmail(contactEmail) {
var re = /\S+@\S+\.\S+/;
return re.test(contactEmail);
}

function validateForm() {
var cn = document.forms["programForm"]["contactName"].value; var inputValcn = document.getElementById("contactName");
var ct = document.forms["programForm"]["contactTitle"].value; var inputValct = document.getElementById("contactTitle");
var cp = document.forms["programForm"]["contactPhone"].value; var inputValcp = document.getElementById("contactPhone");
var ce = document.forms["programForm"]["contactEmail"].value; var inputValce = document.getElementById("contactEmail");

if (cn == "") {
  alert("Contact Name must be filled out");
  inputValcn.style.border="1px solid red";
  return false;
}
if (ct == ""){
	alert("Contact Title must be filled out");
	inputValct.style.border="1px solid red";
  return false;
}
if (cp == ""){
 	alert("Contact Phone must be filled out");
 	inputValcp.style.border="1px solid red";
  return false;
 }
if (ce == ""){
   alert("Contact Email must be filled out");
   inputValce.style.border="1px solid red";
   return false;
  }
var email = $("#contactEmail").val();
if (validateEmail(email) == false)
{
	 alert("Contact Email must be filled out with a valid email");
   inputValce.style.border="1px solid red";
   return false;
}
var pn = document.forms["programForm"]["programName"].value; var inputValpn = document.getElementById("programName");
if (pn == ""){
  	alert("Program Name must be filled out");
  	inputValpn.style.border="1px solid red";
   return false;
  }
var po = document.forms["programForm"]["ProgramObjectives"].value; var inputValpo = document.getElementById("ProgramObjectives");
if (po == ""){
  	alert("Program Objectives must be filled out");
  	inputValpo.style.border="1px solid red";
   return false;
  }
else
{
  SubmissionFunction();
  return true;
}
}
function SubmissionFunction() {
	alert("Your data has been submitted for approval.");
}
</script>
 
	</form>
</body>
</html>


