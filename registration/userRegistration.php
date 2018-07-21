<html>

<head>
    <?php include('user_server.php'); ?>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <div class="header">
        <h2>Registration</h2>
    </div>
    <div class="loginbox">

        <form action="userRegistration.php" method="post">
            <!-- for shoe error -->
            <?php if(isset($msg)):  ?>
            <div class="error">
                <?php 
            if(isset($msg)){
                echo $msg;
            }
         
              ?>
            </div>
            <?php endif; ?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="name" placeholder="username" required>
            </div>
            <div class="input-group">
                <label>Aadhar NO</label>
                <input type="text" name="aadharno" placeholder="dddd dddd dddd" required>
            </div>
            <div class="inout-group">
                <label>Gender</label>
                <input type="radio" name="gender" value="M" checked> Male
                <input type="radio" name="gender" value="F"> Female
                <input type="radio" name="gender" value="other"> Other
            </div>
            <div class="input-group">
                <label>City</label>
                <input type="text" name="city" placeholder="city" required>
            </div>
            <div class="input-group">
                <label>State</label>
                <input type="text" name="state" placeholder="state" required>
            </div>
            <div class="input-group">
                <label>Pin Code</label>
                <input type="number" name="pincode" placeholder="pincode" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password1" placeholder="password" required>
            </div>
            <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="password2" placeholder="confirm password" required>
            </div>
            <div class="input-group">
                <button type="submit" name="register" class="btn"> Register</button>
                <button type="reset" name="reset" class="btn">Reset</button>
                <a href="../login/login1.php"><button type="button" name="login" class="btn" >Login</button></a>


            </div>
            <div style="color:green;">
                <?php 
            if(isset($s_msg)){
                echo $s_msg;
            }
         
         ?>

            </div>

        </form>
    </div>
</body>

</html>
