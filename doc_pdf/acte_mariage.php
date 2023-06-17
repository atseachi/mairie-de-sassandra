<?php
require_once '../controller/db.php';
require('fpdf/fpdf.php');

$num_registre = $_SESSION['num_registre'];

// Exécution d'une requête SQL
$query = "SELECT * FROM acte_mariage WHERE num_registre=$num_registre";
$stmt = $bdd->query($query);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

//declaration des variables

$date = $row["date"];
$conjoint = $row["nom_cjt"].' '.$row["prenom_cjt"];
$date_naissance_cjt=$row["date_naissance_cjt"];
$profession_cjt=$row["profession_cjt"];
$lieu_hab_cjt=$row["lieu_hab_cjt"];
$pere_cjt = $row["nom_pere_cjt"].' '.$row["prenom_pere_cjt"];
$mere_cjt = $row["nom_mere_cjt"].' '.$row["prenom_mere_cjt"];

$conjointe = $row["nom_cjte"].' '.$row["prenom_cjte"];
$date_naissance_cjte=$row["date_naissance_cjte"];
$profession_cjte=$row["profession_cjte"];
$lieu_hab_cjte=$row["lieu_hab_cjte"];
$pere_cjte = $row["nom_pere_cjte"].' '.$row["prenom_pere_cjte"];
$mere_cjte = $row["nom_mere_cjte"].' '.$row["prenom_mere_cjte"];





$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetRightMargin(20);
// ----------------------------------registre----------------------------------------------------------------

$pdf->SetFont('Arial', 'B', 11);
$lageurcelle1 = 210 / 3;
$lageurcelle2 = (420 / 3)-20;

$pdf->Cell($lageurcelle1, 5, 'DISTRICT DU GBOKLE ', 0, 0, 'C');


$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell($lageurcelle2, 5, iconv('UTF-8', 'windows-1252', 'REPUBLIQUE DE COTE D’IVOIRE'), 0, 1, 'C');




$pdf->SetFont('Arial', '', 11);
$pdf->Cell($lageurcelle1, 5, iconv('UTF-8', 'windows-1252', '.........................'), 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell($lageurcelle2, 5, iconv('UTF-8', 'windows-1252', '………………….'), 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell($lageurcelle1, 5, iconv('UTF-8', 'windows-1252', 'COMMUNE DE SASSANDRA'), 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell($lageurcelle2, 5, iconv('UTF-8', 'windows-1252', 'EXTRAIT'), 0, 1, 'C');


$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5,iconv('UTF-8', 'windows-1252', "Du registre des actes de l’Etat") , 0, 1, 'R');
$pdf->Cell(0, 5, iconv('UTF-8', 'windows-1252', 'Pour l’année'), 0, 1, 'R');



$pdf->Image('logo.jpg', 30, 25, 30, 0, 'JPEG');
$pdf->Ln(15); // Sauter une ligne

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell($lageurcelle1, 13, iconv('UTF-8', 'windows-1252', 'ETAT CIVIL'), 0, 1, 'C');
$pdf->SetFont('Arial', '', 11);

$pdf->Cell($lageurcelle1, 5, iconv('UTF-8', 'windows-1252', 'Nº '.$row["num_registre"]. ' DU REGISTRE'), 0, 1, 'C');
$pdf->Cell($lageurcelle1, 5, iconv('UTF-8', 'windows-1252', 'MARIAGE ENTRE'), 0, 1, 'C');
$pdf->Cell($lageurcelle1, 5, iconv('UTF-8', 'windows-1252', "$conjoint  et"), 0, 1, 'C');
$pdf->Cell($lageurcelle1, 5, iconv('UTF-8', 'windows-1252', " $conjointe"), 0, 1, 'C');



$pdf->SetFont('Arial', '', 12);


// Paragraphe


$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Le $date........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Entre $conjoint........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "$profession_cjt........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Né le $date_naissance_cjt........................"), 0, 1, 'L');

// $pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
// $pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "[lieu de naissance]"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Fils de $pere_cjt........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Et de $mere_cjt........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 0, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Domicilié à $lieu_hab_cjt........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Et $conjointe........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "$profession_cjte........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Née le $date_naissance_cjte........................"), 0, 1, 'L');

// $pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
// $pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "[lieu de naissance]"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Fille de $pere_cjte........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Et de $mere_cjte........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Domicilié à $lieu_hab_cjte........................"), 0, 1, 'L');


// -----------------------------------------facultatif-----------------------------------------------------

$pdf->Ln(12); // Sauter des  ligne


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  'Certifié le présent extrait conforme aux indications portées au registre')
, 0, 1, 'L');



$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  "Délivré à SASSANDRA, le ........") , 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  "L'officier de l'Etat civil"), 0, 1, 'R');



$pdf->Output('acte_de_mariage.pdf', 'F');

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

// if (envoi_mail('sassandra', 'mairiedesassandra@gmail.com', 'extrait de mariage', 'salut','acte_de_mariage.pdf')) {
//     echo 'Le message a été envoyé avec succès.';

//     header('Location: http://localhost/mairie/controller/admin.php');

// } else {
//     echo 'Une erreur s\'est produite lors de l\'envoi du message.';
// }


if (envoi_mail('sassandra', 'mairiedesassandra@gmail.com', 'extrait de mariage', 'extrait de mariage','acte_de_mariage.pdf')) {
    
    $_SESSION['message']='Le message a été envoyé avec succès.';
    
} else {
    $_SESSION['message']='Une erreur s\'est produite lors de l\'envoi de l\'acte de mariage !';
}


header('Location: http://localhost/mairie/controller/admin.php');
