<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailUser extends Mailable
{
    use Queueable, SerializesModels;
        public $data;
        public $subject;
        public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
       $this->data = $data;
       $this->subject = $this->data['subject'];
       $this->body   = $this->data['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject($this->data['subject'])
                    ->html($this->data['body']);
    }

    
}
