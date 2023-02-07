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
          <li><a href="http://localhost/youvatsava/Register/register.php">REGISTER</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
</section>
<h2> fill with content for login page</h2>

  <div class="container">
    <div class="title">Login</div>
    <div class="content">
      <form action="/youvatsava/Register/login.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">USN</span>
            <input type="text" placeholder="Enter your username" name="user_log" id="user_log" required>
          </div>  
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="pass_log" id="pass_log" required>
          </div>
        </div>
       
        <div class="button">
          <input type="submit" value="login">
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
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "you";
      $conn = mysqli_connect($servername, $username, $password, $database);
      
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      if (isset($_POST['user_log']) && isset($_POST['pass_log'])) 
      {
        function validate($data){   
           $data = trim($data);   
           $data = stripslashes($data);    
           $data = htmlspecialchars($data);
           return $data;   
        }    
        $user_log = validate($_POST['user_log']);  
        $pass_log = validate($_POST['pass_log']);  
        if (empty($user_log)) { 
            header("Location: index.php?error=User Name is required");  
            exit();   
        }else if(empty($pass_log)){
    
            header("Location: index.php?error=Password is required");
    
            exit();
    
        }else{
          $hashed = hash('sha512', $pass_log);
            $sql = "SELECT * FROM register WHERE USN='$user_log' AND pass='$hashed'";

     
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) === 1) {
    
                $row = mysqli_fetch_assoc($result);
    
                if ($row['USN'] === $user_log && $row['pass'] === $hashed) {
    
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong> LOGGED IN </strong></div>';
                    exit();
                }
                
            }
        }
    }
?>
</body>
</html>