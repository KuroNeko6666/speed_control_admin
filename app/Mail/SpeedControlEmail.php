<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class SpeedControlEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $url = 'http://68.183.225.134:8004/account/validate/';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->url = $this->url . $token;
    }


    public function build()
    {
        return $this->view('email.email', ['token' => $this->url]);
    }
}
