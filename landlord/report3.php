<?php
require '../server.php';


if (!isset($_SESSION['id_landlord'])) {
  // $_SESSION['msg'] = "You must log in first";
  header('location:../login.php');
}
if (isset($_POST['logout'])) {
  unset($_SESSION['id_landlord']);


  header("location:../login.php");
}
?>

<?Php


require('../fpdf184/fpdf.php');
require('includes/config.php');
$agend_id = $_SESSION['id_landlord'];

$query = "SELECT * from `contact` where `agent_id`='$agend_id' and `checked`='checked'";
$ex_query = mysqli_query($con, $query);


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$width_cell = array(5, 55, 40, 45, 35);


//Background color of header// 
$pdf->SetFillColor(193, 229, 252);
$pdf->SetXY(10, 5);
$pdf->Cell(200, 15, "Report for total booked rooms", 3, 3, 'C');

// Header starts//
//First header column // 
$pdf->Cell($width_cell[0], 5, 'ID', 1, 0, 'C', true);
//Second header column// 
$pdf->Cell($width_cell[1], 5, 'NAME', 1, 0, 'C', true);
//Third header column//
$pdf->Cell($width_cell[2], 5, 'HOSTEL NAME', 1, 0, 'C', true);
//Fourth header column//
$pdf->Cell($width_cell[3], 5, 'EMAIL', 1, 0, 'C', true);
//Third header column//
$pdf->Cell($width_cell[4], 5, 'START STAY ON', 1, 1, 'C', true);
//// header ends ///////

$pdf->SetFont('Arial', '', 10);
//Background color of header//
$pdf->SetFillColor(235, 236, 236);
//to give alternate background fill color to rows// 
$fill = false;
$i = 1;
while ($result = mysqli_fetch_array($ex_query)) {
  /// each record is one row  ///

  $pdf->Cell($width_cell[0], 10, $i++, 1, 0, 'C', $fill);
  $pdf->Cell($width_cell[1], 10, $result['name'], 1, 0, 'C', $fill);
  $pdf->Cell($width_cell[2], 10, $result['hostel_name'], 1, 0, 'C', $fill);
  $pdf->Cell($width_cell[3], 10, $result['email'], 1, 0, 'C', $fill);
  $pdf->Cell($width_cell[4], 10, $result['start_stay'], 1, 1, 'C', $fill);

  //to give alternate background fill  color to rows//
  $fill = !$fill;
}



/// end of records /// 

$pdf->Output();


?>



