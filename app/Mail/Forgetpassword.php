<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Forgetpassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */ 
 
    public $usern;
    public $resetToken;
    public $subject = 'Forget Password';   
    
    public function __construct($usern,$resetToken)
    {
        $this->data = $resetToken;
        $this->usern = $usern;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('riham@gmail.com')->subject('Forget Password')->view('content.Forgetmail')->with('data', $this->data,'usern', $this->usern);
    }
}
