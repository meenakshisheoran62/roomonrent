<html>

<head>
    <?php 
    session_start();
 
  if($_SESSION['user']){
   // echo "hello ".$_SESSION['user'];
       
  }
  else{
      header('location:../login/login1.php' );
  }
    include('acco_server.php'); ?>
    <title>Accomodation Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>
    <div class="header" class>
        <h2>Registration</h2>
    </div>
    <div class="loginbox">

        <form action="accomodation_Registration.php" method="post">
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
                <label>PG ID</label>
                <input type="text" name="pgid" placeholder=" PG's  ID" required>
            </div>
            <div class="input-group">
                <label>Aadhar No</label>
                <input type="text" name="ownerid" placeholder=" dddd dddd dddd" required>
            </div>
            <div class="input-group">
                <label>PG Name</label>
                <input type="text" name="pgname" placeholder=" PG Name" required>
            </div>
            <div class="input-group">
                <label>Location</label>
                <input type="text" name="location" placeholder=" Location" required>
            </div>
            <div class="input-group">
                <label>City</label>
                <input type="text" name="city" placeholder=" City" required>
            </div>


            <div class="input-group">
                <label>Pin code</label>
                <input type="number" name="pincode" placeholder=" PIN CODE" required>
            </div>
            <div class="inout-group">
                <label>Room Type</label>
                <input type="radio" name="roomtype" value="SHARED" checked>Shared
                <input type="radio" name="roomtype" value="SINGLE">Single
            </div><br>
            <div class="inout-group">
                <label>Tenant Pref</label>
                <input type="radio" name="tanantpref" value="FEMALE" checked>Female
                <input type="radio" name="tanantpref" value="MALE">Male
                <input type="radio" name="tanantpref" value="FAMILY">Family
            </div>
            <br>
            <div class="input-group">
                <label>Rent</label>
                <input type="number" name="rent" placeholder="RENT" required>
            </div>

            <div class="inout-group">
                <label>Food servies</label>
                <input type="radio" name="foodserives" value="YES" checked>Yes
                <input type="radio" name="foodserives" value="NO">No
            </div>
            <br>
            <div class="inout-group">
                <label>Furnished Type</label>
                <input type="radio" name="furnished" value="SEMI-FURNISHED" checked>Semi-furnised
                <input type="radio" name="furnished" value="FURNISHED">Furnished
                <input type="radio" name="furnished" value="NOT-FURNISHED">Not-furnished
            </div><br>
            <div class="input-group">
                <button type="submit" name="register" class="btn"> Register</button>
                <button type="reset" name="reset" class="btn">Reset</button>
                <a href="../meena/indexhome.html">
                <button type="button" class="btn">
                 Home</button></a>

            </div>

            <p style="color:green;">
                <?php 
            if(isset($s_msg)){
                echo $s_msg;
            }
         
         ?>

            </p>
        </form>
    </div>
</body>

</html>
