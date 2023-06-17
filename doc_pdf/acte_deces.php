<?php
require_once '../controller/db.php';
require('fpdf/fpdf.php');

$num_registre = $_SESSION['num_registre'];

// Exécution d'une requête SQL
$query = "SELECT * FROM acte_deces WHERE num_registre=$num_registre";
$stmt = $bdd->query($query);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

// echo $row["nom"];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetRightMargin(20);
// ----------------------------------registre----------------------------------------------------------------

$pdf->SetFont('Arial', 'B', 11);
$lageurcelle1 = 210 / 3;
$lageurcelle2 = (420 / 3)-20;

$pdf->Cell($lageurcelle1, 5, 'DISTRICT DU GBOKLE', 0, 0, 'C');


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
$pdf->Cell($lageurcelle1, 20, iconv('UTF-8', 'windows-1252', 'ETAT CIVIL'), 0, 1, 'C');
$pdf->SetFont('Arial', '', 11);

$pdf->Cell($lageurcelle1, 5, iconv('UTF-8', 'windows-1252', 'Nº '.$row["num_registre"]. ' DU REGISTRE'), 0, 1, 'C');



$pdf->SetFont('Arial', '', 12);

$date = $row["date_deces"];
$lieu_deces = $row["lieu_deces"];
$nom =$row["nom"].' '.$row["prenom"];
$age =$row["age"];
$profession=$row["profession"];
$nationalite=$row["nationalite"];
$lieu_residence=$row["lieu_residence"];
$matrimoniale=$row["matrimoniale"];
$conjoint= $row["nom_conjoint"].' '.$row["prenom_conjoint"];
$pere = $row["nom_pere"].' '.$row["prenom_pere"];
$mere = $row["nom_mere"].' '.$row["prenom_mere"];

// Paragraphe

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Le $date........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Est décédé(e) à $lieu_deces........................ "), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Le(la) nommé(e) $nom........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Agé(e) $age ans........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "$profession........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "De nationalité $nationalite........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Résident à $lieu_residence........................"), 0, 1, 'L');

// $pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
// $pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Il (elle) était né (e) à […..] "), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "le (la) défunt (e) $matrimoniale  à $conjoint........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Fils de $pere........................"), 0, 1, 'L');

$pdf->Cell($lageurcelle1, 10, "", 0,0, 'L');
$pdf->Cell($lageurcelle2, 10, iconv('UTF-8', 'windows-1252', "Et de $mere........................"), 0, 1, 'L');



// -----------------------------------------facultatif-----------------------------------------------------

$pdf->Ln(12); // Sauter des  ligne


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  'Certifié le présent extrait conforme aux indications portées au registre')
, 0, 1, 'L');



$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  "Délivré à SASSANDRA, le ......") , 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252',  "L'officier de l'Etat civil"), 0, 1, 'R');



$pdf->Output('acte_de_deces.pdf', 'F');

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

// if (envoi_mail('sassandra', 'mairiedesassandra@gmail.com', 'extrait de deces', 'salut','acte_de_deces.pdf')) {
//     echo 'Le message a été envoyé avec succès.';
//     header('Location: http://localhost/mairie/controller/admin.php');
// } else {
//     echo 'Une erreur s\'est produite lors de l\'envoi du message.';
// }





if (envoi_mail('sassandra', 'mairiedesassandra@gmail.com', 'extrait de mariage', 'extrait de Deces','acte_de_deces.pdf')) {
    
    $_SESSION['message']='Le message a été envoyé avec succès.';
    
} else {
    $_SESSION['message']='Une erreur s\'est produite lors de l\'envoi de l\'acte de deces !';
}


header('Location: http://localhost/mairie/controller/admin.php');


