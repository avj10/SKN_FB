<?php
  session_start();
  //checking user is logged in or not
  if(!isset($_SESSION['user_id'])){
      echo '<script language="javascript">'; 
      echo 'alert("Please LogIn First")';
      echo '</script>';
      header('Location: admin.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="icon" href="favicon.ico">
  <title>SKN Feedback</title>
  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="dist/js/jquery.min.js"></script>
  <script src="dist/js/bootstrap.min.js"></script>
  
    <!-- Custom styles for this template -->
    <link href="css/navbar-top-fixed.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    
    <script type="text/javascript" src="js/main.js"></script>
    <style type="text/css">
       a {
  color: #f8f9fa;
  text-decoration:none;
  background-color: transparent; // Remove the gray background on active links in IE 10.
  -webkit-text-decoration-skip: objects; // Remove gaps in links underline in iOS 8+ and Safari 8+.

  @include hover {
    color: $e9ecef;
    text-decoration: none;
  }
}

    </style>
</head>
<body>
    <div class="gradient_back_img"></div>
  
   <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
         
        </ul>
         <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
         <a class="nav-item nav-link active " href="add_thoe_course.php">Add Details <span class="sr-only"></span></a>
         <a class="nav-item nav-link active" href="add_students.php">Add Students<span class="sr-only"></span></a>
         <a class="nav-item nav-link active" href="delete.php">Delete Records<span class="sr-only"></span></a>
         <a class="nav-item nav-link active" href="report.php">View Results<span class="sr-only"></span></a>
         <a class="nav-link" href="logout.php">Logout</a>
         
      </div>
    </nav>
    <main role="main" class="container">
  <section class="content wrapper">
    <img src="img/logo.jpg"><br><br>
    <h1>WELCOME YOU ALL</h1>
    <p class="description">Smt. Kashibai Navale College of Engineering, Pune.<br></p>
  </section>
  </main>

</body>
</html>