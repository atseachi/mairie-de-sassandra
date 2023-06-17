<? php
require('fpdf/fpdf.php');

// Création de la classe personnalisée héritant de FPDF
class CustomPDF extends FPDF {
    // Méthode pour l'en-tête du PDF
    function Header() {
        // Code pour personnaliser l'en-tête du PDF (facultatif)
    }

    // Méthode pour le pied de page du PDF
    function Footer() {
        // Code pour personnaliser le pied de page du PDF (facultatif)
    }
}

// Instanciation de la classe personnalisée
$pdf = new CustomPDF();
$pdf->AddPage();

// Code pour générer le contenu du PDF
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Contenu du PDF', 0, 1);

// Code pour générer le reste du contenu du PDF

// Enregistrement du PDF dans un fichier temporaire
$pdfPath = 'chemin/vers/le/fichier.pdf';
$pdf->Output($pdfPath, 'F');

// Envoi du PDF par e-mail
$to = $_SESSION['email'];//---------------correction
$subject = "extrait d'acte de naissance";
$message = 'Veuillez trouver ci-joint le document.';
$from = 'mairiedesassandra@gmail.com';

// Attachement du PDF
$file = $pdfPath;
$content = file_get_contents($file);
$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
$name = basename($file);

// En-têtes de l'e-mail
$headers = "From: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

// Corps de l'e-mail
$body = "--".$uid."\r\n";
$body .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
$body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$body .= $message."\r\n\r\n";
$body .= "--".$uid."\r\n";
$body .= "Content-Type: application/octet-stream; name=\"".$name."\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "Content-Disposition: attachment; filename=\"".$name."\"\r\n\r\n";
$body .= $content."\r\n\r\n";
$body .= "--".$uid."--";

// Envoi de l'e-mail
if (mail($to, $subject, $body, $headers)) {
    echo 'E-mail envoyé avec succès.';
} else {
    echo 'Erreur lors de l\'envoi de l\'e-mail.';
}

// Suppression du fichier PDF temporaire
unlink($pdfPath);
