<?php
/************* Database code here*************/
$teacher_id;

$t_name="Akash Jadhav";
$subject="TOC";
$class="TE";
$branch="Computer Engineering";
$division="IV";
$roll_count="80";
$present_feedback="70";
$date="20-10-2018";

$low_vc=11;
$prep=3;
$expl=44;
$presentation=2;
$interaction=5;
$punctual=7;
$syll_coverage=10;
$speed=30;
$english=20;

/**************Calculation here*****************/
$final_score="70%";

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
$pdf->Cell(0,15,'Feedback Report',0,1,'C');


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

$pdf->Cell(60,60,'Low Voice :',0);
$pdf->Cell(8,60,$low_vc,0);
$pdf->Cell(22,60,'/ '.$present_feedback,0);
$pdf->Cell(70,60,'Preparation :',0);
$pdf->Cell(8,60,$prep,0);
$pdf->Cell(22,60,'/ '.$present_feedback,0);
$pdf->Ln();

$pdf->Cell(60,-30,'Explanation : ',0);
$pdf->Cell(8,-30,$expl,0);
$pdf->Cell(22,-30,'/ '.$present_feedback,0);
$pdf->Cell(70,-30,'Presentation : ',0);
$pdf->Cell(8,-30,$presentation,0);
$pdf->Cell(22,-30,'/ '.$present_feedback,0);
$pdf->Ln();

$pdf->Cell(60,60,'Interaction : ',0);
$pdf->Cell(8,60,$interaction,0);
$pdf->Cell(22,60,'/ '.$present_feedback,0);
$pdf->Cell(70,60,'Punctuality : ',0);
$pdf->Cell(8,60,$punctual,0);
$pdf->Cell(22,60,'/ '.$present_feedback,0);
$pdf->Ln();

$pdf->Cell(60,-30,'Syllabus Coverage : ',0);
$pdf->Cell(8,-30,$syll_coverage,0);
$pdf->Cell(22,-30,'/ '.$present_feedback,0);
$pdf->Cell(70,-30,'Teaching Speed : ',0);
$pdf->Cell(8,-30,$speed,0);
$pdf->Cell(22,-30,'/ '.$present_feedback,0);
$pdf->Ln();

$pdf->Cell(60,60,'English : ',0);
$pdf->Cell(8,60,$english,0);
$pdf->Cell(22,60,'/ '.$present_feedback,0);
$pdf->Ln();


/* Line */
$pdf->Line(10,200,200,200);


/* Tptal Score */
$pdf->SetFont('Arial','B',25);
$pdf->Cell(0,22,'Total Score : '.$final_score,0,1,'C');


/* Line */
$pdf->Line(10,230,200,230);

$pdf->Output();
?>