


<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style_a.css">
    <link href="https://fonts.googleapis.com/css2?family=Flamenco&display=swap" rel="stylesheet">
    <?php include 'links.php' ?>

    <style>
    body {
        font-family: "Flamenco", cursive;
    }
</style>
</head>
<body>

<header>
       <div class="container center-div shadow ">
           <div class="heading text-center mb-5  text-uppercase "> ADMIN LOGIN PAGE </div>
           <div class="container row  d-flex flex-row justify-content-center mb-5 ">
               <div class="admin-form shadow p-2 " >
                    <form action="logincheck.php" method="POST">
                        <div  class="form-group">
                           <label>Email ID </label>
                           <input type="text" name="user" value="" class="form-control" autocomplete="off" >
                        </div>
                        <div  class="form-group">
                           <label>Password </label>
                           <input type="password" name="pass" value="" class="form-control" autocomplete="off" >
                        </div>
                        <input type="submit" class="btn btn-success" name="submit">
                    </form>        
               </div>
           </div>
       </div>
</header>

</body>
</html>

