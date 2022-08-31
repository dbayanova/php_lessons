<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    protected $message = null;
    protected $message_sent = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $my_text, $message_sent)
    {
        $this->message = $message;
        $this->my_text = $my_text;
        $this->message_sent = $message_sent;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        return $this->view('email')->with(['text' => $this->message->text,
                                           'my_text' => $this->my_text,
                                           'message_sent' => $this->message_sent]);
    }
}
