<?php
require('conn.php');
$id = $_GET['id'];
 $sql = ("SELECT  *
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
 $modalData = $conn->query($sql)->fetch_array();
 
 
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
<form method="post" action="insert.php" role="form" id="programForm" onsubmit="return validateForm()">
	<div class="modal-body">
	
	<!-- A BUNCH OF HIDDEN VALUES TO PASS INFO TO DATABASE -->
	
	<!-- Contacts -->
	<input type="hidden" name="contactId" value="<?php echo $modalData['ContactId']; ?>">
	
	<!-- Programs -->
	<input type="hidden" name="programId" value="<?php echo $modalData['ProgramId']; ?>">
	<input type="hidden" name="scholarship" value="<?php echo $modalData['Scholarship']; ?>">
	<input type="hidden" name="estimatedResidentTuition" value="<?php echo $modalData['EstimatedResidentTuition']; ?>">
	<input type="hidden" name="estimatedNonresidentTuition" value="<?php echo $modalData['EstimatedNonresidentTuition']; ?>">
	<input type="hidden" name="costPerCredit" value="<?php echo $modalData['CostPerCredit']; ?>">
	<input type="hidden" name="credits" value="<?php echo $modalData['Credits']; ?>">
	<input type="hidden" name="costPerCredit" value="<?php echo $modalData['CostPerCredit']; ?>">
	<input type="hidden" name="programAccess" value="<?php echo $modalData['ProgramAccess']; ?>">
	<input type="hidden" name="testingRequirement" value="<?php echo $modalData['TestingRequirement']; ?>">
	
	
	
	
	
	<!-- Institutions -->
	
	<input type="hidden" name="institutionName" value="<?php echo $modalData['InstitutionName']; ?>">
	<input type="hidden" name="institutionId" value="<?php echo $modalData['InstitutionId']; ?>">
	<input type="hidden" name="institutionZip" value="<?php echo $modalData['InstitutionZip']; ?>">
	<input type="hidden" name="institutionAddress" value="<?php echo $modalData['InstitutionAddress']; ?>">
	<input type="hidden" name="institutionPhone" value="<?php echo $modalData['InstitutionPhone']; ?>">
	<input type="hidden" name="institutionEmail" value="<?php echo $modalData['InstitutionEmail']; ?>">
	<input type="hidden" name="institutionAccess" value="<?php echo $modalData['InstitutionAccess']; ?>">
	
    <!-- College Information -->
    <input type="hidden" name="collegeId" value="<?php echo $modalData['CollegeId']; ?>">
    
	<p>
  <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#ContactInfoCollapse" aria-expanded="false" aria-controls="ContactInfoCollapse">
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
		    <label for="c.ContactPhone">Contact Phone (ex. +1 111 111 1111)</label>
		    <input type="text" class="form-control phone" maxlength="15" id="contactPhone" name="contactPhone" placeholder = "+1 111 111 1111" value="<?php echo $modalData['ContactPhone'];?>"/>
		</div>
		<div class="form-group">
		    <label for="c.ContactEmail">Contact Email</label>
		    <input type="text" class="form-control" id="contactEmail" name="contactEmail" placeholder = "example@example.com" value="<?php echo $modalData['ContactEmail'];?>"/>
		</div>
  </div>
</div>

<!-- Progam General Information -->
<p>
<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#ProgramGeneralInfoCollapse" aria-expanded="false" aria-controls="ProgramGeneralInfoCollapse">
    Program General Information
  </button>
  </p>
<div class="collapse" id="ProgramGeneralInfoCollapse">
  <div class="card card-body">
  <div class="form-group">
	<label for="p.ProgramName">Program Name</label>
		<input type="text" class="form-control" id="programName" name="programName" value="<?php echo $modalData['ProgramName'];?>"/>
  </div>
  <div class="form-group">
		    <label for="co.CollegeName">College Name</label>
		    <input type="text" class="form-control" id="collegeName" name="collegeName" value="<?php echo $modalData['CollegeName'];?>"/>
		</div>
	<div class="form-group">
		    <label for="co.CollegeType">College Type</label>

		    <select class="form-control" id="collegeType" name="collegeType" >
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
		    <input type="text" class="form-control" id="institutionCity" name="institutionCity" value="<?php echo $modalData['InstitutionCity'];?>" readonly/>
		</div>
		<div class="form-group">
		    <label for="i.InstitutionState">Program State</label>
		    <input class="form-control" id="institutionState" name="institutionState" value="<?php echo $modalData['InstitutionState'];?>" readonly/>
		</div>
		
		<div class="form-group">
		<label for="i.InstitutionRegion">Program Region</label>
		    <input type="text" class="form-control" id="institutionRegion" name="institutionRegion" value="<?php echo $modalData['InstitutionRegion'];?>" readonly />
		
		</div>
		
		<div class="form-group">
		    <label for="p.YearEstablished">Year Established</label>
		    <input type="text" class="form-control" id="yearEstablished" name="yearEstablished" value="<?php echo $modalData['YearEstablished'];?>" />
		</div>
  </div>
</div>

<!-- Program Details -->
<p>
<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#ProgramDetailsCollapse" aria-expanded="false" aria-controls="ProgramDetailsCollapse">
    Program Details
  </button>
  </p>
<div class="collapse" id="ProgramDetailsCollapse">
  <div class="card card-body">
  <div class="form-group">
		    <label for="p.ProgramObjectives">Program Description</label>
		    <textarea  maxlength = "2000" class="form-control" rows="6" id="programObjectives" name="programObjectives"><?php echo $modalData['ProgramObjectives']?></textarea>
		</div>
		<div class="form-group">
		    <label for="">Program URL</label>
		    <input type="text" class="form-control" id="programAccess" name="programAccess" value="<?php echo $modalData['ProgramAccess'];?>"/>
		</div>
		<div class="form-group">
		    <label for="p.ProgramType">Program Type</label>
		<select class="form-control" id="programType" name="programType"  >
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
    		<option>Other</option>
		</select>
		</div>
		<div class="form-group">
		<label for="p.DeliveryMethod">Program Delivery</label>
		<select class="form-control" id="deliveryMethod" name="deliveryMethod"  >
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
		    <select class="form-control" id="fullTimeDuration" name="fullTimeDuration">
				<option value="<?php echo $modalData['FullTimeDuration'];?>"><?php echo $modalData['FullTimeDuration'];?></option>
		    	<option>Not Available</option>
		    	<option>1 Months</option>
		    	<option>2 Months</option>
		    	<option>3 Months</option>
		    	<option>4 Months</option>
		    	<option>5 Months</option>
		    	<option>6 Months</option>
		    	<option>7 Months</option>
		    	<option>8 Months</option>
		    	<option>9 Months</option>
		    	<option>10 Months</option>
		    	<option>11 Months</option>
		    	<option>12 Months</option>
		    	<option>13 Months</option>
		    	<option>14 Months</option>
		    	<option>15 Months</option>
		    	<option>16 Months</option>
		    	<option>17 Months</option>
		    	<option>18 Months</option>
		    	<option>19 Months</option>
		    	<option>20 Months</option>
		    	<option>21 Months</option>
		    	<option>22 Months</option>
		    	<option>23 Months</option>
		    	<option>24 Months</option>
		    	<option>25+ Months</option>
		    	<option>Other</option>
			</select>
		</div>
		<div class="form-group">
		    <label for="p.PartTimeDuration">Part-Time Duration</label>
		    <select class="form-control" id="partTimeDuration" name="partTimeDuration">
			<option value="<?php echo $modalData['PartTimeDuration'];?>"><?php echo $modalData['PartTimeDuration'];?></option>
		    	<option>Not Available</option>
		    	<option>1 Months</option>
		    	<option>2 Months</option>
		    	<option>3 Months</option>
		    	<option>4 Months</option>
		    	<option>5 Months</option>
		    	<option>6 Months</option>
		    	<option>7 Months</option>
		    	<option>8 Months</option>
		    	<option>9 Months</option>
		    	<option>10 Months</option>
		    	<option>11 Months</option>
		    	<option>12 Months</option>
		    	<option>13 Months</option>
		    	<option>14 Months</option>
		    	<option>15 Months</option>
		    	<option>16 Months</option>
		    	<option>17 Months</option>
		    	<option>18 Months</option>
		    	<option>19 Months</option>
		    	<option>20 Months</option>
		    	<option>21 Months</option>
		    	<option>22 Months</option>
		    	<option>23 Months</option>
		    	<option>24 Months</option>
		    	<option>25+ Months</option>
		    	<option>Other</option>	
		    </select>
		</div>
		<div class="form-group">
		    <label for="p.OtherRequirement">Application Requirements</label>
		   <textarea  maxlength = "255" class="form-control" rows="6" id="otherRequirement" name="otherRequirement"><?php echo $modalData['OtherRequirement'];?></textarea>
		</div>
  </div>
</div>

<!-- Curriculum Information -->
<p>
<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#CurriculumInfoCollapse" aria-expanded="false" aria-controls="CurriculumInfoCollapse">
    Curriculum Information
  </button>
  </p>



       <div class="card card-body">
        <div id="CurriculumInfoCollapse" class="collapse"> 
        <div class="form-group">
               
            <table class="table table-striped table-bordered" id = "currTable">
            <thead>
                <tr>
                    <th>Course Title</th>
                    <th>Course Type</th>
                    <th>Discipline</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
<?php
// Output data of each row
$rowCount = 2;
while($row = mysqli_fetch_assoc($result))
{
    $rowCount++;
        echo '<tr>';
        echo '<td>';
        echo '<input class="form-control" type = "text" value = "'.$row['CourseTitle'].'" name = "courseTitle" id = "courseTitle'.$rowCount.'"/>';
        echo '<input type="hidden" name="contactId" value="'. $row['CourseId']. '">';
        echo "</td>";
        
        echo '<td>';
        echo '<select class="form-control" > class="form-control" <option value= "'.$row['RequirementType'].'">'.$row['RequirementType'].'</option>
        <option>Required</option>
        <option>Elective</option>';
        echo "</td>";
        
        echo '<td>';
        echo '<select class="form-control" ><option></option>
        <option>Information Systems</option>
        <option>Operations Research</option>
        <option>Statistics</option>';
        echo "</td>";
        echo '<td>
            <input type="checkbox" onclick = "deleteCourse(event)"> 
             </td>';
};
        $result->close();
?>
                    </tr>
                </tbody>
            </table>
            <br>                         
    <div style = "text-align:right; margin-right: 10%;" >
            <a type = "button" onclick = "addCourse()">Add Course</a>
            </div>           
    </div> 
        </div>
    </div>



<!-- Submission -->
  <p>
 <button class = "btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#SubmissionButton" aria-expanded="false" aria-controls="SubmissionButton">
Click Here After Entering All Data</button>
  </p>
  <div class="collapse" id= "SubmissionButton">
  <div class= "card card-body">
  <div class= "form-group"> 
  <div class= "text-center">
  	<p class = "h6 font-weight-bold"> <font size = "2">By pressing the "Submit All Changes" button below, you acknowledge that all information above is correct and up-to-date.</font></p>
  	<p class = "h6 font-weight-bold"> <font size = "2">The information submitted will be sent to an INFORMS Administrator for approval before information is made public.</font></p>
  	<p class = "h6 font-weight-bold"> <font size = "2">You will receive an email notification confirming your submission.</font></p>
<button class = "btn btn-success" type="submit" value="Update" data-toggle="collapse" data-target="#SubmissionCollapse" aria-expanded="false" aria-controls="SubmissionCollapse">
Submit All Changes</button>
</div>
</div>
</div>
  </div>
</div>


<script>
//function validateForm() {
//var cn = document.forms["myForm"]["contactName"].value;
// if (cn == "") {
//     alert("Contact Name must be filled out");
//     return false;
//}
$('.phone')
.on('keypress', function(e) {
  var key = e.charCode || e.keyCode || 0;
  var phone = $(this);
  if (phone.val().length === 0) {
    phone.val(phone.val() + '+');
  }
  // Auto-format- do not expose the mask as the user begins to type
  if (key !== 8 && key !== 9) {
	if (phone.val().length === 2) {
	      phone.val(phone.val() + ' ');
	}  
    if (phone.val().length === 6) {
      phone.val(phone.val() + ' ');
    }
    if (phone.val().length === 10) {
      phone.val(phone.val() + ' ');
    }

    if (phone.val().length >= 15) {
      phone.val(phone.val().slice(0, 14));
    }
  }
  // Allow numeric (and tab, backspace, delete) keys only
  return (key == 8 ||
    key == 9 ||
    key == 46 ||
    (key >= 48 && key <= 57) ||
    (key >= 96 && key <= 105));
})
.on('focus', function() {
  phone = $(this);
  if (phone.val().length === 0) {
    phone.val('(');
  } else {
    var val = phone.val();
    phone.val('').val(val); // Ensure cursor remains at the end
  }
})
.on('blur', function() {
  $phone = $(this);
  if ($phone.val() === '(') {
    $phone.val('');
  }
});
function validateEmail(contactEmail) {
var re = /\S+@\S+\.\S+/;
return re.test(contactEmail);
}
function validateForm() {
var cn = document.forms["programForm"]["contactName"].value; var inputValcn = document.getElementById("contactName");
var ct = document.forms["programForm"]["contactTitle"].value; var inputValct = document.getElementById("contactTitle");
var cp = document.forms["programForm"]["contactPhone"].value; var inputValcp = document.getElementById("contactPhone");
var ce = document.forms["programForm"]["contactEmail"].value; var inputValce = document.getElementById("contactEmail");
var ft = document.forms["programForm"]["fullTimeDuration"].value; var inputValft = document.getElementById("fullTimeDuration");
var pt = document.forms["programForm"]["partTimeDuration"].value; var inputValpt = document.getElementById("partTimeDuration");
//ft pt 
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
var checkCp = cp;
substring = "-";
if (cp.indexOf(substring) !== -1){
	alert("Contact Phone must be in the correct format (+1 111 111 1111)");
 	inputValcp.style.border="1px solid red";
  return false;
}
substring = ".";
if (cp.indexOf(substring) !== -1){
	alert("Contact Phone must be in the correct format (+1 111 111 1111)");
 	inputValcp.style.border="1px solid red";
  return false;
}
if (ce == ""){
   alert("Contact Email must be filled out");
   inputValce.style.border="1px solid red";
   return false;
  }
if (ft == ""){
	alert("Please choose a Full Time Duration Option");
	inputValft.style.border="1px solid red";
	return false;
}
if (pt == ""){
	alert("Please choose a Part Time Duration Option");
	inputValpt.style.border="1px solid red";
	return false;
}
var email = $("#contactEmail").val();
if (validateEmail(email) == false)
{
	 alert("Contact Email must be filled out with a valid email");
	 inputValce.style.border="1px solid red";
	 return false;
}

//var fullTime = $("#FullTimeDuration").val();
if (ft.match(/Months/i)){
	}
	else if (ft.match(/Not Available/i)){
	}
	else if (ft.match(/Other/i)){
	}
		else{
		alert("Full Time Duration must be in Months");
		inputValft.style.border="1px solid red";
		return false;
		}
			
if (pt.match(/Months/i)){
}
	else if (pt.match(/Not Available/i)){
	}
	else if (pt.match(/Other/i)){
	}
	else{
		alert("Part Time Duration must be in Months");
		inputValpt.style.border="1px solid red";
		return false;
		}
var pn = document.forms["programForm"]["programName"].value; var inputValpn = document.getElementById("programName");
if (pn == ""){
	alert("Program Name must be filled out");
	inputValpn.style.border="1px solid red";
 return false;
}

var po = document.forms["programForm"]["programObjectives"].value; var inputValpo = document.getElementById("programObjectives");
if (po == ""){
  	alert("Program Objectives must be filled out");
  	inputValpo.style.border="1px solid red";
   return false;
  }
//The code below does not work--needs to be revised
/*var cot = document.forms["programForm"]["courseTitle"].value; var inputValcot = document.getElementById("courseTitle"); 
 if (cot == ""){
	 alert("All Course Titles must be filled out");
	 inputValcot.style.border="1px solid red";
	return false;
 }*/
 //var di = document.forms["programForm"]["disclipline"].value; var inputValdi = document.getElementById("discipline");
 //if (di == ""){
   	//alert("Discipline for all courses must be filled out");
   	//inputValdi.style.border="1px solid red";
   	
    //return false;
   //}
 
//else
//{
//return true;
//} 
SubmissionFunction();
}
function SubmissionFunction() {
	alert("Your data has been submitted for approval.");
}
function addCourse(){
	var table = document.getElementById("currTable");
    var row = table.insertRow(<?php echo $rowCount?>);
    var courseTitle = row.insertCell(0);
    var courseType = row.insertCell(1);
    var courseDisclipline = row.insertCell(2);
    var courseDelete = row.insertCell(3);
    courseTitle.innerHTML ='<input class="form-control" type = "text" name = "courseTitle"/>';
    courseType.innerHTML = '<select class="form-control"><option></option><option>Required</option><option>Elective</option>';
    courseDisclipline.innerHTML = '<select class="form-control"><option></option><option>Information Systems</option><option>Operations Research</option><option>Statistics</option>';
    courseDelete.innerHTML = '<input type = "checkbox"/>';

function validateCourse(){
	
}
}
//function deleteCourse(e){ 
	//var row = e.target.parentNode.parentNode;
	//$(row).children().each(function() {
    //$(this).children('select').each(function() {
        //console.log($(this).val());
        
    //});
   // $(this).children().not('input[type="checkbox"]').attr('disabled', true);
  //});
 
//}
</script>
 
	</form>
<?php if (isset($_POST['submit'])) {
 //Contact Info   
 $contactId = $_POST['ContactId'];
 $contactName = $_POST['ContactName'];
 $contactTitle = $_POST['ContactTitle'];
 $contactPhone = $_POST['ContactPhone'];
 $contactEmail = $_POST['ContactEmail'];
 
 //College Info
 $collegeName =  $_POST['CollegeName'];
 
 //Program Info
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
 $scholarship = $_POST['Scholarship'];
 $estimatedResidentTuition = $_POST['EstimatedResidentTuition'];
 $estimatedNonresidentTuition = $_POST['EstimatedNonresidentTuition'];
 $costPerCredit = $_POST['CostPerCredit'];
 
 //Institution Info
 $institutionId = $_POST['InstitutionId'];
 $institutionName = $_POST['InstitutionName'];
 $institutionAddress = $_POST['InstitutionAddress'];
 $institutionCity = $_POST['InstitutionCity'];
 $institutionState = $_POST['InstitutionState'];
 $institutionZip = $_POST['InstitutionZip'];
 $institutionRegion = $_POST['InstitutionRegion'];
 $institutionPhone = $_POST['InstitutionPhone'];
 $institutionEmail = $_POST['InstitutionEmail'];
 $institutionAccess = $_POST['InstitutionAccess'];
 
 $referenceId = $_POST['ReferenceId'];
 $lastUpdate = $_POST['LastUpdate'];
 $programId = $_POST['ProgramId'];
 
}
?>

</body>
</html>
