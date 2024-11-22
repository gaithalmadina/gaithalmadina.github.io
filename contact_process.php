<?php
    // Ambil data dari form
    $to = "sultan.syahputra.y@gmail.com"; // Email tujuan
    $from = isset($_POST['email']) ? $_POST['email'] : ""; // Email pengirim dari form
    $name = isset($_POST['name']) ? $_POST['name'] : ""; // Nama dari form
    $subject = isset($_POST['subject']) ? $_POST['subject'] : "No Subject"; // Subjek dari form
    $cmessage = isset($_POST['message']) ? $_POST['message'] : ""; // Pesan dari form

    // Validasi data
    if (empty($from) || empty($name) || empty($cmessage)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Mengatur header email
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Menyusun body email
    $body = "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Express Mail</title>
    </head>
    <body>
        <h2>You have received a message from your website.</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$from}</p>
        <p><strong>Subject:</strong> {$subject}</p>
        <p><strong>Message:</strong> {$cmessage}</p>
    </body>
    </html>";

    // Mengirim email menggunakan fungsi mail()
    $send = mail($to, $subject, $body, $headers);

    // Cek apakah email terkirim
    if ($send) {
        echo "Your message has been sent successfully.";
    } else {
        echo "Failed to send your message. Please try again.";
    }
?>
