<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject(config('app.name') . ' - ' . __('mail.apply-form'))
                    ->from('info@example.com')
                    ->to('info@example.com')
                    ->markdown('emails.front.apply-mail');
    }
}
