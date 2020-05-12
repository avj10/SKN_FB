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
require 'Classes/PHPExcel/IOFactory.php';
include('includes/db.php');
// Mysql database
//$servername = "localhost";
//$username = "root";
//$password = "root";
//$dbname = "test";

if(isset($_POST["import"]))
{
 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 //$ext = GetImageExtension($exl_type);
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $inputfilename = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
$exceldata = array();

// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
/*/ Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
*/
//  Read your Excel workbook
try
{
    $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
    $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
    $objPHPExcel = $objReader->load($inputfilename);

}
catch(Exception $e)
{
    /*die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());*/
}

//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
 
//  Loop through each row of the worksheet in turn
for ($row = 2; $row <= $highestRow; $row++)
{ 
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
  
    //  Insert row data array into your database of choice here
  $sql = "INSERT INTO prac_course (P_Course_Code, P_Course_Name, P_Year, P_Semester)
      VALUES ('".$rowData[0][0]."', '".$rowData[0][1]."', '".$rowData[0][2]."',  '".$rowData[0][3]."')";
     
  if (mysqli_query($db, $sql)) {
    $exceldata[] = $rowData[0];
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
  }
}

/*/ Print excel data
echo "<table>";
foreach ($exceldata as $index => $excelraw)
{
  echo "<tr>";
  foreach ($excelraw as $excelcolumn)
  {
    echo "<td>".$excelcolumn."</td>";
  }
  echo "</tr>";
}
echo "</table>";
*/
mysqli_close($db);
header('Location: add_teachers_theo.php');
    exit();

}
else
 {
  echo '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}


//$sql = "TRUNCATE TABLE `theory_course`";
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
         <a class="nav-link" href="logout.php">Logout</a>
      </div>
    </nav>
    <div class="form-style-10">
      <h1>Add Details for feedback</h1>
    <main role="main" class="container">
      <center><div class="jumbotron col-sm-10">
        <h2>Add Practical Courses</h2>
        <br>
        <table>
          <tr>
          <th>
            <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" class="form-control" id="excel" name="excel" required>
            </div>
          </th>
          <td>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-18">
                <button type="submit" name="import" class="btn btn-lg btn-primary btn-block">Submit</button>
              </div>
            </div>
             </form>
          </td>
          </tr><tr><td></td></tr><tr></tr>
          <tr>
          <th>    
              <div class="col-sm-18">
          <button type="submit" class="btn btn-lg btn-success btn-block">View Previous File</button>
        </div>
        </th>
        <td>
      <div class="col-sm-offset-2 col-sm-18">
        <button type="submit" class="btn btn-lg btn-danger btn-block">Delete</button>
      </div>
          </td>
          </tr>
          
        </table>

      </div>  </center>
    </main>
  </div>
  </body>
</html>