<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sesuaikan dengan alamat email penerima
    $to_email = "andrianfirdi@gmail.com";

    // Ambil data dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Format pesan email
    $email_message = "Name: " . $name . "\n";
    $email_message .= "Email: " . $email . "\n";
    $email_message .= "Subject: " . $subject . "\n";
    $email_message .= "Message: " . $message . "\n";

    // Atur header email
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Kirim email
    if (mail($to_email, $subject, $email_message, $headers)) {
        // Pesan jika email berhasil dikirim
        echo json_encode(array('message' => 'Your message has been sent. Thank you!'));
    } else {
        // Pesan jika email gagal dikirim
        echo json_encode(array('message' => 'Unable to send email. Please try again later.'));
    }
} else {
    // Pesan jika metode HTTP bukan POST
    echo json_encode(array('message' => 'Method not allowed.'));
}
?>
