<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Youvatsava</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Fira+Mono|Montserrat:800'>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Raleway:wght@100;300&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
</head>
<body>
  <section class="header">
    <nav>
      <a href="../index.html"><img class="logo"src="images/Logo New for Header.png"></a>
      <div class="links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a href="../index.html">HOME</a></li>
          <li><a href="#">EVENT SCHEDULE</a></li>
          <li><a href="../event summary/event_summary.html">EVENT SUMMARY</a></li>
          <li><a href="">DETAILED RULES</a></li>
          <li><a href="../general instructions/general.html">GENERAL INSTRUCTIONS</a></li>
          <li><a href="">ORGANISING COMMITEE</a></li>
          <li><a href="../Register/register.php">LOGIN</a></li>
          <li><a href="../Register/register.html">REGISTER</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
</section>
<h2> fill with content for Registration page</h2>

<div class="container">
  <div class="title">Registration</div>
  <div class="content">
    <form action="/youvatsava/Register/register.php" method="post">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Full Name</span>
          <input type="text" placeholder="Enter your name" name="name" id="name" required>
        </div>
        <div class="input-box">
          <span class="details">Phone Number</span>
          <input type="tel" placeholder="Enter your number" name="phone" id="phone" required>
        </div>
        <!-- <div class="input-box">
          <span class="details">Insert OTP</span>
          <input type="tel" placeholder="Enter your number" name="otp" id="otp" required>
        </div> -->
        <div class="input-box">
          <label for="dob">D.O.B</label>
          <input type="date" placeholder="Enter your D.O.B" name="dob" id="dob" required>
        </div>
        <div class="input-box">
          <span class="details">USN</span>
          <input type="text" placeholder="Enter your USN" name="USN" id="USN" required>
        </div>
        <div class="input-box">
          <span class="details">Email</span>
          <input type="email" placeholder="Enter your email" name="email" id="email" required>
        </div>
        <div class="input-box">
        <label>Choose your college
  <input class="details" placeholder="college" list="c_name" name="c_name" /></label>
  <datalist id="c_name">
    <option value="Nagarjuna college of engineering and technology">
    <option value="New Horizon College of Engineering">
    <option value="Nitte Meenakshi Institute of Technology">
    <option value="Dayananda Sagar College of Engineering">
    <option value="Dr. Ambedkar Institute Of Technology">
    <option value="MVJ College of Engineering">
    <option value="AMC Engineering College">
    <option value="JAIN, Faculty of Engineering and Technology">
    <option value="JSS Academy Of Technical Education">
    <option value="Sapthagiri College of Engineering, Bengaluru.">
  </datalist> 
</div>
        
        <div class="input-box">
          <span class="details">Event</span>
          <input type="text" placeholder="Enter your event" name="event" id="event" required>
        </div>
        <div class="input-box">
          <span class="details">Password</span>
          <input type="password" placeholder="Enter your password" name="pass" id="pass" required>
        </div>
        <div class="input-box">
          <span class="details">Confirm Password</span>
          <input type="password" placeholder="Confirm your password" name="c_pass" id="c_pass" required>
        </div>
      </div>
      <div class="gender-details">
        <input type="radio" name="gender" value="m" id="dot-1">
        <input type="radio" name="gender" value="f" id="dot-2">
        <input type="radio" name="gender" value="o" id="dot-3">
        <span class="gender-title">Gender</span>
        <div class="category">
          <label for="dot-1">
          <span class="dot one"></span>
          <span class="gender">Male</span>
        </label>
        <label for="dot-2">
          <span class="dot two"></span>
          <span class="gender">Female</span>
        </label>
        <label for="dot-3">
          <span class="dot three"></span>
          <span class="gender">Prefer not to say</span>
          </label>
        </div>
      </div>
      <div class="button">
        <input type="submit" value="Register">
      </div>
    </form>
  </div>
</div>
<script src="footer.js"></script>
<script  src="./script.js"></script>
<script>
  var navLinks = document.getElementById("navLinks");
  function showMenu(){
    navLinks.style.right = "0";
  }
  function hideMenu(){
    navLinks.style.right = "-200px";
  }
</script>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $c_name = $_POST['c_name'];
        $event = $_POST['event'];
        $pass = $_POST['pass'];
        $c_pass = $_POST['c_pass'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $USN = $_POST['USN'];
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "you";
      $conn = mysqli_connect($servername, $username, $password, $database);
      $p= "select * from register where USN = '$USN'";
      $result2 = mysqli_query($conn, $p);
      $num1=mysqli_num_rows($result2);
      $otp = rand(1000,9999);
      
	$api_key = '9b16216d-9697-11ed-9158-0200cd936042';
	$req = "https://2factor.in/API/V1/".$api_key."/SMS/".$phone."/".$otp;
	$sms = file_get_contents($req);
	$sms_status = json_decode($sms, true);
	if($sms_status['Status'] !== 'Success') {
		$err['error'] = 'Could not send OTP to '.$phone;
	}
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      
      elseif($pass!=$c_pass){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Password dosent match </div>';
      }

      elseif($num1 == 1){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> THIS USN HAS ALREADY BEEN REGISTERED </div>';
      }
      else{ 
        $hashed = hash('sha512', $pass);
        $c_hashed = hash('sha512', $c_pass);
        $sql = "INSERT INTO `register` (`name`, `c_name`, `email`, `phone`, `pass`, `c_pass`, `gender`, `event`, `USN`, `dob`) VALUES ('$name', '$c_name', '$email', '$phone', '$hashed', '$c_hashed', '$gender', '$event', '$USN', '$dob');";
        $result = mysqli_query($conn, $sql);
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        
      }

    } 
?>
</body>
</html>