<?php
include("db.php");
/************* Database code here*************/
if (isset($_POST['submit'])) {
    $temp= $_POST['t_name'];


$t_name=$temp;
$batch=$_POST['batch'];
$subject=$_POST['c_name'];
$code=$_POST['c_code'];
$class=$_POST['year'];
$branch="Computer Engineering";
$division=$_POST['div'];
$sem=$_POST['sem'];

$query=mysqli_query($db,"SELECT count(*)from students where division='$division' and year='$class' and batch='$batch'");
$row=mysqli_fetch_array($query);

$query2=mysqli_query($db,"SELECT count(*) as total from students where practical=1 and division='$division' and year='$class'and batch='$batch'");
$row2=mysqli_fetch_array($query2);

$present_feedback=$row2[0];
$roll_count=$row[0];
if($present_feedback==0)
{
	echo '<script language="javascript">'; 
      echo 'alert("No Feedback")';

      echo '</script>';
      header('Location:report.php');
    exit();
}

$p5=$present_feedback*5;
$date=date("Y-M-d");


$query3=mysqli_query($db,"SELECT * from prac_output where Q_id='1' and P_div='$division' and P_Year='$class' and P_Name='$t_name' and P_Course_Code='$code' and P_Sem='$sem'and P_batch='$batch' ");
$row3=mysqli_fetch_object($query3);
$score1=$row3->tot_cont;
$r1=($score1/$p5)*100;

$query4=mysqli_query($db,"SELECT * from prac_output where Q_id='2' and P_div='$division' and P_Year='$class' and P_Name='$t_name' and P_Course_Code='$code' and P_Sem='$sem'and P_batch='$batch' ");
$row4=mysqli_fetch_object($query4);
$score2=$row4->tot_cont;
$r2=($score2/$p5)*100;

$query5=mysqli_query($db,"SELECT * from prac_output where Q_id='3' and P_div='$division' and P_Year='$class' and P_Name='$t_name' and P_Course_Code='$code' and P_Sem='$sem'and P_batch='$batch' ");
$row5=mysqli_fetch_object($query5);
$score3=$row5->tot_cont;
$r3=($score3/$p5)*100;

$query6=mysqli_query($db,"SELECT * from prac_output where Q_id='4' and P_div='$division' and P_Year='$class' and P_Name='$t_name' and P_Course_Code='$code' and P_Sem='$sem'and P_batch='$batch' ");
$row6=mysqli_fetch_object($query6);
$score4=$row6->tot_cont;
$r4=($score4/$p5)*100;

$query7=mysqli_query($db,"SELECT * from prac_output where Q_id='5' and P_div='$division' and P_Year='$class' and P_Name='$t_name' and P_Course_Code='$code' and P_Sem='$sem'and P_batch='$batch' ");
$row7=mysqli_fetch_object($query7);
$score5=$row7->tot_cont;
$r5=($score5/$p5)*100;

$query8=mysqli_query($db,"SELECT * from prac_output where Q_id='6' and P_div='$division' and P_Year='$class' and P_Name='$t_name' and P_Course_Code='$code' and P_Sem='$sem'and P_batch='$batch' ");
$row8=mysqli_fetch_object($query8);
$score6=$row8->tot_cont;
$r6=($score6/$p5)*100;

$sum=($r1+$r2+$r3+$r4+$r5+$r6);
$r7=($sum/600)*100;


}
$low_vc=intval($r1);
$prep=intval($r2);
$expl=intval($r3);
$presentation=intval($r4);
$interaction=intval($r5);
$punctual=intval($r6);
/**************Calculation here*****************/
$final_score=intval($r7);

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
$pdf->Cell(0,15,'Feedback Report (Practical)',0,1,'C');


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

$pdf->Cell(90,30,'Date : '.$date,0);
$pdf->Cell(100,30,'Subject : '.$subject,0);
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
$pdf->Cell(22,60,' %',0);
$pdf->Cell(70,60,'Preparation :',0);
$pdf->Cell(8,60,$prep,0);
$pdf->Cell(22,60,' %',0);
$pdf->Ln();

$pdf->Cell(60,-30,'Explanation : ',0);
$pdf->Cell(8,-30,$expl,0);
$pdf->Cell(22,-30,' %',0);
$pdf->Cell(70,-30,'English : ',0);
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


/* Line */
$pdf->Line(10,150,200,150);


/* Tptal Score */
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,-40,'Note : 0-20% = Poor, 21-40% = Need Improvement,41-60% = Satisfactory, 61-80% = Good, 81-100% = Excellent',0,1);
$pdf->Ln();

/* Line */
$pdf->Line(10,160,200,160);




/* Tptal Score */
$pdf->SetFont('Arial','B',25);
$pdf->Cell(0,150,'Total Score : '.$final_score.' %',0,1,'C');

$pdf->Line(10,180,200,180);

$pdf->Output();
?>