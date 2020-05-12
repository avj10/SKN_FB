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
include('includes/db.php');
$Teacher = $_POST['teacher'];

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
body{
  background:#616161;
}
.jumbotron {
    padding: 4rem 2rem;
    margin-bottom: 2rem;
    background-color: #cecece;
    border-radius: .3rem;
}
.btn-lg {
    border-radius: 4rem;
}
.form-style-10{
  max-width:950px;
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
         <a class="nav-link" href="logout.php">Logout</a>
      </div>
    </nav>
    <div class="form-style-10">
      <h1>Download feedback for theory</h1>
    <main role="main" class="container">
      <center><div class="jumbotron">
        <h2><?php echo $Teacher?></h2>
        <br>
        <table cellpadding="15" cellspacing="10">
          <tr>
          <th>
            <div class="form-group">
              Subject
            </div>
          </th>
          <th>
            <div class="form-group">
              Year
            </div>
          </th>
           <th>
            <div class="form-group">
              Division
            </div>
          </th>
           <th>
            <div class="form-group">
              Semester
            </div>
          </th>
          <th>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-18">
                Download
              </div>
            </div>
             </form>
          </th>
          </tr>
          <?php
             $query = "SELECT T_Name,T_Course_Name,t.T_Course_Code, T_Year, T_Semester, T_division from teacher_theory t,theory_course th where T_Name='$Teacher' and th.T_Course_Code=t.T_Course_Code";
    if($result = mysqli_query($db,$query)){
      while($row = mysqli_fetch_object($result)){
       
          ?>
             <tr>
          <th>
            <form action="CreateTheoryPDF111.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="hidden" name="c_name" value="<?php echo $row->T_Course_Name;?>">
               <input type="hidden" name="t_name" value="<?php echo $Teacher;?>">

              <input type="hidden" name="c_code" value="<?php echo $row->T_Course_Code;?>">
              <?php echo $row->T_Course_Name;?>
            </div>
          </th>
          <th>
            <div class="form-group">
              <input type="hidden" name="year" value="<?php echo $row->T_Year;?>">
              <?php echo $row->T_Year;?>
            </div>
          </th>
           <th>
            <div class="form-group">
              <input type="hidden" name="div" value="<?php echo $row->T_division;?>">
              <?php echo $row->T_division;?>
            </div>
          </th>
           <th>
            <div class="form-group">
              <input type="hidden" name="sem" value="<?php echo $row->T_Semester;?>">
              <?php echo $row->T_Semester;?>
            </div>
          </th>
          <th>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-18">
                <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Download</button>
              </div>
            </div>
             </form>
          </th>
          </tr>
          <?php }
        }
          ?>
        </table>

      </div></center>
    </main>
  </div>
  </body>
</html>