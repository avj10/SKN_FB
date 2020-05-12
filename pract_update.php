<?php
include"includes/db.php";
 session_start();
$roll=$_SESSION['roll'];
$year=$_SESSION['year'];
//$query=mysqli_query($db,"SELECT * from student");
$query1=mysqli_query($db,"SELECT P_Name,P_Course_Name,t.P_Course_Code,s.division,s.semester,s.year,s.batch from teacher_prac t,students s,prac_course th where s.division=t.P_division and s.semester=t.P_Semester and s.roll_no='$roll' and s.year='$year' and th.P_Course_Code=t.P_Course_Code and s.batch=t.P_batch");
if(isset($_POST['submit']))
{
//$present=mysqli_query($db,"UPDATE students set present=1 where roll_no='$roll'");
while($row1=mysqli_fetch_object($query1))
{
$qid=0;
while($qid!=6)
{
$qid=$qid+1;
 $code=$row1->P_Course_Code;
 $cc=$code.$qid;
 $batch=$row1->batch;
 $tname=$row1->P_Name;
 $year=$row1->year;
 $div=$row1->division;
 $sem=$row1->semester;

$query2=mysqli_query($db,"UPDATE prac_output set tot_cont=tot_cont+'$_POST[$cc]' where P_Name='$tname' and P_Course_Code='$code' and P_Year='$year' and P_Sem='$sem' and P_div='$div' and Q_id='$qid' and P_batch='$batch'");
/*$query2=mysqli_query($db,"UPDATE theory_output set tot_cont=tot_cont+'$_POST[$cc]' where T_Name='$tname' and T_Course_Code='$code' and T_Year='$year' and T_Semester='$sem' and T_Division='$div' and Q_id='$qid'");
*/
}

}
/////COMMENTS
/*SELECT T_Name,T_Course_Name,t.T_Course_Code from teacher_theory t,students s,theory_course th where s.division=t.T_division and s.semester=t.T_Semester and s.roll_no='$roll' and th.T_Course_Code=t.T_Course_Code*/
$que1=mysqli_query($db,"SELECT P_Name,P_Course_Name,t.P_Course_Code, t.P_Year,t.P_Semester, t.P_division, t.P_batch from teacher_prac t,students s,prac_course th where s.division=t.P_division and s.semester=t.P_Semester and s.roll_no='$roll' and s.year='$year' and th.P_Course_Code=t.P_Course_Code and s.batch=t.P_batch");
$i = 0;
while($row1=mysqli_fetch_object($que1))
{
$i=$i+1;
$code=$row1->P_Course_Code;
$tname=$row1->P_Name;
$year=$row1->P_Year;
$div=$row1->P_division;
$sem=$row1->P_Semester;
$batch = $row1->P_batch;
echo $cmt = $_POST[$i];

if (!empty($cmt)) {
    $qry = mysqli_query($db,"INSERT INTO `p_comments`(`P_Name`, `P_Course_Code`, `P_year`, `P_Sem`, `P_div`, `batch`, `comment`) VALUES ('$tname', '$code', '$year', '$sem', '$div','$batch', '$cmt') ");
  }
}

$present=mysqli_query($db,"UPDATE students set practical=1 where roll_no='$roll' and year='$year'");
}
header('Location: thankyou.php');

?>
