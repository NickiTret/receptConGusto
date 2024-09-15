<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Убедитесь, что путь к автозагрузчику верный

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    private $mail;
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->mail = new PHPMailer(true);
        $this->configureMail();
    }

    private function configureMail()
    {
        // Настройки SMTP
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.yandex.ru'; // Укажите SMTP сервер
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'tretjakov.nickit@yandex.ru'; // Укажите свой email
        $this->mail->Password = 'uawapqzivpaptrdh'; // Укажите свой пароль
        $this->mail->SMTPSecure = 'ssl'; // Измените на ENCRYPTION_STARTTLS
        $this->mail->Port = 465; // Измените на 587
        $this->mail->setFrom('tretjakov.nickit@yandex.ru', 'Nikita'); // От кого
    }

    public function sendMessage($recipientEmail)
    {
        try {
            // Получатели
            $this->mail->addAddress($recipientEmail);

            // Контент
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Новое сообщение на сайте от ' . $this->data['name'] . ' ' . $this->data['email'];
            $this->mail->Body    = $this->data['message'];

            // Отправка
            $this->mail->send();
            return true; // Успешная отправка
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}");
            return false; // Ошибка отправки
        }
    }
}
