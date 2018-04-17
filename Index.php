<!-- This file creates the Program Administrator home page. When this file runs, it populates the page with all programs in the INFORMS analytic progams database.
When user authentication is implemented, this page will only display programs for the respective progam adminsitrator.  -->

<!DOCTYPE html>
<html lang="en">
<img class="irc_mi" src="https://www.informs.org/var/ezflow_site/storage/images/media/or-ms-today/images/0217/new-informs-logo2/3648939-1-eng-US/New-INFORMS-logo.jpg" onload="typeof google==='object'&amp;&amp;google.aft&amp;&amp;google.aft(this)" width="350" height="75" alt="Image result for Informs">

    <meta charset="utf-8"></meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Edit Programs</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    html: margin 10% auto;
    a.btnDrop {
     padding: 20px 400px;
    }
    </style>
</head>
<body>

<!--  Log Out Button -->
<div style = "text-align:right; margin-right: 10%;" ><a class="btn btn-small btn-primary">Log Out</a></div>

<!-- Creates the Edit Program Information Modal -->
<div class="modal fade bs-modal-lg custom-modal" id="programModal" tabindex="-1" role="dialog" aria-labelledby="programModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header modal-lg">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="programModalLabel">Edit Program Information</h4>
            </div>
            <div class="dash">
             <!-- Content goes in here -->
            </div>
        </div>
    </div>
</div>
<?php

//Pull in progam information from database to populate table
require('conn.php');
// Display table
$sql = "SELECT a.InstitutionId, b.InstitutionName, a.CollegeName, c.ProgramName, c.ProgramId, c.ReferenceId, c.LastUpdate
        FROM colleges a
             INNER JOIN institutions b 
                   ON a.InstitutionId = b.InstitutionId
             INNER JOIN programs c 
                   ON a.InstitutionId = c.InstitutionId WHERE c.ReferenceId IS NULL";
$result = $conn->query($sql);

?>
<!-- Header -->
<div class="container">
	<div class="row">
        <div class="col-lg-12">
            <p class="text-center" class="page-header"> <font size="5">Hello (Program Administrator Name)! </font></p>
            <p class="text-center" class="page-header"><font size="4"> Below are the programs listed for which you are the Administrator</font></p>
            <p class = "text-center" class="page-header"> <font size="3">  To make edits to an individual program, press the edit button.</font></p>
            
        </div>
    </div>
    <!-- Table columns -->
    <div class="row">
        <div id="Institution" class="col-lg-12">                            
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Status</th>
                    <th>Institution Name</th>
                    <th>College Name</th>
                    <th>Program Name</th>
                    <th>Date Last Updated</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
<?php
//Populate columns
require('conn.php');
// Output data of each row

while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td></td>';
        echo '<td>' .$row['InstitutionName']. '</td>';
        echo '<td>' .$row['CollegeName']. '</td>';
        echo '<td>' .$row['ProgramName']. '</td>';
        echo '<td>' .$row['LastUpdate']. '</td>';
        echo '<td>
                    <a class="btn btn-small btn-primary"
                       data-toggle="modal"
                       data-target="#programModal"
                       data-whatever="'.$row['ProgramId'].' ">Edit</a>
                 </td>';
        echo '<tr>';
}
        $result->close();
 
?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    $('#programModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "getPrograms.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
 </script>
</body>
</html>