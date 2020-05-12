<?php
/************* Database code here*************/
include("../includes/db.php");
$teacher_id;
$t_name="T H GURAV";
$code="310254";
$subject="TOC";
$year="3";
$branch="Computer";
$division="2";
$sem="5";
$query=mysqli_query($db,"SELECT count(present) as total from students where division='$division' and year='$year'");
$row=mysqli_fetch_array($query);

$roll_count=$row[0];
$query2=mysqli_query($db,"SELECT count(present) as total from students where present=1 and division='$division' and year='$year'");
$row2=mysqli_fetch_array($query2);
$present_feedback=$row2[0];
$date=date("Y-M-d");
/*
$query3=mysqli_query($db,"SELECT tot_count from theory_output where q_id='1' and T_Division='$division' and T_Year='$year' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem'");
$row3=mysqli_fetch_array($query3);*/

$query3=mysqli_query($db,"SELECT * from theory_output where Q_id='1' and T_Division='$division' and T_Year='$year' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row3=mysqli_fetch_object($query3);
$low_vc=(($row3->tot_cont)/($present_feedback * 5)*100);

$query4=mysqli_query($db,"SELECT * from theory_output where Q_id='2' and T_Division='$division' and T_Year='$year' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row4=mysqli_fetch_object($query4);
$prep=(($row4->tot_cont)/($present_feedback * 5)*100);

$query5=mysqli_query($db,"SELECT * from theory_output where Q_id='3' and T_Division='$division' and T_Year='$year' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row5=mysqli_fetch_object($query5);
$expl=(($row5->tot_cont)/($present_feedback * 5)*100);


$query6=mysqli_query($db,"SELECT * from theory_output where Q_id='4' and T_Division='$division' and T_Year='$year' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row6=mysqli_fetch_object($query6);
$presentation=(($row6->tot_cont)/($present_feedback * 5)*100);

$query7=mysqli_query($db,"SELECT * from theory_output where Q_id='5' and T_Division='$division' and T_Year='$year' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row7=mysqli_fetch_object($query7);
$interaction=(($row7->tot_cont)/($present_feedback * 5)*100);

$query8=mysqli_query($db,"SELECT * from theory_output where Q_id='6' and T_Division='$division' and T_Year='$year' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row8=mysqli_fetch_object($query8);
$punctual=(($row8->tot_cont)/($present_feedback * 5)*100);


$query9=mysqli_query($db,"SELECT * from theory_output where Q_id='7' and T_Division='$division' and T_Year='$year' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row9=mysqli_fetch_object($query9);
$syll_coverage=(($row9->tot_cont)/($present_feedback * 5)*100);

$query10=mysqli_query($db,"SELECT * from theory_output where Q_id='8' and T_Division='$division' and T_Year='$year' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row10=mysqli_fetch_object($query10);
$speed=(($row10->tot_cont)/($present_feedback * 5)*100);

$query11=mysqli_query($db,"SELECT * from theory_output where Q_id='9' and T_Division='$division' and T_Year='$year' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row11=mysqli_fetch_object($query11);
$english=(($row11->tot_cont)/($present_feedback * 5)*100);




/**************Calculation here*****************/
$final_score=(($low_vc+$prep+$expl+$presentation+$interaction+$punctual+$syll_coverage+$speed+$english)/900)*100;	

?>


<?php

/************* PDF code here*************/

require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$title=$t_name.' - '.$year.' - '.$division;
$pdf->SetTitle($title);


/* Header */
$pdf->SetFont('Arial','B',25);
$pdf->Cell(0,10,'Quality Assessment Program',0,1,'C');

$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'For',0,1,'C');

$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,'Engineering/Management/Pharmacy Institutes',0,1,'C');

$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Of',0,1,'C');

$pdf->SetFont('Arial','B',25);
$pdf->Cell(0,10,'STES/SPSPM/SSPM/YCSPM',0,1,'C');


/* Line */
$pdf->SetLineWidth(0.5);
$pdf->SetDrawColor(0,0,0);
$pdf->Line(10,65,200,65);


/* Information */
$pdf->SetFont('Arial','',16);

$pdf->Cell(90,30,'College : SKNCOE, Pune',0);
$pdf->Cell(100,30,'Feedback for : Prof. '.$t_name,0);
$pdf->Ln();

$pdf->Cell(90,-10,'Year : '.$year,0);
$pdf->Cell(100,-10,'Subject : '.$subject,0);
$pdf->Ln();

$pdf->Cell(90,30,'Branch : '.$branch,0);
$pdf->Cell(100,30,'Division : '.$division,0);
$pdf->Ln();

$pdf->Cell(90,-10,'Roll Count : '.$roll_count,0);
$pdf->Cell(100,-10,'Total feedback : '.$present_feedback,0);
$pdf->Ln();

$pdf->Cell(90,30,'Date : '.$date,0);
$pdf->Ln();


/* Line */
$pdf->Line(10,125,200,125);


/* Score */
$pdf->SetFont('Arial','',16);

$pdf->Cell(60,30,'Low Voice :',0);
$pdf->Cell(30,30,$low_vc.' / '.$present_feedback,0);
$pdf->Cell(70,30,'Preparation :',0);
$pdf->Cell(30,30,$prep.' / '.$present_feedback,0);
$pdf->Ln();

$pdf->Cell(60,-10,'Explanation : ',0);
$pdf->Cell(30,-10,$expl.' / '.$present_feedback,0);
$pdf->Cell(70,-10,'Presentation : ',0);
$pdf->Cell(30,-10,$presentation.' / '.$present_feedback,0);
$pdf->Ln();

$pdf->Cell(60,30,'Interaction : ',0);
$pdf->Cell(30,30,$interaction.' / '.$present_feedback,0);
$pdf->Cell(70,30,'Punctuality : ',0);
$pdf->Cell(30,30,$punctual.' / '.$present_feedback,0);
$pdf->Ln();

$pdf->Cell(60,-10,'Syllabus Coverage : ',0);
$pdf->Cell(30,-10,$syll_coverage.' / '.$present_feedback,0);
$pdf->Cell(70,-10,'Teaching Speed : ',0);
$pdf->Cell(30,-10,$speed.' / '.$present_feedback,0);
$pdf->Ln();

$pdf->Cell(60,30,'English : ',0);
$pdf->Cell(30,30,$english.' / '.$present_feedback,0);
$pdf->Ln();


/* Line */
$pdf->Line(10,200,200,200);


/* Tptal Score */
$pdf->SetFont('Arial','B',25);
$pdf->Cell(0,32,'Total Score : '.$final_score,0,1,'C');


/* Line */
$pdf->Line(10,230,200,230);

$pdf->Output();
?>