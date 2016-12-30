<?php

// /Eshop/ContactBundle/Services/Mailer.php

namespace Eshop\ContactBundle\Services;

use Symfony\Component\Templating\EngineInterface;

class Mailer {

    protected $mailer;
    protected $templating;
    private $from = "";
    private $reply = "";
    private $name = "";

    public function __construct($mailer, EngineInterface $templating) {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    protected function sendMessage($to, $subject, $body) {
        $mail = \Swift_Message::newInstance();

        $mail
                ->setFrom($this->from, $name)
                ->setTo($to)
                ->setSubject($subject)
                ->setBody($body)
                ->setReplyTo($this->reply, $name)
                ->setContentType('text/html');

        $this->mailer->send($mail);
    }

}
