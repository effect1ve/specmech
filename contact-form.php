<?php
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Формируем тело письма
    $email_body = "Имя: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Тема: $subject\n";
    $email_body .= "Сообщение:\n$message";

    // Отправляем письмо на вашу почту
    $to = "info@aurora-apps.ru";
    $subject = "Новая заявка с формы";
    $headers = "From: $email \r\n";
    $headers .= "Reply-To: $email \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    if (mail($to, $subject, $email_body, $headers)) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>
