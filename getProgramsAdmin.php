<!-- GET PROGRAMS -->
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
		    <label for="c.ContactPhone">Contact Phone</label>
		    <input type="text" class="form-control phone" maxlength="14" id="contactPhone" name="contactPhone" value="<?php echo $modalData['ContactPhone'];?>"/>
		</div>
		<div class="form-group">
		    <label for="c.ContactEmail">Contact Email</label>
		    <input type="text" class="form-control" id="contactEmail" name="contactEmail" value="<?php echo $modalData['ContactEmail'];?>"/>
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
		    <input type="text" class="form-control" id="yearEstablished" name="yearEstablished" value="<?php echo $modalData['YearEstablished'];?>" readonly />
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
		    	<option>None</option>
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
			</select>
		</div>
		<div class="form-group">
		    <label for="p.PartTimeDuration">Part-Time Duration</label>
		    <select class="form-control" id="partTimeDuration" name="partTimeDuration">
			<option value="<?php echo $modalData['PartTimeDuration'];?>"><?php echo $modalData['PartTimeDuration'];?></option>
		    	<option>None</option>
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
        echo '<select class="form-control" > <option value= ""></option>
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
    </div>
   </form>
