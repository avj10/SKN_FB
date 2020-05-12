<?php
include("db.php");
/************* Database code here*************/
if (isset($_POST['submit'])) {
    $temp= $_POST['t_name'];


$t_name=$temp;
$subject=$_POST['c_name'];
$code=$_POST['c_code'];
$class=$_POST['year'];
$branch="Computer Engineering";
$division=$_POST['div'];
$sem=$_POST['sem'];

$query=mysqli_query($db,"SELECT count(*)from students where division='$division' and year='$class'");
$row=mysqli_fetch_array($query);

$query2=mysqli_query($db,"SELECT count(*) as total from students where practical=1 and division='$division' and year='$class'");
$row2=mysqli_fetch_array($query2);

$roll_count=$row[0];
$present_feedback=$row2[0];
$p5=$present_feedback*5;
$date=date("Y-M-d");


$query3=mysqli_query($db,"SELECT * from theory_output where Q_id='1' and T_Division='$division' and T_Year='$class' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row3=mysqli_fetch_object($query3);
$score1=$row3->tot_cont;
$r1=($score1/$p5)*100;

$query4=mysqli_query($db,"SELECT * from theory_output where Q_id='2' and T_Division='$division' and T_Year='$class' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row4=mysqli_fetch_object($query4);
$score2=$row4->tot_cont;
$r2=($score2/$p5)*100;

$query5=mysqli_query($db,"SELECT * from theory_output where Q_id='3' and T_Division='$division' and T_Year='$class' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row5=mysqli_fetch_object($query5);
$score3=$row5->tot_cont;
$r3=($score3/$p5)*100;

$query6=mysqli_query($db,"SELECT * from theory_output where Q_id='4' and T_Division='$division' and T_Year='$class' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row6=mysqli_fetch_object($query6);
$score4=$row6->tot_cont;
$r4=($score4/$p5)*100;


$query7=mysqli_query($db,"SELECT * from theory_output where Q_id='5' and T_Division='$division' and T_Year='$class' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row7=mysqli_fetch_object($query7);
$score5=$row7->tot_cont;
$r5=($score5/$p5)*100;

$query8=mysqli_query($db,"SELECT * from theory_output where Q_id='6' and T_Division='$division' and T_Year='$class' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row8=mysqli_fetch_object($query8);
$score6=$row8->tot_cont;
$r6=($score6/$p5)*100;

$query9=mysqli_query($db,"SELECT * from theory_output where Q_id='7' and T_Division='$division' and T_Year='$class' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row9=mysqli_fetch_object($query9);
$score7=$row9->tot_cont;
$r7=($score7/$p5)*100;

$query10=mysqli_query($db,"SELECT * from theory_output where Q_id='8' and T_Division='$division' and T_Year='$class' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row10=mysqli_fetch_object($query10);
$score8=$row8->tot_cont;
$r8=($score8/$p5)*100;

$query11=mysqli_query($db,"SELECT * from theory_output where Q_id='9' and T_Division='$division' and T_Year='$class' and T_Name='$t_name' and T_Course_Code='$code' and T_Semester='$sem' ");
$row11=mysqli_fetch_object($query11);
$score9=$row9->tot_cont;
$r9=($score9/$p5)*100;
$sum=($r1+$r2+$r3+$r4+$r5+$r6+$r7+$r8+$r9);
$r10=($sum/900)*100;

}
$low_vc=intval($r1);
$prep=intval($r2);
$expl=intval($r3);
$presentation=intval($r4);
$interaction=intval($r5);
$punctual=intval($r6);
$syll_coverage=intval($r7);
$speed=intval($r8);
$english=intval($r9);

/**************Calculation here*****************/
$final_score=intval($r10);

?>


<?php

/************* PDF code here*************/

require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$title=$t_name.' - '.$class.' - '.$division;
$pdf->SetTitle($title);


/* Header */
$pdf->SetFont('Arial','',15);
$pdf->Cell(0,10,"Sinhgad Technical Education Society's",0,1,'C');

$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,'Smt. Kashibai Navale College of Engineering, Pune - 41',0,1,'C');

$pdf->SetFont('Arial','B',25);
$pdf->Cell(0,15,'Feedback Report(Theory)',0,1,'C');


/* Line */
$pdf->SetLineWidth(0.5);
$pdf->SetDrawColor(0,0,0);
$pdf->Line(10,50,200,50);


/* Information */
$pdf->SetFont('Arial','',16);

$pdf->Cell(90,30,'Branch : '.$branch,0);
$pdf->Cell(100,30,'Faculty : Prof. '.$t_name,0);
$pdf->Ln();

$pdf->Cell(90,-10,'Class : '.$class,0);
$pdf->Cell(100,-10,'Division : '.$division,0);
$pdf->Ln();

$pdf->Cell(90,30,'Subject : '.$subject,0);
$pdf->Cell(100,30,'Date : '.$date,0);
$pdf->Ln();

$pdf->Cell(90,-10,'Roll Count : '.$roll_count,0);
$pdf->Cell(100,-10,'Total feedback : '.$present_feedback,0);
$pdf->Ln();


/* Line */
$pdf->Line(10,100,200,100);


/* Score */
$pdf->SetFont('Arial','',16);

$pdf->Cell(60,60,'Voice :',0);
$pdf->Cell(8,60,$low_vc,0);
$pdf->Cell(22,60,' % ',0);
$pdf->Cell(70,60,'Preparation :',0);
$pdf->Cell(8,60,$prep,0);
$pdf->Cell(22,60,' %',0);
$pdf->Ln();

$pdf->Cell(60,-30,'Explanation : ',0);
$pdf->Cell(8,-30,$expl,0);
$pdf->Cell(22,-30,' %',0);
$pdf->Cell(70,-30,'Presentation : ',0);
$pdf->Cell(8,-30,$presentation,0);
$pdf->Cell(22,-30,' %',0);
$pdf->Ln();

$pdf->Cell(60,60,'Interaction : ',0);
$pdf->Cell(8,60,$interaction,0);
$pdf->Cell(22,60,' %',0);
$pdf->Cell(70,60,'Punctuality : ',0);
$pdf->Cell(8,60,$punctual,0);
$pdf->Cell(22,60,' %',0);
$pdf->Ln();

$pdf->Cell(60,-30,'Syllabus Coverage : ',0);
$pdf->Cell(8,-30,$syll_coverage,0);
$pdf->Cell(22,-30,' %',0);
$pdf->Cell(70,-30,'Teaching Speed : ',0);
$pdf->Cell(8,-30,$speed,0);
$pdf->Cell(22,-30,' %',0);
$pdf->Ln();

$pdf->Cell(60,60,'English : ',0);
$pdf->Cell(8,60,$english,0);
$pdf->Cell(22,60,' %',0);
$pdf->Ln();


/* Line */
$pdf->Line(10,200,200,200);


/* Tptal Score */
$pdf->SetFont('Arial','B',25);
$pdf->Cell(0,22,'Total Score : '.$final_score.'%',0,1,'C');


/* Line */
$pdf->Line(10,230,200,230);

$pdf->Output();
?>