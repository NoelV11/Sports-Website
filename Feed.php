<?php
$insert = false;
if(isset($_POST['email'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    $sql = "INSERT INTO `feedback`.`feed` (`email`, `feedback`) VALUES ('$email', '$feedback');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
        //header("Location: Feedback.html");
        
        
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
    body{
        background: url("log5.jpg") no-repeat center center fixed;
        background-size: 100% 100%;
    }
    form{
		margin-top: 10%;
		margin-left: 10%;
		margin-right: 10%;
		margin-bottom: 10%;
		padding: 5%;
		padding-bottom: 2%;
		padding-left: 16%;
		border: 1px solid grey;
        border-radius: 50%;
		background: currentcolor;
		opacity: 0.85;
	}

    .button{
    	background-color: #4CAF50;
	    border: none;
	    color: white;
	    padding: 15px 32px;
	    text-align: center;
	    text-decoration: none;
	    display: inline-block;
	    font-size: 16px;
	    margin: 4px 2px;
	    cursor: pointer;
    }
    
    .button:hover{
        background: darkslateblue;
        color: white;
    }

    input:focus{
    	background-color: darkslateblue;
    	font-size: 130%;
        color: white;
    }

    textarea:focus{
    	background-color: darkslateblue;
    	font-size: 175%;
        color: white;
    }

    p{
    	font-size: 150%;
        color: white;
        text-align: center;
        margin-right: 15%;
    }
    
    h1{
            text-align: center;
            position: relative;
            top: 32px;
            background: white;
            opacity: 0.85;
        }
        main{
            margin-top: 15%;
            margin-bottom: 15%;
        }
        
        .navbar {
  overflow: hidden;
  background-color: black;
  opacity: 0.85;
}

.navbar a {
  float: left;
  font-size: 21px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
    
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 21px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}
        


.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: aliceblue;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<script type="text/javascript">
function validate_email(field,alerttxt)
{
with (field)
{
apos=value.indexOf("@");
dotpos=value.lastIndexOf(".");
if (apos<1||dotpos-apos<2)
{
alert(alerttxt);
return false;
}
else
{
return true;
}
}
}
function validate_form(thisform)
{
with (thisform)
{
if (validate_email(email,"Not a valid e-mail address!")==false)
{
email.focus();
return false;
}
}
}
</script>
</head>
<body>
<header>
        <h1 style="font-family: fantasy; font-size: 300%;">Sports Website</h1>
        
        <div class="navbar">
        
  <a href="Home.html" style="margin-left: 30%;">Home</a>
  <a href="Feedback.html">Feedback</a>
            
  <div class="dropdown">
    <button class="dropbtn">Cricket
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="CHome.html">Home</a>
      <a href="CFoundations.html">Foundations</a>
      <a href="CLive.html">Live Scores</a>
      <a href="CGreats.html">Greats</a>
    </div>
            </div>  
     
            <div class="dropdown">
    <button class="dropbtn">Basketball
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="BHome.html">Home</a>
      <a href="BFoundations.html">Foundations</a>
      <a href="BLive.html">Live Scores</a>
      <a href="BGreats.html">Greats</a>
    </div>
            </div>
     
            <div class="dropdown">
    <button class="dropbtn">Soccer
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="SHome.html">Home</a>
      <a href="SFoundations.html">Foundations</a>
      <a href="SLive.html">Live Scores</a>
      <a href="SGreats.html">Greats</a>
    </div>
            </div>
            
            
    <div class="dropdown">  
    <button class="dropbtn">Tennis
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="THome.html">Home</a>
      <a href="TFoundations.html">Foundations</a>
      <a href="TLive.html">Live Scores</a>
      <a href="TGreats.html">Greats</a>
    </div>  
  </div> 
</div>
    </header>    
 <main>   
<form action="Feed.php" onsubmit="return validate_form(this);" method="post">
<p><b>Email</b></p> 
<br>
<input type="text" name="email" style="width: 85%; height: 3vh;">
<br><br><br>
<p style="margin-right: 14%;"><b>Feedback</b></p> 
<br>
<input type="text" name="feedback" style="width: 50vw; height: 20vh;" required>
<br><br><br>
<input class="button" type="submit" value="Submit Feedback" style="margin-left: 31%; margin-right: 10%; margin-top: 3%; margin-bottom: 1%;">
</form>
     
<div class="result" style="border: 2px solid grey; background-color: white; opacity: 0.85; color:black; position: relative; top: -800px; text-align: center; margin-left:30%; margin-right:30%; font-size: 200%;">
        <?php

        if($insert == true)
            {
                echo " <div class='righ'>Thank you for providing the feedback.</div>";
                //header("Location: Feedback.html");
            }
        ?>  
</div>    
    
</main>
    
<footer>
    <footer>
        
        
        <div class="navbar">
        
  <a href="Home.html" style="margin-left: 25%;">Home</a>
  <a href="Feedback.html">Feedback</a>
  <a href="CHome.html">Cricket Hub</a>
  <a href="BHome.html">Basketball Hub</a>            
  <a href="SHome.html">Soccer Hub</a>
  <a href="THome.html">Tennis Hub</a>            
  
</div>
        
        <h1 style="font-family: fantasy; font-size: 300%; top: -30px;">Sports Website</h1>
        
        
    </footer>
</footer>    
</body>
</html>