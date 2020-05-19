<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $emailMessage;

    public $subject;

    public $sender;

    /**
     * Create a new message instance.
     *
     * @param $emailMessage
     * @param $subject
     */
    public function __construct(string $emailMessage, string $subject, string $sender)
    {
        $this->emailMessage = $emailMessage;
        $this->subject = $subject;
        $this->sender = $sender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('write-mail.message')
            ->from($this->sender)
            ->subject($this->subject);
    }
}
