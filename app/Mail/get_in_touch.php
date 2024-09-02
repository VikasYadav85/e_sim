<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class get_in_touch extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */ 
 
    public $name;
    public $inquiry;
    
    public function __construct($name,$inquiry)
    {
      
        $this->name = $name;
        $this->inquiry = $inquiry;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hariss@gmail.com')->subject('Get In Touch')->view('content.get_in_touch')->with('name', $this->name,'inquiry', $this->inquiry);
    }
}
