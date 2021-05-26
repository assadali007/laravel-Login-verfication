<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Emailtest extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct()
    {
        //
    }


    public function build()
    {

        //return $this->view('email.test');
        return $this->subject('subject for email')
          ->with('name','assad ali')
          ->with('product','laptop')
                    ->view('email.test');
    }
}
