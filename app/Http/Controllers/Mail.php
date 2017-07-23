<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mail extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct()
    {
        
    }
    

 
    public function build()
    {
        return $this->view('emails')
        ->subject('Bienvenido');
    }
}