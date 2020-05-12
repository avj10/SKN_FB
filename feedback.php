<?php
  session_start();
include('includes/db.php');
  //checking user is logged in or not
  if(!isset($_SESSION['roll'])){
      echo '<script language="javascript">'; 
      echo 'alert("Please LogIn First")';
      echo '</script>';
      header('Location: login.php');
    exit();
  }
  else{
      $roll = $_SESSION['roll'];
      $year=$_SESSION['year'];
      $roll = mysqli_real_escape_string($db,$roll);
      $query = "SELECT * FROM students WHERE roll_no='$roll' and year='$year'";
      if($result = mysqli_query($db,$query)){
        while($row = mysqli_fetch_object($result)){
          if($row->theory==1){
          header('Location: pract.php');
        }
      else{
          $_SESSION['roll'] = $row->roll_no;
          $_SESSION['year'] = $row->year;
        }
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
.btn-indigo {
    color: #fff;
    background-color: #5213b3;
    border-color: #5213b3;
}

.form-style-10{
  max-width:1250px;
  padding:30px;
  margin:5px auto;
  background: #FFF;
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
.form-style-10 input[type="file"],
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
.form-style-10 input[type="button"], 
.form-style-10 input[type="submit"]{
  background: #2A88AD;
  padding: 8px 20px 8px 20px;
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  color: #fff;
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
  background: #2A6881;
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

</style>
  </head>
  <body>
    <div class="form-style-10">
      <h1>Give your precious feedback now!<span>Tell us what you think !</span></h1>
      <form class="form-horizontal" action="pract.php" method="post">
    <main role="main" class="container">
     
<?php  
include "includes/db.php";
$roll=$_SESSION['roll'];
$year=$_SESSION['year'];
$query=mysqli_query($db,"SELECT * from student");
$query1=mysqli_query($db,"SELECT T_Name,T_Course_Name,t.T_Course_Code from teacher_theory t,students s,theory_course th where s.division=t.T_division and s.semester=t.T_Semester and s.roll_no='$roll' and s.year='$year' and th.T_Course_Code=t.T_Course_Code");

  
  $cnt_f = 0; $i=5;
  while ($row1=mysqli_fetch_object($query1)){
   
    $i=$i-1;
    $cnt_f = $cnt_f + 1;
$code=$row1->T_Course_Code;

?>

        <div class="jumbotron">
      <table cellpadding="15" cellspacing="20"><tr>
      <div class="section"><h4><span><?php echo $cnt_f?></span> <?php echo $row1->T_Course_Name;?> -- <?php echo $row1->T_Name;?></h4></div>
      <div class="form-group col-sm-14">
        <div class="col-sm-10"> 
          <tr>
            <td><label class="subject" for="sel1"><h5>Voice</h5></label></td>

            <td> <select class="form-control" id="sel1" required name="<?php echo $code."1"?>">
            <option value="" style="display: none"></option>
        <option value="5">Excellent</option>
        <option value="4">Good</option>
        <option value="3">Satisfactory</option>
<option value="2">Need Improvements</option>
        <option value="1">Poor</option>
          </select> </td>
          <td><label class="subject" for="sel1"><h5>Preparation</h5></label></td>

            <td> <select class="form-control" id="sel1" required  name="<?php echo $code."2"?>">
            <option value="" style="display: none"></option>
        <option value="5">Excellent</option>
        <option value="4">Good</option>
        <option value="3">Satisfactory</option>
<option value="2">Need Improvements</option>
        <option value="1">Poor</option>
          </select></td><td><label class="subject" for="sel1"><h5>Explanation</h5></label></td>

            <td> <select class="form-control" id="sel1" required  name="<?php echo $code."3"?>">
            <option value="" style="display: none"></option>
        <option value="5">Excellent</option>
        <option value="4">Good</option>
        <option value="3">Satisfactory</option>
<option value="2">Need Improvements</option>
        <option value="1">Poor</option>
          </select></td>
          </tr>
            <tr>
            <td><label class="subject" for="sel1"><h5>Presentation</h5></label></td>
  
            <td> <select class="form-control" id="sel1" required  name="<?php echo $code."4"?>">
            <option value="" style="display: none"></option>
        <option value="5">Excellent</option>
        <option value="4">Good</option>
        <option value="3">Satisfactory</option>
<option value="2">Need Improvements</option>
        <option value="1">Poor</option>
          </select></td>
           <td><label class="subject" for="sel1"><h5>Interaction</h5></label></td>
  
            <td> <select class="form-control" id="sel1" required  name="<?php echo $code."5"?>">
            <option value="" style="display: none"></option>
        <option value="5">Excellent</option>
        <option value="4">Good</option>
        <option value="3">Satisfactory</option>
<option value="2">Need Improvements</option>
        <option value="1">Poor</option>
          </select></td>
           <td><label class="subject" for="sel1"><h5>Punctuality</h5></label></td>
  
            <td> <select class="form-control" id="sel1" required name="<?php echo $code."6"?>">
            <option value="" style="display: none"></option>
        <option value="5">Excellent</option>
        <option value="4">Good</option>
        <option value="3">Satisfactory</option>
<option value="2">Need Improvements</option>
        <option value="1">Poor</option>
          </select></td>
          </tr>
          <tr>
             <td><label class="subject" for="sel1"><h5>Syllabus Coverage</h5></label></td>
  
            <td> <select class="form-control" id="sel1" required  name="<?php echo $code."7"?>">
            <option value="" style="display: none"></option>
        <option value="5">Excellent</option>
        <option value="4">Good</option>
        <option value="3">Satisfactory</option>
<option value="2">Need Improvements</option>
        <option value="1">Poor</option>
          </select></td>
           <td><label class="subject" for="sel1"><h5>Teaching Speed</h5></label></td>
  
            <td> <select class="form-control" id="sel1" required  name="<?php echo $code."8"?>">
            <option value="" style="display: none"></option>
        <option value="5">Excellent</option>
        <option value="4">Good</option>
        <option value="3">Satisfactory</option>
<option value="2">Need Improvements</option>
        <option value="1">Poor</option>
          </select></td>
           <td><label class="subject" for="sel1"><h5>English</h5></label></td>
  
            <td> <select class="form-control" id="sel1" required  name="<?php echo $code."9"?>">
            <option value="" style="display: none"></option>
        <option value="5">Excellent</option>
        <option value="4">Good</option>
        <option value="3">Satisfactory</option>
<option value="2">Need Improvements</option>
        <option value="1">Poor</option>
          </select></td>
          </tr>
        
        </div>
      </div>
          
</tr>
   </table>
    <div class="form-group">
          <label class="subject"><h4>Comment*:</h4></label>
          <textarea class="form-control" maxlenghth="10" rows="3" id="comment" placeholder="optional" name="<?php echo $cnt_f?>"></textarea>
        </div>
      </div>  
       <?php }  ?> 
      <button type="submit" class="btn btn-default btn-indigo" name="submit">Submit</button> 
        </div>
        </main>
        </form> 
        </div>    
  </body>
</html>