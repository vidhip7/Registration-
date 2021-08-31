<?php 

  session_start();

  require 'databaseconnect.php';
  require 'functions.php';


  if(isset($_POST['register'])) {

    $username = clean($_POST['username']); 
    $password = clean($_POST['password']); 
    $studentno = clean($_POST['studentno']); 
    $firstname = clean($_POST['firstname']); 
    $lastname = clean($_POST['lastname']); 
    $branch = clean($_POST['branch']); 
    $yrlevel = clean($_POST['yrlevel']); 

    $query = "SELECT count(*) FROM students WHERE username = '$username'";
    if ($result = mysqli_query($con, $query)) {
      if ($row = mysqli_fetch_row($result)) {
        if($row[0] == 0) {
          $query1 = "SELECT count(*) FROM students WHERE studentno = '$studentno'";
          if ($result1 = mysqli_query($con, $query1)) {
            if ($row1 = mysqli_fetch_row($result1)) {
              if($row1[0] == 0) {
    
                $query2 = "INSERT INTO students (username, password, studentno, firstname, lastname, branch, yrlevel, date_joined)
                VALUES ('$username', '$password', '$studentno', '$firstname', '$lastname', '$branch', '$yrlevel', NOW())";
                if (mysqli_query($con, $query2)) {
                  $_SESSION['prompt'] = "Account registered. You can now log in.";
                } else {
                  $_SESSION['errprompt'] = "Something went wrong please contact system administrator";
                }

              } else {
                $_SESSION['errprompt'] = "That student number already exists.";
              }
            }
            mysqli_free_result($result1);
          }
    
        } else {
    
          $_SESSION['errprompt'] = "Username already exists.";
    
        }
      }
      mysqli_free_result($result);
    }

    

  } 

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Register - Student Information System</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    body{
    background-image: url('images/intro.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    height : 100vh; 
    }
  </style>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

  <?php include 'header.php'; ?>

  <section class="center-text">
    
    <strong>Register</strong>

    <div class="registration-form box-center clearfix">

    <?php 
        if(isset($_SESSION['errprompt'])) {
          showError();
        }
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        
        <div class="row">
          <div class="account-info col-sm-6">
          
            <fieldset>
              <legend>Account Info</legend>
              
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username (must be unique)" required>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>

            </fieldset>
            

          </div>

          <div class="personal-info col-sm-6">
            
            <fieldset>
              <legend>Personal Info</legend>
              
              <div class="form-group">
                <label for="studentno">Student Number</label>
                <input type="text" class="form-control" name="studentno" placeholder="Student Number (must be unique)" required>
              </div>

              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
              </div>

              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
              </div>

              <div class="form-group">
                <label for="branch">Branch</label>

                <select class="form-control" name="branch">
                  <option value="it">Information Technology</option>
                  <option value="cse">Computer Engineering</option>
                  <option value="me">Mechanical Engineering</option>
                  <option value="ee">Electrical Engineering</option>
                  <option value="ce">Civil Engineering</option>
                  
                </select>

              </div>

              <div class="form-group">
                <label for="yrlevel">Year Level</label>

                <select class="form-control" name="yrlevel">
                  <option>1st year</option>
                  <option>2nd year</option>
                  <option>3rd year</option>
                  <option>4th year</option>
                </select>

              </div>

            </fieldset>
            

          </div>
        </div>

        
        
        <a href="studentlogin.php">Go back</a>
        <input class="btn btn-primary" type="submit" name="register" value="Register">



      </form>
    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php 

  unset($_SESSION['errprompt']);
  mysqli_close($con);

?>