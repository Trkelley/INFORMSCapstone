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
echo $_POST['programId'];
echo "<br>";
echo $_POST['programType'];
echo "<br>";
echo $_POST['programAccess'];
echo "<br>";
echo $_POST['programObjectives'];
echo "<br>";
echo $_POST['institutionName'];
echo "<br>";
echo "<br>";
echo $_POST['programName'];
echo "<br>";
echo $_POST['collegeName'];
echo "<br>";
echo $_POST['institutionState'];
echo "<br>";
echo $_POST['institutionZip'];
echo "<br>";
echo $_POST['institutionPhone'];
echo "<br>";
echo $_POST['institutionEmail'];
echo "<br>";
echo $_POST['institutionAccess'];
echo "<br>";
echo $_POST['collegeId'];
echo "<br>";
echo $_POST['collegeName'];
echo "<br>";
echo $_POST['collegeType'];
echo "<br>";


echo "<br>";

/* 
$queryContacts ="INSERT INTO contacts (ContactName, ContactTitle, ContactPhone, ContactEmail, ReferenceId, UpdateType, LastUpdate)
	VALUES ('$_POST[contactName]' ,'$_POST[contactTitle]' , '$_POST[contactPhone]' , '$_POST[contactEmail]', '$_POST[contactId]', 2 , now());";

mysqli_query( $conn , $queryContacts) or die('Did not enter Contact Info');

$queryPrograms = "INSERT INTO programs (ProgramName, ProgramType, DeliveryMethod, ProgramAccess, ProgramObjectives, FullTimeDuration, PartTimeDuration, TestingRequirement, OtherRequirement, Credits, YearEstablished, Scholarship, EstimatedResidentTuition, EstimatedNonResidentTuition, CostPerCredit, ContactId, InstitutionId, ReferenceId, UpdateType, LastUpdate)
    VALUES('$_POST[programName]' , '$_POST[programType]' , '$_POST[deliveryMethod]', '$_POST[programAccess]', '$_POST[programObjectives]', '$_POST[fullTimeDuration]', '$_POST[partTimeDuration]', '$_POST[testingRequirement]', '$_POST[otherRequirement]', '$_POST[credits]', '$_POST[yearEstablished]', '$_POST[scholarship]', '$_POST[estimatedResidentTuition]', '$_POST[estimatedNonresidentTuition]', '$_POST[costPerCredit]', '$_POST[contactId]', '$_POST[institutionId]', '$_POST[programId]', 2 , now());";
    
mysqli_query( $conn, $queryPrograms) or die('Did not enter Program Info');

$queryInstitutions = "INSERT INTO institutions (InstitutionName, InstitutionAddress, InstitutionCity, InstitutionState, InstitutionZip, InstitutionPhone, InstitutionEmail, InstitutionAccess, ReferenceId, UpdateType, LastUpdate)
    VALUES('$_POST[institutionName]' , '$_POST[institutionAddress]' , '$_POST[institutionCity]', '$_POST[institutionState]', '$_POST[institutionZip]', '$_POST[institutionPhone]', '$_POST[institutionEmail]', '$_POST[institutionAccess]',  '$_POST[institutionId]', 2 , now());";

mysqli_query( $conn, $queryInstitutions) or die('Did not enter Institution Info');

$queryColleges = "INSERT INTO colleges ( InstitutionId, CollegeName, CollegeType, ReferenceId, UpdateType, LastUpdate)
    VALUES('$_POST[institutionId]' , '$_POST[collegeName]' , '$_POST[collegeType]', '$_POST[collegeId]', 2 , now());";

mysqli_query( $conn, $queryColleges) or die('Did not enter College Info');
 */
/* $queryCourses = "INSERT INTO courses ( InstructorId, CourseNumber, CourseTitle, DeliveryMethod, HasCapstoneProject, CourseText, SyllabusFile, SyllabusFilesize, AnalyticTag, BusinessTag, ReferenceId, UpdateType, LastUpdate)
    VALUES('$_POST[instructorId]' , '$_POST[courseNumber]' , '$_POST[courseTitle]', '$_POST[deliveryMethod]', '$_POST[hasCapstoneProject]', '$_POST[courseText]', '$_POST[syllabusStyle]', '$_POST[syllabusFileSize]', '$_POST[analyticTag]', '$_POST[businessTag]' , '$_POST[courseId]' 2 , now());";

mysqli_query( $conn, $queryCourses) or die('Did not enter Course Info'); */


//The msql_query should look like this...

//$conn has been left out for testing

header("location:Index.php");
?>




