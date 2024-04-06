<?php

// require('fpdf.php');
require('fpdf.php');

// New object created and constructor invoked
$pd = new FPDF();

// Add new pages. By default no pages available.
$pd->AddPage();

// Set font format and font-size
$pd->SetFont('Times', 'B', 20);

// Framed rectangular area
$pd->Cell(176, 5, 'Welcome to PDF Generation through PHP!', 0, 0, 'C');

// Set it new line
$pd->Ln();

// Set font format and font-size
$pd->SetFont('Times', 'B', 12);

// Framed rectangular area
$pd->Cell(176, 10, 'Hello, Myself Ankita Adam', 0, 0, 'L');

// Close document and sent to the browser
$pd->Output();

?>
