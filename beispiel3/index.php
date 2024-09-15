<?php
// Beispeil 3 - Created a PDF/QR-Code generator that can be donwloaded (with TC-PDF)

// To make the QR-Code when u scan it to download the PDF i would use a link of your page and a $_GET
// When u scan the link it takes you to your page wher a function checks if ?download="true" and if is true it donwloads the PDF.
// This fucntion would be same as genera_pdf.php with $pdf->Output('Beispiel3.pdf', 'D'); D is for download.
// I need some time to QA or someone to explain most variables for each method for the TCPDF class.
// Not the best documentation for Juniors but I enjoy TCPDF.
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TC-PDF Donwload</title>
</head>
<body>
    <form action="generate_pdf.php" method="post">
        <input type="text" name="link" placeholder="QR-Code Link">
        <button type="submit">Generate QR-Codes</button>
    </form>
</body>
</html>