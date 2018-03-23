<!DOCTYPE html>
<html lang="en">
<img class="irc_mi" src="https://www.informs.org/var/ezflow_site/storage/images/media/or-ms-today/images/0217/new-informs-logo2/3648939-1-eng-US/New-INFORMS-logo.jpg" onload="typeof google==='object'&amp;&amp;google.aft&amp;&amp;google.aft(this)" width="350" height="75" alt="Image result for Informs">

    <meta charset="utf-8"></meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title></title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    html: margin 10% auto;
    a.btnDrop {
     padding: 20px 400px;
    }
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
padding: 12px 20px;
margin: 8px 0;
width: 72%;
}

</style>
</head>
<body>

<!-- Sign Up Button -->
<div style="text-align:right; margin-right: 10%;"><a class="btn btn-small btn-primary">Sign Up</a></div>;

<h1 class="text-center" class="page-header" id="loginModalLabel">University Administrator Login</h1>
  
  <form method="post" action="authenticate.php" id="loginForm" onsubmit="return validate()">
  
  <!-- Login Modal -->
  	<div class="custom-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-lg">
			<div class="model-content modal-lg">
				<div class="modal-header modal-lg">
					<label for="email"><b>Email Address</b></label>
					<input class="form-control" type="text" placeholder="Enter E-mail Address" id="email" name="email" required>
					
					<label for="psw"><b>Password</b></label>
					<input class="form-control" type="password" placeholder="Enter Password" id="psw" name="psw" required>
					<p></p>
					
					<div class="container">
					<button class="btn btn-small btn-primary" type="submit" onclick="validate()">Login</button>
					
					<button class="btn btn-small btn-primary" type="button">Forgot Password</button>
					</div>
				</div>
			</div>  	
  		</div>
  	</div>
  </form>
  
  <script>

  function validateEmail(email) {
	  var re = /\S+@\S+\.\S+/;
	  return re.test(email);
	  }

	function validate(){
		var em = document.forms["loginForm"]["email"].value; var inputValem = document.getElementById("email");
		var pw = document.forms["loginForm"]["psw"].value; var inputValpw = document.getElementById("psw");

		if (em == ""){
			alert("You must provide your email address.");
			inputValem.style.border = "1px solid red";
			return false;
		}

		if (pw == ""){
			alert("You must provide your password.");
			inputValpw.style.border = "1px solid red";
			return false;
		}

		var email = $("#email").val();
		if (validateEmail(email) == false)
		{
			 alert("Contact Email must be filled out with a valid email");
			 inputValem.style.border="1px solid red";
			 return false;
		}

		
	}
		
  </script>
  
</body>
</html>