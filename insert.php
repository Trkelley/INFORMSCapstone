<?php

session_start();

require('conn.php');

//displays information if the values are passed through without sending to the database
$contactName = $_POST['contactName'];
$contactTitle = $_POST['contactTitle'];
$contactPhone = $_POST['contactPhone'];
$contactEmail = $_POST['contactEmail'];
$programId = $_POST['programId'];
$programType = $_POST['programType'];
$programAccess = $_POST['programAccess'];
$programObjectives = $_POST['programObjectives'];
$institutionName = $_POST['institutionName'];
$institutionId = $_POST['institutionId'];
$contactId = $_POST['contactId'];
$programName = $_POST['programName'];
$collegeName = $_POST['collegeName'];
$institutionState = $_POST['institutionState'];
$deliveryMethod = $_POST['deliveryMethod'];
$fullTimeDuration = $_POST['fullTimeDuration'];
$partTimeDuration = $_POST['partTimeDuration'];
$testingRequirement = $_POST['testingRequirement'];
$otherRequirement = $_POST['otherRequirement'];
$_OtherRequirement = mysqli_real_escape_string($conn, $otherRequirement);
$credits = $_POST['credits'];
$yearEstablished = $_POST['yearEstablished'];
$scholarship = $_POST['scholarship'];
$estimatedResidentTuition = $_POST['estimatedResidentTuition'];
$estimatedNonresidentTuition = $_POST['estimatedNonresidentTuition'];
$costPerCredit = $_POST['costPerCredit'];

/*Session Variables*/
$courseIdList = $_SESSION['courseIdList'];
$instructorIdList = $_SESSION['instructorIdList']; //empty
$courseNumberList = $_SESSION['courseNumberList'];
$deliveryMethodList = $_SESSION['deliveryMethodList'];
$hasCapstoneProjectList = $_SESSION['hasCapstoneProjectList']; //empty
$courseTextList = $_SESSION['courseTextList']; //empty
$syllabusFileList = $_SESSION['syllabusFileList']; //empty
$syllabusFilesizeList = $_SESSION['syllabusFilesizeList']; //empty
$analyticTagList = $_SESSION['analyticTagList']; //Full of zeroes
$businessTagList = $_SESSION['businessTagList']; //empty
$date = date('m/d/Y');
$courseTitleList = $_POST['courseTitle'];
$requirementList = $_POST['requirementType'];
$disciplineList = $_POST['courseDiscipline'];
if(isset($_POST['deleteCourseBx']))
{
$deleteCourseAction = $_POST['deleteCourseBx'];
}
else{
    $deleteCourseAction = range(0,100,1);
}
/* Inserting program information */
    
    $insertCollege = "
    INSERT INTO colleges (InstitutionId, CollegeName, CollegeType, ReferenceId, UpdateType, LastUpdate)
    VALUES($_POST[institutionId] , '$_POST[collegeName]' , '$_POST[collegeType]', $_POST[collegeId], 2 , now());";

    mysqli_query( $conn, $insertCollege) or die('Did not enter college Info');
    
    $insertContact = "
    INSERT INTO contacts(ContactName, ContactTitle, ContactPhone, ContactEmail, ReferenceId, UpdateType, LastUpdate) 
    VALUES('$contactName', '$contactTitle', '$contactPhone', '$contactEmail', $contactId, 2, now());";
    
    mysqli_query( $conn, $insertContact) or die('Did not enter contact Info'); 
    
$number = 2;
$insertProgram = 'INSERT INTO programs(InstitutionId, ContactId, ProgramName, ProgramType, DeliveryMethod, ProgramAccess, ProgramObjectives, FullTimeDuration,
    PartTimeDuration, TestingRequirement, OtherRequirement, YearEstablished, ReferenceId, UpdateType, LastUpdate)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,now())';
    if($query = $conn->prepare($insertProgram))
    {
        $query->bind_param("iisssssssssiii", $institutionId, $contactId, $programName, $programType, $deliveryMethod, $programAccess, $programObjectives, $fullTimeDuration,
            $partTimeDuration, $testingRequirement,$otherRequirement, $yearEstablished, $programId, $number);
        $query->execute();
        $query->close();
    }
    else{
        $error = $conn->errno . ' ' . $conn->error;
        echo $error; 
    } 
   
/* $x  = 0;
$rowCount = $_POST['rowCount'];
for ($i = 0; $i <= $rowCount; $i ++)
{
    if (!isset($deleteCourseAction[$i]))
        $deleteCourseAction[$i] = 0;
}
 while ($x <= $rowCount){
     if($deleteCourseAction[$x] == "on")
     {
         $deleteCourseAction[$x] = 3;
     }
     else{
         $deleteCourseAction[$x] = 2;
     }
     $initialRowCount = count($courseIdList);
     if($x >= $initialRowCount){
         $deleteCourseAction[$x] = 1;
         $insertNewCourse = "
             INSERT INTO courses (CourseTitle, DeliveryMethod, UpdateType, LastUpdate)
             VALUES('$courseTitleList[$x]', '$deliveryMethodList[$x]', 1 , now());";
            
         mysqli_query( $conn, $insertNewCourse) or die(mysqli_error($conn));
          
         /*A major concern with the line of SQL below, is the lack of unique parameters available to condense our search to one result.
          * Since we are only gathering CourseTitle as the only new field in the course portion of the Modal, this code can break if multiple new courses exist
          * that share the same CourseTitle. A suggestion would be to gather CourseNumbers to decrease the chance of multiple results
         $addedCourseId = "SELECT courseId FROM courses WHERE UpdateType = 1 and CourseTitle = $courseTitleList[$x];";
           
         $insertProgram_courses = " INSERT INTO program_courses(ProgramId, CourseId, Concentration, RequirementType, UpdateType, LastUpdate, ReferenceId)
             VALUES('$programId', '$courseIdList[$x]','$disciplineList[$x]','$requirementList[$x]', $deleteCourseAction[$x] , now(), '$courseIdList[$x]');";

         mysqli_query( $conn, $insertProgram_courses) or die('Did not add program_courses Info');
         $x++;
     }
     else{
     $insertProgram_Courses = "
     INSERT INTO program_courses(ProgramId, Concentration, RequirementType, UpdateType, LastUpdate, ReferenceId)
     VALUES('$programId','$disciplineList[$x]','$requirementList[$x]', $deleteCourseAction[$x] , now(), $courseIdList[$x]);";
     mysqli_query( $conn, $insertProgram_Courses) or die(mysqli_error($conn));
    
     $insertCourses = "INSERT INTO courses ( InstructorId, CourseNumber, CourseTitle, DeliveryMethod, CourseText, SyllabusFile, SyllabusFilesize, 
     AnalyticTag, BusinessTag, ReferenceId, UpdateType, LastUpdate)
     VALUES('$instructorIdList[$x]' , '$courseNumberList[$x]' , '$courseTitleList[$x]', '$deliveryMethodList[$x]', 
     '$courseTextList[$x]', '$syllabusFileList[$x]', '$syllabusFilesizeList[$x]', '$analyticTagList[$x]', '$businessTagList[$x]' , '$courseIdList[$x]', 2 , now());";
         
     mysqli_query( $conn, $insertCourses) or die(mysqli_error($conn)); 
     $x++;
     }
 } 

header("location:Index.php"); */
?>




