 

<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
.outbox
{
background-color:rgba(0,0,0,0.2);
margin-left:40%;
margin-right:30%;
box-sizing:border-box;
//display:inline-block;
}
input{
    padding: 10px 20px; 
	background-color:white;
	border:none;
    border-bottom: 2px solid grey;
	
}
.in{ padding-left:10%;

}
body{
	background-color:rgba(0,0,0,0.1);
}
input [type=text]{
    

 -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
	}
input[type=submit]{
background-color:#C0C0C0;
color:#FFFFFF;
}
</style>
<link rel="stylesheet" type="text/css" href="reset.css">
<link rel="stylesheet" type="text/css" href="stylehome.css">
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>RoomOnRent</title>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
 
<body>
    <header>
        <div class="wrapper">
		<img src=" ../img/c.png" height="120" width="150" style="float:left"> 
            <h1>RoomOnRent<span class="color">.</span></h1>
            <nav>
				<ul>
					 <li><a href="indexhome.php" class="button">Home</a></li>
					<li><a href="../registration/accomodation_Registration.php" class="button">List Your House</a></li>
					<li><a href="aboutus.php" class="button">About</a></li>
					<li><a href="contactus.php" class="button">Contact Us</a></li>
					<li><a href="../login/login1.php" class="button">LogIn</a></li>
				</ul>
			</nav>
        </div>
    </header>
    
    <div id="hero-imagect">
 <?php
$usernameErr=$emailErr="";
$username=$email=$comment="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(empty($_POST["username"]))
	{
		$usernameErr="Name is required";
	}
	else
	{
		$username=test_input($_POST["username"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed"; 
	  }
	}
	if(empty($_POST["email"]))
	{
		$emailErr="Email is required";
	}
	else{
	$email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
}	
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="outbox">
	<h2>Submit your query..</h2>
	<p><span class="error">* required field.</span></p>
<form method="post" action="contact-email.php">
	<div class="in">
		<b>Your Name</b><br>
		<input type="text" name="username" placeholder="Name" value="<?php echo $username;?>" required> 
		<span class="error">* <?php echo $usernameErr;?></span><br><br>
	</div>
	<div class="in">
		<b>Email</b><br>
		<input type="text" name="email" placeholder="email" value="<?php echo $email;?>" required>
		<span class="error">*<?php echo $emailErr;?></span><br><br>
	</div>
	<div class="in">
		<b>Comment</b><br>

		<textarea name="comment" rows="5" cols="40" placeholder="Ask your question.." required><?php echo $comment;?></textarea><br><br></div>
		<input type="submit" name="submit" value="submit"> 
	</div>
</form>
 </div>
    <footer>
        <div class="wrapper">
            <div id="footer-info">
				<p>Copyright 2018 RoomOnRent. All rights reserved.</p>
				<p><a href="#">Terms of Service</a> I <a href="#">Privacy</a></p>
			</div>
            <div id="footer-links">
                <ul>
					<li><h4>RoomOnRent</h4><br></li>
					<li><h5><a href="aboutus.html">About Us</h5></li>
					<li><h5><a href="#">Blogs<h5></li>
					<li><h5><a href="#">FAQs<h5></li>
				</ul>
            </div>
        </div>
    </footer>
    
</body>
</html>