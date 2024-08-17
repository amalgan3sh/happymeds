<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail  = 'aswinramesh.asr@gmail.com';  // Your email address
    public $fromName   = 'Aswin';               // Your name
    public $recipients = '';                        // Default recipients (if any)

    public $protocol = 'smtp';
    public $SMTPHost = 'smtp.gmail.com';  // Replace with your SMTP host
    public $SMTPUser = 'aswinramesh.asr@gmail.com';  // Replace with your SMTP username
    public $SMTPPass = 'nrnneeddztewadtl';  // Replace with your SMTP password
    public $SMTPPort = 587 ;  // Replace with your SMTP port, use 465 for SSL
    public $SMTPCrypto = 'tls';  // Use 'ssl' if your SMTP server requires it

    public $mailType = 'html';
    public $charset  = 'UTF-8';
    public $wordWrap = true;

    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */

    /**
     * The server path to Sendmail.
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 5;

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = false;

    
    
    /**
     * Character count to wrap at
     */
    public int $wrapChars = 76;

    
    
    /**
     * Whether to validate the email address
     */
    public bool $validate = false;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     */
    public int $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     */
    public bool $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     */
    public int $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     */
    public bool $DSN = false;
}
