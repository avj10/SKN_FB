<?php
  session_start();
  if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST['pass'];
  
  //include db file
  include('includes/db.php');
  if(empty($user) || empty($pass)){
    echo '<script language="javascript">'; 
    echo 'alert("You missed Usename or Password")';
    echo '</script>';
  }
  else{
    $user = strip_tags($user);
    $user = mysqli_real_escape_string($db,$user);
    $pass = strip_tags($pass);
    $pass = mysqli_real_escape_string($db,$pass);
    $pass = md5($pass);
    $query = "SELECT * FROM user WHERE user_name='$user' AND password='$pass'";
    if($result = mysqli_query($db,$query)){
      while($row = mysqli_fetch_object($result)){
        $_SESSION['user_id'] = $row->user_id;
        $_SESSION['username'] = $row->user_name;
      }
      if(isset($_SESSION['user_id'])){
        header('Location: delete_data.php');
        exit();
      }
    }
    else{
      echo '<script language="javascript">'; 
      echo 'alert("You entered wrong Usename or Password")';
      echo '</script>';
    }
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>SKN Feedback</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-top-fixed.css" rel="stylesheet">
  <style type="text/css">
  .bg-dark {
    background-color: #5213b3!important;
}
.btn-lg {
    border-radius: 4rem;
}
body{
  background:#616161;
}
.jumbotron {
    padding: 4rem 2rem;
    margin-bottom: 2rem;
    background-color: #cecece;
    border-radius: .3rem;
}

.form-style-10{
  max-width:750px;
  padding:30px;
  margin:60px auto;
  background: #cecece;
  border-radius: 10px;
  -webkit-border-radius:10px;
  -moz-border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
  -moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
  -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
}
.form-style-10 .inner-wrap{
  padding: 30px;
  background: #F8F8F8;
  border-radius: 6px;
  margin-bottom: 15px;
}
.form-style-10 h1{
  background: #3d0c88;
  padding: 20px 30px 15px 30px;
  margin: -30px -30px 30px -30px;
  border-radius: 10px 10px 0 0;
  -webkit-border-radius: 10px 10px 0 0;
  -moz-border-radius: 10px 10px 0 0;
  color: #fff;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
  font: normal 30px 'Bitter', serif;
  -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
  -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
  box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
  border: 1px solid #257C9E;
}
.form-style-10 h1 > span{
  display: block;
  margin-top: 2px;
  font: 13px Arial, Helvetica, sans-serif;
}
.form-style-10 label{
  display: block;
  font: 13px Arial, Helvetica, sans-serif;
  color: #888;
  margin-bottom: 15px;
}
.form-style-10 input[type="text"],
.form-style-10 input[type="date"],
.form-style-10 input[type="datetime"],
.form-style-10 input[type="email"],
.form-style-10 input[type="number"],
.form-style-10 input[type="search"],
.form-style-10 input[type="time"],
.form-style-10 input[type="url"],
.form-style-10 input[type="password"],
.form-style-10 textarea,
.form-style-10 select {
  display: block;
font-family: Georgia, "Times New Roman", Times, serif;

  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  width: 100%;
  padding: 8px;
  border-radius: 6px;
  -webkit-border-radius:6px;
  -moz-border-radius:6px;
  border: 2px solid #fff;

  color:#607D8B;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
  -moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
  -webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
}

.form-style-10 .section{
  font: normal 20px 'Bitter', serif;
  color: #3d0c88;
  margin-bottom: 5px;
}
.form-style-10 .subject{
  font: normal 15px 'Bitter', serif;
  color: #000000;
  margin-bottom: 5px;
}
.form-style-10 .section span {
  background: #5213b3;
  padding: 5px 10px 5px 10px;
  position: absolute;
  border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border: 4px solid #fff;
  font-size: 14px;
  margin-left: -45px;
  color: #fff;
  margin-top: -3px;
}
.btn-primary {
    color: #fff;
    background-color: #5213b3;
    border-color: #5213b3;
}

.form-style-10 input[type="button"], 
.form-style-10 input[type="submit"]{
  background: #5213b3;
  padding: 8px 20px 8px 20px;
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  color: white;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
  font: normal 30px 'Bitter', serif;
  -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
  -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
  box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
  border: 1px solid #257C9E;
  font-size: 15px;
}
.form-style-10 input[type="button"]:hover, 
.form-style-10 input[type="submit"]:hover{
  background: #5213b3;
  -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
  -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
  box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
}
.form-style-10 .privacy-policy{
  float: right;
  width: 250px;
  font: 12px Arial, Helvetica, sans-serif;
  color: #4D4D4D;
  margin-top: 10px;
  text-align: right;
}
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

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
       <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          
        </ul>
         <a class="nav-item nav-link active" href="ad_home.php">Home <span class="sr-only">(current)</span></a>
         <a class="nav-link" href="login.php">Student Login</a>
      </div>
    </nav>
    <div class="form-style-10">
      <h1>Admin Login</h1>
    <main role="main" class="container">
     <center> <div class="jumbotron col-sm-6">
      <form action="#" method="post">
    <div class="form-group">
        <input type="text" class="form-control" id="usrname" placeholder="Username" name="username" required>
    </div>
    <div class="form-group">      
        <input type="password" class="form-control" id="pwd" placeholder="Password" name="pass" required>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        
      </div>
    </div>
     <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
      </div>
    </div>
    </form>
      </div></center>   
    </main>
  </div>
  </body>
</html>