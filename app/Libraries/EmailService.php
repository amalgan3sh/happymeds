<?php

namespace App\Libraries;

use CodeIgniter\Email\Email;

class EmailService
{
    protected $email;

    public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    public function sendEmail($to, $subject, $message, $from = null, $fromName = null)
    {
        $fromEmail = $from ?? getenv('email.fromEmail'); // Default sender email from .env
        $fromName = $fromName ?? getenv('email.fromName'); // Default sender name from .env

        $this->email->setTo($to);
        $this->email->setFrom($fromEmail, $fromName);
        $this->email->setSubject($subject);
        $this->email->setMessage($message);

        if ($this->email->send()) {
            return true;
        } else {
            log_message('error', 'Failed to send email to ' . $to);
            return false;
        }
    }
}