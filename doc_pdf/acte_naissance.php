<?php
require_once '../controller/db.php';
require('fpdf/fpdf.php');


$num_registre = $_SESSION['num_registre'];

// Exécution d'une requête SQL
$query = "SELECT * FROM acte_naissance WHERE num_registre=$num_registre";
$stmt = $bdd->query($query);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

//declaration des variables

$date_naissance = $row["date_naissance"];
$lieu_naissance = $row["lieu_naissance"];
$nom =$row["nom"].' '.$row["prenom"];


$nationalite_pere=$row["nationalite_pere"];
$nationalite_mere=$row["nationalite_mere"];

// $matrimoniale=$row["matrimoniale"];

$pere = $row["nom_pere"].' '.$row["prenom_pere"];
$mere = $row["nom_mere"].' '.$row["prenom_mere"];

//----------------------------------

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetRightMargin(20);
// ----------------------------------registre----------------------------------------------------------------

$pdf->SetFont('Arial', 'B', 11);
$lageurcelle1 = 210 / 3;
$lageurcelle2 = (420 / 3)-20;

$pdf->Cell($lageurcelle1, 10, 'DISTRICT DU GBOKLE', 0, 0, 'C');


$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', 'REPUBLIQUE DE COTE D’IVOIRE'), 0, 1, 'C');




$pdf->SetFont('Arial', '', 11);
$pdf->Cell($lageurcelle1, 10, iconv('UTF-8', 'windows-1252', '.........................'), 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', '………………….'), 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell($lageurcelle1, 10, iconv('UTF-8', 'windows-1252', 'COMMUNE DE SASSANDRA'), 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell($lageurcelle2, 15, iconv('UTF-8', 'windows-1252', 'EXTRAIT'), 0, 1, 'C');


$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10,iconv('UTF-8', 'windows-1252', "Du registre des actes de l’Etat") , 0, 1, 'R');
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Pour l’année'), 0, 1, 'R');



$pdf->Image('logo.jpg', 30, 45, 30, 0, 'JPEG');
$pdf->Ln(15); // Sauter une ligne

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell($lageurcelle1, 10, iconv('UTF-8', 'windows-1252', 'ETAT CIVIL'), 0, 1, 'C');
$pdf->SetFont('Arial', '', 11);

$pdf->Cell($lageurcelle1, 10, iconv('UTF-8', 'windows-1252', 'Nº '.$row["num_registre"]. ' DU REGISTRE'), 0, 1, 'C');


// $pdf->Cell($lageurcelle1, 15, '', 1, 0, 'C');
// $pdf->Cell($lageurcelle2, 50, 'bsdgdgfgxgwdwdwdxcgxg', 1, 1, 'C');

$pdf->SetFont('Arial', '', 12);


// Paragraphe
$pdf->Cell($lageurcelle1, 15, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 15, iconv('UTF-8', 'windows-1252', "$nom....................................."), 0, 1, 'L');
$pdf->Cell($lageurcelle1, 15, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 15, iconv('UTF-8', 'windows-1252', "Le $date_naissance....................................."), 0, 1, 'L');
$pdf->Cell($lageurcelle1, 15, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 15, iconv('UTF-8', 'windows-1252', "Est né(e) à $lieu_naissance.............................."), 0, 1, 'L');
$pdf->Cell($lageurcelle1, 15, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 15, iconv('UTF-8', 'windows-1252', "Fils(fille) de $pere de nationalité $nationalite_pere......."), 0, 1, 'L');
$pdf->Cell($lageurcelle1, 15, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 15, iconv('UTF-8', 'windows-1252', "Et de $mere de nationalité $nationalite_mere......... "), 0, 1, 'L');

// -----------------------------------------facultatif-----------------------------------------------------

$pdf->Ln(12); // Sauter des  ligne
$pdf->Cell(0, 2, "_________________________________________________________________________________", 0, 1, 'L');
$pdf->Cell(0, 2, "_________________________________________________________________________________", 0, 1, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 15, iconv('UTF-8', 'windows-1252', 'MENTIONS (éventuellement) :  NEANT'), 0, 1, 'C');

$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Marié(e)…………………….'), 0, 1, 'L');
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  'Avec ………………………….'), 0, 1, 'L');
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  'Mariage dissous par décision de divorce en date du……………………………………………….'), 0, 1, 'L');

$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  'Décédé(e) le ……………………………..'), 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  'Certifié le présent extrait conforme aux indications portées au registre')
, 0, 1, 'L');



$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  "Délivré à SASSANDRA, le [date]") , 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  "L'officier de l'Etat civil"), 0, 1, 'R');


$pdfPath='acte_de_naissance.pdf';
$pdf->Output($pdfPath, 'F');


//--------------------------------------------------envoi email-----------------------------------------

$id_demandeur =$_SESSION['id_demandeur'];

// Exécution d'une requête SQL
$query1 = "SELECT * FROM utilisateurs WHERE id_user=$id_demandeur";
$stmt1 = $bdd->query($query1);

$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

$_SESSION['email_dest'] = $row1["email"];

// echo ($email_dest. $id_demandeur);

// // Envoi du PDF par e-mail

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

function envoi_mail($from_name, $from_mail, $subject, $message,$pdf)
{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mairiedesassandra@gmail.com';
    $mail->Password = 'mruxwyuwadvbwwdp';
    $mail->Port = 465;

    $mail->setFrom($from_mail, $from_name);
    $mail->addAddress($_SESSION['email_dest'], '');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->setLanguage('fr', './PHPMailer/language/');
    $mail->addAttachment($pdf);

    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}

if (envoi_mail('sassandra', 'mairiedesassandra@gmail.com', 'extrait de naissance', 'salut','acte_de_naissance.pdf')) {
    
    $_SESSION['message']='Le message a été envoyé avec succès.';
    
} else {
    $_SESSION['message']='Une erreur s\'est produite lors de l\'envoi de l\'acte de naissance !';
}



header('Location: http://localhost/mairie/controller/admin.php');

