<?php
include"db.php";

$roll="18U413";
//$query=mysqli_query($db,"SELECT * from student");
$query1=mysqli_query($db,"SELECT T_Name,T_Course_Name,t.T_Course_Code from teacher_theory t,students s,theory_course th where s.division=t.T_division and s.semester=t.T_Semester and s.roll_no='$roll' and th.T_Course_Code=t.T_Course_Code");
if(isset($_POST['submit']))
{

while($row1=mysqli_fetch_object($query1))
{
$cnt=0;
while($cnt!=9)
{
$cnt=$cnt+1;
$code=$row1->T_Course_Code;
echo $_POST['."$code"."$cnt"'];

}

}


}




?>