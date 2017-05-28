<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    public $name;
    public $email;
    public $sub;
    public $msg;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $subject, $message)
    {

        $this->name = $name;
        $this->email = $email;
        $this->sub = $subject;
        $this->msg = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@pacurar.co')
            ->subject('Pacurar.co Contact')
            ->view('emails/contact');
    }
}
