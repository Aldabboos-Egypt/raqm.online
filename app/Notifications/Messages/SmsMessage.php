<?php


namespace App\Notifications\Messages;


class SmsMessage
{

    private $recipient;

    private $content;


    public function getRecipient()
    {
        return $this->recipient;
    }

    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

}